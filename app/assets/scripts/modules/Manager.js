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
        this.events();
    }

    events() {
        this.mainBtn.click(this.openMain.bind(this));
        this.editBtn.click(this.openEdit.bind(this));
        this.addBtn.click(this.openAdd.bind(this));
        this.changeNotepadSize();
    }

    changeNotepadSize() {
        if ($(window).height() < 680) {
            console.log("HEYYYY");
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
    }
    
}

export default Manager;