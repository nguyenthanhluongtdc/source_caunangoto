jQuery(document).ready(function ($) {
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
    if (iOS) {
        $(document.body).addClass('ios');
    }
    ;


    if ($(window).width() < 650) {
        $(".bnd").each(function () {
            var bnm = $(this).attr("src-img-mobile");
            $(this).css("background-image", "url(" + bnm + ")");
        });
    }

    //Show/Hide scroll-top on Scroll
    // hide #back-top first
    $("#scroll-top").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scroll-top').fadeIn();
            } else {
                $('#scroll-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#scroll-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
        });
    });


    $('.navbar-toggle').on('click', function (e) {
        $(this).toggleClass('open');
        $('body').toggleClass('menuin');
    });

    $('.nav-overlay').on('click', this, function (e) {
        $('.navbar-toggle').trigger('click');
    });

    $('.dropdown').on('click', '.dropdown-toggle', function (e) {

        var $this = $(this);
        var parent = $this.parent('.dropdown');
        var submenu = parent.find('.sub-menu-wrap');
        parent.toggleClass('open').siblings().removeClass('open');
        e.stopPropagation();

        submenu.click(function (e) {
            e.stopPropagation();
        });
    });
    $('body,html').on('click', function () {

        if ($('.dropdown').hasClass('open')) {

            $('.dropdown').removeClass('open');
        }
    });

    $(".open-search-input").click(function () {
        if ($(".input-search").css("display") == "none") {
            $(".input-search").css("display", "block");
        }
        else {
            $(".input-search").css("display", "none");
        }
    });

    $("#change-language").click(function () {
        if ($(".list-language").css("display") == "none") {
            $(".list-language").css("display", "block");
        }
        else {
            $(".list-language").css("display", "none");
        }
    });

    $(document).click(function () {
        $(".list-language").css("display", "none");
        $(".input-search").css("display", "none");
    });

    $("#change-language").click(function (event) {
        event.stopPropagation();
    });

    $(".open-search-input").click(function (event) {
        event.stopPropagation();
    });

    $(".input-search").click(function (event) {
        event.stopPropagation();
    });

    $('.collapse').on('click', '.collapse-heading', function () {
        var container = $(this).parent('.collapse');
        $(container).siblings().removeClass('on').find('.collapse-body').slideUp();
        $(container).find('.collapse-body').is(':visible') ?
            $(container).removeClass('on').find('.collapse-body').slideUp() :
            $(container).addClass('on').find(':hidden').slideDown();

    });
    stickyHeader();
//    $(window).scrollTop() > $("#header").height() ? $("#header").addClass("sticky") : $("#header").removeClass("sticky");
    $(window).scroll(function () {
//        $(window).scrollTop() > $("#header").height() ? $("#header").addClass("sticky") : $("#header").removeClass("sticky");
        stickyHeader();
    });

    function stickyHeader() {
        var hdOffsetTop = $("#header").offset().top;
        if ($(window).scrollTop() > $("#header").height()) {
            $("#header").addClass("sticky");
        } else {
            $("#header").removeClass("sticky");
        }
    }

// pagination grid project and news
    $(".btn-show-grid").click(function (e) {
        var ct = $(".sec-list-item-new").children(".new-item-sec").length;
        if ((ct - 1) % 4 == 0) {
            $(".paginate-grig").css("bottom", "-130px");
        }
    });
});
   