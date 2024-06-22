<!-- Head Starts here -->
<?php
session_start();
require_once "partials/head.php";
require_once "classes/Client.php";

$client = new Client;
$mydata = $client->codeCraft();
foreach ($mydata as $data) {
  $appname = $data['app_name'];
  $fullname = $data['firstname'] . " " . $data['lastname'];
  $firstname = $data['firstname'];
  $lastname = $data['lastname'];
  $logo = $data['logo'];
}
?>

<!-- Head ends here -->

<!-- Spinner Start -->
<?php require_once "partials/spinner.php"; ?>
<!-- Spinner End -->

<!-- Sign In Start -->
<div class="container-fluid">
  <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh">
    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
      <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
        <div class="row">
          <div class="col-md-12">
            <?php if (isset($_SESSION['admin_errormsg'])) : ?>
              <div class="bg-secondary"><?php echo $_SESSION['admin_errormsg']; ?></div>
              <?php unset($_SESSION['admin_errormsg']); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-3">
          <a href="../index.php" class="">
            <h3 class="text-light">
              <i class="fa-regular fa-user me-2"></i> <span> <?php echo $appname ?></span>
            </h3>
          </a>
          <h3>Welcome Back</h3>
        </div>
        <form action="process/loginhandler.php" method="POST" id="loginForm">
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="admin@thecodecraft.com" />
            <label for="floatingInput">CodeCraft Email</label>
          </div>
          <div class="form-floating mb-4">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Personal Access Token" />
            <label for="floatingPassword">Personal Access Token</label>
          </div>
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" />
              <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <a href="" class="text-info">Forgot Password</a>
          </div>
          <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
            Sign In
          </button>
        </form>
        <p class="text-center  text-warning mb-0">
          Not a CodeCraft Admin? <a href="../index.php" class="text-info">Go Back</a>
        </p>
      </div>
    </div>
  </div>
</div>
<!-- Sign In End -->
</div>

<!-- Footer Start -->

<?php
require_once "partials/footer.php";

?>

<!-- Footer Ends -->