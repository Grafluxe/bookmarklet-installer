<?php
/**
 * @author Leandro Silva | Grafluxe, 2016
 */

$title = $_GET["title"];
$uri = $_GET["path"];

$ch = curl_init();

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $uri);

$data = curl_exec($ch);
$info = curl_getinfo($ch);

curl_close($ch);
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Bookmarklet</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="./dev/style.css">
</head>

<body>
  <?php if ($info["http_code"] !== 200):?>

  <h1>Oops&hellip;</h1>
  <p>There was an error loading the bookmarklet. Please confirm your script path and/or try again later.</p>

  <?php else: ?>

  <h1>Desktop Install</h1>
  <p>It's simple. Just drag this button into your bookmarks bar:</p>
  <a id="desktop" href="<?php echo $data; ?>">[<?php echo $title; ?>]</a>

  <hr>

  <h1>Mobile Install</h1>
  <p>Follow these steps:</p>

  <ol>
    <li>
      Click on the below button.
      <ul>
        <li>This will add a hash to your current URL.</li>
      </ul>
    </li>
    <li>
      Go through your normal steps to bookmark this page.
      <ul>
        <li>Name the bookmark "[<?php echo $title; ?>]"</li>
      </ul>
    </li>
    <li>
      Once the bookmark is saved, edit its URL.
      <ul>
        <li>Erase everything before, and including, the "#" character.</li>
        <li>It may take a while to scroll to the beginning of the URL, but you'll only need to do this once.</li>
        <li>Your new URL should begin with the word "javascript:."</li>
      </ul>
    </li>
    <li>Save your changes and you're done.</li>
  </ol>

  <a id="mobile" href="#" data-hash="<?php echo $data; ?>">[<?php echo $title; ?>]</a>

  <?php endif; ?>

  <script src="./dev/script.js"></script>
</body>
</html>
