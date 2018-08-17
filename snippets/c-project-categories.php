    <section class="projects-navigation">
      
      <nav accesskey="p" class="text wrap categories">
        <?php 
          
          $selector = $kirby->request()->get('category');
          
          $language = $site->language()->code();
          
          foreach($page->categories()->toStructure() as $category) {
            
            $option = $category->option();
            echo $category->$language()->link($page->url() . '?category=' . urlencode($option), ['class' => 'selector' . ($option == $selector) ? ' selected' : '']) . ' ';
            
          }
          
        ?>
      </nav>
      
    </section>