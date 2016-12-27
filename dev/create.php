<div<?php echo ($mobile_step2 && !$err ? ' class="dim"' : ""); ?>>
  <h1>Share Your Own Bookmarklet</h1>
  <p>To create a share URL for your bookmarklet, define the bookmarklets title (optional) and a path to where your minified bookmarklet code is hosted. </p>
  <input id="title-fld" class="short" type="text" placeholder="Bookmarklet Title"><br>
  <input id="path-fld" type="text" placeholder="Path to minified JavaScript file"><br>

  <a id="create" class="btn" href="#create">Create Link</a>

  <div id="created" class="hide">
    <input id="link-fld" type="text" value="" readonly><br>
    <a id="visit" class="btn" href="#created">Visit Link</a>
  </div>
</div>
