<?php

/**
 * Featured images and custom image sizes
 *
 * Naming convention: <width>x<height>
 *
 * In layouts add a comment to the image/gallery field that lists what
 * crop sizes are used.
 *
 * add_image_size( $name, $width, $height, $crop );
 */

function image_size()
{
    add_theme_support('post-thumbnails');

    set_post_thumbnail_size(250, 200, true);

    // Card Image Sizes
    add_image_size('Card-Large', 670, 600, true);
}
//add_action( 'after_setup_theme', 'image_size' );