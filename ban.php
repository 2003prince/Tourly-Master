<?php


include './connection.php';

$id = $_GET['id'];

$select255 = "select * from user where id='$id'";

$query255 = mysqli_query($conn, $select255);

$res123 = mysqli_fetch_assoc($query255);

$ban = $res123['ban'];

if ($ban == 'ban') {

  $val = 'unban';
} else {

  $val = 'ban';
}

$select255 = "update user set ban='$val' where id='$id'";

$query255 = mysqli_query($conn, $select255);

if ($query255) {

  header('Location:dashboard.php');
} else {

?>

  <p style="color:red;text-align:center">Error In Connection</p>

<?php


}


?>