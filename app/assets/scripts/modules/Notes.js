$(document).ready(function(){
    $.ajax({
        url: "loadnotes.php",
        success: function(data) {
            console.log("Success: Loaded Notes!");
            $(".notes__list").html(data);
        },
        error: function(data) {
            console.log(data);
        }
    });
});