<?php
if (!isset($_SESSION['adminonline'])) {
    $_SESSION['admin_errormsg'] = '<div class="alert alert-danger text-center lead"> <i class="fa-solid fa-circle-xmark"></i> Access Denied. Kindly Login </div>';
    header("location: index.php");
    exit;
}
