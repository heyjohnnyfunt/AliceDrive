<?php

namespace Admin {
use mysqli;
//Contains database related code
    class PageModel
    {
        private function Connect()
        {
            require('Credentials.php');
            # Database connections
            $db = new mysqli($host, $user, $password, $database);

            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            return $db;
        }

        /* ***********************
         *     USER MANAGEMENT
         * ********************** */

        // Checks if account is in Database
        function CheckAdminInDatabase($username, $password)
        {
            $sql = "SELECT * FROM admin_users WHERE username = '$username' AND password = '$password'";
            $db = $this->Connect();
            $result = $db->query($sql);
            $db->close();

            if ($result->num_rows == 1)
                return true;
            else return false;
        }

        function GetUserFromDatabase($id)
        {
            $dbConnection = $this->Connect();
            if (is_numeric($id)) {
                $cond = "WHERE id = '$id'";
            } else {
                $cond = "WHERE username = '$id'";
            }

            $sql = "SELECT username, id FROM admin_users $cond";
            $result = $dbConnection->query($sql);

            $data = $result->fetch_assoc();

            return $data;
        }

        // Get all users from "Users" Database
        function GetAllAdminUsersFromDatabase()
        {
            $dbConnection = $this->Connect();
            $sql = 'SELECT id, username FROM admin_users ORDER BY username ASC';

            $users = array();
            $result = $dbConnection->query($sql);

            if ($result->num_rows > 0) {
                while ($user = $result->fetch_assoc()) {
                    array_push($users, $user);
                }
            } else {
                $users = "0 results";
            }

            $dbConnection->close();

            return $users;
        }

        /* ***********************
         *     PAGE MANAGEMENT
         * ********************** */

        // Gets menu from "pages" Database
        function GetMenuFromDatabase()
        {
            $dbConnection = $this->Connect();

            $sql = "SELECT title, slug, id FROM pages";
            $result = $dbConnection->query($sql);
            $titleArray = array();

            if ($result->num_rows > 0)
                while ($data = $result->fetch_array()) {
                    array_push($titleArray, $data);
                }
            else $titleArray = 'Error';

            $dbConnection->close();

            return $titleArray;
        }

        /* ***********************************************
         *   GENERAL FUNCTIONS TO GET DATA FROM DATABASE
         * *********************************************** */
        function GetDataFromDatabase($sql)
        {
            $db = $this->Connect();
            $data = $this->FetchDataByQuery($sql, $db);
            $db->close();

            return $data;
        }

        //Template function to get data
        private function FetchDataByQuery($sql, $db)
        {
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
            } else $data = 'Error';

            return $data;
        }
    }
}