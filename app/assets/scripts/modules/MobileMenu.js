import $ from 'jquery';

class MobileMenu {
    constructor() {
        this.menuIcon = $('.header__menu-icon');
        this.menuContent = $(".header__menu-content");
        this.menuLinks = $(".link");
        this.events();
    }

    events() {
        this.menuIcon.click(this.toggleMenu.bind(this));
        this.menuLinks.hover(this.highlightItem, this.unhighlightItem);
    }

    toggleMenu() {
        if ($(".header__menu-content--visible")[0]) {
            this.menuContent.removeClass("header__menu-content--visible");
        } else {
            this.menuContent.addClass("header__menu-content--visible");
        }
        this.menuIcon.toggleClass("header__menu-icon--close");
    }

    highlightItem() {
        $(this).addClass("hovered");
    }
    unhighlightItem() {
        $(this).removeClass("hovered");
    }
}

export default MobileMenu;