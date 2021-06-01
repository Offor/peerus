<?php
    $connection = mysqli_connect('localhost:8889', 'root', 'root', 'peerus');
    if(!$connection) {
        die("Database connection failed"); 
    }
?>