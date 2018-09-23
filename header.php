<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>

<div class="uk-offcanvas-content">
    <header style="z-index: 980;" uk-sticky="bottom: #animation" class="uk-navbar-container tm-navbar-container uk-sticky uk-sticky-fixed uk-active uk-sticky-below">
        <div class="uk-container"><?php
$nav = wp_nav_menu(array(
    'theme_location' => 'primary',
    'menu_class'     => 'uk-navbar-nav uk-visible@m',
    'depth'          => 2,
    'walker'         => new WordpressUikitMenuWalker('navbar'),
    'echo'           => false,
    'fallback_cb'    => false
));
$nav_offcanvas = wp_nav_menu(array(
    'theme_location' => 'primary',
    'menu_class'     => 'uk-nav uk-nav-offcanvas',
    'depth'          => 2,
    'walker'         => new WordpressUikitMenuWalker('offcanvas'),
    'echo'           => false,
    'fallback_cb'    => false
));
?>
<?php if ($nav) : ?>
    <nav id="navbar" class="uk-navbar">
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo"></a>
        </div>
        <div class="uk-navbar-right">
            <?= $nav ?>




            <a uk-navbar-toggle-icon="" href="#offcanvas-menu" uk-toggle class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon" uk-toggle="target: #offcanvas-push"></a>
        </div>
    </nav>
    <div id="offcanvas-menu" class="uk-offcanvas" uk-offcanvas="mode: push">
        <div class="uk-offcanvas-bar">
            <?= $nav_offcanvas ?>
        </div>
    </div>
<?php endif; ?>
        </div>
    </header>