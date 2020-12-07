<?php get_header(); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="header">
        <h2 class="entry-title"><?php the_title(); ?></h2>
    </div>
        <?php endwhile; endif; ?>
<?php get_footer(); ?>