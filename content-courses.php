<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#abstract" data-toggle="tab">Abstract</a></li>
		<li><a href="#cost" data-toggle="tab">Cost</a></li>
		<li><a href="#credits" data-toggle="tab">Credits</a></li>
		<li><a href="#audience" data-toggle="tab">Audience</a></li>
		<li><a href="#duration" data-toggle="tab">Duration</a></li>
		<li><a href="#outcomes" data-toggle="tab">Outcomes</a></li>
		<li><a href="#agenda" data-toggle="tab">Agenda</a></li>
		<li><a href="#events" data-toggle="tab">Find an Event</a></li>
	</ul>
	<div class="tab-content">
		<div id="abstract" class="tab-pane active">
			<h3>Course Abstract</h3>
			<?php the_field('abstract'); ?>
		</div>
		<div id="cost" class="tab-pane">
			<h3>Cost</h3>
			<?php the_field('cost'); ?>
		</div>
		<div id="credits" class="tab-pane">
			<h3>Credits</h3>
			<?php the_field('credits'); ?>
		</div>
		<div id="audience" class="tab-pane">
			<h3>Audience</h3>
			<?php the_field('audience'); ?>
		</div>
		<div id="duration" class="tab-pane">
			<h3>Duration</h3>
			<?php the_field('duration'); ?>
		</div>
		<div id="outcomes" class="tab-pane">
			<h3>Learning Outcomes</h3>
			<?php the_field('outcomes'); ?>
		</div>
		<div id="agenda" class="tab-pane">
			<h3>Detailed Course Agenda</h3>
			<?php the_field('agenda'); ?>
		</div>
		<div id="events" class="tab-pane">
			<h3>Upcoming Events</h3>
		</div>
	</div>
	</div><!-- .entry-content -->
<div class="events_shortcode">
	<?php the_field('events_shortcode'); ?>
</div>
</article><!-- #post-<?php the_ID(); ?> -->

