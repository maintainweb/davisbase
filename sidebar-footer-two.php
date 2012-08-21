<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-6' )
		&& ! is_active_sidebar( 'sidebar-7' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="supplementary-two" <?php twentyeleven_footer_sidebar_class(); ?>>
	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
	<div id="home-footer-left" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-6' ); ?>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
	<div id="home-footer-right" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-7' ); ?>
	</div><!-- #second .widget-area -->
	<?php endif; ?>
</div><!-- #supplementary -->