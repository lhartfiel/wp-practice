<?php
/**
 * Main Template File
 * 
 * This file is used to display a page when nothing more specific matches a query.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mytheme
 */

?>

<?php get_header(); ?>

<section id="primary" role="main">

<?php if( have_posts() ) { ?>

	<?php while( have_posts() ) { //start the loop
		the_post() ?>

	 	 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <h1><?php the_title(); ?></h1>
        </header><!-- .entry-header -->
        <?php the_content(); ?>
      </article>
   <?php } ?>   <!--  endwhile -->

  <nav id="nav-below">
    <div class="nav-previous"><?php next_posts_link( __( "Older posts", "mytheme" ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( "Newer posts", "mytheme" ) ); ?></div>
  </nav><!-- #nav-below -->

<?php } else { ?>

	<article id="post-0" class="hentry post no-results not-found">
    <header class="entry-header">
        <h1><?php _e( "Oops!", "mytheme" ); ?></h1>

    </header><!-- .entry-header -->
  
    <p><?php _e( "We can&#039;t find content for this page!", "mytheme" ); ?></p>
  </article><!-- #post-0 -->
<?php } ?> <!-- end else -->

</section>	


<?php get_footer(); ?>	