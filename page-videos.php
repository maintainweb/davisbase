<?php
/**
 * Template Name: Videos Page
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
$page_id = 66;
$page_data = get_page( $page_id ); 
$blogtitle = get_the_title($page_id);
$blogcontent = get_page($page_id);
get_header();
get_sidebar(); ?>

<?php
$posts_per_page = -1;
?>
		<section id="primary">
			<div id="content" role="main">

			<?php
         $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
         $args = array (
            'posts_per_page' => $posts_per_page,
            'post_type' => 'videos',
            'orderby' => 'title',
            'order' => 'DSC',
            'paged' => $paged
         );
         query_posts($args); 
         if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php post_type_archive_title(); ?></h1>
				</header>
				<div class="videos-page-content"><?php echo apply_filters('the_content', $page_data->post_content); // echo the content and retain Wordpress filters such as paragraph tags. ?></div>
				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'videos' );
					?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>