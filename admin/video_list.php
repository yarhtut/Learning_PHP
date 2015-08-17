<?php include("includes/header.php"); ?>


<?php
    $videos = Video::find_all();
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
                        Video lists Page
                        <small>Subheading</small>
                    </h1>
                   <table class="table table-hover table-bordered ">
                       <thead>
                        <tr>
                            <td>Video Name</td>
                            <td>ID</td>
                            <td>File Name</td>
                            <td>Title</td>

                            <td>Description</td>
                            <td>Tag</td>
                        </tr>
                       </thead>
                       <tbody>
                        <?php foreach($videos as $video):?>


                            <tr>
                                <td><video width="220" controls>
                                        <source src="<?php echo $video->video_path(); ?>" type="video/mp4">
                                    </video>
                                    <div class="videos_link">
                                        <a href="delete_video.php/?id=<?php echo $video->id;?>">Delete</a>
                                        <a href="edit_video.php?id=<?php echo $video->id;?>">Edit</a>
                                        <a href="#">View</a>
                                    </div>
                                </td>
                                <td><?php echo $video->id; ?></td>
                                <td><?php echo $video->video_filename; ?></td>
                                <td><?php echo $video->video_title; ?></td>

                                <td><?php echo $video->video_description; ?></td>
                                <td><?php echo $video->video_tag; ?></td>
                            </tr>
                        <?php endforeach; ?>
                       </tbody>
                   </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>