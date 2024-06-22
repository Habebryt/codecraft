<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "partials/head.php";
require_once "classes/Message.php";
require_once "classes/Testimonial.php";
require_once "classes/Utilities.php";
require_once "classes/Newsletter.php";
require_once "classes/Client.php";
require_once "classes/Project.php";

$message = new Message;
$newsletter = new Newsletter;
$testimonial = new Testimonial;
$client = new Client;
$projects = new Project;
$messages = $message->NewMessages();
$testimonials = $testimonial->MostRecentTest();
$allTestimonials = $testimonial->Testimonials();
$allSubscribers = $newsletter->Subscribers();
$allClients = $client->Clients();
$allProjects = $projects->newProjects();

$totalTestimonials = count($allTestimonials);
$totalNewMessages = count($messages);
$totalSubscribers = count($allSubscribers);
$totalClients = count($allClients);


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

  <!-- CodeCraft Stats Starts Here -->
  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
          <i class="fa fa-chart-line fa-3x text-primary"></i>
          <div class="ms-3">
            <p class="mb-2">Clients Served</p>
            <h6 class="mb-0"><?php echo $totalClients;
                              ?></h6>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
          <i class="fa fa-chart-bar fa-3x text-primary"></i>
          <div class="ms-3">
            <p class="mb-2">CodeCraft Subscribers</p>
            <h6 class="mb-0"><?php echo $totalSubscribers ?></h6>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
          <i class="fa fa-chart-area fa-3x text-primary"></i>
          <div class="ms-3">
            <p class="mb-2">New Messages</p>
            <h6 class="mb-0"><?php echo $totalNewMessages ?></h6>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
          <i class="fa fa-chart-pie fa-3x text-primary"></i>
          <div class="ms-3">
            <p class="mb-2">Testimonials</p>
            <h6 class="mb-0"><?php echo $totalTestimonials ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- CodeCraft Stats Starts Here -->

  <!-- Recent Messages Start -->

  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Recent Messages</h6>
        <a href="request.php" class="text-light">Show All</a>
      </div>
      <div class="table-responsive">
        <table class="table text-start align-middle table-bordered table-hover mb-0">
          <thead>
            <?php if (!empty($messages)) : ?>
              <tr class="text-white">
                <th scope="col">
                  <input class="form-check-input" type="checkbox" />
                </th>
                <th scope="col">Time</th>
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
            <tr>
              <?php
              foreach ($messages as $message) : ?>

                <?php
                $msgid = $message['id'];
                $date = $message['time'];
                $name = $message['fullname'];
                $email = $message['email'];
                $phone = $message['phone'];
                $country = $message['country_name'];
                $service = $message['service_name'];
                $status = $message['message_status'];
                ?>
                <td><input class="form-check-input" type="checkbox" /></td>
                <td><?php echo Utilities::timeSince($date) ?></td>
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
                  <button data-bs-toggle="modal" data-bs-target="#messageDetails" class="btn btn-sm btn-primary" onclick="details(this)" data-message="<?php echo $msgid ?>">Detail</button>
                </td>
            </tr>

          <?php endforeach ?>
        <?php else : ?>
          <div class="col-md-12">
            <p class="text-white">You have responded to all your messages. Kindly check for more messages by <a href="request.php" class="text-info">View Messages</a></p>
          </div>
        <?php endif ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Recent Message End -->

  <!-- Widgets Start -->
  <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
      <div class="col-sm-12 col-md-6 col-xl-6">
        <div class="h-100 bg-secondary rounded p-4">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="mb-0">Testimonials</h6>
            <a href="" class="text-light">Show All</a>
          </div>
          <?php if (!empty($testimonials)) : ?>
            <?php foreach ($testimonials as $testimony) : ?>
              <?php
              // echo "<pre>";
              //print_r($testimony);
              // echo "</pre>";
              $feed = $testimony['testimony_id'];
              $msg = $testimony['message'];
              $time = $testimony['time'];
              $name = $testimony['fullname'];
              $image = $testimony['user_image'];
              ?>
              <div class="d-flex align-items-center border-bottom py-3">
                <img class="rounded-circle flex-shrink-0" src="../uploads/<?php echo $image ?>" alt="" style="width: 40px; height: 40px" />
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-0"><?php echo $name ?></h6>
                    <div class="row">
                      <div class="col-md-12">
                        <small><?php echo Utilities::timeSince($time) ?></small>
                        <span><button data-bs-toggle="modal" data-bs-target="#testimonyDetails" class="btn btn-sm btn-primary" onclick="testimony(this)" data-feedback="<?php echo $feed ?>">View</button></span>
                      </div>
                    </div>
                  </div>
                  <span><?php echo Utilities::limitMessage($msg) ?></span>
                </div>
              </div>
            <?php endforeach ?>
          <?php else : ?>
            <div class="row">
              <div class="col-12">
                <p class="text-light">You currently have no new feedbacks from clients. Check back again or <a href="testimonial.php" class="text-info">CLICK HERE</a> to view past Testimonials.</p>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-xl-6">
        <div class="h-100 bg-secondary rounded p-4">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Projects</h6>
            <a href="project.php" class="text-light">Show All</a>
          </div>
          <div class="d-flex mb-2 justify-content-end">
            <button type="button" class="btn btn-primary ms-2">
              Add Project
            </button>
          </div>
          <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
              <?php if (!empty($allProjects)) : ?>
                <thead>
                  <tr class="text-white">
                    <th scope="col">
                      <input class="form-check-input" type="checkbox" />
                    </th>
                    <th scope="col">Project Title</th>
                    <th scope="col">Client</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($allProjects as $project) : ?>
                    <?php
                    $projectId = $project['clientid'];
                    $fullname = $project['fullname'];
                    $project = $project['phone'];
                    ?>
                    <tr>
                      <td>
                        <input class="form-check-input" type="checkbox" />
                      </td>
                      <td><?php echo $fullname ?></td>
                      <td><?php echo $project ?></td>
                      <td>
                        <button data-bs-toggle="modal" data-bs-target="#projectDetails" class="btn btn-sm btn-primary" onclick="projectDetails(this)" data-project="<?php echo $projectId ?>">Detail</button>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php else : ?>
                  <div class="col-md-12">
                    <p class="text-white">You Presently have no new Projects. <a href="project.php" class="text-info">Click Here</a> to view All Projects</p>
                  </div>
                <?php endif ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Widgets End -->

  <!-- Footer Start -->

  <?php
  require_once "partials/footer.php";

  ?>

  <!-- Footer Ends -->