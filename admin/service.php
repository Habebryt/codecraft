<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "partials/head.php";
?>

<!-- Head ends here -->

<!-- Spinner Start -->
<?php require_once "partials/spinner.php"; ?>
<!-- Spinner End -->

<!-- Sidebar Start -->
<?php require_once "partials/sidebar.php"; ?>
<!-- Sidebar End -->

<!-- Content Start -->
<div class="content">
  <!-- Navbar Start -->
  <?php require_once "partials/menu.php"; ?>
  <!-- Navbar End -->

  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
      <div class="col-md-6 text-center">
        <h3>This is blank page</h3>
      </div>
    </div>
  </div>
  <!-- Blank End -->

  <!-- Footer Start -->

  <?php
  require_once "partials/footer.php";

  ?>

  <!-- Footer Ends -->