<article class="<?php print $classes . ' ' . $zebra; ?>"<?php print $attributes; ?>>
  
  <header>
    <?php print $picture ?>
    
    <?php /*
    <?php print render($title_prefix); ?>
    <h3<?php print $title_attributes; ?>><?php print $title ?></h3>
    <?php print render($title_suffix); ?>
    */?>
    <div class="submitted"><?php print '<div class="author"><span class="name">' . $author . '</span><span class="says"> says,</span></div><div class="date">' . $created . '</div>'; ?></div>
  </header>

  <div class="content"<?php print $content_attributes; ?>>
    <?php hide($content['links']); print render($content); ?>
    <?php if ($signature): ?>
    <div class="user-signature clearfix">
      <?php print $signature ?>
    </div>
    <?php endif; ?>
  </div>

  <?php if (!empty($content['links'])): ?>
    <footer>
      <?php print render($content['links']) ?>
    </footer>
  <?php endif; ?>

</article> <!-- /.comment -->
