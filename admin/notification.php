<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "partials/head.php";
require_once "classes/Notification.php";
require_once "classes/Utilities.php";

$notifications = new Notification;
$recentNotifications = $notifications->feedbackNotifications();
$messageNotifications = $notifications->messageNotifications();
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
                        <h6 class="mb-0">Message Notifications</h6>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Service</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // echo "<pre>";
                                // print_r($messages);
                                // echo "</pre>";
                                foreach ($messageNotifications as $messageNotification) : ?>
                                    <?php
                                    // echo "<pre>";
                                    // print_r($recentNotification);
                                    // echo "<pre>";
                                    $msg = $messageNotification['message_id'];
                                    $time = $messageNotification['time'];
                                    $name = $messageNotification['fullname'];
                                    $service = $messageNotification['service_name'];
                                    ?>
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td><?php echo Utilities::timeSince($time) ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $service ?></td>
                                        <td class="d-flex justify-content-between align-items-center">
                                            <button data-bs-toggle="modal" data-bs-target="#messageDetails" class="btn btn-sm btn-primary" onclick="details(this)" data-message="<?php echo $msg ?>">Detail</button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Feedback Notifications</h6>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // echo "<pre>";
                                // print_r($messages);
                                // echo "</pre>";
                                foreach ($recentNotifications as $recentNotification) : ?>
                                    <?php
                                    // echo "<pre>";
                                    // print_r($recentNotification);
                                    // echo "<pre>";
                                    $feed = $recentNotification['testimony_id'];
                                    $time = $recentNotification['time'];
                                    $name = $recentNotification['fullname'];
                                    $rating = $recentNotification['rating'];
                                    ?>

                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox" />
                                        </td>
                                        <td><?php echo Utilities::timeSince($time) ?></td>
                                        <td><?php echo $name ?></td>
                                        <td>
                                            <div class="star-rating">
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <?php if ($i <= $rating) : ?>
                                                        <i class="fas fa-star"></i>
                                                    <?php else : ?>
                                                        <i class="far fa-star"></i>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </div>
                                        </td>
                                        <td class="d-flex justify-content-between align-items-center">
                                            <button data-bs-toggle="modal" data-bs-target="#testimonyDetails" class="btn btn-sm btn-primary" onclick="testimony(this)" data-feedback="<?php echo $feed ?>">View</button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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