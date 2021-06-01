<?php
session_start();
include('includes/db.php');

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: db.php");
}

if(!$_SESSION['username'])
{
    header('Location: ../login.php');
}

?>