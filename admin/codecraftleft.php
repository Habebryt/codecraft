<?php
ini_set("display_errors", "1");
session_start();
require_once "classes/Admin.php";

$user = new User;
$user->logoutAdmin();
header("location: index.php");
exit();
