<?php snippet('header') ?>
  
  <main class="main" role="main">
    
    <header class="wrap">
      <h1><?= $page->title()->html() ?></h1>
      <div class="intro text">
        <?= $page->intro()->kirbytext() ?>
      </div>
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
              foreach($projects->sortBy('date_from', 'asc', 'date_to', 'asc')->flip() as $project) {
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