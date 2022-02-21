<?php
    require("connection.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/loginadmin.css">
</head>
<body>
<div class="topnav-right">
  <a href="#home">Home</a>
  <a href="#news">View Events</a>
  <a href="#contact">Contact Us</a>
  <a href="#about">Admin</a>  
</div>
<div class="center">
        <h1>Login For Admin</h1>
    <form  method="post">
        <div class="form-group">
            <input type="text" name="name" required>
            <label>Username</label>
        </div>
        <div class="form-group">
            <input type="password" name="pwd" required>
            <label>Password</label>
        </div>
        <div class="field btn">
            <input type="submit" name="login" value="Login">
        </div>
    </form>
    </div>

        <img src="../Images/जानकारी-removebg-preview.png" width="150" height="150">
    <?php
    if(isset($_POST['login'])){
        $query="SELECT * FROM `admin` WHERE `Username`='$_POST[name]' AND `Password`='$_POST[pwd]'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)==1){
            session_start();
            $_SESSION['Admin Login Id']=$_POST['username'];
            header("Location:adminpanel.php");
        }
        else{
            echo"<script>alert('Incorrect Password');</script>";
        }
    }
    ?>
</body>
</html>