<?php

session_start();
ini_set('display_errors', 1);

Class User {
    private $db;

    public function __construct() {
        ob_start();
        include 'db_connect.php';
        $this->db = $conn;
    }

    function __destruct() {
        $this->db->close();
        ob_end_flush();
    }

    function login2() {
        extract($_POST);
        $qry = $this->db->query("SELECT * FROM users WHERE username = '".$username."' AND password = '".md5($password)."' ");
        if ($qry->num_rows > 0) {
            foreach ($qry->fetch_array() as $key => $value) {
                if ($key != 'password' && !is_numeric($key))
                    $_SESSION['login_'.$key] = $value;
            }
            if ($_SESSION['login_type'] != 2) { // Assuming '2' is for regular users
                foreach ($_SESSION as $key => $value) {
                    unset($_SESSION[$key]);
                }
                return 2; // Wrong user type
            }
            return 1; // Successful login
        } else {
            return 3; // Invalid credentials
        }
    }

    function logout() {
        session_destroy();
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
        header("location:user_login.php");
    }

    function update_account() {
        extract($_POST);
        $data = " name = '".$firstname.' '.$lastname."' ";
        $data .= ", username = '$email' ";
        if (!empty($password))
            $data .= ", password = '".md5($password)."' ";
        $chk = $this->db->query("SELECT * FROM users WHERE username = '$email' AND id != '{$_SESSION['login_id']}' ")->num_rows;
        if ($chk > 0) {
            return 2; // Username already exists
        }
        $save = $this->db->query("UPDATE users SET $data WHERE id = '{$_SESSION['login_id']}' ");
        if ($save) {
            $data = '';
            foreach ($_POST as $k => $v) {
                if ($k == 'password')
                    continue;
                if (empty($data) && !is_numeric($k))
                    $data = " $k = '$v' ";
                else
                    $data .= ", $k = '$v' ";
            }
            if ($_FILES['img']['tmp_name'] != '') {
                $fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
                $move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/uploads/'. $fname);
                $data .= ", avatar = '$fname' ";
            }
            $save_user_bio = $this->db->query("UPDATE user_bio SET $data WHERE id = '{$_SESSION['login_id']}' ");
            if ($save_user_bio) {
                return 1; // Successful update
            }
        }
    }

    function get_profile() {
        $id = $_SESSION['login_id'];
        $qry = $this->db->query("SELECT * FROM users WHERE id = $id");
        if ($qry->num_rows > 0) {
            return $qry->fetch_array();
        }
        return null; // No profile found
    }
}
?>
