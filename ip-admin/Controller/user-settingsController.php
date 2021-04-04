<?php
class GetOwnUser extends DB {
    function get($uID) {
        return $this->select("SELECT * FROM `user` WHERE `user_ID` = $uID");
    }
}

class GetPostsWithRights extends DB {
    function get($uID) {
        return $this->select("SELECT * FROM `rights` WHERE `user_ID` = :uID", $uID);
    }
}

class UpdateProfil extends DB {
    function update($firstname, $lastname, $email, $department, $phonenumber, $uID) {
        return $this->exec("UPDATE `user` SET `firstname` = :firstname, `lastname` = :lastname, `email` = :email, `department` = :department, `phonenumber` = :phonenumber WHERE `user_ID` = :uID", $firstname, $lastname, $email, $department, $phonenumber, $uID);
    }
}
?>