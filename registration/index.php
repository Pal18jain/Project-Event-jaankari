<?php include ("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body >
<div class="logo">
      <img src="logo.png" alt="logo">
    </div>
  <input type="checkbox" id="toggle">
  <label for="toggle" class="show-btn"></label>
  <div class="wrapper">
    
    <label for="toggle">
    <i class="cancel-icon fas fa-times"></i>
    </label>
    <div class="icon"><i class="fa fa-envelope" style="font-size:70px;color:black"></i></div>
    <div class="content">
      <header> REGISTER </header>
      <p>Register to our website and get the latest updates straight to your inbox.</p>
    </div>
    <form action="index.php" method="POST">
    <?php 
    $userEmail = ""; //first we leave email field blank
    if(isset($_POST['register'])){ //if register btn clicked
      $userEmail = $_POST['email']; //getting user entered email
      $query = "INSERT INTO user values('','$userEmail')";
      $data = mysqli_query($conn,$query);
      if($data)
      {
       // echo "Data Inserted into Database" ;
      }
      else
      {
        echo "Failed" ;
      }

      if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validating user email
        $subject = "You have successfully registered- Event Jankari";
        $message = "Thanks for registering to our website. You will receive updates from us.";
        $sender = "From: shikha.manshi99@gmail.com";
        //php function to send mail
        if(mail($userEmail, $subject, $message, $sender)){
          ?>
           <!-- show success message once email send successfully -->
          <div class="alert success-alert">
            <?php echo "Thanks for registering!" ?>
          </div>
          <?php
          $userEmail = "";
        }else{
          ?>
          <!-- show error message if somehow mail can't be sent -->
          <div class="alert error-alert">
          <?php echo "Failed while sending your mail!" ?>
          </div>
          <?php
        }
      }else{
        ?>
        <!-- show error message if user entered email is not valid -->
        <div class="alert error-alert">
          <?php echo "$userEmail is not a valid email address!" ?>
        </div>
        <?php
      }
    }
    ?>
      <div class="field">
        <input type="text" class="email" name="email" placeholder="Email Address" required value="<?php echo $userEmail ?>">
      </div>
      <div class="field btn">
        <div class="layer"></div>
        <button type="submit" name="register">REGISTER</button>
      </div>
    </form>
    <div class="text"> 
    </div>
  </div>

</body>

</html>
 