    <section class="projects-section">
      
      <div class="text wrap">
        <?php if ($site->language()->code() == 'de'): ?>
          <h2>Projekte</h2>
        <?php else: ?>
          <h2>Latest Projects</h2>
        <?php endif; ?>
        <?php
          $selector = $kirby->request()->get('category');
          $projects = (is_null($selector) || urldecode($selector) == '%all%') ? $page->projects()->toStructure() : $page->projects()->toStructure()->filterBy('category', urldecode($selector));
          
          if ($projects->count() > 0):
            foreach($projects->sortBy('date_from', 'asc', 'date_to', 'asc')->flip() as $project) {
              snippet('c-project', ['project' => $project]);
            }
          ?>
        <?php else: ?>
          <p class="result empty">
          <?php if ($site->language()->code() == 'de'): ?>
            Es wurden keine Projekte mit dieser Kategorie gefunden.
          <?php else: ?>
            We did not found any projects within this category.
          <?php endif; ?>
          </p>
        <?php endif; ?>
      </div>
      
    </section>
