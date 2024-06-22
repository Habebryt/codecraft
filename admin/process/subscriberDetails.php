<?php
ini_set("display_errors", "1");
session_start();
require_once "../classes/Newsletter.php";


if (isset($_POST['subDetailId'])) {
    $subId = $_POST['subDetailId'];
    $obj = new Newsletter();
    $subscriberDetails = $obj->viewSubscribers($subId);

    if ($subscriberDetails && is_array($subscriberDetails)) {
        echo json_encode($subscriberDetails);
    } else {
        echo json_encode(["error" => "Subscriber details not found from Ajax"]);
    }
} else {
    echo json_encode(["error" => "Subscriber ID is not provided"]);
}
