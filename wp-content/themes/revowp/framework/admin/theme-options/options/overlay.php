<?php

/******** Overlay Settings ********/	

$overlay_settings = array();

$overlay_settings[] =  array( "type" => "html",
						"desc" => "In this section you can configure the default options for the Overlay plugin. While you can have unlimited overlays on your website you are limited to one of each type per page." );
						
						
$overlay_settings[] = array( "type" => "start",
						"name" => "Fade Style" );
																									
$overlay_settings[] =  array( "type" => "colorpicker",
						"name" => "Default Font Color",
						"id" => THEME_SLUG."_overlay_fade_color",
						"std" => "ffffff",
						"desc" => "Sets te default color of content in fade overlays. Enter the HEX # for the default font color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );
						
$overlay_settings[] =  array( "type" => "colorpicker",
						"name" => "Fade Link Color",
						"id" => THEME_SLUG."_overlay_fade_link_color",
						"std" => "aaaaaa",
						"desc" => "Sets the default link color in fade overlays. Enter the HEX # for the default font color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );						
						
$overlay_settings[] =  array( "type" => "button",
						"name" => "Add Fade Overlay",
						"data" => "Click To Open Overlay Manager",
						"link" => "edit.php?post_type=overlay",
						"desc" => "If you would like to add a Fade Overlay to your site you must use the Overlay custom post tyle. Click the button to open the page in a new window" );						
						
$overlay_settings[] = array( "type" => "stop" );


$overlay_settings[] = array( "type" => "start",
						"name" => "Top Bar Style" );
						
$overlay_settings[] =  array( "type" => "text",
						"name" => "Default Bar Width",
						"id" => THEME_SLUG."_overlay_top_width",
						"std" => "960",
						"desc" => "Globaly sets how wide of and area the content in a Top Bar overlay will be confined to. If you want to keep all content within the same margins as the content area of the website set this value to 960. Only enter numbers in this field." );	
						
$overlay_settings[] =  array( "type" => "text",
						"name" => "Default Bar Height",
						"id" => THEME_SLUG."_overlay_top_height",
						"std" => "25",
						"desc" => "Globaly sets how tall the Top Bar overlays should be. A standard notification has a height of 25px. Only enter numbers in this field." );
						
$overlay_settings[] =  array( "type" => "toggle",
						"name" => "Close Button",
						"id" => THEME_SLUG."_overlay_top_close",
						"std" => "true",
						"desc" => "This option controls whether a \"Close\" button bill be added to all Bar overlays." );
						
$overlay_settings[] =  array( "type" => "colorpicker",
						"name" => "Default Bar Background Color",
						"id" => THEME_SLUG."_overlay_top_bgcolor",
						"std" => "dec60d",
						"desc" => "Sets the default color for all Top Bar overlays. This can be set individually for each Top Bar. Enter the HEX # for the background color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );					
						
$overlay_settings[] =  array( "type" => "colorpicker",
						"name" => "Bar Foreground Color",
						"id" => THEME_SLUG."_overlay_top_color",
						"std" => "000000",
						"desc" => "Sets the default color for all Top Bar overlay content. Enter the HEX # for the background color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );
	
$overlay_settings[] =  array( "type" => "colorpicker",
						"name" => "Bar Link Color",
						"id" => THEME_SLUG."_overlay_top_link_color",
						"std" => "666666",
						"desc" => "Sets the default color for all links in Top Bar overlays. Enter the HEX # for the background color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );

$overlay_settings[] =  array( "type" => "button",
						"name" => "Add Top Bar Overlay",
						"data" => "Click To Open Overlay Manager",
						"link" => "edit.php?post_type=overlay",
						"desc" => "If you would like to add a Tob Bar Overlay to your site you must use the Overlay custom post tyle. Click the button to open the page in a new window" );						
						
$overlay_settings[] = array( "type" => "stop" );

/*
$overlay_settings[] = array( "type" => "start",
						"name" => "Browser Upgrade Bar" );
						
$overlay_settings[] =  array( "type" => "toggle",
						"name" => "Outdated Browser Check",
						"id" => THEME_SLUG."_overlay_browser",
						"std" => "",
						"desc" => "When enabled this option will check if a visitors browser is out of date and will present a top bar overlay that contains a notification that informs visitors that their browser is out of date and gives them links and instructions of how to upgrade their browser. This feature is optional however it's reccomended to help further the progress of the web and ensure visitors see your website the way it was meant to be seen." );	
												
$overlay_settings[] = array( "type" => "stop" );
*/

$theme_options[] =  array( "name" => "Overlay",
					"id" => "overlay",
					"slug" => "overlay", 
					"options" => $overlay_settings
				);					
