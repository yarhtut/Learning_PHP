
<?php

    require_once('admin/includes/init.php');
    require_once('includes/header.php');


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
    header("Location: login.php");
    throw new Exception ('You don\'t have permission to view this page.');

}

    if(empty($_GET['id'])){
        redirect("index.php");
    }

    $video = Video::find_by_id($_GET['id']);


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
    $comment = Comment::find_the_comment($video->id);
?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->


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

                <div class="col-lg-5 col-md-7">
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


                <hr>


                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input  type="hidden" name="id" class="form-control" value="<?php echo $video->id; ?>"/>
                            <input type="text" name="author" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment:</label>
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Comment</button>
                    </form>
                </div>



                <!-- Posted Comments -->
                <?php foreach ($comment as $comment):?>
                    <hr>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small></small>
                        </h4>
                        <p><?php echo $comment->body; ?></p>
                    </div>
                </div>


                <?php endforeach;?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->


            </div>

        </div>
        <!-- /.row -->
<?php include "includes/footer.php" ?>

