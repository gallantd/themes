<?php get_header(); ?>
    <?php
$x=0;
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $race = getRaceEvent(get_the_ID());
        if($x%2 == 0){ ?>
            <section class="race race--even">
                <?php printImg($race['img'], 'small'); ?>
                <?php if(locate_template('template/race-info.php')){ include('template/race-info.php');} ?>
            </section>
    <?php }
        else {?>
            <section class="race race--odd">
                <?php if(locate_template('template/race-info.php')){ include('template/race-info.php');} ?>
                <?php printImg($race['img'], 'small'); ?>
            </section>

        <?php } ?>

<?php $x++; endwhile; endif; ?>
<?php get_footer(); ?>