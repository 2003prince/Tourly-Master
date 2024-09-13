<?php

error_reporting(0);

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    body {
      background-color: #151515;
      color: #f1f1f1;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .register {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 80px;
      min-height: 80vh;
    }

    form {
      border-radius: 5px;
      background-color: #2c2c2c;
      padding: 20px 40px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    .title {
      text-align: center;
      padding: 20px 0;
      font-size: 2rem;
      color: #00bfff;
    }

    .form-label {
      margin-left: 10px;
      font-size: 1.2rem;
      color: #f1f1f1;
    }

    .form-control {
      padding: 10px;
      font-size: 1.2rem;
      background-color: #3c3c3c;
      color: #f1f1f1;
      border: none;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .register_btn {
      height: 50px;
      width: 100%;
      font-size: 1.2rem;
      background-color: #00bfff;
      border: none;
      border-radius: 5px;
      color: #1c1c1c;
      transition: all 0.3s ease;
    }

    .register_btn:hover {
      background-color: #009acd;
    }

    .alert {
      font-size: 1.2rem;
      color: #ff7f7f;
    }
  </style>
</head>

<body>

  <div class="register">
    <form class="needs-validation" novalidate enctype="multipart/form-data" method="post">
      <div class="title">
        <h1>Login</h1>
      </div>
      <div class="mb-3">
        <label for="validationCustomUsername" class="form-label">Username</label>
        <input type="text" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $_POST['email']; ?>" required placeholder="example@gmail.com">
        <div class="invalid-feedback">
          Please Enter Valid Username
        </div>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" value="<?php echo $_POST['password']; ?>" placeholder="Password" required>
      </div>
      <hr>

      <?php

      include './connection.php';


      if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $select = "select * from admin where email = '$email'";

        $query = mysqli_query($conn, $select);

        $email_count = mysqli_num_rows($query);

        $email_pass = mysqli_fetch_assoc($query);

        //   $db_status = $email_pass['status'];

        $db_pass = $email_pass['u_password'];

        //   $db_f_name = $email_pass['f_name'];

        //   $db_l_name = $email_pass['l_name'];

        //   $db_dob = $email_pass['dob'];

        $db_email = $email_pass['email'];

        $db_ip = $email_pass['ip_address'];

        $_SESSION['password'] = $db_pass;

        if ($db_pass == $password) {

          echo "<h3>Login Successful</h3>";

          $session_id = session_id();

          $_SESSION['session_id'] = session_id();

          if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
          } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            # when behind cloudflare
            $ipaddress = $_SERVER['HTTP_CF_CONNECTING_IP'];
          } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
          } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
          } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
          } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
          } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
          }

          $_SESSION['f_ip'] = $ipaddress;

          date_default_timezone_set('Asia/Kolkata');

          $date = date("y/m/d");

          $time = date("h:i:sa");

          $_SESSION['sid'] = $session_id;

          $update = "update admin set session_id='$session_id',ip_address='$ipaddress',u_date='$date',u_time='$time' where username = '$email'";

          $query = mysqli_query($conn, $update);

          $_SESSION['admin_email'] = $email;

          header('Location:dashboard.php');
        } else {
      ?>
          <div class="alert alert-danger">
            <strong>Invalid </strong> Username Or Password
          </div>
      <?php
        }
        //   }
      } else {
      }

      ?>

      <div class="col-12">
        <p style="text-align:Center;"><button class="btn btn-primary register_btn" name="submit" type="submit">Login</button></p>
      </div>
    </form>

  </div>







  <script>
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>

</body>

</html>