<?php
class GetAllUser extends DB {
        function get() {
            return $this->select("SELECT * FROM `user`");
        }
    }

class AddNewUser extends DB {
    function add($addnewuser) {
        return $this->exec("INSERT INTO `user` VALUES :firstname,:lastname,:email,:department,:phonenumber", $addnewuser);
    }
}

class GetSelectedUser extends DB {
    function get() {
        if(empty($_GET["user_ID"]))
        {
            $uID = 1;
        }
        else 
        {
            $get = $_GET["user_ID"];
            $uID = (int)$get;
        }
        return $this->select("SELECT * FROM `user` WHERE `user_ID` = $uID");
    }
}

class DeleteUserByID extends DB {
    function del($uID) {
        $uID = 3;
        return $this->exec("DELETE FROM `user` WHERE `user_ID` = $uID");
    }
}

class ChangeUserRights extends DB {
    function update($checked, $uID) {
        return $this->exec("UPDATE `rights` SET `rights`= $checked WHERE `user_ID` = $uID");
    }
}

class GetAllCategories extends DB {
    function get() {
        return $this->select("SELECT * FROM `category`");
    }
}

class GetPostsFromCateogry extends DB {
    function get($cID) {
        return $this->select("SELECT * FROM `post` WHERE `post_cat_ID` = $cID");
    }
}

class GetPostIDsFromRights extends DB {
    function get($uID) {
        return $this->select("SELECT `rights` FROM `rights` WHERE `user_ID` = $uID");
    }
}
?>