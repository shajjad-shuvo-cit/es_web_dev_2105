<?php
    require_once '../db.php';

    foreach($_POST['check'] as $id =>  $check){
        $delete_query = "DELETE FROM guest_messages WHERE id=$id";
        mysqli_query(db_connect(),$delete_query);
    }

    header('location: guest_message.php');


?>