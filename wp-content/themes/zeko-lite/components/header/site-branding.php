<div class="site-branding">
	<div class="wrap">

		<?php zeko_lite_the_custom_logo(); ?>

		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>

		<?php $zeko_lite_description = get_bloginfo( 'description', 'display' );
			if ( $zeko_lite_description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html( $zeko_lite_description ); /* WPCS: xss ok. */ ?></p>
		<?php endif; ?>

	</div><!-- .wrap -->
</div><!-- .site-branding -->
