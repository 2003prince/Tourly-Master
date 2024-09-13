<?php
session_start();
include './connection.php';

$id = $_GET['id'];

$select255 = "SELECT * FROM user where id='$id'";
$query255 = mysqli_query($conn, $select255);
$res123 = mysqli_fetch_assoc($query255);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1c1c1c;
            margin: 0;
        }

        .wrapper {
            position: relative;
            max-width: 430px;
            width: 100%;
            background: #fff;
            padding: 34px;
            border-radius: 6px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .wrapper h2 {
            position: relative;
            font-size: 22px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .wrapper h2::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 28px;
            border-radius: 12px;
            background: #4070f4;
        }

        .wrapper form {
            margin-top: 30px;
        }

        .input-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .input-box {
            height: 52px;
            margin: 18px 0;
            flex: 1;
        }

        .input-box.half-width {
            width: calc(50% - 5px);
        }

        form .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            padding: 0 15px;
            font-size: 17px;
            font-weight: 400;
            color: #333;
            border: 1.5px solid #C7BEBE;
            border-bottom-width: 2.5px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-color: #4070f4;
        }

        .input-box.button input {
            color: #fff;
            letter-spacing: 1px;
            border: none;
            background: #4070f4;
            cursor: pointer;
        }

        .input-box.button input:hover {
            background: #0e4bf1;
        }

        form .warning {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container a.button {
            color: #fff;
            background-color: #4070f4;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button-container a.button:hover {
            background-color: #0e4bf1;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <h2>Insert Bus Data</h2>
        <form method="post">
            <div class="input-row">
                <div class="input-box half-width">
                    <input type="text" placeholder="From" name="start" required>
                </div>
                <div class="input-box half-width">
                    <input type="text" placeholder="To" name="stop" required>
                </div>
            </div>
            <div class="input-box">
                <input type="number" placeholder="Select Seats" name="seats" min="17" max="90" required>
            </div>
            <div class="input-box">
                <input type="number" placeholder="Add ticket price" name="price" required>
            </div>
            <div class="input-box">
                <input type="date" placeholder="Select Date" name="date" required>
            </div>

            <?php
            if (isset($error_message)) {
                echo "<p class='warning'>$error_message</p>";
            }
            ?>

            <div class="input-box button">
                <input type="submit" name="submit" value="Insert Now">
            </div>
        </form>

        <div class="button-container">
            <a href="dashboard.php" class="button">Dashboard</a>
        </div>
    </div>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $start_destination = $_POST['start'];
    $stop_destination = $_POST['stop'];
    $date = $_POST['date'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];
    $currentDate = date('Y-m-d');

    if ($date >= $currentDate) {
        $insertQuery = "INSERT INTO journey (start_desti, stop_desti, date, seats, price) VALUES ('$start_destination', '$stop_destination', '$date', '$seats', '$price')";

        $queryResult = mysqli_query($conn, $insertQuery);

        if ($queryResult) {
            header('Location: buses.php');
            exit();
        } else {
            echo "<p class='warning'>Error in connection.</p>";
        }
    } else {
        echo "<p class='warning'>Invalid date.</p>";
    }
    if (isset($error_message)) {
        echo "<p class='warning'>$error_message</p>";
    }
}
?>