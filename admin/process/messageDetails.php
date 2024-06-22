<?php
ini_set("display_errors", "1");
session_start();
require_once "../classes/Message.php";

// Check if msgId is provided
if (isset($_POST['msgDetailId'])) {
    $msgId = $_POST['msgDetailId'];
    $obj = new Message();
    $messageDetails = $obj->viewMessage($msgId);

    if ($messageDetails && is_array($messageDetails)) {
        echo json_encode($messageDetails);
    } else {
        // Return an error message if message details are not found
        echo json_encode(["error" => "Message details not found from Ajax"]);
    }
} else {
    // Return an error message if msgId is not provided
    echo json_encode(["error" => "Message ID is not provided"]);
}
