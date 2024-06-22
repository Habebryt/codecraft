<?php
ini_set("display_errors", "1");
require_once "../classes/Client.php";
require_once "../classes/Utilities.php";
require_once "../classes/FeedbackMail.php";

$contact = new Client;
$FeedbackMail = new FeedbackMail;

$contact = new Client;


if (isset($_POST['SendFeedback'])) {
    $fullname = $_POST['fullname'];
    // $fullname = "Habeeb Bright";
    $email = $_POST['email'];
    // $email = "habeebbright00@gmail.com";
    $social_id = $_POST['socialMediaChannel'];
    // $social_id = 1;
    $social_handle = $_POST['socialMediaHandle'];
    // $social_handle = "habeeb";
    $rating = $_POST['rating'];
    // $rating = "5";
    $company = $_POST['companyName'];
    // $company = "BabeebCode";
    $project = $_POST['project'];
    // $project = "Waterproject";
    $service = $_POST['serviceRendered'];

   // $service = 2;
    $message = $_POST['message'];
   // $message = "New feedback check";

    $errors = [];
    if (empty($fullname)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Fullname Field Cannot be Missing.";
    }
    if (empty($email)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Email Field Cannot be Missing.";
    }
    if (empty($project)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Project Must Be Selected.";
    }
    if (empty($message)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Message Field Cannot be Empty.";
    }
    if (empty($social_id)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Please Select Your Favorite Social Media.";
    }
    if (empty($social_handle)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Please Provide Your Social Media Handle.";
    }
    if (empty($company)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Please Input Your Company Name.";
    }
    if (empty($service)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Please Select a Service for Us to Best Serve You.";
    }

    if (empty($rating)) {
        $errors[] = "<i class='fa-solid fa-circle-exclamation'></i> Please Rate our Service.";
    }

    if (empty($errors)) {

        $message = $contact->feedback($fullname, $social_id, $social_handle, $email, $company, $project, $service, $message, $rating);

        if ($message) {
            $sendmail = $FeedbackMail->sendMail($email, $message, $fullname);
            $services = $contact->services();
            $result = '';
            foreach ($services as $serv) {
                if ($serv['id'] == $service) {
                    $result = $serv['service_name'];
                    break;
                }
            }

            if ($rating == 1) {
                $feedback = "<i class='fa-regular fa-face-sad-tear'></i> Sorry for your Displeasure. I will reach out to you personally, to know why you are displeased with our <span class='text-primary'>$result</span> Service Delivery";
                echo json_encode(['success' => true, 'feedback' => $feedback]);
                exit();
            } else if ($rating ==  2) {
                $feedback = "Your Feedback is Received Successfully. I will reach out to you personally, to know how we can best serve you with our <span class='text-primary'>$result</span> Service Delivery";
                echo json_encode(['success' => true, 'feedback' => $feedback]);
                exit();
            } else if ($rating ==  3) {
                $feedback = "<i class='fa-regular fa-face-meh-blank'></i> Your Feedback is Received Successfully. Looking forward to making bigger Improvements on How we can serve you!";
                echo json_encode(['success' => true, 'feedback' => $feedback]);
                exit();
            } else if ($rating ==  4) {
                $feedback = "<i class='fa-regular fa-face-smile'></i> Your Feedback is Received Successfully. We Look forward to Working with you on your Next Project";
                echo json_encode(['success' => true, 'feedback' => $feedback]);
                exit();
            } else if ($rating ==  5) {
                $feedback = "<i class='fa-solid fa-thumbs-up'></i> Your Feedback is Received Successfully. Thank you for Trusting in our service Delivery <span class='motionified'>😃</span>";
                echo json_encode(['success' => true, 'feedback' => $feedback]);
                exit();
            }
        } else {
            $errors[] = "🥺 Message Sending failed. Please try again.";
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
    $feedback = "Please complete the Feedback form";
    echo json_encode(['success' => false, 'feedback' => $feedback]);
    exit();
}
