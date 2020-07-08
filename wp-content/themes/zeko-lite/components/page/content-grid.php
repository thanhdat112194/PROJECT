<?php
/**
 * Template part for displaying page content in grid-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko Lite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="clear">
	<div class="twocolumn">
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>
	</div><!-- .twocolumn -->

	<div class="twocolumn">
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header>
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'zeko-lite' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'zeko-lite' ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>'
			) );
		?>
	</div><!-- .twocolumn -->
	</div><!-- .clear -->
	<footer class="entry-footer">
		<?php zeko_lite_edit_link( get_the_ID() ); ?>
	</footer>
	</div>
</article><!-- #post-## -->
