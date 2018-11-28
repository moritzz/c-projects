<header class="b-header wrap">
  <h1><?= $page->title()->html() ?></h1>
  <?php if ($page->cover_image()->isNotEmpty()): ?>
    <?php $cover_set = true; $cover_type = $page->cover_view(); ?>
    <?php if ($cover_type == 'float'): ?>
      <?php snippet('c-cover-float', ['has_intro' => $page->intro()->isNotEmpty()]); ?>
    <? endif; ?>
  <? endif; ?>
  <?php if ($page->intro()->isNotEmpty() || $cover_set): ?>
    <div class="e-intro intro text <?= ($cover_set && $cover_type == 'float') ? 'has-cover ' : ''; ?><?= ($cover_set && $cover_type == 'inline') ? 'has-inline ' : ''; ?>">
      <?php if ($cover_set && $cover_type == 'inline'): ?>
        <?php snippet('c-cover-inline', ['has_intro' => $page->intro()->isNotEmpty()]); ?>
      <? endif; ?>
      <?php if ($page->cover_image()->isNotEmpty()): ?>
        <?= $page->intro()->kirbytexter(); ?>
      <?php else: ?>
        <?= $page->intro()->kirbytext(); ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <hr />
</header>
