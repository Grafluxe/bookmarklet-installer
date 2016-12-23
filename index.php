<?php
/**
 * @author Leandro Silva | Grafluxe, 2016
 * @license MIT
 */

include "./dev/setup.php";
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
  <?php if ($err):?>

  <h1>Oops&hellip;</h1>
  <p>There was an error loading the bookmarklet. Please confirm your script path and/or try again later.</p>
  <p class="disable">Note that your link may have expired.</p>

  <?php else: ?>

  <a href="https://github.com/Grafluxe/bookmarklet-installer" style="position: absolute; top: 0; right: 0; border: 0;">
    <img src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png">
  </a>

  <div<?php echo ($bmk ? ' class="disable"' : ""); ?>>
    <h1>Desktop Install</h1>
    <p>Just drag this button into your bookmarks bar:</p>
    <a id="desktop" <?php echo ($bmk ? "" : 'href="' . $data . '" class="draggable active"'); ?>><?php echo $title; ?></a>
  </div>

  <hr<?php echo ($bmk ? ' class="disable"' : ""); ?>>

  <div>
    <h1>Mobile Install</h1>
    <p>Follow these steps:</p>

    <ol>
      <li<?php echo ($bmk ? ' class="disable"' : ""); ?>>
        Click on the below button.
        <ul>
          <li>This page will be reloaded with an updated URL.</li>
        </ul>
      </li>
      <li>
        Go through your normal steps to bookmark this page.
        <ul>
          <li>Name the bookmark "<?php echo $title; ?>"</li>
        </ul>
      </li>
      <li>
        Once the bookmark is saved, edit its URL.
        <ul>
          <li>Erase everything before, and including, the "?!=" characters.</li>
          <li>It may take a while to scroll to the beginning of the URL, but you'll only need to do this once.</li>
          <li>Your new URL should begin with the word "javascript:."</li>
        </ul>
      </li>
      <li>Save your changes and you're done.</li>
    </ol>

    <a id="mobile" <?php echo ($bmk ? 'class="disable"' : 'href="?!=' . $data . '" class="active"'); ?>><?php echo $title; ?></a><span id="msg"></span>
  </div>

  <?php endif; ?>

  <script>
    document.querySelector("#desktop").addEventListener("click", function (e) {
      e.preventDefault();

      if (e.target.className.indexOf("active") > -1) {
        alert("For desktop use, drag and drop this button into your bookmarks bar.");
      }
    });

    document.querySelector("#mobile").addEventListener("click", function (e) {
      e.target.className = "disable";
      document.querySelector("#msg").innerHTML = "Loading&hellip;"
    });
  </script>
</body>
</html>
