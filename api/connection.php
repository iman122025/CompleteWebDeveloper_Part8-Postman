<?php

    //echo "Hi<br>";

    $host = "localhost";           
    $username = "root";            
    $pass = "";                     
    $db = "greenapisdbdemo1";   

    mysqli_report(MYSQLI_REPORT_OFF);  

    $conn = mysqli_connect($host, $username, $pass, $db);

    if (!$conn) {
        
        die("Connection Error");
        
    }

    /* 
    if (!$conn) {
        echo "The connection failed";
    } else {
        echo "Connected successfully <br>";
    } */

?>
