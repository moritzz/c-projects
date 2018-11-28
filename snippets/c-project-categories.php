    <section class="b-navigation wrap">
      
      <nav accesskey="p" class="text e-categories">
        <?php 
          
          $selector = trim(urldecode($kirby->request()->get('category')));
          
          if ($page->categories()->isNotEmpty()) {
                        
            foreach($page->categories() as $key => $category) {
              
              if (!(is_null($key) || $key == '%all%') && $all_projects->filterBy('category', $key)->count() > 0) {
                echo $page->t($key)->link($page->url() . '?category=' . urlencode($key), ['class' => ('selector' . (($key == $selector) ? ' is-active' : ''))]) . ' ';
              }
              
            }            
          }
          
        ?>

      </nav>
            
    </section>
