<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 01.06.2015
 * Time: 15:04
 */

namespace MainWebSite;


class SearchModel extends BaseModel{
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

            $params = array();
            $result = array();

            $meta = $stmt->result_metadata();
            while ($field = $meta->fetch_field()) {
                $params[] = &$result[$field->name];
            }
            call_user_func_array(array($stmt, 'bind_result'), $params);
            if ($stmt->error) return false;

            while ($stmt->fetch()) {
                foreach ($result as $key => $val)
                    $c[$key] = $val;
                $params = $c;
            }
            return $params;


        }
    }

    function SearchMusic()
    {

    }

    function SearchTours()
    {

    }
}