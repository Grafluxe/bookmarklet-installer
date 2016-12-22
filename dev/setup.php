<?php
/**
 * @author Leandro Silva | Grafluxe, 2016
 * @license MIT
 */

$bmk = $_GET["!"];

if ($bmk) {
  $title = $_COOKIE["bmk_title"];
  $err = !isset($title);
} else {
  $title = "[" . ($_GET[title] ?: "Bookmarklet") . "]";
  $script_path = $_GET["path"];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, $script_path);

  $data = "javascript:" . rawurlencode(preg_replace("/\r\n|\n/", "", curl_exec($ch))) . "void(0);";
  $info = curl_getinfo($ch);
  $err = ($info["http_code"] !== 200);

  curl_close($ch);

  if (!$err) {
    $exp = time() + ((60 * 8) * 60);

    setcookie("bmk_title", $title, $exp);
  }
}

?>
