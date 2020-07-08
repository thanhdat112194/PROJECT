<?php
/**
 * Template Name: Full Width Template
 *
 * The template for displaying full width content.
 *
 * @package Zeko Lite
 */

get_header(); ?>

<div class="top-featured-image">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail(); ?>
	<?php endif; ?>
</div><!-- .top-featured-image -->

<div class="wrap">
	<div class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'components/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main>
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
