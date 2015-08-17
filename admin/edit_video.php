<?php include("includes/header.php");


if(empty($_GET['id'])){
 redirect("video.php");
}
else{
    $video = Video::find_by_id($_GET['id']);

    if(isset($_POST['update'])){
      if($video){
         $video->video_title = $_POST['video_title'];
          $video->set_file($_FILES['video_filename']);
          $video->video_description =$_POST['video_description'];
          $video->video_tag =$_POST['video_tag'];

          $video->save();
      }
    }
}
    //$videos = Video::find_all();

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
                        Video Edit Page
                        <small>Subheading</small>
                    </h1>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-8">


                            <div class="form-group">
                                <label for="caption">Title</label>
                                <input type="text" name="video_title" class="form-control" value="<?php echo $video->video_title;?>">
                            </div>
                            <div class="form-group">
                                <label for="caption">Video</label>
                                <video width="120" controls>
                                    <source src="<?php echo $video->video_path(); ?>" type="video/mp4">
                                </video>
                                <input type="file" name="video_filename" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="caption">Description</label>
                                <textarea name="video_description" class="form-control" cols="30" rows="10"><?php echo $video->video_description;?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="caption">Tag</label>
                                <input type="text" name="video_tag" class="form-control" value="<?php echo $video->video_tag;?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update"  value="Update" class="btn btn-primary btn-lg ">
                            </div>

                    </div>



                    <div class="col-md-4" >
                        <div  class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                    </p>
                                    <p class="text ">
                                        Photo Id: <span class="data photo_id_box"><?php echo $video->id;?></span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data"><?php echo $video->video_filename;?></span>
                                    </p>
                                    <p class="text">
                                        File Tag: <span class="data"><?php echo $video->video_tag;?></span>
                                    </p>

                                </div>
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                        <a  href="delete_video.php?id=<?php echo $video->id; ?>" class="btn btn-danger btn-lg ">Delete</a>
                                    </div>
                                    <div class="info-box-update pull-right ">
                                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>