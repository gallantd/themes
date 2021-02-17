<?php
if(!function_exists('single_script')) {
 function single_script() {
   wp_enqueue_script( 'single-script', get_template_directory_uri() . '/js/single.js', false, '1.1', true);
 }
 add_action( 'wp_enqueue_scripts', 'single_script' );
}
  get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
    $cancelled = get_field('is_cancelled'); $sold_out = get_field('sold_out');
    $warning = (!empty($sold_out))? 'sold_out-event' : '';
    $warning = (!empty($cancelled))? 'cancelled-event' : $warning;
 ?>

 <?php
  if(!empty($sold_out)){
     $event_state = 'This event has been sold out';
   }
  if(!empty($cancelled)){
     $event_state = 'This event has been cancelled';
   }
   if(!empty($event_state)){?>
    <section class="single--banner h1 <?= $warning; ?>">
      <?php include(  'templates/event-state.php');?>
    </section>
  <?php }?>
 <section class="single--race">
    <article id="post-<?php the_ID();?>" class="single--race-article">
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <aside class="single--race-post section-1">
        <?php the_content(); ?>
      </aside>
        <aside class="single--sponsors">
            <!-- get_field('sponsor_name');
            get_field('add_sponsor');
            get_field('sponsor_image');
            get_field('sponsors');     -->
        </aside>

        <article class="race--details-container">
          <div class="single--tabs"><span class="sr-only" id="tab" data-id="<?= get_the_id();?>"><?= get_the_id();?></span>
            <button class="single--tab h3 active" data-section="section_1" id="tab-1">Date</button>
            <button class="single--tab h3" data-section="section_2">Distance</button>
            <button class="single--tab h3" data-section="section_3">Contact</button>
          </div>
          <div class="single--container">
            <aside class="single--section" id="section-post">
            </aside>
          </div>
        </article>
    </article>
    <?php echo do_shortcode( '[addtoany]' );?>
    <?php edit_post_link(); ?>
    </section>
        <?php endwhile; endif; ?>

      <?php if(!empty(get_field('register'))):
        $link = get_field('register');?>
        <div class="race-register"><a href="<?= $link['url'];?>" target="_blank">register now</a></div>
      <?php endif;?>
<?php get_footer();
