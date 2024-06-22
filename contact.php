<!-- Header starts here -->
<?php
require_once "partials/header.php";

require_once "classes/Client.php";

$client = new Client;
$services = $client->services();
$countries = $client->countries();
$socials = $client->socials();

?>
<!-- Header ends here -->
<div class="col-md-9 mybg" id="main">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-12">
        <div class="form-container row justify-content-center align-items-center vh-100">
          <div class="col-md-11">
            <div class="row">
              <div class="col-md-12">
                <div class="text-center mb-4">
                  <h1 class="form-title">
                    Let's Have a Chat
                    <i class="fa-solid fa-message"></i>
                  </h1>
                  <p class="form-subtitle">
                    Questions about our products/services, orders, or
                    just want to say hello? We're here to help.
                  </p>
                  <div class="row justify-content-center my-1">
                    <div class="col-md-4 d-flex justify-content-between align-content-center">
                      <?php foreach ($socials as $social) : ?>
                        <?php $url = $social['url'];
                        $icon = $social['icon_2'];
                        ?>
                        <a href="<?php echo "$url" ?>" class="btn-contact" target="_blank">
                          <?php echo "$icon" ?>
                        </a>
                      <?php endforeach ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 text-center" id="formFeedback"></div>
                <form id="contactForm" method="post">
                  <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name <span>*</span></label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Your Full Name" />
                  </div>
                  <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="email" class="form-label">Email <span>*</span></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number <span>*</span></label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone Number" />
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select form-control" name="country" id="country">
                          <option hidden>Choose your country</option>
                          <?php foreach ($countries as $country) {
                          ?>
                            <option value="<?php echo $country['idcountry'] ?>"><?php echo $country['country_name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="service" class="form-label">Service Required <span>*</span></label>
                        <select class="form-select form-control" name="service" id="service" required>
                          <option hidden>Choose the service</option>
                          <?php foreach ($services as $service) {
                          ?>
                            <option value="<?php echo $service['id'] ?>"><?php echo $service['service_name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="mb-3">
                    <label for="message" class="form-label">Message <span>*</span></label>
                    <textarea class="form-control" name="message" id="message" rows="4" placeholder="Your Message"></textarea>
                  </div>
                  <input type="hidden" name="sendContactMessage" value="sendContactMessage">
                  <button type="submit" id="contactSubmit" class="btn btn-contact btn-form" value="sendContactMessage">Send Message</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer Starts Here -->
  <?php require_once "partials/footer.php" ?>
  <!-- Footer Ends Here -->