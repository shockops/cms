<?php
    require('be-header.php');
    require('./Controller/homeController.php');
?>
<div class="container-fluid">
<div class="row">
<?php
    require('be-sidebar.php');
    if(isset($_POST['updateNotes']))
    {
        $uID = $_SESSION['userid'];
        $notes = $_POST['notes'];
        $updatenotes = new UpdateNotes();
        $updateUnotes = $updatenotes->exec("UPDATE `user` SET `notes`= '$notes' WHERE `user_ID` = '$uID'");
    }
?>
<div class="col-lg-4">
        <br>
            <h4>Neue Aktivitäten</h4>
        <br>
        <!-- Log_ID, Beitrag Titel, Operation (ADD, UPDATE, DELETE), User-->
        <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Zeit</th>
            <th scope="col">Beitrag</th>
            <th scope="col">Operation</th>
            <th scope="col">User</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $act = new GetActivity();
            foreach ($act->get() as $acts) {
                    echo "<tr><td>" . $acts['timestamp'] ."</td><td><a href=\"../fe-video?videoID=" . $acts['post_ID'] . "&catID=" . $acts['cat_ID'] . " \" target=\"_blank\"><button type=\"button\" class=\"btn btn-primary\" disabled>Öffnen</button></a></td><td>" . $acts['operation'] . "</td><td>" . $acts['firstname'] . ' ' . $acts['lastname'] . "</td></tr>";
            }
        ?>
    </tbody>
</table>
            <div class="alert alert-secondary" role="alert">
                Wird im Laufe der Fortführung des Projekts, außerhalb der Abschlussarbeit, fertiggestellt.
            </div>
    </div>
    <div class="col-lg-4">
        <br>
            <h4>Logs</h4>
        <br>
        <form action=""> <!-- Speichern/Downloaden der Logs -->
        <div class="form-group">
            <textarea class="form-control" rows="28" id="" aria-describedby="" placeholder="" disabled><?php //$logs = "../logs.txt"; readfile($logs); ?>Wird im Laufe der Fortführung des Projekts, außerhalb der Abschlussarbeit, fertiggestellt.</textarea>
        </div>
        <a href="../logs.txt" download><button type="button" class="btn btn-warning" disabled>Logs Downloaden</button></a>
        </form>
    </div>
    <div class="col-lg-4">
        <br>
            <h4>Notizen</h4>
        <br>
        <form method="post">
        <div class="form-group">
            <?php
                $uID = $_SESSION['userid'];
                $note = new GetUserNotes();
                $notes = $note->get(array('uID' => $uID));
                foreach ($notes as $notesfdb) {
                    echo "<textarea name=\"notes\" class=\"form-control\" rows=\"28\">" . implode($notesfdb) . "</textarea>";
                }
            ?>
        </div>
        <button type="submit" name="updateNotes" class="btn btn-warning">Notizen Updaten</button>
        </form>
    </div>
<?php
?>
</div>
</div>
<?php
    require('be-footer.php');
?>