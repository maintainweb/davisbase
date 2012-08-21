<?php
/**
 * Template Name: Page w Links (Useful Links)
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'limit'             => -1,
    'categorize'		=> 0,
    'title_li'         => __(''),
    'show_description'  => 1,
    'show_name'			=> 1,
    'show_images'	    => 0,
    'category'			=> '24',
    'category_order'    => 'ASC',
    'echo'				=> 1,
    'class'             => 'links',
    'before'  			=> '<div class="links">',
    'after'   			=> '</div>',
    'before_link'  		=> '',
    'after_link'   		=> '',
    'between' 			=> ' - ' );

get_header(); ?>

<?php get_sidebar(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>					
					<?php wp_list_bookmarks( $args ); ?> 

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>