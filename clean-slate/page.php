<?php get_header(); ?>

<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>

<main id="content">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
</header>
<div class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>


    <?php
   echo get_field( "appear_on_page" );
    echo get_field( "editor" );


    ?>

<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
</article>

<?php endwhile; endif; ?>

</main>
<?php get_footer(); ?>
