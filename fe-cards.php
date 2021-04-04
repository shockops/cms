<?php
    $vid = "KR1";
    $cat = "KR";
    require("fe-header.php");
    
?>
    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <!-- Start Carousel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php
                            foreach($videos[$cat] as $vidcat => $val) 
                            {
                            ?>
                                <img class="d-block w-100 carousel-item-border crossRotate" src="media\cards\<?php echo $vidcat; ?>.jpg" alt="First slide">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div> 
                <!-- End Carousel -->
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
    <div class="container">
<?php
    require("fe-footer.php");
?>