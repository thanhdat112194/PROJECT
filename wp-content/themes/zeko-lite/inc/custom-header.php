<?php
/**
 * Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package Zeko Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses zeko_lite_header_style()
 */
function zeko_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'zeko_lite_custom_header_args', array(
		'default-text-color'     => '1b1f22',
		'width'                  => 2600,
		'height'                 => 900,
		'flex-height'            => true,
		'wp-head-callback'       => 'zeko_lite_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'zeko_lite_custom_header_setup' );

if ( ! function_exists( 'zeko_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see zeko_lite_custom_header_setup().
 */
function zeko_lite_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
 		return;
 	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // zeko_lite_header_style
