<?php get_header(); ?>
<?php if(locate_template('template/jumbotron.php')){ include( 'template/jumbotron.php' );} ?>
<?php displayTicker(get_field('province_filter', get_option('page_on_front')), 'province'); ?>
<section id="post-0" class="no-results post not-found">
<header class="header">
<h1 class="entry-title"><?php esc_html_e( 'Sorry!', 'clean-slate' ); ?></h1>
</header>
<div class="entry-content">
  <p><?php esc_html_e( 'It looks like you\'ve taken a wrong turn. maybe try a search. ', 'clean-slate' ); ?></p>
</div>
</section>

<?php get_footer(); ?>
