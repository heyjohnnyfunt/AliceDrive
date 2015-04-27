<?php

/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 03.04.2015
 * Time: 1:57
 */
namespace Admin {

    class NewsModel extends BaseModel
    {
        function InsertUpdate($id = null)
        {
            $user = $this->_db->real_escape_string($_POST['user']);
            $slug = $this->_db->real_escape_string($_POST['slug']);
            $title = $this->_db->real_escape_string($_POST['title']);
            $body = $this->_db->real_escape_string($_POST['body']);

            //TODO: fix - after page reload repeated form sending
            if (isset($_GET['id']) && trim($_GET['id']) != '')
            {
                $sql = "UPDATE
                        news
                    SET
                        user_id = '$user',
                        slug = '$slug',
                        title = '$title',
                        body = '$body'
                    WHERE
                        id=$id";

                $action = 'updated';
            } else {
                $sql = "INSERT INTO
                        news (user_id, slug, title, body)
                    VALUES
                        ('$user','$slug','$title','$body')";

                $action = 'added';
            }

            $result = $this->_db->query($sql);

            if ($result) {
                $message = '<p>Topic was ' . $action . '.</p>';
            } else {
                $message = '<p>Topic could not be ' . $action . ' because: ' .
                    $this->_db->error . '</p>';
                $message .= '<p>' . $sql . '</p>';
            }

            return $message;
        }

        /* Gets menu from "pages" Database */
        function get_data()
        {
            $sql = "SELECT
                    id, title, post_date
                FROM
                    news
                ORDER BY
                    post_date DESC";
            $result = $this->_db->query($sql);
            $titleArray = array();

            if ($result->num_rows > 0)
                while ($data = $result->fetch_array()) {
                    array_push($titleArray, $data);
                }
            else $titleArray = 'Error';

            return $titleArray;
        }

        public function getRowByParam($cond)
        {
            $sql = "SELECT * FROM news WHERE $cond";
            $this->_setSql($sql);
            return parent::getRow();
        }
    }
}