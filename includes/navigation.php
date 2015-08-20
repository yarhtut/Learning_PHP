

<?php
require_once('admin/includes/init.php');
require ('vendor/autoload.php');
require_once("admin/includes/db_login.php");
//get current user
$currentUser = Cartalyst\Sentry\Facades\Native\Sentry::getUser();


?>
<div class="">
    <nav class="navbar navbar-inverse navbar-fixed-top top_nav_bar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">The Tour Coach</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="trackman.php">Trackman</a></li>
                    <li><a href="media.php">Media</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="testimonial.php">Testimonials</a></li>
                    <li><a href="training.php">Training</a></li>

                    <?php if (isset($currentUser)): ?>
                        <li>

                            <a class="pull-right" href="admin/">Admin</a>

                        </li>
                    <li>

                        <a class="pull-right" href="logout.php">Logout</a>

                    </li>


                    <?php else:?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <?php endif;?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
