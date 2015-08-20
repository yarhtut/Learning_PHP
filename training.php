
<?php

    require_once('admin/includes/init.php');
    require_once('includes/header.php');

require ('vendor/autoload.php');
require_once("admin/includes/db_login.php");

//get current user
$currentUser = Cartalyst\Sentry\Facades\Native\Sentry::getUser();

//check login
if(Cartalyst\Sentry\Facades\Native\Sentry::check()){
    // find all userss
    $users = Cartalyst\Sentry\Facades\Native\Sentry::findAllUsers();

}else{
    header("Location: login.php");
}
//check current user has access right
if (!$currentUser->hasAccess('watch')) {
    header("Location: ../training.php");
    throw new Exception ('You don\'t have permission to view this page.');

}

    if(empty($_GET['id'])){
        //redirect("index.php");
    }




    if(isset($_POST['submit'])){
      $video_id = trim($_POST['id']);
      $author = trim($_POST['author']);
      $body = trim($_POST['body']);

        $new_comment = Comment::create_comment($video_id,$author,$body);

        if($new_comment ){
            $new_comment->save();
//            print_r($author);
//            exit;
            redirect("training.php?id={$video->id}");

        }else{
            $message="There was some problems to comments";
        }
    }else{
        $author = "";
        $body = "";
    }
    //$comment = Comment::find_the_comment($video->id);

    $page = !empty($_GET['page'])? (int)$_GET['page']: 1;
    //set items for each page;
    $item_per_page = 2;
    //assign to total count to the total list of database;
    $item_total_count = Video::count_all_video();




    $paginate = new Paginate($page, $item_per_page, $item_total_count);

    $sql = "SELECT * FROM `videos` ";
    $sql .= "LIMIT {$item_per_page} ";
    $sql .= "OFFSET {$paginate->offset()}";


    $video = Video::find_by_query($sql);



?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php foreach($video as $video):?>

                <!-- Title -->
                <div class="row">

                <h2 class="pull-left text-primary"><?php echo $video->video_title; ?></h2>


                <!-- Author -->
                <p class="lead author_name">
                    by <small>Ian Godleman</small>
                </p>
                </div>

                <!-- Date/Time -->
<!--                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>-->


                <div class="row">

                <div class="col-lg-5 col-md-5">
                <!-- Preview Image -->
                    <video class="thumbnail img-responsive"  controls>
                        <source  src="admin/<?php echo $video->video_path(); ?>" type="video/mp4">
                    </video>
                </div>


                <!-- Post Content -->
                <div class="col-lg-7 col-md-7">
                <p><?php echo $video->video_description; ?></p>


                </div>

                </div>
                    <a class="btn btn-primary pull-right" href="detail_training.php?id=<?php echo $video->id;?>"> Read More >> </a>
                    <br/>

                <hr>
                  <?php endforeach;?>

                <!-- Blog Comments -->

                <!-- Comments Form -->

                </div>

                <div class="row">
                    <ul class="pager">
                        <?php
                            if($paginate->page_total() > 1){
                                if($paginate->has_next()){
                                   ?>
                                <li class="next"><a href="training.php?page=<?php echo $paginate->next();?>">Next</a></li>

                                <?php
                                }
                                for ($i=1; $i<= $paginate->page_total(); $i++){

                                    if($i == $paginate->current_page){
                                        ?>
                                        <li class="active"><a href="training.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                                        <?php
                                    }else{
                                        ?>
                                        <li ><a href=""><?php echo $i;?></a></li>

                                        <?php
                                    }
                                }
                                ?>



                                <?php

                                if($paginate->has_previous()){
                                    ?>
                                    <li class="previous"><a href="training.php?page=<?php echo $paginate->previous();?>">Previous</a></li>

                                    <?php

                                }
                            }
                        ?>



                    </ul>
                </div>




                <!-- Side Widget Well -->


            </div>

        </div>
        <!-- /.row -->
<?php include "includes/footer.php" ?>



