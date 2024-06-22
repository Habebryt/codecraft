<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
require_once "../classes/Client.php";


class FeedbackMail
{
    public function sendMail($email, $message, $fullname)
    {
        $mail = new PHPMailer(true);
        $client = new Client;
        $socials = $client->socials();

        foreach ($socials as $social) :
            $url = $social['url'];
            $icon = $social['icon_2'];
            $name = $social['account'];
            $username = $social['username'];
        endforeach;

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
            $mail->setFrom('thecodecraft00@gmail.com', 'Marketing@CodeCraft');
            $mail->addAddress($email, $fullname);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('thecodecraft00@gmail.com', 'Developers: The-CodeCraft');
            $mail->addCC('habeebbright00@gmail.com', 'Founder: The-CodeCraft');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            $mail->addAttachment('../uploads/logo.png');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true); // Set email format to HTML

            // Set the image encoding to base64
            $mail->Encoding = 'base64';

            // Embed the custom image
            // $mail->addEmbeddedImage('../uploads/logo.png', 'custom_icon_id', '../uploads/logo.png', $mail->Encoding);
            //$mail->addEmbeddedImage('../uploads/logo.png', 'custom_icon_id', '../uploads/logo.png', $mail->Encoding);

            // Check if the image was successfully embedded

            // $mail->Sender = 'habeebbright00@gmail.com <habeebbright00@gmail.com.com?X-Sender-Icon=data:image/png;base64,' . '>';

            // Set the email subject
            $mail->Subject = 'Feedback: Service Delivery';
            $mail->Subject = 'Feedback Received: Service Delivery';
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
                    .mainMessage p, .mainMessage ul {
                        line-height: 1.6;
                        margin: 0 0 10px;
                    }
                    .mainMessage ul {
                        padding-left: 20px;
                    }
                    .mainMessage a {
                        color: #007BFF;
                        text-decoration: none;
                    }
                    .mainMessage a:hover {
                        text-decoration: underline;
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
                        <p class="titleSubject"><strong>Thank You for Your Feedback</strong></p>
                        <hr>
                        <div class="mainMessage">
                            <p>Dear Customer,</p>
                            <p>Thank you for providing your feedback:</p>
                            <p>We have received your message and appreciate your input. Rest assured, we will review your feedback thoroughly.</p>
                            <p>If you have any further questions or concerns, or if you do not hear from us within the next 24 hours, please feel free to contact us via:</p>
                            <ul>
                                <li><strong>Email</strong>: <a href="mailto:thecodecraft00@gmail.com">The-CodeCraft Support</a></li>
                                <li><strong>' . $name . '</strong>: <a href="' . $url . '">' . $username . '</a></li>
                            </ul>
                            <p>Stay connected with us:</p>
                            <ul>
                                <li><strong>Facebook</strong>: <a href="https://www.facebook.com/your-page">Your Facebook Page</a></li>
                                <li><strong>Twitter</strong>: <a href="https://twitter.com/your-username">@YourUsername</a></li>
                                <li><strong>WhatsApp</strong>: <a href="https://wa.me/your-number">Your WhatsApp Number</a></li>
                            </ul>
                            <p>Thank you once again for your valuable feedback. We look forward to serving you better.</p>
                            <p>Best regards,<br> Team CodeCraft</p>
                        </div>
                        <hr>
                        <div class="socialMedia">
                            <a href="https://facebook.com">Facebook</a>
                            <a href="https://twitter.com">Twitter</a>
                            <a href="https://linkedin.com">LinkedIn</a>
                            <a href="https://instagram.com">Instagram</a>
                        </div>
                        <div class="disclaimer">
                            <p>This email was intended for our valued customer because you contacted us. | <a href="https://yourwebsite.com/unsubscribe">Unsubscribe</a> | The links in this email will always direct to https://habeebbright.com. Learn about email security and online safety.</p>
                        </div>
                        <div class="emailFooter">
                            © The-CodeCraft International. 2024
                        </div>
                    </div>
                </div>
            </body>
            </html>';
            

            $mail->AltBody = "Dear Customer,\n\n" .
                "Thank you for providing your feedback:\n\n" .
                "We have received your message and appreciate your input. Rest assured, we will review your feedback thoroughly.\n\n" .
                "If you have any further questions or concerns, or if you do not hear from us within the next 24 hours, please feel free to contact us via:\n\n" .
                "- Email: thecodecraft00@gmail.com\n" .
                "- Phone: +1234567890\n\n" .
                "Stay connected with us:\n\n" .
                "- Facebook: Your Facebook Page\n" .
                "- Twitter: @YourUsername\n" .
                "- WhatsApp: Your WhatsApp Number\n\n" .
                "Thank you once again for your valuable feedback. We look forward to serving you better.\n\n" .
                "Best regards,\nYour Service Team";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendMessage($email, $msg)
    {

        $headers =  "From: TheCodeCraft <thecodecraft00@gmail.com>" . "\r\n";
        $message = "Your Feedback is well received.";
        $subject = "CodeCraft Feedback";
        mail($email, $subject, $message, $headers);
    }
}
