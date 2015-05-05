<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 26.04.2015
 * Time: 1:17
 */

namespace Admin;

class DefaultModel extends BaseModel
{
    // Gets menu from "pages" Database
    function GetMenu()
    {
        $sql = "SELECT
                    title,
                    slug,
                    id
                FROM
                    pages";
        $this->setSql($sql);
        return $this->getAll();
    }
}