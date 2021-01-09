<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0!important;">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <?php wp_head(); ?>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel = "stylesheet">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel = "stylesheet">
</head>
<body <?php body_class(); ?>>
    <nav class="nav desktop" id="menu">
        <a href="<?= get_home_url(); ?>"><i class="site-icon"></i></a>
        <?php wp_nav_menu(  'trail' ); ?>
        <button class="search search-icon"  id="search-icon"></button>
    </nav>
    <nav class="nav mobile" id="menu">
        <a href="<?= get_home_url(); ?>"><i class="site-icon"></i></a>
        <aside class="mobile-menu">
          <?php wp_nav_menu(  'trail' ); ?>
        </aside>
        <button class="menu-icon" id="menu-icon"></button>
        <button class="search search-icon"  id="search-icon"></button>
    </nav>
    <?php if(locate_template('template/search-bar.php')){ include( 'template/search-bar.php' );} ?>
    <div class="wrapper" >
