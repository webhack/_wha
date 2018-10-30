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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
// Theme styles
include 'inc/theme_styles.php';?>
<?php do_action('before'); ?>

<div class="uk-offcanvas-content">
    <?php $header_postion_fixed = get_theme_mod('wha_header_position_fixed');?>
    <header id="header" style="z-index: 980;"
            class="uk-navbar-container tm-navbar-container uk-navbar-transparent <?php if ($header_postion_fixed) {echo 'uk-sticky uk-sticky-fixed uk-active uk-sticky-below"';} ?>
            uk-active">
        <div class="uk-container"><?php
            $nav = wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'uk-navbar-nav uk-visible@m',
                'depth' => 2,
                'walker' => new WordpressUikitMenuWalker('navbar'),
                'echo' => false,
                'fallback_cb' => false
            ));
            $navsec = wp_nav_menu(array(
                'theme_location' => 'primarysec',
                'menu_class' => 'uk-navbar-nav uk-visible@m',
                'depth' => 2,
                'walker' => new WordpressUikitMenuWalker('navbar'),
                'echo' => false,
                'fallback_cb' => false
            ));
            $nav_offcanvas = wp_nav_menu(array(
                'theme_location' => 'primary-offcanvas',
                'menu_class' => 'uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical',
                'depth' => 2,
                'walker' => new WordpressUikitMenuWalker('offcanvas'),
                'echo' => false,
                'fallback_cb' => false,
                'container' => 'div',
                'container_class' => 'uk-offcanvas-bar uk-flex uk-flex-column'
            ));
            if (!get_theme_mod('wha_logo')) {
                $wha_logo = file_get_contents(THEME_DIR_URI . '/app/img/logo.svg');
            } else {
                $wha_logo = '<img src="'.get_theme_mod('wha_logo').'" alt="logo" />';
            }
            $logo = '<a class="uk-navbar-item uk-logo">'.$wha_logo.'</a>';
            $logo_position = get_theme_mod('wha_logo_position', 'left');
            ?>
            <?php if ($nav) : ?>
                <nav id="navbar" class="uk-navbar">
                    <?php
                    if ($logo_position == 'right') {
                        ?>
                        <div class="uk-navbar-left">
                            <?= $nav ?>


                            <a uk-navbar-toggle-icon="" href="#offcanvas-menu" uk-toggle
                               class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon"
                               uk-toggle="target: #offcanvas-push"></a>
                        </div>
                        <div class="uk-navbar-right">
                            <?=$logo; ?>
                        </div>
                        <?php
                    } elseif ($logo_position == 'center') {
                        ?>
                        <div class="uk-navbar-center">

                            <div class="uk-navbar-center-left">
                                <?= $nav ?>
                            </div>
                            <?=$logo?>
                            <div class="uk-navbar-center-right">
                                <?= $navsec ?>
                            </div>
                            <a uk-navbar-toggle-icon="" href="#offcanvas-menu" uk-toggle
                               class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon"
                               uk-toggle="target: #offcanvas-push"></a>

                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="uk-navbar-left">
                            <?=$logo?>
                        </div>
                        <div class="uk-navbar-right">
                            <?= $nav ?>


                            <a uk-navbar-toggle-icon="" href="#offcanvas-menu" uk-toggle
                               class="uk-navbar-toggle uk-hidden@m uk-navbar-toggle-icon uk-icon"
                               uk-toggle="target: #offcanvas-push"></a>
                        </div>
                        <?php
                    }
                    ?>
                </nav>
                <div id="offcanvas-menu" class="uk-offcanvas" uk-offcanvas="mode: <?=get_theme_mod('wha_offcanvas_mode', 'none')?>; overlay: true">
                    <?= $nav_offcanvas ?>
                </div>
            <?php endif; ?>
        </div>
    </header>
    <div class="uk-container">