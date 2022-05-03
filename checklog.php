<?php
//check if user logged in
//listen for logout
session_start();
if(isset($_POST['logout'])){

    unset($_SESSION['user']);
       
}

//redirect to login page if not signed in
if(!isset($_SESSION['user'])){
    header('location: login.php');
    exit();
}

