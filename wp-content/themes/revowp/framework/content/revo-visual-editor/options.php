<?php

$visual_editor_settings = array();

$visual_editor_settings['general_colors'][VE_THEME_SLUG."_primary_color"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_primary_color",
															"value" => get_option(THEME_SLUG."_post_date_font_color"),
															"info" => "<b>Primary Color Block = </b>Used For Generating All Complimenting Colors (When set you must click generate for colors to be generated)",
														);
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_h1_font_color"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_h1_font_color",
															"info" => "<b>Block 1 = </b>Headings (H1, H2, H3&#8230;etc.)",
														);
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_gcontent_font_color"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_gcontent_font_color",
															"info" => "<b>Block 2 = </b>General Content",
														);
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_button_font_color"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_button_font_color",
															"info" => "<b>Block 3 = </b>Menu Font, Button Font,  Header/Footer links",
														);														
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_header_bgcolor"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_header_bgcolor",
															"info" => "<b>Block 4 = </b>Header Area Background",
														);	
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_bgcolor"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_bgcolor",
															"info" => "<b>Block 5 = </b>Whole Site Background",
														);	
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_top_toolbar_bgcolor"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_top_toolbar_bgcolor",
															"info" => "<b>Block 6 = </b>Widgetized Footer &amp; Top Bar",
														);															
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_footer_bar_bgcolor"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_footer_bar_bgcolor",
															"info" => "<b>Block 7 = </b>Bottom Footer",
														);
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_buttoncolor"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_buttoncolor",
															"info" => "<b>Block 8 = </b>Buttons &amp; Modern/Executive Menu BG color",
														);
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_content_bgcolor"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_content_bgcolor",
															"info" => "<b>Block 9 = </b>Content Area",
														);														
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_secondarycolor"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_secondarycolor",
															"info" => "<b>Block 10 = </b>Highlight Color",
														);
$visual_editor_settings['general_colors'][VE_THEME_SLUG."_linkcolor"] = array(
															"type" => "colorpicker",
															"id" => VE_THEME_SLUG."_linkcolor",
															"info" => "<b>Block 11 = </b>Content Area Links",
														);

$visual_editor_settings['general_gradients'][VE_THEME_SLUG."_gradience"] = array(
															"type" => "radio_group",
															"id" => VE_THEME_SLUG."_gradience",
															"data" => array( 
																	"light" => "Light",
																	"dark" => "Dark",
																	"" => "None",
															),
														);

$visual_editor_settings['general_text_shadow'][VE_THEME_SLUG."_text_shadow"] = array(
															"type" => "radio_group",
															"id" => VE_THEME_SLUG."_text_shadow",
															"data" => array( 
																	"light" => "Light",
																	"dark" => "Dark",
																	"" => "None",
															),
														);
														
$visual_editor_settings['general_menu_style'][VE_THEME_SLUG."_menu_style"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_menu_style",
															"data" => array( 
																	"modern-menu" => "Modern",
																	"executive-menu" => "Executive",
																	"elegant-menu" => "Elegant",
																	"plain-menu" => "Plain",
															),
														);
$visual_editor_settings['general_menu_style'][VE_THEME_SLUG."_menu_align"] = array( 
															"type" => "select",
															"id" => VE_THEME_SLUG."_menu_align",
															"data" => array( 
																	"menu-left" => "Left",
																	"menu-right" => "Right",
																	"menu-center" => "Center",
																	"menu-justify" => "Justify",
															),
														);						
$visual_editor_settings['general_menu_style'][VE_THEME_SLUG."_mainmenu_padding"] = array( 
															"type" => "pixel",
															"id" => VE_THEME_SLUG."_mainmenu_padding",
															"min"	=> 	8,
															"max"	=>	25,
														);		

$visual_editor_settings['heading_content'][VE_THEME_SLUG."_h1_font_family"] = array(
															"type" => "font",
															"id" => VE_THEME_SLUG."_h1_font_family",
														);
$visual_editor_settings['heading_content'][VE_THEME_SLUG."_h1_font_size"] = array( 
															"type" => "pixel",
															"id" => VE_THEME_SLUG."_h1_font_size",
															"min"	=> 	24,
															"max"	=>	36,
														);	
														
