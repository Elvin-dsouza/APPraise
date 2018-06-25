<?php
    session_start();
    session_destroy();
    $_SESSION['loggedIn'] = 0;
    header("location:login.php");
   
    
?>