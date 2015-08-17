

<div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    Dashboard Page
                    <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
</li>
                    </ol>

                    <?php

                    $found_user =  Video::find_by_id(3);
                    echo $found_user->video_filename;


//
//                        $user = new User();
//                        $user->user_name="Example_username";
//                        $user->user_password ="password";
//                        $user->user_firstname= "Maen";
//                        $user->user_lastname = "Tawarasi";
//
//                        $user->create_user();
               // echo INCLUDES_PATH;



//                    $user = User::find_by_id(3);
//                    $user->user_password = "123456456";
//                    $user->update();
//
//                    $users = User::find_all();
//                    foreach($users as $user){
//                        echo $user->user_name;
//                    }
//                    $videos = Video::find_all();
//                    foreach($videos as $video){
//                        echo $video->video_title;
//                    }
//                    $video = new Video();
//                    $video->video_title = "Training 2";
//                    $video->video_description = "Admin is testing the video traing posts";
//                    $video->create();

                  /*  $user = User::find_user_by_id(2);
                    $user->user_name= "asdf";
                    $user->user_password= "123";
                    $user->save();*/




                    // call the User class method

                   // $found_user = User::find_user_by_id(2);
                    //$user = User::instantiation($found_user);

                   // echo  $user->user_firstname;
                    ?>
</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
