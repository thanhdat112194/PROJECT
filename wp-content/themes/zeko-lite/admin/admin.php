<?php

if (!defined('ABSPATH')) {
	exit;
}

/***** Welcome Notice in WordPress Dashboard *****/

if (!function_exists('zeko_lite_admin_notice')) {
	function zeko_lite_admin_notice() {
		global $pagenow, $zeko_lite_version;
		if (current_user_can('edit_theme_options') && 'index.php' === $pagenow && !get_option('zeko_lite_notice_welcome') || current_user_can('edit_theme_options') && 'themes.php' === $pagenow && isset($_GET['activated']) && !get_option('zeko_lite_notice_welcome')) {
			wp_enqueue_style('zeko-lite-admin-notice', get_template_directory_uri() . '/admin/admin-notice.css', array(), $zeko_lite_version);
			zeko_lite_welcome_notice();
		}
	}
}
add_action('admin_notices', 'zeko_lite_admin_notice');

/***** Hide Welcome Notice in WordPress Dashboard *****/

if (!function_exists('zeko_lite_hide_notice')) {
	function zeko_lite_hide_notice() {
		if (isset($_GET['zeko-lite-hide-notice']) && isset($_GET['_zeko_lite_notice_nonce'])) {
			if (!wp_verify_nonce($_GET['_zeko_lite_notice_nonce'], 'zeko_lite_hide_notices_nonce')) {
				wp_die(esc_html__('Action failed. Please refresh the page and retry.', 'zeko-lite'));
			}
			if (!current_user_can('edit_theme_options')) {
				wp_die(esc_html__('You do not have the necessary permission to perform this action.', 'zeko-lite'));
			}
			$hide_notice = sanitize_text_field($_GET['zeko-lite-hide-notice']);
			update_option('zeko_lite_notice_' . $hide_notice, 1);
		}
	}
}
add_action('wp_loaded', 'zeko_lite_hide_notice');

/***** Content of Welcome Notice in WordPress Dashboard *****/

if (!function_exists('zeko_lite_welcome_notice')) {
	function zeko_lite_welcome_notice() {
		global $zeko_lite_data; ?>
		<div class="notice notice-success zeko-welcome-notice">
			<a class="notice-dismiss zeko-welcome-notice-hide" href="<?php echo esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('zeko-lite-hide-notice', 'welcome')), 'zeko_lite_hide_notices_nonce', '_zeko_lite_notice_nonce')); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__('Dismiss this notice.', 'zeko-lite'); ?>
				</span>
			</a>
			<p><?php printf(esc_html__('Thanks for choosing Zeko Lite! To get started please make sure you visit our %2$swelcome page%3$s.', 'zeko-lite'), $zeko_lite_data['Name'], '<a href="' . esc_url(admin_url('themes.php?page=charity')) . '">', '</a>'); ?></p>
			<p class="zeko-welcome-notice-button">
				<a class="button" href="<?php echo esc_url(admin_url('themes.php?page=charity')); ?>">
					<?php printf(esc_html__('Get Started with Zeko Lite', 'zeko-lite'), $zeko_lite_data['Name']); ?>
				</a>
			</p>
		</div><?php
	}
}

/***** Theme Info Page *****/

if (!function_exists('zeko_lite_theme_info_page')) {
	function zeko_lite_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Zeko Lite', 'zeko-lite'), esc_html__('Theme Info', 'zeko-lite'), 'edit_theme_options', 'charity', 'zeko_lite_display_theme_page');
	}
}
add_action('admin_menu', 'zeko_lite_theme_info_page');

