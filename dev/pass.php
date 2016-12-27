<div<?php echo ($mobile_step2 ? ' class="dim"' : ""); ?>>
  <h1>Install on a Desktop</h1>
  <p>Just drag this button into your bookmarks bar and you're done:</p>
  <a id="desktop" <?php echo ($mobile_step2 ? 'class="btn"' : 'href="' . $data . '" class="btn draggable"'); ?>><?php echo $title; ?></a>
</div>

<hr<?php echo ($mobile_step2 ? ' class="dim"' : ""); ?>>

<div>
  <h1>Install on Mobile</h1>
  <p><b>Follow these steps:</b></p>

  <ol>
    <li<?php echo ($mobile_step2 ? ' class="dim"' : ""); ?>>
      Click on the "Next" button.
      <ul>
        <li>This page will be reloaded with an updated URL.</li>
      </ul>
    </li>
    <li>
      Go through your normal steps to bookmark this page.
      <ul>
        <li>If not already set, name your bookmark: &quot;<?php echo $title; ?>&quot;</li>
      </ul>
    </li>
    <li>
      Once the bookmark is saved, you'll need to edit its URL. Erase everything before, and including, the word: &quot;here#&quot;
      <ul>
        <li>It'll be near the beginning of the URL.</li>
        <li>You'll only need to do this once.</li>
        <li>Your new URL should begin with the word &quot;javascript.&quot;</li>
      </ul>
    </li>
    <li>Save your changes and you're done.</li>
  </ol>

  <a id="mobile" <?php echo ($mobile_step2 ? 'class="btn dim"' : 'class="btn" href="?!=here"'); ?>>Next</a><span id="msg"></span>
</div>

<hr<?php echo ($mobile_step2 ? ' class="dim"' : ""); ?>>
