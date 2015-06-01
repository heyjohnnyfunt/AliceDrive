<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 01.06.2015
 * Time: 15:04
 */

namespace MainWebSite;


class SearchModel extends BaseModel{

    private function bind_result_array($stmt)
    {
        $meta = $stmt->result_metadata();
        $result = array();
        while ($field = $meta->fetch_field())
        {
            $result[$field->name] = NULL;
            $params[] = &$result[$field->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $params);
        return $result;
    }

    private function getCopy($row)
    {
        return array_map(create_function('$a', 'return $a;'), $row);
    }

    function SearchNews($tag)
    {
        $tag = filter_var($tag, FILTER_SANITIZE_STRING);
        if(empty($tag))
            return false;

        $param = "%{$tag}%";

        $sql = "SELECT
                    id,
                    title,
                    slug,
                    intro,
                    DATE_FORMAT(post_date, '%d.%m.%Y') as date
                FROM
                    news
                WHERE
                    title LIKE ?";
        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bind_param('s', $param);
            $stmt->execute();
            $row = $this->bind_result_array($stmt);

            $countries = array();
            if(!$stmt->error)
            {
                while($stmt->fetch()){
                    $countries[$row['id']] = $this->getCopy($row);
                }
            }
            return $countries;
        }
        return false;
    }

    function SearchMusic($tag)
    {

    }

    function SearchTours($tag)
    {

    }
}