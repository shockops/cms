<?php
    $vid = $_GET['videoID'];
    $cat = $_GET['catID'];
    require("fe-header.php");
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3><?php echo $videos[$cat][$vid]; ?></h3>       
            <hr class="yellow"> 
            <video controls poster="Upload/Thumbnails/<?php echo $vid; ?>.png" style="width: 100%;">
                <source src="Upload/Videos/<?php echo $vid; ?>.mp4" type="video/mp4">
                <track src="Upload/Subtitles/<?php echo $vid; ?>.vtt" kind="subtitles" srclang="de" label="Deutsch" default>
            </video>
            <hr class="yellow">
            <?php 
            if(!empty($descriptions["Content"][$vid])) {
                echo $descriptions["Content"][$vid]; 
            }
            else
            {
                $description = "Es wurde für dieses Video noch keine Beschreibung hinterlegt.";
                echo $description;
            }
            ?>
            <hr class="yellow">
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="scrolling-wrapper">
                <?php
                foreach($videos[$cat] as $vidcat => $val)
                {
                
                if($vid == $vidcat)
                {
                ?>
                    <div class="card card-active" id="<?php echo $vidcat; ?>">
                        
                <script>   
                $(document).ready(function(){
                    var elmnt = document.getElementById($("#<?php echo $vidcat; ?>").attr("id"));
                    $("div.scrolling-wrapper").scrollLeft(elmnt.offsetLeft-20);
                });
                </script>
                <?php
                }
                else
                {
                ?>
                    <div class="card">
                <?php
                }
                ?>
                    <a href="fe-video?videoID=<?php echo $vidcat; ?>&catID=<?php echo $cat ?>">
                        <video poster="Upload/Thumbnails/<?php echo $vidcat; ?>.png" style="height: 75px;">
                            <source src="Upload/Videos/<?php echo $vidcat; ?>.mp4" type="video/mp4">
                        </video><br>
                        <?php 
                        if(strlen($val) > 20)
                        {
                            $val = $shortener[$vidcat];
                            echo $val;
                        }
                        else
                        {
                            echo $val; 
                        }
                        ?>
                    </a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Warum braucht er hier einen Container für den Footer?! -->
<div class="container">
<?php
    require("fe-footer.php");
?>