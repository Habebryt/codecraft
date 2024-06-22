<div class="modal fade" id="subscriberDetails" tabindex="-1" aria-labelledby="subscriberDetailsLabel" aria-hidden="true">
    <div class="modal-dialog bg-dark">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="messageDetailsLabel">Subscriber: <span id="subFullname"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark">
                <!-- Subscriber details will be populated here -->
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <label for="firstname" class="col-sm-3 col-form-label">Firstname:</label>
                        <input type="text" class="form-control text-secondary" id="firstname" name="firstname" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="lastname" class="col-sm-3 col-form-label">Lastname:</label>
                        <input type="text" class="form-control text-secondary" id="lastname" name="lastname" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <input type="text" class="form-control text-secondary" id="subEmail" name="email" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="joined" class="col-sm-3 col-form-label">Joined:</label>
                        <input type="text" class="form-control text-secondary" id="joined" name="joined" disabled>
                    </div>
                </div>
                <form id="subStatusForm">
                    <input type="hidden" id="subscriberId" name="subscriberId">
                    <div class="row text-primary">
                        <div class="col-md-6 text-light">
                            <div id="subStatusUpdateFeedback"></div>
                            <select name="subStatus" id="subStatus" class="form-select text-bg-secondary">
                                <option value="Active">Subscribed</option>
                                <option value="Inactive">Unsubscribed</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" value="xyzkbA12345t5sq" name="verify">
                            <input type="button" id="updateSubStatus" class="btn btn-primary" value="Update" name="updateSubStatus" onclick="handleSubscriberStatus()">
                           
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-dark">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#sendClientMailModal" data-bs-dismiss="modal">Send Mail</button>
            </div>
        </div>
    </div>
</div>