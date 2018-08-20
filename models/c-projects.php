<?php 
  
/**
* Basic Article page model
*/

// Load Containerist base class if not loaded already
if (!class_exists('ContaineristPage')) {
  $plugin_dir_path = preg_replace('/(.*)\/c-projects\/models$/i', '$1', __DIR__);
  $containerist_model_path = $plugin_dir_path . '/containerist/models/containerist.php';
  if (file_exists($containerist_model_path)) {
    require_once($containerist_model_path);
  } else {
    throw new Exception('Containerist plugin missing for containerist plugin Projects.');
  }
}

class CProjectsPage extends ContaineristPage {

  protected $blueprint;
  protected $categories;
  
  public function __construct($parent, $dirname){
    $this->blueprint = data::read(kirby()->get('blueprint', 'c-projects'));
    if (isset($this->blueprint['fields']['projects']['fields']['category']['options']) && count($this->blueprint['fields']['projects']['fields']['category']['options']) > 0) {
      $categories_table = [[
          'option' => '%all%',
          'en' => 'All',
          'de' => 'Alle',
        ]];
      foreach ($this->blueprint['fields']['projects']['fields']['category']['options'] as $english => $german) {
        array_push($categories_table, [
          'option' => $english,
          'en' => titleCase($english),
          'de' => $german,
        ]);
      }
      $this->categories = new Field($this, 'categories', yaml::encode($categories_table));
    } else {
      $this->categories = new Field($this, 'categories', []);
    }
    parent::__construct($parent, $dirname);
  }
  
  public function categories() {
    return $this->categories;
  }
  
}
