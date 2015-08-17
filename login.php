<?php include("includes/header.php");?>
<?php
// set up autoloader
require ('vendor/autoload.php');

// configure database
require_once('admin/includes/db_login.php');

// if form submitted
if (isset($_POST['submit'])) {
    try {
        // validate input
        $username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
        $password = strip_tags(trim($_POST['password']));

        // set login credentials
        $credentials = array(
            'email'    => $username,
            'password' => $password,
        );

        // authenticate
        // if authentication fails, capture failure message
        Cartalyst\Sentry\Facades\Native\Sentry::authenticate($credentials, false);
    } catch (Exception $e) {
        $failMessage = $e->getMessage();
    }
}

// check if user logged in
if (Cartalyst\Sentry\Facades\Native\Sentry::check()) {
    $currentUser = Cartalyst\Sentry\Facades\Native\Sentry::getUser();
    header("Location: admin/index.php");
}
?>

<div class="container-fluid ">

    <div class="col-md-4 col-md-offset-3">

        <div class="bs-callout bs-callout-danger">
            <h4 class="bg-danger"><?php echo (isset($failMessage)) ?
                    $failMessage : null; ?></h4>
        </div>

        <?php if (isset($currentUser)): ?>
            Logged in as <?php echo $currentUser->getLogin(); ?>.
            <a href="logout.php">[Log out]</a> <br/>
            Permissions: <?php echo implode(', ',
                array_keys($currentUser->getMergedPermissions(), '1')); ?>
        <?php else: ?>

    <h1>Login</h1>

        <form id="login-id" action="" method="post">


            <div class="form-group">
                <label class="text-info" for="username">Username</label>
                <input type="text" class="form-control" name="username" value="" >

            </div>

            <div class="form-group">
                <label class="text-info" for="password">Password</label>
                <input type="password" class="form-control" name="password" value="">

            </div>


            <div class="form-group">
                <input type="submit" type="submit" name="submit" value="Log In" class="btn btn-primary">

            </div>
        </form>
        <a class="anchor" href="register.php"><em> >>Sign up</em></a>

    </div>




</div> <!--- container fluid -- end --- >
<?php endif; ?>