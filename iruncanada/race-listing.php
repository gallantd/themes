<?php /* Template Name: Race Listing Page */ ?>
<?php get_header(); ?>
	<?php if ( have_posts() ) :?>
		<article class="content">
		<?php
			edit_post_link();
			the_content();
		?>
			</article>
<?php		endif;
/*
	MOVE THIS TO A TEMPLATE AND USE IT IN ALL CONTENT AREAS
*/

?>

<?php
$AllPosts = new AllRaces;

if(filter_input(INPUT_GET, 'province', FILTER_SANITIZE_STRING)){
  $posts = $AllPosts->filters();
} else {
  $posts = $AllPosts->posts();
}
$pagination = $AllPosts->getPagination(); // Get pagination
$totalPosts = count($posts);
    $x = 0;
		foreach ($posts as $key => $post) :?>
    <?php
		$race_results = get_race_listing($post->ID);
		$warning = (!empty($race_results['sold_out']))? 'sold_out-event' : '';
		$warning = (!empty($race_results['cancelled']))? 'cancelled-event' : $warning;
		$val = ($x%2 != 0)? 'even':'odd'; ?>
				<section class="race race--<?= $val;?> <?= $warning; ?>">
						<?php
						 if(!empty($race_results['image'])){
							 output_pictures(['image'=> $race_results['image'], 'alt' => $race_results['title'], 'title' => $race_results['title']]);
						 }
						 if(!empty($race_results['cancelled'])){
								$event_state = 'cancelled';
								include(  'templates/event-state.php');
							}
							elseif(!empty($race_results['sold_out']) && empty($race_results['cancelled'])){
								$event_state = 'sold out';
								include(  'templates/event-state.php');
							}?>
						<aside class="race-container ">
							<?php if(locate_template('templates/race-info.php')){ include('templates/race-info.php');} ?>
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

<?php if(empty($posts) && locate_template('templates/no-results.php')){ include('templates/no-results.php');} ?>
<?php get_footer(); ?>
