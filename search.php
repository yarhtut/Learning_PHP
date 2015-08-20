
<?php include "includes/header.php" ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                Video Search Page
                <small>search by tags</small>
            </h1>


            <?php

                if(isset($_POST['submit'])){
                    $search = $_POST['search'];
//                    echo $search;

                    $query = "SELECT * FROM `movie` WHERE `movie_tags` LIKE '%$search%'";
                    $search_query = mysqli_query($db,$query);

                    if(!$search_query){
                        die("Query Failed". mysqli_error($db));
                    }

                    $count = mysqli_num_rows($search_query);
                    if($count == 0){
                        echo "No result found in database";

                    }else{
                      //  $query = "SELECT * FROM `post`";
                       // $all_post= mysqli_query($db,$query);
                        while($row = mysqli_fetch_assoc($search_query)){
                            $movie_title = $row['movie_title'];
                            $movie_post_by = $row['movie_post_by'];

                            $movie_video = $row['movie_video'];
                            $movie_content = $row['movie_content'];

                            ?>
                            <!-- First Blog Post -->
                            <h2>
                                <a href="#"><?php echo $movie_title ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $movie_post_by ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on  </p>
                            <hr>
                            <video width="400" controls>
                                <source src="<?php echo $movie_video ?>" type="video/mp4">
                                <source src="<?php echo $movie_video ?>" type="video/ogg">

                            </video>

                            <hr>
                            <p><?php echo $movie_content ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>


                        <?php

                        }
                    }
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

        <?php include "includes/sidebar.php" ?>






    </div>
    <!-- /.row -->

    <?php include "includes/footer.php" ?>


