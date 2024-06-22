<?php 

require_once "classes/Client.php";

$client = new Client;
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

<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="../index.php" class="lead"><?php echo $appname ?> - HB</a>, All Right Reserved.
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
</div>
<!-- Content End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- Project Modal -->
<?php require_once "partials/addprojectmodal.php"; ?>
<!-- Project Modal Ends -->

<!-- Client Modal -->
<?php require_once "partials/addclientmodal.php"; ?>
<!-- Client Modal Ends -->

<!-- Client Modal -->
<?php require_once "partials/sendMailModal.php"; ?>
<!-- Client Modal Ends -->

<!-- Message Modal -->
<?php require_once "partials/messagemodal.php"; ?>
<!-- Message Modal Ends -->

<!-- Subscriber Details Modal -->
<?php require_once "partials/submodal.php"; ?>
<!-- Subscriber Modal Ends here -->

<!-- Feedback Modal -->
<?php require_once "partials/feedmodal.php"; ?>
<!-- Feedback modal ends here -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/statics/lib/chart/chart.min.js"></script>
<script src="assets/statics/lib/easing/easing.min.js"></script>
<script src="assets/statics/lib/waypoints/waypoints.min.js"></script>
<script src="assets/statics/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="assets/statics/lib/tempusdominus/js/moment.min.js"></script>
<script src="assets/statics/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="assets/statics/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- CodeCraft JS -->
<script src="assets/statics/js/main.js"></script>
<script src="assets/statics/js/logout.js"></script>
<script src="assets/statics/js/updates.js"></script>
<script src="assets/statics/js/script.js"></script>
</body>

</html>