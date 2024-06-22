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
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
      <div class="row">
        <div class="col-12 col-sm-6 text-center text-sm-start">
          &copy; <a href="#">Your Site Name</a>, All Right Reserved.
        </div>
        <div class="col-12 col-sm-6 text-center text-sm-end">
          <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
          Designed By <a href="https://htmlcodex.com">HTML Codex</a>
          <br />Distributed By:
          <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Start -->

  <?php
  require_once "partials/footer.php";

  ?>

  <!-- Footer Ends -->