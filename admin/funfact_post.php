<?php
    session_start();
    require_once '../db.php';

    // print_r($_POST);

    $sub_head = $_POST['sub_head'];
    $white_head = $_POST['white_head'];
    $green_head = $_POST['green_head'];
    $para_one = $_POST['para_one'];
    $para_two = $_POST['para_two'];

    $flag = true;

    if(!$sub_head){
        $_SESSION['sub_err'] = "sub head required!";
        $flag = false;
    }

    if(!$white_head){
        $_SESSION['white_err'] = "white head required!";
        $flag = false;
    }
    if(!$green_head){
        $_SESSION['white_err'] = "white head required!";
        $flag = false;
    }
    if(!$para_one){
        $_SESSION['white_err'] = "white head required!";
        $flag = false;
    }
    if(!$para_two){
        $_SESSION['white_err'] = "white head required!";
        $flag = false;
    }

    if($flag){
        $_SESSION['sub_head_done'] = $sub_head; 
        
        // insert query;
        $insert_query = "INSERT INTO funfacts (sub_head,white_head,green_head,para_one,para_two) VALUES('$sub_head','$white_head','$green_head','$para_one','$para_two')";
        mysqli_query($db_connect,$insert_query);
        header('location: funfact.php');
    }
    else{
        header('location: funfact.php');
    }




?>