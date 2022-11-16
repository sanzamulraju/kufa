<?php
session_start();

require_once('../../db-connect.php');
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

 $flag = false;
if ($name) {
    $remove_name_space = str_replace(" ", "", $name);
    if (ctype_alpha($remove_name_space)) {
    } else {
        $flag = true;
        $_SESSION['name_error'] = 'Invalid Name';
    }
} else {
    $flag = true;
    $_SESSION['name_error'] = 'Invalid Name';
}

//email chek

if ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } else {
        $flag = true;
        $_SESSION['email_error'] = 'Invalid Email';
    }
} else {
    $flag = true;
    $_SESSION['email_error'] = 'pelase enter email';
}
if ($flag) {
    header('location:../../frontend/home.php');
} else {
    $contacts_query = "INSERT INTO contacts (name,email,message) VALUES ('$name','$email','$message')";
    mysqli_query($db_connect, $contacts_query);
    $_SESSION['concact_status'] = "Submite Successfully & email sent,$name ";
    header('location:../../frontend/home.php');
} 




//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sanzamul666@gmail.com';                     //SMTP username
    $mail->Password   = 'lrsymmrrzzmjjpki';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587; 



    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('islammahfuz31@gmail.com', 'raju');     //Add a recipient
               //Name i
    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "contact massage from $name";
    $mail->Body    = "
    <h1>$name</h1>
    <h2>$email</h2>
    <p>$message</p>
    ";
  

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
