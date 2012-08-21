<?php
/**
 * Template Name: Homepage Template
 * Description: A Page Template for the homepage
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php wowslider(2); ?>
<div class="bottom-divider"></div>
<div id="home-featured-event">
<?php
 
$post_objects = get_field('featured_event');
 
if( $post_objects ): ?>
    <ul>
    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
        	<a class="event-date" href="<?php the_permalink(); ?>"><?php the_field('event_date');?></a>
            <a class="event-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <a class="button-view-all" href="/events/">View All</a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;
 
?>
</div>

<?php get_footer(); ?>