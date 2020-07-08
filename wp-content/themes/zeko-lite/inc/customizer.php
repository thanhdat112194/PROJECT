<?php
/**
 * Zeko Theme Customizer.
 *
 * @package Zeko Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zeko_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Add the Theme Options section
	 */

	
	//Hero Options
	$wp_customize->add_section( 'zeko_lite_hero_options', array(
		'title'    => esc_html__( 'Front Page Hero Image', 'zeko-lite' ),
		'active_callback' => 'is_front_page',
		'description'       => esc_html__( 'Hero image is featured image of the page you select to be your front page. Caption text is text added to the editor of that same page.', 'zeko-lite' ),
	) );
	
	$wp_customize->add_setting( 'zeko_lite_hero_hide', array(
		'default'           => false,
		'sanitize_callback' => 'zeko_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control('zeko_lite_hero_hide', array(
				'label'      => esc_html__( 'Hide Hero Image & Caption', 'zeko-lite' ),
				'section'    => 'zeko_lite_hero_options',
				'type'		 => 'checkbox',
				'priority'	 => 1
	) );
	
	$wp_customize->add_setting( 'zeko_lite_overlay', array(
		'default'           => '0.7',
		'sanitize_callback' => 'zeko_lite_sanitize_overlay',
	) );

	$wp_customize->add_control( 'zeko_lite_overlay', array(
		'label'   => esc_html__( 'Hero Image Opacity', 'zeko-lite' ),
		'section' => 'zeko_lite_hero_options',
		'type'    => 'select',
		'priority'          => 2,
		'choices' => array(
						'0.0' => '0%',
						'0.1' => '10%',
						'0.2' => '20%',
						'0.3' => '30%',
						'0.4' => '40%',
						'0.5' => '50%',
						'0.6' => '60%',
						'0.7' => '70%',
						'0.8' => '80%',
						'0.9' => '90%',
						'1.0' => '100%',
					),
	) );

		/**
	* Adds the individual sections for copyright
	*/
	$wp_customize->add_section( 'zeko_lite_copyright_section' , array(
		'title'    => esc_html__( 'Copyright Settings', 'zeko-lite' ),
	) );

	$wp_customize->add_setting( 'zeko_lite_copyright', array(
		'default'           => esc_html__( 'Proudly powered by WordPress. Built with Zeko Lite WordPress Theme', 'zeko-lite' ),
		'sanitize_callback' => 'zeko_lite_sanitize_text',
	) );
	$wp_customize->add_control( 'zeko_lite_copyright', array(
		'label'             => esc_html__( 'Copyright text', 'zeko-lite' ),
		'section'           => 'zeko_lite_copyright_section',
		'settings'          => 'zeko_lite_copyright',
		'type'		        => 'text',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'hide_copyright', array(
		'sanitize_callback' => 'zeko_lite_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'hide_copyright', array(
		'label'             => esc_html__( 'Hide copyright text', 'zeko-lite' ),
		'section'           => 'zeko_lite_copyright_section',
		'settings'          => 'hide_copyright',
		'type'		        => 'checkbox',
		'priority'          => 2,
	) );

/***** Register Custom Controls *****/

	class Zeko_Lite_Upgrade extends WP_Customize_Control {
		public function render_content() {  ?>
			<p class="zeko-lite-upgrade-thumb">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" />
			</p>
			<p class="customize-control-title zeko-upgrade-title">
				<?php esc_html_e('Zeko Pro', 'zeko-lite'); ?>
			</p>
			<p class="textfield zeko-upgrade-text">
				<?php esc_html_e('Full version of this theme includes additional features; many additional page templates, additional front page panels, different blog options, different header options, different theme options, search bar, WooCommerce, Give, The Events Calendar, PeepSo support, color options & premium theme support.', 'zeko-lite'); ?>
			</p>
			<p class="customize-control-title zeko-upgrade-title">
				<?php esc_html_e('Additional Features:', 'zeko-lite'); ?>
			</p>
			<ul class="zeko-upgrade-features">
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('Additional Page Templates', 'zeko-lite'); ?>
				</li>
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('Several additional front page featured areas - panels', 'zeko-lite'); ?>
				</li>
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('Front Page widgetized area for the slider', 'zeko-lite'); ?>
				</li>
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('Different Blog Options & Layouts', 'zeko-lite'); ?>
				</li>
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('Different Header Options', 'zeko-lite'); ?>
				</li>
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('Different Theme Options', 'zeko-lite'); ?>
				</li>
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('WooCommerce, Give, PeepSo & The Events Calendar Support', 'zeko-lite'); ?>
				</li>
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('Color Options', 'zeko-lite'); ?>
				</li>
				<li class="zeko-upgrade-feature-item">
					<?php esc_html_e('Premium Theme Support', 'zeko-lite'); ?>
				</li>
			</ul>
			<p class="zeko-upgrade-button">
				<a href="<?php echo esc_url('https://www.anarieldesign.com/themes/nonprofit-wordpress-theme/'); ?>" target="_blank" class="button button-secondary">
					<?php esc_html_e('Read more about Zeko', 'zeko-lite'); ?>
				</a>
			</p><?php
		}
	}

	/***** Add Sections *****/

	$wp_customize->add_section('zeko_lite_upgrade', array(
		'title' => esc_html__('Theme Info', 'zeko-lite'),
		'priority' => 600
	) );

	/***** Add Settings *****/

	$wp_customize->add_setting('zeko_lite_options[premium_version_upgrade]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	) );

	/***** Add Controls *****/

	$wp_customize->add_control(new Zeko_Lite_Upgrade($wp_customize, 'premium_version_upgrade', array(
		'section' => 'zeko_lite_upgrade',
		'settings' => 'zeko_lite_options[premium_version_upgrade]',
		'priority' => 1
	) ) );
}
add_action( 'customize_register', 'zeko_lite_customize_register' );


/**
 * Sanitize a numeric value
 */
function zeko_lite_sanitize_numeric_value( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	} else {
		return 0;
	}
}

//Checkboxes
function zeko_lite_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Text
function zeko_lite_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

//Radio Buttons and Select Lists
function zeko_lite_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}
/*
 * Output our custom CSS to change background colour/opacity of panels.
 * Note: not very pretty, but it works.
 */
function zeko_lite_customizer_css( $control ) {
	if ( get_theme_mod( 'zeko_lite_overlay' ) ) :
		?>
			<style type="text/css">
			.overlay-bg {
				opacity: <?php echo esc_attr( get_theme_mod( 'zeko_lite_overlay' ) ); ?>;
			}
			</style>
		<?php
	endif;
}
add_action( 'wp_head', 'zeko_lite_customizer_css' );

/* Sanitize overlay setting */
function zeko_lite_sanitize_overlay( $input ) {

	$choices = array(
					'0.0',
					'0.1',
					'0.2',
					'0.3',
					'0.4',
					'0.5',
					'0.6',
					'0.7',
					'0.8',
					'0.9',
					'1.0',
				);

	if ( ! in_array( $input, $choices ) ) {
		$input = '0.0';
	}

	return $input;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zeko_lite_customize_preview_js() {
	wp_enqueue_script( 'zeko_lite_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'zeko_lite_customize_preview_js' );

/**
 * Some extra JavaScript to improve the user experience in the Customizer for this theme.
 */
function zeko_lite_panels_js() {
	wp_enqueue_script( 'zeko_lite_extra_js', get_template_directory_uri() . '/assets/js/panel-customizer.js', array(), '20151116', true );
}
add_action( 'customize_controls_enqueue_scripts', 'zeko_lite_panels_js' );
