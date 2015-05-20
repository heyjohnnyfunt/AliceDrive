<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 20.05.2015
 * Time: 1:23
 */

namespace Admin;


class MusicModel extends BaseModel {
    function InsertUpdate($id = null)
    {
        $name = $this->_db->real_escape_string($this->transform_input($_POST['songName']));
        $sourcePath = $this->_db->real_escape_string($this->transform_input($_POST['sourcePath']));

        if ($id != null)
        {
            $sql = "UPDATE
                        music
                    SET
                        name = '$name',
                        source = '$sourcePath',
                    WHERE
                        id=$id";

            $action = 'updated';
        } else {

            $sql = "INSERT INTO
                        music (name, source)
                    VALUES
                        ('$name','$sourcePath')";

            $action = 'added';
        }

        $result = $this->_db->query($sql);

        if ($result) {
            $message = '<p class="error">Song was ' . $action . '.</p>';
        } else {
            $message = '<p class="error">Song could not be ' . $action . ' because: ' .
                $this->_db->error . '</p>';
            $message .= '<p>' . $sql . '</p>';
        }

        return $message;
    }
    public function getRowByParam($cond)
    {
        $sql = "SELECT * FROM music WHERE $cond";
        $this->setSql($sql);
        return parent::getRow();
    }
    /* Gets menu from Database */
    function GetMenu()
    {
        $sql = "SELECT
                    id,
                    name
                FROM
                    music
                ORDER BY
                    name";
        $this->setSql($sql);
        return $this->getAll();
    }

}