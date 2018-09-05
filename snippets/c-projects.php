    <section class="projects-section">
      
      <div class="text wrap">
        <?php
          $selector = $kirby->request()->get('category');
          
          if (is_null($selector) || urldecode($selector) == '%all%') {
            $selector = '%all%';
            $projects = $page->projects();
          } else {
            $projects = $page->projects()->filterBy('category', urldecode($selector));
          }
          
          if ($projects->count() > 0):
            foreach($projects->sortBy('date_from', 'asc', 'date_to', 'asc')->flip() as $project) {
              snippet('c-project', ['project' => $project, 'selector' => $selector]);
            }
          ?>
        <?php else: ?>
          <p class="empty-result">
          <?php if ($site->language()->code() == 'de'): ?>
            Es wurden keine Projekte mit dieser Kategorie gefunden.
          <?php else: ?>
            We did not found any projects within this category.
          <?php endif; ?>
          </p>
        <?php endif; ?>
      </div>
      
    </section>
