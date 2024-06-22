<!-- Header Starts Here -->
<?php
require_once "partials/header.php";
require_once "classes/Client.php";
require_once "classes/Utilities.php";

$client = new Client;
$testimonials = $client->allTestimonial();
?>
<!-- Header Ends Here -->
<div class="col-md-9 mybg" id="main">
  <div class="container">
    <div class="row my-3">
      <div class="col-md-12">
        <div class="row my-3 justify-content-center align-items-center">
          <div class="col-md-6">
            <div class="testimonial-header text-start ms-2">
              <h1>All our Clients Testimonials.</h1>
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-end align-items-center">
            <div class="row h-100">
              <div class="col-md-12">
                <button class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                  Drop a Feedback
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 overflow-y-auto vh-100 scrollable-content">
          <div class="row">
            <?php foreach ($testimonials as $testimonial) : ?>
              <?php
              $name = $testimonial['fullname'];
              $socialId = $testimonial['social_Id'];
              $socialHandle = $testimonial['social_handle'];
              $message = $testimonial['message'];
              $rating = $testimonial['rating'];
              $time = $testimonial['time'];
              ?>
              <div class="col-md-4">
                <div class="card testimonial-card">
                  <div class="card-body">
                    <?php $socialIcons = [
                      1 => 'fa-facebook-f',
                      2 => 'fa-x-twitter',
                      3 => 'fa-instagram',
                      4 => 'fa-linkedin-in'
                    ];

                    if (isset($socialIcons[$socialId])) {
                      echo "<i class='fa-brands " . $socialIcons[$socialId] . " fa-beat card-icon'></i>";
                    }
                    ?>
                    <h5 class="card-title"><?php echo $name ?></h5>
                    <h6 class="card-subtitle mb-2 text-primary">
                      @<?php echo $socialHandle ?>
                    </h6>
                    <div class="star-rating">
                      <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <?php if ($i <= $rating) : ?>
                          <i class="fas fa-star"></i>
                        <?php else : ?>
                          <i class="far fa-star"></i> <!-- empty star for better visual indication -->
                        <?php endif; ?>
                      <?php endfor; ?>
                    </div>

                    <p class="card-text">
                      <?php echo $message ?>
                    </p>
                    <small class="text-light"><?php echo Utilities::convertTimestamp($time) ?></small>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Footer Starts here -->

<?php

require_once "partials/footer.php";

?>

<!-- Footer Ends Here -->