(function(){
    welcome();
    mobileMenu();
    searchDisplay();
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
           height: '100%',
           opacity: 1,
           paddingBottom: '2rem'
       }, 250);
    });

    less.click(function(){
        $(this).hide();
        $('#show-more').fadeIn(250);
        $('.race--details--show-more').animate({
            opacity: 0,
            height: 0,
            paddingBottom: 0
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
                right: '-30.5rem',
            }, 250);
        } else {
            _this.addClass('menu-open');
            _menu.animate({
                right: '0',
            }, 250);
        }
    });
}

function searchDisplay() {
    var _menubtn = $('.search');
    _menubtn.click(function() {
        let _this = $(this);
        let _menu = $('.search-bar');
        if (_this.hasClass('bar-open')) {
            _this.removeClass('bar-open');
            _menu.animate({
                right: '-100%',
            }, 300);
        } else {
            _this.addClass('bar-open');
            _menu.animate({
                right: '0',
            }, 300);
        }
    });
}
