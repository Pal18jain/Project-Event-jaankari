<?php
use PHPMailer\PHPMailer\PHPMailer;

include './vendor/autoload.php';
class SMTPMailer{
    public function load(){
        $mail= new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug=0;
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth= True;
        $mail->isHTML(True);
        $mail->Username="pal18jain@gmail.com";
        $mail->Password="592064#palak";
        $mail->Port=587;
        $mail->CharSet="utf-8";
        $mail->From="pal18jain@gmail.com";
        $mail->FromName="PalakJain";
        return $mail;
    }
}