$visual_editor_settings['general_content'][VE_THEME_SLUG."_gcontent_font_family"] = array(
															"type" => "font",
															"id" => VE_THEME_SLUG."_gcontent_font_family",
														);
$visual_editor_settings['general_content'][VE_THEME_SLUG."_gcontent_font_size"] = array( 
															"type" => "pixel",
															"id" => VE_THEME_SLUG."_gcontent_font_size",
															"min"	=> 	12,
															"max"	=>	17,
														);						
														
$visual_editor_settings['general_background'][VE_THEME_SLUG."_bgpattern"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_bgpattern",
															"data" => $textures,
														);	
$visual_editor_settings['general_background'][VE_THEME_SLUG."_bgimage"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_bgimage",
															"root" => THEME_BACKGROUNDS,
															"data" => array(
																'none' => 'None',
																'abstract-icon1.jpg' => 'Abstract Icon 1',
																'abstract-icon2.jpg' => 'Abstract Icon 2',
																'abstract-icon3.jpg' => 'Abstract Icon 3',
																'abstract-icon4.jpg' => 'Abstract Icon 4',
																'abstract-icon5.jpg' => 'Abstract Icon 5',
																'abstract-overlay.png' => 'Abstract Overlay',
																'angular.png' => 'Angular 1',
																'angular-2.png' => 'Angular 2',
																'brick-1.jpg' => 'Brick 1',
																'brick-2.jpg' => 'Brick 2',
																'brick-3.jpg' => 'Brick 3',
																'brick-4.jpg' => 'Brick 4',
																'brick-5.jpg' => 'Brick 5',
																'brick-6.jpg' => 'Brick 6',																
																'bubbled.png' => 'Bubbled',
																'diamonds.png' => 'Diamonds',
																'grunge-1.png' => 'Grunge',
																'paper-1.jpg' => 'Paper',
																'pastel.png' => 'Pastel',
																'tile.jpg' => 'Tile',
																'tropical-1.jpg' => 'Tropical 1',
																'tropical-2.jpg' => 'Tropical 2',
																'tropical-3.jpg' => 'Tropical 3',
																'tropical-4.png' => 'Tropical 4',
																'tropical-5.jpg' => 'Tropical 5',
																'tunnel.jpg' => 'Tunnel',
																'wallpaper.png' => 'Wallpaper',
																'wood-1.jpg' => 'Wood 1',
																'wood-2.jpg' => 'Wood 2',
																'wood-3.jpg' => 'Wood 3',
															),
														);															
														
$visual_editor_settings['general_side_gradient'][VE_THEME_SLUG."_bggradient"] = array( 
															"type" => "select",
															"id" => VE_THEME_SLUG."_bggradient",
															"lock" => true,
															"data" => array(
																"" => "None",
																"dark" => "Dark",
																"medium" => "Medium",
																"light" => "Light"
															),				
														);
$visual_editor_settings['general_side_gradient'][VE_THEME_SLUG."_box_shadow"] = array( 
															"type" => "select",
															"id" => VE_THEME_SLUG."_box_shadow",
															"lock" => true,
															"data" => array(
																"true" => "Yes",
																"false" => "No",
															),				
														);
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_header"] = array(
															"name"	=>	"Header",
															"id"	=> 	VE_THEME_SLUG."_header",
															"type" 	=> 	"toggle",
														);
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_top_bar"] = array(
															"name"	=>	"Top Bar",
															"id"	=> 	VE_THEME_SLUG."_top_bar",
															"type" 	=> 	"toggle",
														);
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_footer_widgets"] = array(
															"name"	=>	"Widgetized Footer",
															"id"	=> 	VE_THEME_SLUG."_footer_widgets",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_breadcrumbs"] = array(
															"name"	=>	"Breadcrumb",
															"id"	=> 	VE_THEME_SLUG."_breadcrumbs",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_heading"] = array(
															"name"	=>	"Page Title",
															"id"	=> 	VE_THEME_SLUG."_heading",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_header_divider"] = array(
															"name"	=>	"Header Divider",
															"id"	=> 	VE_THEME_SLUG."_header_divider",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_bottom_footer"] = array(
															"name"	=>	"Bottom Footer",
															"id"	=> 	VE_THEME_SLUG."_bottom_footer",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_main_menu"] = array(
															"name"	=>	"Main Menu",
															"id"	=> 	VE_THEME_SLUG."_main_menu",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_page_elements'][VE_THEME_SLUG."_logo"] = array(
															"name"	=>	"Logo",
															"id"	=> 	VE_THEME_SLUG."_logo",
															"type" 	=> 	"toggle",
														);		
														
