<?php if ($page->cover_image()->isNotEmpty()): ?>
  <?php
    $image = $page->image($page->cover_image());
    $image_resized = $image->resize(720);
    $image_height = $image_resized->height();
    ?>
  <?php if ($page->cover_image()->isNotEmpty()): ?>
    <figure class="c-inline-cover">
      <img src="<?= $image_resized->url() ?>" alt="<?= $image->html_title()->html() ?>">
      <?php if ($image->caption()->isNotEmpty()): ?>
        <figcaption><?= $image->caption()->html(); ?></figcaption>
      <?php endif; ?>
    </figure>
  <?php endif; ?>
<?php endif; ?>