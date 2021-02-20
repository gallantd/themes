<?php
/* Template Name: FAQ */
get_header();
$faq = new FAQ;
?>
  <article class="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <header class="header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
      <?php
        the_content();
        edit_post_link();
      endwhile; endif; ?>
      <?php
        foreach($faq->show_all() as $value){?>
        <div class="faqs">
          <aside class="h2 faq faqs--question">
            <?= $value['question'];?>
          </aside>
          <aside class="faq faqs--answer">
            <?= $value['answer'];?>
          </aside>
          <hr class="faqs--divider">
        </div>
        <?php  } ?>
  </article>
<?php get_footer(); ?>
