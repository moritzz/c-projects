<?php if ($page->cover_image()->isNotEmpty()): ?>
  <?php
    $image = $page->image($page->cover_image());
    $image_resized = $image->resize(720);
    $image_height = $image_resized->height();
    ?>
  <?php if ($page->cover_image()->isNotEmpty()): ?>
    <div class="c-cover" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('<?= $image_resized->url() ?>'); background-position-x: center;  background-position-y: center; background-repeat: no-repeat; background-size: cover;" data-caption="<?= $image->caption()->html(); ?>">
      <?php if ($image->html_title()->isNotEmpty()): ?>
        <div class="image">
          <div class="text">
            <?= $image->html_title()->html() ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
<?php endif; ?>