<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 31.05.2015
 * Time: 20:30
 */

namespace MainWebSite;


class CommunityModel extends BaseModel
{
    function PostMessage()
    {
        if(!$this->CheckLogin())
            return '<p class="error">U better login first</p>';

        $message = filter_input(INPUT_POST, 'messageTextArea', FILTER_SANITIZE_STRING);
        if(empty($message))
            return '<p class="error">Напиши что-нибудь.. Пустое сообщение не запостим</p>';

        if($stmt = $this->_db->prepare('INSERT INTO
                  CommunityChat (message, username, time)
                VALUES (?, ?, now())')
        ){
//            $now = now();
            $stmt->bind_param('ss', $message, $_SESSION['username']);
            if(!$stmt->execute())
                return '<p class="error">Что-то не так..</p>';
        }
        header('Location: /community');
//        return '<p class="error">Сообщение успещно добавлено</p>';
    }

    public function get_data()
    {
        $sql = "SELECT
                    message,
                    username,
                    DATE_FORMAT(time, '%H:%i %d.%m.%Y') as date
                FROM
                    CommunityChat
                ORDER BY time DESC LIMIT 25";

        $this->setSql($sql);
        $articles = $this->getAll();

        if (empty($articles)) {
            return false;
        }

        return $articles;
    }
}