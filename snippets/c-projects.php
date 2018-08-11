    <section class="news-section">
      
      <div class="text wrap">
        <?php if ($site->language() == 'de'): ?>
          <h2>Projekte</h2>
        <?php else: ?>
          <h2>Latest Projects</h2>
        <?php endif; ?>
        <?php foreach($field->toStructure()->sortBy('date_from', 'asc', 'date_to', 'asc')->flip() as $projects): ?>
          <h3><?= datespan($projects->date_from(), $projects->date_to()); ?>: <?= $projects->title()->html(); ?></h3>
          <?= $projects->summary()->kirbytext(); ?>
        <?php endforeach; ?>
      </div>
      
    </section>
