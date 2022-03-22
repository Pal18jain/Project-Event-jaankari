<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname ="event_jaankari";

    $conn =mysqli_connect($esrvername,$username,$password,$dbname);

    if($conn)
    {
        echo "Connection ok";
    }
    else
    {
        echo "Connection failed";
    }
?>