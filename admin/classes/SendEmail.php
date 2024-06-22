<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';


class EmailClient
{
    public function Sendmail($emailSender, $clientName, $clientEmail, $mailSubject, $mailMessage, $uniqueFileName, $originalFileName)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'thecodecraft00@gmail.com';                     //SMTP username
            $mail->Password   = 'yeve zsfr iatj islw';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($emailSender, 'CodeCraft Update');
            $mail->addAddress($clientEmail, $clientName);     //Add a recipient
            $mail->addAddress('thecodecraft00@gmail.com');               //Name is optional
            // $mail->addReplyTo('thecodecraft00@gmail.com', 'Founder: The-CodeCraft');
            $mail->addCC('thecodecraft00@gmail.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            if (!empty($originalFileName)) {
                $mail->addAttachment("../document/$uniqueFileName", $originalFileName);
            }        //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true); // Set email format to HTML

            // Set the image encoding to base64
            $mail->Encoding = 'base64';


            // Set the email subject
            $mail->Subject = $mailSubject;
            $mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
        }
        .main {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            background-color: grey;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
            text-align: left;
        }
        .logoimage img {
            max-width: 100%;
            height: auto;
        }
        .titleSubject {
            font-size: 1.5em;
            margin-bottom: 10px;
            text-align: center;
        }
        .mainMessage p {
            line-height: 1.6;
            margin: 0 0 10px;
        }
        .mainMessage a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .mainMessage a:hover {
            background-color: #0056b3;
        }
        .socialMedia {
            margin: 20px 0;
            text-align: center;
        }
        .socialMedia a {
            margin: 0 10px;
            text-decoration: none;
            color: #007BFF;
        }
        .disclaimer, .emailFooter {
            font-size: 0.8em;
            color: #777;
            text-align: center;
        }
        hr {
            border: none;
            border-top: 1px solid #eee;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="logoimage" style="text-align: center;">
                <img src="admin/upload/email.png" alt="Logo">
            </div>
              <p class="titleSubject"><strong>' . $mailSubject . '</strong></p>
            
            <hr>
            <div class="mainMessage">
                <p>Hello ' . $clientName . ',</p>
                <p>' . $mailMessage . '</p>
                <p>Best regards,</p>
                <p>' . $emailSender . '</p>
                <a href="https://yourwebsite.com/index.php">Visit Us</a>
            </div>
            <hr>
            <div class="socialMedia">
                <a href="https://facebook.com">Facebook</a>
                <a href="https://twitter.com">Twitter</a>
                <a href="https://linkedin.com">LinkedIn</a>
                <a href="https://instagram.com">Instagram</a>
            </div>
            <div class="disclaimer">
                <p>This email was intended for ' . $clientName . ' because you contacted us. | <a href="https://yourwebsite.com/unsubscribe">Unsubscribe</a> | The links in this email will always direct to https://habeebbright.com. Learn about email security and online safety.</p>
            </div>
            <div class="emailFooter">
                © The-CodeCraft International. 2024
            </div>
        </div>
    </div>
</body>
</html>';




            $mail->AltBody = "Hello $clientName, New Feedback from CodeCraft.";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendMessage($email, $mailMessage, $mailSubject)
    {

        $headers =  "From: TheCodeCraft <thecodecraft00@gmail.com>" . "\r\n";
        $message = $mailMessage;
        $subject = $mailSubject;
        mail($email, $subject, $message, $headers);
    }
}
