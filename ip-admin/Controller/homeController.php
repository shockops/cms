<?php
class GetActivity extends DB {
        function get() {
            return $this->select("SELECT `log_ID`, `cat_ID`, `post_ID`, `firstname`, `lastname`, `timestamp`, `operation` FROM `logs` inner join `user` on user.user_ID = logs.user_ID");
        }
    }

class GetUserDataForActivity extends DB {
        function get() {
            return $this->select("SELECT * FROM `users` WHERE user_ID = :acts['user_ID']");
        }
    }

class GetUserNotes extends DB {
    function get($uID) {
        return $this->select("SELECT notes FROM `user` WHERE user_ID = :uID", $uID);
    }
}

class UpdateNotes extends DB {
    function update($notes, $uID) {
        return $this->exec("UPDATE `user` SET `notes`= ':notes' WHERE `user_ID` = ':uID'", $notes, $uID);
    }
}

class GetCategoryShortcode extends DB {
    function get($catID) {
        return $this->get("SELECT 'cat_shortcode' FROM `category` WHERE `cat_ID` = :catID", $catID);
    }
}
?>





