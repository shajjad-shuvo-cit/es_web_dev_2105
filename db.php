<?php

function db_connect(){
    //db information;
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "es_web_dev_2105";

    return mysqli_connect($db_host,$db_user,$db_pass,$db_name);
}


function get_all($table_name){
    $get_query = "SELECT * FROM $table_name";
    return mysqli_query(db_connect(),$get_query);
}

?>