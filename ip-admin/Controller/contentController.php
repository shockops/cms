<?php
class GetAllCategories extends DB {
        function get() {
            return $this->select("SELECT * FROM `category`");
        }
    }
class GetPostsFromCateogry extends DB {
    function get() {
        if(empty($_GET["cat_ID"]))
        {
            $cID = 1;
        }
        else 
        {
            $get = $_GET["cat_ID"];
            $cID = (int)$get;
        }
        return $this->select("SELECT * FROM `post` WHERE post_cat_ID = $cID");
    }
}
class GetDataFromPostByID extends DB {
    function get() {
        if(empty($_GET["post_ID"]))
        {
            $pID = 1;
        }
        else 
        {
            $get = $_GET["post_ID"];
            $pID = (int)$get;
        }
        return $this->select("SELECT * FROM `post` WHERE post_ID = $pID");
    }
}


?>