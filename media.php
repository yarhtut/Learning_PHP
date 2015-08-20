
<?php include "includes/header.php" ?>

    <!-- Navigation -->
<?php include "includes/navigation.php" ?>

        <!-- Carousel -->
        <div class="container-fluid top_carousel">
            <div id="myCarousel" class="carousel slide row " data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="image\imgHeader3.jpg" class="img-responsive img-center" alt="About The Tour Coach">
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
            <h2>Media</h2>
            <div class="media">
                <a class="media-left media-middle" href="#"></a>
                <div class="media-body">

                    From reading my regular articles soon to be published in The Cut magazine in New Zealand, up to seeing what’s happening in other
                    media, radio, television, our newsletter and newspaper articles you can follow it all here on the media page.
                    </p><p>
                        Also from time to time we will be having discussions and podcasts talking about everything form life on Tour to course strategy and
                        game management.</p><p>
                        So to keep in touch with what’s happening be sure to visit this page on a regular basis.</p><br>

                    <img src="image/promoMedia.jpg" class="img-rounded"width="800" height="223" /><p>
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