$visual_editor_settings['elements_highlights'][VE_THEME_SLUG."_top_bar_highlight"] = array(
															"name"	=>	"Top Bar",
															"id"	=> 	VE_THEME_SLUG."_top_bar_highlight",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_highlights'][VE_THEME_SLUG."_headings_highlight"] = array(
															"name"	=>	"Heading",
															"id"	=> 	VE_THEME_SLUG."_headings_highlight",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_highlights'][VE_THEME_SLUG."_footer_widgets_highlight"] = array(
															"name"	=>	"Footer",
															"id"	=> 	VE_THEME_SLUG."_footer_widgets_highlight",
															"type" 	=> 	"toggle",
														);			

$visual_editor_settings['elements_backgrounds'][VE_THEME_SLUG."_content_bg"] = array(
															"name"	=>	"Content Area",
															"id"	=> 	VE_THEME_SLUG."_content_bg",
															"type" 	=> 	"toggle",
														);
$visual_editor_settings['elements_backgrounds'][VE_THEME_SLUG."_header_bg"] = array(
															"name"	=>	"Header",
															"id"	=> 	VE_THEME_SLUG."_header_bg",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_backgrounds'][VE_THEME_SLUG."_top_toolbar_bg"] = array(
															"name"	=>	"Top Bar",
															"id"	=> 	VE_THEME_SLUG."_top_toolbar_bg",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_backgrounds'][VE_THEME_SLUG."_footer_bg"] = array(
															"name"	=>	"Widgetized Footer",
															"id"	=> 	VE_THEME_SLUG."_footer_bg",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_backgrounds'][VE_THEME_SLUG."_footer_bar_bg"] = array(
															"name"	=>	"Bottom Footer",
															"id"	=> 	VE_THEME_SLUG."_footer_bar_bg",
															"type" 	=> 	"toggle",
														);		

$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."_content_area_gradient"] = array(
															"name"	=>	"Content Area",
															"id"	=> 	VE_THEME_SLUG."_content_area_gradient",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."_top_bar_gradient"] = array(
															"name"	=>	"Top Bar",
															"id"	=> 	VE_THEME_SLUG."_top_bar_gradient",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."_bottom_footer_gradient"] = array(
															"name"	=>	"Bottom Footer",
															"id"	=> 	VE_THEME_SLUG."_bottom_footer_gradient",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."_mainmenu_gradient"] = array(
															"name"	=>	"Main Menu",
															"id"	=> 	VE_THEME_SLUG."_mainmenu_gradient",
															"type" 	=> 	"toggle",
														);
$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."_header_gradient"] = array(
															"name"	=>	"Header",
															"id"	=> 	VE_THEME_SLUG."_header_gradient",
															"type" 	=> 	"toggle",
														);	
$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."_widgetized_footer_gradient"] = array(
															"name"	=>	"Widgetized Footer",
															"id"	=> 	VE_THEME_SLUG."_widgetized_footer_gradient",
															"type" 	=> 	"toggle",
														);
$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."_site_gradient"] = array(
															"name"	=>	"Whole Site",
															"id"	=> 	VE_THEME_SLUG."_site_gradient",
															"type" 	=> 	"toggle",
														);	
														
$visual_editor_settings['layout_top_bar_height'][VE_THEME_SLUG."_top_bar_min_height"] = array(
															"id"	=> 	VE_THEME_SLUG."_top_bar_min_height",
															"type" 	=> 	"pixel",
															"min"	=> 	30,
															"max"	=>	35,
														);	
$visual_editor_settings['layout_header_height'][VE_THEME_SLUG."_header_min_height"] = array(
															"id"	=> 	VE_THEME_SLUG."_header_min_height",
															"type" 	=> 	"pixel",
															"min"	=> 	50,
															"max"	=>	160,
														);	
