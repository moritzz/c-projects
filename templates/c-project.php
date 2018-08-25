<?php snippet('header') ?>
  
  <?= css('assets/plugins/c-projects/css/index.css') ?>
  
  <main class="main" role="main">
    
    <header class="wrap">
      <h1><?= $page->title()->html() ?></h1>
      <div class="intro text">
        <?= $page->intro()->kirbytext() ?>
      </div>
      <hr />
    </header>
    
    <?php snippet('c-project', ['project' => $page]); ?>
    
    <div class="text wrap">
      <?= $page->text()->kirbytext() ?>
    </div>
    
  </main>

<?php snippet('footer') ?>