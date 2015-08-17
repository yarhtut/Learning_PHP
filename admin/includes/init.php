<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT','C:'. DS . 'xampp' . DS . 'htdocs' . DS . 'yar_gallery');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');


require('../vendor/autoload.php');
require_once('includes/functions.php');
require_once('includes/config.php');
require_once('includes/database.php');
require_once('includes/db_object.php');
require_once('includes/video.php');
require_once('includes/db_login.php');
require_once('includes/user.php');
require_once('includes/session.php');


?>


