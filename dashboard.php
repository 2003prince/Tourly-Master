<?php
include './connection.php';

// restrict to resubmit form

//

//  error_reporting(0);

session_start();

if ($_SESSION['admin_email']) {
} else {

  header('Location:admin_login.php');
}

// Get search query if it exists
$search_query = '';
if (isset($_POST['search_text'])) {
  $search_query = $_POST['search_text'];
}

?>
<!-- <!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://kit.fontawesome.com/f86f76248b.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
    let getMode1 = localStorage.getItem("mode");

    if (getMode1 && getMode1 === "dark-mode") {
      let backcl = '#e4e9f7';
    } else {
      let backcl = 'white';
    }
  </script> -->

<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://kit.fontawesome.com/f86f76248b.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
    let getMode1 = localStorage.getItem("mode");

    if (getMode1 && getMode1 === "dark-mode") {
      let backcl = '#e4e9f7';
    } else {
      let backcl = 'white';
    }
  </script>

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      min-height: 100vh;
      background-color: var(--sidebar-color);
      transition: var(--tran-05);
    }

    .container-fluid {
      margin: 0px 10px;
      padding: 0px 10px;
      display: flex;
      flex-direction: row;
    }

    #columnchart12 {
      width: 100%;
      height: 650px;
    }

    #list_email {
      text-wrap: wrap;
      padding: 20px 10px;
      margin: 0px 10px;
      background: var(--sidebar-color);
      width: 60%;
      height: 650px;
      overflow: auto;
      color: var(--text-color);
      /* display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center; */
    }

    .list {
      display: flex;
      flex-direction: column;
      padding: 15px 10px;
      border-bottom: 1px dotted var(--text-color);
    }

    hr {
      width: 100%;
      border: 2px dotted var(--text-color);
    }

    a {
      color: var(--text-color);
      text-decoration: none;
    }

    .count_cont {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .count_list {
      display: flex;
      flex-direction: column;
      padding: 20px 40px;
      margin: 20px 20px;
      background: var(--sidebar-color);
      color: var(--text-color);
    }

    .count_list>i {
      font-size: 3rem;
      padding: 10px 0px;
    }

    select {
      padding: 5px 20px;
      margin: 0px 20px;
      border-radius: 5px;
    }

    .text {
      display: flex;
      flex-direction: row;
      align-items: center;
      /* justify-content: center; */
    }

    table {
      width: 90%;
      border: 1px solid white;
      padding: 5px;
      text-align: center;
      color: white;
    }

    tr,
    td {
      border: 1px solid white;
      padding: 5px;
      text-align: center;
    }

    @media only screen and (max-width: 940px) {

      .container-fluid {
        margin: 0px 6px;
        padding: 0px 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }

      #columnchart12 {
        width: 100%;
        height: 300px;
      }

      #list_email {
        padding: 10px 0px;
        margin: 10px 0px;
        font-size: 0.7rem;
        width: 100%;
      }

      .list {
        display: flex;
        flex-direction: column;
        padding: 5px 5px;
        align-items: center;
        justify-content: center;
      }

      .count_cont {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }

      .count_list {
        display: flex;
        flex-direction: column;
        width: 70%;
        padding: 5px 40px;
        margin: 5px 20px;
      }

      .text {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* justify-content: center; */
      }

    }
  </style>

</head>

<body>
  <?php
  include 'sidebar.php';
  ?>
  <section class="home">
    <div class="text">
      <h3>Dashboard</h3>
    </div>

    <div class="count_cont">

      <table>
        <tr>
          <td>ID</td>
          <td>Username</td>
          <td>Email</td>
          <td>Password</td>
          <td>Modify</td>
          <td>Ban</td>
          <td>Delete</td>
        </tr>
        <?php

        if ($search_query) {
          // If there is a search query, fetch only the matching users
          $stmt = $conn->prepare("SELECT * FROM user WHERE username LIKE ?");
          $search_param = '%' . $search_query . '%';
          $stmt->bind_param("s", $search_param);
        } else {
          // If there is no search query, fetch all users
          $stmt = $conn->prepare("SELECT * FROM user");
        }

        $stmt->execute();
        $result = $stmt->get_result();

        while ($nope = $result->fetch_assoc()) {
          // Display each user
        ?>

          <tr>
            <td><?php echo $nope['id']; ?></td>
            <td><?php echo $nope['username']; ?></td>
            <td><?php echo $nope['email']; ?></td>
            <td><?php echo $nope['password']; ?></td>
            <td><button style="padding:5px 15px;"><a href="edit.php?id=<?php echo $nope['id']; ?>" style="color:green;">Edit</a></button></td>
            <?php

            if ($nope['ban'] == 'ban') {

            ?>

              <td><button style="padding:5px 15px;"><a href="ban.php?id=<?php echo $nope['id']; ?>" style="color:green;">Unban</a></button></td>

            <?php

            } else {

            ?>

              <td><button style="padding:5px 15px;"><a href="ban.php?id=<?php echo $nope['id']; ?>" style="color:red;">Ban</a></button></td>

            <?php

            }

            ?>

            <td><button style="padding:5px 15px;"><a href="user_del.php?id=<?php echo $nope['id']; ?>" style="color:red;">Delete</a></button></td>

          </tr>

        <?php
        }

        $stmt->close();
        ?>

      </table>

    </div>
  </section>


  <script>
    function myfun() {
      document.getElementById('form').submit();
    }

    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>