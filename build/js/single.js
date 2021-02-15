(function(){
  load_panel();
  get_data($('#tab-1').data('section'), $('#tab').data('id'));
})();

function load_panel() {
  $('.single--tab').on('click', function(){
    $('.active').removeClass('active');
    $(this).addClass('active');
    get_data($(this).data('section'), $('#tab').data('id'));
  });
}

function get_data(section, id){
  if(!id){
    id = $('#tab-1').data('id');
  }
  $.ajax({
    type : "POST",
    url : "/wp-admin/admin-ajax.php",
    data : { action: 'get_data_call', section: section, id: id},
    beforeSend: function (){
      let postLoadingSpinner = '<div class="single__loading"><div class="loader"></div></div>';
      $("#section-post").html(postLoadingSpinner).show(250);
    },
    success: function(response) {
      $('#section-post').html(response.substr(response.length-1, 1) === '0'? response.substr(0, response.length-1) : response);
    }
});
}
