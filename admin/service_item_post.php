<?php
    session_start();
    require_once '../db.php';

    $service_item_head = $_POST['service_item_head'];
    $service_item_detail = $_POST['service_item_detail'];

    $uploaded_image_original_name = $_FILES['service_item_image']['name'];
    $uploaded_image_original_size = $_FILES['service_item_image']['size'];

    if( $uploaded_image_original_size <= 2000000){
        $after_explode = explode('.', $uploaded_image_original_name); 
        $image_extention = end($after_explode);
        $allow_extenstion = array('jpg','JPG','jpeg','JPEG','png','PNG');
        if(in_array($image_extention,$allow_extenstion)){
            $insert_query = "INSERT INTO service_items (service_item_head,service_item_detail,image_location) VALUES ('$service_item_head','$service_item_detail','primary location')";

            mysqli_query(db_connect(), $insert_query);

            $id_from_db = mysqli_insert_id(db_connect());

           $image_new_name = $id_from_db . "." . $image_extention;

           $save_location = "../uploads/service/". $image_new_name; 
           move_uploaded_file($_FILES['service_item_image']['tmp_name'],$save_location);

           $image_location = "uploads/service/".$image_new_name; 

           $update_query = "UPDATE service_items SET image_location='$image_location' WHERE id=$id_from_db";

           mysqli_query(db_connect(),$update_query);
           
           header('location: service_item.php');

        } 
        else{
            echo "pai nai";
        }
    }
    else{
        echo "your file is too big ! more than 2mb";
    }

?>