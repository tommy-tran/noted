import $ from 'jquery';

$("#signupform").submit(function(e) {
    e.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    // send to signup.php
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if (data) {
                console.log("Success: " + data);
                $(".message").removeClass("message--hidden");
                $(".message-signup").html(data);
            }
        },
        error: function(data) {
            console.log("Error: " + data);
            $(".message").removeClass("message--hidden");
            $(".message-signup").html("<div class='message-signup'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});