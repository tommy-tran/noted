$(document).ready(function(){
    $.ajax({
        url: "loadnotes.php",
        success: function(data) {
            console.log("Success: Loaded Notes!");
            $(".notes__list").html(data);
            clickNotes();
            deleteNotes();
        },
        error: function(data) {
            console.log(data);
        }
    });

});

    $("#notepad").keydown(function(e) {
        if(e.keyCode === 9) { // tab was pressed
            // get caret position/selection
            var start = this.selectionStart;
            var end = this.selectionEnd;

            var $this = $(this);
            var value = $this.val();

            // set textarea value to: text before caret + tab + text after caret
            $this.val(value.substring(0, start)
                        + "\t"
                        + value.substring(end));

            // put caret at right position again (add one for the tab)
            this.selectionStart = this.selectionEnd = start + 1;

            // prevent the focus lose
            e.preventDefault();
        }
    });

    // Open individual notes
    function clickNotes() {
        $(".notes__item").click(function() {
            var main = $('.notes__extra-main');
            main.addClass("notes--hidden");
            var edit = $(".notes__extra-edit");
            edit.addClass("notes--hidden");
            var add = $(".notes__extra-add");
            add.removeClass("notes--hidden");
            var noteList = $(".notes__list");
            noteList.addClass("notes__list--hide");
            var activeNote = $(this).attr("id");
            $("#notepad").val($(this).find('.notes__item-note').text());
            $(".notes__notepad").removeClass("notes__notepad--hide");
        });    
    }

    function deleteNotes() {
        $(".notes__item-close").click(function(e) {
            e.stopPropagation();
            // Get note
            var note = $(this).parent();
            // Get note item's id
            var id = note.attr('id');
            // Call to deletenotes
            $.ajax({
                url: "deletenote.php",
                type: "POST",
                data: {id:id},
                success: function(data) {
                    if (data =='error') {
                        console.log('Error deleting note: ' + id);
                    } else {
                        console.log("Success: Deleted Note: " + id);
                        note.remove();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            
            });
        }
    )};


