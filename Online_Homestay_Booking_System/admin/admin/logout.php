<?php
session_start();
if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
    header("dashboard.php");
}
session_destroy();
session_unset(); 
header("location:adminlogin.php");
?>