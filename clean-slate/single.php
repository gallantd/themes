<?php get_header(); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php
            $event = getRaceEvent(get_the_ID());
            $race = getRaceSettings(get_the_ID());
            ?>

    <?php if(locate_template('template/cancelled.php') && !empty($race['cancelled'])){ include('template/cancelled.php');} ?>

    <?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>

 <section class="single--race single-<?=$race['color'];?>">
    <article id="post-<?php the_ID();?>" class="single--race-article">
        <div class="header">
            <h2 class="entry-title"><?php the_title(); ?></h2>
        </div>
        <?php
        if(locate_template('template/race-details.php') && !empty($event)
        ){ include( 'template/race-details.php' );} ?>

        <aside class="single--race-post">
            <?php the_content(); ?>
        </aside>
        <?php edit_post_link(); ?>
    </article>
    </section>
        <?php endwhile; endif; ?>
<?php get_footer(); ?>
