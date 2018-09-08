          <div class="project">
            <h3>
              <?= ($source == 'children') ? $project->title()->link() : $project->title()->html(); ?>
            </h3>
            <div class="project-intro">
              <?= $project->intro()->kirbytext(); ?>
            </div>
            <div class="text">
              <?php if ($project->text()->isNotEmpty()): ?>
                <?= $project->text()->kirbytext(); ?>
              <?php endif; ?>
            </div>
            <?php $category = $project->category()->value; if($selector == '%all%'): ?>
            <div class="category"><?= $page->t($category)->link($page->url() . '?category=' . urlencode($category)); ?></div>
            <?php endif; ?>
          </div>
