<?php
define('DIR', dirname(__DIR__));
define('CONFIG_DIR', dirname(__DIR__) . '/src/config/');
/*
* ===============================================================
* INDEX - Bootstrapping / FrontCrontroller instance
* ===============================================================
*/
require DIR . '/src/core/Bootstrap.php';

$reflector = new ReflectionClass(APP);
$app = $reflector->newInstance();

$app->run();            