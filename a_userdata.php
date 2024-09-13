<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find User Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            /* Dark background */
            color: #f1f1f1;
            /* Light text color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .form-container {
            background-color: #2c2c2c;
            /* Darker background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 700px;
            /* Adjusted width */
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container input[type="text"],
        .form-container input[type="submit"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #3c3c3c;
            /* Input field background */
            color: #f1f1f1;
            box-sizing: border-box;
            /* Ensure padding is included in the width */
            margin-right: 10px;
            margin-left: 10px;
        }

        .form-container input[type="submit"] {
            background-color: #00bfff;
            /* Button background */
            color: #1c1c1c;
            /* Button text color */
            cursor: pointer;
            font-size: 16px;
            border: none;
        }

        .form-container input[type="submit"]::before {
            content: "\f002";
            /* Unicode character for search icon */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            left: 10px;
            font-size: 16px;
            color: #1c1c1c;
        }

        .form-container input[type="submit"]:hover {
            background-color: #009acd;
            /* Darker shade on hover */
        }

        /* Styling for the table */
        .data-table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            /* Set background color of table to white */
        }

        .data-table th,
        .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: black;
            /* Set text color of table to black */
        }

        .data-table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .data-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #4070f4;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        a.button:hover {
            background-color: #0e4bf1;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="form-container">
        <h2>Find User Record</h2>
        <form action="a_userdata.php" method="get">
            <input type="text" name="name" placeholder="Enter username" required>
            <input type="submit" name="submit" value="Search">
        </form>
        <?php
        // Include database connection
        include "./connection.php";

        // Check if the form is submitted
        if (isset($_GET["submit"])) {
            // Sanitize the input username
            $user = filter_input(INPUT_GET, "name", FILTER_SANITIZE_SPECIAL_CHARS);

            // Query to select records based on the username
            $sql1 = "SELECT * FROM book WHERE username = '$user'";
            $result1 = mysqli_query($conn, $sql1);

            // Check if there are any records
            if (mysqli_num_rows($result1) > 0) {
                // Display the records in a table
                echo "<table class='data-table'>";
                echo "<tr><th>ID</th><th>Start Destination</th><th>Stop Destination</th><th>Date</th><th>Username</th><th>Seats</th><th>Amount</th></tr>";
                while ($row = mysqli_fetch_assoc($result1)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["start_desti"] . "</td>";
                    echo "<td>" . $row["stop_desti"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["seats"] . "</td>";
                    echo "<td>" . $row["total"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No records found for the given username.";
            }

            // Free result set
            mysqli_free_result($result1);
        }
        ?>
    </div>

    <div class="button-container">
        <a href="dashboard.php" class="button">Back</a>
    </div>
</body>

</html>