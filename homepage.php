<?php
/* Template Name: Homepage Template */
?>
<?php get_header(); ?>

<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>
<?php displayTicker(get_field('province_filter'), 'province'); ?>





   <section class="welcome">
     <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
       <article class="welcome--content">
          <?php      the_content(); ?>
          <?php edit_post_link(); ?>
       </article>
<?php     endwhile; endif; ?>
   </section>







   <?php //displayTicker(get_field('distance_filter'), 'distance');?>
   <!-- <section class="featured second-featured"> -->
     <?php //if(locate_template('template/featured-post.php')){ include( 'template/featured-post.php' );}?>
   <!-- </section> -->
<?php get_footer(); ?>
