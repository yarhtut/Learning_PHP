<?php
// configure database
$dsn      = 'mysql:dbname=video_tutorial;host=localhost';
$u = 'root';
$p = '';
Cartalyst\Sentry\Facades\Native\Sentry::setupDatabaseResolver(
new PDO($dsn, $u, $p));
