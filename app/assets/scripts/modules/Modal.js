import $ from 'jquery';

class Modal {
    constructor() {
        this.signUp = $(".signup");
        this.logIn = $(".login");
        this.close = $(".modal__close");
        this.container = $(".modal-container");
        this.events();
    }

    events() {
        this.close.click(this.closeModal.bind(this));
    }
    
    closeModal() {
        this.container.addClass("modal-container--hidden");
    }
}

export default Modal;