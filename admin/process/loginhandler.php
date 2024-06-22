<?php
ini_set("display_errors", "1");
session_start();

require_once "../classes/Admin.php";
require_once "../classes/Utilities.php";
require_once "../classes/LoginAttempt.php";

$user = new User;
$loginNotification = new Login;
$mymail = "habeebbright00@gmail.com";

$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($email !== '' && $password !== '') {
        $result = $user->loginUser($email, $password);
        if ($result === 1) {
            header("Location: ../dashboard.php");
            $sendMail = $loginNotification->loginSuccess($mymail, $email);
            exit();
        } else if ($result === 2) {
            $_SESSION['admin_errormsg'] = "<div class='alert alert-primary text-center text-capitalize'>Invalid Login credentials</div>";
            header("Location: ../index.php");
            $sendMail = $loginNotification->loginFailed($mymail, $email);
            exit();
        } else if ($result === 3) {
            $_SESSION['admin_errormsg'] = "<div class='alert alert-primary text-center text-capitalize'>Not a CodeCraft Admin. Contact CodeCraft Owner for your login Credentials<div>";
            header("Location: ../index.php");
            $sendMail = $loginNotification->loginFailed($mymail, $email);
            exit();
        } else {
            $_SESSION['admin_errormsg'] = '<div class="alert alert-primary text-center text-capitalize">Invalid Credentials</div>';
            header("Location: ../index.php");
            $sendMail = $loginNotification->loginFailed($mymail, $email);
            exit();
        }
    } else {
        $_SESSION['admin_errormsg'] = '<div class="alert alert-primary">Provide Login Credentials</div>';
        $sendMail = $loginNotification->loginFailed($mymail, $email);
    }
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}
