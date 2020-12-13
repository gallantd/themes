<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel = "stylesheet">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel = "stylesheet">
</head>
<body <?php body_class(); ?>>
    <nav class="nav desktop" id="menu">
        <a href="<?= get_home_url(); ?>"><i class="site-icon"></i></a>
        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        <button class="search"></button>
    </nav>

    <nav class="nav mobile" id="menu">
        <a href="<?= get_home_url(); ?>"><i class="site-icon"></i></a>
        <aside class="mobile-menu">

            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </aside>
        <button class="menu-icon" id="menu-icon"></button>
        <button class="search"></button>
    </nav>

    <div class="wrapper" >