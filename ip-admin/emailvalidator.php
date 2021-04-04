<?php
class SentNotificationOfRegistration {
    function sentMail($randompassword, $username, $emailfromUser){

    $betreff = "Sie wurden ";
    $from = "From: Admin Infoportal <Admin.Infoportal@TSBW.Infoportal.de>";
    $text = "Hier sollte ein Link, der Name des Users und das random PW sthen, und das als schöne HTML Mail.";
    
    mail($emailfromUser, $betreff, $text, $from);
    }
}
?>