<?php snippet('header') ?>

  <main class="main" role="main">
    
    <header class="wrap">
      <h1><?= $page->title()->html() ?></h1>
      <div class="intro text">
        <?= $page->intro()->kirbytext() ?>
      </div>
      <hr />
    </header>
    
    <pre><?php $page->categories(); ?></pre>
    
    <section class="news-section">
      
      <div class="text wrap">
        <?php if ($site->language() == 'de'): ?>
          <h2>Projekte</h2>
        <?php else: ?>
          <h2>Latest Projects</h2>
        <?php endif; ?>
        <?php $field = $page->projects()->toStructure()->sortBy('date_from', 'asc', 'date_to', 'asc')->flip(); ?>
        <?php $groups = $page->projects()->toStructure()->groupBy('category'); ?>
        <!-- <ul>
        <?php foreach ($groups as $group => $items): ?>
          <li><?= $group; ?></li>
        <?php endforeach; ?>
        </ul> -->
        <?php foreach($field as $projects): ?>
          <h3><?= datespan($projects->date_from(), $projects->date_to()); ?>: <?= $projects->title()->html(); ?></h3>
          <?= $projects->summary()->kirbytext(); ?>
        <?php endforeach; ?>
      </div>
      
    </section>

        
    <div class="text wrap">
      <?= $page->text()->kirbytext() ?>
    </div>
    
  </main>

<?php snippet('footer') ?>