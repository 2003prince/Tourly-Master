<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
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

        .signup-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 300px;
            text-align: center;
        }

        .signup-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .signup-container input[type="text"],
        .signup-container input[type="password"],
        .signup-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .signup-container input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .signup-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .signup-container p {
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>

    <div class="signup-container">
        <h2>Sign Up</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="submit" name="submit" value="Sign Up">
        </form><br>


        <?php

        include './connection.php';

        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            // $hash = password_hash($password,PASSWORD_DEFAULT);

            $select1 = "select * from user where username = '$username'";
            $select2 = "select * from user where email = '$email'";

            $query1 = mysqli_query($conn, $select1);
            $query2 = mysqli_query($conn, $select2);

            $email_count1 = mysqli_num_rows($query1);
            $email_count2 = mysqli_num_rows($query2);


            if ($email_count1) {

        ?>

                <div class="error" style="background:#FFCCCB;color:red;border-radius:5px;padding:10px 10px;">
                    <h6>This Username Is Already Associated With Other User Account</h6>
                </div>

            <?php

            } elseif ($email_count2) {
            ?>

                <div class="error" style="background:#FFCCCB;color:red;border-radius:5px;padding:10px 10px;">
                    <h6>Email already exists. Please use a different email.</h6>
                </div>

        <?php
            } else {


                $insert = "insert into user(username,u_password,email)values('$username','$password','$email')";

                $query = mysqli_query($conn, $insert);

                header("Location: login__.php");
            }
        }
        ?>


        <p>Already have an account? <a href="http://localhost/tourly-master/tourly-master/tourly-master/login__.php">Log in here</a></p>
    </div>




</body>

</html>