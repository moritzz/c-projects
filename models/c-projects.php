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
  
  static function categories() {
    $blueprint = data::read(kirby()->get('blueprint', 'c-projects'));
    $categories_raw = $blueprint['fields']['projects']['fields']['category']['options'];
    $categories_en = array_keys($categories_raw);
    array_walk($categories_en, function (&$item, $key) {
      $item = ucfirst($item);
    });
    $categories_data = new Data([
      'en'=> $categories_en,
      'de' => array_values($categories_raw),
    ]);
    $categories = new Structure($categories_data);
    var_dump($categories);
  }
  
}
