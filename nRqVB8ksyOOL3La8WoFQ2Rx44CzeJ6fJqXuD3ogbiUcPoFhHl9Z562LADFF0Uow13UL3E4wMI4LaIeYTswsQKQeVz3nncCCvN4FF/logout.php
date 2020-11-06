<?php 
session_start();
unset($_SESSION['admin_user']);
if(empty($_SESSION['admin_user']))
{
    header('location:login.php');
}



?>