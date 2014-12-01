<?php


$overlay_options = array(

	array(
		"name" => "Type",
		"desc" => "Select the overlay type",
		"id" => THEME_SLUG."_overlay_type",
		"std" => "fade",
		"data" => array(
			"fade" => "Fade",
			"top" => "Top"
		),
		"type" => "select",
		"size" => "small"
	),

	array(
		"name" => "Choose display area",
		"desc" => "",
		"id" => THEME_SLUG."_overlay_display",
		"std" => "all",
		"data" => array(
			"all" => "All Site",
			"blog" => "Blog Only",
			"pages" => "Pages (Choose below)"
		),
		"type" => "radio"
	),
	
	array(
		"name" => "Choose Pages",
		"desc" => "Select Pages for the overlay (only if you checked the \"Pages\" box above)",
		"id" => THEME_SLUG."_overlay_pages",
		"std" => array(),
		"type" => "page_dropdown"
	),
	
	array(
		"name" => "URL (optional)",
		"desc" => "The url that the entire overlay bar can be linked to. Please provide full URL(including http://)",
		"id" => THEME_SLUG."_overlay_url",
		"std" => "",
		"type" => "text",
		"size" => "large"
	),
	
	array(
		"name" => "Overlay display time",
		"desc" => "",
		"id" => THEME_SLUG."_overlay_time",
		"std" => "day",
		"data" => array(
			"day" => "Once a day",
			"always" => "Always",
			"user" => "Once per user"
		),
		"type" => "radio"
	),
	
	array(
		"name" => "Activation Date",
		"desc" => "Leave empty to start immediately",
		"id" => THEME_SLUG."_overlay_start",
		"std" => "",
		"type" => "datepicker"
	),
		
	array(
		"name" => "Expiration Date",
		"desc" => "Leave empty for no expiration date",
		"id" => THEME_SLUG."_overlay_end",
		"std" => "",
		"type" => "datepicker"
	),
	
	array( 
		"type" => "text",
		"name" => "Content Width",
		"id" => THEME_SLUG."_overlay_width",
		"std" => "960",
		"desc" => "The width that all content for the fade over will try to be kept within." 
	),
	
	array( 
		"type" => "colorpicker",
		"name" => "Background Color",
		"id" => THEME_SLUG."_overlay_bgcolor",
		"std" => "000000",
		"desc" => "Enter the HEX # for the background color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." 
	),
	
	array( 
		"type" => "text",
		"name" => "Custom CSS",
		"id" => THEME_SLUG."_overlay_css",
		"std" => "",
		"desc" => "If you want to add custom CSS styling to the content area within the overlay enter the rule name here. (Example: new-css-rule)" 
	),
	
	array( 
		"type" => "text",
		"name" => "Top Bar Height",
		"id" => THEME_SLUG."_overlay_top_height",
		"std" => "25",
		"desc" => "This height that all content for the bar will try to be kept within. It does not affect the fade overaly type."
	),
	
	array( 
		"type" => "text",
		"name" => "Fade Overlay Timeout Delay",
		"id" => THEME_SLUG."_overlay_fade_timeout",
		"std" => "10",
		"desc" => "This is the time in seconds before the fade overlay will automatically be closed. Set it to '-1' if you don't want to use it."
	),
);

$info = array(
    "id" => "overlay",
    "title" => "Overlay Details",
    "post_type" => "overlay",
	"context" => "normal",
	"priority" => "default"	
);

$overlay_option_settings = new MetaboxGenerator($info, $overlay_options);


?>