<?php

/**
 * Featured custom image sizes
 * Naming convention: <width>x<height>
 *
 * add_image_size( $name, $width, $height, $crop );
 */

function image_size()
{
    add_theme_support('post-thumbnails');

    set_post_thumbnail_size(250, 200, true);

    // Header Image Sizes
    add_image_size('Large-Crop', 1200, 600, true);
    add_image_size('Medium-Crop', 670, 600, true);
    add_image_size('Small-Crop', 500, 450, true);
}
add_action( 'after_setup_theme', 'image_size' );
