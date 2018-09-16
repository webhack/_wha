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
    <?php the_content(); ?>
</article><!-- #post-## -->