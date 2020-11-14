<?php
require_once "inc/custom-runs.php";


function my_theme_scripts() {
    wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/script.js', array( 'jquery' ), '2.2.4',
        true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );


