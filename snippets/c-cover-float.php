<?php if ($page->cover_image()->isNotEmpty()): ?>
  <?php
    $file = $page->cover_image()->toFile();
    $image = $file->resize(720);
    ?>
  <?php if ($page->cover_image()->isNotEmpty()): ?>
    <div class="c-cover is-float <?= ($has_intro) ? 'has-intro' : ''; ?> " style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('<?= $image->url() ?>'); background-position-x: center;  background-position-y: center; background-repeat: no-repeat; background-size: cover;">
      <div class="image">
        <div class="text">
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>