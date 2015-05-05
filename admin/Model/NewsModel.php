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
            $user = $this->_db->real_escape_string($this->transform_input($_POST['user']));
            $slug = $this->_db->real_escape_string($this->transform_input($_POST['slug']));
            $title = $this->_db->real_escape_string($this->transform_input($_POST['title']));
            $body = $this->_db->real_escape_string(($_POST['body']));
            $intro = strip_tags(mb_strcut($body,0,96) . '...');

            //TODO: fix - after page reload repeated form sending
            if ($id != null)//(isset($_GET['id']) && trim($_GET['id']) != '')
            {
                $sql = "UPDATE
                        news
                    SET
                        user_id = '$user',
                        slug = '$slug',
                        title = '$title',
                        intro = '$intro',
                        body = '$body'
                    WHERE
                        id=$id";

                $action = 'updated';
            } else {

                $sql = "INSERT INTO
                        news (user_id, slug, title, intro, body)
                    VALUES
                        ('$user','$slug','$title','$intro','$body')";

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

        public function getRowByParam($cond)
        {
            $sql = "SELECT * FROM news WHERE $cond";
            $this->setSql($sql);
            return parent::getRow();
        }

        /* Gets menu from Database */
        function GetMenu()
        {
            $sql = "SELECT
                    id,
                    title,
                    DATE_FORMAT(post_date, '%H:%i %d.%m.%Y') as date
                FROM
                    news
                ORDER BY
                    post_date DESC";
            $this->setSql($sql);
            return $this->getAll();
        }

    }
}