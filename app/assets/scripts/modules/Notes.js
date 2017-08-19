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
    
});