$visual_editor_settings['layout_footer_bar_height'][VE_THEME_SLUG."_footer_bar_min_height"] = array(
															"id"	=> 	VE_THEME_SLUG."_footer_bar_min_height",
															"type" 	=> 	"pixel",
															"min"	=> 	35,
															"max"	=>	80,
														);
$visual_editor_settings['layout_widgetized_footer_height'][VE_THEME_SLUG."_widgetized_footer_min_height"] = array(
															"id"	=> 	VE_THEME_SLUG."_widgetized_footer_min_height",
															"type" 	=> 	"pixel",
															"min"	=> 	200,
															"max"	=>	430,
														);																
$visual_editor_settings['layout_header_bar'][VE_THEME_SLUG."_header_attachment"] = array(
															"id"	=> 	VE_THEME_SLUG."_header_attachment",
															"type"	=>	"select",
															"data" => array(
																			"full-width" => "Full Width",
																			"fixed-width-attached" => "Fixed Width Attached",
																			"fixed-width-detached" => "Fixed Width Detached",
																		),
														);																
$visual_editor_settings['layout_header'][VE_THEME_SLUG."_header_layout"] = array(
															"id"	=> 	VE_THEME_SLUG."_header_layout",
															"type"	=>	"select",
															"data" => array(
																			"full-width" => "Full Width",
																			"fixed-width" => "Fixed Width",
																		),
														);	
$visual_editor_settings['layout_footer'][VE_THEME_SLUG."_footer_attachment"] = array(
															"id"	=> 	VE_THEME_SLUG."_footer_attachment",
															"type"	=>	"select",
															"data" => array(
																			"full-width" => "Full Width",
																			"fixed-width-attached" => "Fixed Width Attached",
																			"fixed-width-detached" => "Fixed Width Detached",
																		),
														);	
$visual_editor_settings['misc_social_icons'][VE_THEME_SLUG."_social_buttons_top"] = array(
															"type" => "radio_group",
															"id" => VE_THEME_SLUG."_social_buttons_top",
															"data" => array( 
																"left" => "Left",
																"right" => "Right",
																"hide" => "Hide",
															),
														);
$visual_editor_settings['misc_blog_layouts'][VE_THEME_SLUG."_blog_layouts_sidebar"] = array(
															"id"	=> 	VE_THEME_SLUG."_blog_layouts_sidebar",
															"type"	=>	"select",
															"data" => array(
																			"layout-1_none" => "Modern - Full Width",
																			"layout-1_right" => "Modern - Right Bar",
																			"layout-1_left" => "Modern - Left Bar",
																			"layout-2_none" => "Basic - Full Width",
																			"layout-2_right" => "Basic - Right Bar",
																			"layout-2_left" => "Basic - Left Bar",	
																			"layout-3_none" => "Elegant Box - Full Width",
																			"layout-3_right" => "Elegant Box - Right Bar",
																			"layout-3_left" => "Elegant Box - Left Bar",																				
																		),
														);			
$visual_editor_settings['misc_logo_style'][VE_THEME_SLUG."_logo_position"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_logo_position",
															"data" => array( 
																	"header" => "Header",
																	"toptoolbar" => "Top Bar",
															),
														);
$visual_editor_settings['misc_logo_style'][VE_THEME_SLUG."_logo_align"] = array( 
															"type" => "select",
															"id" => VE_THEME_SLUG."_logo_align",
															"data" => array( 
																	"logo-left" => "Left",
																	"logo-right" => "Right",
																	"logo-center" => "Center",
															),
														);
														
$visual_editor_settings['misc_area_patterns'][VE_THEME_SLUG."_top_toolbar_bgpattern"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_top_toolbar_bgpattern",
															"data" => $textures,
														);	
$visual_editor_settings['misc_area_patterns'][VE_THEME_SLUG."_header_bgpattern"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_header_bgpattern",
															"data" => $textures,
														);	
$visual_editor_settings['misc_area_patterns'][VE_THEME_SLUG."_content_bgpattern"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_content_bgpattern",
															"data" => $textures,
														);	
$visual_editor_settings['misc_area_patterns'][VE_THEME_SLUG."_footer_bgpattern"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_footer_bgpattern",
															"data" => $textures,
														);	
