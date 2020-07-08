<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zeko Lite
 */

get_header(); ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

			<?php // Show the selected frontpage content
				if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'components/page/content', 'front-page' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
