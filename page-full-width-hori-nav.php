<?php
/**
 * Template Name: Full Width with Horizontal Nav Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="secondary-horiz" class="widget-area" role="complementary">	
<div id="subnavigation-horiz" class="subnavigation-wrapper">
<?php
if(!$post->post_parent){
	// will display the subpages of this top level page
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
}
else{

	if($post->ancestors) {
		// now you can get the the top ID of this page
		// wp is putting the ids DESC, thats why the top level ID is the last one
		$ancestors = end($post->ancestors);
		$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
	}
}

if ($children) { ?>
	<ul>
		<?php echo $children; ?>
	</ul>
<?php } ?>
</div>
</div><!-- #secondary .widget-area -->


		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>