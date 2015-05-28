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
            $username = $this->_db->real_escape_string($this->transform_input($_POST['username']));
            $email = $this->_db->real_escape_string($this->transform_input($_POST['email']));
            $firstname = $this->_db->real_escape_string($this->transform_input($_POST['firstname']));
            $lastname = $this->_db->real_escape_string($this->transform_input($_POST['lastname']));

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
                $message = '<p class="error">User account was ' . $action . '.</p>';
            } else {
                $message = '<p class="error">User account could not be ' . $action . ' because: ' .
                    $this->_db->error . '</p>';
                $message .= '<p>' . $sql . '</p>';
            }

            return $message;
        }

        public function getRowByParam($cond)
        {
            $sql = "SELECT
                    id, username, email, firstname, lastname
                  FROM
                    users
                  WHERE
                    $cond";

            $this->setSql($sql);
            return parent::getRow();
        }

        // Gets menu from "users" Database
        function GetMenu()
        {
            $sql = "SELECT
                      id, username, email
                    FROM
                      users";

            $this->setSql($sql);
            return $this->getAll();
        }
    }
}