<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 18.04.2015
 * Time: 22:34
 */
namespace MainWebSite {
    class TourModel extends BaseModel
    {
        public function get_data()
        {
            $sql = "SELECT
                    id,
                    place,
                    DATE_FORMAT(date_time, '%H:%i %d.%m.%Y') as date,
                    body
                FROM
                    tours
                ORDER BY date_time DESC";

            $this->setSql($sql);
            $articles = $this->getAll();

            if (empty($articles)) {
                return false;
            }

            return $articles;
        }

        public function getArticleById($id)
        {
            $sql = "SELECT
                    id,
                    place,
                    DATE_FORMAT(date_time, '%H:%i %d.%m.%Y') as date,
                    body
                FROM
                    tours
                WHERE
                    id = $id";

            $this->setSql($sql);
            $articleDetails = $this->getRow();

            if (empty($articleDetails)) {
                return false;
            }

            return $articleDetails;
        }

        public function GetLastRecord()
        {
            $sql = "SELECT
                    id,
                    place,
                    DATE_FORMAT(date_time, '%H:%i %d.%m.%Y') as date,
                    body
                FROM
                    tours
                ORDER BY
                    abs(now() - date) desc
                LIMIT 1";

            $this->setSql($sql);
            $lastRow = $this->getRow();

            if (empty($lastRow)) {
                return false;
            }

            return $lastRow;
        }
    }
}