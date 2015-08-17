<?php include("includes/header.php");?>
<?php require('../vendor/autoload.php'); ?>
<?php if (isset($_POST['submit'])):

// create group record
try {

    $group1 = Cartalyst\Sentry\Facades\Native\Sentry::createGroup(array(
        'name'    => 'Users',
        'permissions' => array(
            'watch' =>1,
            'view' => 0,
            'add' => 0,
            'edit' => 0,
            'delete' => 0

        )
    ));

    $group2 = Cartalyst\Sentry\Facades\Native\Sentry::createGroup(array(
        'name'    => 'Administrator',
        'permissions' => array(
            'watch' =>1,
            'view' => 1,
            'add' => 1,
            'edit' => 1,
            'delete' => 1
        )
    ));

} catch (Exception $e) {
    echo $e->getMessage();
}

// validate input and create user record
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
        'permissions' => $_POST['perms'],
        'activated' => true,
    ));
    $group = Cartalyst\Sentry\Facades\Native\Sentry::findGroupByName('Users');
    $user->addGroup($group);
    echo 'User successfully created.';
    header("Location: index.php");


} catch (Exception $e) {
    echo 'User could not be created. ' . $e->getMessage();
}
    ?>
<?php else: ?>
    <!--Top Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

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
                       Add User Page
                        <small>your role is admin</small>
                    </h1>
                    <?php include("includes/add_user_form.php");?>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->




    </div>
    <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>

<?php endif; ?>
