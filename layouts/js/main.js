$(document).ready(function() {
    new WOW().init()

    function checkNav() {
        if ($(window).scrollTop() > 70) {
            $('.nav').addClass('active');
        } else {
            $('.nav').removeClass('active');
        }
    }

    $(window).scroll(function(e) {
        e.preventDefault()
        checkNav()
    })

    checkNav()
})
