<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "partials/head.php";
require_once "classes/Testimonial.php";
require_once "classes/Utilities.php";

$testimonial = new Testimonial;
$testimonials = $testimonial->Testimonials();
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

  <!-- Testimonials Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Clients Testimonials</h6>
      </div>
      <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
          <thead>
            <tr class="text-white">
              <th scope="col">
                <input class="form-check-input" type="checkbox" />
              </th>
              <th scope="col">Name</th>
              <th scope="col">Social</th>
              <th scope="col">Rating</th>
              <th scope="col">Message</th>
              <th scope="col">Time & Date</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php if (!empty($testimonials)) : ?>
                <?php foreach ($testimonials as $testimony) : ?>
                  <?php
                  // print_r($testimony);
                  $feed = $testimony['testimony_id'];
                  $msg = $testimony['message'];
                  $time = $testimony['time'];
                  $name = $testimony['fullname'];
                  $image = $testimony['user_image'];
                  $handle = $testimony['social_handle'];
                  $status = $testimony['status'];
                  $rating = $testimony['rating'];
                  ?>
                  <td><input class="form-check-input" type="checkbox" /></td>
                  <td><?php echo $name ?></td>
                  <td><?php echo $handle ?></td>
                  <td><?php echo $rating ?></td>
                  <td><?php echo Utilities::limitMessageAll($msg) ?></td>
                  <td><?php echo Utilities::convertTimestamp($time) ?></td>
                  <td><?php echo $status ?></td>
                  <td class="d-flex justify-content-between align-items-center">
                    <button data-bs-toggle="modal" data-bs-target="#testimonyDetails" class="btn btn-sm btn-primary" onclick="testimony(this)" data-feedback="<?php echo $feed ?>">View</button>
                  </td>
            </tr>
          <?php endforeach ?>
        <?php else : ?>
          <div class="row">
            <div class="col-12">
              <p class="text-info">You currently have no new feedbacks from clients. Check back again.</p>
            </div>
          </div>
        <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Testimonials End -->

  <!-- Footer Start -->

  <?php
  require_once "partials/footer.php";

  ?>

  <!-- Footer Ends -->