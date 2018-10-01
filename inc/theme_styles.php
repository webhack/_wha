<style>
    <?php if (get_theme_mod('wha_header_background_color')) : ?>
    header#header {
        background-color: <?=get_theme_mod('wha_header_background_color')?>;
    }
    <?php endif; ?>
    <?php if (get_theme_mod('wha_menu_link_color')) : ?>
    header .uk-navbar-nav>li>a, .uk-navbar-toggle {
        color: <?=get_theme_mod('wha_menu_link_color')?>;
    }
    <?php endif; ?>
    <?php if (get_theme_mod('wha_menu_link_hover_color')) : ?>
    header .uk-navbar-nav>li>a:hover, .uk-navbar-toggle:hover {
        color: <?=get_theme_mod('wha_menu_link_hover_color')?>;
    }
    <?php endif; ?>
</style>