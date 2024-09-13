<?php


session_start();


include 'connection.php'; 

$username =  $_SESSION['user_name'];

$id = $_GET['id'];

$select = "delete from user where id='$id'";

$query = mysqli_query($conn,$select);

header('Location:dashboard.php');


?>