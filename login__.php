<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form method='post'>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" name="submit">
        </form>


        <?php

        include './connection.php';

        if (isset($_POST['submit'])) {


            $email = $_POST['username'];
            $password = $_POST['password'];

            $select = "select * from user where username = '$email'";

            $query = mysqli_query($conn, $select);

            $email_count = mysqli_num_rows($query);

            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['u_password'];

            if ($email_pass['ban'] == 'ban') {

        ?>

                <p style="color:red;text-align:center;">Your Account Is Banned By Admin For Violation of Rules</p>

        <?php

            } else {

                if ($db_pass == $password) {

                    echo "<h2>Login Successful</h2>";

                    $_SESSION['user_name'] = $email;

                    header("Location: index.php");
                } else {

                    echo "<h2>Login Failed</h2>";
                }
            }
        }

        ?>


    </div>

</body>

</html>