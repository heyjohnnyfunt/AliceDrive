<?php
/**
 * Created by PhpStorm.
 * User: Alexey
 * Date: 02.06.2015
 * Time: 1:20
 */

namespace MainWebSite;

class VideoModel extends BaseModel {
    public function get_data()
    {
        $sql = "SELECT
                    source,
                    name
                FROM
                    video
                ORDER BY name";

        $this->setSql($sql);
        $articles = $this->getAll();

        if (empty($articles)) {
            return false;
        }

        return $articles;
    }
}
