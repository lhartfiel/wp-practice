<?php
/**
 * Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions including 
 * custom template tags, actions and filter hooks to change core functionality.
 *
 *
 * @package My Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 600;
}; //endif


function starter_theme_setup() {
  // Make theme available for translation.
      // Translations can be filed in the /languages/ directory.
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
      ) );

      // Add custom image sizes
      // add_image_size( 'name', 500, 300, true );
}

add_action( 'after_setup_theme', 'starter_theme_setup' );


// Enable support for editable menus via Appearance > Menus
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'mytheme' ),
    // 'footer' => __( 'Footer Menu', 'starter-theme' ),
) );

/**
 * Register sidebars and widgetized areas
 */
function starter_theme_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'mytheme' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'starter_theme_widgets_init' );

/* ENQUEUE SCRIPTS & STYLES
 ========================== */
function starter_theme_scripts() {
    // theme style.css file
    wp_enqueue_style( 'starter-theme-style', get_stylesheet_uri() );

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

//this sets the posts per page based of ALL archive pages
// function starter_theme_custom_query( $query ) {
//     if ( is_archive() && !is_admin() ) {
//          $query->set( 'posts_per_page', 18 );
//     }
//     return $query;
// }
// add_filter( 'pre_get_posts', 'starter_theme_custom_query' );


//this orders the query by title and returns results in ascending order
// function starter_theme_custom_query( $query ) {
//     if ( is_category( 'Locations' ) && !is_admin() ) {
//          $query->set( 'orderby', 'title' );
//          $query->set( 'order', 'ASC' );
//     }
//     return $query;
// }
// add_filter( 'pre_get_posts', 'starter_theme_custom_query' );


//function for comments
if ( ! function_exists( 'starter_theme_comment' ) ) :

function starter_theme_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'starter-theme' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'starter-theme' ), '<span class="edit-link">', '</span>' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <header class="comment-meta">
                <div class="comment-author vcard">
                    <?php
                        $avatar_size = 35;
                        echo get_avatar( $comment, $avatar_size );

                        /* translators: 1: comment author, 2: date and time */
                        printf( __( '%1$s %2$s', 'starter-theme' ),
                            sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
                            sprintf( '<time pubdate datetime="%2$s">%3$s</time>',
                                esc_url( get_comment_link( $comment->comment_ID ) ),
                                get_comment_time( 'c' ),
                                /* translators: 1: date, 2: time */
                                sprintf( __( '%1$s at %2$s', 'starter-theme' ), get_comment_date(), get_comment_time() )
                            )
                        );
                    ?>

                </div><!-- .comment-author .vcard -->

                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'starter-theme' ); ?></em>
                    <br />
                <?php endif; ?>
            </header>

            <div class="comment-content"><?php comment_text(); ?></div>

            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'starter-theme' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </article><!-- #comment-## -->

    <?php
            break;
    endswitch;

}
endif; // ends check for starter_theme_comment()


function starter_theme_custom_query( $query ) {
    if ( is_archive() && !is_admin() ) {
         $query->set('posts_per_page', 12);
         // $query->set( 'nopaging', true ); //no pagination is shown
         // $query->set('posts_per_archive_page', 4); //override specific to is_archive() and is_search() displays
    }
    return $query;
}
add_filter( 'pre_get_posts', 'starter_theme_custom_query' );
