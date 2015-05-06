<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 06.05.2015
 * Time: 1:19
 */

namespace MainWebSite;


class AboutModel extends BaseModel
{
    public function get_data()
    {
        $sql = "SELECT
                name,
                instrument,
                body
            FROM
                about
            WHERE
                name != 'main'
            ORDER BY
                name";

        $this->setSql($sql);
        $result = $this->getAll();
        if(empty($result)){
            return false;
        }
        else return $result;
    }

    public function get_main_description()
    {
        $sql = "SELECT
                body
            FROM
                about
            WHERE
                name = 'main'";

        $this->setSql($sql);
        $result = $this->getRow();
        if(empty($result)){
            return false;
        }
        else return $result;
    }
}