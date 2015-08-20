<?php
// set up autoloader
require ('vendor/autoload.php');

// configure database
require_once('admin/includes/db_login.php');

// log user out
Cartalyst\Sentry\Facades\Native\Sentry::logout();
header("Location: index.php");
?>

