<?php
session_start();
require_once "../classes/Mail.php";
require_once "../classes/SendEmail.php";
$email = new Email;
$mailClient = new EmailClient;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['verifyEmail'] === "xyzkbA12345t5sq") {
        $emailSender = $_SESSION['adminonline']['email'];
        $clientName = $_POST['clientName'];
        $clientEmail = $_POST['clientEmail'];
        $mailSubject = $_POST['mailSubject'];
        $mailMessage = $_POST['mailMessage'];
        $file = $_FILES['attachment'];
        $errors = [];
        if ($file['error'] != UPLOAD_ERR_OK) {
            $feedback = "File type not supported, kindly send a message to support <a href='../support.php'>HERE</a>";
            echo json_encode(['success' => false, 'feedback' => $feedback]);
            exit();
        } else {
            $fileDir = '../document/';

            // Check if the upload directory exists, if not, create it
            if (!file_exists($fileDir)) {
                mkdir($fileDir, 0777, true); // Create directory  with full permissions
            }

            $originalFileName = $file['name'];
            $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $uniqueFileName = uniqid() . '.' . $extension;
            $targetFile = $fileDir . $uniqueFileName;

            if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                // print_r($targetFile);

                // die;
                //File uploaded successfully, insert into database
                $result = $email->clientEmail($emailSender, $clientName, $clientEmail, $mailSubject, $mailMessage, $uniqueFileName);
                //    var_dump($result);
                if ($result) {
                    $sendMail = $mailClient->Sendmail($emailSender, $clientName, $clientEmail, $mailSubject, $mailMessage, $uniqueFileName, $originalFileName);
                    if ($sendMail) {
                        $feedback = "Email Sent Successfully.";
                        echo json_encode(['success' => true, 'feedback' => $feedback]);
                        exit();
                    } else {
                        $feedback = "Failed to send Email.";
                        echo json_encode(['success' => false, 'feedback' => $feedback]);
                        exit();
                    }
                } else {
                    $feedback = "Failed to log your Email in the database. Kindly Try again.";
                    echo json_encode(['success' => false, 'feedback' => $feedback]);
                    exit();
                }
            } else {
                $feedback = "Failed to Upload file Try again.";
                echo json_encode(['success' => false, 'feedback' => $feedback]);
                exit();
            }
        }
    } else {
        $feedback = "Access Denied. Try again.";
        echo json_encode(['success' => false, 'feedback' => $feedback]);
        exit();
    }
}
