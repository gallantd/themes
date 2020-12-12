<?php /* Template Name: Listing Page */ ?>
<?php
$display = 3;
$AllPosts = new AllPosts;
$posts = $AllPosts->posts('post', $display);
$pagination = $AllPosts->getPagination(); // Get pagination
$totalPosts = count($posts);
?>
<?php get_header(); ?>

<?php
    $x = 0;
foreach ($posts as $key => $post) :?>
    <?php $race = getRaceEvent($post->ID);
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


<?php get_footer(); ?>
