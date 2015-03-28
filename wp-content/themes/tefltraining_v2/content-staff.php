<?php
/**
 * The default template for displaying staff content.
 *
 * @package WordPress
 * @subpackage Elegant WPExplorer Theme
 * @since Elegant 1.0
 */


/**
	Single Posts
**/
global $wpex_query;
if ( is_singular( 'staff' ) && !$wpex_query ) {

	// Silence is golden?

/**
	Entries
**/
} else { ?>

	<!--<article id="post-<?php the_ID(); ?>" <?php //post_class(); ?>> -->
		
		<header class="staff-entry-header">
			<h2 class="staff-entry-title"><?php the_title(); ?></h2>
		</header><!-- .staff-entry-header -->

		<div class="staff-entry-row" >
			<div class="staff-entry-content clr entry staff-entry-middle">
				<?php the_content(); ?>
			</div><!-- staff-entry-content -->
			<?php if( has_post_thumbnail() ) { ?>
			<div class="staff-entry-media clr">
				<img src="<?php echo wpex_get_featured_img_url(); ?>" alt="<?php the_title(); ?>" class="staff-entry-img" />
			</div><!-- .staff-entry-media -->
		<?php } ?>
		</div>
		<hr>

	<!-- </article> --> <!-- .staff-entry -->

<?php } ?>