$visual_editor_settings['misc_area_patterns'][VE_THEME_SLUG."_footer_bar_bgpattern"] = array(
															"type" => "select",
															"id" => VE_THEME_SLUG."_footer_bar_bgpattern",
															"data" => $textures,
														);	

/*Setting default values for the fields directly defined in the database
  The values for all other fields will be fetched mannually
*/

foreach ($visual_editor_settings as $key=>$settings) {
			foreach ($settings as $id=>$option) {
				if(get_option($id)||(isset($visual_editor_settings[$key][$id]["value"])))
				{	$visual_editor_settings[$key][$id]["value"]=get_option($id);}
				//else
					//echo "No $id </br>";
		}
	}	
//print_r($visual_editor_settings);

/*
Mannualy Fetching the default values for the for the fields not defined directly in the Database
*/

/*Text Shadows	-	All the shadow related options are set together, so checking for one of the options can fetch the saved value of this field*/
if(get_option(THEME_SLUG.'_post_title_text_shadow')=='none')
	$visual_editor_settings['general_text_shadow'][VE_THEME_SLUG."_text_shadow"]["value"]="";
else if(get_option(THEME_SLUG.'_post_title_text_shadow')=='fafafa')
	$visual_editor_settings['general_text_shadow'][VE_THEME_SLUG."_text_shadow"]["value"]="light";
else
	$visual_editor_settings['general_text_shadow'][VE_THEME_SLUG."_text_shadow"]["value"]="dark";

/*	Main Gradients	-	First, it is to be checked if individual element gradients are set, if any one of the individual gradients are set, the main gradience field is set */
$gradient_fields=array(
'_content_area_gradient'=>'_content_bgcolor',
'_top_bar_gradient'=>'_top_toolbar_bgcolor',
'_bottom_footer_gradient'=>'_footer_bar_bgcolor',
'_mainmenu_gradient'=>'_modernmenu',
'_header_gradient'=>'_header_bgcolor',
'_widgetized_footer_gradient'=>'_footer_bgcolor',
'_site_gradient'=>'_bgcolor');
$visual_editor_settings['general_gradients'][VE_THEME_SLUG."_gradience"]['value']="none";			//Default value to be set for gradience
foreach($gradient_fields as $editor_option=>$theme_option)
{
	if(get_option(THEME_SLUG.$theme_option.'_gradient')=="")
		$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."$editor_option"]['value']='false';
	else 
	{
		$visual_editor_settings['elements_gradients'][VE_THEME_SLUG."$editor_option"]['value']='true';
		if(get_option(THEME_SLUG.$theme_option.'_gradient')==visual_editor_color_luminance(get_option(THEME_SLUG.$theme_option),0.45))
			$visual_editor_settings['general_gradients'][VE_THEME_SLUG.'_gradience']['value']="light";
		else
			$visual_editor_settings['general_gradients'][VE_THEME_SLUG.'_gradience']['value']="dark";
	}
}
//print_r($visual_editor_settings['elements_gradients']);
//print_r($visual_editor_settings['general_gradients']);

/*	Element Backgrounds	-	First, it is to be checked if individual element backgrounds are set, if any one of the individual backgrounds are set, the main background field is set */
$bg_fields=array('_content_bg','_header_bg','_top_toolbar_bg','_footer_bg','_footer_bar_bg');
foreach($bg_fields as $bg_field)
{
	if((get_option(THEME_SLUG.$bg_field.'color')=="")&&(get_option(THEME_SLUG.$bg_field.'image')==""))
		$visual_editor_settings['elements_backgrounds'][VE_THEME_SLUG."$bg_field"]['value']='false';
	else
		$visual_editor_settings['elements_backgrounds'][VE_THEME_SLUG."$bg_field"]['value']='true';
}
//print_r($visual_editor_settings['elements_backgrounds']);

/*Sidebar Layout and Menu Style	*/
$visual_editor_settings['misc_blog_layouts'][VE_THEME_SLUG."_blog_layouts_sidebar"]['value']=implode('_',array(get_option(THEME_SLUG."_blog_layout"),get_option(THEME_SLUG."_blog_sidebar")));