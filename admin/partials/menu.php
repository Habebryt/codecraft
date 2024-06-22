<?php
require_once "classes/Message.php";
require_once "classes/Notification.php";
require_once "classes/Testimonial.php";
require_once "classes/Utilities.php";
require_once "classes/Newsletter.php";


$message = new Message;
$notify = new Notification;
$subNew = new Newsletter;
$testimonial = new Testimonial;
$mostRecentMessages = $message->MostRecentMessages();
$mostRecentFeedback = $notify->feedbackNotifications();
$mostRecentSubscribers = $subNew->mostRecentSubscriber();

?>


<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-dark border-0" type="search" placeholder="Search" />
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Message</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <?php if (!empty($mostRecentMessages)) : ?>
                    <?php foreach ($mostRecentMessages as $msgNot) : ?>
                        <?php
                        $msgid = $msgNot['id'];
                        $date = $msgNot['time'];
                        $name = $msgNot['fullname'];
                        ?>
                        <a class="dropdown-item" <button data-bs-toggle="modal" data-bs-target="#messageDetails" class="btn btn-sm btn-primary" onclick="details(this)" data-message="<?php echo $msgid ?>">
                            <div class="d-flex align-items-center">
                                <div class="ms-2">
                                    <p class="fw-normal mb-0">You have a new request from <span class="alert text-info"><?php echo $name ?></span></p>
                                    <small><?php echo Utilities::timeSince($date) ?></small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider" />
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-info">You currently have no new Client Request. Check back again.</p>
                        </div>
                    </div>
                <?php endif; ?>
                <a href="request.php" class="dropdown-item text-center">See all message</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Feedbacks</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <?php if (!empty($mostRecentFeedback)) : ?>
                    <?php foreach ($mostRecentFeedback as $fdbNot) : ?>
                        <?php
                        // print_r($fdbNot);
                        $feed = $fdbNot['testimony_id'];
                        $date = $fdbNot['time'];
                        $name = $fdbNot['fullname'];
                        ?>
                        <a class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="ms-2">
                                    <p class="fw-normal mb-0">Feedback From: <span class="alert text-info"><?php echo $name ?></span></p>
                                    <small><?php echo Utilities::timeSince($date) ?></small>
                                </div>
                                <div>
                                    <span><button data-bs-toggle="modal" data-bs-target="#testimonyDetails" class="btn btn-sm btn-primary" onclick="testimony(this)" data-feedback="<?php echo $feed ?>">View</button></span>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider" />
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-info">You currently have no new Feedbacks. Check back again.</p>
                        </div>
                    </div>
                <?php endif; ?>
                <a href="testimonial.php" class="dropdown-item text-center">See all Feedbacks</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-user me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Subscribers</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <?php if (!empty($mostRecentSubscribers)) : ?>
                    <?php foreach ($mostRecentSubscribers as $subNew) : ?>
                        <?php
                        $subscriberId = $subNew['newsletter_id'];
                        $date = $subNew['time'];
                        $name = $subNew['firstname'];
                        ?>
                        <a class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <div class="ms-2">
                                    <p class="fw-normal mb-0"><span class="alert text-info"><?php echo $name ?></span> Just Subscribed</p>
                                    <small class="ms-2"><?php echo Utilities::timeSince($date) ?></small>
                                </div>
                                <div class="ms-2">
                                    <button data-bs-toggle="modal" data-bs-target="#subscriberDetails" class="btn btn-sm btn-primary" onclick="subscriber(this)" data-subscriber="<?php echo $subscriberId ?>">Detail</button>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider" />
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-info">You currently have no new Subscribers. Check back again.</p>
                        </div>
                    </div>
                <?php endif; ?>
                <a href="newsletter.php" class="dropdown-item text-center">See all Subscribers</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="assets/statics/images/user.jpg" alt="" style="width: 40px; height: 40px" />
                <span class="d-none d-lg-inline-flex">Habeeb Bright</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <a href="#" onclick="confirmLogout()" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>