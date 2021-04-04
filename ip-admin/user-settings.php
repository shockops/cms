<?php
    require('be-header.php');
    require('Controller/user-settingsController.php');
?>
<div class="container-fluid">
<div class="row">
<?php
    require('be-sidebar.php');

    if(isset($_POST['updateprofil']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname']; 
        $email = $_POST['email']; 
        $department = $_POST['department']; 
        $phonenumber = $_POST['phonenumber'];
        $uID = $_SESSION['userid'];

        $updpro = new UpdateProfil();
        $updprof = $updpro->exec("UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `department` = '$department', `phonenumber` = '$phonenumber' WHERE `user_ID` = '$uID'");
        
    }
?>
    <div class="col-lg-4">
        <br>
            <h4>Profildaten</h4>
            <?php
            $getownuser = new GetOwnUser();
            foreach($getownuser->get($_SESSION['userid']) as $seluser) 
            {
        ?>
        <form method="post">
        <div class="form-group">
            <label for="">Vorname:</label>
            <input type="text" class="form-control" id="" aria-describedby="" value="<?php echo $seluser['firstname']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="">Nachname:</label>
            <input type="text" class="form-control" id="" aria-describedby="" value="<?php echo $seluser['lastname']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="">E-Mail:</label>
            <input type="email" class="form-control" id="" aria-describedby="" value="<?php echo $seluser['email']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="">Abteilung:</label>
            <input type="text" class="form-control" id="" aria-describedby="" value="<?php echo $seluser['department']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="">Telefonnummer:</label>
            <input type="text" class="form-control" id="" aria-describedby="" value="<?php echo $seluser['phonenumber']; ?>" disabled>
        </div>
        </form>
        <?php
            }
        ?>
        <br>
    </div>
    <div class="col-lg-4">
        <br>
            <h4>Profil ändern</h4>
            <form method="post">
            <div class="form-group">
            <label for="">Vorname:</label>
            <input type="text" class="form-control" name="firstname" aria-describedby="" value="<?php echo $seluser['firstname']; ?>">
        </div>
        <div class="form-group">
            <label for="">Nachname:</label>
            <input type="text" class="form-control" name="lastname" aria-describedby="" value="<?php echo $seluser['lastname']; ?>">
        </div>
        <div class="form-group">
            <label for="">E-Mail:</label>
            <input type="email" class="form-control" name="email" aria-describedby="" value="<?php echo $seluser['email']; ?>">
        </div>
        <div class="form-group">
            <label for="">Abteilung:</label>
            <input type="text" class="form-control" name="department" aria-describedby="" value="<?php echo $seluser['department']; ?>">
        </div>
        <div class="form-group">
            <label for="">Telefonnummer:</label>
            <input type="text" class="form-control" name="phonenumber" aria-describedby="" value="<?php echo $seluser['phonenumber']; ?>">
        </div>
            <button type="submit" name="updateprofil" class="btn btn-warning">Profildaten updaten</button>
        </form>
        <br>
        <a href="change-password" target=""><button type="button" class="btn btn-danger">Passwort ändern</button></a>
    </div>
    <div class="col-lg-4">
        <br>
            <h4>Eigene Rechte</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Kategorie</th>
                        <th scope="col">Beitrag</th>
                        <th scope="col">Aufrufen</th>
                        <th scope="col">Bearbeiten</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        // $rights = new GetPostsWithRights();
                        // foreach ($rights->get($uID) as $Urights) {
                        //     echo "<tr><td>" . $Urights['user_ID'] ."</td><td>" . $Urights['firstname'] . "</td><td>" . $Urights['lastname'] . "</td><td><a href=\"user?user_ID=" . $Urights['user_ID'] . "\">Bearbeiten</a></td></tr>";
                        // }
                    ?>
                </tbody>
            </table>
            <div class="alert alert-secondary" role="alert">
                Wird im Laufe der Fortführung des Projekts, außerhalb der Abschlussarbeit, fertiggestellt.
            </div>
        <br>
    </div>
</div>
</div>
<?php
    require('be-footer.php');
?>