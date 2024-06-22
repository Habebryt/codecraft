<?php
require_once "partials/header.php";
require_once "classes/Client.php";

$client = new Client;
$services = $client->services();
$clientsSocials = $client->clientsSocials();
$socials = $client->socials();
$mydata = $client->codeCraft();
foreach ($mydata as $data) {
    $appname = $data['app_name'];
    $fullname = $data['firstname'] . " " . $data['lastname'];
    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $logo = $data['logo'];
    $profilePicture = $data['profile_picture'];
}

?>

<footer class="bg-dark text-white text-center fixed-bottom">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-2 mt-3 d-flex justify-content-evenly align-items-center">
                <?php foreach ($socials as $social) : ?>
                    <?php $url = $social['url'];
                    $icon = $social['icon'];
                    ?>
                    <a href="<?php echo "$url" ?>" class="btn-contact" target="_blank">
                        <?php echo "$icon" ?>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="col-md-12 mt-2">
                <p>
                    &copy; <span id="currentYear"></span> <?php echo $fullname ?>. All
                    rights reserved by <span><?php echo $appname ?></span>.
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
</div>
</div>

<!-- Portfolio Modal -->

<div class="modal fade" id="myPortfolio">
    <div class="modal-dialog modal-lg bg-success">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-success">
                <h4 class="modal-title">Igiekpemi Habeeb Portfolio</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <iframe src="admin/upload/portfolio.pdf" width="100%" height="400px" frameborder="0"></iframe>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-success">
                <a href="contact.php" class="btn btn-contact">Contact Me</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Resume Modal -->

<div class="modal fade" id="myResume">
    <div class="modal-dialog modal-lg bg-contact">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-contact">
                <h4 class="modal-title">Igiekpemi Habeeb Resume</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <iframe src="admin/upload/resume.pdf" width="100%" height="400px" frameborder="0"></iframe>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-contact">
                <a href="contact.php" class="btn btn-success">Contact Me</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Feedback Modal -->
<div class="modal fade col-md-8" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content feedback-modal">
            <div class="modal-header bg-contact">
                <h5 class="modal-title" id="feedbackModalLabel">Drop a Feedback</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-container">
                    <form id="feedbackForm" method="post" action="process/feedback_process.php">
                        <div class="row">
                            <div class="col-md-12" id="feedbackFormFeedback"></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter your full name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="fullname" placeholder="Enter your Email" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="socialMediaType" class="form-label">Social Media Channel</label>
                                    <select class="form-select text-light" name="socialMediaChannel" id="socialMediaChannel">
                                        <option hidden>Select Social Media Channel</option>
                                        <?php foreach ($clientsSocials as $clientsSocial) {
                                        ?>
                                            <option value="<?php echo $clientsSocial['id'] ?>"><?php echo $clientsSocial['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="socialMediaHandle" class="form-label">Social Media Handle</label>
                                        <input type="text" class="form-control" id="socialMediaHandle" name="socialMediaHandle" placeholder="Enter your social media handle" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Service Rating</label>
                            <select class="form-select text-light" name="rating" id="rating">
                                <option hidden>Select Rating</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" name="companyName" id="company" placeholder="Enter your company name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="project" class="form-label">Project</label>
                                    <input type="text" class="form-control" name="project" id="project" placeholder="Enter the project name" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="serviceRendered" class="form-label">Service Rendered</label>
                            <select class="form-select text-light" name="serviceRendered" id="serviceRendered">
                                <option hidden>Select Service Rendered</option>
                                <?php foreach ($services as $service) {
                                ?>
                                    <option value="<?php echo $service['id'] ?>"><?php echo $service['service_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Feedback</label>
                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter your message"></textarea>
                        </div>
                        <div class="modal-footer bg-contact">
                            <input type="hidden" name="SendFeedback" value="SendFeedback">
                            <input type="button" id="feedbackSubmit" class="btn btn-contact" name="Send" value="Drop Feedback">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/statics/js/ajax.js"></script>
<script src="assets/statics/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>