if (!function_exists('zeko_lite_display_theme_page')) {
	function zeko_lite_display_theme_page() {
		global $zeko_lite_data; ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to Zeko Lite', 'zeko-lite')); ?>
			</h1>
			<div class="zeko-row theme-intro clearfix">
				<div class="zeko-col-1-4">
					<img class="theme-screenshot" src="<?php echo esc_url(get_template_directory_uri() ); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'zeko-lite'); ?>" />
				</div>
				<div class="zeko-col-3-4 theme-description">
					<p class="about">
						<?php printf(esc_html__('Zeko is a wonderfully designed, clean and responsive charity WordPress theme. This theme is dedicated to raising awareness that animals are sentient beings and should be treated as such. This is often not the case and we still witness a huge amount of unneeded cruelty towards our fellow earthlings. They deserve better.', 'zeko-lite')); ?>
					</p>
				</div>
			</div>

			<hr>
			<div class="theme-links clearfix">
				<p>
					<strong><?php esc_html_e('Important Links:', 'zeko-lite'); ?></strong>
					<a href="<?php echo esc_url('http://www.anarieldesign.com/free-non-profit-wordpress-theme/'); ?>">
						<?php esc_html_e('Theme Info Page', 'zeko-lite'); ?>
					</a>
					<a href="<?php echo esc_url('http://www.anarieldesign.com/showcase/'); ?>">
						<?php esc_html_e('Anariel Design Themes Showcase', 'zeko-lite'); ?>
					</a>
				</p>
			</div>
			<hr>
			<div id="getting-started" class="bg">
				<h3>
					<?php printf(esc_html__('Get Started with %s', 'zeko-lite'), $zeko_lite_data['Name']); ?>
				</h3>
				<div class="zeko-row clearfix">
					<div class="zeko-col-1-2">
						<div class="section">
							<h4>
								<span class="dashicons dashicons-welcome-learn-more"></span>
								<?php esc_html_e('Theme Documentation', 'zeko-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Please check the documentation to get better overview of how the theme is structured.', 'zeko-lite'), $zeko_lite_data['Name']); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/zeko-lite/'); ?>" class="button button-secondary">
									<?php esc_html_e('Theme Documentation', 'zeko-lite'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<span class="dashicons dashicons-admin-appearance"></span>
								<?php esc_html_e('Theme Options', 'zeko-lite'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Click "Customize" to open the Customizer.',  'zeko-lite'), $zeko_lite_data['Name']); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary">
									<?php esc_html_e('Customize Theme', 'zeko-lite'); ?>
								</a>
							</p>
						</div>
					</div>
					<div class="zeko-col-1-2">
						<div class="section">
							<h4>
								<span class="dashicons dashicons-cart"></span>
								<?php esc_html_e('Zeko Pro', 'zeko-lite'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('Full version of this theme includes additional features; many additional page templates, additional front page panels, different blog options, different header options, different theme options, search bar, WooCommerce, Give, The Events Calendar, PeepSo support, color options & premium theme support.', 'zeko-lite'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('https://www.anarieldesign.com/themes/nonprofit-wordpress-theme/'); ?>" class="button button-primary">
									<?php esc_html_e('Upgrade to Zeko Pro', 'zeko-lite'); ?>
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="theme-comparison">
				<h3 class="theme-comparison-intro">
					<?php esc_html_e('Upgrade to Zeko Pro for more awesome features:', 'zeko-lite'); ?>
				</h3>
				<table>
					<thead class="theme-comparison-header">
						<tr>
							<th class="table-feature-title"><h3><?php esc_html_e('Features', 'zeko-lite'); ?></h3></th>
							<th><h3><?php esc_html_e('Zeko Lite', 'zeko-lite'); ?></h3></th>
							<th><h3><?php esc_html_e('Zeko', 'zeko-lite'); ?></h3></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><h3><?php esc_html_e('Theme Price', 'zeko-lite'); ?></h3></td>
							<td><?php esc_html_e('Free', 'zeko-lite'); ?></td>
							<td>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/pricing/'); ?>">
									<?php esc_html_e('View Pricing', 'zeko-lite'); ?>
								</a>
							</td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Responsive Layout', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-yes"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Page Templates', 'zeko-lite'); ?></h3></td>
							<td><?php esc_html_e('2', 'zeko-lite'); ?></td>
							<td><?php esc_html_e('8', 'zeko-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Front Page Featured Blocks', 'zeko-lite'); ?></h3></td>
							<td><?php esc_html_e('zero', 'zeko-lite'); ?></td>
							<td><?php esc_html_e('4', 'zeko-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Front Page Widgetized Areas', 'zeko-lite'); ?></h3></td>
							<td><?php esc_html_e('zero', 'zeko-lite'); ?></td>
							<td><?php esc_html_e('1', 'zeko-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Menus', 'zeko-lite'); ?></h3></td>
							<td><?php esc_html_e('2', 'zeko-lite'); ?></td>
							<td><?php esc_html_e('2', 'zeko-lite'); ?></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Different Blog Layouts', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Different Theme Options', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Different Header Options', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Different Blog Options', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Premium Slider', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('WooCommerce, Give, PeepSo & The Events Calendar Support', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Custom Plugins', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Color Options', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Extended Features', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><span class="dashicons dashicons-yes"></span></td>
						</tr>
						<tr>
							<td><h3><?php esc_html_e('Support', 'zeko-lite'); ?></h3></td>
							<td><span class="dashicons dashicons-no"></span></td>
							<td><?php esc_html_e('Help Desk Ticketing System', 'zeko-lite'); ?></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<a href="<?php echo esc_url('https://www.anarieldesign.com/themes/nonprofit-wordpress-theme/'); ?>" class="upgrade-button">
									<?php esc_html_e('Upgrade to Zeko Pro', 'zeko-lite'); ?>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>
			<div class="section bg1">
				<h3>
					<?php esc_html_e('More Themes by Anariel Design', 'zeko-lite'); ?>
				</h3>
				<p class="about">
					<?php printf(esc_html__('Build Your Dream WordPress Site with Premium Niche Themes for Bloggers & Charities',  'zeko-lite'), $zeko_lite_data['Name']); ?>
				</p>
				<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/anarieldesign-themes.jpg" alt="<?php esc_html_e('Theme Screenshot', 'zeko-lite'); ?>" /></a>
				<p>
					<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/'); ?>" class="button button-primary advertising">
						<?php esc_html_e('More Themes', 'zeko-lite'); ?>
					</a>
				</p>
			</div>
			<hr>
		</div><?php
	}
}

?>