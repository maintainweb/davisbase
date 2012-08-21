<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post();

              	// GET POST CUSTOM FIELDS //
                //For more information on the get_post_meta function, check out this page:
				//http://codex.wordpress.org/Function_Reference/get_post_meta

				//Here's a bunch of variables  you can use in your template
				$event_identifier = get_post_meta($post->ID, 'event_identifier', true);
                $event_id = get_post_meta($post->ID, 'event_id', true);
				$event_start_date = get_post_meta($post->ID, 'event_start_date', true);
				$event_end_date = get_post_meta($post->ID, 'event_end_date', true);
				$event_thumbnail_url = get_post_meta($post->ID, 'event_thumbnail_url', true);
				$event_location = get_post_meta($post->ID, 'event_location', true);
				$event_address = get_post_meta($post->ID, 'event_address', true);
				$event_address2 = get_post_meta($post->ID, 'event_address2', true);
				$event_city = get_post_meta($post->ID, 'event_city', true);
				$event_state = get_post_meta($post->ID, 'event_state', true);
				$event_country = get_post_meta($post->ID, 'event_country', true);
				$event_phone = get_post_meta($post->ID, 'event_phone', true);
				$event_externalURL = get_post_meta($post->ID, 'event_externalURL', true);
				$event_registration_start = get_post_meta($post->ID, 'event_registration_start', true);
				$event_registration_end = get_post_meta($post->ID, 'event_registration_end', true);
                $event_cat = do_shortcode('[CATEGORY_NAME event_id="'.$event_id.'"]'); // displays the event category name, not used in this template but you can add it in
                $event_price = '$' . do_shortcode('[EVENT_PRICE event_id="'.$event_id.'" number="0"]'); // this only displays the first price, change the currency symbol to the one that applies to you
                $event_date = do_shortcode('[EVENT_TIME event_id="'.$event_id.'" type="start_date" format="l, F j, Y"]'); // change the date format if you so desire http://php.net/manual/en/function.date.php
                $event_time = do_shortcode('[EVENT_TIME event_id="'.$event_id.'" type="start_time"]');
                $event_end_time = do_shortcode('[EVENT_TIME event_id="'.$event_id.'" type="end_time"]');
                $event_venue = do_shortcode('[ESPRESSO_VENUE event_id="'.$event_id.'"]'); // modify this shortcode to display the venue however you want http://eventespresso.com/support/documentation/shortcodes-template-variables/#venue
                $event_attendees_min_max = do_shortcode('[ATTENDEE_NUMBERS event_id="'.$event_id.'" type="num_attendees"]') . '/' . do_shortcode('[ATTENDEE_NUMBERS event_id="'.$event_id.'" type="reg_limit"]');
                $event_attendees = do_shortcode('[ATTENDEE_NUMBERS event_id="'.$event_id.'" type="available_spaces"]');
                $show_venue = '1'; // set this to 1 if you want to display the venue (this assumes you have venues set up so the default is to set this to 0 for off)
                $show_attendees = '1'; // display number of attendees? set this to 0 if you don't want the attendee numbers. to change how they are displayed, change the shortcode in the $event_attendees variable above
                //the_meta(); //this function displays all the meta values for the post -- more info here: http://codex.wordpress.org/Function_Reference/the_meta
				//This gets the data that is entered into the custom write panels
				//http://wefunction.com/2009/10/revisited-creating-custom-write-panels-in-wordpress/
				//$event_meta = get_post_meta( $post->ID, 'event_meta', true );
				?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-content">
						<?php // echo $event_cat; ?>

<?php // $args = array( 'taxonomy' => 'location' );
//		$terms = get_terms('location', $args);

// $count = count($terms); $i=0;
// if ($count > 0) {
//     $term_list = '<p class="my_term-archive">';
 //    foreach ($terms as $term) {
 //        $i++;
 //    	$term_list .= '<a href="/location/' . $term->slug . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name) . '">' . $term->name . '</a>';
//     	if ($count != $i) $term_list .= ' &middot; '; else $term_list .= '</p>';
//     } ?>
 <!--   Location: --> <?php // echo $term_list; } ?>
						<?php // echo $event_id; ?>
						<div class="event_description">
							<?php the_content(); ?>
						</div>
                        
                        

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<div class="entry-utility">
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>