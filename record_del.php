<?php


session_start();


include 'connection.php'; 

$username =  $_SESSION['user_name'];

$id = $_GET['id'];

$select = "delete from book where id='$id' and username='$username'";

$query = mysqli_query($conn,$select);

header('Location:records.php');


?>