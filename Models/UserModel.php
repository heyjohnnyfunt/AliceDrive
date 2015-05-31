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

    function RegUser()
    {
        if (!isset($_POST['username'], $_POST['email'], $_POST['p']))
            return 'Что-то пошло не так. Попробуйте повторно зарегистрироваться.';

        $message = '';

        // Sanitize and validate the data passed in
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $message .= '<p class="error">The email address you entered is not valid</p>';

        $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

        if (strlen($password) != 128)
            $message .= '<p class="error">Invalid password configuration. Password' . $password . '</p>';

        if ($stmt = $this->_db->prepare("SELECT
                    id
                  FROM
                    users
                  WHERE
                    username = ? OR email = ?")
        ) {
            $stmt->bind_param('ss', $username, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // A user with this username address already exists
                $message .= '<p class="error">A user with this username or email address already exists.</p>';
            }
        } else
            $message .= '<p class="error">Database error</p>';


        // TODO:
        // We'll also have to account for the situation where the user doesn't have
        // rights to do registration, by checking what type of user is attempting to
        // perform the operation.

        if (empty($message)) {
            $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
            $password = hash('sha512', $password . $random_salt);

            // Insert the new user into the database
            if ($insert_stmt = $this->_db->prepare("INSERT INTO
                          users (username, email, password, salt, firstname, lastname)
                        VALUES (?, ?, ?, ?, ?, ?)")
            ) {
                $params = array(&$username, &$email, &$password, &$random_salt, &$firstname, &$lastname);
                call_user_func_array(array($insert_stmt, "bind_param"), array_merge(array('ssssss'), $params));

                if (!$insert_stmt->execute()) {
                    return 'Insertion failed.';
                } else
                    $message = 'Olala, у нас пополнение! Поздравляю, Вы успешно зарегистрировались.</p>' .
                        '<p class="error">Осталось только залогиниться..';
            }
        }
        return $message;

    }

    function GetUserInfo()
    {
        if (!$this->CheckLogin()) return 'U better login first';

        $info = array();

        if($stmt = $this->_db->prepare("SELECT
                    email,
                    firstname,
                    lastname
                  FROM
                    users
                  WHERE
                    username = ?")){
            $stmt->bind_param('s', $_SESSION['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 1) {
                return false;
            } else{
                call_user_func_array(array($stmt, "bind_result"), $info);
            }
        } else
            return false;
    }

    function UpdateUser()
    {
        if (!$this->CheckLogin()) return 'U better login first';

        $message = '';

        if ($stmt = $this->_db->prepare("SELECT
                    id
                  FROM
                    users
                  WHERE
                    username = ?")
        ) {
            $stmt->bind_param('s', $_SESSION['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 1) {
                return '<p class="error">Too many users with such username. Call admin.</p>';
            } else $stmt->bind_result($user_id);
        } else
            $message .= '<p class="error">Database error</p>';

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $message .= '<p class="error">The email address you entered is not valid</p>';

        if ($stmt = $this->_db->prepare("SELECT
                    id
                  FROM
                    users
                  WHERE
                    username = ? OR email = ?
                  LIMIT 1")
        ) {
            $stmt->bind_param('ss', $username, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 1) {
                $message .= '<p class="error">A user with this username or email address already exists.</p>';
            }
        } else
            $message .= '<p class="error">Database error</p>';


        if (empty($message)) {
            if ($update_stmt = $this->_db->prepare("UPDATE
                          users SET
                            username = ?,
                            email = ?,
                            firstname = ?,
                            lastname = ?
                        WHERE
                          id = $user_id")
            ) {
                $message = 'Изменения сохранены';
                $params = array(&$username, &$email, &$firstname, &$lastname);
                call_user_func_array(array($update_stmt, "bind_param"), array_merge(array('ssss'), $params));
                if (!$update_stmt->execute()) {
                    $message .= 'Insertion failed.';
                }
            }
        }

        return $message;
    }
}