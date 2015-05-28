<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 27.05.2015
 * Time: 15:12
 */

namespace MainWebSite;


class UserModel extends BaseModel
{
    function AddUser()
    {
        $username = $this->_db->real_escape_string($this->transform_input($_POST['username']));
        $firstname = $this->_db->real_escape_string($this->transform_input($_POST['firstname']));
        $lastname = $this->_db->real_escape_string($this->transform_input($_POST['lastname']));
        $email = $this->_db->real_escape_string($this->transform_input($_POST['email']));
        $password = $this->_db->real_escape_string($this->transform_input($_POST['password']));

        if (empty($username) || empty($email) || empty($password))
            return '<p class="error">Check your data</p>';

        $sql = "INSERT INTO
                          users (username, email, firstname, lastname, password)
                      VALUES
                          ('$username','$email','$firstname','$lastname', '$password')";

        $result = $this->_db->query($sql);

        if ($result) {
            $message = '<p class="error">User account was created.</p>';
        } else {
            $message = '<p class="error">User account could not be created because: ' .
                $this->_db->error . '</p>';
            $message .= '<p>' . $sql . '</p>';
        }

        return $message;
    }


}