<?php
require_once "classes/Client.php";

$clt = new Client;
$services = $clt->services();
$countries = $clt->country();
$categories = $clt->category();
?>

<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process/addclient.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Client Full Name:</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientPhone" class="form-label">Phone:</label>
                                <input type="text" class="form-control" id="clientPhone" name="clientPhone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientEmail" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="clientEmail" name="clientEmail" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientCompany" class="form-label">Company:</label>
                                <input type="text" class="form-control" id="clientCompany" name="clientCompany">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientWebsite" class="form-label">Website:</label>
                                <input type="text" class="form-control" id="clientWebsite" name="clientWebsite">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientCategory" class="form-label">Category:</label>
                                <select class="form-select" id="clientCategory" name="clientCategory" required>
                                    <option value="" hidden>Select Category</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?php echo $category['cateid']; ?>"><?php echo $category['category']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientCountrySelect" class="form-label">Country:</label>
                                <select class="form-select" id="clientCountrySelect" name="clientCountrySelect" required>
                                    <option value="" hidden>Select Country</option>
                                    <?php foreach ($countries as $country) : ?>
                                        <option value="<?php echo $country['idcountry']; ?>"><?php echo $country['country_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientService" class="form-label">Service:</label>
                                <select class="form-select" id="clientService" name="clientService" required>
                                    <option value="" hidden>Select Service</option>
                                    <?php foreach ($services as $service) : ?>
                                        <option value="<?php echo $service['id']; ?>"><?php echo $service['service_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="submit" class="btn btn-primary" name="addClient" value="addClient">Add Client</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>