<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _wha
 */
?>
</div> <!--End container-->
</section>

<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
<footer class="uk-background-secondary uk-padding uk-padding-remove-left uk-padding-remove-right uk-panel uk-background-secondary">
    <div class="uk-container">
        <div class="uk-child-width-expand@s uk-light" uk-grid>
            <?php dynamic_sidebar( 'sidebar-footer' );?>
        </div>
    </div>
</footer>
<?php endif; ?>
<section id="bottom-section" class="uk-section uk-margin-remove uk-section-xsmall uk-text-small uk-text-muted border-top uk-background-muted">
    <div class="uk-container">
        <div class="uk-child-width-1-2@m uk-text-center" uk-grid>
            <div class="uk-text-right@m">
                <?php if (get_theme_mod('wha_social_fb')) : ?><a target="_blank" href="<?=get_theme_mod('wha_social_fb')?>" class="uk-icon-link uk-margin-small-right" uk-icon="icon: facebook"></a><?php endif; ?>
                <?php if (get_theme_mod('wha_social_google')) : ?><a target="_blank" href="<?=get_theme_mod('wha_social_google')?>" class="uk-icon-link uk-margin-small-right" uk-icon="icon: google"></a><?php endif; ?>
                <?php if (get_theme_mod('wha_social_vimeo')) : ?><a target="_blank" href="<?=get_theme_mod('wha_social_vimeo')?>" class="uk-icon-link uk-margin-small-right" uk-icon="icon: vimeo"></a><?php endif; ?>
                <?php if (get_theme_mod('wha_social_instagram')) : ?><a target="_blank" href="<?=get_theme_mod('wha_social_instagram')?>" class="uk-icon-link uk-margin-small-right" uk-icon="icon: instagram"></a><?php endif; ?>
                <?php if (get_theme_mod('wha_social_twitter')) : ?><a target="_blank" href="<?=get_theme_mod('wha_social_twitter')?>" class="uk-icon-link uk-margin-small-right" uk-icon="icon: twitter"></a><?php endif; ?>
                <?php if (get_theme_mod('wha_social_youtube')) : ?><a target="_blank" href="<?=get_theme_mod('wha_social_youtube')?>" class="uk-icon-link uk-margin-small-right" uk-icon="icon: youtube"></a><?php endif; ?>
            </div>
            <div class="uk-flex-first@m uk-text-left@m">
                <p class="uk-text-small">&copy; Copyright <?=date('Y')?> <a href="http://webhelpagency.com/">Powered by WHA</a></p>
            </div>
        </div>
    </div>
</section>
</div>
<?php wp_footer(); ?>

</body>
</html>