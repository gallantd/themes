<?php
/***************************************************************
 * PHP INCLUDES
 ***************************************************************/
require_once "lib/image_output.php";
require_once "lib/post_listing.php";


add_action('wp_head', function(){
    print('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>');
});
function cleanSlateBase() {
    wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '2.2.4',
        true );
    wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/style.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'cleanSlateBase' );

if(!function_exists('getRaceEvent')) {
    function getRaceEvent($id)
    {
        return array(
            'img' => get_field('race_image', $id),
            'rd' => get_field('race_director', $id),
            'prov' => get_field('province', $id),
            'dist' => get_field('distance', $id),
            'elev' => get_field('elevation', $id),
            'date' => get_field('event_date', $id),
            'regCol' => get_field('register_link', $id),
            'cost' => get_field('registration_cost', $id),
            'regLink' => get_field('register', $id),
            'site' => get_field('website', $id),
            'cancelled' => get_field('is_cancelled', $id)

        );
    }
}

if(!function_exists('promoRaceEvent')){
    function defaultRaceEvent(){
        echo "Promo";
    }
}

if(!function_exists('printImg')) {
    function printImg($ig) {
        if(!empty($ig['class'])){ $class = $ig['class'];}
        ob_start(); ?>
            <picture class="lazyload jumbotron--img <?= $class?>">
                <?php //foreach ($sources as $key => $source): ?>
            <!--                <source media="(min-width: --><?php //echo $key; ?><!--px)" data-srcset="--><?php //echo $source; ?><!--">-->
            <!--            --><?php //endforeach; ?>
                <img src="<?= $ig['url']?>" alt="<?= $ig['alt']?>" title="<?= $ig['alt']?>" >
            </picture>
        <?php print(ob_get_clean());

    }
}
