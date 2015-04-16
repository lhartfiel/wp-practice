<?php
/**
 * The footer template
 *
 * Contains the closing of <div id="main"> and all content after.
 *
 * @package mytheme
 */
?>


		</div><!-- #main -->

	</div><!-- #page -->

	<footer id="colophon" role="contentinfo">
	
		<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>

	    <div id="copyright">
	        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p><br>
	        <a href="http://yoursite.com" rel="nofollow">theme by YOU!</a>
	    </div>
	</footer><!-- #colophon -->

	<?php wp_footer(); ?> 

</body>
</html>