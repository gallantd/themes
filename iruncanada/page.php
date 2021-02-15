<?php get_header(); ?>
  <article class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php if(!is_front_page()): ?>
        <header class="header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
      <?php endif; ?>
      <?php
        the_content();
        edit_post_link();
      endwhile; endif; ?>
  </article>
<?php get_footer(); ?>
