<?php
require_once("includes/header.php");

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



        <!--Top Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

            <!------------include the top_nav php file -------------------->
            <?php include("includes/top_nav.php"); ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include ("includes/left_nav.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>
<!--------------------------------include the index-content.php for right content------>
    <?php include("includes/index_content.php"); ?>


  <?php include("includes/footer.php"); ?>

    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}
?>