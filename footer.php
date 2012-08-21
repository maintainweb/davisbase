<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	</div><!-- #main -->
	<footer id="colophon" role="contentinfo">
		<div class="bottom-divider bottom-divider-one"></div>
		<div class="row">
		<?php

			if ( is_front_page() )
				get_sidebar( 'footer' );
		?>
		<?php
			if ( is_home() )
				get_sidebar( 'footer-blog' );
		?>
		</div>
		<div class="top-divider"></div>
		<div class="row footer-row-two">
		<?php

			if ( is_front_page() )
				get_sidebar( 'footer-two' );
		?>
		</div>
		<?php if ( is_front_page() ) { ?><div class="bottom-divider bottom-divider-two"></div> <?php } ?>
		<div id="site-generator">
			<?php wp_nav_menu( array( 'theme_location' => 'footer', 'items_wrap' => '<ul id="menu-footer-nav" class="menu">%3$s<li><a title="Newsletter" data-toggle="modal" href="#newsletterModal">Newsletter</a></li></ul>', ) ); ?>
		</div>
		<p class="davisbase-footer-logo-wrapper"><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>" class="davisbase-footer-logo"><?php bloginfo( 'name' ); ?></a></p>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js?ver=1.4.0"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/inc/bootstrap.min.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/inc/data.js?v=2.0"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/inc/general.js?v=2.0"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/application.js"></script>
</body>
</html>