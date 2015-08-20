<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>

<?php ob_start();?>
<?php session_start(); ?>
<?php
if( !isset( $_SESSION['user_role'] )||  isset($_SESSION['logged_in']) == false ){
    header("Location: index.php");
}

if(!isset($_SESSION['user_role'])  || isset($_SESSION['user_role']) == "subscriber"||  isset($_SESSION['user_role']) == "admin" ) {


    ?>
    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column  <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1> -->
        <div class="">


            <?php
            if (isset($_GET['category'])) {
                $cat_id = $_GET['category'];
            }
            $query = "SELECT * FROM `movie` WHERE `cat_id` = '$cat_id'";
            $all_post = mysqli_query($db, $query);

            while ($row = mysqli_fetch_assoc($all_post)) {

                $movie_id = $row['movie_id'];
                $movie_title = $row['movie_title'];
                $movie_post_by = $row['movie_post_by'];

                $movie_video = $row['movie_video'];
                $movie_content = substr($row['movie_content'], 0, 200);


                //print_r ($query);
                ?>

                <!-- First Blog Post -->
                <h2>
                    <a href="movie.php?movie_id=<?php echo $movie_id;?>"><?php echo $movie_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $movie_post_by ?></a>
                </p>

                <hr>

                <video class="" controls>
                    <source  src="video/<?php echo $movie_video ?>" class="img-responsive video_size" type="video/mp4">
                    <source src="video/<?php echo $movie_video ?>" class="img-responsive video_size" type="video/mpeg">
                    <source src="video/<?php echo $movie_video ?>" class="img-responsive video_size" type="video/flv">
                    <source src="video/<?php echo $movie_video ?>" class="img-responsive video_size" type="video/webm">
                    Your browser does not support HTML5 video.
                </video>
                <hr>
                <p><?php echo $movie_content ?></p>






            <?php

            }
            ?>




            <!-- Pager
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>-->

        </div>




    </div>
    <!-- /.row -->

    <?php include "includes/footer.php" ?>


<?php

}