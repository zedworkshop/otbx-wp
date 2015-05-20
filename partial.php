<?php
/**
 * The template part for displaying results in lists
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article class="[ clearfix full-width mb3 ] [ sm-flex flex-end ] preview">
	<div class="[ sm-col sm-col-6 lg-col-5 ] [  ]">
		<?php twentyfifteen_post_thumbnail(); ?>
	</div>

	<div class="[ sm-col sm-col-6 lg-col-5 px2 ] preview-content">
		<?php
		ntt_simple_entry_meta();
		the_title( sprintf( '<h3 class="[ mt0 regular serif ] entry-title"><a class="dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		?>

		<?php
		echo sprintf( '<a class="[ xsmall bold caps ]" href="%s" rel="bookmark">Read article &raquo;</a>',
				esc_url( get_permalink() )
			);
		?>
	</div>
</article>