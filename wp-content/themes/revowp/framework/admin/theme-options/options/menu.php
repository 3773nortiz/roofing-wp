<?php

/******** Menu Settings ********/

$menu_settings = array();

$menu_settings[] = array( "type" => "html",
						"desc" => "These menu settings control every aspect of how your menus will be displayed on your site. Settings include, Colors, Backgrounds & Layouts." );
						
$menu_settings[] = array( "type" => "start",
						"name" => "Main Menu" );	
						
$menu_settings[] =  array( "type" => "select",
						"name" => "Menu Style",
						"id" => THEME_SLUG."_menu_style",
						"std" => "plain-menu",
						"data" => array( 
								"modern-menu" => "Modern",
								"executive-menu" => "Executive",
								"elegant-menu" => "Elegant",
								"plain-menu" => "Plain",
						),
						"size" => "medium",
						"desc" => "Choose from the base menu style that you want to use." );

$menu_settings[] =  array( "type" => "select",
						"name" => "Alignment",
						"id" => THEME_SLUG."_menu_align",
						"std" => "menu-center",
						"data" => array( 
								"menu-left" => "Left",
								"menu-right" => "Right",
								"menu-center" => "Center",
								"menu-justify" => "Justify",
						),
						"size" => "medium",
						"desc" => "Sets how the menu is aligned within the header." );

$menu_settings[] =  array( "type" => "toggle",
						"name" => "Rounded Corners (Modern Only)",
						"id" => THEME_SLUG."_mainmenu_modern_rounded_corners",
						"std" => "false",
						"desc" => "Sets whether the corners of the menu should be squared or rounded. Applies only to the Modern menu style." );						

$menu_settings[] =  array( "type" => "text",
						"name" => "Menu Height",
						"id" => THEME_SLUG."_mainmenu_height",
						"std" => "",
						"size" => "small",
						"desc" => "Sets how tall the menu area is. Setting this value to high may cause unexpected results with your theme." );

$menu_settings[] =  array( "type" => "text",
						"name" => "Menu Padding",
						"id" => THEME_SLUG."_mainmenu_spacing",
						"std" => "10px 0 0 0",
						"size" => "medium",
						"desc" => "Sets the spacing of the menu within the header area. Eg: 20px 10px 30px 5px (Top Right Bottom Left)" );						

$menu_settings[] =  array( "type" => "text",
						"name" => "Item Padding",
						"id" => THEME_SLUG."_mainmenu_padding",
						"std" => "20",
						"size" => "small",
						"desc" => "Sets how much space (in PX) should be between each menu item." );	
						
$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Color / Gradient Start",
						"id" => THEME_SLUG."_menubg_color",
						"std" => "006EA3",
						"desc" => "Sets the primary background color of the menu. If used with \"Gradient Stop\" it will be the first starding point of the gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Gradient Stop Color",
						"id" => THEME_SLUG."_modernmenu_gradient",
						"std" => "014463",
						"desc" => "Sets the 2nd stopping point in the color gradient. Leave blank if you don't want to use a gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Item Divider Lines",
						"id" => THEME_SLUG."_menu_divider_color",
						"std" => "666666",
						"desc" => "Sets the color of the verticle line between menu items. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Active Item Highlight",
						"id" => THEME_SLUG."_menu_highlight_color",
						"std" => "CEDE44",
						"desc" => "Sets the background color or highlight color of the active menu item or page. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
	
$menu_settings[] =  array( "type" => "button",
						"name" => "Font Settings",
						"data" => "Click To Open Font Page",
						"link" => "admin.php?page=theme-font-settings",
						"desc" => "All menu font settings are located on the \"Fonts\" page. Click the button to open it in a new window." );	
						
$menu_settings[] = array( "type" => "stop" );


$menu_settings[] = array( "type" => "start",
						"name" => "Sub Menu" );
						
$menu_settings[] =  array( "type" => "toggle",
						"name" => "Display Sub Menu",
						"id" => THEME_SLUG."_mainmenu_dropdown",
						"std" => "true",
						"desc" => "Sets if you want to show the submenu or not when a visitor hovers over a menu item." );

