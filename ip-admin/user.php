<?php
    require('be-header.php');
    require('Controller/userController.php');
    require('pw-generator.php');
    require('emailvalidator.php');

    if(isset($_POST['changeuserrights']))
    {
        // print '<pre>';print_r($_POST);print'</pre>';
        $uID = $_SESSION['userid'];
        $checked = implode(',', $_POST);
        // print '<pre>';print_r($checked);print'</pre>';
        $changeUrights = new ChangeUserRights();
        $changerights = $changeUrights->exec("UPDATE `rights` SET `rights` = '$checked' WHERE `user_ID` = $uID");
    }

    if(isset($_POST['deleteuser']))
    {
        $uID = $_GET['user_ID'];
        $delU = new DeleteUserByID();
        $deluser = $delU->exec("DELETE FROM `user` WHERE `user_ID` = $uID;");
    }

    if(isset($_POST['newuser']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $phonenumber = $_POST['phonenumber'];

        $newuser = new AddNewUser();
        $addnewuser = $newuser->exec("INSERT INTO user(firstname, lastname, email, department, phonenumber) VALUES (:firstname, :lastname, :email, :department, :phonenumber);", (array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'department' => $department, 'phonenumber' => $phonenumber)));

        if($addnewuser == true) 
        {
            echo "<script>alert('Neuer User wurde angelegt');</script>";
            $randompassword = password_hash(password_generate(10), PASSWORD_DEFAULT);
            $username = $firstname . " " . $lastname;
            $emailfromUser = $email;
            
            $preparemail = new SentNotificationOfRegistration();
            $sentmail = $preparemail->sentMail($randompassword, $username, $emailfromUser);
        }
    }
?>
<div class="container-fluid">
<div class="row">
<?php
    require('be-sidebar.php');
?>
    <div class="col-lg-4">
    <br>
        <h4>Bestehende User</h4>
    <br>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
            <th scope="col">Bearbeiten</th>
        </tr>
    </thead>
    <tbody>
        <?php $usr = new GetAllUser();
            foreach ($usr->get() as $user) {
                echo "<tr><td>" . $user['user_ID'] ."</td><td>" . $user['firstname'] . "</td><td>" . $user['lastname'] . "</td><td><a href=\"user?D=5&user_ID=" . $user['user_ID'] . "\">Bearbeiten</a></td></tr>";
            }
        ?>
    </tbody>
</table>
    </div>
    <div class="col-lg-4">
        <br>
            <h4>User Berechtigungen ändern | User löschen</h4>
        <br>
        <?php
            $editusr = new GetSelectedUser();
            foreach($editusr->get() as $seluser) 
            {
                $uID = $seluser['user_ID'];
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
        <div class="form-group">
            <label for="">Berechtigungen:</label>
            <?php
            $right = new GetPostIDsFromRights();
            // foreach($right->get($uID) as $rights)
            // {
            //     $postIDs = explode(',', $rights);
            // }

            // print '<pre>';print_r($postIDs);print'</pre>';

            $cat = new GetAllCategories();
            foreach($cat->get() as $cats)
            {
                echo "<h4>" . $cats['cat_name'] . "</h4>";
                $cID = $cats['cat_ID'];
                $post = new GetPostsFromCateogry();
                foreach ($post->get($cID) as $posts) {
                    ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="<?php echo $posts['post_ID']; ?>" value="<?php echo $posts['post_ID']; ?>">
                        <label class="form-check-label" for="<?php ?>"><?php echo $posts['post_name_shortcode']; ?></label>
                    </div>
                <?php
                }
            }
            ?>
        </div>
        <button type="submit" name="changeuserrights" class="btn btn-warning">User Berechtigungen ändern</button>
        <button type="submit" name="deleteuser" class="btn btn-danger">User löschen</button>
        </form>
        <?php
            }
        ?>
    </div>
    <div class="col-lg-4">
        <br>
            <h4>Neuen User anlegen</h4>
        <br>
        <form method="post">
        <div class="form-group">
            <label for="">Vorname:</label>
            <input type="text" class="form-control" name="firstname" aria-describedby="" placeholder="Vorname" required>
        </div>
        <div class="form-group">
            <label for="">Nachname:</label>
            <input type="text" class="form-control" name="lastname" aria-describedby="" placeholder="Nachname" required>
        </div>
        <div class="form-group">
            <label for="">E-Mail:</label>
            <input type="email" class="form-control" name="email" aria-describedby="" placeholder="E-Mail" required>
        </div>
        <div class="form-group">
            <label for="">Abteilung:</label>
            <input type="text" class="form-control" name="department" aria-describedby="" placeholder="Abteilung" required>
        </div>
        <div class="form-group">
            <label for="">Telefonnummer:</label>
            <input type="phone" class="form-control" name="phonenumber" aria-describedby="" placeholder="0431 2211 1222 11">
        </div>
        <div class="form-group">
            <label for="">Berechtigungen:</label>
            <?php
            $cat = new GetAllCategories();
            foreach($cat->get() as $cats)
            {
                echo "<h4>" . $cats['cat_name'] . "</h4>";
                $cID = $cats['cat_ID'];
                $post = new GetPostsFromCateogry();
                foreach ($post->get($cID) as $posts) {
                    ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="<?php ?>" value="<?php echo $posts['post_ID']; ?>">
                        <label class="form-check-label" for="<?php ?>"><?php echo $posts['post_name_shortcode']; ?></label>
                    </div>
                <?php
                }
            }
            ?>
        </div>
        <button type="submit" name="newuser" class="btn btn-success">Neuen User anlegen</button>
        </form>
    </div>
</div>
</div>
<?php
    require('be-footer.php');
?>