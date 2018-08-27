          <div class="project">
            <h3><?= ContaineristPage::datespan($project->date_from(), $project->date_to()); ?>: <?= $project->title()->html(); ?></h3>
            <?= $project->summary()->kirbytext(); ?>
            <?php $category = $project->category()->value; if($selector == '%all%'): ?>
            <div class="category"><?= $page->t($category)->link($page->url() . '?category=' . urlencode($category)); ?></div>
            <?php endif; ?>
          </div>
