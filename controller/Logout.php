<?php 
    require_once 'Session.php';
    $session::destroySession();
    header("location:../index.php");
?>