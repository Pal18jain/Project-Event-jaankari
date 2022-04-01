<?php
session_start();
unset($SESSION['Username']);
header("location:admin_login.php");
?>