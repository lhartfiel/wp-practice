<?php 
/**
 * Archive pagination
 *
 * @package Starter_Theme
 */
?>
<nav id="nav-below">
    <div class="nav-previous"><?php previous_posts_link( __( 'Previous', 'starter-theme' ) ); ?></div>
    <div class="nav-next"><?php next_posts_link( __( 'Next', 'starter-theme' ) ); ?></div>
</nav><!-- #nav-above -->


<!-- //Alternate navigation with numbers -->
<nav id="nav-below">
    <?php
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'end_size' => 5,
        'prev_text' => __('Previous'),
        'next_text' => __('Next')
    ) );
    ?>
</nav>