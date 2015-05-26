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

			<footer id="colophon" class="[ mt4 py4 center relative z4 ] site-footer" role="contentinfo">
				<div class="[ mb2 ] site-info">
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

				<?php if( !is_front_page()) : ?>
				<div class="mb2">
					<div class="fb-like" data-href="http://otbxhsv.com" data-layout="button_count" data-action="recommend" data-show-faces="false" data-share="true"></div>
				</div>
				<div>
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://otbxhsv.com" data-via="otbxhsv">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				</div>
				<?php endif; ?>
			</footer><!-- .site-footer -->


		</main><!-- .main -->

	</div><!-- .wrapper -->

	<?php wp_footer(); ?>

	<script>
  		var el = document.getElementById('bg-home');
  		if(el) {
			imagesLoaded( el, function( instance ) {
  				var main = document.getElementById('main');
				main.className += main.className ? ' show-bg' : 'show-bg';
			});
		}
	</script>

</body>
</html>
