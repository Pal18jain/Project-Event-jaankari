<?php
include 'SMTPMailer.php';
$subject = $_POST['subject'];
$email = $_POST['emails'];
$message = $_POST['message'];
$smtp = new SMTPMailer();
$mail = $smtp->load();

foreach (explode(",", $email) as $address) {

    //call phpmailerlibrary class here 
    $mail->addAddress($address, "Hello");
    $mail->Subject = $subject;
    $mail->Body = $message;
    if ($mail->send()) {
        echo "success";
    } else {
        echo $mail->ErrorInfo;
    }
}
?>