$(function () { AOS.init({ once: !0 }), $(".navbar-toggler").on("click", function () { $(this).toggleClass("active") }); var n = $(".sub-menu-bar .navbar-nav .sub-menu"); n.length && (n.parent("li").children("a").append(function () { return '<button class="sub-nav-toggler"> <i class="lni-chevron-down"></i> </button>' }), $(".sub-menu-bar .navbar-nav .sub-nav-toggler").on("click", function () { return $(this).parent().parent().children(".sub-menu").slideToggle(), !1 })) });