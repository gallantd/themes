<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>
<?php

global $AdvancedSearch;
$AdvancedSearch->initialize();
$AdvancedSearch->runSearchQuery(); // Query results saved in object

$pagination = $AdvancedSearch->getPagination(); // Get pagination
?>
	<?php if ($AdvancedSearch->getFoundPosts() && !empty($AdvancedSearch->getSearchTerm())) : ?>
		<section class="s-header">
			<h2 class="s-header--title">
				<strong><?= $AdvancedSearch->getFoundPosts(); ?></strong> results for <strong>'<?= $AdvancedSearch->getSearchTerm(); ?>'</strong>
			</h2>
		</section>

		<?php $x = 0;
			foreach ($AdvancedSearch->getPosts() as $post):?>
			<?php $race = getRaceEvent($post->ID);
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
	<?php endif; ?>
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
<?php get_footer();
