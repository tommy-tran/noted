import $ from 'jquery';

class Manager {
    constructor() {
        this.main = $(".notes__extra-main");
        this.mainBtn = $(".notes__button-cancel, .notes__button-done, .notes__button-save");
        this.edit = $(".notes__extra-edit");
        this.editBtn = $(".notes__button-edit");
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
        this.editBtn.click(this.openEdit.bind(this));
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
        this.edit.addClass("notes--hidden");
        this.add.addClass("notes--hidden");
        this.notepad.addClass("notes__notepad--hide");
        this.noteList.removeClass("notes__list--hide");
        var that = this;
        $.ajax({
            url: "loadnotes.php",
            success: function(data) {
                // Clear notepad
                that.notepadtext.val("");
                that.noteTitle.text("Title");
                console.log("Success: Loaded Notes!");
                $(".notes__list").html(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    openEdit() {
        this.main.addClass("notes--hidden");
        this.edit.removeClass("notes--hidden");
        this.add.addClass("notes--hidden");
    }

    openAdd() {
        this.main.addClass("notes--hidden");
        this.edit.addClass("notes--hidden");
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