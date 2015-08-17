<?php 
if (isset($_POST['code']) && $_POST['email']) {

  // set up autoloader
  require('..\vendor\autoload.php');

  // configure database
  $dsn      = 'mysql:dbname=video_tutorial;host=localhost';
  $u = 'root';
  $p = 'password';
  Cartalyst\Sentry\Facades\Native\Sentry::setupDatabaseResolver(new PDO($dsn, $u, $p));

  // find user by email address
  // attempt password reset
  try {
    $code = strip_tags($_POST['code']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlentities($_POST['password']);
    $password_repeat = htmlentities($_POST['password-repeat']);
    if ($password != $password_repeat) {
      throw new Exception ('Passwords do not match.');
    }
    
    $user = Cartalyst\Sentry\Facades\Native\Sentry::findUserByCredentials(array(
      'email' => $email
    ));
    
    if ($user->checkResetPasswordCode($code)) {
      if ($user->attemptResetPassword($code, $password)) {
        echo 'Password successfully reset.';
        header("Location: login.php");
      } else {
        throw new Exception('User password could not be reset.');  
      }
    } else {
      throw new Exception('User password could not be reset.');  
    }
  } catch (Exception $e) {
    echo $e->getMessage();
    exit;
  }
}
?>
<html>
<head></head>
<body> 
  <h1>Reset Password</h1>
  <form action="reset-password.php" method="post">
    Email address: <br/>
    <input type="text" name="email" /> <br/>
    Reset code: <br/>
    <input type="text" name="code" /> <br/>
    New password: <br/>
    <input type="password" name="password" /> <br/>
    New password (repeat): <br/>
    <input type="password" name="password-repeat" /> <br/>
    <input type="submit" name="submit" value="Change Password" />
  </form>
</body>
</html>