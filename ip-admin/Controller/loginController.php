<?php
class ValidateLogin extends DB {
    function get($email) {
        return $this->select("SELECT * FROM user WHERE email = :email", $email);
    }
}
?>