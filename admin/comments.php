<?php include("includes/header.php"); ?>



<?php
$comment = Comment::find_all();
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
                        All the comment list
                        <small>Subheading</small>
                    </h1>
                    <table class="table table-hover table-bordered ">
                        <thead>
                        <tr>
                            <td>Comment ID</td>
                            <td>Video ID</td>
                            <td>Author</td>
                            <td>Comment Body</td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($comment as $comment):?>


                            <tr>

                                <td><?php echo $comment->id; ?></td>
                                <td><?php echo $comment->video_id; ?></td>
                                <td><?php echo $comment->author; ?></td>
                                <td><?php echo $comment->body; ?></td>
                                <td><a href="delete_comment.php?id=<?php echo $comment->id;?>">Delete</a></td>

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