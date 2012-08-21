<?php
/**
 * Template Name: Events Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php get_sidebar('events'); ?>

		<div id="primary">
			<div id="content" role="main">
				<table class="table table-stripped table-bordered">
				<thead>
					<tr>
						<th>Start Date</th>
						<th>Name</th>
						<th>City</th>
						<th>State</th>
						<th>Register</th>
					</tr>
				</thead>
				<tbody>
				<?php

global $wpdb;
/* wpdb class should not be called directly.global $wpdb variable is an instantiation of the class already set up to talk to the WordPress database */ 

$result = $wpdb->get_results( "SELECT * FROM wp_events_detail "); /*mulitple row results can be pulled from the database with get_results function and outputs an object which is stored in $result */

//echo "<pre>"; print_r($result); echo "</pre>";
/* If you require you may print and view the contents of $result object */

foreach($result as $row)
 { ?>
<tr>
<td><?php echo $row->start_date."</td><td>".$row->event_name."</td><td>".$row->city."</td><td>".$row->state."</td>"; ?>
<td><a class="btn btn-primary" href="#">Details</a></td>
</tr>
<?php } ?>
				</tbody>
				</table>
			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>