<?php

    $con = mysqli_connect('localhost', 'root', '','Mystore');

    if (!$con) {
        echo "Error connecting to MySQL: " . mysqli_connect_error();
        die; // You can kill the script here
    }

?>