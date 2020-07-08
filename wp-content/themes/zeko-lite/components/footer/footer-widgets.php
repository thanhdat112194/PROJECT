<?php
/**
 * Displays footer widgets if assigned.
 *
 * @package Zeko Lite
 */
 
$footer_extra_class = '';

?>

<?php
if ( is_active_sidebar( 'sidebar-2' ) ||
	 is_active_sidebar( 'sidebar-3' ) ||
	 is_active_sidebar( 'sidebar-4' ) ) {
?>


	<aside class="widget-area-block" role="complementary">
		<div class="wrap">
			<div class="widget-area footer-widget-area">
				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
					<div id="widget-area-2" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div><!-- #widget-area-2 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
					<div id="widget-area-3" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div><!-- #widget-area-3 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
					<div id="widget-area-4" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-4' ); ?>
					</div><!-- #widget-area-3 -->
				<?php endif; ?>

			</div><!-- .footer-widget-area -->
		</div>
	</aside><!-- .widget-area -->

<?php } ?>
