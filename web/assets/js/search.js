$(function () {
    $('.post-module').hover(function() {
        console.log('HOVER');
        $(this).find('.description').stop().animate({
            height: "toggle",
            opacity: "toggle"
        }, 300);
    });
});
