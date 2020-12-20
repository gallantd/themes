<?php
/* Template Name: Homepage Template */
?>
<?php get_header(); ?>

<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>
<?php displayTicker(get_field('province_filter')); ?>
   <section class="featured">
     <?php if(locate_template('template/featured-post.php')){ include( 'template/featured-post.php' );}?>
   </section>
   <?php displayTicker(get_field('distance_filter'));?>
   <section class="featured second-featured">
     <?php if(locate_template('template/featured-post.php')){ include( 'template/featured-post.php' );}?>
   </section>
<?php get_footer(); ?>
