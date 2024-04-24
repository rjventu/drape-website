<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])) {
    $recipientEmail = 'drapeclothing11.inq@gmail.com'; 

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'drapeclothing11.inq@gmail.com';
    $mail->Password = 'bbav jmtl utuk dddm';
    $mail->SMTPSecure = 'ssl'; 
    $mail->Port = 465;

    $mail->setFrom('your.email@gmail.com', 'Your Name');
    $mail->addAddress($recipientEmail); 

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = "First Name: " . $_POST["first_name"] . "<br>Last Name: " . $_POST["last_name"] . "<br>Email: " . $_POST["email"] . "<br><br>" . "Message: " . $_POST["message"];

    if($mail->send()) {
        echo "<script>alert('Sent Successfully!');</script>";
        echo "<script>document.location.href = 'contacts.php';</script>";
    } else {
        echo "<script>alert('Failed to send. Please try again later.');</script>";
    }
} 
?>
