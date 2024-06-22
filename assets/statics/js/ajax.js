
const handleFeedback = () => {
    $('#feedbackSubmit').click(function (e) {
        e.preventDefault(); // Prevent the default button click behavior
        var formData = $('#feedbackForm').serialize(); // Serialize form data
        console.log(formData)
        $.ajax({
            type: 'POST',
            url: 'process/feedback_process.php',
            data: formData,
            success: function (response) {
                const data = JSON.parse(response);
                let feedback;

                if (data.success) {
                    feedback = `
                        <p class="alert alert-info">
                            ${data.feedback}
                        </p>
                    `;
                } else {
                    feedback = `
                        <p class="alert alert-danger">
                            ${data.feedback}
                        </p>
                    `;
                }

                document.getElementById('feedbackFormFeedback').innerHTML = feedback;
                $('#feedbackForm')[0].reset();
            },
            error: function (xhr, status, error) {
                document.getElementById('feedbackFormFeedback').innerHTML = error;
            }
        });
    });
};

$(document).ready(function () {
    handleFeedback();
});


const handleNewsletter = () => {
    $('#newsletterSubscriber').click(function (e) {
        e.preventDefault(); // Prevent the default button click behavior
        var formData = $('#newsletterForm').serialize(); // Serialize form data
        console.log(formData)
        $.ajax({
            type: 'POST',
            url: 'process/newsletter_process.php',
            data: formData,
            success: function (response) {
                const data = JSON.parse(response);
                let feedback;

                if (data.success) {
                    feedback = `
                        <p class="alert alert-info">
                            ${data.feedback}
                        </p>
                    `;
                } else {
                    feedback = `
                        <p class="alert alert-danger">
                            ${data.feedback}
                        </p>
                    `;
                }

                document.getElementById('newsletterFeedback').innerHTML = feedback;
                $('#newsletterForm')[0].reset();
            },
            error: function (xhr, status, error) {
                document.getElementById('newsletterFeedback').innerHTML = error;
            }
        });
    });
};

$(document).ready(function () {
    handleNewsletter();
});


//const handleContact = () => {
    $('#contactForm').submit(function (e) {
        e.preventDefault(); // Prevent the default button click behavior
        $('#contactSubmit').prop('disabled', true); // Disable the button to prevent multiple clicks
        $('#spinner').removeClass('d-none');

        var formData = $('#contactForm').serialize(); // Serialize form data
        // console.log(formData)
        $.ajax({
            type: 'POST',
            url: 'process/contact_process.php',
            data: formData,
            dataType: 'json',
            cache: false,
            success: function (data) {

                //console.log(response);
                //const data = (response);
                // let feedback;

                if (data.success) {
                    feedback = `
                        <p class="alert alert-info"><i class='fa-solid fa-check'></i> 
                            ${data.feedback}
                        </p>
                    `;
                } else {
                    feedback = `
                        <p class="alert alert-danger"><i class='fa-solid fa-circle-exclamation'></i>
                            ${data.feedback}
                        </p>
                    `;
                }

                document.getElementById('formFeedback').innerHTML = data.feedback;
                $('#contactForm')[0].reset();
            },
            error: function (xhr, status, error) {
                document.getElementById('formFeedback').innerHTML = error;
            },
            complete: function () {
                // Hide spinner and enable the button after request is complete
                $('#spinner').addClass('d-none');
                $('#contactSubmit').prop('disabled', false);
            }
        });
   });
//};

$(document).ready(function () {
    handleContact();
});



