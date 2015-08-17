<?php
// set up autoloader
require ('..\vendor\autoload.php');
require_once('includes/db_login.php');

try {
$currentUser = Cartalyst\Sentry\Facades\Native\Sentry::getUser();
  //check login
  if(Cartalyst\Sentry\Facades\Native\Sentry::check()){
    // find all userss
    $users = Cartalyst\Sentry\Facades\Native\Sentry::findAllUsers();

  }else{
    header("Location: ../login.php");
  }
if (!$currentUser->hasAccess('view')) {
  header("Location: ../video.php");
  throw new Exception ('You don\'t have permission to view this page.');

}
?>
  <?php include("includes/user_list.php");?>

<?php
} catch (Exception $e) {
  echo $e->getMessage();
}
?>