<?php

/******** Layout Settings ********/

$layout_settings = array();

$layout_settings[] = array( "type" => "html",
						"desc" => "These are controls the general layout of the theme in terms of which elements should be shown, their height & positioning, and highlights and accents." );

$layout_settings[] = array( "type" => "start",
						"name" => "Website Widths" );	

$layout_settings[] = array( "type" => "text",
						"name" => "Drop Shadow Width",
						"id" => THEME_SLUG."_drop_shadow_width",
						"std" => "1020px",
						"desc" => "If drop shadows are enabled this will be the entire width of your site. User px or %. *NOTE* This is for ADVANCED users only. May require custom css rules." );

$layout_settings[] = array( "type" => "text",
						"name" => "Main Content Area Width",
						"id" => THEME_SLUG."_main_content_width",
						"std" => "1000px",
						"desc" => "Enter the desired screen width for your main content here. Add px or % to the end of this value. If you are using drop shadows you'll want this value to be 98.25% *NOTE* This is for ADVANCED users only. May require custom css rules." );

$layout_settings[] = array( "type" => "text",
						"name" => "Main Content Area Padding",
						"id" => THEME_SLUG."_main_content_padding",
						"std" => "0px 20px 0px 20px",
						"desc" => "Sets the padding of the main content area. Eg: 20px 10px 30px 5px (Top Right Bottom Left). " );

$layout_settings[] = array( "type" => "text",
						"name" => "Main Content Area Max Width",
						"id" => THEME_SLUG."_main_content_max_width",
						"std" => "",
						"desc" => "Enter the desired maximum width for the content area (px only). This is if you want to stop the width from scaling up at a certain point at larger screen resolutions. The size has to be defined in pixels. *NOTE* This is for ADVANCED users only. May requires custom css rules." );
						
						$layout_settings[] = array( "type" => "text",
						"name" => "Main Content Area Min Width",
						"id" => THEME_SLUG."_main_content_min_width",
						"std" => "",
						"desc" => "Enter the desired minimum width for the content area (px only). This is if you want to stop the width from scaling down at a certain point at larger screen resolutions. The size has to be defined in pixels. *NOTE* This is for ADVANCED users only. May requires custom css rules." );
						
$layout_settings[] = array( "type" => "text",
						"name" => "Top Bar Content Width",
						"id" => THEME_SLUG."_topbar_content_width",
						"std" => "1000px",
						"desc" => "This is the width that all content in the top bar will be contained within. You'll usally want this a couple px or % less than what you set for the background width. If you are using drop shadows you'll want this value to be 98% *NOTE* This is for ADVANCED users only. May require custom css rules." );
											
$layout_settings[] = array( "type" => "text",
						"name" => "Header Content Width",
						"id" => THEME_SLUG."_header_content_width",
						"std" => "1000px",
						"desc" => "This is the width that all content in the header will be contained within. You'll usally want this a couple px or % less than what you set for the background width. If you are using drop shadows you'll want this value to be 98% *NOTE* This is for ADVANCED users only. May require custom css rules." );
												
$layout_settings[] = array( "type" => "text",
						"name" => "Widgetized Footer Area Width",
						"id" => THEME_SLUG."_widgetized_content_width",
						"std" => "1000px",
						"desc" => "This is the width that all content in the widgetized footer area will be contained within. You'll usally want this a couple px or % less than what you set for the background width. If you are using drop shadows you'll want this value to be 98% *NOTE* This is for ADVANCED users only. May require custom css rules." );	
						
$layout_settings[] = array( "type" => "text",
						"name" => "Bottom Footer Area Width",
						"id" => THEME_SLUG."_bottomfooter_content_width",
						"std" => "1000px",
						"desc" => "This is the width that all content in the bottom footer area will be contained within. You'll usally want this a couple px or % less than what you set for the background width. If you are using drop shadows you'll want this value to be 98% *NOTE* This is for ADVANCED users only. May require custom css rules." );
						
$layout_settings[] = array( "type" => "text",
						"name" => "Top Bar Background Width",
						"id" => THEME_SLUG."_topbar_background_width",
						"std" => "1000px",
						"desc" => "This is the width of the background of the top bar area. Without drop shadows this will be the actual width of the area, if you do have drop shadows enabled you'll want this value to be 98.25% *NOTE* This is for ADVANCED users only. May require custom css rules." );
						
$layout_settings[] = array( "type" => "text",
						"name" => "Header Background Width",
						"id" => THEME_SLUG."_header_background_width",
						"std" => "1000px",
						"desc" => "This is the width of the background of the header area. Without drop shadows this will be the actual width of the area, if you do have drop shadows enabled you'll want this value to be 98.25% *NOTE* This is for ADVANCED users only. May require custom css rules." );							
						
