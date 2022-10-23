<?php
    session_start();
    ob_start();
    //Create Constants to store Non Repeading Value
    define('SITEURL','http://localhost/Online_Shop/admins/');
    define('HOMEPAGE','http://localhost/Online_Shop/');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online-shop";

    //Create connection in mysqli

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection in mysqli
    if(!$conn){
        die("Error on the connection". mysqli_error());
    }
    else{
        //echo "Connected Successfully";
    }

?>