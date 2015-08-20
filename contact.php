
<?php include "includes/header.php" ?>

    <!-- Navigation -->
<?php include "includes/navigation.php" ?>

        <!-- Carousel -->
        <div class="container-fluid top_carousel">
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


<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <!-- Page Content -->
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-9">
                <h2>Contact</h2>
                <div class="media">
                    <a class="media-left media-middle" href="#"></a>
                    <div class="media-body">

                        <h3>Ian Godleman</h3>
                        <p>Ian Godleman</p>
                        <p>M: 64 022 045-1968</p>
                        <p>E: ian@thetourcoach.com</p><br>

                        <h3>Locations</h3>
                        <!--Google Maps API-->
                        <div id="map" style="width: 600px; height: 400px;"></div>

                        <script type="text/javascript">
                            var locations = [
                                ['<strong>The Tour Coach </strong><br> Manor Park GC <br>Lower Hutt, New Zealand', -41.153858513565986, 174.98414839611831, 1],
                                ['<strong>The Tour Coach </strong><br> Datchet Golf Course <br>Datchet, Berkshire SL3 9BP, United Kingdom', 51.484916,-0.583176, 3],
                                ['<strong>The Tour Coach </strong><br> Legend Golf and Safari Resort<br>Sterkrivier, South Africa', -24.232638,28.746756, 2],
                                ['<strong>The Tour Coach </strong><br> The Westin Resort Costa Navarino <b>Messinia, Pilos 240 01, Greece', 36.950509, 21.701045, 4],
                                ['<strong>The Tour Coach </strong><br> Golfclub Rastenmoos <br>6206 Neuenkirch, Switzerland', 47.106838,8.232044, 5]
                            ];

                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 2,
                                center: new google.maps.LatLng(9.9252, 78.11978),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var infowindow = new google.maps.InfoWindow();

                            var marker, i;

                            for (i = 0; i < locations.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    map: map
                                });

                                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                        infowindow.setContent(locations[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        </script>
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




