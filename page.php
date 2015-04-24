<?php
/**
 * The Page template
 *
 * This is the template that displays all pages by default.
 *
 * @package My Theme
 */

get_header(); ?>

<?php  //define variables
$button = get_field('button');
$button_url = get_field('button_link');
?>

<section id="primary" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
    
      <?php get_template_part('custom_modules/content') ?>

    <?php endwhile; // end of the loop. ?>

</section><!-- #primary -->

<?php get_footer(); ?>