const handleMessageStatus = () => {
    $('#msgStatusForm').click(function (e) {
        e.preventDefault(); // Prevent the default button click behavior
        var formData = $('#msgStatusForm').serialize(); // Serialize form data
        $.ajax({
            type: 'POST',
            url: 'process/msgStatusUpdate.php',
            data: formData,
            // dataType: 'json',
            success: function (response) {
                const data = JSON.parse(response);
                let feedback;

                if (data.success) {
                    feedback = `
                        <p class="alert alert-info alert-fly">
                            ${data.feedback}
                        </p>
                    `;
                } else {
                    feedback = `
                        <p class="alert alert-danger alert-fly">
                            ${data.feedback}
                        </p>
                    `;
                }

                document.getElementById('msgStatusUpdateFeedback').innerHTML = feedback;
                $('#msgStatusForm')[0].reset();
            },
            error: function (xhr, status, error) {
                document.getElementById('msgStatusUpdateFeedback').innerHTML = error;
            }
        });
    });
};


const handleSubscriberStatus = () => {
    $('#subStatusForm').click(function (e) {
        e.preventDefault(); // Prevent the default button click behavior
        var formData = $('#subStatusForm').serialize(); // Serialize form data
        $.ajax({
            type: 'POST',
            url: 'process/subStatusUpdate.php',
            data: formData,
            // dataType: 'text',
            success: function (response) {
                const data = JSON.parse(response);
                let feedback;
                //console.log(feedback);
                if (data.success) {
                    feedback = `
                        <p class="alert alert-info alert-fly">
                            ${data.feedback}
                        </p>
                    `;
                } else {
                    feedback = `
                        <p class="alert alert-danger alert-fly">
                            ${data.feedback}
                        </p>
                    `;
                }
                document.getElementById('subStatusUpdateFeedback').innerHTML = feedback;
                $('#subStatusForm')[0].reset();
            },
            error: function (xhr, status, error) {
                document.getElementById('subStatusUpdateFeedback').innerHTML = error;
            }
        });
    });
};

const handleFeedbackStatus = () => {
    $('#feedStatusForm').click(function (e) {
        e.preventDefault();
        var formData = $('#feedStatusForm').serialize();
        $.ajax({
            type: 'POST',
            url: 'process/feedStatusUpdate.php',
            data: formData,
            // dataType: 'text',
            success: function (response) {
                const data = JSON.parse(response);
                let feedback;
                //console.log(feedback);
                if (data.success) {
                    feedback = `
                        <p class="alert alert-info alert-fly">
                            ${data.feedback}
                        </p>
                    `;
                } else {
                    feedback = `
                        <p class="alert alert-danger alert-fly">
                            ${data.feedback}
                        </p>
                    `;
                }
                document.getElementById('feedStatusUpdateFeedback').innerHTML = feedback;
                $('#feedStatusForm')[0].reset();
            },
            error: function (xhr, status, error) {
                document.getElementById('feedStatusUpdateFeedback').innerHTML = error;
            }
        });
    });
};

$('#sendEmailForm').submit(function (e) {
    e.preventDefault(); // Prevent the default button click behavior
    $('#sendMail').prop('disabled', true); // Disable the button to prevent multiple clicks
    $('#spinner').removeClass('d-none');

    var formData = $('#sendEmailForm').serialize(); // Serialize form data
    // console.log(formData)
    $.ajax({
        type: 'POST',
        url: 'process/sendMail.php',
        data: formData,
        dataType: 'text',
        cache: false,
        success: function (response) {

          
        const data = (response);
        console.log(data);
            let feedback;

            if (data.success) {
                feedback = `
                    <p class="alert alert-info alert-fly"><i class='fa-solid fa-check'></i> 
                        ${data.feedback}
                    </p>
                `;
            } else {
                feedback = `
                    <p class="alert alert-danger alert-fly"><i class='fa-solid fa-circle-exclamation'></i>
                        ${data.feedback}
                    </p>
                `;
            }


            document.getElementById('mailFeedback').innerHTML = feedback;
            $('#sendEmailForm')[0].reset();
        },
        error: function (xhr, status, error) {
            document.getElementById('mailFeedback').innerHTML = error;
        },
        complete: function () {
            // Hide spinner and enable the button after request is complete
            $('#spinner').addClass('d-none');
            $('#sendMail').prop('disabled', false);
        }
    });
});