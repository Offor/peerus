<?php
    $connection = mysqli_connect('localhost:8889', 'root', 'root', 'peer_');
    if(!$connection) {
        die("Database connection failed"); 
    }
?>