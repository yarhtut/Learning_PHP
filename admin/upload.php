<?php include("includes/header.php");
require('../vendor/autoload.php');
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
<?php
    $message = "";
    if(isset($_POST['submit'])){
        $video = new Video();
        $video->video_title= $_POST['video_title'];
        $video->video_description= $_POST['video_description'];
        $video->set_file($_FILES['video_filename']);
        $video->video_tag =$_POST['video_tag'];

        if($video->save()){
            $message="video uploaded Succesfully";
        }else{
            $message = join("<br>",$video->errors);
        }
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
                        Upload Page
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-6">
                        <?php echo $message;?>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="caption">Title</label>
                                <input type="text" name="video_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="caption">Upload Video</label>
                                <input type="file" name="video_filename" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="caption">Description</label>
                                <textarea name="video_description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="caption">Tag</label>
                                <input type="text" name="video_tag" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary  " >
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>
    <?php
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
