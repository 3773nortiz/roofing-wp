<?php

/******** Area Background Settings ********/

$areabg_settings = array();

$areabg_settings[] = array( "type" => "html",
						"desc" => "These settings will allow you to control the backgrounds of various parts of your website. You will be able to set custom background gradients/images/textures for Whole Site, Top Toolbar, Header, Widgetized Footer, Content Area & Bottom Footer<br /><br /><img src='".THEME_FRAMEWORK."/admin/layout/images/area-bg-image.png' align='center' />" );

$areabg_settings[] = array( "type" => "start",
						"name" => "Top Toolbar" );	
						
$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Color / Gradient Start",
						"id" => THEME_SLUG."_top_toolbar_bgcolor",
						"std" => "3c4621",
						"desc" => "Sets the primary background color. If used with \"Gradient Stop\" it will be the first starding point of the gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Gradient Stop Color",
						"id" => THEME_SLUG."_top_toolbar_bgcolor_gradient",
						"std" => "212712",
						"desc" => "Sets the 2nd stopping point in the color gradient. Leave blank if you don't want to use a gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
						
$areabg_settings[] = array( "type" => "upload",
						"name" => "Image",
						"id" => THEME_SLUG."_top_toolbar_bgimage",
						"std" => "",
						"desc" => "Sets a background image to use for the area background." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Image Repeat",
						"id" => THEME_SLUG."_top_toolbar_bgimage_repeat",
						"std" => "no-repeat",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "If an image is set, select if you want the image tiled/repeated." );

$areabg_settings[] = array( "type" => "text",
						"name" => "Image Position",
						"id" => THEME_SLUG."_top_toolbar_bgimage_position",
						"std" => "",
						"desc" => "Sets the orientation/position of the background image. You can enter things like center center, left top, right bottom, left center, right center, right top, left bottom or specific px amounts eg. 235px 519px." );
						
$areabg_settings[] = array( "type" => "toggle",
						"name" => "Image Scale",
						"id" => THEME_SLUG."_top_toolbar_bgimage_scale",
						"std" => "false",
						"size" => "small",
						"desc" => "Sets if the background image should be scaled depending on the brower size." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Pattern",
						"id" => THEME_SLUG."_top_toolbar_bgpattern",
						"std" => "",
						"data" => $GLOBALS['bg_patterns'],
						"desc" => "Select a premade pattern texutre to overlay over the area background.",
						"size" => "normal");	
						
$areabg_settings[] = array( "type" => "stop" );


$areabg_settings[] = array( "type" => "start",
						"name" => "Header" );	

$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Color / Gradient Start",
						"id" => THEME_SLUG."_header_bgcolor",
						"std" => "006EA3",
						"desc" => "Sets the primary background color. If used with \"Gradient Stop\" it will be the first starding point of the gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Gradient Stop Color",
						"id" => THEME_SLUG."_header_bgcolor_gradient",
						"std" => "014463",
						"desc" => "Sets the 2nd stopping point in the color gradient. Leave blank if you don't want to use a gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
						
$areabg_settings[] = array( "type" => "upload",
						"name" => "Image",
						"id" => THEME_SLUG."_header_bgimage",
						"std" => "",
						"desc" => "Sets a background image to use for the area background." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Image Repeat",
						"id" => THEME_SLUG."_header_bgimage_repeat",
						"std" => "repeat",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "If an image is set, select if you want the image tiled/repeated." );

$areabg_settings[] = array( "type" => "text",
						"name" => "Image Position",
						"id" => THEME_SLUG."_header_bgimage_position",
						"std" => "",
						"desc" => "Sets the orientation/position of the background image. You can enter things like center center, left top, right bottom, left center, right center, right top, left bottom or specific px amounts eg. 235px 519px." );
						
