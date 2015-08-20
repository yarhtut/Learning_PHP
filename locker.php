
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

    <!-- Carousel -->
    <div class="container-fluid top_carousel_locker">
        <div id="myCarousel" class="carousel slide row " data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="image\imgHeader1.jpg" class="img-responsive img-center" alt="About The Tour Coach">
                    <div class="container">
                        <div class="carousel-caption">
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/carousel -->
    </div>

    <!-- Page Content -->
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-9">
                <h2>Locker Room!</h2>
                <div class="media">
                    <a class="media-left media-middle" href="#"></a>
                    <div class="media-body">
                        Travelling all over the world may seem glamorous to some however it can be tiring and sometimes hard to keep in touch with
                        everyone. So coming soon to my pupils is MY LOCKER.</P><p>

                            MY LOCKER will give you your very own locker in the clubhouse where you can upload your scores, your Trackman reports and
                            videos of your swings for me to be able to dial into wherever I am in the World and within 24 hours you have the best reply and
                            correct information at your fingertips.</P><p>

                            As technology has evolved this system has been tried and tested by myself and over the last five years and it has really helped me
                            keep golfers more on track during the Winter / off seasons. This close continuity of coaching has also ensured that winter practice
                            for my pupils is more productive than ever.</P><p>

                        <h3>MY LOCKER is coming to you soon……</h3></p><br>

                        <div align="center">
                            <object class="embed-responsive-item">
                                <video autoplay loop >
                                    <source src="https://trackmanmedia.blob.core.windows.net/lesson-8eb6fe79-cf35-4b5d-9016-bd9ceaa08b0a/Trey%20Shedlock%202014-11-23-480p.mp4" />
                                </video>
                            </object>
                        </div>


                        <h3>Checkout The Tour Coach LOCKER ROOM coming soon</h3></p><br>
                    </div>
                </div>
            </div> <!--Close col 8-->

            <!--Side Panel Content .row-->
            <div class="col-md-3">
                <div class="thumbnail">

                    <!--Trackman .row-->
                    <img src="image/thumbnailTrackman.jpg" class="img-rounded"width="200" height="200" />
                    <div class="caption">
                    </div><br>

                    <!--ProGolfingTours .row-->
                    <img src="image/thumbnailProGolfingTours.jpg" class="img-rounded"width="200" height="200" />
                    <div class="caption">
                    </div><br>

                    <!--Golf Academy-->
                    <img src="image/thumbnailGolfAcademy.jpg" class="img-rounded"width="200" height="200" />
                    <div class="caption">
                    </div><br>
                </div>
            </div><!-- /close thumbnail -->
        </div><!-- /close side panel .row -->

        <!-- Feedback -->
        <!-- Button trigger feedback -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Contact
        </button>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">The Tour Coach</h4>
                    </div>

                    <!-- Query -->
                    <!-- Button trigger query -->
                    <div class="modal-body">
                        <address>
                            <img src="image/photoIanGodleman.jpg" class="img-rounded"width="320" height="280" /><br><br>
                            <strong>Ian Godleman</strong><br>
                            Manor Park, Wellington<br>
                            New Zealand, NZ<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                        <address>
                            <strong>Full Name</strong><br>
                            <a href="mailto:#">iangodleman@hotmail.uk</a>
                        </address>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Enquire</button>
        <!--/QueryModel-->


    </div>

    <?php include "includes/footer.php" ?>



<?php
    return;

}




?>



