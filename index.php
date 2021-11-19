<?php

use EmagGame\Kernel;

ini_set('display_errors', 1);
error_reporting(E_ALL);
clearstatcache();
define('ROOT', dirname(__FILE__));


require_once('vendor/autoload.php');

$config = require_once(ROOT . './config/app.php');

$kernel = new Kernel($config);
$kernel->run();

