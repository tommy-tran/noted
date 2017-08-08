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
        this.menuContent.toggleClass("header__menu-content--visible");
    }

    highlightItem() {
        console.log(this);
        $(this).addClass("hovered");
    }
    unhighlightItem() {
        $(this).removeClass("hovered");
    }
}

export default MobileMenu;