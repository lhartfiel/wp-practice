<?php
/**
 * Content Module
 * Includes main content for pages and posts
 *
 * @package My Theme
 */ 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
      <h1 class="entry-title"><?php the_title(); ?></h1>
  </header><!-- .entry-header -->

  <div class="entry-content">

      <?php the_content(); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'themeTextDomain' ) . '</span>', 'after' => '</div>' ) ); ?>

      <?php get_template_part('custom_modules/button') ?>
      
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->