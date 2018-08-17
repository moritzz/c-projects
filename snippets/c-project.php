          <div class="result">
            <h3><?= datespan($project->date_from(), $project->date_to()); ?>: <?= $project->title()->html(); ?></h3>
            <?= $project->summary()->kirbytext(); ?>
          </div>
