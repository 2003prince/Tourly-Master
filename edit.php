<?php

include './connection.php';

$id = $_GET['id'];

    $select255 = "SELECT * FROM user where id='$id'";

  $query255 = mysqli_query($conn,$select255);

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
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #4070f4;
}
.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
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
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
    </style>
</head>
<body>

<div class="wrapper">
    <h2>Edit User Id <?php echo $_GET['id']; ?></h2>
    <form method='post'>

      <div class="input-box">
        <input type="text" placeholder="Enter your Username" name='username' required value="<?php echo $res123['username'];?>">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name='email' required value="<?php echo $res123['email'];?>">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Create password" name='password' required value="<?php echo $res123['u_password'];?>">
      </div>

      <?php

if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    if($_POST['username']==$res123['username'] AND $_POST['email']==$res123['email'] AND $_POST['password']==$res123['u_password']){

        ?>

        <p style="color:red;text-align:center">Edit Values Before Submit</p>

        <?php

    }else{

        $update5 = "update user set username='$username',email='$email',u_password='$password' where id = '$id'";

        $query5 = mysqli_query($conn,$update5);

        if($query5){

            header('Location:dashboard.php');

        }else{

            ?>

        <p style="color:red;text-align:center">Error In Connection</p>

        <?php

        }


    }


}

?>

      <div class="input-box button">
        <input type="Submit" name="submit" value="Update Now">
      </div>
    </form>

  </div>
    
</body>
</html>