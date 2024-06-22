<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "classes/Client.php";
require_once "partials/head.php";

$data = $_GET['clientid'];

$clt = new Client;
$allClients = $clt->clientById($data);
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

    <!-- Client data Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Client Details</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="client.php" class="text-light me-4">Show All</a>
                            <button class="btn btn-primary">Add Client</button>
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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Service</th>
                                <th scope="col">Company</th>
                                <th scope="col">Website</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($allClients as $client) : ?>
                                <?php
                                $clientId = $client['clientid'];
                                $fullname = $client['fullname'];
                                $phone = $client['phone'];
                                $country = $client['country_name'];
                                $service = $client['service_name'];
                                $company = $client['company_name'];
                                $website = $client['url'];
                                $email = $client['email'];
                                ?>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" />
                                    </td>
                                    <td><?php echo $fullname ?></td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $phone ?></td>
                                    <td><?php echo $country ?></td>
                                    <td><?php echo $service ?></td>
                                    <td><?php echo $company ?></td>
                                    <td><a href="http://<?php echo $website ?>" class="text-light" target="_blank">Visit</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Client data End -->


    <!-- Footer Start -->

    <?php
    require_once "partials/footer.php";

    ?>

    <!-- Footer Ends -->