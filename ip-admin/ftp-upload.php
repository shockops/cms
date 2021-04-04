<?php
// (0) FTP SETTINGS
define('FTP_HOST', '127.0.0.1');
define('FTP_USER', 'Infoportal');
define('FTP_PASSWORD', '');

// (1) CONNECT TO FTP SERVER
$ftp = ftp_connect(FTP_HOST) or die("Failed to connect to " . FTP_HOST);

// (2) LOGIN
if (ftp_login($ftp, FTP_USER, FTP_PASSWORD)) {
  // (3) UPLOAD
  $source = $_FILES['upload']['tmp_name']; // Source file on server
  if (empty($resfilename))  //Wenn $resfilename = Reservierter Datei Name leer ist, dann nehme den Namen der Datei, wenn $resfilename, also ein reservierter Dateiname übergeben wurde, dann verwende diesen. Soll in im frühem Stadium dieser Version die Möglichkeit bereitstellen Assets (Header Image & Logos) auszutauschen, ohne deren Pfade und Namen dynamisch speichern zu müssen. Der Nachteil ist jedoch, das die alten Dateien dadurch erstmal überschrieben werden.
  {
    $destination = $_FILES['upload']['name']; // Save to this file on FTP server
  }
  else
  {
    $destination = $resfilename; // Save to this file on FTP server
  }
  if (ftp_chdir($ftp, $subpath)) {
  if (ftp_put($ftp, $destination, $source, FTP_BINARY)) {
    // echo "Uploaded to $destination";
  } else {
    echo "Error uploading $source";
  }
} 
} else {
  echo "Invalid user/password";
}
// (4) CLOSE FTP CONNECTION
ftp_close($ftp);
?>