<?php
if (isset($_GET['id'])) {
// set up autoloader
  require_once("includes/header.php");

  // find user by id and delete
  try {
    $id = strip_tags($_GET['id']);    
    $user = Cartalyst\Sentry\Facades\Native\Sentry::findUserById($id);
    $user->delete();
    echo 'User successfully deleted.';
    header("Location: users.php");
  } catch (Exception $e) {
    echo 'User could not be deleted.';
  }
}    
?>
