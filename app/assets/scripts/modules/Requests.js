import $ from 'jquery';

$("#signupform").submit(function(e) {
    e.preventDefault();
    var datatopost = $(this).serializeArray();
    // send to signup.php
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data) {
                $("#signupmessage").html(data);
            }
        },
        error: function(data) {
            $("#signupmessage").html("<div class='modal-message'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});