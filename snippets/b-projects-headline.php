<h2 id="b-projects-headline">
  <?php if ($page->projects_headline()->isNotEmpty()): ?>
    <?= $page->projects_headline()->html() ?>
  <?php else: ?>
    <?php if ($site->language() == 'de'): ?>
      Projektkatalog
    <?php else: ?>
      Project Catalogue
    <?php endif; ?>
  <?php endif; ?>
</h2>
