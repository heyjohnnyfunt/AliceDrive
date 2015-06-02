<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 02.06.2015
 * Time: 2:00
 */

namespace MainWebSite;


class DefaultModel extends BaseModel{
    public function GetNews()
    {
        $sql = "SELECT
                    id,
                    title,
                    slug,
                    intro,
                    DATE_FORMAT(post_date, '%d.%m.%Y') as date
                FROM
                    news
                ORDER BY post_date DESC
                LIMIT 3";

        $this->setSql($sql);
        $articles = $this->getAll();

        if (empty($articles)) {
            return false;
        }

        return $articles;
    }
    public function GetConcerts()
    {
        $sql = "SELECT
                    id,
                    place,
                    DATE_FORMAT(date_time, '%H:%i %d.%m.%Y') as date,
                    body
                FROM
                    tours
                ORDER BY date_time DESC
                LIMIT 3";

        $this->setSql($sql);
        $articles = $this->getAll();

        if (empty($articles)) {
            return false;
        }

        return $articles;
    }

    public function GetMessages()
    {
        $sql = "SELECT
                    message,
                    username,
                    DATE_FORMAT(time, '%H:%i %d.%m.%Y') as date
                FROM
                    CommunityChat
                ORDER BY time DESC LIMIT 4";

        $this->setSql($sql);
        $articles = $this->getAll();

        if (empty($articles)) {
            return false;
        }

        return $articles;
    }

    public function GetMusic()
    {
        $sql = "SELECT
                    source,
                    name
                FROM
                    music
                LIMIT 2";

        $this->setSql($sql);
        $articles = $this->getAll();

        if (empty($articles)) {
            return false;
        }

        return $articles;
    }
    public function GetVideos()
    {
        $sql = "SELECT
                    source,
                    name
                FROM
                    video
        LIMIT 2";

        $this->setSql($sql);
        $articles = $this->getAll();

        if (empty($articles)) {
            return false;
        }

        return $articles;
    }
}