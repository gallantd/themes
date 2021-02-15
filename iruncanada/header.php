<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <?php wp_head();?>
      <link href="<?php bloginfo('stylesheet_url'); ?>" rel = "stylesheet">
  </head>
  <body <?php body_class(get_page_theme()); ?>>
    <div class="wrapper">
      <nav class="nav desktop">
          <a href="<?= get_home_url();?>" class="icon-link">
            <?php single_image(['link' => get_template_directory_uri().'/img/icon.png', 'alt'=> 'I run Canada', 'title' => 'I run Canada', 'class'=> 'site-icon']); ?>
          </a>
          <?php wp_nav_menu(  'main' ); ?>
          <button class="search search-icon"  id="search-icon"></button>
      </nav>
      <nav class="nav mobile" id="menu">
          <a href="<?= get_home_url(); ?>"><i class="site-icon"></i></a>
          <aside class="mobile-menu">
            <?php wp_nav_menu(  'main' ); ?>
          </aside>
          <button class="menu-icon" id="menu-icon">menu</button>
          <button class="search search-icon"  id="search-icon"></button>
      </nav>
    <?php /* load search bar template */
      if(locate_template('templates/search-bar.php')){ include( 'templates/search-bar.php' );}
    ?>
  <?php /* Jumbotron */
    $jumbotron = new Jumbotron();
    $jumbotron->init(get_the_ID());
  ?>
  <?php /* Province List */
      provincial_ticker();
  ?>

    <div class="site-wrapper">
