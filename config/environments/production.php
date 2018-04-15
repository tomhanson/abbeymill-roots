<?php

$test = $_SERVER['DATABASE_URL'];
$test1 = getenv('DATABASE_URL');
var_dump($test);
var_dump($test1);
$endpoint = 'mysql://tom:FClifesearch2@wordpress.cbm7nzvweui5.us-east-1.rds.amazonaws.com/abbeymill';
var_dump($endpoint);
$_dbsettings = parse_url($endpoint);/* Production */
define('DB_NAME',       trim($_dbsettings["path"],"/"));
define('DB_USER',       $_dbsettings["user"]             );
define('DB_PASSWORD', $_dbsettings["pass"]          );
define('DB_HOST',     $_dbsettings["host"]          );
define('WP_HOME', getenv('WP_HOME'));
define('WP_SITEURL', getenv('WP_SITEURL'));
var_dump(trim($_dbsettings["path"],"/"));
var_dump($_dbsettings["user"] );
var_dump($_dbsettings["pass"]);
var_dump($_dbsettings["host"]);
var_dump(getenv('WP_HOME'));
ini_set('display_errors', 0);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', false);
define('DISALLOW_FILE_MODS', true); // this disables all file modifications including updates and update notifications
