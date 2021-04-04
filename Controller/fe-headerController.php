<?php
class GetSEOText extends DB {
    function get() {
        return $this->select("SELECT `content` FROM `siteassets` WHERE `description` = 'SEO'");
    }
}
?>