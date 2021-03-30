<?php /* Template Name: Simple Listing Page */ ?>
<?php get_header();
$AllPosts = new AllRaces;
$posts = $AllPosts->all_posts();
$count = count($posts);
?>

<article class="content">

			<header class="header">
				<a target="_blank" class="new-post" href="<?= get_site_url(); ?>/wp-admin/post-new.php?post_type=trail">Add Race</a>
				<h1 class="entry-title"><?= $count;?>  - Trail Races Listed</h1>
			</header>
				<?php
				$i = 0;
						foreach ($posts as $key => $post) :?>
						<section class="simple<?= $class;?>">
<?php
							$class = '';
							if($i%2 == 0){ $class =' stripe';}
							if($i%10 == 0) {
								?>
								<div class="simple--field left">Title</div>
								<div class="simple--field">Date</div>
								<div class="simple--field">Updated</div>
								<div class="simple--field">Status</div>
								<div class="simple--field">Img</div>
								<div class="simple--field">Cat</div>
								<div class="simple--field">Con</div>
								<div class="simple--field">Exe</div>
								<div class="simple--field">Dist</div>
								<div class="simple--field">Loc</div>
								<div class="simple--field">Cont</div>
								<div class="simple--field">FB</div>
								<div class="simple--field">TWT</div>
								<div class="simple--field">INST</div>
								<div class="simple--field">Reg</div>
								<div class="simple--field">Web</div>
								<div class="simple--field">Feat</div>
								<div class="simple--field">Canc</div>
								<div class="simple--field">S/O</div>
			<?php		}
							$race_info = get_race_details($post);
							?>
							<div class="simple--field left" data-id="<?= $race_info['ID'];?>">
								<a class="white-text" href="<?= get_edit_post_link($race_info['ID']);?>" target="_blank">
									<?= $race_info['title'];?></a>
							</div>
							<div class="simple--field"><?= $race_info['date'];?></div>
							<div class="simple--field">
								<a class="white-text" href="<?= $race_info['post'];?>">
									<?= $race_info['updated'];?>
								</a>
							</div>
							<div class="simple--field"><?= $race_info['status'];?></div>
							<div class="simple--field"><?= $race_info['image'];?></div>
							<div class="simple--field"><?= $race_info['category'];?></div>
							<div class="simple--field"><?= $race_info['content'];?></div>
							<div class="simple--field"><?= $race_info['excerpt'];?></div>
							<div class="simple--field"><?= $race_info['distance'];?></div>
							<div class="simple--field"><?= $race_info['location'];?></div>
							<div class="simple--field"><?= $race_info['contact'];?></div>
							<div class="simple--field"><?= $race_info['facebook'];?></div>
							<div class="simple--field"><?= $race_info['twitter'];?></div>
							<div class="simple--field"><?= $race_info['instagram'];?></div>
							<div class="simple--field"><?= $race_info['register'];?></div>
							<div class="simple--field"><?= $race_info['website'];?></div>
							<div class="simple--field"><?= $race_info['featured'];?></div>
							<div class="simple--field"><?= $race_info['cancelled'];?></div>
							<div class="simple--field"><?= $race_info['sold_out'];?></div>
						</section>
	<?php			$i++;
				endforeach; ?>
</article>


<?php get_footer(); ?>
