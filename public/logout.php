<?php 
require '../private/init.php';
if(isset($_SESSION['url_address'])){
    unset($_SESSION['url_address']);
}

if(isset($_SESSION['first_name'])){
    unset($_SESSION['first_name']);
}

header('Location:index.php');
die;






?>