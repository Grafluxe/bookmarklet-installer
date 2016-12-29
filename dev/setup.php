<?php
/**
 * @author Leandro Silva | Grafluxe, 2016
 * @license MIT
 */

session_start();

$install_pg = isset($_GET["path"]);
$mobile_step2 = isset($_GET["!"]);
$host_uri = "http" . (isset($_SERVER["HTTPS"]) ? "s" : "") . rtrim("://$_SERVER[HTTP_HOST]", "/") . dirname($_SERVER["PHP_SELF"]);

if ($install_pg) {
  $title = "[" . ($_GET["title"] ?: "bookmarklet") . "]";
  $script_path = $_GET["path"];

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL, $script_path);

  $data = "javascript:void (function(){" . str_replace("\"", "%22", curl_exec($ch)) . "}());";
  $info = curl_getinfo($ch);
  $err = ($info["http_code"] !== 200);

  curl_close($ch);

  if (!$err && !isset($_SESSION["bmk_title"])) {
    $_SESSION["bmk_title"] = $title;
    $_SESSION["bmk_data"] = $data;
  }
} else if ($mobile_step2) {
  $title = $_SESSION["bmk_title"];
  $data = $_SESSION["bmk_data"];
  $err = !isset($data);

  unset($_SESSION["bmk_title"], $_SESSION["bmk_data"]);
}

?>
