<?php

session_id($_SESSION['sid']);

session_start();

session_destroy();

header('Location:index.php');

?>