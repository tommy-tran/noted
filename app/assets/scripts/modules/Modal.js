import $ from 'jquery';

class Modal {
    constructor() {
        this.signUpBtn = $(".signup-btn");
        this.loginBtn = $(".login-btn");
        this.signUpModal = $(".modal-signup");
        this.loginModal = $(".modal-login");
        this.close = $(".modal__close");
        this.container = $(".modal-container");
        this.forgotEmailLink = $(".modal__extra-forgot");
        this.forgotModal = $(".modal-forgot");
        this.changeEmail = $(".modal-changeemail");
        this.changeEmailBtn= $(".changeemail-btn");
        this.changePassword= $(".modal-changepassword");
        this.changePasswordBtn= $(".changepassword-btn");
        this.events();
    }

    events() {
        this.close.click(this.closeModal.bind(this));
        this.signUpBtn.click(this.openSignUp.bind(this));
        this.loginBtn.click(this.openLogin.bind(this));
        this.forgotEmailLink.click(this.openForgotEmail.bind(this));
        this.changeEmailBtn.click(this.openChangeEmail.bind(this));
        this.changePasswordBtn.click(this.openChangePassword.bind(this));
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

    openForgotEmail() {
        this.container.removeClass("modal-container--hidden");
        this.loginModal.addClass("modal-login--hidden");
        this.signUpModal.addClass("modal-signup--hidden");
        this.forgotModal.removeClass("modal-forgot--hidden");
    }

    openChangeEmail() {
        this.container.removeClass("modal-container--hidden");
        this.changeEmail.removeClass("modal-changeemail--hidden");
        this.changePassword.addClass("modal-changepassword--hidden");
    }

    openChangePassword() {
        this.container.removeClass("modal-container--hidden");
        this.changeEmail.addClass("modal-changeemail--hidden");
        this.changePassword.removeClass("modal-changepassword--hidden");
    }
    
    closeModal() {
        this.container.addClass("modal-container--hidden");
    }
}

export default Modal;