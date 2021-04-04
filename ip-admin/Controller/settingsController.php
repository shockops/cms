<?php
class GetSEOText extends DB {
    function get() {
        return $this->select("SELECT `content` FROM `siteassets` WHERE `description` = 'SEO'");
    }
}

class UpdateSEOText extends DB {
    function update($SEOText) {
        return $this->exec("UPDATE `siteassets` SET `content`= ':SEOText' WHERE `description` = `SEO`", $SEOText);
    }
}
?>