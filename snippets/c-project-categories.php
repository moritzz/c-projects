    <section class="projects-navigation">
      
      <nav accesskey="p" class="text wrap categories">
        <?php 
          
          $selector = $kirby->request()->get('category');
          
          if ($page->categories()->isNotEmpty()) {
            foreach($page->categories()->toStructure() as $key => $category) {
              
              echo $page->t($key)->link($page->url() . '?category=' . urlencode($key), ['class' => ('selector' . (($key == $selector) ? ' is-active' : ''))]) . ' ';
              
            }            
          }
          
        ?>
      </nav>
      
    </section>
