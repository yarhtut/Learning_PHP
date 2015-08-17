<?php include("includes/header.php");?>
<?php
if (isset($_POST['submit'])) {
  // set up autoloader
  require('vendor/autoload.php');
  require_once('admin/includes/db_login.php');
  // validate input and create user record
  // send activation code by email to user
  try {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $fname = strip_tags($_POST['first_name']);
    $lname = strip_tags($_POST['last_name']);
    $password = strip_tags($_POST['password']);
    $user = Cartalyst\Sentry\Facades\Native\Sentry::createUser(array(
        'email'    => $email,
        'password' => $password,
        'first_name' => $fname,
        'last_name' => $lname,
        'permissions' => array('watch' => '1'),
        'activated' => true

    ));

    $code = $user->getActivationCode();
    //echo $code;
    
    $subject = 'Your activation code';
    $message = 'Code: ' . $code;
    $headers = 'From: webmaster@example.com';
    if (!mail($email, $subject, $message, $headers)) {
      throw new Exception('Email could not be sent.');
    }    
    
    echo 'User successfully registered but wait for the Admin Activation';
    header("Location: video.php");
  } catch (Exception $e) {
    echo $e->getMessage();
    exit;
  }
}
?>
<div class="container-fluid ">

  <div class="col-md-4 col-md-offset-3">


  <h1>Register</h1>
  <form action="register.php" method="post">
    <div class="form-group">
      <label class="text-info" for="email">Eail address:</label>
      <input type="text" class="form-control" name="email" value="" >

    </div>
    <div class="form-group">
      <label class="text-info" for="password">Password:</label>
      <input type="password" class="form-control" name="password" value="">

    </div>

    <div class="form-group">
      <label class="text-info" for="first_name">First name:</label>
      <input type="password" class="form-control" name="first_name" value="">

    </div>

    <div class="form-group">
      <label class="text-info" for="last_name">Last name:</label>
      <input type="password" class="form-control" name="last_name" value="">

    </div>

    <div class="form-group">
      <input type="submit" type="submit" name="submit" value="Register" class="btn btn-success">

    </div>



</form>
    </div>
  </div>