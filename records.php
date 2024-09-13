<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login__.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .main {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #00bcd4;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #ff5c5c;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #ff0000;
        }
    </style>
</head>

<body>
    <div class="main">
        <table>
            <tr>
                <th>Start Destination</th>
                <th>Stop Destination</th>
                <th>Date</th>
                <th>Seats</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            <?php
            include 'connection.php';

            $username = $_SESSION['user_name'];

            $select = "SELECT * FROM book WHERE username='$username'";
            $query = mysqli_query($conn, $select);

            while ($res = mysqli_fetch_array($query)) {
                $start_destination = $res['start_desti'];
                $stop_destination = $res['stop_desti'];
                $date = $res['date'];
                $seats = $res['seats'];
                $amount = $res['total'];
                $id = $res['id'];
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($start_destination); ?></td>
                    <td><?php echo htmlspecialchars($stop_destination); ?></td>
                    <td><?php echo htmlspecialchars($date); ?></td>
                    <td><?php echo htmlspecialchars($seats); ?></td>
                    <td><?php echo htmlspecialchars($amount); ?></td>
                    <td><a href="record_del.php?id=<?php echo htmlspecialchars($id); ?>"><button class="delete-btn">Delete</button></a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>