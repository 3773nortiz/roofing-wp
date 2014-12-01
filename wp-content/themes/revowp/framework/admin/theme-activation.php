<?php

function wp_register_theme_activation_hook($code, $function) {
    $optionKey="theme_is_activated_" . $code;
    if(!get_option($optionKey)) {
        update_option($optionKey , 1);
        call_user_func($function);
    }
}

function wp_register_theme_deactivation_hook($code, $function) {
    $GLOBALS["wp_register_theme_deactivation_hook_function" . $code]=$function;

    $fn=create_function('$theme', ' call_user_func($GLOBALS["wp_register_theme_deactivation_hook_function' . $code . '"]); delete_option("theme_is_activated_' . $code. '");');
	
    add_action("switch_theme", $fn);
}

function theme_activate() {
//	add_action('admin_notices','theme_activate_notice');
	if(function_exists('wpcf7_install')){ wpcf7_install(); };
	wp_redirect( admin_url( 'admin.php?page=theme-dashboard' ) );
    exit;
}
wp_register_theme_activation_hook(THEME_SLUG, 'theme_activate');

function theme_deactivate() {
	// code to execute on theme deactivation
}
wp_register_theme_deactivation_hook(THEME_SLUG, 'theme_deactivate');


function theme_activate_notice() {
	global $theme_update_notice;
	if (!get_option(THEME_SLUG."_license_key")) {
?>
	<div id="message" class="updated fade">
		<p>Please provide the license key to be able to use the theme. You can set the license key in General Settings of the Theme Options page.</p>
	</div>
<?php
	}
}

add_action('tgmpa_register', 'theme_register_required_plugins');

function theme_register_required_plugins() {
	


	$plugins = array(

		array(
			'name'                  => 'Revolution Slider',
			'slug'                  => 'revslider',
                        'source'                => 'http://members.revowp.com/download-modules.php?file=LGFKS83KGLOD87' , 
			'required'              => false, 
			'version'               => '4.6.0', 
			'force_activation'      => false, 
			'force_deactivation' 	=> false, 
			'external_url' 		=> ''
		),
            
                array(
                        'name'			=> 'Visual Composer', // The plugin name
                        'slug'			=> 'js_composer', // The plugin slug (typically the folder name)
                        'source'		=> 'http://members.revowp.com/download-modules.php?file=MDKD63KV5FKVK4KG94&ivid=', // The plugin source
                        'required'		=> false, // If false, the plugin is only 'recommended' instead of required
                        'version'		=> '4.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                        'force_activation'	=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                        'force_deactivation'	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                        'external_url'		=> '', // If set, overrides default API URL and points to an external URL
                ),
            
                array(
                        'name'			=> 'Templatera', // The plugin name
                        'slug'			=> 'templatera', // The plugin slug (typically the folder name)
                        'source'		=> 'http://members.revowp.com/download-modules.php?file=KSKID6209687FJB&ivid=', // The plugin source
                        'required'		=> false, // If false, the plugin is only 'recommended' instead of required
                        'version'		=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                        'force_activation'	=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                        'force_deactivation'	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                        'external_url'		=> '', // If set, overrides default API URL and points to an external URL
                ),
				array(
                        'name'			=> 'Ultimate Addons for Visual Composer', // The plugin name
                        'slug'			=> 'Ultimate_VC_Addons', // The plugin slug (typically the folder name)
                        'source'		=> 'http://members.revowp.com/download-modules.php?file=MAK289FMS0OKH&ivid=', // The plugin source
                        'required'		=> false, // If false, the plugin is only 'recommended' instead of required
                        'version'		=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                        'force_activation'	=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                        'force_deactivation'	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                        'external_url'		=> '', // If set, overrides default API URL and points to an external URL
                )
            
                
	);
	 
	$config = array(
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', THEME_SLUG ),
			'menu_title'                       			=> __( 'Install Plugins', THEME_SLUG ),
			'installing'                       			=> __( 'Installing Plugin: %s', THEME_SLUG ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', THEME_SLUG ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', THEME_SLUG ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', THEME_SLUG ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', THEME_SLUG ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'revowp_vcSetAsTheme' );
function revowp_vcSetAsTheme() {
	vc_set_as_theme();
}
