<?php
    $category = $_GET['catID'];
    require("fe-header.php");
    //Columns must be a factor of 12 (1,2,3,4,6,12)
    $numofcolumns = 2;
    $rowcount = 0;
    $bootstrapcolumnwidth = 12 / $numofcolumns;
?>
<br>
<br>
<div class="container">
<div class="row">
<?php
    foreach($videos[$category] as $vid => $val)
    {
?>
        <div class="col-md-<?php echo $bootstrapcolumnwidth; ?> text-center">
            <a href="fe-video?videoID=<?php echo $vid; ?>&catID=<?php echo $category ?>">
                <img src="Upload/Thumbnails/<?php echo $vid; ?>.png" style="width: 100%;">
                <br>
                    <?php echo $val; ?>
            </a>
            <hr class="yellow">
        </div>
    <?php
    }
?>
</div>
<?php
    require("fe-footer.php");
?>