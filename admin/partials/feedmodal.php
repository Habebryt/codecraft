<div class="modal fade" id="testimonyDetails" tabindex="-1" aria-labelledby="testimonyDetailsLabel" aria-hidden="true">
    <div class="modal-dialog bg-dark modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="testimonyDetailsLabel"> <span>Feedback</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-dark">
                <!-- Feedback details will be populated here -->
                <div id="feedBackContent"></div>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <label for="feedFullname" class="col-sm-3 col-form-label">Fullname:</label>
                        <input type="text" class="form-control text-secondary" id="feedFullname" name="fullname" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="feedEmail" class="col-sm-3 col-form-label">Email:</label>
                        <input type="email" class="form-control text-secondary" id="feedEmail" name="email" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="feedCompany" class="col-sm-3 col-form-label">Company:</label>
                        <input type="text" class="form-control text-secondary" id="feedCompany" name="company" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="feedProject" class="col-sm-3 col-form-label">Project:</label>
                        <input type="text" class="form-control text-secondary" id="feedProject" name="Project" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="feedService" class="col-sm-3 col-form-label">Service:</label>
                        <input type="text" class="form-control text-secondary" id="feedService" name="service" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6 mt-2">
                        <form id="feedStatusForm">
                            <input type="hidden" id="feedbackId" name="feedbackId">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="feedStatusUpdateFeedback"></div>
                                    <select name="feedStatus" id="feedStatus" class="form-select text-bg-secondary text-info form-control">
                                        <option value="New">New</option>
                                        <option value="Seen">Seen</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <input type="hidden" value="xyzkbA12345t5sq" name="verify">
                                    <input type="button" id="updateFeedStatus" class="btn btn-primary" value="Update" name="updateFeedStatus" onclick="handleFeedbackStatus()">
                                    
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <label for="feedSocial" class="col-sm-3 col-form-label">Client Social:</label>
                        <input type="text" class="form-control text-secondary" id="feedSocial" name="feedSocial" disabled>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="feedSocialHandle" class="col-sm-3 col-form-label">Social Handle:</label>
                        <input type="text" class="form-control text-secondary" id="feedSocialHandle" name="feedSocialHandle" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="feedTime" class="col-sm-3 col-form-label">Time:</label>
                                <input type="text" class="form-control text-secondary" id="feedTime" name="feedTime" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="feedRating" class="col-sm-3 col-form-label">Rating:</label>
                                <input type="text" class="form-control text-secondary" id="feedRating" name="feedRating" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <label for="feedMessage" class="col-sm-3 col-form-label">Feedback:</label>
                        <textarea type="text" class="form-control text-secondary" id="feedMessage" name="feedMessage" disabled></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-dark">
            <button class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#sendClientMailModal" data-bs-dismiss="modal">Send Mail</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>