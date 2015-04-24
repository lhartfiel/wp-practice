<?php
/**
 * Single post template
 *
 * @package StarterTheme
 */

get_header(); ?>

<section id="primary">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h1>
                <span class="entry-date"><?php echo get_the_date(); ?></span>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'starter-theme' ) . '</span>', 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->

            <footer class="entry-meta">

                <?php the_tags( '<div class="post-tags">' . __( 'Tagged: ', 'starter-theme' ) , ', ', '</div>' ); ?>

                <div class="comments-link">
                    <?php comments_popup_link( 
                         __( 'Leave a comment', 'starter-theme' ), 
                         __( '1 comment', 'starter-theme' ), 
                         __( '% comments', 'starter-theme' ) ); 
                    ?>
                </div>
            </footer><!-- #entry-meta -->
        </article><!-- #post-<?php the_ID(); ?> -->

        <?php comments_template( '', true ); ?>

        <!-- You could also put some between-post links here (next post, previous post) -->

    <?php endwhile; // end of the loop. ?>

</section><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>