$areabg_settings[] = array( "type" => "toggle",
						"name" => "Image Scale",
						"id" => THEME_SLUG."_header_bgimage_scale",
						"std" => "false",
						"size" => "small",
						"desc" => "Sets if the background image should be scaled depending on the brower size." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Pattern",
						"id" => THEME_SLUG."_header_bgpattern",
						"std" => "",
						"data" => $GLOBALS['bg_patterns'],
						"desc" => "Select a premade pattern texutre to overlay over the area background.",
						"size" => "normal");	

$areabg_settings[] = array( "type" => "stop" );


$areabg_settings[] = array( "type" => "start",
						"name" => "Content Area" );	
						
$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Color / Gradient Start",
						"id" => THEME_SLUG."_content_bgcolor",
						"std" => "",
						"desc" => "Sets the primary background color. If used with \"Gradient Stop\" it will be the first starding point of the gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Gradient Stop Color",
						"id" => THEME_SLUG."_content_bgcolor_gradient",
						"std" => "",
						"desc" => "Sets the 2nd stopping point in the color gradient. Leave blank if you don't want to use a gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
						
$areabg_settings[] = array( "type" => "upload",
						"name" => "Image",
						"id" => THEME_SLUG."_content_bgimage",
						"std" => "",
						"desc" => "Sets a background image to use for the area background." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Image Repeat",
						"id" => THEME_SLUG."_content_bgimage_repeat",
						"std" => "repeat",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "If an image is set, select if you want the image tiled/repeated." );

$areabg_settings[] = array( "type" => "text",
						"name" => "Image Position",
						"id" => THEME_SLUG."_content_bgimage_position",
						"std" => "",
						"desc" => "Sets the orientation/position of the background image. You can enter things like center center, left top, right bottom, left center, right center, right top, left bottom or specific px amounts eg. 235px 519px." );

$areabg_settings[] = array( "type" => "select",
						"name" => "Background Attachment",
						"id" => THEME_SLUG."_content_bgimage_attachment",
						"std" => "fixed",
						"data" => array(
							"scroll" => "Scroll",
							"fixed" => "Fixed",							
						),
						"size" => "small",
						"desc" => "Sets if the background image should scroll or stay static as a visitor navigates up and down the page." );
						
$areabg_settings[] = array( "type" => "toggle",
						"name" => "Image Scale",
						"id" => THEME_SLUG."_content_bgimage_scale",
						"std" => "false",
						"size" => "small",
						"desc" => "Sets if the background image should be scaled depending on the brower size." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Pattern",
						"id" => THEME_SLUG."_content_bgpattern",
						"std" => "",
						"data" => $GLOBALS['bg_patterns'],
						"desc" => "Select a premade pattern texutre to overlay over the area background.",
						"size" => "normal");	

$areabg_settings[] = array( "type" => "stop" );


$areabg_settings[] = array( "type" => "start",
						"name" => "Bottom Footer" );	
						
$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Color / Gradient Start",
						"id" => THEME_SLUG."_footer_bar_bgcolor",
						"std" => "333333",
						"desc" => "Sets the primary background color. If used with \"Gradient Stop\" it will be the first starding point of the gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Gradient Stop Color",
						"id" => THEME_SLUG."_footer_bar_bgcolor_gradient",
						"std" => "",
						"desc" => "Sets the 2nd stopping point in the color gradient. Leave blank if you don't want to use a gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
						
$areabg_settings[] = array( "type" => "upload",
						"name" => "Image",
						"id" => THEME_SLUG."_footer_bar_bgimage",
						"std" => THEME_HOME."/images/footer-bottom-bg.png",
						"desc" => "Sets a background image to use for the area background." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Image Repeat",
						"id" => THEME_SLUG."_footer_bar_bgimage_repeat",
						"std" => "repeat-x",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "If an image is set, select if you want the image tiled/repeated." );

