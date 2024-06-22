<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "partials/head.php";
require_once "classes/Project.php";
require_once "classes/Utilities.php";
$proj = new Project;
$projects = $proj->allProjects();
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
      <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Latest Projects</h6>
            <a href="" class="text-light">Show All</a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProjectModal">Add Project</button>
          </div>
          <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
              <thead>
                <tr class="text-white">
                  <th scope="col">
                    <input class="form-check-input" type="checkbox" />
                  </th>
                  <th scope="col">Start</th>
                  <th scope="col">Project</th>
                  <th scope="col">Client</th>
                  <th scope="col">Project Notes</th>
                  <th scope="col">Project Description</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <?php if (!empty($projects)) : ?>
                <tbody>
                  <?php
                  foreach ($projects as $project) : ?>
                    <?php
                    $projectId = $project['projectid'];
                    $projectName = $project['name'];
                    $client = $project['fullname'];
                    $start = $project['start'];
                    $note = $project['project_update'];
                    $desc = $project['prodescription'];
                    $status = $project['pro_status'];
                    ?>
                    <tr>
                      <td>
                        <input class="form-check-input" type="checkbox" />
                      </td>
                      <td><?php echo Utilities::convertTimestamp($start) ?></td>
                      <td><?php echo $projectName ?></td>
                      <td><?php echo $client ?></td>
                      <td><?php if (empty($note)) {
                            echo "No Updates Yet";
                          } else {
                            echo Utilities::limitMessage($note);
                          } ?></td>
                      <td><?php echo Utilities::limitMessage($desc) ?></td>
                      <td><?php

                          if ($status == "Completed") { ?>
                          <button class="btn btn-success col-12"><?php echo $status ?></button>
                        <?php  } else if ($status == "In Progress") { ?>
                          <button class="btn btn-info col-12"><?php echo $status ?></button>
                        <?php  } else if ($status == "Negotiating") { ?>
                          <button class="btn btn-warning col-12"><?php echo $status ?></button>
                        <?php  } else if ($status == "No Response") { ?>
                          <button class="btn btn-danger col-12"><?php echo $status ?></button>
                        <?php    } else { ?>
                          <button class="btn btn-primary col-12"><?php echo $status ?></button>
                        <?php
                          } ?>
                      </td>
                      <td>
                        <a href="projectdetails.php?projectid=<?php echo $projectId ?>" class="btn btn-info">Details</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php else : ?>
                  <div class="col-md-12">
                    <p class="text-white">You Presently No Projects.</p>
                  </div>
                <?php endif ?>
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