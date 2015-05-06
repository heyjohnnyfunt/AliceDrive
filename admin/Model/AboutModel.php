<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 05.05.2015
 * Time: 20:59
 */

namespace Admin;


class AboutModel extends BaseModel
{
    function InsertUpdate($id = null)
    {
        $name = $this->_db->real_escape_string($this->transform_input($_POST['memberName']));
        if (empty($name)) return $message = "Member's name can not be empty";
        $instrument = $this->_db->real_escape_string($this->transform_input($_POST['instrument']));
        $body = $this->_db->real_escape_string(($_POST['body']));

        if ($id != null)
        {
            $sql = "UPDATE
                        about
                    SET
                        name = '$name',
                        instrument = '$instrument',
                        body = '$body'
                    WHERE
                        id=$id";

            $action = 'updated';
        } else {

            $sql = "INSERT INTO
                        about (name, instrument, body)
                    VALUES
                        ('$name','$instrument','$body')";

            $action = 'added';
        }

        $result = $this->_db->query($sql);

        if ($result) {
            $message = '<p>Member record was ' . $action . '.</p>';
        } else {
            $message = '<p>Member record could not be ' . $action . ' because: ' .
                $this->_db->error . '</p>';
            $message .= '<p>' . $sql . '</p>';
        }

        return $message;
    }
    public function getRowByParam($cond)
    {
        $sql = "SELECT * FROM about WHERE $cond";
        $this->setSql($sql);
        return parent::getRow();
    }

    /* Gets menu from Database */
    function GetMenu()
    {
        $sql = "SELECT
                    id,
                    name,
                    instrument
                FROM
                    about
                ORDER BY
                    id";
        $this->setSql($sql);
        return $this->getAll();
    }
}