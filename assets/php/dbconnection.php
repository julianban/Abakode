<?php
    //OPEN CONNECTION
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "infopoint_items_2";
    
    // Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    // Check connection
    if (!$conn){
        exit("connection failed".mysqli_connect_error());
    }

?>