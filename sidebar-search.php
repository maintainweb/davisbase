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

<?php if (is_search()){ ?>
	<?php wp_nav_menu( array( 'menu' => 'Search Nav' ) ); ?>
<?php } ?>

</div>
</div><!-- #secondary .widget-area -->