          <div class="project">
            <h3>
              <?= ($source == 'children') ? $project->title()->link() : $project->title()->html(); ?>
            </h3>
            <?= $project->intro()->kirbytext(); ?>
            <?php $category = $project->category()->value; if($selector == '%all%'): ?>
            <div class="category"><?= $page->t($category)->link($page->url() . '?category=' . urlencode($category)); ?></div>
            <?php endif; ?>
          </div>