$areabg_settings[] = array( "type" => "text",
						"name" => "Image Position",
						"id" => THEME_SLUG."_footer_bar_bgimage_position",
						"std" => "",
						"desc" => "Sets the orientation/position of the background image. You can enter things like center center, left top, right bottom, left center, right center, right top, left bottom or specific px amounts eg. 235px 519px." );
						
$areabg_settings[] = array( "type" => "toggle",
						"name" => "Image Scale",
						"id" => THEME_SLUG."_footer_bar_bgimage_scale",
						"std" => "false",
						"size" => "small",
						"desc" => "Sets if the background image should be scaled depending on the brower size." );	
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Pattern",
						"id" => THEME_SLUG."_footer_bar_bgpattern",
						"std" => "",
						"data" => $GLOBALS['bg_patterns'],
						"desc" => "Select a premade pattern texutre to overlay over the area background.",
						"size" => "normal");	

$areabg_settings[] = array( "type" => "stop" );


$areabg_settings[] = array( "type" => "start",
						"name" => "Widgetized Footer" );	

$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Color / Gradient Start",
						"id" => THEME_SLUG."_footer_bgcolor",
						"std" => "3c4621",
						"desc" => "Sets the primary background color. If used with \"Gradient Stop\" it will be the first starding point of the gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Gradient Stop Color",
						"id" => THEME_SLUG."_footer_bgcolor_gradient",
						"std" => "212712",
						"desc" => "Sets the 2nd stopping point in the color gradient. Leave blank if you don't want to use a gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
						
$areabg_settings[] = array( "type" => "upload",
						"name" => "Image",
						"id" => THEME_SLUG."_footer_bgimage",
						"std" => "",
						"desc" => "Sets a background image to use for the area background." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Image Repeat",
						"id" => THEME_SLUG."_footer_bgimage_repeat",
						"std" => "repeat",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "If an image is set, select if you want the image tiled/repeated." );

$areabg_settings[] = array( "type" => "text",
						"name" => "Image Position",
						"id" => THEME_SLUG."_footer_bgimage_position",
						"std" => "center top",
						"desc" => "Sets the orientation/position of the background image. You can enter things like center center, left top, right bottom, left center, right center, right top, left bottom or specific px amounts eg. 235px 519px." );
						
$areabg_settings[] = array( "type" => "toggle",
						"name" => "Image Scale",
						"id" => THEME_SLUG."_footer_bgimage_scale",
						"std" => "false",
						"size" => "small",
						"desc" => "Sets if the background image should be scaled depending on the brower size." );							
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Pattern",
						"id" => THEME_SLUG."_footer_bgpattern",
						"std" => "",
						"data" => $GLOBALS['bg_patterns'],
						"desc" => "Select a premade pattern texutre to overlay over the area background.",
						"size" => "normal");	
						
$areabg_settings[] = array( "type" => "upload",
						"name" => "Area Overlay",
						"id" => THEME_SLUG."_footer_overlay",
						"std" => "",
						"desc" => "Enter the URL of an image (For example: http://www.mysite.com/bg.jpg) that you want to overlay over the widgetized footer area. For best results use a transparent PNG image. If your image has not yet been uploaded somewhere click the \"Upload\" button above." );

$areabg_settings[] = array( "type" => "stop" );

		
$areabg_settings[] = array( "type" => "start",
						"name" => "Whole Site" );	
		
$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Color / Gradient Start",
						"id" => THEME_SLUG."_bgcolor",
						"std" => "fafafa",
						"desc" => "Enter the HEX # for the color font you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. <!-- For instructions on using the color selector go <a href='#'>Here</a>. -->" );
						
