<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "partials/head.php";
require_once "classes/Message.php";
require_once "classes/Utilities.php";

$message = new Message;
$messages = $message->Messages();
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

  <!-- Table Start -->
  <!-- Recent Messages Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-evenly mb-4">
        <div class="col-md-6">
          <h6 class="mb-0 text-start">All Messages</h6>
        </div>
        <div class="col-md-6">
          <div class="row justify-content-end">
            <div class="col-md-2"><button id="activeMessage" class="btn btn-sm btn-success" onclick="activeMessages(this)" data-status="active">Active</button></div>
            <div class="col-md-2"><button id="newMessage" class="btn btn-sm btn-info" onclick="newMessages(this)" data-status="new">New</button></div>
            <div class="col-md-2"><button id="respondedMessage" class="btn btn-sm btn-warning" onclick="respondedMessages(this)" data-status="responded">Responded</button></div>
            <div class="col-md-3"><button id="viewall" class="btn btn-sm btn-primary" onclick="viewall(this)" data-status="viewall">View All</button></div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
          <thead>
            <tr class="text-white">
              <th scope="col">
                <input class="form-check-input" type="checkbox" />
              </th>
              <th scope="col">Date</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Country</th>
              <th scope="col">Service</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>


            <?php
            // echo "<pre>";
            // print_r($messages);
            // echo "</pre>";
            foreach ($messages as $message) : ?>
              <?php
              $msg = $message['id'];
              $date = $message['time'];
              $name = $message['fullname'];
              $email = $message['email'];
              $phone = $message['phone'];
              $country = $message['country_name'];
              $service = $message['service_name'];
              $status = $message['message_status'];

              ?>
              <tr>
                <td><input class="form-check-input" type="checkbox" /></td>
                <td><?php echo Utilities::convertTimestamp($date) ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $phone ?></td>
                <td><?php echo $country ?></td>
                <td><?php echo $service ?></td>
                <td><?php

                    if ($status == "Active") { ?>
                    <button class="btn btn-success col-12"><?php echo $status ?></button>
                  <?php  } else if ($status == "New") { ?>
                    <button class="btn btn-info col-12"><?php echo $status ?></button>
                  <?php    } else { ?>
                    <button class="btn btn-warning col-12"><?php echo $status ?></button>
                  <?php
                    } ?>
                </td>
                <td>
                  <button data-bs-toggle="modal" data-bs-target="#messageDetails" class="btn btn-sm btn-primary" onclick="details(this)" data-message="<?php echo $msg ?>">Detail</button>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Recent Message End -->
  <!-- Table End -->

  <!-- Footer Start -->

  <?php
  require_once "partials/footer.php";

  ?>

  <!-- Footer Ends -->