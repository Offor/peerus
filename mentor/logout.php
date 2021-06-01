<?php
session_start();

   //Log out 
   if(isset($_POST['logout_btn']))
   {
       session_destroy();
       unset($_SESSION['username']);
       header('Location: ../index.php');
   }
?>