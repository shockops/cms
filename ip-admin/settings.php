<?php
    require('be-header.php');
    require('./Controller/settingsController.php');
?>

<div class="container-fluid">
<div class="row">
<?php
    require('be-sidebar.php');

    if(isset($_POST['updateSEOText']))
    {
        $SEOText = $_POST['SEOText'];
        $updateSEOText = new UpdateSEOText();
        $updateSEOTexts = $updateSEOText->exec("UPDATE `siteassets` SET `content`= '$SEOText' WHERE `description` = 'SEO'");
    }
    if(isset($_POST['headerposted']))
    {
        $resfilename = "banner.png";
        $subpath = "Upload/Assets/";
        require('ftp-upload.php');
    }
    if(isset($_POST['logo1posted']))
    {
        $resfilename = "tsbw-logo.png";
        $subpath = "Upload/Assets/";
        require('ftp-upload.php');
    }
    if(isset($_POST['logo2posted']))
    {
        $resfilename = "ngd-logo.png";
        $subpath = "Upload/Assets/";
        require('ftp-upload.php');
    }
?>
    <div class="col-lg-4">
        <br>
            <h4>Design anpassen</h4>
            <!-- Header -->
            <form method="post" enctype="multipart/form-data">
            <h6>Header Bild ändern</h6>
            <img src="..\Upload\Assets\banner.png" alt="" style="width: 100%; max-height: 250px;">
            <hr>
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="" name="upload" accept=".png">
                <label class="custom-file-label" for="">Header auswählen</label>
                <input name="headerposted" type="hidden" value="true"/>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary" type="button" name="uploadheaderimage">Hochladen</button>
            </div>
            </div>
            </form>
            <hr class="yellow">
            <!-- TSBW Logo -->
            <form method="post" enctype="multipart/form-data">
            <h6>TSBW Logo ändern</h6>
            <img src="..\Upload\Assets\tsbw-logo.png" alt="" style="max-height: 125px;">
            <hr>
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="" name="upload" aria-describedby="" accept=".png">
                <label class="custom-file-label" for="">TSBW Logo auswählen</label>
                <input name="logo1posted" type="hidden" value="true"/>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary" type="button" name="uploadtsbwlogo">Hochladen</button>
            </div>
            </div>
            </form>
            <hr class="yellow">
            <!-- NGD Logo -->
            <form method="post" enctype="multipart/form-data">
            <h6>TSBW Logo ändern</h6>
            <img src="..\Upload\Assets\ngd-logo.png" alt="" style="max-height: 125px;">
            <hr>
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="" name="upload" aria-describedby="" accept=".png">
                <label class="custom-file-label" for="">NGD Logo auswählen</label>
                <input name="logo2posted" type="hidden" value="true"/>
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-primary" type="button" name="uploadngdlogo">Hochladen</button>
            </div>
            </div>
            </form>
            <hr class="yellow">
        <br>
    </div>
    <div class="col-lg-4">
        <br>
            <h4>SEO Text</h4>
            <div class="alert alert-warning">
                Hier können Sie die allgemeine Beschreibung der Website für die Suchmaschinenoptimierung (SEO) bearbeiten. Bitte verzichten Sie hierbei auf HTML-Tag-Elemente, um Komplikationen zu vermeiden.
            </div>
            <form method="post">
                <div class="form-group">
                    <?php
                        $SEOtext = new GetSEOText();
                        foreach ($SEOtext->get() as $SEOtexts) {
                            echo "<textarea name=\"SEOText\" class=\"form-control\" rows=\"25\">" . implode($SEOtexts) . "</textarea>";
                        }
                    ?>
                </div>
                <button type="submit" name="updateSEOText" class="btn btn-warning">SEO Text Updaten</button>
            </form>
        <br>
    </div>
    <div class="col-lg-4">
        <br>
            <h4>SFTP Server Einstellungen</h4>
            <div class="alert alert-danger">
                Hier können Sie die Verbindungsparameter für die SFTP-Verbindung bearbeiten. Bitte ändern Sie diese nur, wenn Sie sich damit auskennen und die neuen Verbindungsdaten bereits erfolgreich getestet haben.
            </div>
            <form method="post">
                <div class="form-group">
        
                            <textarea name="SEOText" class="form-control" rows="25" disabled>Wird im Laufe der Fortführung des Projekts, außerhalb der Abschlussarbeit, fertiggestellt.</textarea>
                    
                </div>
                <button type="submit" name="" class="btn btn-warning" disabled>SFTP Einstellungen Updaten</button>
            </form>
        <br>
    </div>
<?php
?>
</div>
</div>

<?php
    require('be-footer.php');
?>