<?php
    $db_server = 'localhost';
    $db_username = 'root';
    $db_pass = '';
    $db_name = 'db_test';
    try{
        $conn = (mysqli_connect($db_server,$db_username,$db_pass,$db_name,));
    }catch(mysqli_sql_exception $e){
        echo "Error: " . $e->getMessage();
    }
    if(!$conn){
        echo 'CANNOT CONNECT TO DATABASE';
    }else{
        echo "";
    }
?>
