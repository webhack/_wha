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

<footer class="uk-background-secondary uk-padding uk-padding-remove-left uk-padding-remove-right uk-panel">
    <div class="uk-container">
        <div class="uk-grid uk-child-width-expand@s uk-light" uk-grid>
            <div>
                <h3 class="uk-title">Title</h3>
                <p class="uk-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <button class="uk-button uk-button-primary">Read More</button>

                <h3 class="uk-title">Menu</h3>
                <ul class="uk-nav uk-nav-default">
                    <li class="uk-active"><a href="#">Active</a></li>
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                </ul>
            </div>
            <div class="uk-light">
                <h3 class="uk-title">Contact Us</h3>
                <?php echo do_shortcode('[contact-form-7 id="22" title="Contact form 1"]'); ?>
                <?php
                /*
                 * Contact Form 7
                 * <div class="uk-margin" uk-margin>[email* your-email class:uk-input placeholder "Yor Email"] </div>
                 * <div class="uk-margin" uk-margin>[textarea your-message class:uk-textarea class:uk-input placeholder "Your Message"] </div>
                 * <div class="uk-margin" uk-margin>[submit class:uk-button class:uk-button-primary "Send"]</div>
                 */
                ?>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>

</body>
</html>