<?php snippet('header') ?>
  
  <main class="c-project main" role="main">
    
    <header class="wrap">
      <h1 class="b-title" id="<?= $page->title()->slug(); ?>">
        <?= $page->title()->html(); ?>
      </h1>

      <div class="b-body">
        
        <?php if ($cover = $page->cover()->toFile()): ?>
          <div class="e-cover">
            <figure>
              <img src="<?= $cover->resize(1200)->url(); ?>" alt="<?= $page->title()->html() . ' | ' . $page->title()->html(); ?>" />
              <?php if ($cover->caption()->isNotEmpty()): ?>
                <figcaption><?= $cover->caption()->html(); ?></figcaption>
              <?php endif; ?>
            </figure>
          </div>
        <?php endif; ?>
        
        <div class="e-intro intro text">
          <?= $page->intro()->kirbytext(); ?>
        </div>
        
        <hr />
        
        <?php if ($page->text()->isNotEmpty()): ?>
          <div class="e-text">
            <?= $page->text()->kirbytext(); ?>
          </div>
        <?php endif; ?>
        <?php if ($page->link()->isNotEmpty()): ?>
          <div class="e-link">
            <a href="<?= $page->link()->url(); ?>">Mehr im Web</a>
          </div>
        <?php endif; ?>
        <?php $category = $project->category()->value;>
        <nav class="e-tags"><?= $page->t($category)->link($page->parent()->url() . '?category=' . urlencode($category) . $project->title()->anchor()); ?></nav>

      </div>

    </header>
    
    <div class="text wrap">
      <?= $page->text()->kirbytext() ?>
    </div>
    
  </main>

<?php snippet('footer') ?>
