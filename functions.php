<?php
/**
 * The functions template
 *
 * Sets up the theme and provides some helper functions including 
 * custom template tags, actions and filter hooks to change core functionality. These are only applied once a theme is activated. For more global use, plugins should be used.
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


/* ENQUEUE SCRIPTS & STYLES
 ========================== */
function mytheme_scripts() {
    // theme style.css file
    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() );

    // threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // vendor scripts
//  wp_enqueue_script(
//      'vendor',
//      get_template_directory_uri() . '/assets/vendor/newscript.js',
//      array('jquery')
//  );
    // theme scripts
//  wp_enqueue_script(
//      'theme-init',
//      get_template_directory_uri() . '/assets/theme.js',
//      array('jquery')
//  );
}    
add_action('wp_enqueue_scripts', 'starter_theme_scripts');


// Add TinyMCE buttons that are disabled by default
//function themeFunction_mce_buttons_2($buttons) {  
//  /**
//   * Add in a core button that's disabled by default
//   */
//  $buttons[] = 'justify'; // fully justify text
//  $buttons[] = 'hr'; // insert HR
//
//  return $buttons;
//}
//add_filter('mce_buttons_2', 'themeFunction_mce_buttons_2');
