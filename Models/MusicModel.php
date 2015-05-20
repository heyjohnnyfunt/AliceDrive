<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 20.05.2015
 * Time: 3:00
 */

namespace MainWebSite;

class MusicModel extends BaseModel {
    public function get_data()
    {
        $sql = "SELECT
                    source,
                    name
                FROM
                    music
                ORDER BY name";

        $this->setSql($sql);
        $articles = $this->getAll();

        if (empty($articles)) {
            return false;
        }

        return $articles;
    }
}