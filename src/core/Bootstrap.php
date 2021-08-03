<?php 
/*
* ===============================================================
* AUTOLOAD COMPOSER
* ===============================================================
*/
require DIR . '/vendor/autoload.php';
/*
* ===============================================================
* ERRORES
* ===============================================================
*/
// Desactivar toda notificación de error
// error_reporting(0);
/*
* ===============================================================
* SESSIONS & COOKIES
* ===============================================================
*/
session_start();
/*
* ===============================================================
* APP CONFIGURATIONS
* ===============================================================
*/
$app_config_json = file_get_contents(CONFIG_DIR . 'app.json');
$GLOBALS['config'] = json_decode($app_config_json, true);
$app = $GLOBALS['config']['front']['namespace'] . $GLOBALS['config']['front']['class'];

define('APP', $app);
unset($app); 
