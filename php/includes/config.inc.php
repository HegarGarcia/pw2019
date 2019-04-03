<?php

////////////////////////////////////////////////////////////////////////////////
// Configure the default time zone
////////////////////////////////////////////////////////////////////////////////
date_default_timezone_set('MST');

////////////////////////////////////////////////////////////////////////////////
// Configure the default currency
////////////////////////////////////////////////////////////////////////////////
setlocale(LC_MONETARY, 'en_US');

////////////////////////////////////////////////////////////////////////////////
// Define constants for database connectivty
////////////////////////////////////////////////////////////////////////////////
defined('DATABASE_HOST') ? null : define('DATABASE_HOST', 'localhost');
defined('DATABASE_NAME') ? null : define('DATABASE_NAME', 'cuartod');
defined('DATABASE_USER') ? null : define('DATABASE_USER', 'root');
defined('DATABASE_PASSWORD') ? null : define('DATABASE_PASSWORD', '');

////////////////////////////////////////////////////////////////////////////////
// Define absolute application paths
////////////////////////////////////////////////////////////////////////////////

// Use PHP's directory separator for windows/unix compatibility
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// Define absolute path to server root
defined('SITE_ROOT')
  ? null
  : define('SITE_ROOT', dirname(dirname(__FILE__)) . DS);

// Define absolute path to includes
defined('INCLUDE_PATH')
  ? null
  : define('INCLUDE_PATH', SITE_ROOT . 'includes' . DS);
defined('FUNCTION_PATH')
  ? null
  : define('FUNCTION_PATH', INCLUDE_PATH . 'functions' . DS);
defined('LIB_PATH')
  ? null
  : define('LIB_PATH', INCLUDE_PATH . 'libraries' . DS);
defined('MODEL_PATH')
  ? null
  : define('MODEL_PATH', INCLUDE_PATH . 'models' . DS);
defined('VIEW_PATH') ? null : define('VIEW_PATH', INCLUDE_PATH . 'views' . DS);
defined('COMPONENT_PATH')
  ? null
  : define('COMPONENT_PATH', INCLUDE_PATH . 'components' . DS);

// Define assets
defined('ASSETS_PATH')
  ? null
  : define('ASSETS_PATH', SITE_ROOT . 'assets' . DS);
defined('IMAGES_PATH')
  ? null
  : define('IMAGES_PATH', ASSETS_PATH . 'images' . DS);

////////////////////////////////////////////////////////////////////////////////
// Include library, helpers, functions
////////////////////////////////////////////////////////////////////////////////
require_once FUNCTION_PATH . 'functions.inc.php';
require_once LIB_PATH . 'database.class.php';
//require_once(MODEL_PATH.'usuarios.model.php');
?>