$areabg_settings[] = array( "type" => "colorpicker",
						"name" => "Gradient Stop Color",
						"id" => THEME_SLUG."_bgcolor_gradient",
						"std" => "",
						"desc" => "Sets the 2nd stopping point in the color gradient. Leave blank if you don't want to use a gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
						
$areabg_settings[] = array( "type" => "upload",
						"name" => "Image",
						"id" => THEME_SLUG."_bgimage",
						"std" => "",
						"desc" => "Sets a background image to use for the area background." );

$areabg_settings[] = array( "type" => "select",
						"name" => "Image List",
						"id" => THEME_SLUG."_bgimage_list",
						"std" => "",
						"data" => $GLOBALS['backgrounds'],
						"desc" => "Select an included background image in the dropdown menu below or enter the URL of an image to use for this area's background." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Image Repeat",
						"id" => THEME_SLUG."_bgimage_repeat",
						"std" => "no-repeat",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "If an image is set, select if you want the image tiled/repeated." );

$areabg_settings[] = array( "type" => "text",
						"name" => "Image Position",
						"id" => THEME_SLUG."_bgimage_position",
						"std" => "center center",
						"desc" => "Sets the orientation/position of the background image. You can enter things like center center, left top, right bottom, left center, right center, right top, left bottom or specific px amounts eg. 235px 519px." );
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Background Attachment",
						"id" => THEME_SLUG."_bgimage_attachment",
						"std" => "fixed",
						"data" => array(
							"scroll" => "Scroll",
							"fixed" => "Fixed",							
						),
						"size" => "small",
						"desc" => "Sets if the background image should scroll or stay static as a visitor navigates up and down the page." );
						
$areabg_settings[] = array( "type" => "toggle",
						"name" => "Image Scale",
						"id" => THEME_SLUG."_bgimage_scale",
						"std" => "false",
						"size" => "small",
						"desc" => "Sets if the background image should be scaled depending on the brower size." );						
						
$areabg_settings[] = array( "type" => "select",
						"name" => "Pattern",
						"id" => THEME_SLUG."_bgpattern",
						"std" => "",
						"data" => $GLOBALS['bg_patterns'],
						"desc" => "Select a premade pattern texutre to overlay over the area background.",
						"size" => "normal");
						
$areabg_settings[] = array( "type" => "stop" );


$areabg_settings[] = array( "type" => "start",
						"name" => "Blog / Widget Background" );	

$areabg_settings[] = array( "type" => "button",
						"name" => "Blog / Widget Background",
						"data" => "Open Blog Settings",
						"link" => "admin.php?page=theme-blog-settings",
						"desc" => "These settings are managed from the Blog Settings page. Click the button to open that area in a new window." );						

$areabg_settings[] = array( "type" => "stop" );


$areabg_settings[] = array( "type" => "start",
						"name" => "Top Bar / Footer Highlight Bar" );	

$areabg_settings[] = array( "type" => "button",
						"name" => "Highlight Settings",
						"data" => "Open Theme Elements",
						"link" => "admin.php?page=theme-layouts-settings",
						"desc" => "These settings are managed from the Layouts / Elements Settings page. Click the button to open that area in a new window.");						

$areabg_settings[] = array( "type" => "stop" );


$areabg_settings[] = array( "type" => "start",
						"name" => "Side Gradients / Drop Shadows" );	

$areabg_settings[] = array( "type" => "button",
						"name" => "Gradients / Drop Shadows",
						"data" => "Open Theme Elements",
						"link" => "admin.php?page=theme-layouts-settings",
						"desc" => "These settings are managed from the Layouts / Elements Settings page. Click the button to open that area in a new window." );						

$areabg_settings[] = array( "type" => "stop" );


$areabg_settings[] = array( "type" => "start",
						"name" => "Main Menu / Submenu" );	

$areabg_settings[] = array( "type" => "button",
						"name" => "Colors / Backgrounds",
						"data" => "Open Menu Settings",
						"link" => "admin.php?page=theme-menu-settings",
						"desc" => "These settings are managed from the Menu Settings page. Click the button to open that area in a new window." );						

$areabg_settings[] = array( "type" => "stop" );


$theme_options[] = array( "name" => "Area Backgrounds",
					"id" => "areabg",
					"slug" => "area-backgrounds",
					"options" => $areabg_settings
				);	
