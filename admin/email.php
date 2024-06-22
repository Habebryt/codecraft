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
        }
        .logoimage img {
            max-width: 100%;
            height: auto;
        }
        .titleSubject {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .mainMessage p {
            line-height: 1.6;
            text-align: left;
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
        }
        .socialMedia a {
            margin: 0 10px;
            text-decoration: none;
            color: #007BFF;
        }
        .disclaimer, .emailFooter {
            font-size: 0.8em;
            color: #777;
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
            <div class="logoimage">
                <img src="upload/email.png" alt="Logo">
            </div>
            <p class="titleSubject"><strong>Your Message is Well Received.</strong></p>
            <hr>
            <div class="mainMessage">
                <p>Hello $receiverName,</p>
                <p>$messageContent</p>
                <p>Best regards,</p>
                <p>$senderName</p>
                <p>$senderTeam</p>
                <a href="index.php">Visit Us</a>
            </div>
            <hr>
            <div class="socialMedia">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">LinkedIn</a>
                <a href="#">Instagram</a>
            </div>
            <div class="disclaimer">
                <p>This email was intended for $receiverName because you contacted us. | <a href="#">Unsubscribe</a> | The links in this email will always direct to https://habeebbright.com. Learn about email security and online safety.</p>
            </div>
            <div class="emailFooter">
                © The-CodeCraft International. 2024
            </div>
        </div>
    </div>
</body>
</html>
