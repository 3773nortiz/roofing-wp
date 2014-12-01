<?php

$portfolio_options = array(

	array(
		"name" => "Type",
		"desc" => "Choose the type of media",
		"id" => THEME_SLUG."_portfolio_type",
		"std" => "image",
		"type" => "select",
		"size" => "normal",
		"data" => array(
			"image" => "Image",
			"video" => "Video",
			"audio" => "Audio",
			"iframe" => "Iframe",
			"link" => "Link",
		)
	),

	array(
		"name" => "Link URL",
		"desc" => "",
		"id" => THEME_SLUG."_portfolio_url",
		"std" => "",
		"type" => "text",
		"size" => "large"
	), 
	
	array(
		"name" => "Open URL in Lightbox",
		"desc" => "",
		"id" => THEME_SLUG."_portfolio_lightbox",
		"std" => "true",
		"type" => "toggle"		
	),
	
	array(
		"name" => "Lighbox Description",
		"desc" => "",
		"id" => THEME_SLUG."_lightbox_desc",
		"std" => "",
		"type" => "select",
		"data" => array(
			"" => "None",
			"caption" => "Caption",
			"description" => "Description",
			"title" => "Title",
		)		
	),

	array(
		"name" => "Image Caption",
		"desc" => "",
		"id" => THEME_SLUG."_image_caption",
		"std" => "",
		"type" => "text",
		"size" => "large"
	), 
);


$info = array(
    "id" => "portfolio",
    "title" => "Portfolio Details",
    "post_type" => "portfolio",
	"context" => "normal",
	"priority" => "default"	
);

$portfolio_option_settings = new MetaboxGenerator($info, $portfolio_options);


$portfolio_options = array(
	array(
		"name" => "Set Link Title",
		"desc" => "If you would like to enter a title tag for your link for SEO purposes you may do so here",
		"id" => THEME_SLUG."_link_title",
		"std" => "",
		"type" => "text",
		"size" => "large"
	), 
);

$info = array(
    "id" => "portfolio_seo",
    "title" => "SEO",
    "post_type" => "portfolio",
	"context" => "normal",
	"priority" => "default"	
);

$page_option_settings = new MetaboxGenerator($info, $portfolio_options);