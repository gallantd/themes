<?php get_header(); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $race = getRaceEvent(get_the_ID()); ?>

    <?php if(locate_template('template/cancelled.php') && !empty($race['cancelled'])){ include('template/cancelled.php');} ?>

    <?php if(locate_template('template/jumbotron.php') && !empty($race['img'])){ include( 'template/jumbotron.php' );} ?>


 <section class="single--race">
    <article id="post-<?php the_ID();?>" class="single--race-article">
        <div class="header">
            <h2 class="entry-title"><?php the_title(); ?></h2>
        </div>
        <?php
        if(locate_template('template/race-details.php') && !empty($race['dist']) ||
            locate_template('template/race-details.php') && !empty($race['cost']) ||
            locate_template('template/race-details.php') && !empty($race['date'])
        ){ include( 'template/race-details.php' );} ?>

        <aside class="single--race-post">
            <?php the_content(); ?>
        </aside>
    </article>
    </section>
        <?php endwhile; endif; ?>

<?php edit_post_link(); ?>
<?php get_footer(); ?>