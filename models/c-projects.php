<?php 

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
  
// ===============================
// = Projects Containerist model =
// ===============================

class CProjectsPage extends ContaineristPage {

  protected $blueprint;
  protected $categories;
  protected $categories_table;
  
  const ERROR_INVALID_ADAPTER = 0;
  public static $adapters = array();
  
  // Load blueprint definition into cache and initiate pseudo field data
  
  public function __construct($parent, $dirname){
    $this->blueprint = data::read(kirby()->get('blueprint', 'c-projects'));
    if (isset($this->blueprint['fields']['projects']['fields']['category']['options']) && count($this->blueprint['fields']['projects']['fields']['category']['options']) > 0) {
      $this->categories_table['%all%'] = [
          'en' => 'All',
          'de' => 'Alle',
      ];
      foreach ($this->blueprint['fields']['projects']['fields']['category']['options'] as $key => $german) {
        $this->categories_table[$key] = [
          'en' => titleCase($key),
          'de' => $german,
        ];
      }
      $this->categories = new Field($this, 'categories', yaml::encode($this->categories_table));
    } else {
      $this->categories = new Field($this, 'categories', []);
    }
    parent::__construct($parent, $dirname);
  }
  
  public static function adapter($type) {

    if(isset(static::$adapters[$type])) return static::$adapters[$type];

    foreach(static::$adapters as $adapter) {
      if(is_array($adapter['type']) && in_array($type, $adapter['type'])) {
        return $adapter;
      } else if($adapter['type'] == $type) {
        return $adapter;
      }
    }

    throw new Error('Invalid adapter type', static::ERROR_INVALID_ADAPTER);

  }
  
  public function translate($key) {
    
    if (isset($this->categories_table[$key])) {
      
      $language = $this->site()->language()->code();
      
      if (isset($this->categories_table[$key][$language])) {
        return new Field ($this, $key, $this->categories_table[$key][$language]);
      } else {
        return new Field ($this, $key, "<!-- No category translation to '$language'  for key '$key' -->"); 
      }
      
    } else {
      return new Field ($this, 'category', "<!-- No category translation found for key '$key' -->");
    }
    
  }
  
  private function getProjects($type = 'structure') {
    
    $adapter = static::adapter($type);

    if(isset($adapter['get'])) {
      return call($adapter['get'], $this);
    } else {
      // return an empty pseudo field
      return new Field($this, 'projects', []);
    }

  }
  
  // ==========================
  // = Projects pseudo fields =
  // ==========================
  
  public function __call($key, $arguments = []) {
    switch ($key) {
      case 'categories':
        return $this->categories;
      case 't':
        if (isset($arguments[0])) {
          return $this->translate($arguments[0]);
        } else {
          return new Field ($this, 'category', '<!-- No key given for category name -->');
        }
      case 'projects':
        return $this->getProjects();
      default:
        return parent::__call($key, $arguments);
    }
  }
  
}

CProjectsPage::$adapters['structure'] = array(
  'type' => array('structure'),
  'get' => function($page) {
    if ($page->content()->has('projects')) {
      return $page->content()->get('projects')->toStructure();
    }
  },
);
