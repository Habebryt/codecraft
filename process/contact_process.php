<?php
ini_set("display_errors", "1");
require_once "../classes/Client.php";
require_once "../classes/Utilities.php";
require_once "../classes/ContactMail.php";

$contact = new Client;
$contactMail = new ContactMail;

if (isset($_POST['sendContactMessage'])) {
    $fullname = Utilities::fullName($_POST['fullname']);
    $email = Utilities::email($_POST['email']);
    $phone = Utilities::phone($_POST['phone']);
    $message = Utilities::message($_POST['message']);
    $country = $_POST['country'];
    $service = $_POST['service'];

    // $fullname = "Habeeb Bright Paul";
    // $email = "habeebbright00@gmail.com";
    // $phone = "2348069808207";
    // $message = "Hello Team CodeCraft.. Here We are Interested in your webapp services. Kindly Reach out to us.";
    // $country = 150;
    // $service = 5;

    $errors = [];

    if (empty($fullname)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Fullname field cannot be missing.";
    } elseif (empty($email)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Email field cannot be missing.";
    } elseif (empty($phone)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Phone field cannot be empty.";
    } elseif (empty($message)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Message field cannot be empty.";
    } elseif (empty($country)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Please select your country.";
    } elseif (empty($service)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Please select a service for us to best serve you.";
    }

    if (empty($errors)) {

        $contMe = $contact->contactMe($fullname, $email, $phone, $message, $country, $service);

        if ($contMe === true) {

            $result = array();
            $result['success'] = false;
            if ($contactMail->sendMail($email, $fullname)) {
                $feedback = "<p class='alert alert-info'><i class='fa-solid fa-check'></i> Your Request is Acknowledged. Kindly check your Email. I will contact you via your Email within 24 hours.</p>";
                $result['success'] = true;
                $result['feedback'] = $feedback;
                echo json_encode($result);
            }
            exit();
        } elseif (is_string($message)) {
            $errors[] = $message;
            $feedback = $errors;
            echo json_encode(['success' => false, 'feedback' => $feedback]);
            exit();
        } else {
            $errors[] = "Message Sending failed. Please try again.";
            $feedback = $errors;
            echo json_encode(['success' => false, 'feedback' => $feedback]);
            exit();
        }
    } else {
        $feedback = $errors;
        echo json_encode(['success' => false, 'feedback' => $feedback]);
        exit();
    }
} else {
    $feedback = "<i class='fa-solid fa-circle-exclamation'></i> Please complete the form";
    echo json_encode(['success' => false, 'feedback' => $feedback]);
    exit();
}
