<?php get_header(); ?>

<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    echo "INDEX";
endwhile; endif; ?>
<?php get_footer(); ?>