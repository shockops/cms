<?php
class UpdatePassword extends DB {
    function update($hash_password) {
        return $this->exec("UPDATE user SET password = :hash_password WHERE user_ID = " . $_SESSION['userid'] . "", $hash_password);
    }
}

class GetUserPassword extends DB {
    function get($uID) {
        return $this->select("SELECT * FROM user WHERE user_ID = :uID", $uID);
    }
}
?>