<?php get_header(); ?>

<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>


<?php
$x=0;
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $race = getRaceEvent(get_the_ID());
        if($x%2 == 0){ ?>
            <section class="race race--even">
                <?php
                             if(!empty($race['img'])){ echo  output_pictures( set_image_array( array('imageArray' => $race['img'], 'singleImage' => true) ));};
                ?>
                <aside class="race-container">
                    <?php if(!empty($race['cancelled'])){include(  'template/cancelled.php');} ?>
                    <?php if(locate_template('template/race-info.php')){ include('template/race-info.php');} ?>
                </aside>
            </section>
    <?php }
        else {?>
            <section class="race race--odd">
                <aside class="race-container">
                    <?php if(!empty($race['cancelled'])){include(  'template/cancelled.php');} ?>
                    <?php if(locate_template('template/race-info.php')){ include('template/race-info.php');} ?>
                </aside>
                <?php
                    if(!empty($race['img'])){ echo  output_pictures( set_image_array( array('imageArray' => $race['img'], 'singleImage' => true) ));};
                ?>
            </section>

        <?php } ?>

<?php $x++; endwhile; endif; ?>
<?php get_footer(); ?>