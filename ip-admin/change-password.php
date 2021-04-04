<?php
    require('../database.php');
    require('./Controller/changePasswordController.php');
    
    session_start();
    $uID = $_SESSION['userid'];

    if(isset($_POST['update']))
    {
        $oldpassword = $_POST['oldpassword'];

        $getuser = new GetUserPassword();
        $getuserpassword = $getuser->get(array('uID' => $uID));

        foreach($getuserpassword as $getusers)
        {
            $oldpassword_hash = password_hash($oldpassword, PASSWORD_DEFAULT);

            if(password_verify($oldpassword, $getusers['password']))
            {
                if($_POST['newpassword1'] === $_POST['newpassword2'])
                {
                    $password_hash = password_hash($_POST['newpassword1'], PASSWORD_DEFAULT);
                }
                else
                {
                    $errorMessage = "Die Passwörter haben leider nicht übereingestimmt.";
                    echo $errorMessage . "<br>";
                }
                $update = new UpdatePassword();
                $updatepassword = $update->exec("UPDATE user SET password = :hash_password WHERE user_ID = " . $_SESSION['userid'] . "", (array('hash_password' => $password_hash)));
            }
            else
            {
                echo "Altes PW konnte nicht verifiziert werden" . "<br>";
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
    <link rel="icon" type="image/png" href="./media/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./css/backend.css">
    <!-- Font Awesome Script? -->
    <script src="https://kit.fontawesome.com/68e53555bc.js"></script>
    <title>Passwort ändern » TSBW Husum » Infoportal</title>
    </head>
<body>
    <div class="be-login">
    <img src="../Upload/Assets/corporate_design/ngd-logo.png" alt="">
    <h5>Bitte vergeben Sie eine neues Passwort.</h5>
    <form action="?update=1" method="post" class="form-signin">
    <div class="mb-3">
    <label for="password">Altes Passwort:</label>
    <input type="password" class="form-control" name="oldpassword" id="oldpassword">
    </div>
    <div class="mb-3">
    <label for="password">Neues Passwort:</label>
    <input type="password" class="form-control" name="newpassword1" id="newpassword1" required>
    </div>
    <div class="mb-3">
    <label for="password">Neues Passwort wiederholen:</label>
    <input type="password" class="form-control" name="newpassword2" id="newpassword2" required>
    </div>
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="update">
    </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Start Footer Content -->
    <div class="be-footer text-center">
    Adminbereich des Infoportals | &copy; Leif Gutsmannn | <a href="#" class="be-footer-right"><img src="../Upload/Assets/tsbw-logo.png" alt="" style="height: 40px;"></a>
    </div>
    <!-- End Footer Content -->
</body>
</html>
<?php
?>
