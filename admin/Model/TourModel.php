<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 02.05.2015
 * Time: 21:52
 */

namespace Admin;

class TourModel extends BaseModel
{
    function InsertUpdate($id = null)
    {
        $place = $this->_db->real_escape_string($this->transform_input($_POST['place']));
        $date_time = $this->_db->real_escape_string($this->transform_input($_POST['date_time']));
        $body = $this->_db->real_escape_string(($_POST['body']));

        $date_time = date("Y-m-d H:i", strtotime($date_time));

        //TODO: fix - after page reload repeated form sending
        if ($id != null)
        {
            $sql = "UPDATE
                        tours
                    SET
                        place = '$place',
                        date_time = '$date_time',
                        body = '$body'
                    WHERE
                        id=$id";

            $action = 'updated';
        } else {
            $sql = "INSERT INTO
                        tours (place, date_time, body)
                    VALUES
                        ('$place','$date_time','$body')";

            $action = 'added';
        }

        $result = $this->_db->query($sql);

        if ($result) {
            $message = '<p class="error">Tour was ' . $action . '.</p>';
        } else {
            $message = '<p class="error">Tour could not be ' . $action . ' because: ' .
                $this->_db->error . '</p>';
            $message .= '<p>' . $sql . '</p>';
        }

        return $message;
    }

    public function getRowByParam($cond)
    {
        $sql = "SELECT * FROM tours WHERE $cond";
        $this->setSql($sql);
        return parent::getRow();
    }

    /* Gets menu from Database */
    function GetMenu()
    {
        $sql = "SELECT
                    id,
                    place,
                    DATE_FORMAT(date_time, '%H:%i %d.%m.%Y') as date
                FROM
                    tours
                ORDER BY
                    date_time DESC";
        $this->setSql($sql);
        return $this->getAll();
    }


}