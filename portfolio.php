<!-- Header Starts Here -->

<?php require_once "partials/header.php";
require_once "classes/Client.php";
require_once "classes/Utilities.php";

$myproject = new Client;

$mypros = $myproject->projects();
?>

<!-- Header Ends Here -->
<div class="col-md-9 mybg" id="main">
  <div class="container">
    <!-- Page Title and Introduction -->
    <div class="text-center mb-5">
      <h1 class="display-4 text-light">My Projects</h1>
      <p class="lead text-light">
        Explore some of the exciting projects I've worked on. Click on
        each to learn more about the technology used, project timeline,
        and purpose.
      </p>
    </div>
    <div class="row justify-content-center align-items-center">
      <?php foreach ($mypros as $project) : ?>
        <?php
        $title = $project['title'];
        $stack = $project['techstack'];
        $desc = $project['desc'];
        $url = $project['url'];
        $image = $project['image'];
        $started = $project['started'];
        $ended = $project['ended'];

        ?>
        <!-- Project UnityDocs Card -->
        <div class="col-md-6 mb-4">
          <div class="card bg-dark text-light h-100 project-card">
            <div class="row no-gutters" style="background-image: url('uploads/<?php echo $image ?>')">
              <div class="col-md-4 project-image" style="background-image: url('uploads/<?php echo $image ?>')"></div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">
                    <strong>Title:</strong> <?php echo $title ?>
                  </h5>
                  <p class="card-text">
                    <?php echo Utilities::limitMessageAll($desc) ?>
                  </p>
                  <ul class="list-unstyled">
                    <li>
                      <strong>Technology used:</strong> <?php echo $stack ?>
                    </li>
                    <li><strong>Date started:</strong> <?php echo Utilities::convertTimestamp($started) ?></li>
                    <li><strong>Date ended:</strong> <?php echo Utilities::timeSince($ended) ?></li>
                  </ul>
                  <a href="<?php echo $url ?>" class="btn btn-contact">Preview Project</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>

    </div>
  </div>
  <!-- Footer Starts Here -->

  <?php require_once "partials/footer.php" ?>

  <!-- Footer Ends Here -->