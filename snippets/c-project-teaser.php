          <div class="project c-project is-teaser">
            
            <h3 class="b-title" id="<?= $project->title()->slug(); ?>">
              <?= ($source == 'children') ? $project->title()->link() : $project->title()->html(); ?>
            </h3>
            <div class="b-body">
              <?php if ($cover = $project->cover()->toFile()): ?>
                <div class="e-cover">
                  <figure>
                    <a <?= ($source == 'children') ? (' href="' . $project->url() . '"') : (' id=' . $project->title()->slug() . '-cover"'); ?>> <img src="<?= $cover->resize(1200)->url(); ?>" alt="<?= $page->title()->html() . ' | ' . $project->title()->html(); ?>" /></a>
                    <?php if ($cover->caption()->isNotEmpty()): ?>
                      <figcaption><?= $cover->caption()->html(); ?></figcaption>
                    <?php endif; ?>
                  </figure>
                </div>
              <?php endif; ?>
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
              <?php $category = $project->category()->value; ?>
              <?php if($selector == '%all%'): ?>
                <nav class="e-tags"><?= $page->t($category)->link($page->url() . '?category=' . urlencode($category) . $project->title()->anchor()); ?></nav>
              <?php else: ?>
                <nav class="e-tags"><?= $page->t($category); ?>, <?= str::link($page->url() . '?category=' . urlencode('%all%') . $project->title()->anchor(), 'Alle zeigen'); ?></nav>
              <?php endif; ?>
            </div>
            
            <hr />
            
          </div>
