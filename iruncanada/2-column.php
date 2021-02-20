<?php
/* Template Name: 2 Column */
get_header(); ?>
  <article class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php if(!is_front_page()): ?>
        <header class="header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
      <?php endif; ?>
    <div class="columns">
      <aside class="columns--left">
        <?php
          the_content();
        endwhile; endif; ?>
      </aside>

      <?php if(get_field('shortcode')):?>
      <aside class="columns--right">
        <?php
          echo do_shortcode( get_field('shortcode') );
        edit_post_link(); ?>
      </aside>
        <?php endif; ?>
    </div>

  </article>
<?php get_footer(); ?>
