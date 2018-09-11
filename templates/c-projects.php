<?php snippet('header') ?>
  
  <main class="main" role="main">
    
    <header class="b-header wrap">
      <h1><?= $page->title()->html() ?></h1>
        <?php if ($hero = $page->hero()->toFile()): ?>
        <div class="e-hero">
          <figure>
            <img src="<?= $hero->resize(1200)->url(); ?>" alt="<?= $site->title()->html() . ' | ' . $page->title()->html(); ?>" />
            <?php if ($hero->caption()->isNotEmpty()): ?>
              <figcaption><?= $hero->caption()->html(); ?></figcaption>
            <?php endif; ?>
          </figure>
        </div>
      <?php endif; ?>
      <?php if ($page->intro()->isNotEmpty()): ?>
        <div class="e-intro intro text">
          <?= $page->intro()->kirbytext() ?>
        </div>
      <?php endif; ?>
      <hr />
    </header>
    
    <?php
      $selector = $kirby->request()->get('category');
      $all_projects = $page->projects();
      
      if (is_null($selector) || urldecode($selector) == '%all%') {
        $selector = '%all%';
        $projects = $all_projects;
      } else {
        $projects = $page->projects()->filterBy('category', urldecode($selector));
      }
    ?>
    
    <div class="mc-projects">
      
      <?php snippet('c-project-categories', ['all_projects' => $all_projects]); ?>

      <section class="projects-section">
        
        <div class="text wrap">
          <?php
            if ($projects->count() > 0):
              foreach($projects->sortBy('date_from', 'desc', 'date_to', 'desc') as $project) {
                snippet('c-project-teaser', ['project' => $project, 'selector' => $selector, 'source' => $page->source()->value]);
              }
            ?>
          <?php else: ?>
            <p class="empty-result">
            <?php if ($site->language()->code() == 'de'): ?>
              Es wurden keine Projekte mit dieser Kategorie gefunden.
            <?php else: ?>
              We did not found any projects within this category.
            <?php endif; ?>
            </p>
          <?php endif; ?>
        </div>
        
      </section>
      
      <div class="e-text wrap">
        <?= $page->text()->kirbytext() ?>
      </div>
      
    </div data-item="mc-projects">
    
  </main>

<?php snippet('footer') ?>