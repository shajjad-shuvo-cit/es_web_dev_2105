<?php
session_start();
require_once '../db.php';

$fun_num = $_POST['fun_num'];
$fun_item_head = $_POST['fun_item_head'];

$flag = true;

if(!$fun_num){
    $_SESSION['fun_num_err'] = "fun item num required!";
    $flag = false;
}

if(!$fun_item_head){
    $_SESSION['fun_item_head_err'] = "fun item  heading required!";
    $flag = false;
}

if($flag){
    
    // insert query;
    $insert_query = "INSERT INTO funfact_items (fun_num,fun_item_head) VALUES('$fun_num','$fun_item_head')";
    mysqli_query($db_connect,$insert_query);
    header('location: funfact_item.php');
}
else{
    header('location: funfact_item.php');
}


?>