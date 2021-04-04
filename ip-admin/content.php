<?php
    require('be-header.php');
    require('./Controller/contentController.php');
    require('ftp.php');

    if(isset($_POST['changeCategory']))
    {
        $selectedCat = $_POST['selectcategory'];
        header('Location: content?D=2&cat_ID=' . $selectedCat);
    }
    if(isset($_POST['preview']))
    {
        // echo "<script>alert('Preview Button funkt!');</script>";
    }
    if(isset($_POST['update']))
    {
        // echo "<script>alert('Update Button funkt!');</script>";
    }
    if(isset($_POST['uploadvideo']))
    {
        echo "<script>alert('Video Uplaod Button funkt!');</script>";
    }
    if(isset($_POST['uploadthumbnail']))
    {
        echo'<script>console.log("'.$source['tmp_name'].'");</script>';
        $realpath = realpath($source);
        pathinfo($_FILES['thumbnailpath']['name'], PATHINFO_FILENAME);
        echo'<script>console.log("'.$realpath.'");</script>';
    }
?>
<div class="container-fluid">
<div class="row">
<?php
    require('be-sidebar.php');

    $catisempty = false;
    $postisempty = false;
    $postfromidisempty = false;
?>
    <div class="col-lg-4">
        <br>
            <h4>Beitrag wählen</h4>
        <br>
        <!-- Choose Category -->
        <form action="" method="post">
        <div class="input-group">
        <select class="custom-select" name="selectcategory" id="selectcategory">
                <?php
                    $cat = new GetAllCategories();
                    if(empty($cat)) {                                                                   //Überprüfe ob es eine Rückgabe gibt, wenn nicht, dann setze die Value auf empty bei catisempty
                        $catisempty = true;
                    }
                    foreach($cat->get() as $cats)
                    {
                        echo '<option value=' . $cats['cat_ID'] . '>'. $cats['cat_name'] .'</option>';
                    }
                ?>
            </select>
            </div>
            <br>
            <button type="submit" name="changeCategory" class="btn btn-warning">Kategorie ändern</button>
            <button type="submit" name="addPost" class="btn btn-primary float-right" disabled>Neuer Post</button>
        </form>
        
<!-- End Choose Category -->
<br>
<!-- Posts in Category -->
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titel</th>
            <th scope="col">Bearbeiten</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $post = new GetPostsFromCateogry();
            if(empty($post)) {                                                                   //Überprüfe ob es eine Rückgabe gibt, wenn nicht, dann setze die Value auf empty bei postisempty
                $postisempty = true;
            }
            if(empty($_GET['cat_ID']))
            {
                $catID = 1;
            }
            else 
            {
                $catID = $_GET['cat_ID'];    
            }
            foreach ($post->get() as $posts) {
                echo "<tr><td>" . $posts['post_ID'] ."</td><td>" . $posts['post_name'] . "</td><td><a href=\"content?D=2&cat_ID=" . $catID . "&post_ID=" . $posts['post_ID'] . "\"><button type=\"button\" class=\"btn btn-primary\">Bearbeiten</button></a></td></tr>";
            }
        ?>
    </tbody>
