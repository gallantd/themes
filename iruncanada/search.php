<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>
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
			foreach ($AdvancedSearch->getPosts() as $post):
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
<?php
			$x++; ?>
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
						<li class="sr-pagination__info"><?= 'Page <strong>' . ($AdvancedSearch->getPaged() ?: '1') . '</strong> of <strong>' . $AdvancedSearch->getWpQuery()->max_num_pages . '</strong>'; ?></li>
	 					<li class="sr-pagination__item"><?= end($pagination); ?></li>
	 			</ul>
	 	</nav>

 <?php endif; ?>
<?php get_footer();
