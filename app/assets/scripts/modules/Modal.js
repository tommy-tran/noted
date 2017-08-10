import $ from 'jquery';

class Modal {
    constructor() {
        this.signUpBtn = $(".signup-btn");
        this.loginBtn = $(".login-btn");
        this.signUpModal = $(".modal-signup");
        this.loginModal = $(".modal-login");
        this.close = $(".modal__close");
        this.container = $(".modal-container");
        this.forgotLink = $(".modal__extra-forgot");
        this.forgotModal= $(".modal-forgot");
        this.events();
    }

    events() {
        this.close.click(this.closeModal.bind(this));
        this.signUpBtn.click(this.openSignUp.bind(this));
        this.loginBtn.click(this.openLogin.bind(this));
        this.forgotLink.click(this.openForgot.bind(this));
    }

    openLogin() {
        this.container.removeClass("modal-container--hidden");
        this.signUpModal.addClass("modal-signup--hidden");
        this.loginModal.removeClass("modal-login--hidden");
        this.forgotModal.addClass("modal-forgot--hidden");
    }

    openSignUp() {
        this.container.removeClass("modal-container--hidden");
        this.loginModal.addClass("modal-login--hidden");
        this.signUpModal.removeClass("modal-signup--hidden");
        this.forgotModal.addClass("modal-forgot--hidden");
    }

    openForgot() {
        this.container.removeClass("modal-container--hidden");
        this.loginModal.addClass("modal-login--hidden");
        this.signUpModal.addClass("modal-signup--hidden");
        this.forgotModal.removeClass("modal-forgot--hidden");
    }
    
    closeModal() {
        this.container.addClass("modal-container--hidden");
    }
}

export default Modal;