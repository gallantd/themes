<?php
/***************************************************************
 * PHP INCLUDES
 ***************************************************************/

require_once locate_template("lib/AdvancedSearch.php");
require_once locate_template("lib/race_event_info.php");
require_once locate_template("lib/post_listing.php");
require_once locate_template("lib/image_output.php");


add_action('wp_head', function(){
    print('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>');
});
function cleanSlateBase() {
    wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '2.2.4',
        true );
    wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/style.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'cleanSlateBase' );

if(!function_exists('displayTicker')){
   function displayTicker($values, $type = 'province'){
       if(empty($values)){ return false; }
       $count = count($values);?>
       <section class="ticker ticker--<?= $count; ?>">
           <?php foreach ($values as $value){
            $label = (!empty($value['label']))?$value['label'] : $value;
            $val = (!empty($value['value']))?$value['value'] : $value;
?>
               <a href="<?php get_site_url();?>/race-list?<?= $type; ?>=<?= $val; ?>" class="ticker--value"><?= $label; ?></a>
           <?php }// end foreach?>
       </section>
<?php
   }//end function
}//end if


if(!function_exists('registerFooterWidgets')){
  function registerFooterWidgets() {

       register_sidebar( array(
        'name'          => 'Footer Area',
        'id'            => 'footer-area',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer--title">',
        'after_title'   => '</h2>',
      ) );
  }
  add_action( 'widgets_init', 'registerFooterWidgets' );
}