$layout_settings[] = array( "type" => "text",
						"name" => "Footer Background Width",
						"id" => THEME_SLUG."_footer_backgrounds_width",
						"std" => "1000px",
						"desc" => "This is the width of the background of the widgetized and bottom footer areas. Without drop shadows this will be the actual width of the area, if you do have drop shadows enabled you'll want this value to be 98.25% *NOTE* This is for ADVANCED users only. May require custom css rules." );	
						
/*$layout_settings[] = array( "type" => "text",
						"name" => "Content Padding (Mobile)",
						"id" => THEME_SLUG."_main_content_padding_mob",
						"std" => "10px",
						"desc" => "Sets the padding of the main content area when viewed on smaller screens. If not specified, the padding value same as that in desktop is used. Eg: 20px 10px 30px 5px (Top Right Bottom Left). " );*/
						
$layout_settings[] = array( "type" => "stop" );

$layout_settings[] = array( "type" => "start",
						"name" => "Highlight / Accents" );	

$layout_settings[] =  array( "type" => "colorpicker",
						"name" => "Accent / Highlight Color",
						"id" => THEME_SLUG."_secondarycolor",
						"std" => "013650",
						"desc" => "Set the color to be used for the accents/highlights on the website. These are seen as horizontal bars along the Top Bar area & Widgetized footer as well as color highlighting of words in heading text. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );
						
$layout_settings[] =  array( "type" => "toggle",
						"name" => "Top Bar",
						"id" => THEME_SLUG."_top_bar_highlight",
						"std" => "false",
						"size" => "small",
						"desc" => "Enables / Disables the accent bar attached to the Top Bar area." );

$layout_settings[] =  array( "type" => "toggle",
						"name" => "Widgetized Footer",
						"id" => THEME_SLUG."_footer_widgets_highlight",
						"std" => "false",
						"size" => "small",
						"desc" => "Enables / Disables the accent bar attached to the Widgetized Footer area." );	

$layout_settings[] =  array( "type" => "toggle",
						"name" => "Headings",
						"id" => THEME_SLUG."_headings_highlight",
						"std" => "false",
						"size" => "small",
						"desc" => "Enables / Disables the highlighting of words within Heading text." );	

$layout_settings[] =  array( "type" => "select",
						"name" => "Headings Words",
						"id" => THEME_SLUG."_headings_highlight_words",
						"data" => array(
									"last" => "Last word",
									"last_2" => "Last 2 words",
									"last_3" => "Last 3 words",
									"first" => "First word",
									"first_2" => "First 2 words",
									"first_3" => "First 3 words",
								),
						"std" => "last",
						"size" => "normal",
						"desc" => "Sets the number of words in headings that should be highlighted using the accent/highlight color set above." );	
						
$layout_settings[] = array( "type" => "stop" );


$layout_settings[] = array( "type" => "start",
						"name" => "Layouts" );
				
$layout_settings[] =  array( "type" => "select",
						"name" => "Top Bar",
						"id" => THEME_SLUG."_header_attachment",
						"std" => "full-width",
						"data" => array(
							"full-width" => "Full Width",
							"fixed-width-attached" => "Fixed Width Attached",
							"fixed-width-detached" => "Fixed Width Detached",
						),
						"desc" => "Full Width = The Top Bar will span the whole way across the site, Fixed Width Attached = The Top Bar will be a max width of 960px and will be attached to the top of the site, Fixed Width Detached = The Top Bar will be a max width of 960 px and will have some spacing between it and the top of the website." );
						
$layout_settings[] =  array( "type" => "select",
						"name" => "Header",
						"id" => THEME_SLUG."_header_layout",
						"std" => "full-width",
						"data" => array(
							"full-width" => "Full Width",
							"fixed-width" => "Fixed Width",
						),
						"desc" => "Full Width = The header will span the whole way across the site, Fixed Width = The header will be a max width of 960px" );						

$layout_settings[] =  array( "type" => "select",
						"name" => "Footer",
						"id" => THEME_SLUG."_footer_attachment",
						"std" => "full-width",
						"data" => array(
							"full-width" => "Full Width",
							"fixed-width-attached" => "Fixed Width Attached",
							"fixed-width-detached" => "Fixed Width Detached",
						),
						"desc" => "Full Width = The Bottom Footer and Widgetized Footer will span the whole way across the site, Fixed Width Attached = The Bottom Footer and Widgetized Footer will be a max width of 960px and will be attached to the bottom of the site, Fixed Width Detached = The Bottom Footer and Widgetized Footer will be a max width of 960 px and will have some spacing between it and the bottom of the website." );
	
$layout_settings[] =  array( "type" => "text",
						"name" => "Top Bar Minimum Height",
						"id" => THEME_SLUG."_top_bar_min_height",
						"std" => "33",
						"size" => "small",
						"desc" => "Sets a minimum height (in PX) for the Top Bar. The actual height may be more than this when displaying in mobile devices due to the responsive layout." );	

$layout_settings[] =  array( "type" => "text",
						"name" => "Header Minimum Height",
						"id" => THEME_SLUG."_header_min_height",
						"std" => "89",
						"size" => "small",
						"desc" => "Sets a minimum height (in PX) for the Header. The actual height may be more than this when displaying in mobile devices due to the responsive layout." );	

$layout_settings[] =  array( "type" => "text",
						"name" => "Widgetized Footer Minimum Height",
						"id" => THEME_SLUG."_widgetized_footer_min_height",
						"std" => "411",
						"size" => "small",
						"desc" => "Sets a minimum height (in PX) for the Widgetized Footer. The actual height may be more than this when displaying in mobile devices due to the responsive layout." );	

$layout_settings[] =  array( "type" => "text",
						"name" => "Footer Bar Minimum Height",
						"id" => THEME_SLUG."_footer_bar_min_height",
						"std" => "57",
						"size" => "small",
						"desc" => "Sets a minimum height (in PX) for the Bottom Footer. The actual height may be more than this when displaying in mobile devices due to the responsive layout." );	
					
$layout_settings[] = array( "type" => "stop" );


$layout_settings[] = array( "type" => "start",
						"name" => "Show / Hide Elements" );

$layout_settings[] = array(
						"name" => "Header",
						"desc" => "Globally shows/hides the Header on the site. This can be set individually on each page.",
						"id" => THEME_SLUG."_header_shown",
						"std" => "true",
						"type" => "toggle");

$layout_settings[] = array(
						"name" => "Top Bar",
						"desc" => "Globally shows/hides the Top Bar on the site. This area typically shows the social icons and phone number. This can be set individually on each page.",
						"id" => THEME_SLUG."_top_bar",
						"std" => "false",
						"type" => "toggle");
				
$layout_settings[] = array(
						"name" => "Logo",
						"desc" => "Globally shows/hides your Logo on the site. This can be set individually on each page.",
						"id" => THEME_SLUG."_logo",
						"std" => "true",
						"type" => "toggle");
												
$layout_settings[] = array(
						"name" => "Main Menu",
						"desc" => "Globally Shows/hides the Main Menu  on the site. This can be set individually on each page.",
						"id" => THEME_SLUG."_main_menu",
						"std" => "true",
						"type" => "toggle");
						
$layout_settings[] = array(
						"name" => "Header Divider",
						"desc" => "Globally shows/hides the Header Divider on the site. This is a simple line that divides the header and content area on the site. This can be set individually on each page.",
						"id" => THEME_SLUG."_header_divider",
						"std" => "false",
						"type" => "toggle");
						
$layout_settings[] = array(
						"name" => "Breadcrumbs",
						"desc" => "Globally shows/hides the Breadcrumb on the site. The breadcrumb shows up under the header area. This can be set individually on each page.",
						"id" => THEME_SLUG."_breadcrumbs",
						"std" => "false",
						"type" => "toggle");
					
$layout_settings[] = array(
						"name" => "Page Title",
						"desc" => "Globally shows/hides the Title Heading on each page. This can be set individually on each page.",
						"id" => THEME_SLUG."_heading",
						"std" => "false",
						"type" => "toggle");
						
$layout_settings[] = array(
						"name" => "Widgetized Footer",
						"desc" => "Globally shows/hides the Widgetized Footer on the site. This can be set individually on each page.",
						"id" => THEME_SLUG."_footer_widgets",
						"std" => "false",
						"type" => "toggle");
						
$layout_settings[] = array(
						"name" => "Bottom Footer",
						"desc" => "Globally shows/hides the Bottom Footer on the site. This can be set individually on each page.",
						"id" => THEME_SLUG."_bottom_footer",
						"std" => "true",
						"type" => "toggle");
						
$layout_settings[] = array( "type" => "stop" );


$layout_settings[] = array( "type" => "start",
						"name" => "Side Gradients / Drop Shadows" );	

$layout_settings[] =  array( "type" => "select",
						"name" => "Side Shadow Gradients",
						"id" => THEME_SLUG."_bggradient",
						"std" => "light",
						"data" => array(
							"" => "None",
							"dark" => "Dark",
							"medium" => "Medium",
							"light" => "Light"
						),				
						"desc" => "Dark side gradients appear on the left and right side of you site and span vertically to give the illusion of depth on your site. Remove or sets the darkness of the side gradients here." );
						
$layout_settings[] = array(
						"name" => "Drop Shadows",
						"desc" => "Shows/hides a dropshadow on the sides of the content area.",
						"id" => THEME_SLUG."_box_shadow",
						"std" => "false",
						"type" => "toggle");
							
$layout_settings[] = array( "type" => "stop" );


$layout_settings[] = array( "type" => "start",
						"name" => "Top Bar Widget Area" );	

$layout_settings[] =  array( "type" => "select",
						"name" => "Alignment",
						"id" => THEME_SLUG."_top_toolbar_align",
						"std" => "top-toolbar-right",
						"data" => array( 
								"top-toolbar-left" => "Left",
								"top-toolbar-right" => "Right",
						),
						"size" => "medium",
						"desc" => "Sets the horizontal alignment of the top bar widgets area." );
							
$layout_settings[] = array( "type" => "stop" );


$layout_settings[] = array( "type" => "start",
						"name" => "Header Widget Area" );	

$layout_settings[] =  array( "type" => "select",
						"name" => "Alignment",
						"id" => THEME_SLUG."_top_header_align",
						"std" => "top-header-right",
						"data" => array( 
								"top-header-left" => "Left",
								"top-header-right" => "Right",
								"top-header-center" => "Center",
						),
						"size" => "medium",
						"desc" => "Sets the horizontal alignment of the header widgets area." );

$layout_settings[] =  array( "type" => "text",
						"name" => "Padding",
						"id" => THEME_SLUG."_top_header_padding",
						"std" => "0",
						"size" => "medium",
						"desc" => "Sets the padding of the header widgets area. Eg: 20px 10px 30px 5px (Top Right Bottom Left)" );
							
$layout_settings[] = array( "type" => "stop" );
				

$layout_settings[] = array( "type" => "start",
						"name" => "Buttons" );	
		
$layout_settings[] =  array( "type" => "colorpicker",
						"name" => "Button Default Color",
						"id" => THEME_SLUG."_buttoncolor",
						"std" => "006FA4",
						"desc" => "Sets the global default color of buttons. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );	
						
$layout_settings[] = array( "type" => "stop" );


$layout_settings[] = array( "type" => "start",
						"name" => "Footer" );

$layout_settings[] =  array( "type" => "select",
						"name" => "Widgetized Footer Layout",
						"id" => THEME_SLUG."_footer_columns",
						"std" => "one-fourth",
						"data" => array( 
								"one" => "One column",
								"one-half" => "Two columns",
								"one-third" => "Three columns",
								"one-fourth" => "Four columns",								
						),
						"size" => "medium",
						"desc" => "Set how many columns should be in the widgetized footer" );	

$layout_settings[] =  array( "type" => "select",
						"name" => "Responsive Behavior",
						"id" => THEME_SLUG."_footer_columns_responsive",
						"std" => "stack",
						"data" => array( 
								"scale" => "Scale",
								"stack" => "Stack",
						),
						"size" => "medium",
						"desc" => "Set the footer widgets to stack or scale in mobile/tablets." );	
						
$layout_settings[] =  array( "type" => "select",
						"name" => "Bottom Footer Layout",
						"id" => THEME_SLUG."_footer_bar_layout",
						"std" => "layout-1",
						"data" => array( 
								"layout-1" => "Layout 1",
								"layout-2" => "Layout 2",
								"layout-3" => "Layout 3",
								"layout-4" => "Layout 4",
						),
						"size" => "small",
						"desc" => "Select the premade Bottom Footer layout." );
						
$layout_settings[] =  array( "type" => "textarea",
						"name" => "Copyright Text",
						"id" => THEME_SLUG."_copyright_text",
						"std" => "Copyright &copy; 2013. All rights reserved. Powered by <a href=\"http://revowp.com\">Revo Framework</a>",
						"desc" => "This is your copyright disclaimer that will appear at the bottom of every page on your site. This area supports HTML code." );							
					
$layout_settings[] = array( "type" => "stop" );


$theme_options[] =  array( "name" => "Layouts / Elements",
					"id" => "layouts",
					"slug" => "layouts",
					"options" => $layout_settings
				);	
