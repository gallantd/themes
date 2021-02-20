<?php
/***************************************************************
 * PHP INCLUDES
 ***************************************************************/
 /* System Includes */
require_once locate_template("lib/custom-image-sizes.php");
require_once locate_template("lib/custom-post-type.php");

/* Page Includes */
require_once locate_template("lib/jumbotron.php");
require_once locate_template("lib/helpers.php");
require_once locate_template("lib/AdvancedSearch.php");
require_once locate_template("lib/race_event_info.php");
require_once locate_template("lib/all-races.php");
require_once locate_template("lib/single.php");
require_once locate_template("lib/faqs.php");
require_once locate_template("lib/sponsors.php");

/***************************************************************
 * BASE STYLES AND SCRIPT INCLUDE
***************************************************************/
if(!function_exists('base_styles')) {
 function base_styles() {
   wp_enqueue_style( 'preload-style', get_template_directory_uri() . '/css/preload.css', false,'1.1','all');
 }
 add_action( 'wp_enqueue_scripts', 'base_styles' );
}

/***************************************************************
 * BASE THEME COLOR
***************************************************************/
function get_page_theme(){
  return get_field('theme_color', get_the_id())??'green';
}

/***************************************************************
 * REGISTER FOOTER WIDGET AREA FOR LEVEL 2 AND LEVEL 3
***************************************************************/
if(!function_exists('registerFooterWidgets')){
  function registerFooterWidgets() {

       register_sidebar( array(
        'name'          => 'Footer Area LEVEL 2',
        'id'            => 'footer-level-2',
        'before_widget' => '<div class="full-width">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="title">',
        'after_title'   => '</h2>',
      ) );
      register_sidebar( array(
       'name'          => 'Footer Area LEVEL 3A',
       'id'            => 'footer-level-3a',
       'before_widget' => '<div class="widget-area">',
       'after_widget'  => '</div>',
       'before_title'  => '<h3 class="title">',
       'after_title'   => '</h3>',
     ) );
      register_sidebar( array(
       'name'          => 'Footer Area LEVEL 3B',
       'id'            => 'footer-level-3b',
       'before_widget' => '<div class="widget-area">',
       'after_widget'  => '</div>',
       'before_title'  => '<h3 class="title">',
       'after_title'   => '</h3>',
     ) );
      register_sidebar( array(
       'name'          => 'Footer Area LEVEL 3C',
       'id'            => 'footer-level-3c',
       'before_widget' => '<div class="widget-area">',
       'after_widget'  => '</div>',
       'before_title'  => '<h3 class="title">',
       'after_title'   => '</h3>',
     ) );

  }
  add_action( 'widgets_init', 'registerFooterWidgets' );
}

/***************************************************************
 * DISPLAY TICKER ALLOW USERS TO QUICKLY FILTER BY PROVINCE
***************************************************************/
if(!function_exists('provincial_ticker')){
  function provincial_ticker(){
    $provinces = [
      'virtual' => 'Virtual',
      'ab' => 'Alberta',
      'bc' => 'British Columbia',
      'man' => 'Manitoba',
      'nb' => 'New Brunswick',
      'nfld' => 'Newfoundland and Labrador',
      'ns' => 'Nova Scotia',
      'ont' => 'Ontario',
      'pei' => 'Prince Edward Island',
      'que' => 'Quebec',
      'sask' => 'Saskatchewan',
      'territories' => 'Territories'
    ];
    $count = count($provinces); ?>
    <section class="ticker">
      <?php foreach ($provinces as $prv => $province){ ?>
        <a href="<?php get_site_url();?>/trail-races?province=<?= $prv; ?>" class="ticker--value"><?= $prv; ?></a>
      <?php
    }// end foreach ?>
    </section>
<?php
  }//end function
}//end if
