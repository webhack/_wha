<?php
/**
 * _wha functions and definitions
 *
 * @package _wha
 */

/**
 * Store the theme's directory path and uri in constants
 */
define('THEME_DIR_PATH', get_template_directory());
define('THEME_DIR_URI', get_template_directory_uri());
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 750; /* pixels */
if ( ! function_exists( '_wha_setup' ) ) :
    /**
     * Set up theme defaults and register support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     */
    function _wha_setup() {
        global $cap, $content_width;
        // Add html5 behavior for some theme elements
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();
        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support( 'automatic-feed-links' );
        /**
         * Enable support for Post Thumbnails on posts and pages
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        /**
         * Enable support for Post Formats
         */
        add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on _wha, use a find and replace
         * to change '_wha' to the name of your theme in all the template files
         */
        load_theme_textdomain( '_wha', THEME_DIR_PATH . '/languages' );
    }
endif; // _wha_setup
add_action( 'after_setup_theme', '_wha_setup' );
/**
 * Register widgetized area and update sidebar with default widgets
 */
function _wha_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', '_wha' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', '_wha_widgets_init' );
/**
 * Enqueue scripts and styles
 */
function _wha_scripts() {
    // load _wha styles
    wp_enqueue_style( '_wha-style', get_stylesheet_uri() );
    wp_enqueue_style( '_wha-main-styles', THEME_DIR_URI . '/app/css/main.min.css', false, '1.0.0' );
}
add_action( 'wp_enqueue_scripts', '_wha_scripts' );





if ( ! function_exists( '_wha_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function _wha_posted_on() {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );
        $time_string = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            $time_string
        );
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ){
            $time_string_update = '<time class="updated" datetime="%1$s">%2$s</time>';
            $time_string_update = sprintf( $time_string_update,
                esc_attr( get_the_modified_date( 'c' ) ),
                esc_html( get_the_modified_date() )
            );
            $time_string_update = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
                esc_url( get_permalink() ),
                esc_attr( get_the_time() ),
                $time_string_update
            );
            $time_string .= __(', updated on ', '_wha') . $time_string_update;
        }
        printf( __( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', '_wha' ),
            $time_string,
            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_attr( sprintf( __( 'View all posts by %s', '_wha' ), get_the_author() ) ),
                esc_html( get_the_author() )
            )
        );
    }
endif;


/**
 * _wha_link_pages()
 * Creates bootstraped pagination for paginated posts
 *
 */
function _wha_link_pages() {
    global $numpages, $page, $post;
    if (1 != $numpages):
        $input_width = strlen((string)$numpages) + 3;
        ?>
        <div class="text-center">
            <nav>
                <ul class="pagination">
                    <li class="disabled hidden-xs">
                <span>
                    <span aria-hidden="true"><?php _e('Page', '_wha'); ?> <?php echo $page; ?> <?php _e('of', '_wha'); ?> <?php echo $numpages; ?></span>
                </span>
                    </li>
                    <li><?php echo _wha_link_page(1, 'First'); ?>&laquo;<span class="hidden-xs"> <?php _e('First', '_wha'); ?></span></a></li>
                    <?php if ($page == 1): ?>
                        <li class="disabled"><span>&lsaquo;<span class="hidden-xs aria-hidden"> <?php _e('Previous', '_wha'); ?></span></span></li>
                    <?php else: ?>
                        <li><?php echo _wha_link_page($page - 1, 'Previous'); ?>&lsaquo;<span class="hidden-xs"> <?php _e('Previous', '_wha'); ?></span></a></li>
                    <?php endif; ?>

                    <?php $start_page = min(max($page - 2, 1), max($numpages - 4, 1)); ?>
                    <?php $end_page   = min(max($page + 2, 5), $numpages); ?>

                    <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                        <?php if ($page == $i): ?>
                            <li class="active">
                                <span><?php echo $i; ?><span class="sr-only">(current)</span></span>
                            </li>
                        <?php else: ?>
                            <li><?php echo _wha_link_page($i) . $i . '</a>'; ?></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page == $numpages): ?>
                        <li class="disabled"><span><span class="hidden-xs aria-hidden"><?php _e('Next', '_wha'); ?> </span>&rsaquo;</span></li>
                    <?php else: ?>
                        <li><?php echo _wha_link_page($page + 1, 'Next'); ?><span class="hidden-xs"><?php _e('Next', '_wha'); ?> </span>&rsaquo;</a></li>
                    <?php endif; ?>
                    <li><?php echo _wha_link_page($numpages, 'Last'); ?><span class="hidden-xs"><?php _e('Last', '_wha'); ?> </span>&raquo;</a></li>
                    <li>
                        <form action="<?php echo get_permalink($post->ID); ?>" method="get" class="tk-page-nav" id="tk-paging-<?php echo $post->ID; ?>">
                            <div class="input-group">
                                <input oninput="if(!jQuery(this)[0].checkValidity()) {jQuery('#tk-paging-<?php echo $post->ID; ?>').find(':submit').click();};" type="number" name="page" min="1" max="<?php echo $numpages; ?>" value="<?php echo $page; ?>" class="form-control text-right" style="width: <?php echo $input_width; ?>em;">
                                <span class="input-group-btn">
                            <input type="submit" value="<?php _e('Go to', '_wha'); ?>" class="btn btn-success">
                        </span>
                            </div>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <?php
    endif;
}


/**
 * Adds WooCommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
