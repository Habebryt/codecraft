<?php
ini_set("display_errors", "1");
require_once "../classes/Message.php";

$msg = new Message;


// $update = $msg->updateMsgStatus();

if ($_POST['verify'] === "xyzkbA12345t5sq") {
    $msgId = $_POST['messageId'];
    $status = $_POST['msgStatus'];
    $update = $msg->updateMsgStatus($msgId, $status);
    if ($update) {

        $feedback = "<i class='fa-regular fa-face-sad-tear'></i> Message Status Updated Successfully to $status";
        echo json_encode(['success' => true, 'feedback' => $feedback]);
        exit();
    } else {
        $errors[] = "🥺 Message Status Updated failed. Please try again.";
        $feedback = $errors;
        echo json_encode(['success' => false, 'feedback' => $feedback]);
        exit();
    }
} else {
    $feedback = "Message Status update Denied!";
    echo json_encode(['success' => false, 'feedback' => $feedback]);
    exit();
}
