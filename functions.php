<?php
/**
 * The functions template
 *
 * Sets up the theme and provides some helper functions including 
 * custom template tags, actions and filter hooks to change core functionality.
 *
 * @package mytheme
 */
?>

<?php  

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if( ! isset( $content_width ) ) {
	$content_width = 600;
}

if ( ! function_exists( 'mytheme_setup' ) ) {
    function mytheme_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
      add_theme_support( 'automatic-feed-links' );

      // Enable support for Post Thumbnails on posts and pages
      //add_theme_support( 'post-thumbnails' );

      // Enable support for Post Formats.
      add_theme_support( 'post-formats', array( 
          'aside',
          'image',
          'video',
          'quote',
          'link'
      ) );

      // Enable support for HTML5 markup.
      add_theme_support( 'html5', array(
          'comment-list',
          'search-form',
          'comment-form',
          'gallery',
      ) );

      // Enable support for editable menus via Appearance > Menus
      register_nav_menus( array(
          'primary' => __( 'Primary Menu', 'mytheme' ),
          'footer' => __( 'Footer Menu', 'mytheme')
      ) );

      // Add custom image sizes
      // add_image_size( 'name', 500, 300, true );

    }
} // endif mytheme_setup

add_action( 'after_setup_theme', 'mytheme_setup' );


/**
 * Register sidebars and widgetized areas
 */
function mytheme_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'mytheme' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'mytheme_widgets_init' );

?>