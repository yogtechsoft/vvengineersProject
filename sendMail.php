<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if(isset($_POST['name']))
{
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $mobile  = $_POST['mobile'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {

        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // Gmail ID
        $mail->Username   = 'vijay.chavan@vveng.in';

        // Gmail App Password
        $mail->Password   = 'bskr ljeh onwf iegi';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender
        $mail->setFrom('vijay.chavan@vveng.in', 'VV Engineers');

        // Company Mail Receiver
        $mail->addAddress('vijay.chavan@vveng.in');

        // Reply To Customer
        $mail->addReplyTo($email, $name);

        // Email Content
        $mail->isHTML(true);

        $mail->Subject = "New Contact Form Message";

        $mail->Body = "
        <h2>New Contact Form Message</h2>

        <table border='1' cellpadding='10' cellspacing='0' width='100%'>
            <tr>
                <td><b>Name</b></td>
                <td>$name</td>
            </tr>

            <tr>
                <td><b>Email</b></td>
                <td>$email</td>
            </tr>

            <tr>
                <td><b>Mobile</b></td>
                <td>$mobile</td>
            </tr>

            <tr>
                <td><b>Subject</b></td>
                <td>$subject</td>
            </tr>

            <tr>
                <td><b>Message</b></td>
                <td>$message</td>
            </tr>
        </table>
        ";

        $mail->send();

        echo "
        <script>
            alert('Email Sent Successfully');
            window.location='contact.html';
        </script>
        ";

    } catch (Exception $e) {

        echo "
        <script>
            alert('Mailer Error: {$mail->ErrorInfo}');
            window.location='contact.html';
        </script>
        ";
    }
}

?>