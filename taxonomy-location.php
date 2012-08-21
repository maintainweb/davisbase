<?php
/**
 * Template Name: Locations Page
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
            'post_type' => 'location',
            'orderby' => 'title',
            'order' => 'DSC',
            'paged' => $paged
         );
         query_posts($args); 
         if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php post_type_archive_title(); ?></h1>
				</header>
				
				
				<?php twentyeleven_content_nav( 'nav-above' ); ?>
<table class="espresso-table table table-striped" width="100%">
  
      <thead class="espresso-table-header-row">
      <tr>
      		<th class="th-group"><?php _e('Date','event_espresso'); ?></th>
          <th class="th-group"><?php _e('Name','event_espresso'); ?></th>
          <th class="th-group"><?php _e('City','event_espresso'); ?></th>
          <th class="th-group"><?php _e('State','event_espresso'); ?></th>
          <th class="th-group"><?php _e('','event_espresso'); ?></th>
     </tr>
      </thead>
	<tbody>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'events' );
					?>

				<?php endwhile; ?>
                </tbody>
			</table>
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