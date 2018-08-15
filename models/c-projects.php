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
  }
}

class CProjectsPage extends ContaineristPage {
  
  public function categories() {
    $blueprint = data::read(kirby()->get('blueprint', 'c-projects'));
    $categories = $blueprint['fields']['projects']['fields']['category']['options'];
    var_dump($categories);
  }
  
}
