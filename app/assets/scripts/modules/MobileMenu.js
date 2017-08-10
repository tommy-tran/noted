import $ from 'jquery';

class MobileMenu {
    constructor() {
        this.menuIcon = $('.header__menu-icon');
        this.menuContent = $(".header__menu-content");
        this.menuLinks = $(".header-link");
        this.events();
    }

    events() {
        this.menuIcon.click(this.toggleMenu.bind(this));
        this.menuLinks.hover(this.highlightItem, this.unhighlightItem);
    }

    toggleMenu() {
        var that = this;
        if ($(".header__menu-content--visible")[0]) {
            this.menuContent.removeClass("header__menu-content--visible");
        } else {
            this.menuContent.addClass("header__menu-content--visible");
            this.menuLinks.each(function(element) {
                that.animateIn(this, element);
            });
            this.left = !this.left;
        }
        this.menuIcon.toggleClass("header__menu-icon--close");
    }

    animateIn(e, interval) {
        $(e).addClass("header-link--hidden");
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend'

        setTimeout(function() {
            $(e).addClass("animated fadeInDown").one(animationEnd,
                function() {
                    $(e).removeClass('animated fadeInDown');
                    $(e).removeClass("header-link--hidden");
                }
            )
        }, interval * 40);
    }

    highlightItem() {
        $(this).addClass("hovered");
    }
    unhighlightItem() {
        $(this).removeClass("hovered");
    }
}

export default MobileMenu;