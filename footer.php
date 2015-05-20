<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

			<footer id="colophon" class="[ content mt4 py4 right-align ] site-footer" role="contentinfo">
				<div class="site-info">
					<p class="[ xsmall gray mb0 ]">Copyright &copy; <?php echo date('Y'); ?> Old Town Beer Exchange</p>
					<p class="[ xsmall gray mb0 ]">Built by <a class="gray" href="http://zedworkshop.com/" target="_blank">Zed Workshop</a></p>
					<?php
						/**
						 * Fires before the Twenty Fifteen footer text for footer customization.
						 *
						 * @since Twenty Fifteen 1.0
						 */
						do_action( 'twentyfifteen_credits' );
					?>
				</div><!-- .site-info -->
			</footer><!-- .site-footer -->

			<?php wp_footer(); ?>

		</main><!-- .main -->

	</div><!-- .wrapper -->


</body>
</html>
