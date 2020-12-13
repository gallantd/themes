(function(){
    welcome();
    mobileMenu();
    showMore();
})();

function welcome(){
    console.log("WELCOME TO CANADIAN TRAIL RUNNING, THIS SITE IS 100% CANADIAN OWNED AND OPERATED");
}

function showMore(){
    let more = $('#show-more');
    let less = $('#show-less');



    more.click(function(){
        $(this).hide();
       $('#show-less').fadeIn(250);
       $('.race--details--show-more').animate({
           height: '60px',
           opacity: 1
       }, 250);
    });

    less.click(function(){
        $(this).hide();
        $('#show-more').fadeIn(250);
        $('.race--details--show-more').animate({
            opacity: 0,
            height: '0px'

        }, 250);
    });



}

function mobileMenu() {
    var _menubtn = $('#menu-icon');
    _menubtn.click(function() {
        let _this = $(this);
        let _menu = $('.mobile-menu');
        if (_this.hasClass('menu-open')) {
            _this.removeClass('menu-open');
            _menu.animate({
                right: '-305px',
            }, 250);
        } else {
            _this.addClass('menu-open');
            _menu.animate({
                right: '0',
            }, 250);
        }
    });
}