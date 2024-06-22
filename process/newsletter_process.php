<?php
ini_set("display_errors", "1");

require_once "../classes/Client.php";
require_once "../classes/Utilities.php";
require_once "../classes/NewsletterMail.php";

$subscribe = new Client;
$NewsletterMail = new NewsletterMail;

// print_r($_POST);
// die;

if (isset($_POST['Subscribe'])) {
    $firstname = $_POST['firstname'];
    // $firstname = "Bright";
    $lastname = $_POST['lastname'];
    // $lastname = "Habeeb";
    $email = $_POST['email'];
    // $email = "Habeebbright00@gmail.com";
    $subscriberCode = Utilities::generateRandomString();
    // echo $subscriberCode;
    // die;

    $errors = [];
    if (empty($firstname)) {
        $errors[] = "Firstname Field Cannot be Missing";
    }
    if (empty($lastname)) {
        $errors[] = "Lastname Field Cannot be Missing";
    }
    if (empty($email)) {
        $errors[] = "Email Field Cannot be Empty";
    }

    if (empty($errors)) {
        $subscription = $subscribe->newsletter($firstname, $lastname, $email, $subscriberCode);
        $sendmail = $NewsletterMail->sendMail($email, $firstname);
        if ($subscription) {
            $sendmail = $contact->sendMail($email, $message);
            $feedback = "Hi <span class='motionified'>CodeCrafter:</span> $firstname, I am glad to have you join The CodeCrafters Community.";
            echo json_encode(['success' => true, 'feedback' => $feedback]);
            exit();
        } else {
            $errors[] = "Subscription to The-CodeCraft failed. Please try again.";
            $feedback = $errors;
            echo json_encode(['success' => false, 'feedback' => $feedback]);
            exit();
        }
    } else {
        $feedback = "Dear CodeCrafter, your Subscription to The-CodeCraft was not successful because of a missing field. Kindly Fill and Try again.";
        echo json_encode(['success' => false, 'feedback' => $feedback]);
        exit();
    }
} else {
    $feedback = "Kindly fill the form";
    echo json_encode(['success' => false, 'feedback' => $feedback]);
    exit();
}
