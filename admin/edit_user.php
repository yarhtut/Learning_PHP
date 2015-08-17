<?php include("includes/header.php");
 require('../vendor/autoload.php');
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
    header("Location: index.php");
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

    <!--Top Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->

        <!------------include the top_nav php file -------------------->
        <?php include("includes/top_nav.php"); ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include ("includes/left_nav.php"); ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       Edit User Page
                        <small>Your role is admin</small>
                    </h1>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group">
                            <label class="text-info" for="email">Eail address:</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $userArr['email']; ?>" >

                        </div>
                        <div class="form-group">
                            <label class="text-info" for="password">Password:</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $userArr['password']; ?>">

                        </div>

                        <div class="form-group">
                            <label class="text-info" for="first_name">First name:</label>
                            <input type="password" class="form-control" name="first_name" value="<?php echo $userArr['first_name']; ?>">

                        </div>

                        <div class="form-group">
                            <label class="text-info" for="last_name">Last name:</label>
                            <input type="password" class="form-control" name="last_name" value="<?php echo $userArr['first_name']; ?>" >

                        </div>
                        <div class="checkbox">


                                <label class="text-info" for="last_name">
                                    <input type="checkbox" name="activated" value="1"  />Activated <br/>
                                </label>

                                <input type="hidden" name="id" value="<?php echo $userArr['id']; ?>" /> <br/>

                        </div>
                        <div class="form-group">
                            <input type="submit" type="submit" name="submit" value="Update" class="btn btn-success">

                        </div>


                    </form>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->




    </div>
    <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>

<?php
}
?>
  <?php
} catch (Exception $e) {
echo $e->getMessage();
}
?>
