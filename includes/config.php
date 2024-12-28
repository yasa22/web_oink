<?php
session_start();

require_once dirname(__DIR__) . '/includes/Aplicacion.php';

// Define paths
define('RAIZ_APP', dirname(__DIR__));
define('RUTA_APP', '/web_oink');
define('RUTA_INCLUDES', RUTA_APP . '/includes');
define('RUTA_PAGINAS', RUTA_APP . '/public_html');
define('RUTA_IMG', RUTA_INCLUDES . '/img');

// Parámetros de configuración de la BD
define('BD_HOST', '127.0.0.1'); //localhost
define('BD_NAME', 'db_oink'); //id22072573_db_def 
define('BD_USER', 'root'); //id22072573_tiendaoink
define('BD_PASS', ''); //usuarioOink_2024

$app = Aplicacion::getInstance();
$app->init(['host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS]);


ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

