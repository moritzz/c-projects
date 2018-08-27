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

