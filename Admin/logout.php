<?php
session_start();
unset($SESSION['email']);
session_destroy();
header("location:login-user.php");
?>