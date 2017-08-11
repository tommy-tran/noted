import $ from 'jquery';

class Manager {
    constructor() {
        this.main = $(".notes__extra-main");
        this.mainBtn = $(".notes__button-cancel, .notes__button-done, .notes__button-save");
        this.edit = $(".notes__extra-edit");
        this.editBtn = $(".notes__button-edit");
        this.add = $(".notes__extra-add");
        this.addBtn = $(".notes__button-add");

        this.events();
    }

    events() {
        this.mainBtn.click(this.openMain.bind(this));
        this.editBtn.click(this.openEdit.bind(this));
        this.addBtn.click(this.openAdd.bind(this));
    }

    openMain() {
        this.main.removeClass("notes--hidden");
        this.edit.addClass("notes--hidden");
        this.add.addClass("notes--hidden");
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
    }
    
}

export default Manager;