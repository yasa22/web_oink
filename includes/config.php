<?php

// Define paths
define('RAIZ_APP', dirname(__DIR__));
define('RUTA_APP', '/web_oink');
define('RUTA_INCLUDES', RUTA_APP . '/includes');
define('RUTA_PAGINAS', RUTA_APP . '/public_html');
define('RUTA_IMG', RUTA_INCLUDES . '/img');

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

