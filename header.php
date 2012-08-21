<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/inc/glyphicons.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/inc/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/inc/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php if ( ! is_page(32)){ ?>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/sortable.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/inc/bootstrap.min.js"></script>
<?php } ?>
<?php if ( is_front_page()){ ?>

<?php } ?>
<script>
$(function () {

  var msie6 = $.browser == 'msie' && $.browser.version < 7;

  if (!msie6) {
    var top = $('#secondary').offset().top - parseFloat($('#secondary').css('margin-top').replace(/auto/, 0));
    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();

      // whether that's below the form
      if (y >= top) {
        // if so, ad the fixed class
        $('#secondary').addClass('fixed');
        $('#site-title').addClass('scrolling');

      } else {
        // otherwise remove it
        $('#secondary').removeClass('fixed');
        $('#site-title').removeClass('scrolling');
      }
    });
    var top = $('#table-of-contents').offset().top - parseFloat($('#table-of-contents').css('margin-top').replace(/auto/, 0));
    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();

      // whether that's below the form
      if (y >= top) {
        // if so, ad the fixed class
        $('#table-of-contents').addClass('scrolling');

      } else {
        // otherwise remove it
        $('#table-of-contents').removeClass('scrolling');
      }
    });
  }
});

$('[data-spy="scroll"]').each(function () {
  var $spy = $(this).scrollspy('refresh')
});
function goTo() {
var sE = null, url;
if(document.getElementById) {
sE = document.getElementById('filterList');
} else if(document.all) {
sE = document.all['filterList'];
}
if(sE && (url = sE.options[sE.selectedIndex].value)) {
location.href = url;
}
}
</script>
</head>

<body data-spy="scroll" data-target=".table-of-contents-wrap" <?php body_class(); ?>>
<a id="top"></a>
<div class="modal hide" id="newsletterModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">x</button>
    <h3>Davisbase Consulting Newsletter</h3>
  </div>
  <div class="modal-body">
    <p>Signup for our newsletter and stay in touch with up for Agile resources and upcoming Agile events in your area.</p>
    <?php echo do_shortcode('[gravityform id="2" name="Newsletter" title="false" description="false" ajax="true"]');?>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
  </div>
</div>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>


			<?php wp_nav_menu( array( 'theme_location' => 'socials' ) ); ?>

			<nav id="mini" role="navigation">

			<?php wp_nav_menu( array( 'theme_location' => 'mini' ) ); ?>

			</nav><!-- #access -->

<nav id="primary" role="navigation">
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
        <div class="nav-collapse">
        <!-- Everything you want hidden at 940px or less, place within here -->
        <?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'      => 'nav',
					'menu_id'         => 'menu-primary-nav',
					'container'       => 'false',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>' ) ); ?>
        <?php get_search_form(); ?>
        </div><!-- .nav-collapse -->
    </div>
  </div>
</div>
</nav><!-- #access -->

			</hgroup>

	</header><!-- #branding -->


	<div id="main">
	<div class="top-divider"></div>