</table>
<!-- End Posts in Category -->
    </div>
    <div class="col-lg-4">
        <br>
            <h4>Beitrag aktuell</h4>
        <br>
        <?php
            $crtpost = new GetDataFromPostByID();
            if(empty($crtpost)) {                                                                   //Überprüfe ob es eine Rückgabe gibt, wenn nicht, dann setze die Value auf empty bei postfromidisempty
                $postfromidisempty = true;
            }
            echo $postfromidisempty;
            foreach ($crtpost->get() as $crtpostdata)
            {
                print '<a href="" target="_blank"><button type="button" class="btn btn-primary" disabled>Link zu Post</button></a>';
        ?>
        <a href="/preview" target="_blank"><button name="" class="btn btn-warning" disabled>Vorschau erstellen</button></a> <!-- Funkt nicht wenn in Form?! -->
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Titel:</label>
            <input type="text" class="form-control" id="" aria-describedby="" value="<?php echo $crtpostdata['post_name']; ?>">
        </div>
        <div class="form-group">
            <label for="">Video:</label>
            <video controls poster="..<?php echo $crtpostdata['post_thumbnail_path']; ?>" style="width: 100%;">
                <source src="..<?php echo $crtpostdata['post_path_video']; ?>" type="video/mp4">
                <track src="..<?php echo $crtpostdata['post_path_subtitle']; ?>" kind="subtitles" srclang="de" label="Deutsch" default>
            </video>
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="videopath" aria-describedby="" accept=".mp4">
                <label class="custom-file-label" for="">Video auswählen</label>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary" type="button" name="uploadvideo">Hochladen</button>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Subtitle File:</label>
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="subtitlepath" aria-describedby="" accept=".vtt">
                <label class="custom-file-label" for="">Untertitel auswählen</label>
            </div>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="">Hochladen</button>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Thumbnail:</label>
            <!-- Current Image -->
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="thumbnailpath" aria-describedby="" accept=".png">
                <label class="custom-file-label" for="">Thumbnail auswählen</label>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary" type="button" name="uploadthumbnail">Hochladen</button>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Beschreibung:</label>
            <textarea class="form-control" rows="4" id="" aria-describedby=""><?php echo $crtpostdata['post_description']; ?></textarea>
        </div>
        </form>
        <?php
            }
        ?>
    </div>
    <div class="col-lg-4">
        <!-- Save Data from Edit in Array, which will also be used to pass new Var/Changes to DB -> Pass Data from array to Preview -->
        <br>
            <h4>Beitrag Vorschau</h4>
        <br>
        <?php
            $crtpost = new GetDataFromPostByID();
            foreach ($crtpost->get() as $crtpostdata)
            {
        ?>
        <a href="" target="_blank"><button type="button" class="btn btn-primary" disabled>Link zu Vorschau</button></a>
        <button type="submit" name="update" class="btn btn-danger" disabled>Updaten</button>
        <form action="" method="post">
        <div class="form-group">
        <label for="">Titel:</label>
        <div class="input-group">
            <input type="text" aria-label="" class="form-control" value="<?php echo $crtpostdata['post_name']; ?>" disabled>
            <div class="input-group-prepend">
                <span class="input-group-text">Aktueller Titel</span>
            </div>
            </div>
            </div>
        <div class="form-group">
            <label for="">Video:</label>
            <video controls poster="..<?php echo $crtpostdata['post_thumbnail_path']; ?>" style="width: 100%;">
                <source src="..<?php echo $crtpostdata['post_path_video']; ?>" type="video/mp4">
                <track src="..<?php echo $crtpostdata['post_path_subtitle']; ?>" kind="subtitles" srclang="de" label="Deutsch" default>
            </video>

            <div class="input-group">
            <input type="text" aria-label="" class="form-control" value="<?php echo $crtpostdata['post_path_video']; ?>" disabled>
            <div class="input-group-prepend">
                <span class="input-group-text">Ausgewähltes Video</span>
            </div>
            </div>

        </div>
        <div class="form-group">
            <label for="">Untertitel Datei:</label>
            <div class="input-group">
            <input type="text" aria-label="" class="form-control" value="<?php echo $crtpostdata['post_path_subtitle']; ?>" disabled>
            <div class="input-group-prepend">
                <span class="input-group-text">Ausgewählter Untertitel</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Thumbnail:</label>
            <!-- Current Image -->
            <div class="input-group">
            <input type="text" aria-label="" class="form-control" value="<?php echo $crtpostdata['post_thumbnail_path']; ?>" disabled>
            <div class="input-group-prepend">
                <span class="input-group-text">Ausgewähltes Thumbnail</span>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Beschreibung:</label>
            <div class="input-group">
                <textarea class="form-control" rows="4" id="" aria-describedby="" disabled><?php echo $crtpostdata['post_description']; ?></textarea>
                <div class="input-group-prepend">
                    <span class="input-group-text">Aktualisierte<br>Beschreibung</span>
                </div>
            </div>
        </div>
        </form>
        <?php
            }
            if($catisempty == true)
            {
                echo "Keine Kategorie gefunden";
            }
            else if($postisempty == true)
            {
                echo "Keine Posts gefunden";
            }
            else if($postfromidisempty == true)
            {
                echo "Keine Daten empfangen";
            }
        ?>
        <br>
    </div>
<?php
?>
</div>
</div>
<?php
    require('be-footer.php');
?>