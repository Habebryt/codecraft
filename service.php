<!-- Header Starts Here -->

<?php
require_once "partials/header.php";
require_once "classes/Client.php";

$client = new Client;
$services = $client->services(); ?>

<!-- Header Ends Here -->
<div class="col-md-9 mybg" id="main">
  <div class="container">
    <div class="text-center my-5">
      <h1 class="display-4 text-light">Welcome to My Services</h1>
      <p class="lead text-light">
        Explore the range of professional services I offer to help you
        build, design, and optimize your web applications. From
        full-stack development to responsive design, each service is
        tailored to meet your unique needs.
      </p>
    </div>

    <div class="row">
      <?php foreach ($services as $service) : ?>
        <?php
        $name = $service['service_name'];
        $image = $service['image'];
        $detail = $service['description'];
        ?>
        <div class="col-md-3 mb-4">
          <div class="card bg-dark text-light h-100">
            <div class="card-body text-center">
              <img src="uploads/<?php echo $image; ?>" class="rounded-circle mb-3" alt="Service Image" style="width: 100px; height: 100px" />
              <h5 class="card-title"><?php echo $name; ?></h5>
              <p class="card-text">
                <?php echo $detail; ?>
              </p>
              <a href="contact.php" class="btn btn-contact">Request Service</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

    <!-- Footer Starts Here -->

    <?php require_once "partials/footer.php" ?>

    <!-- Footer Ends Here -->