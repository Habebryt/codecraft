<!-- Header Starts Here -->

<?php require_once "partials/header.php";
require_once "classes/Client.php";

$client = new Client;
$mydata = $client->codeCraft();
foreach ($mydata as $data) {
  $appname = $data['app_name'];
}


?>

<!-- Header Ends Here -->
<div class="col-md-9 mybg" id="main">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-12">
        <div class="form-container row justify-content-center align-items-center vh-100">
          <div class="col-md-11">
            <div class="row my-3 justify-content-center align-items-center">
              <div class="col-md-12 my-3">
                <div class="text-center mb-4">
                  <h1 class="form-title">
                    Subscribe to My Newsletter
                    <i class="fa-solid fa-envelopes-bulk"> </i>
                    <br />
                    <span class="motionified"> <?php echo $appname ?> </span>
                  </h1>
                  <p class="form-subtitle">
                    Join my newsletter and receive my new projects and
                    coding updates everyday
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12 text-align-center" id="newsletterFeedback"></div>
                </div>
                <form id="newsletterForm" method="post">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="firstname" class="form-label">First Name <span>*</span></label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Your First Name" />
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name <span>*</span></label>
                        <input type="text" class="form-control" name="lastname" id="last" placeholder="Your Last Name" />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label for="email" class="form-label">Email <span>*</span></label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" />
                      </div>
                    </div>
                  </div>
                  <input type="hidden" value="Subscribe" name="Subscribe">
                  <input type="button" id="newsletterSubscriber" class="btn btn-form btn-contact" name="Subscribe" value="Subscribe">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Starts Here -->

    <?php require_once "partials/footer.php" ?>

    <!-- Footer Ends Here -->