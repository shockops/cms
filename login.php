<?php
    session_start();
    require('database.php');
    require('./ip-admin/Controller/loginController.php');
    if(isset($_SESSION['userid'])){
        session_destroy();
    }

    if(isset($_GET['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $val = new ValidateLogin();
        $allval = $val->get((array('email' => $email)));

            foreach($allval as $vals)
            {
                if(empty($vals['user_ID']) === false && password_verify($password, $vals['password']))
                {
                    $_SESSION['userid'] = $vals['user_ID'];
                    $_SESSION['user_name'] = $vals['firstname'] . ' '.$vals['lastname'];
                    header('Location: ./ip-admin/home?D=1');
                }
                else
                {
                    $errorMessage = "E-Mail oder Passwort war ungültig<br>";
                }
            }
        }
?>

<!doctype html>
<html lang="de">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Leif Gutsmann">
    <link rel="icon" type="image/png" href="Upload/Assets/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./ip-admin/css/backend.css">
    <!-- Font Awesome Script? -->
    <script src="https://kit.fontawesome.com/68e53555bc.js"></script>
    <title>Admin » TSBW Husum » Infoportal</title>
    </head>
<body>
    <div class="be-login">
    <img src="Upload/Assets/ngd-logo.png" alt="">
    <br>
    <form action="?login=1" method="post" class="form-signin">
    <div class="mb-3">
    <label for="email">E-Mail-Adresse:</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" required>
    <div class="invalid-feedback">
    Please enter a valid email address.
    </div>
    </div>
    <div class="mb-3">
    <label for="password">Passwort:</label>
    <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="login">
    </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Start Footer Content -->
    <div class="be-footer text-center">
    Adminbereich des Infoportals | &copy; Leif Gutsmannn | <a href="#" class="be-footer-right"><img src="Upload/Assets/tsbw-logo.png" alt="" style="height: 40px;"></a>
    </div>
    <!-- End Footer Content -->
</body>
</html>

<?php

?>