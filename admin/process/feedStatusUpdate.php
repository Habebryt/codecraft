<?php
ini_set("display_errors", "1");
require_once "../classes/Testimonial.php";

$subUp = new Testimonial;


if ($_POST['verify'] === "xyzkbA12345t5sq") {
    $feedId = $_POST['feedbackId'];
    $status = $_POST['feedStatus'];
    $update = $subUp->updateFeedStatus($feedId, $status);
    if ($update) {
        $feedback = "<i class='fa-regular fa-face-sad-tear'></i> Feedback Status Updated Successfully to $status";
        echo json_encode(['success' => true, 'feedback' => $feedback]);
        exit();
    } else {
        $errors[] = "🥺 Feedback Status Updated failed. Please try again.";
        $feedback = $errors;
        echo json_encode(['success' => false, 'feedback' => $feedback]);
        exit();
    }
} else {
    $feedback = "Message Status update Denied!";
    echo json_encode(['success' => false, 'feedback' => $feedback]);
    exit();
}
