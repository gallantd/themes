<?php
/* Template Name: Homepage Template */
?>
<?php get_header(); ?>

<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>
<?php
    displayTicker(get_field('province_filter'));
    echo "<br><br><br><br><br><br><br><br><br><br>";
    displayTicker(get_field('distance_filter'));
?>
<?php get_footer(); ?>