<?php

/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 07.04.2015
 * Time: 20:28
 */

namespace Admin {
    class CommunityModel extends BaseModel
    {
        function InsertUpdate($id)
        {
            $username = $this->_db->real_escape_string($_POST['username']);
            $email = $this->_db->real_escape_string($_POST['email']);
            $firstname = $this->_db->real_escape_string($_POST['firstname']);
            $lastname = $this->_db->real_escape_string($_POST['lastname']);

            //TODO: fix - after page reload repeated form sending
            if (isset($_GET['id']) && trim($_GET['id']) != '')
            {
                $sql = "UPDATE
                          users
                      SET
                          username = '$username',
                          email = '$email',
                          firstname = '$firstname',
                          lastname = '$lastname'
                      WHERE
                        id=$id";

                $action = 'updated';
            } else {
                $sql = "INSERT INTO
                          users (username, email, firstname, lastname)
                      VALUES
                          ('$username','$email','$firstname','$lastname')";

                $action = 'added';
            }

            $result = $this->_db->query($sql);

            if ($result) {
                $message = '<p>User account was ' . $action . '.</p>';
            } else {
                $message = '<p>User account could not be ' . $action . ' because: ' .
                    $this->_db->error . '</p>';
                $message .= '<p>' . $sql . '</p>';
            }

            return $message;
        }

        // Gets menu from "pages" Database
        function GetUsernamesFromDatabase()
        {
            $sql = "SELECT
                      id, username, email
                    FROM
                      users";

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
            $sql = "SELECT
                    id, username, email, firstname, lastname
                  FROM
                    users
                  WHERE
                    $cond";

            $this->_setSql($sql);
            return parent::getRow();
        }
    }
}