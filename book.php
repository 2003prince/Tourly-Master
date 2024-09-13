<?php

session_start();

include 'connection.php';

// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'] ?? '';

if (!empty($_SESSION['user_name']) && !empty($id)) {
    $select = "SELECT * FROM journey WHERE id = '$id'";
    $query = mysqli_query($conn, $select);

    if ($query && mysqli_num_rows($query) > 0) {
        $email_pass = mysqli_fetch_assoc($query);

        $get_id = $email_pass['id'];
        $start_destination = $email_pass['start_desti'];
        $stop_destination = $email_pass['stop_desti'];
        $date = $email_pass['date'];
        $user = $_SESSION['user_name'];
        $seats = $_SESSION['seats'];
        $total = $_SESSION['price'];

        $sql = "INSERT INTO book (id, start_desti, stop_desti, date, username,seats,total) VALUES ('$get_id', '$start_destination', '$stop_destination', '$date', '$user','$seats','$total')";
        $insert_query = mysqli_query($conn, $sql);

        if ($insert_query) {
            header('Location: records.php');
        } else {
            header('Location: index.php');
        }
    } else {
        // Handle case where no journey is found
        header('Location: index.php');
    }
} else {
    header('Location: login__.php');
}

exit(); // Ensure no further output is sent
