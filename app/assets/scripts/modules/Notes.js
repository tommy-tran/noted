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

    // setInterval(function() {
    //     $(".notes__item").click(function() {
    //         var main = $('.notes__extra-main');
    //         main.addClass("notes--hidden");
    //         var edit = $(".notes__extra-edit");
    //         edit.addClass("notes--hidden");
    //         var add = $(".notes__extra-add");
    //         add.removeClass("notes--hidden");
    //         var noteList = $(".notes__list");
    //         noteList.addClass("notes__list--hide");
    //         var activeNote = $(this).attr("id");
    //         $("#notepad").val($(this).find('.notes__item-note').text());
    //         $(".notes__notepad").removeClass("notes__notepad--hide");
    //     });    
    // }, 1000);
    
});


