<?php

/******** Overlay Settings ********/	

$whitelabel_settings = array();

$whitelabel_settings[] =  array( "type" => "html",
						"desc" => "If you are building this website for a client and want to add your own branding to the options panel you can do so in here. You can also set what features/option pages should b hidden when enabeling the White Label Lock." );
	
$whitelabel_settings[] = array( "type" => "upload",
						"name" => "Options Header Image",
						"id" => THEME_SLUG."_options_header_image",
						"std" => THEME_HOME."/framework/admin/layout/images/options-header.jpg",
						"desc" => "Enter the URL of your options header image. It's reccomended that this image is exactly  794px X 74px for best results. Click upload to add the image to the Wordpress media manager." );
	
$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Editor Shortcode Buttons",
						"id" => THEME_SLUG."_editor_shortcode_buttons",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the shortcode buttons in the page/post editors." );
						
$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - General",
						"id" => THEME_SLUG."_options_panel_general",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the General Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - Blog",
						"id" => THEME_SLUG."_options_panel_blog",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the Blog Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - Menu Style",
						"id" => THEME_SLUG."_options_panel_menu",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the Menu Style Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - Fonts",
						"id" => THEME_SLUG."_options_panel_font",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the Fonts Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - Area Backgrounds",
						"id" => THEME_SLUG."_options_panel_area-backgrounds",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the Area Backgrounds Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - Layouts / Elements",
						"id" => THEME_SLUG."_options_panel_layouts",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the Layouts / Elements Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - Social",
						"id" => THEME_SLUG."_options_panel_social",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the Social Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - Overlay",
						"id" => THEME_SLUG."_options_panel_overlay",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the Overlay Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - Import/Export",
						"id" => THEME_SLUG."_options_panel_import-export",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the Import/Export Settings in Options Panel." );						

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Options Panel - CF7 Email Integration",
						"id" => THEME_SLUG."_options_panel_theme-cf7-email-integration",
						"std" => "true",
						"desc" => "Toggle this to enable/disable the CF7 Email Integration Settings in Options Panel." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Pricing Tables",
						"id" => THEME_SLUG."_admin_menu_pricing_tables",
						"std" => "true",
						"desc" => "Toggle this to show/hide Pricing Tables in Admin Menu." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Overlays",
						"id" => THEME_SLUG."_admin_menu_overlays",
						"std" => "true",
						"desc" => "Toggle this to show/hide Overlay in Admin Menu." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Portfolio",
						"id" => THEME_SLUG."_admin_menu_portfolio",
						"std" => "true",
						"desc" => "Toggle this to show/hide Portfolio in Admin Menu." );

$whitelabel_settings[] =  array( "type" => "toggle",
						"name" => "Contact Form 7",
						"id" => THEME_SLUG."_admin_menu_cf7",
						"std" => "true",
						"desc" => "Toggle this to show/hide Contact Form 7 in Admin Menu." );
						
$theme_options[] =  array( "name" => "White Labeling",
					"id" => "whitelabel",
					"slug" => "whitelabel", 
					"options" => $whitelabel_settings
				);					
