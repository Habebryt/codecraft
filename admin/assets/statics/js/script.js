window.onload = () => {
    window.details = function (button) {
        const msgId = button.getAttribute('data-message');
        $.ajax({
            url: 'process/messageDetails.php',
            method: 'POST',
            data: {
                msgDetailId: msgId,
            },
            dataType: 'json', // Expecting JSON response
            success: function (response) {
                // console.log('Parsed msgId:', response);
                if (response.error) {
                    console.error(response.error);
                    // Handle error case
                    return;
                }

                // Assuming response is an array of objects with doc details
                var messageDetails = response[0];

                if (messageDetails) {
                    // console.log(messageDetails);
                    $('#messageId').val(messageDetails.id);
                    $('#messageContent').text(messageDetails.service_name);
                    $('#message').val(messageDetails.message);
                    $('#name').val(messageDetails.fullname);
                    $('#email').val(messageDetails.email);
                    $('#emailLink').attr('href', 'mailto:' + messageDetails.email);
                    $('#phone').val(messageDetails.phone);
                    $('#country').val(messageDetails.country_name);
                    $('#service').val(messageDetails.service_name);
                    $('#messageTime').text(messageDetails.time);
                    $('#status').text(messageDetails.message_status);
                    $('#messageStatus').val(messageDetails.message_status);
                    // $('#modalDocFile').attr('src', 'documents/' + messageDetails.document_file);
                }

                // Show the modal after updating content
                $('#messageDetails').modal('show');
            },
            error: function (xhr, status, error) {
                console.error("AJAX request failed:", error);
                // Handle AJAX request error
            }
        });
    };
    window.testimony = function (button) {
        let feedId = button.getAttribute('data-feedback');
        $.ajax({
            url: 'process/testimonyDetails.php',
            method: 'POST',
            data: {
                feedDetailId: feedId,
            },
            dataType: 'json', // Expecting JSON response
            success: function (response) {
                if (response.error) {
                    console.error(response.error);
                    return;
                }

                var testimonialDetails = response[0];

                if (testimonialDetails) {
                    // console.log(testimonialDetails);
                    $('#testimonyDetailsLabel').text(testimonialDetails.fullname);
                    $('#feedbackId').val(testimonialDetails.testimony_id);
                    $('#feedFullname').val(testimonialDetails.fullname);
                    $('#feedEmail').val(testimonialDetails.email);
                    $('#feedCompany').val(testimonialDetails.company);
                    $('#feedProject').val(testimonialDetails.project);
                    $('#feedService').val(testimonialDetails.service_name);
                    $('#emailFeedLink').attr('href', 'mailto:' + testimonialDetails.email);
                    $('#feedTime').val(testimonialDetails.time);
                    $('#feedSocial').val(testimonialDetails.name);
                    $('#feedSocialHandle').val(testimonialDetails.social_handle);
                    $('#feedStatus').val(testimonialDetails.test_status);
                    $('#feedMessage').val(testimonialDetails.message);
                    $('#feedRating').val(testimonialDetails.rating);
                }

                $('#testimonialDetails').modal('show');
            },
            error: function (xhr, status, error) {
                console.error("AJAX request failed:", error);
            }
        });

    };
    window.subscriber = function (button) {
        let subId = button.getAttribute('data-subscriber');
        $.ajax({
            url: 'process/subscriberDetails.php',
            method: 'POST',
            data: {
                subDetailId: subId,
            },
            dataType: 'json', // Expecting JSON response
            success: function (response) {
                //console.log('Parsed subId:', response);
                if (response.error) {
                    console.error(response.error);
                    // Handle error case
                    return;
                }

                // Assuming response is an array of objects with doc details
                var subscriberDetails = response[0];

                if (subscriberDetails) {
                    // console.log(subscriberDetails);
                    $('#subFullname').text(subscriberDetails.firstname + ' ' + subscriberDetails.lastname);
                    $('#subscriberId').val(subscriberDetails.id);
                    $('#lastname').val(subscriberDetails.lastname);
                    $('#firstname').val(subscriberDetails.firstname);
                    $('#subEmail').val(subscriberDetails.email);
                    $('#emailSubLink').attr('href', 'mailto:' + subscriberDetails.email);
                    $('#joined').val(subscriberDetails.time);
                    $('#subStatus').val(subscriberDetails.message_status);
                }

                // Show the modal after updating content
                $('#subscriberDetails').modal('show');
            },
            error: function (xhr, status, error) {
                console.error("AJAX request failed:", error);
                // Handle AJAX request error
            }
        });

    };

    var alerts = document.querySelectorAll('.alert-fly');
    alerts.forEach(function (alert) {
        setTimeout(function () {
            alert.style.transition = 'opacity 0.5s ease-in-out';
            alert.style.opacity = '0';
            setTimeout(function () {
                alert.remove();
            }, 500);
        }, 3000);
    });
};