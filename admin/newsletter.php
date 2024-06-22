<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "partials/head.php";
require_once "classes/Newsletter.php";
require_once "classes/Utilities.php";

$subscriber = new Newsletter;
$activeSubscribers = $subscriber->ActiveSubscribers();
$inActiveSubscribers = $subscriber->InActiveSubscribers();
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

  <!-- Project Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Active Subscribers</h6>
            <a href="" class="text-light">Show All</a>
          </div>
          <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
              <thead>
                <tr class="text-white">
                  <th scope="col">
                    <input class="form-check-input" type="checkbox" />
                  </th>
                  <th scope="col">Time</th>
                  <th scope="col">Subscriber</th>
                  <th scope="col">Email</th>
                  <th scope="col" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($activeSubscribers as $activeSubscriber) :
                  $subscriberId = $activeSubscriber['id'];
                  $time = $activeSubscriber['time'];
                  $firstname = $activeSubscriber['firstname'];
                  $lastname = $activeSubscriber['lastname'];
                  $name = $firstname . " " . $lastname;
                  $status = $activeSubscriber['status'];
                  $email = $activeSubscriber['email'];
                ?>
                  <tr>
                    <td>
                      <input class="form-check-input" type="checkbox" />
                    </td>
                    <td><?php echo Utilities::timeSince($time); ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td class="d-flex justify-content-between align-items-center">
                      <button data-bs-toggle="modal" data-bs-target="#subscriberDetails" class="btn btn-sm btn-primary" onclick="subscriber(this)" data-subscriber="<?php echo $subscriberId; ?>">Detail</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Past Subscribers</h6>
            <a href="" class="text-light">Show All</a>
          </div>
          <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
              <thead>
                <tr class="text-white">
                  <th scope="col">
                    <input class="form-check-input" type="checkbox" />
                  </th>
                  <th scope="col">Time</th>
                  <th scope="col">Subscriber</th>
                  <th scope="col">Email</th>
                  <th scope="col" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($inActiveSubscribers as $inActiveSubscriber) :
                  $subscriberId = $inActiveSubscriber['id'];
                  $time = $inActiveSubscriber['time'];
                  $firstname = $inActiveSubscriber['firstname'];
                  $lastname = $inActiveSubscriber['lastname'];
                  $name = $firstname . " " . $lastname;
                  $status = $inActiveSubscriber['status'];
                  $email = $inActiveSubscriber['email'];
                ?>
                  <tr>
                    <td>
                      <input class="form-check-input" type="checkbox" />
                    </td>
                    <td><?php echo Utilities::timeSince($time); ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td class="d-flex justify-content-between align-items-center">
                      <button data-bs-toggle="modal" data-bs-target="#subscriberDetails" class="btn btn-sm btn-primary" onclick="subscriber(this)" data-subscriber="<?php echo $subscriberId; ?>">Detail</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Project End -->

  <!-- Footer Start -->

  <?php
  require_once "partials/footer.php";

  ?>

  <!-- Footer Ends -->