
<?php include "includes/header.php" ?>

    <!-- Navigation -->
<?php include "includes/navigation.php" ?>

        <!-- Carousel -->
        <div class="container-fluid top_carousel">
            <div id="myCarousel" class="carousel slide row " data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="image\imgHeader2.jpg" class="img-responsive img-center" alt="About The Tour Coach">
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
                    <h2>Ian Godleman</h2>
                    <div class="media">
                        <a class="media-left media-middle" href="#"></a>
                        <div class="media-body">
                            Ian Godleman is widely recognized and regarded as one of Europe’s very best teaching professionals. With a reputation for
                            working at the very highest level he is still to this day just as passionate about bringing through youngsters and improvers as he
                            is working with a World class touring professional.<br><br>

                            What sets Ian apart from others is a flexibility and an approach that is genuinely tailored to the specific needs of that golfer. There
                            never is and never has been a “one size fits all template” as Ian states not everyone will fit a system!
                            <br><br>
                            It is his experience of teaching in over 30 different countries Worldwide and dealing with different cultures as well as conditions
                            and Tournament preparation with every level of golfer that instantly strikes you as unique.
                            <br><br>
                            Finally with the use of Trackman Ian is also able to take any element of guesswork out of teaching. As he says himself, if you
                            are really serious about your golf then you are disadvantaging yourself by not working with this machine and the data it delivers.</p>
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
                    </div><!-- /close thumbnail -->
                </div><!-- /close side panel -->
            </div><!-- /close side panel class.row -->


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
                                <strong>Email</strong><br>
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
        </div><!--/Container-->

        <?php include "includes/footer.php" ?>


