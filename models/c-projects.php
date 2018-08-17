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
    $categories_blueprint = $blueprint['fields']['projects']['fields']['category']['options'];
    $categories_table = [];
    foreach ($categories_blueprint as $english => $german) {
      array_push($categories_table, [
        'option' => $english,
        'en' => titleCase($english),
        'de' => $german,
      ]);
    }
    $categories_field = new Field($page, 'categories', yaml::encode($categories_table));
    return $categories_field;
  }
  
}
