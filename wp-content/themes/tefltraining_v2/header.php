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
    <?php if ($seo_title){ ?>
        <title><?php echo $seo_title.' | '; ?><?php bloginfo('name'); ?></title>
    <?php }else{ ?>
        <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
    <?php } ?>

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
    <!-- FavIcon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_elision['favicon_image']; ?>">
	<link rel="apple-touch-icon" href="<?php echo $qode_options_elision['favicon_image']; ?>"/>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/favicons/favicon-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/favicons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/favicons/favicon-32x32.png" sizes="32x32">
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