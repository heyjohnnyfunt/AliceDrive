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
    function RegUser()
    {
        if (!isset($_POST['username'], $_POST['email'], $_POST['p']))
            return '<p class="error">Что-то пошло не так. Попробуйте повторно зарегистрироваться.</p>';

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

        if (empty($message)) {
            $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
            $password = hash('sha512', $password . $random_salt);

            if ($insert_stmt = $this->_db->prepare("
                        INSERT INTO
                          users (username, email, password, salt, firstname, lastname)
                        VALUES
                          (?, ?, ?, ?, ?, ?)")
            ) {
                $params = array(&$username, &$email, &$password, &$random_salt, &$firstname, &$lastname);
                call_user_func_array(array($insert_stmt, "bind_param"), array_merge(array('ssssss'), $params));

                if (!$insert_stmt->execute()) {
                    return '<p class="error">Insertion failed.</p>';
                } else
                    $message = '<p class="error">Olala, у нас пополнение! Поздравляю, Вы успешно зарегистрировались.</p>' .
                        '<p class="error">Осталось только залогиниться..</p>';
            }
        }
        return $message;

    }

    function GetUserInfo()
    {
        if (!$this->CheckLogin()) return 'U better login first';

        if ($stmt = $this->_db->prepare("SELECT
                    firstname,
                    lastname,
                    email
                  FROM
                    users
                  WHERE
                    username = ?")
        ) {
            $params = array();
            $result = array();

            $stmt->bind_param('s', $_SESSION['username']);
            $stmt->execute();

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
                $message .= '<p class="error">Two much users with such username. Call to admin.</p>';
            } else if ($stmt->num_rows == 1) {
                $stmt->bind_result($user_id);
                $stmt->fetch();
            } else
                $message .= '<p class="error">Что-то пошло не так.. Похоже, мы потеряли вас в своей базу :(</p>';
        } else
            $message .= '<p class="error">Database error</p>';

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $message .= '<p class="error">The email address you entered is not valid</p>';

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
                $message = '<p class="error">Изменения сохранены</p>';
                $params = array(&$username, &$email, &$firstname, &$lastname);
                call_user_func_array(array($update_stmt, "bind_param"), array_merge(array('ssss'), $params));
                if (!$update_stmt->execute()) {
                    $message .= '<p class="error">Insertion failed.</p>';
                } else {
                    $_SESSION['username'] = $username;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                }
            } else {
                $message = '<p class="error">Ошибка, видимо, у нас. Свяжитесь с админом :(</p>';
            }
        }
        return $message;
    }

    function UpdatePassword()
    {
        if (!$this->CheckLogin()) return 'U better login first';

        $message = '';

        $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

        if (strlen($password) != 128)
            $message .= '<p class="error">Invalid password configuration. Make sure Javascript execution is allowed in your browser.</p>';

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
                $message .= '<p class="error">Two much users with such username. Call to admin.</p>';
            } else if ($stmt->num_rows == 1) {
                $stmt->bind_result($user_id);
                $stmt->fetch();
            } else
                $message .= '<p class="error">Что-то пошло не так.. Похоже, мы потеряли вас в своей базу :(</p>';
        } else
            $message .= '<p class="error">Database error</p>';

        if (empty($message)) {
            $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
            $password = hash('sha512', $password . $random_salt);

            if ($insert_stmt = $this->_db->prepare("UPDATE
                          users
                        SET
                          password = ?,
                          salt = ?
                        WHERE
                          id = $user_id")
            ) {
                $params = array(&$password, &$random_salt);
                call_user_func_array(array($insert_stmt, "bind_param"), array_merge(array('ss'), $params));

                if (!$insert_stmt->execute()) {
                    return '<p class="error">Insertion failed</p>';
                } else{
                    $message = '<p class="error">Пароль успешно изменен</p>';
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
                }
            }
        }

        return $message;
    }
}