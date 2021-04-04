<?php
  if(empty($_GET['catID']))
  {
    $cat = "A";
  }
  else
  {
    $cat = $_GET['catID'];
  }
    require('data.php');
    require('database.php');
    require('./Controller/fe-headerController.php'); 
?>
<!doctype html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Leif Gutsmann">
    <?php 
      $SEOText = new GetSEOText(); 
      foreach($SEOText->get() as $ST) 
      {
        echo "<meta name=\"description\" content=\"" . implode($ST) . "\">";
      }
    ?>
    <link rel="icon" type="image/png" href="favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/custom.css">
    <link rel="stylesheet" media="screen and (min-device-width: 320px) and (max-device-width: 991px)" href="custom_mobile.css">
    <!-- Slick CSS  -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <title>TSBW Husum » Infoportal</title>
    <link rel="icon" type="image/png" sizes="32x32" href="Upload/Assets/favicon-32x32.png">
  </head>
<?php
  if($cat == "G")
  {
?>
  <body id="go">
  <?php
  }
  else if($cat == "N")
  {
    ?>
  <body id="nogo">
  <?php
  }
  else 
  {
    ?>
    <body>
    <?php
  }
?>
    <div class="container">
    <nav class="navbar navbar-light bg-primary navbar-expand-lg">
    <div class="container">
    <a class="navbar-logo" href="https://www.ngd.de" target="_blank"><img src="Upload/Assets/ngd-logo.png" alt="Logo" height="80""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse leftline" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto headeralign">
      <li class="nav-item">
        <a class="nav-link" href="index">Home</a>
      </li>
      <?php
      foreach($legende as $leg => $val)
      {
        if($leg == "KR")
                {
                  ?>
                  <li class="nav-item">
        <a class="nav-link" href="fe-category?catID=KR">Kommunikationsregeln</a>
      </li>
                <?php
                }
                else 
                {
        ?>
        <div class="dropdown">
        <li><a class="nav-link" href="fe-category?catID=<?php echo $leg; ?>"><?php echo $val; ?></a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              foreach($videos[$leg] as $vidscat => $val1)
              {
                ?>
                  <li><a class="dropdown-item" href="fe-video?videoID=<?php echo $vidscat; ?>&catID=<?php echo $leg ?>"><?php echo $val1; ?></a></li>
                <?php
              }
            ?>
          </ul>
        </li>
      </div>
        <?php
      }
    }
      ?>
    </ul>
    <a href="Upload\Download\Projekt_Reza_Fächer_06.08.2019.pdf" download><button type="button" class="btn btn-outline-warning form-inline btn-leftline" data-toggle="tooltip" data-placement="bottom" title="Downloaden Sie hier die aktuellste &#013;Version unseres handlichen Fächer. &#013;Digital, immer dabei.">Download</button></a>
  </div>
  </div>
    </nav>
    <div class="container header-banner">
      <img class="header-banner" src="Upload/Assets/banner.png" alt="Banner">
    </div>
</div>
<br>
<?php
?>