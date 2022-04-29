<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");
    require("PHPMailer-master/src/Exception.php");
//Load Composer's autoloader
require 'vendor/autoload.php';

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "event_jaankari";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `user`";

$result1 = mysqli_query($connect, $query);

while($row= mysqli_fetch_assoc($result1)){
    $Email= $row['Email'];
    send_email($Email);
}

function send_email($Email){
//Create an instance; passing `true` enables exceptions
if(isset($_POST['register'])){
    $subject = $_POST['ename'];
    $body = $_POST['edetails'];

$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'pal18jain@gmail.com';                     //SMTP username
    $mail->Password   = '592064#palak';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pal18jain@gmail.com', 'Event Jaankari');
    $mail->addAddress($Email);               //Name is optional

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    if($mail->send()){
    ?>
     <meta http-equiv = "refresh" content = "0; url = http://localhost:8080/Project-Event-jaankari/admin/home.php" />
    <?php

    }
} catch (Exception $e) {
    $alert = '<div class="alert-error">
    <span>'.$e->getMessage().'</span>
  </div>';
}
}
}
?>
