<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
global $qode_options_elision;
global $wp_query;
$disable_qode_seo = "";
$seo_title = "";
if (isset($qode_options_elision['disable_qode_seo'])) $disable_qode_seo = $qode_options_elision['disable_qode_seo'];
if ($disable_qode_seo != "yes") {
    $seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);
    $seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);
    $seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);
}
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
    <?php if($seo_description) { ?>
        <meta name="description" content="<?php echo $seo_description; ?>">
    <?php } else if($qode_options_elision['meta_description']){ ?>
        <meta name="description" content="<?php echo $qode_options_elision['meta_description'] ?>">
    <?php } ?>

    <?php if($seo_keywords) { ?>
        <meta name="keywords" content="<?php echo $seo_keywords; ?>">
    <?php } else if($qode_options_elision['meta_keywords']){ ?>
        <meta name="keywords" content="<?php echo $qode_options_elision['meta_keywords'] ?>">
    <?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( get_theme_mod('wpex_custom_favicon') ) { ?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('wpex_custom_favicon'); ?>" />
	<?php } ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="wrap">
		<div id="header-wrap" class="clr fixed-header">
			<header id="header" class="site-header clr container" role="banner">
				<?php
				// Outputs the site logo
				// See functions/logo.php
				wpex_logo(); ?>
				<div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>
				<div id="site-navigation-wrap">
					<a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span><?php echo __( 'Menu', 'wpex' ); ?></a>
					<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
						<?php
						// Display main menu
						wp_nav_menu( array(
							'theme_location'	=> 'main_menu',
							'sort_column'		=> 'menu_order',
							'menu_class'		=> 'dropdown-menu sf-menu',
							'fallback_cb'		=> false,
							'walker'			=> new WPEX_Dropdown_Walker_Nav_Menu()
						) ); ?>
					</nav><!-- #site-navigation -->
				</div><!-- #site-navigation-wrap -->
			</header><!-- #header -->
		</div><!-- #header-wrap -->

		<?php
		// Displays the homepage slider based on the slides custom post type
		wpex_homepage_slider(); ?>

		<div id="main" class="site-main clr container">