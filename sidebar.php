<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

?>


<div id="secondary" class="widget-area" role="complementary">
<div id="subnavigation" class="subnavigation-wrapper">

<?php if (is_page( 'about-davisbase' ) || is_child( 'about-davisbase' ) || is_child( 'news-and-events' ) || is_singular( 'press-releases') || is_post_type_archive( 'press-releases' )) { wp_nav_menu( array( 'menu' => 'About Nav' )); } ?>

<?php if (is_page( 'services') || is_child( 'services' ) || is_child( 'agile-training' )) { wp_nav_menu( array( 'menu' => 'Services Nav' )); } ?>

<?php if (is_page( 'resources' ) || is_child( 'resources' ) || is_singular( array('glossary', 'case-studies', 'white-papers', 'videos')) || is_post_type_archive( array('glossary', 'case-studies', 'white-papers', 'videos')) || is_page_template('page-videos.php')) { wp_nav_menu( array( 'menu' => 'Resources Nav' )); } ?>

<?php if (is_page( array('events', 'conferences', 'webinars', 'training')) || is_child( 'events' )){ wp_nav_menu( array( 'menu' => 'Events Nav' )); } ?>

<?php if (is_child('services') || is_child( 'agile-training' )) {
	echo expanding_course_menu();
} ?>
<?php if  (is_home( array('blog'))){ ?>
	<aside id="archives" class="widget">
		<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' )); ?>
			</ul>
	<ul id="sidebar">
   <?php dynamic_sidebar( 'Main Sidebar' ); ?>
   	</ul>
	</aside>
<?php } ?>
<?php if  (is_category()){ ?>
	<aside id="archives" class="widget">
		<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' )); ?>
			</ul>
				<ul id="sidebar">
   <?php dynamic_sidebar( 'Main Sidebar' ); ?>
   	</ul>
	</aside>
<?php } ?>
<?php if  (is_tag()){ ?>
	<aside id="archives" class="widget">
		<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' )); ?>
			</ul>
				<ul id="sidebar">
   <?php dynamic_sidebar( 'Main Sidebar' ); ?>
   	</ul>
	</aside>
<?php } ?>
<?php if  (is_date()){ ?>
	<aside id="archives" class="widget">
		<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' )); ?>
			</ul>
				<ul id="sidebar">
   <?php dynamic_sidebar( 'Main Sidebar' ); ?>
   	</ul>
	</aside>
<?php } ?>
<?php if  (is_author()){ ?>
	<aside id="archives" class="widget">
	<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
	<ul>
		<?php wp_get_archives( array( 'type' => 'monthly' )); ?>
	</ul>
	<ul id="sidebar">
   <?php dynamic_sidebar( 'Main Sidebar' ); ?>
   	</ul>
	</aside>

<?php } ?>
<?php if  (is_singular("post")){ ?>
	<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' )); ?>
					</ul>
						<ul id="sidebar">
   <?php dynamic_sidebar( 'Main Sidebar' ); ?>
   	</ul>
	</aside>
<?php } ?>

</div><!-- #subnavigation -->
</div><!-- #secondary .widget-area -->