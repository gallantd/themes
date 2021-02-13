(function(){
  welcome();
  mobileMenu();
  searchDisplay();
  lazyload();
	blockedEvent();
})();

function welcome(){
  console.log("WELCOME TO CANADIAN TRAIL RUNNING, THIS SITE IS 100% CANADIAN OWNED AND OPERATED");
}

function mobileMenu() {
  let _menubtn = $('#menu-icon');
  _menubtn.click(function() {
    console.log('clicked');
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
  let _menubtn = $('.search-icon');
  _menubtn.click(function() {
      let _this = $(this);
      let _menu = $('.search-bar');
      if (_this.hasClass('bar-open')) {
          _this.removeClass('bar-open');
          _menu.animate({
              right: '-'+(_menu.width()+40)+'px',
          }, 250, function(){
            _menu.removeClass('search-open');
          });
      } else {
          _this.addClass('bar-open');
          _menu.addClass('search-open');
          _menu.animate({
              right: '0',
          }, 300);
      }
  });
}
function blockedEvent() {
  let _race = $('.race');
  _race.click(function() {
      let _this = $(this);
      if (_this.hasClass('sold_out-event') || _this.hasClass('cancelled-event')) {
				document.location.href = _this.find('.link-back').attr('href');
			}
  });
}
