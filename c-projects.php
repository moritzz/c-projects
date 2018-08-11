<?php
  
// =======================
// = Component Registery =
// =======================

$kirby->set('blueprint', 'c-projects', __DIR__ . '/blueprints/c-projects.yml');
$kirby->set('template', 'c-projects', __DIR__ . '/templates/c-projects.php');
  
// ===========
// = Helpers =
// ===========

function datespan($field_from, $field_to) {
  if ($field_to->isNotEmpty()) {
    $html_time_format = '%Y-%m-%dT12:00:00';
    $from = new DateTime($field_from);
    $to = new DateTime($field_to);
    $diff = $from->diff($to);
    // print("DateInterval is as follows:");
    // print_r($diff);
    $print_date_format = '%d.%m.%y';
    if ($diff->m > 12) {
      $print_date_format = '%Y';
    } else if ($diff->m >= 11 && $diff->d >= 30) {
      $print_date_format = '%Y';
      $fromprint = strftime($print_date_format, $from->getTimestamp());
      $fromstamp = strftime($html_time_format, $from->getTimestamp());
      $toprint = strftime($print_date_format, $to->getTimestamp());
      $tostamp = strftime($html_time_format, $to->getTimestamp());
      return "<time datetime=\"$tostamp\">$toprint</time>";
    }else if ($diff->m > 1) {
      $print_date_format = '%B %Y';
    }
    $fromprint = strftime($print_date_format, $from->getTimestamp());
    $fromstamp = strftime($html_time_format, $from->getTimestamp());
    $toprint = strftime($print_date_format, $to->getTimestamp());
    $tostamp = strftime($html_time_format, $to->getTimestamp());
    return "<time datetime=\"$fromstamp\">$fromprint</time> - <time datetime=\"$tostamp\">$toprint</time>";
  } else {
    return datestamp($field_from);
  }
}

// Output date field as HTML timestamp
function datestamp($field, $variables = array()) {
  $from = new DateTime($field);
  $dateprint = strftime('%d.%m.%y', $from->getTimestamp());
  $datestamp = strftime('%Y-%m-%dT12:00:00', $from->getTimestamp());
  return "<time datetime=\"$datestamp\">$dateprint</time>";
};