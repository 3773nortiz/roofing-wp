<?php
/***** Page Options *****/

if(get_option(THEME_SLUG."_seo") == "true"){

$page_general_settings = array(
	array(
		"name" => "Meta Keywords",
		"desc" => "Enter a comma-separated list of keywords, this will override the default meta keywords.",
		"id" => THEME_SLUG."_meta_keywords",
		"std" => "",
		"type" => "text",
		"size" => "large"
	),
	
	array(
		"name" => "Meta Description",
		"desc" => "Enter a description, in most cases this is what gets displayed on a Search Engine results page. This will override the default meta description.",
		"id" => THEME_SLUG."_meta_description",
		"std" => "",
		"type" => "text",
		"size" => "large"
	),
	
	array(
		"name" => "Title",
		"desc" => "Enter a different page title which will be used for SEO.",
		"id" => THEME_SLUG."_meta_title",
		"std" => "",
		"type" => "text",
		"size" => "large"
	),
	
	array(
		"name" => "Visibility",
		"desc" => "",
		"id" => THEME_SLUG."_visibility",
		"std" => "",
		"type" => "checkbox",
		"data" => array(
			"robots" => "Check this to hide the page/post from Search Engines.",
			"sitemap" => "Check this to hide the page/post from Sitemap.",
		),
	),
);
	
$info = array(
    "id" => "page_seo",
    "title" => "SEO",
    "post_type" => "page",
	"context" => "normal",
	"priority" => "high"	
);

$page_option_settings = new MetaboxGenerator($info, $page_general_settings);

$info = array(
    "id" => "page_seo",
    "title" => "SEO",
    "post_type" => "post",
	"context" => "normal",
	"priority" => "high"	
);

$page_option_settings = new MetaboxGenerator($info, $page_general_settings);

}

$page_general_settings = array(
	
        array(
                "name" => "Header",
                "desc" => "",
                "id" => THEME_SLUG."_page_header_shown",
                "std" => "",
                "data" => array("" => "Show", "false" => "Hide"),
                "type" => "radio"
        ),
        
        array(
		"name" => "Top Bar",
		"desc" => "",
		"id" => THEME_SLUG."_page_top_bar",
		"std" => "",
		"data" => array("" => "Show", "false" => "Hide"),
		"type" => "radio"
	),
	array(
		"name" => "Logo",
		"desc" => "",
		"id" => THEME_SLUG."_page_logo",
		"std" => "",
		"data" => array("" => "Show", "false" => "Hide"),
		"type" => "radio"
	),
	array(
		"name" => "Main Menu",
		"desc" => "",
		"id" => THEME_SLUG."_page_main_menu",
		"std" => "",
		"data" => array("" => "Show", "false" => "Hide"),
		"type" => "radio"
	),
	array(
		"name" => "Header Divider",
		"desc" => "",
		"id" => THEME_SLUG."_page_header_divider",
		"std" => "",
		"data" => array("" => "Show", "false" => "Hide"),
		"type" => "radio"
	),
	array(
		"name" => "Breadcrumbs",
		"desc" => "",
		"id" => THEME_SLUG."_page_breadcrumbs",
		"std" => "",
		"data" => array("" => "Show", "false" => "Hide"),
		"type" => "radio"
	),
	array(
		"name" => "Page Title",
		"desc" => "",
		"id" => THEME_SLUG."_page_heading",
		"std" => "",
		"data" => array("" => "Show", "false" => "Hide"),
		"type" => "radio"
	),
	array(
		"name" => "Widgetized Footer",
		"desc" => "",
		"id" => THEME_SLUG."_page_footer_widgets",
		"std" => "",
		"data" => array("" => "Show", "false" => "Hide"),
		"type" => "radio"
	),
	array(
		"name" => "Bottom Footer",
		"desc" => "",
		"id" => THEME_SLUG."_page_bottom_footer",
		"std" => "",
		"data" => array("" => "Show", "false" => "Hide"),
		"type" => "radio"
	),	
);

$info = array(
    "id" => "disable_page_elements",
    "title" => "Hide Page Elements",
    "post_type" => "page",
	"context" => "side",
	"priority" => "default"	
);

$page_option_settings = new MetaboxGenerator($info, $page_general_settings);


$post_general_settings = array(
	array(
		"name" => "Caption",
		"desc" => "",
		"id" => THEME_SLUG."_post_image_caption",
		"std" => "",
		"type" => "text",
		"size" => "large",
	),
);

$info = array(
    "id" => "image_caption",
    "title" => "Featured Image Caption",
    "post_type" => "post",
	"context" => "normal",
	"priority" => "default"	
);

$post_general_settings = new MetaboxGenerator($info, $post_general_settings);

