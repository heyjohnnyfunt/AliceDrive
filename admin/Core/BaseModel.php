<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 09.04.2015
 * Time: 12:29
 */
namespace Admin {
    use mysqli, Exception;

    class BaseModel
    {
        protected $_db;
        protected $_sql;

        public function __construct()
        {
            require('Credentials.php');
            # Database connections
            $this->_db = new mysqli($host, $user, $password, $database);

            // Check connection
            if ($this->_db->connect_error) {
                die("Connection failed: " . $this->_db->connect_error);
            }
        }

        protected function get_data() { }

        protected function InsertUpdate($id) {}

        protected function _setSql($sql)
        {
            $this->_sql = $sql;
        }

        public function getAll()
        {
            if (!$this->_sql) {
                throw new Exception("No SQL query!");
            }

            $contentArray = array();
            $result = $this->_db->query($this->_sql);

            if ($result->num_rows > 0)
                while ($data = $result->fetch_array()) {
                    array_push($contentArray, $data);
//                printf ("%s) %s\n",$data["id"],$data["title"]);
                }
            else $contentArray = 'Error';
            return $contentArray;
        }

        public function getRow()
        {
            if (!$this->_sql) {
                throw new Exception("No SQL query!");
            }
            $data = $this->FetchDataByQuery();
            return $data;
        }

        //Template function to get data
        function FetchDataByQuery()
        {
            $result = $this->_db->query($this->_sql);

            if ($result->num_rows > 0)
                $data = $result->fetch_assoc();
            else $data = 'Error';
            return $data;
        }
    }
}
