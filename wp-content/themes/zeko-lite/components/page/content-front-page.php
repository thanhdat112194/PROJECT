<article id="post-<?php the_ID(); ?>">
	<?php if ( !get_theme_mod( 'zeko_lite_hero_hide' )): ?>
	<div class="front-page-content-area">
		<?php
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			$zeko_lite_page_image = $thumb['0'];
		?>
		<div id="hero" class="hero" style="background-image: url(<?php echo esc_url( $zeko_lite_page_image ); ?>);">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'zeko-lite-hero-thumbnail' ); ?>
			<?php endif; ?>
			<div class="wrap hero-container-outer">
			<div class="hero-container-inner">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php zeko_lite_edit_link( get_the_ID() ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
			</div>
		</div>
			<span class="overlay-bg"></span>
		</div>

	</div><!-- .front-page-content-area -->
	<?php endif; ?>
	<?php
		$zeko_lite_child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 5,
			'no_found_rows'  => true,
		) );
	?>
	<?php if ( $zeko_lite_child_pages->have_posts() ) :?>
		<div class="wrap front-child-page">
			<?php while ( $zeko_lite_child_pages->have_posts() ) : $zeko_lite_child_pages->the_post();
				get_template_part( 'components/page/content', 'grid' );
			endwhile;
			wp_reset_postdata();?>
		</div><!-- .child-pages -->
	<?php endif;?>
</article><!-- #post-## -->
