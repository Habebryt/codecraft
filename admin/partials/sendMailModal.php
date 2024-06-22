<div class="modal fade" id="sendClientMailModal" tabindex="-1" aria-labelledby="sendMailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div id="mailFeedback"></div>
        <div class="modal-content bg-dark text-info">
            <div class="modal-header">
                <h5 class="modal-title">Send Mail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-info">
                <form method="post" enctype="multipart/form-data" id="sendEmailForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientName" class="form-label">Client Name</label>
                                <input type="text" class="form-control" id="clientName" name="clientName" required>
                            </div>
                        </div>
                        <input type="hidden" name="verifyEmail" value="xyzkbA12345t5sq">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="clientEmail" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="clientEmail" name="clientEmail" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mailSubject" class="form-label">Subject:</label>
                                <input type="text" class="form-control" id="mailSubject" name="mailSubject">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="attachment" class="form-label">Document:</label>
                                <input type="file" name="attachment" id="attachment" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="mailMessage" class="form-label">Message:</label>
                                <textarea type="text" class="form-control" id="mailMessage" name="mailMessage"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="submit" class="btn btn-primary" name="sendMail" value="sendMail" id="sendMail">Send Mail</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>