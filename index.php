<!-- Header Starts Here -->
<?php
require_once "partials/header.php";
require_once "classes/Client.php";

$client = new Client;

$allClients = $client->Clients();
$allProjects = $client->AllProjects();
$allMessages = $client->AllMessages();
$mydata = $client->codeCraft();
foreach ($mydata as $data) {
  $appname = $data['app_name'];
  $fullname = $data['firstname'] . " " . $data['lastname'];
  $firstname = $data['firstname'];
  $lastname = $data['lastname'];
  $logo = $data['logo'];
  $profilePicture = $data['profile_picture'];
}

$totalClients = count($allClients) * 5;
$totalProjects = count($allProjects) * 5;
$totalMessages = count($allMessages) * 12;
?>
<!-- Header Ends Here -->
<div class="col-md-9 mybg" id="main">
  <div class="container my-5">
    <div class="text-center">
      <h1><?php echo $appname ?> by <?php echo $lastname ?>!</h1>
      <p class="lead text-light">
        Hi, I'm <strong><?php echo $fullname ?></strong> – a passionate software
        developer with a knack for creating innovative solutions and
        transforming ideas into reality.
      </p>
    </div>

    <div class="row">
      <!-- What I Do Card -->
      <div class="col-md-3 mb-4">
        <div class="card bg-dark text-light h-100">
          <div class="card-body">
            <h5 class="card-title">What I Do</h5>
            <ul class="list-unstyled">
              <?php
              $services = $client->services();
              usort($services, function ($a, $b) {
                return strcmp($a['service_name'], $b['service_name']);
              });
              foreach ($services as $service) {
                $ser = $service['service_name'];
                $serIcon = $service['icon'];
              ?>
                <li class="mb-2">
                  <?php
                  if (!empty($serIcon)) {
                    echo $serIcon;
                  } else { ?> <i class="fas fa-concierge-bell"></i>
                  <?php } ?>
                  <span class="ms-2"> <?php echo htmlspecialchars($ser); ?></span>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- Highlights of My Work Card -->
      <div class="col-md-6 mb-4">
        <div class="card bg-dark text-light h-100">
          <div class="card-body">
            <h5 class="card-title">Highlights of My Work</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <i class="fas fa-project-diagram"></i>
                <strong>Project UnityDocs:</strong> A web-based
                application that facilitation document sharing.
              </li>
              <li class="mb-2">
                <i class="fas fa-mobile"></i>
                <strong>DevConnect:</strong> A web Application designed
                to making connection between developers easy and fast.
              </li>
              <li>
                <i class="fas fa-tools"></i>
                <strong>ToolZ:</strong> A tool that helps people manage
                their weekly activities remotely.
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Technologies I Love Card -->
      <div class="col-md-3 mb-4">
        <div class="card bg-dark text-light h-100">
          <div class="card-body">
            <h5 class="card-title">Technologies I Love</h5>
            <p><strong>Languages:</strong> JavaScript, Php</p>
            <p><strong>Frameworks:</strong> React.js, Laravel</p>
            <p><strong>Database:</strong> MySql, MongoDb</p>
            <p><strong>Tools:</strong> Git, Docker, Jenkins</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Why Work With Me Card -->
      <div class="col-md-3 mb-4">
        <div class="card bg-dark text-light h-100">
          <div class="card-body">
            <h5 class="card-title">Why Work With Me?</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <i class="fas fa-trophy"></i>
                <strong>Passion for Excellence</strong>
              </li>
              <li class="mb-2">
                <i class="fas fa-users"></i>
                <strong>Collaborative Spirit</strong>
              </li>
              <li>
                <i class="fas fa-user-check"></i>
                <strong>User-Centric Approach</strong> 
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Let's Connect Card -->
      <div class="col-md-9 mb-4 text-center">
        <div class="card bg-dark text-light h-100">
          <div class="card-body">
            <h5 class="card-title">Let's Connect!</h5>
            <p>
              I am always excited to collaborate on new projects and
              bring innovative ideas to life. Feel free to
              <a href="contact.php" class="btn btn-contact">Contact Me</a>
              to discuss how we can work together.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-between">
      <!-- Happy Clients Card -->
      <div class="col-md-3 mb-4 text-center">
        <div class="card bg-dark text-light h-100">
          <div class="card-body">
            <h5 class="card-title">Happy Clients</h5>
            <p class="display-6"><i class="fas fa-smile text-primary"></i> <?php echo $totalClients;
                                                                            ?>+</p>
          </div>
        </div>
      </div>

      <!-- Completed Projects Card -->
      <div class="col-md-3 mb-4 text-center">
        <div class="card bg-dark text-light h-100">
          <div class="card-body">
            <h5 class="card-title">Completed Projects</h5>
            <p class="display-6"><i class="fas fa-check-circle text-primary"></i> <?php echo $totalProjects;
                                                                                  ?>+</p>
          </div>
        </div>
      </div>

      <!-- Prospective Clients Card -->
      <div class="col-md-3 mb-4 text-center">
        <div class="card bg-dark text-light h-100">
          <div class="card-body">
            <h5 class="card-title">Prospective Clients</h5>
            <p class="display-6"><i class="fas fa-users text-primary"></i> <?php echo $totalMessages;
                                                                            ?>+</p>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Footers starts here -->

    <?php require_once "partials/footer.php"; ?>

    <!-- Footer Ends Here -->