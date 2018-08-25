<?php

// =======================
// = Component Registery =
// =======================

$kirby->set('blueprint', 'fields/date_span', __DIR__ . '/blueprints/fields/date_span.yml');
$kirby->set('blueprint', 'fields/category', __DIR__ . '/blueprints/fields/category.yml');
$kirby->set('blueprint', 'c-projects', __DIR__ . '/blueprints/c-projects.yml');
$kirby->set('blueprint', 'c-project', __DIR__ . '/blueprints/c-project.yml');
$kirby->set('controller', 'c-projects', __DIR__ . '/controllers/c-projects.php');
$kirby->set('template', 'c-projects', __DIR__ . '/templates/c-projects.php');
$kirby->set('template', 'c-project', __DIR__ . '/templates/c-project.php');
$kirby->set('snippet', 'c-projects', __DIR__ . '/snippets/c-projects.php');
$kirby->set('snippet', 'c-project-categories', __DIR__ . '/snippets/c-project-categories.php');
$kirby->set('snippet', 'c-project', __DIR__ . '/snippets/c-project.php');


// ===================
// = Model Registery =
// ===================

require_once(__DIR__ . '/models/c-projects.php');
$kirby->set('page::model', 'c-projects', 'CProjectsPage');

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

// Original Title Case script © John Gruber <daringfireball.net>
// Javascript port © David Gouch <individed.com>
// PHP port of the above by Kroc Camen <camendesign.com>

function titleCase($title) {
	//remove HTML, storing it for later
	//       HTML elements to ignore    | tags  | entities
	$regx = '/<(code|var)[^>]*>.*?<\/\1>|<[^>]+>|&\S+;/';
	preg_match_all ($regx, $title, $html, PREG_OFFSET_CAPTURE);
	$title = preg_replace ($regx, '', $title);
	
	//find each word (including punctuation attached)
	preg_match_all ('/[\w\p{L}&`\'‘’"“\.@:\/\{\(\[<>_]+-? */u', $title, $m1, PREG_OFFSET_CAPTURE);
	foreach ($m1[0] as &$m2) {
		//shorthand these- "match" and "index"
		list ($m, $i) = $m2;
		
		//correct offsets for multi-byte characters (`PREG_OFFSET_CAPTURE` returns *byte*-offset)
		//we fix this by recounting the text before the offset using multi-byte aware `strlen`
		$i = mb_strlen (substr ($title, 0, $i), 'UTF-8');
		
		//find words that should always be lowercase…
		//(never on the first word, and never if preceded by a colon)
		$m = $i>0 && mb_substr ($title, max (0, $i-2), 1, 'UTF-8') !== ':' && 
			!preg_match ('/[\x{2014}\x{2013}] ?/u', mb_substr ($title, max (0, $i-2), 2, 'UTF-8')) && 
			 preg_match ('/^(a(nd?|s|t)?|b(ut|y)|en|for|i[fn]|o[fnr]|t(he|o)|vs?\.?|via)[ \-]/i', $m)
		?	//…and convert them to lowercase
			mb_strtolower ($m, 'UTF-8')
			
		//else:	brackets and other wrappers
		: (	preg_match ('/[\'"_{(\[‘“]/u', mb_substr ($title, max (0, $i-1), 3, 'UTF-8'))
		?	//convert first letter within wrapper to uppercase
			mb_substr ($m, 0, 1, 'UTF-8').
			mb_strtoupper (mb_substr ($m, 1, 1, 'UTF-8'), 'UTF-8').
			mb_substr ($m, 2, mb_strlen ($m, 'UTF-8')-2, 'UTF-8')
			
		//else:	do not uppercase these cases
		: (	preg_match ('/[\])}]/', mb_substr ($title, max (0, $i-1), 3, 'UTF-8')) ||
			preg_match ('/[A-Z]+|&|\w+[._]\w+/u', mb_substr ($m, 1, mb_strlen ($m, 'UTF-8')-1, 'UTF-8'))
		?	$m
			//if all else fails, then no more fringe-cases; uppercase the word
		:	mb_strtoupper (mb_substr ($m, 0, 1, 'UTF-8'), 'UTF-8').
			mb_substr ($m, 1, mb_strlen ($m, 'UTF-8'), 'UTF-8')
		));
		
		//resplice the title with the change (`substr_replace` is not multi-byte aware)
		$title = mb_substr ($title, 0, $i, 'UTF-8').$m.
			 mb_substr ($title, $i+mb_strlen ($m, 'UTF-8'), mb_strlen ($title, 'UTF-8'), 'UTF-8')
		;
	}
	
	//restore the HTML
	foreach ($html[0] as &$tag) $title = substr_replace ($title, $tag[0], $tag[1], 0);
	return $title;
}