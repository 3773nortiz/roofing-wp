<?php

/******** Font Settings ********/

$font_settings = array();

$font_settings[] = array( "type" => "html",
						"desc" => "These settings allow you to control which fonts should be used for various elements on your website such as Headings, Buttons, Content, Pricing Blocks, Image Captions and More." );


$font_settings[] = array( "type" => "start",
						"name" => "Accordions" );	

$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_accordion_font_size",
						"std" => "19",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_accordion_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_accordion_font_color",
						"std" => "DBEBF2",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	
						
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_accordion_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_accordion_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Bar Graph" );	

$font_settings[] = array( "type" => "text",
						"name" => "Bar Graph Size (Px)",
						"id" => THEME_SLUG."_bar_graph_size",
						"std" => "20",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Bar Graph Style",
						"id" => THEME_SLUG."_bar_graph_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Bar Graph Button Text Shadow",
						"id" => THEME_SLUG."_bar_graph_btn_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Bar Graph Percent Text Shadow",
						"id" => THEME_SLUG."_bar_graph_pct_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Bar Graph Font Family",
						"id" => THEME_SLUG."_bar_graph_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Blog Elements" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Post Title Size (Px)",
						"id" => THEME_SLUG."_post_title_font_size",
						"std" => "23",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Post Title Style",
						"id" => THEME_SLUG."_post_title_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Post Title Color",
						"id" => THEME_SLUG."_post_title_font_color",
						"std" => "006FA4",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Post Title Text Shadow",
						"id" => THEME_SLUG."_post_title_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Post Title Font Family",
						"id" => THEME_SLUG."_post_title_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "text",
						"name" => "Post Date Size (Px)",
						"id" => THEME_SLUG."_post_date_font_size",
						"std" => "29",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Post Date Style",
						"id" => THEME_SLUG."_post_date_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Post Date Color",
						"id" => THEME_SLUG."_post_date_font_color",
						"std" => "ffffff",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Post Date Text Shadow",
						"id" => THEME_SLUG."_post_date_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Post Date Font Family",
						"id" => THEME_SLUG."_post_date_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "text",
						"name" => "Post Month Size (Px)",
						"id" => THEME_SLUG."_post_month_font_size",
						"std" => "16",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Post Month Style",
						"id" => THEME_SLUG."_post_month_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Post Month Color",
						"id" => THEME_SLUG."_post_month_font_color",
						"std" => "CEDE44",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Post Month Text Shadow",
						"id" => THEME_SLUG."_post_month_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Post Month Font Family",
						"id" => THEME_SLUG."_post_month_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "text",
						"name" => "Comment Count Size (Px)",
						"id" => THEME_SLUG."_comments_count_font_size",
						"std" => "16",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Comment Count Style",
						"id" => THEME_SLUG."_comments_count_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Comment Count Color",
						"id" => THEME_SLUG."_comments_count_font_color",
						"std" => "CEDE44",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Comment Count Text Shadow",
						"id" => THEME_SLUG."_comments_count_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Comment Count Font Family",
						"id" => THEME_SLUG."_comments_count_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
				
$font_settings[] = array( "type" => "text",
						"name" => "Post Meta Size (Px)",
						"id" => THEME_SLUG."_post_meta_font_size",
						"std" => "13",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Post Meta Style",
						"id" => THEME_SLUG."_post_meta_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Post Meta Color",
						"id" => THEME_SLUG."_post_meta_font_color",
						"std" => "999999",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Post Meta Text Shadow",
						"id" => THEME_SLUG."_post_meta_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Post Meta Font Family",
						"id" => THEME_SLUG."_post_meta_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Bottom Footer" );	

$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_bottom_footer_font_size",
						"std" => "12",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
													
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_bottom_footer_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_bottom_footer_font_color",
						"std" => "ffffff",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_bottom_footer_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_bottom_footer_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Breadcrumbs" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_breadcrumb_font_size",
						"std" => "11",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_breadcrumb_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_breadcrumb_font_color",
						"std" => "888888",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_breadcrumb_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_breadcrumb_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Button" );	

$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_button_font_size",
						"std" => "16",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_button_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_button_font_color",
						"std" => "DBEBF2",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_button_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_button_font_family",
						"std" => "google::Yanone+Kaffeesatz",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Feature Snippets" );	
					
$font_settings[] = array( "type" => "text",
						"name" => "Heading Size (Px)",
						"id" => THEME_SLUG."_feature_snippets_header_font_size",
						"std" => "19",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Heading Style",
						"id" => THEME_SLUG."_feature_snippets_header_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Heading Color",
						"id" => THEME_SLUG."_feature_snippets_header_font_color",
						"std" => "666666",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Heading Text Shadow",
						"id" => THEME_SLUG."_feature_snippets_header_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Heading Font Family",
						"id" => THEME_SLUG."_feature_snippets_header_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );

$font_settings[] = array( "type" => "html",
						"desc" => "" );
						
$font_settings[] = array( "type" => "text",
						"name" => "Content Size (Px)",
						"id" => THEME_SLUG."_feature_snippets_content_font_size",
						"std" => "15",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Content Style",
						"id" => THEME_SLUG."_feature_snippets_content_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Content Color",
						"id" => THEME_SLUG."_feature_snippets_content_font_color",
						"std" => "",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Content Text Shadow",
						"id" => THEME_SLUG."_feature_snippets_content_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
							
$font_settings[] = array( "type" => "font",
						"name" => "Content Font Family",
						"id" => THEME_SLUG."_feature_snippets_content_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );						
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Footer Menu" );	

$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_footer_menu_font_size",
						"std" => "12",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
														
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_footer_menu_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
						
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_footer_menu_font_color",
						"std" => "ffffff",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_footer_menu_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_footer_menu_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Form Labels" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_form_label_font_size",
						"std" => "16",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_form_label_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_form_label_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_form_label_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_form_label_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );

						
$font_settings[] = array( "type" => "start",
						"name" => "General Content" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_gcontent_font_size",
						"std" => "15",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_gcontent_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_gcontent_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	
						
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_gcontent_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );						

$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_gcontent_font_family",
						"std" => "google::Antic",
						"data" => array('general','google'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );						


$font_settings[] = array( "type" => "start",
						"name" => "H1" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_h1_font_size",
						"std" => "29",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
			
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_h1_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_h1_font_color",
						"std" => "666666",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_h1_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_h1_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "H2" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_h2_font_size",
						"std" => "23",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_h2_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_h2_font_color",
						"std" => "666666",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_h2_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_h2_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "H3" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_h3_font_size",
						"std" => "19",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_h3_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_h3_font_color",
						"std" => "666666",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_h3_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_h3_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "H4" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_h4_font_size",
						"std" => "16",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_h4_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_h4_font_color",
						"std" => "666666",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "H4 Text Shadow",
						"id" => THEME_SLUG."_h4_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_h4_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "H5" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_h5_font_size",
						"std" => "13",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_h5_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_h5_font_color",
						"std" => "666666",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "H5 Text Shadow",
						"id" => THEME_SLUG."_h5_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_h5_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "H6" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_h6_font_size",
						"std" => "10",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_h6_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_h6_font_color",
						"std" => "666666",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "H6 Text Shadow",
						"id" => THEME_SLUG."_h6_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_h6_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Image Caption" );	

$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_image_caption_font_size",
						"std" => "16",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_image_caption_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_image_caption_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
		
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Fade & Bar Font Color",
						"id" => THEME_SLUG."_image_caption_fade_bar_font_color",
						"std" => "ffffff",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	
	
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Fade & Bar Text Shadow",
						"id" => THEME_SLUG."_image_caption_fade_bar_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
		
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Top & Bottom Font Color",
						"id" => THEME_SLUG."_image_caption_top_bottom_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	
	
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Top & Bottom Text Shadow",
						"id" => THEME_SLUG."_image_caption_top_bottom_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Links" );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Top Bar",
						"id" => THEME_SLUG."_top_bar_linkcolor",
						"std" => "ffffff",
						"desc" => "Sets the color of all text links on the top bar area of the website. Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	
						
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Header",
						"id" => THEME_SLUG."_header_linkcolor",
						"std" => "CEDE44",
						"desc" => "Sets the color of all text links on the header area of the website. Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );
						
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Content Area",
						"id" => THEME_SLUG."_linkcolor",
						"std" => "006FA4",
						"desc" => "Sets the color of all text links on the content area of the website. Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Widgetized Footer",
						"id" => THEME_SLUG."_footer_linkcolor",
						"std" => "CEDE44",
						"desc" => "Sets the color of all text links on the header area of the website. Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Bottom Footer",
						"id" => THEME_SLUG."_footer_bar_linkcolor",
						"std" => "CEDE44",
						"desc" => "Sets the color of all text links on the header area of the website. Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );						
$font_settings[] = array( "type" => "stop" );
						
						
$font_settings[] = array( "type" => "start",
						"name" => "Main Menu" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_mainmenu_font_size",
						"std" => "26",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );

$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_mainmenu_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_mainmenu_font_color",
						"std" => "ffffff",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_mainmenu_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
			
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_mainmenu_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );
						
						
$font_settings[] = array( "type" => "start",
						"name" => "Main Menu Dropdown" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_ddmenu_font_size",
						"std" => "19",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_ddmenu_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color (Dark Background)",
						"id" => THEME_SLUG."_ddmenu_dark_font_color",
						"std" => "ffffff",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow (Dark Background)",
						"id" => THEME_SLUG."_ddmenu_dark_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color (Light Background)",
						"id" => THEME_SLUG."_ddmenu_light_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow (Light Background)",
						"id" => THEME_SLUG."_ddmenu_light_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color (Custom Background)",
						"id" => THEME_SLUG."_ddmenu_custom_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow (Custom Background)",
						"id" => THEME_SLUG."_ddmenu_custom_text_shadow",
						"std" => "ffffff",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Highlight Font Color",
						"id" => THEME_SLUG."_ddmenu_highlight_font_color",
						"std" => "CEDE44",
						"desc" => "Sets the color of the menu item / page that the visitor is currently viewing. Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_ddnmenu_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Pricing Block" );	

$font_settings[] = array( "type" => "text",
						"name" => "Heading Size (Px)",
						"id" => THEME_SLUG."_pricing_header_font_size",
						"std" => "19",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Heading Style",
						"id" => THEME_SLUG."_pricing_header_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Heading Color",
						"id" => THEME_SLUG."_pricing_header_font_color",
						"std" => "666666",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Heading Text Shadow",
						"id" => THEME_SLUG."_pricing_header_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Heading Font Family",
						"id" => THEME_SLUG."_pricing_header_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "text",
						"name" => "Price Font Size (Px)",
						"id" => THEME_SLUG."_pricing_font_size",
						"std" => "60",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Price Font Styles",
						"id" => THEME_SLUG."_pricing_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Price Font Color",
						"id" => THEME_SLUG."_pricing_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Price Text Shadow",
						"id" => THEME_SLUG."_pricing_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Price Font Family",
						"id" => THEME_SLUG."_pricing_font_family",
						"std" => "google::Anton",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Sidebar Heading" );	

$font_settings[] = array( "type" => "select",
						"name" => "Type",
						"id" => THEME_SLUG."_sidebar_h_type",
						"std" => "h2",
						"data" => array( 
								"h1" => "H1",
								"h2" => "H2",
								"h3" => "H3",
								"h4" => "H4",								
						),
						"size" => "small",
						"desc" => "Choose your sidebar heading font style." );
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_sidebar_heading_font_size",
						"std" => "23",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_sidebar_heading_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_sidebar_heading_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_sidebar_heading_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_sidebar_heading_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Small Content" );	
						
$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_scontent_font_size",
						"std" => "12",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_scontent_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_scontent_font_color",
						"std" => "",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	
						
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Small Content Text Shadow",
						"id" => THEME_SLUG."_scontent_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );						

$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_scontent_font_family",
						"std" => "google::Antic",
						"data" => array('general','google'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Tabs" );	

$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_tab_font_size",
						"std" => "16",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_tab_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_tab_font_color",
						"std" => "999999",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Font Highlight Color",
						"id" => THEME_SLUG."_tab_highlight_font_color",
						"std" => "006FA4",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	
						
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_tab_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_tab_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Team Members" );	

$font_settings[] = array( "type" => "text",
						"name" => "Name Size (Px)",
						"id" => THEME_SLUG."_team_name_font_size",
						"std" => "23",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Name Style",
						"id" => THEME_SLUG."_team_name_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Name Color",
						"id" => THEME_SLUG."_team_name_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Name Text Shadow",
						"id" => THEME_SLUG."_team_name_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Name Font Family",
						"id" => THEME_SLUG."_team_name_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "text",
						"name" => "Designation Size (Px)",
						"id" => THEME_SLUG."_team_designation_font_size",
						"std" => "19",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Designation Style",
						"id" => THEME_SLUG."_team_designation_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Designation Color",
						"id" => THEME_SLUG."_team_designation_font_color",
						"std" => "006FA4",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Designation Text Shadow",
						"id" => THEME_SLUG."_team_designation_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Designation Font Family",
						"id" => THEME_SLUG."_team_designation_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );

$font_settings[] = array( "type" => "html",
						"desc" => "" );
						
$font_settings[] = array( "type" => "text",
						"name" => "Content Size (Px)",
						"id" => THEME_SLUG."_team_content_font_size",
						"std" => "11",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Content Style",
						"id" => THEME_SLUG."_team_content_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Content Color",
						"id" => THEME_SLUG."_team_content_font_color",
						"std" => "",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Content Text Shadow",
						"id" => THEME_SLUG."_team_content_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Content Font Family",
						"id" => THEME_SLUG."_team_content_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Toggles" );	

$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_toggle_font_size",
						"std" => "19",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
						
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_toggle_font_style",
						"std" => array("bold"),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_toggle_font_color",
						"std" => "333333",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_toggle_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_toggle_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$font_settings[] = array( "type" => "start",
						"name" => "Top Toolbar" );	

$font_settings[] = array( "type" => "text",
						"name" => "Size (Px)",
						"id" => THEME_SLUG."_top_toolbar_font_size",
						"std" => "12",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
													
$font_settings[] = array( "type" => "checkbox",
						"name" => "Style",
						"id" => THEME_SLUG."_top_toolbar_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Color",
						"id" => THEME_SLUG."_top_toolbar_font_color",
						"std" => "f4fae2",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Text Shadow",
						"id" => THEME_SLUG."_top_toolbar_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Font Family",
						"id" => THEME_SLUG."_top_toolbar_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );

	
$font_settings[] = array( "type" => "start",
						"name" => "Widgetized Footer" );	
	
$font_settings[] = array( "type" => "select",
						"name" => "Heading Type",
						"id" => THEME_SLUG."_footer_h_type",
						"std" => "h3",
						"data" => array( 
								"h1" => "H1",
								"h2" => "H2",
								"h3" => "H3",
								"h4" => "H4",								
						),
						"size" => "small",
						"desc" => "Choose your footer heading font style." );
						
$font_settings[] = array( "type" => "text",
						"name" => "Heading Size (Px)",
						"id" => THEME_SLUG."_footer_heading_font_size",
						"std" => "19",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Heading Style",
						"id" => THEME_SLUG."_footer_heading_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Heading Color",
						"id" => THEME_SLUG."_footer_heading_font_color",
						"std" => "f4fae2",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Heading Text Shadow",
						"id" => THEME_SLUG."_footer_heading_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Heading Font Family",
						"id" => THEME_SLUG."_footer_heading_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );

$font_settings[] = array( "type" => "html",
						"desc" => "" );
						
$font_settings[] = array( "type" => "text",
						"name" => "Content Size (Px)",
						"id" => THEME_SLUG."_footer_content_font_size",
						"std" => "12",						
						"size" => "small",
						"desc" => "Sets the font size in PX." );
									
$font_settings[] = array( "type" => "checkbox",
						"name" => "Content Style",
						"id" => THEME_SLUG."_footer_content_font_style",
						"std" => array(),
						"data" => array(
							"bold" => "Bold",
							"italic" => "Italic",
							"underline" => "Underline",
							"uppercase" => "Uppercase"
						),
						"desc" => "Check the styles you want to apply to this font. Leave all unchecked if you just want the normal font style." );
			
$font_settings[] = array( "type" => "colorpicker",
						"name" => "Content Color",
						"id" => THEME_SLUG."_footer_content_font_color",
						"std" => "aaaaaa",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector." );	

$font_settings[] = array( "type" => "colorpicker",
						"name" => "Content Text Shadow",
						"id" => THEME_SLUG."_footer_content_text_shadow",
						"std" => "none",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Leave blank if you don't want a text drop shadow." );
						
$font_settings[] = array( "type" => "font",
						"name" => "Content Font Family",
						"id" => THEME_SLUG."_footer_content_font_family",
						"std" => "google::Antic",
						"data" => array('google','general'),
						"size" => "large",
						"desc" => "The font selected in the drop down list will be the deafult font displayed to all visitors as long as they have the font installed on their computer. If the font is not available on their computer the next font in the family will be used. NOTE: Only the first font in each font family are shown in the drop down menu." );
						
$font_settings[] = array( "type" => "stop" );


$theme_options[] = array( "name" => "Fonts",
					"id" => "font",
					"slug" => "font", 
					"options" => $font_settings
				);		
				
