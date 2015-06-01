<?php
/**
 * Created by PhpStorm.
 * User: skogs
 * Date: 09.04.2015
 * Time: 12:29
 */
namespace MainWebSite {
    defined('ACCESS_ALLOWED') or die('Restricted Access');
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

        public function get_data() {}

        protected function setSql($sql)
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

        function transform_input($data)
        {
            $data = trim($data);
            $data = strip_tags($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = nl2br($data);
            return $data;
        }

        function Login($username, $password)
        {
            if ($stmt = $this->_db->prepare("SELECT
                  id,
                  password,
                  salt,
                  firstname,
                  lastname
                FROM
                  users
                WHERE
                  username = ? LIMIT 1")
            ) {
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $stmt->store_result();

                // get variables from result.
                $stmt->bind_result($user_id, $db_password, $salt, $firstname, $lastname);
                $stmt->fetch();

                // hash the password with the unique salt.
                $newpassword = hash('sha512', $password . $salt);

                if ($stmt->num_rows == 1) {
                    // If the user exists, we check if the account is locked
                    // from too many login attempts
                    if ($this->CheckBruteforce($user_id) === true) {
                        // Account is locked
                        // Send an email to user
                        return false;
                    } else {
                        // Check if the password in the database matches
                        // the password the user submitted.
                        if ($db_password == $newpassword) {
                            // Get the user-agent string of the user.
                            $user_browser = $_SERVER['HTTP_USER_AGENT'];

                            // XSS protection as we might print this value
                            $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                            $username = preg_replace("/[^a-zA-Z0-9_-]+/", "", $username);

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
                                    return false;
                                }
                            }

                            $_SESSION['user_id'] = $user_id;
                            $_SESSION['username'] = $username;
                            $_SESSION['firstname'] = $firstname;
                            $_SESSION['lastname'] = $lastname;
                            $_SESSION['login_string'] = hash('sha512', $password . $user_browser);

                            return true;

                        } else {
                            // If password is not correct, record this attempt in the database
                            $now = time();
                            if (!$this->_db->query("INSERT INTO
                                      login_attempts(user_id, time)
                                    VALUES
                                      ('$user_id', '$now')")
                            ) {
                                return false;
                                /*header("Location: ../error.php?err=Database error: login_attempts");
                                exit();*/
                            }
                            return false;
                        }
                    }
                } else {
                    // No user exists.
                    return false;
                }
            } else {
                // Could not create a prepared statement
                return false;
                /*header("Location: ../error.php?err=Database error: cannot prepare statement");
                exit();*/
            }
        }

        function CheckBruteforce($user_id)
        {
            $now = time();
            // All login attempts are counted from the past 2 hours.
            $valid_attempts = $now - (2 * 60 * 60);
            if ($stmt = $this->_db->prepare("SELECT
                                    time
                                  FROM
                                    login_attempts
                                  WHERE
                                    user_id = ? AND time > '$valid_attempts'")
            ) {
                $stmt->bind_param('i', $user_id);
                $stmt->execute();
                $stmt->store_result();
                // If there have been more than 5 failed logins
                if ($stmt->num_rows > 5) {
                    return true;
                } else {
                    return false;
                }
            } else {
                die('Bruteforce statement preparation failed.');
                /*header("Location: ../error.php?err=Database error: cannot prepare statement");
                exit();*/
            }
        }

        function CheckLogin()
        {
            // Check if all session variables are set
            if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string']))
            {
                $user_id = $_SESSION['user_id'];
                $login_string = $_SESSION['login_string'];
                $user_browser = $_SERVER['HTTP_USER_AGENT'];

                if ($stmt = $this->_db->prepare("SELECT
                        password
				      FROM
				        users
				      WHERE
				        id = ? LIMIT 1"))
                {
                    $stmt->bind_param('i', $user_id);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows == 1)
                    {
                        // If the user exists get variables from result.
                        $stmt->bind_result($password);
                        $stmt->fetch();
                        $login_check = hash('sha512', $password . $user_browser);

                        if ($login_check == $login_string)
                        {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    // Could not prepare statement
                    die("CheckLogin: can not prepare string.");
                    /*header("Location: ../error.php?err=Database error: cannot prepare statement");
                    exit();*/
                }
            } else {
                // Not logged in
                return false;
            }
        }

    }
}
