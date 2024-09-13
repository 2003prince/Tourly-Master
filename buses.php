<?php
session_start();
include './connection.php';

// Fetch all bus data from the database
$query = "SELECT * FROM journey";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buses List</title>
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
        }

        .container {
            max-width: 900px;
            width: 100%;
            background: #fff;
            padding: 34px;
            border-radius: 6px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #4070f4;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            /* Added margin for spacing */
        }

        a.button:hover {
            background-color: #0e4bf1;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Buses List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Start Destination</th>
                <th>Stop Destination</th>
                <th>Date</th>
                <th>Seats</th>
                <th>Price</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['start_desti']; ?></td>
                    <td><?php echo $row['stop_desti']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['seats']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
            <?php } ?>
        </table>
        <div class="button-container">
            <a href="destination_insert.php" class="button">Insert New Bus</a>
            <a href="dashboard.php" class="button">Back</a>
        </div>
    </div>
</body>

</html>