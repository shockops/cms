<?php
// FTP SETTINGS
define('FTP_HOST', '127.0.0.1');
define('FTP_USER', 'Infoportal');
define('FTP_PASSWORD', '');

// CONNECT TO FTP SERVER
$ftp = ftp_connect(FTP_HOST) or die("Failed to connect to " . FTP_HOST);

// LOGIN
if (ftp_login($ftp, FTP_USER, FTP_PASSWORD)) {
  // DO YOUR FTP MAGIC HERE
  $currentDir = ftp_pwd($ftp); // Get current directory
  $files = ftp_nlist($ftp, $currentDir); // List files & folders
  // $ok = ftp_chdir($ftp, "FOLDER"); // Change the current folder
  print_r($files);
} else {
  echo "Invalid user/password";
}

// CLOSE FTP CONNECTION
ftp_close($ftp);
?>