<?php
/**
 * @package _wha
 */
?>


<?php // Styling Tip!
// Want to wrap for example the post content in blog listings with a thin outline in Bootstrap style?
// Just add the class "panel" to the article tag here that starts below.
// Simply replace post_class() with post_class('panel') and check your site!
// Remember to do this for all content templates you want to have this,
// for example content-single.php for the post single view. ?>

<article class="uk-article" id="post-<?php the_ID(); ?>">

    <?php if ( is_search() || is_archive() ) : // Only display Excerpts for Search and Archive Pages ?>
    <p class="uk-text-lead"><?php the_excerpt(); ?></p>
    <?php else : ?>
    <?php the_content( __( '<div class="uk-grid-small uk-child-width-auto" uk-grid>
        <div>
            <a class="uk-button uk-button-text" href="#">Read more</a>
        </div>
    </div>', '_wha' ) ); ?>
        <?php _wha_link_pages(); ?>
    <?php endif; ?>
</article><!-- #post-## -->