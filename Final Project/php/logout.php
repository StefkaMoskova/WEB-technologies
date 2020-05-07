<?php
    session_start(); 

    $_SESSION['uid']=''; 
    $_SESSION['uname']=''; 

    session_unset(); 

    $url='index.php';
    header("Location: $url"); 
?>

