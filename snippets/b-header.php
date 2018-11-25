<header class="wrap">
  <h1><?= $page->title()->html() ?></h1>
  <?php if ($page->cover_image()->isNotEmpty() && $page->cover_view() == 'float'): ?>
    <?php snippet('c-cover-float', ['has_intro' => $page->intro()->isNotEmpty()]); ?>
  <?php endif; ?>
  <?php if ($page->intro()->isNotEmpty()): ?>
    <div class="e-intro intro text <?= ($page->cover_image()->isNotEmpty()) ? 'has-cover' : ''; ?>">
      <?php if ($page->cover_image()->isNotEmpty()): ?>
        <?= $page->intro()->kirbytexter(); ?>
      <?php else: ?>
        <?= $page->intro()->kirbytext(); ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <hr />
</header>
