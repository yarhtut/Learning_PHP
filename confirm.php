<?php 
if (isset($_GET['code']) && $_GET['email']) {

  // set up autoloader
  require('..\vendor\autoload.php');

// configure database
  $dsn      = 'mysql:dbname=video_tutorial;host=localhost';
  $u = 'root';
  $p = '';
  Cartalyst\Sentry\Facades\Native\Sentry::setupDatabaseResolver(
      new PDO($dsn, $u, $p));

  // find user by email address
  // activate user with activation code
  try {
    $code = strip_tags($_GET['code']);
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
    $user = Cartalyst\Sentry\Facades\Native\Sentry::findUserByCredentials(array(
      'email' => $email
    ));
    if ($user->attemptActivation($code)) {
      echo 'User activated.';
    } else {
      throw new Exception('User could not be activated.');  
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
?>
