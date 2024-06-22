<?php
require_once "classes/Client.php";

$clt = new Client;
$clients = $clt->allClients();
?>

<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title">Add Project</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process/addproject.php" method="post">
                    <div class="mb-3">
                        <label for="projectName" class="form-label">Project Name:</label>
                        <input type="text" class="form-control" id="projectName" name="projectName">
                    </div>
                    <div class="mb-3">
                        <label for="projectClient" class="form-label">Client:</label>
                        <select class="form-select" id="projectClient" name="projectClient">
                            <?php foreach ($clients as $client) : ?>
                                <option value="<?php echo $client['clientid']; ?>"><?php echo $client['fullname']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="projectDesc" class="form-label">Project Description:</label>
                        <input type="text" class="form-control" id="projectDesc" name="projectDesc">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="projectStart" class="form-label">Commencement:</label>
                            <input type="date" class="form-control" id="projectStart" name="projectStart">
                        </div>
                        <div class="col">
                            <label for="projectEnd" class="form-label">Complete:</label>
                            <input type="date" class="form-control" id="projectEnd" name="projectEnd">
                        </div>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="submit" class="btn btn-primary">Add Project</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>