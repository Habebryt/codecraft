<!-- Head Starts here -->
<?php
session_start();
require_once "admin_guard.php";
require_once "partials/head.php";
require_once "classes/Project.php";
require_once "classes/Utilities.php";
$prodata = $_GET['projectid'];


$project = new Project;
$details = $project->ProjectDetails($prodata);

$statusOptions = [
    'New' => 'New',
    'Completed' => 'completed',
    'In Progress' => 'In Progress',
    'No Response' => 'No Response',
    'Negotiating' => 'Negotiating',
];

if (!empty($details['pro_status']) && isset($statusOptions[$details['pro_status']])) {
    $selectedStatus = $statusOptions[$details['pro_status']];
} else {
    $selectedStatus = 'In Progress';
}
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

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4 ">
        <div class="row g-4 vh-100 bg-secondary rounded justify-content-start">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-12">
                        <h2>Project: <?php echo $details['name'];
                                        ?></h2>
                    </div>
                </div>
                <form>
                    <fieldset>
                        <legend>Project Details</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectName">Project Name</label>
                                    <input type="text" class="form-control" id="projectName" name="projectName" required disabled value="<?php echo $details['name']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectClient">Project Client</label>
                                    <input type="text" class="form-control" id="projectClient" name="projectClient" required disabled value="<?php echo $details['fullname']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectDescription">Project Description</label>
                                    <textarea class="form-control" id="projectDescription" name="projectDescription" rows="3" disabled><?php echo $details['prodescription']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectNotes">Project Notes</label>
                                    <form action="process/projectNote_process.php" method="post">
                                        <textarea class="form-control" id="projectNotes" name="projectNotes" rows="3"><?php echo $details['note']; ?></textarea>
                                        <input type="hidden" name="projectid" value="<?php echo $details['projectid']; ?>">
                                        <div class="my-2">
                                            <button type="submit" class="btn btn-primary">Update Note</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Client Details <a href="clientprojects.php?clientid=<?php echo $details['project_client']; ?>" class=" btn btn-info" target="_blank">View Client</a></legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="clientEmail">Client Email</label>
                                    <input type="email" class="form-control" id="clientEmail" name="clientEmail" disabled value="<?php echo $details['email']; ?>">
                                    <button class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#sendClientMailModal">Send Mail</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="clientPhone">Client Phone</label>
                                    <input type="tel" class="form-control" id="clientPhone" name="clientPhone" disabled value="<?php echo $details['phone']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group my-1">
                                    <label for="clientCountry">Client Country</label>
                                    <input type="text" class="form-control" id="clientCountry" name="clientCountry" disabled value="<?php echo $details['country_name']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group my-1">
                                    <label for="clientCompany">Client Company</label>
                                    <input type="text" class="form-control" id="clientCompany" name="clientCompany" disabled value="<?php echo $details['company_name']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group my-1">
                                    <label for="service">Service</label>
                                    <input type="text" class="form-control" id="service" name="service" disabled value="<?php echo $details['service_name']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group my-1">
                                    <label for="url">URL</label>
                                    <input type="url" class="form-control" id="url" name="url" disabled value="<?php echo $details['url']; ?>">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Project Status</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-1">
                                    <label for="projectStatus">Project Status</label>
                                    <form action="process/projectStatus_process.php" method="post">
                                        <select class="form-control" id="projectStatus" name="projectStatus">
                                            <option value="in-progress" <?php echo ($selectedStatus == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                                            <option value="completed" <?php echo ($selectedStatus == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                            <option value="new" <?php echo ($selectedStatus == 'New') ? 'selected' : ''; ?>>New</option>
                                            <option value="No Response" <?php echo ($selectedStatus == 'No Response') ? 'selected' : ''; ?>>No Response</option>
                                            <option value="Negotiating" <?php echo ($selectedStatus == 'Negotiating') ? 'selected' : ''; ?>>Negotiating</option>
                                        </select>
                                        <input type="hidden" name="projectid" value="<?php echo $details['projectid']; ?>">
                                        <div class="my-2">
                                            <button type="submit" name="update" class="btn btn-primary">Update Status</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group my-1">
                                    <label for="startDate">Start Date</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" disabled value="<?php echo $details['start']; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group my-1">
                                    <label for="endDate">End Date</label>
                                    <input type="date" class="form-control" id="endDate" name="endDate" disabled value="<?php echo $details['end']; ?>">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>


            </div>
        </div>
    </div>
    <!-- Blank End -->


    <!-- Footer Start -->

    <?php
    require_once "partials/footer.php";

    ?>

    <!-- Footer Ends -->