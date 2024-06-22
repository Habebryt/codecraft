<div class="modal fade" id="messageDetails" tabindex="-1" aria-labelledby="messageDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="messageDetailsLabel"><span id="messageContent"></span> <span id="messageTime"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark">
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Name:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-secondary" id="name" name="name" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control text-secondary" id="email" name="email" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-3 col-form-label">Phone:</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control text-secondary" id="phone" name="phone" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="country" class="col-sm-3 col-form-label">Country:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-secondary" id="country" name="country" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="service" class="col-sm-3 col-form-label">Service:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control text-secondary" id="service" name="service" disabled value="Web Integration">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="message" class="col-sm-3 col-form-label">Message:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control text-secondary" id="message" name="message" rows="5" disabled></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-3 col-form-label">Status:</label>
                    <div class="col-sm-9">
                        <form id="msgStatusForm">
                            <input type="hidden" id="messageId" name="messageId">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="msgStatusUpdateFeedback"></div>
                                    <select name="msgStatus" id="messageStatus" class="form-select text-bg-secondary">
                                        <option value="Active">Active</option>
                                        <option value="New">New</option>
                                        <option value="Responded">Emailed</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" value="xyzkbA12345t5sq" name="verify">
                                    <input type="button" id="updateStatus" class="btn btn-primary" value="Update" name="updateStatus" onclick="handleMessageStatus()">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-dark">
            <button class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#sendClientMailModal" data-bs-dismiss="modal">Send Mail</button>                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>