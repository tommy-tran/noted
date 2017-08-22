import $ from 'jquery';

class Manager {
    constructor() {
        this.main = $(".notes__extra-main");
        this.mainBtn = $(".notes__button-cancel, .notes__button-done, .notes__button-save");
        this.add = $(".notes__extra-add");
        this.addBtn = $(".notes__button-add");
        this.notepad = $(".notes__notepad");
        this.notepadtext = $("#notepad");
        this.noteList = $(".notes__list");
        this.noteTitle= $(".notes__title");
        this.events();
    }

    events() {
        this.mainBtn.click(this.openMain.bind(this));
        this.addBtn.click(this.openAdd.bind(this));
        this.noteTitle.focus(this.cleanTitle.bind(this));
        this.changeNotepadSize();
    }

    changeNotepadSize() {
        if ($(window).height() < 680) {
            this.notepadtext.attr("rows", 12);
        } else {
            this.notepadtext.attr("rows", 18);
        }
    }



    openMain() {
        this.main.removeClass("notes--hidden");
        this.add.addClass("notes--hidden");
        this.notepad.addClass("notes__notepad--hide");
        this.noteList.removeClass("notes__list--hide");
        this.notepadtext.val("");
        this.noteTitle.text("Title");
        var that = this;
        $.ajax({
            url: "loadnotes.php",
            success: function(data) {
                // Clear notepad
                console.log("Success: Loaded Notes!");
                $(".notes__list").html(data);
                that.deleteNotes();
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    deleteNotes() {
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

    openAdd() {
        this.main.addClass("notes--hidden");
        this.add.removeClass("notes--hidden");
        this.notepad.removeClass("notes__notepad--hide");
        this.noteList.addClass("notes__list--hide");
    }

    cleanTitle() {
        if (this.noteTitle.text() == "Title") {
            this.noteTitle.text("");
        }
    }
    
}

export default Manager;