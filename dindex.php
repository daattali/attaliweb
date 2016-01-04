<?php
// define some variables that the attalitemplate.php will need
// __DIR__ is something like '/homepages/20/d93584634/htdocs/attali/France/Day 1'
// ROOT will be something like '/homepages/20/d93584634/htdocs/attali/'
$attaliIdx = strpos(__DIR__, 'attali');
$root = substr(__DIR__, 0, $attaliIdx+strlen('attali'));
define(ROOT, $root . '/');
define(IMAGES_DIR, '/.images/');
define(DIR, __DIR__);

// use the generic template that we built 
require ROOT . '.attalitemplate.php';
?>
