<?php

$connect = mysqli_connect('localhost', 'root', '', 'lab_11');

function user_reg($connect)
{
    $new_user_login = trim(htmlspecialchars($_POST['new_login']));
    $new_user_pass = trim(htmlspecialchars($_POST['new_pass']));
    $new_user_date = date(('Y-m-d H:i:s'));

    if ((isset($_POST['new_login'])) && (isset($_POST['new_pass']))) {
        $check_query = "SELECT * FROM users WHERE user_login ='".$new_user_login."'";

        $result_arr = mysqli_fetch_assoc(mysqli_query($connect, $check_query));


        if (!isset($result_arr['user_login'])) {
            $reg_query = "INSERT INTO users VALUES (NULL,'".$new_user_login."','".$new_user_pass."','0','".$new_user_date."','user')";
            $result = mysqli_query($connect, $reg_query); 
        }
    }
    
}

function user_login($connect)
{
    if ((isset($_POST['login'])) && (isset($_POST['pass']))) {
        $user_login = trim(htmlspecialchars($_POST['login']));
        $user_pass = trim(htmlspecialchars($_POST['pass']));

        $login_query = "SELECT * FROM users WHERE user_login = '".$user_login."' AND user_status = 'user'";

        $result_arr = mysqli_fetch_assoc(mysqli_query($connect, $login_query));

        $user_login_db = $result_arr['user_login'];
        $user_pass_db = $result_arr['user_pass'];


        if (isset($result_arr['user_login'])) {
            if (($user_login === $user_login_db) && ($user_pass === $user_pass_db)) {
                $_SESSION['user_data']['user_id'] = $result_arr['user_id'];

                $_SESSION['user_data']['user_login'] = $result_arr['user_login'];

                $_SESSION['user_data']['user_status'] = $result_arr['user_status'];

                $_SESSION['user_data']['user_balance'] = $result_arr['user_balance'];

                $_SESSION['user_data']['user_data_reg'] = $result_arr['user_data_reg'];

                header('Location: /');
            }
        }
    }
}
?>