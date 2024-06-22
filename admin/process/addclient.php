<?php
require_once "../classes/Client.php";
require_once "../classes/Utilities.php";

$clt = new Client;



if (isset($_POST['addClient']) && $_POST['addClient'] === "addClient") {
    $fullname = Utilities::fullName($_POST['fullname']);
    $phone = Utilities::cleanPhoneNumber($_POST['clientPhone']);
    $email = Utilities::email($_POST['clientEmail']);
    $company = Utilities::lastName($_POST['clientCompany']);
    $website = $_POST['clientWebsite'];
    $category = $_POST['clientCategory'];
    $country = $_POST['clientCountrySelect'];
    $service = $_POST['clientService'];

    $client = $clt->addClient($fullname, $email, $phone, $country, $category, $service, $company, $website);


    header("location: ../client.php");
    exit;
} else {

    echo "something is wrong";
}
