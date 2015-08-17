<?php
// set up autoloader
require ('..\vendor\autoload.php');

// configure database
$dsn      = 'mysql:dbname=video_tutorial;host=localhost';
$u = 'root';
$p = '';
Cartalyst\Sentry\Facades\Native\Sentry::setupDatabaseResolver(
    new PDO($dsn, $u, $p));

try {
$currentUser = Cartalyst\Sentry\Facades\Native\Sentry::getUser();

if (!$currentUser->hasAccess('view')) {
  throw new Exception ('You don\'t have permission to view this page.');

}
if (isset($_POST['submit'])) {

  try {
    $id = strip_tags($_POST['id']);    
    $user = Cartalyst\Sentry\Facades\Native\Sentry::findUserById($id);    
    $user->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $user->first_name = strip_tags($_POST['first_name']);
    $user->last_name = strip_tags($_POST['last_name']);
    $user->password = strip_tags($_POST['password']);
    $user->activated = strip_tags($_POST['activated']);

    
    if ($user->save()) {
      echo 'User successfully updated.';
     header("Location: list.php");
    } else {
      throw new Exception('User could not be updated.');
    }
  } catch (Exception $e) {
    echo 'User could not be created.';
    exit;
  }

} else if (isset($_GET['id'])) {

  try {
    $id = strip_tags($_GET['id']);    
    $user = Cartalyst\Sentry\Facades\Native\Sentry::findUserById($id);
    $userArr = $user->toArray();
  } catch (Exception $e) {
    echo 'User could not be found.';
    exit;
  }
  
?>
<html>
<head></head>
<body> 
  <h1>Edit User</h1>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    Email address: <br/>
    <input type="text" name="email" value="<?php echo $userArr['email']; ?>" /> <br/>
    Password: <br/>
    <input type="password" name="password" value="<?php echo $userArr['password']; ?>" /> <br/>
    First name: <br/>
    <input type="text" name="first_name" value="<?php echo $userArr['first_name']; ?>" /> <br/>
    Last name: <br/>
    <input type="text" name="last_name" value="<?php echo $userArr['last_name']; ?>" /> <br/>

    Activation: <br/>
    <input type="checkbox" name="activated" value="1" />Activated <br/>
    <input type="hidden" name="id" value="<?php echo $userArr['id']; ?>" /> <br/>
    <input type="submit" name="submit" value="Update" />
  </form>
</body>
</html>
<?php 
}
?>
  <?php
} catch (Exception $e) {
  echo $e->getMessage();
}
?>
