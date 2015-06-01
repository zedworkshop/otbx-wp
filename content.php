<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="[ clearfix mb2 ] entry-header">
		<div class="[ lg-col-right mb2 ] entry-header-date">
			<?php twentyfifteen_entry_meta(); ?>
			<?php ntt_category_meta(); ?>
		</div>

		<div class="[ lg-col lg-col-8 ] entry-header-title">
			<?php
			the_title( '<h1 class="[ mt0 mb2 ] entry-title">', '</h1>' );
			?>
		</div>
	</header><!-- .entry-header -->

	<div class="[ clearfix ] entry-content">

		<?php
			// Post thumbnail.
			twentyfifteen_post_thumbnail();
		?>

		<div class="[ xl-col xl-col-8 ] mb4">

			<div class="[ table mb3 ]">
				<div class="[ inline-block middle mr1 ]">
				<?php
	   			echo get_avatar( get_the_author_meta('user_email'), $size = '60' );
	   			?>
	   			</div>
				<div class="[ inline-block middle bold ]">
					<span class="[ block xsmall gray caps regular ]">Written by</span>
					<?php the_author(); ?>
				</div>
			</div>

			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'twentyfifteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>

			<footer class="[ full-width ] entry-footer">
				<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->

		</div>

		<div class="[ xl-col-right xl-col-3 ]">

		</div>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

</article><!-- #post-## -->