$menu_settings[] =  array( "type" => "text",
						"name" => "Menu Width",
						"id" => THEME_SLUG."_ddmenu_width",
						"std" => "210",
						"size" => "small",
						"desc" => "Sets the width of the submenu. The default is 210 px increase this if you don't want long submenu items to wrap to next line." );	
						
$menu_settings[] =  array( "type" => "select",
						"name" => "Dropdown Style",
						"id" => THEME_SLUG."_ddmenu_style",
						"std" => "dark-ddmenu",
						"data" => array( 
								"light-ddmenu" => "Light",
								"dark-ddmenu" => "Dark",
								"custom-ddmenu" => "Custom",
						),
						"size" => "medium",
						"desc" => "Pick from the  premade styles or select \"Custom\" to use your own settings." );

$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Color / Gradient Start (Custom)",
						"id" => THEME_SLUG."_ddmenu_custom_bgcolor",
						"std" => "ffffff",
						"desc" => "Sets the primary background color of the menu. If used with \"Gradient Stop\" it will be the first starding point of the gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Gradient Stop Color (Custom)",
						"id" => THEME_SLUG."_ddmenu_custom_bgcolor_gradient",
						"std" => "",
						"desc" => "Sets the 2nd stopping point in the color gradient. Leave blank if you don't want to use a gradient. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
						
$menu_settings[] = array( "type" => "text",
						"name" => "Image (Custom)",
						"id" => THEME_SLUG."_ddmenu_custom_bgimage",
						"std" => "",
						"desc" => "Sets a background image to use for the submenu background." );
						
$menu_settings[] =  array( "type" => "select",
						"name" => "Image Repeat (Custom)",
						"id" => THEME_SLUG."_ddmenu_custom_bgimage_repeat",
						"std" => "repeat",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "If an image is set, select if you want the image tiled/repeated." );

$menu_settings[] = array( "type" => "text",
						"name" => "Image Position (Custom)",
						"id" => THEME_SLUG."_ddmenu_custom_bgimage_position",
						"std" => "",
						"desc" => "Sets the oriantation/position of the background image." );
						
$menu_settings[] =  array( "type" => "toggle",
						"name" => "Image Scale (Custom)",
						"id" => THEME_SLUG."_ddmenu_custom_bgimage_scale",
						"std" => "true",
						"size" => "small",
						"desc" => "Sets if the background image should be scaled depending on the brower size." );	
						
$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Hover Background Color",
						"id" => THEME_SLUG."_ddmenu_custom_hover_bgcolor",
						"std" => "006DA1",
						"desc" => "Sets the background color of submenu items that you hover your mouse over." );

$menu_settings[] =  array( "type" => "button",
						"name" => "Font Settings",
						"data" => "Click To Open Font Page",
						"link" => "admin.php?page=theme-font-settings",
						"desc" => "All menu font settings are located on the \"Fonts\" page. Click the button to open it in a new window." );
						
$menu_settings[] = array( "type" => "stop" );

						
$menu_settings[] = array( "type" => "start",
						"name" => "Footer Menu" );	

$menu_settings[] =  array( "type" => "text",
						"name" => "Item Padding",
						"id" => THEME_SLUG."_footer_menu_padding",
						"std" => "5",
						"size" => "small",
						"desc" => "Sets how much space (in PX) should be between each menu item." );	
						
$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Item Divider Lines",
						"id" => THEME_SLUG."_footer_menu_divider_color",
						"std" => "cccccc",
						"desc" => "Sets the color of the verticle line between menu items. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );

$menu_settings[] =  array( "type" => "colorpicker",
						"name" => "Active Item Highlight",
						"id" => THEME_SLUG."_footer_menu_highlight_color",
						"std" => "CEDE44",
						"desc" => "Sets the background color or highlight color of the active menu item or page. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector" );
	
$menu_settings[] =  array( "type" => "button",
						"name" => "Font Settings",
						"data" => "Click To Open Font Page",
						"link" => "admin.php?page=theme-font-settings",
						"desc" => "All menu font settings are located on the \"Fonts\" page. Click the button to open it in a new window." );	
						
$menu_settings[] = array( "type" => "stop" );
	

$theme_options[] =  array( "name" => "Menu Style",
					"id" => "menu",
					"slug" => "menu",
					"options" => $menu_settings
				);			