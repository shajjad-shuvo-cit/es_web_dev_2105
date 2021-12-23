<?php
    session_start();
    require_once('db.php');
    //print_r($_POST);

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    //checking query;
    $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE email='$email' AND password='$password'";

    $from_db = mysqli_query($db_connect,$checking_query);

    $after_assoc = mysqli_fetch_assoc($from_db);

    if($after_assoc['total_users'] == 1){
        $_SESSION['email'] = $email;
        $_SESSION['user_status'] = 'yes';
        header('location: admin/dashboard.php');
    }
    else{
        $_SESSION['login_err'] = "your credentials are wrong or register";
        header('location: login.php');
    }





?>