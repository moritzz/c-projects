          <div class="project">
            <h3>
              <?= ($source == 'children') ? $project->title()->link() : $project->title()->html(); ?>
            </h3>
            <div class="project-intro">
              <?= $project->intro()->kirbytext(); ?>
            </div>
            <?php if ($project->text()->isNotEmpty()): ?>
              <div class="text">
                <?= $project->text()->kirbytext(); ?>
              </div>
            <?php endif; ?>
            <?php if ($project->link()->isNotEmpty()): ?>
              <div class="text">
                <a href="<?= $project->link()->url(); ?>">Mehr im Web</a>
              </div>
            <?php endif; ?>
            <?php $category = $project->category()->value; if($selector == '%all%'): ?>
            <div class="category"><?= $page->t($category)->link($page->url() . '?category=' . urlencode($category)); ?></div>
            <?php endif; ?>
          </div>
