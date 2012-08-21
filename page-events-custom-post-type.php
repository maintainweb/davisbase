<?php
/**
 * Template Name: Events Custom Post Type Template (DO NOT USE)
 * Description:
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php get_sidebar('events'); ?>

		<div id="primary">
			<div id="content" role="main">
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
            <?php global $post, $wp_query;
                // define some arguments for our Event Espresso query
                $args = array(
                        'post_type' => 'espresso_event',
                        'meta_key' => 'event_start_date',
                        'meta_query' => array(
                            array(
                                'key' => 'event_start_date',
                                'value' => date('Y-m-d'),
                                'compare' => '>=', // compares the event_start_date against today's date so we only display events that haven't happened yet
                                'type' => 'DATE'
                                )
                            ),
                        'orderby' => 'meta_value',
                        'order' => 'DESC' // change this to ASC if you want newer events on top
                    );
            // this saves the query to a temporary location so we can go back to it later after we run our query
            $temp = $wp_query;
            $wp_query = null;
            $wp_query = new WP_Query();
            $wp_query->query($args);

            // now run the loop
            while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
              <?php
              	// GET POST CUSTOM FIELDS //
                //For more information on the get_post_meta function, check out this page:
				//http://codex.wordpress.org/Function_Reference/get_post_meta

				//Here's a bunch of variables  you can use in your template
				$event_identifier = get_post_meta($post->ID, 'event_identifier', true);
                $event_id = get_post_meta($post->ID, 'event_id', true);
				$event_start_date = get_post_meta($post->ID, 'event_start_date', true);
				$event_end_date = get_post_meta($post->ID, 'event_end_date', true);
				$event_location = get_post_meta($post->ID, 'event_location', true);
				$event_thumbnail_url = get_post_meta($post->ID, 'event_thumbnail_url', true);
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
                $event_venue = do_shortcode('[ESPRESSO_VENUE event_id="'.$event_id.'"]'); // modify this shortcode to display the venue however you want http://eventespresso.com/support/documentation/shortcodes-template-variables/#venue
                $event_attendees_min_max = do_shortcode('[ATTENDEE_NUMBERS event_id="'.$event_id.'" type="num_attendees"]') . '/' . do_shortcode('[ATTENDEE_NUMBERS event_id="'.$event_id.'" type="reg_limit"]');
                $event_attendees = do_shortcode('[ATTENDEE_NUMBERS event_id="'.$event_id.'" type="available_spaces"]');
                $show_venue = '0'; // set this to 1 if you want to display the venue (this assumes you have venues set up so the default is to set this to 0 for off)
                $show_attendees = '1'; // display number of attendees? set this to 0 if you don't want the attendee numbers. to change how they are displayed, change the shortcode in the $event_attendees variable above
                //the_meta(); //this function displays all the meta values for the post -- more info here: http://codex.wordpress.org/Function_Reference/the_meta
				//This gets the data that is entered into the custom write panels
				//http://wefunction.com/2009/10/revisited-creating-custom-write-panels-in-wordpress/
				//$event_meta = get_post_meta( $post->ID, 'event_meta', true );
				?>                
                <tr id="post-<?php the_ID(); ?>" class="espresso-table-row">
	                <td class="td-group"><?php echo $event_date; ?></td>
	                <td class="td-group"><?php the_title(); ?></td>	
	                <td class="td-group"><?php echo $event_city; ?></td>
	                <td class="td-group"><?php echo $event_state; ?></td>
	                <td class="td-group"><a class="btn btn-primary" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Register</a></td>
	                </tr>

                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>

                <?php endwhile; // end of the loop. ?>
                <?php $wp_query = null; $wp_query = $temp; // put the old query back where we left it ?>
                </tbody>
			</table>
			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>