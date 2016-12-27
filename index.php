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
  <title>Bookmarklet Installer</title>
  <meta name="viewport" content="width=device-width">

  <meta name="apple-mobile-web-app-title" content="Bookmarklet Installer">
  <meta name="application-name" content="Bookmarklet Installer">
  <meta name="msapplication-config" content="img/icon/browserconfig.xml">
  <meta name="theme-color" content="#3c3c3c">
  <link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" href="img/icon/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="img/icon/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="img/icon/manifest.json">
  <link rel="mask-icon" href="img/icon/safari-pinned-tab.svg">

  <link rel="stylesheet" href="./dev/style.css">
</head>

<body>
  <header>
    <div id="header-title">
      Bookmarklet Installer<span class="dim"><?php echo ($title ? ": " . substr($title, 1, -1) : ""); ?></span>
    </div>
  </header>

  <div id="main">
<?php
    if ($err) {
      include "./dev/fail.php";
    } else {
      if ($install_pg || $mobile_step2) {
        include "./dev/pass.php";
      }

      include "./dev/create.php";
    }
?>
  </div>

  <a id="fork-me" href="https://github.com/Grafluxe/bookmarklet-installer" target="_blank">
    <img src="img/forkme.png" alt="Fork me on GitHub">
  </a>

  <script>
<?php if ($mobile_step2 && !$err):?>
    window.scrollTo(0, sessionStorage.getItem("bmk-y"));
    location.hash = "<?php echo $data; ?>";
<?php elseif (!$err): ?>
    var uri,
        pathFld = document.querySelector("#path-fld"),
        linkFld = document.querySelector("#link-fld");

    function createLink () {
      var title = document.querySelector("#title-fld").value,
          path = pathFld.value;

      if (!path) {
        alert("You must set a path to where your minified code is hosted.");
        return;
      }

      uri = "<?php echo $host_uri; ?>";
      uri += "?" + (title ? "title=" + title + "&" : "") + "path=" + encodeURIComponent(path);

      linkFld.value = uri;
      document.querySelector("#created").className = "";
      window.scrollTo(0, linkFld.offsetTop);
    }

    document.querySelector("#create").addEventListener("click", createLink);

    pathFld.addEventListener("keydown", function (e) {
      if (e.which === 13) {
        createLink();
      }
    });

    linkFld.addEventListener("click", function (e) {
      e.target.setSelectionRange(0, e.target.value.length)
    });

    document.querySelector("#visit").addEventListener("click", function () {
      location.href = uri;
    });

<?php if ($install_pg):?>
    document.querySelector("#desktop").addEventListener("click", function (e) {
      e.preventDefault();
      alert("For desktop use, drag and drop this button into your bookmarks bar.");
    });

    document.querySelector("#mobile").addEventListener("click", function (e) {
      sessionStorage.setItem("bmk-y", window.scrollY);
      e.target.className += " dim";
      document.querySelector("#msg").innerHTML = "Loading&hellip;"
    });
<?php endif; ?>
<?php endif; ?>
  </script>
</body>
</html>
