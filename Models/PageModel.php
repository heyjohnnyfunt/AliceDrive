<?php

//Contains database related code
namespace MainWebSite {
    use mysqli;

    class PageModel
    {
        private function Connect()
        {
            require(BASE_PATH . 'Core/Credentials.php');
            # Database connections
            $db = new mysqli($host, $user, $password, $database);

            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            return $db;

        }

        function GetPageDataFromDatabase($id)
        {
            $dbConnection = $this->Connect();

            if (is_numeric($id))
                $cond = "WHERE id = $id";
            else
                $cond = "WHERE slug = '$id'";

            $sql = "SELECT * FROM  pages $cond";
            $data = $this->FetchDataByQuery($sql, $dbConnection);

            $dbConnection->close();

            return $data;
        }

        function GetMenuFromDatabase()
        {
            $dbConnection = $this->Connect();

            $sql = "SELECT title, slug FROM pages";
            $result = $dbConnection->query($sql);
            $titleArray = array();

            if ($result->num_rows > 0)
                while ($data = $result->fetch_array()) {
                    array_push($titleArray, $data);
//                printf ("%s (%s)\n",$data["title"],$data["slag"]);
                }
            else $titleArray = 'Error';

            $dbConnection->close();

            return $titleArray;
        }

        /* For debugging: return if the debugging is allowed or not
        *  Status stored in Database called "Settings" in MySql.
        * */
        function GetSettingValue($settingName)
        {
            $dbConnection = $this->Connect();

            $sql = "SELECT * FROM settings WHERE setting = '$settingName'";
            $data = $this->FetchDataByQuery($sql, $dbConnection);

            $dbConnection->close();

            return $data['value'];
        }

        //Template function to get data
        function FetchDataByQuery($sql, $db)
        {
            $result = $db->query($sql);

            if ($result->num_rows > 0)
                $data = $result->fetch_assoc();
            else $data = 'Error';
            return $data;
        }
    }
}
