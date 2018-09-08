          <div class="project c-project is-teaser">
            
            <h3 class="b-title" id="<?= $project->title()->slug(); ?>">
              <?= ($source == 'children') ? $project->title()->link() : $project->title()->html(); ?>
            </h3>
            <div class="b-body">
              <div class="e-intro">
                <?= $project->intro()->kirbytext(); ?>
              </div>
              <?php if ($project->text()->isNotEmpty()): ?>
                <div class="e-text">
                  <?= $project->text()->kirbytext(); ?>
                </div>
              <?php endif; ?>
              <?php if ($project->link()->isNotEmpty()): ?>
                <div class="e-link">
                  <a href="<?= $project->link()->url(); ?>">Mehr im Web</a>
                </div>
              <?php endif; ?>
              <?php $category = $project->category()->value; if($selector == '%all%'): ?>
                <nav class="e-tags"><?= $page->t($category)->link($page->url() . '?category=' . urlencode($category) . $project->title()->anchor()); ?></nav>
              <?php else: ?>
                <nav class="e-tags"><?= str::link($page->url() . '?category=' . urlencode('%all%') . $project->title()->anchor(), 'Alle'); ?></nav>
              <?php endif; ?>
            </div>
            
            <hr />
            
          </div>
