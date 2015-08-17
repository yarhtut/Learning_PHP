<?php include("includes/init.php");
if(!$session->is_signed_in()){redirect("login.php");}
?>
<?php
   if(empty($_GET['id'])){
       redirect("video_list.php");
   }
    $video = Video::find_by_id($_GET['id']);

        if($video){
            $video->delete_video();
            redirect("video_list.php");
        }
        else{
            redirect("video_list.php");
        }

?>
