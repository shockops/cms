<?php
    require('../database.php');
    require('./Controller/headerController.php');
    session_start();
    if(empty($_SESSION['userid']))
    {
      header('Location: ../login.php');
    }
    
    if(isset($_POST['logout']))
    {
      session_destroy();
      session_start();
      
      header('Location: ../login');
    }
?>
<!doctype html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Leif Gutsmann">
    <link rel="icon" type="image/png" href="media/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./css/backend.css">
    <!-- Font Awesome Script? -->
    <script src="https://kit.fontawesome.com/68e53555bc.js"></script>
    <title>Admin » TSBW Husum » Infoportal</title>
  </head>
  <body>
    <div class="site">
      
    <div class="be-header">
    <div class="be-nav">      
      
          <div class="be-nav-right">
          <form action="" method="POST">
        <button type="submit" name="logout" class="btn btn-outline-danger be-nav-right"><i class="fa fa-fw fa-sign-out-alt"></i> Logout</button>
        </form>
        </div>
        <div class="be-nav-left-right" >Hallo <?php echo $_SESSION['user_name']; ?></div>
        </div>
    </div>
<?php

?>