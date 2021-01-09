<?php /* Template Name: Listing Page */ ?>
<?php get_header(); ?>
<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>
<?php
$AllPosts = new AllPosts;
if(filter_input(INPUT_GET, 'province', FILTER_SANITIZE_STRING) || filter_input(INPUT_GET, 'distance', FILTER_SANITIZE_STRING)){
  $posts = $AllPosts->filters();
} else {
  $posts = $AllPosts->posts();
}
$pagination = $AllPosts->getPagination(); // Get pagination
$totalPosts = count($posts);
?>

<?php   displayTicker(get_field('province_filter', get_option('page_on_front'))); ?>

<?php
    $x = 0;
foreach ($posts as $key => $post) :?>
    <?php $race = getRaceEvents($post->ID);
      $cancelled = (!empty($race['cancelled']))? 'cancelled-event' : '';

        $val = ($x%2 != 0)? 'even':'odd'; ?>
            <section class="race race--<?= $val;?> <?=$cancelled?>">
                <?php
                 if(!empty($race['img'])){
                     echo  output_pictures( set_image_array( array('imageArray' => $race['img'], 'singleImage' => true) ));
                 }
                ?>
                <aside class="race-container ">
                    <?php if(!empty($race['cancelled'])){include(  'template/cancelled.php');} ?>
                    <?php if(locate_template('template/race-info.php')){ include('template/race-info.php');} ?>
                </aside>
            </section>
        <?php $x++; ?>
<?php endforeach; ?>
<?php
/*
 * SETUP PAGINATION
 */

if (!empty($pagination)): ?>
    <nav class="sr-pagination all--post--pagination" aria-label="Pagination">
        <ul class="sr-pagination__items">
            <?php foreach ($pagination as $key => $page_link):
                $currentClass = (strpos($page_link, 'current') !== false) ? 'active' : '';
                ?>
                <li class="sr-pagination__item <?= $currentClass;?>"><?= $page_link; ?></li>
            <?php endforeach ?>
        </ul>
    </nav>

    <nav class="sr-pagination sr-pagination--mobile">
        <ul class="sr-pagination__items">
            <li class="sr-pagination__item"><?= $pagination[0]; ?></li>
            <li class="sr-pagination__info"><?= 'Page <strong>' . ($AllPosts->getPaged() ?: '1') . '</strong> of <strong>' . $AllPosts->getWpQuery()->max_num_pages . '</strong>'; ?></li>
            <li class="sr-pagination__item"><?= end($pagination); ?></li>
        </ul>
    </nav>
<?php endif; ?>

<?php if(empty($posts) && locate_template('template/no-results.php')){ include('template/no-results.php');} ?>
<?php
if(filter_input(INPUT_GET, 'province', FILTER_SANITIZE_STRING) || filter_input(INPUT_GET, 'distance', FILTER_SANITIZE_STRING)){

//  displayTicker(get_field('distance_filter', get_option('page_on_front')));
}?>
<?php get_footer(); ?>
