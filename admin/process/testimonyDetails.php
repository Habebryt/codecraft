<?php
ini_set("display_errors", "1");
session_start();
require_once "../classes/Testimonial.php";

if (isset($_POST['feedDetailId'])) {
    $testId = $_POST['feedDetailId'];
    $obj = new Testimonial();
    $testimonialDetails = $obj->viewTestimony($testId);

    if ($testimonialDetails && is_array($testimonialDetails)) {
        echo json_encode($testimonialDetails);
    } else {
        echo json_encode(["error" => "Message details not found from Ajax"]);
    }
} else {
    echo json_encode(["error" => "Message ID is not provided"]);
}
