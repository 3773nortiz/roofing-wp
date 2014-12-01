<?php

/******** General Settings ********/

$general_settings = array();

$general_settings[] = array( "type" => "html",
						"desc" => "These general settings will control various aspects of your website such as your Logo, Favicon, Global SEO, 404 Error Page, Custom CSS, Custom Javascript & Google Analytics intergration." );

$general_settings[] = array( "type" => "start",
						"name" => "Logo" );							

$general_settings[] = array( "type" => "upload",
						"name" => "Header Logo",
						"id" => THEME_SLUG."_site_logo",
						"std" => THEME_HOME."/images/logo.png",
						"desc" => "Enter the URL of your logo image. It's reccomended that this image is less than 250px X 75px for best results. Click upload to add the image to the Wordpress media manager." );

$general_settings[] =  array( "type" => "select",
						"name" => "Header Logo Position",
						"id" => THEME_SLUG."_logo_position",
						"std" => "header",
						"data" => array( 
								"header" => "Header",
								"toptoolbar" => "Top Bar",
						),
						"size" => "medium",
						"desc" => "Sets the position of the logo." );
						
$general_settings[] =  array( "type" => "select",
						"name" => "Logo Alignment",
						"id" => THEME_SLUG."_logo_align",
						"std" => "logo-center",
						"data" => array( 
								"logo-left" => "Left",
								"logo-right" => "Right",
								"logo-center" => "Center",
						),
						"size" => "medium",
						"desc" => "Sets the horizontal alignment of the logo within the header/top toolbar area." );
						
$general_settings[] =  array( "type" => "text",
						"name" => "Header Logo Padding",
						"id" => THEME_SLUG."_logo_padding",
						"std" => "0",
						"size" => "medium",
						"desc" => "Sets the padding of the logo within the header area. Eg: 20px 10px 30px 5px (Top Right Bottom Left)" );

$general_settings[] =  array( "type" => "select",
						"name" => "Top Bar Logo Position",
						"id" => THEME_SLUG."_topbar_logo_position",
						"std" => "bottom",
						"data" => array( 
								"top" => "Top",
								"bottom" => "Bottom",
						),
						"size" => "medium",
						"desc" => "Sets the position of the logo within the top bar." );
						
$general_settings[] = array( "type" => "upload",
						"name" => "Footer Logo",
						"id" => THEME_SLUG."_footer_logo",
						"std" => THEME_HOME."/images/footer_logo.png",
						"desc" => "Enter the URL of your logo image. It's reccomended that this image is less than 125px X 50px for best results. Click upload to add the image to the Wordpress media manager." );
						
$general_settings[] = array( "type" => "upload",
						"name" => "Favicon Icon",
						"id" => THEME_SLUG."_favicon",
						"std" => THEME_HOME."/images/favicon.ico",
						"desc" => "Enter the URL of your favicon image. This file must be a .ico filetype and 16px X 16px. Click upload to add the image to the Wordpress media manager." );
						
$general_settings[] = array( "type" => "stop" );


$general_settings[] = array( "type" => "start",
						"name" => "SEO" );	

$general_settings[] =  array( "type" => "toggle",
						"name" => "Built-in SEO",
						"id" => THEME_SLUG."_seo",
						"std" => "true",
						"desc" => "The built-in SEO feature allows you to set meta tags globally or on individual pages. It also allows you to hide pages from search engines and your sitemap. Disable this if you're already using an SEO Plugin." );						
						
$general_settings[] =  array( "type" => "text",
						"name" => "Default Title Tag",
						"id" => THEME_SLUG."_site_title",
						"std" => "",
						"size" => "large",
						"desc" => "Enter a global title tag to use on every page/post on your site. Pages with title tags set individually will override this setting." );	
						
$general_settings[] =  array( "type" => "textarea",
						"name" => "Default Meta Keywords",
						"id" => THEME_SLUG."_meta_keywords",
						"std" => "",
						"desc" => "Enter global meta keywords to use on every page/post on your site. Pages with meta keywords set individually will override this setting." );	

$general_settings[] =  array( "type" => "textarea",
						"name" => "Default Meta Description",
						"id" => THEME_SLUG."_meta_description",
						"std" => "",
						"desc" => "Enter global meta description to use on every page/post on your site. Pages with meta description set individually will override this setting." );		
						
$general_settings[] = array( "type" => "stop" );

$general_settings[] = array( "type" => "start",
						"name" => "Responsive Behaviour" );	

$general_settings[] =  array( "type" => "toggle",
						"name" => "Whole Site",
						"id" => THEME_SLUG."_responsive",
						"std" => "true",
						"size" => "normal",
						"desc" => "Toggle Responsive behaviour of the website on or off." );							

$general_settings[] = array( "type" => "stop" );				


$general_settings[] = array( "type" => "start",
						"name" => "404 Page" );	

$general_settings[] =  array( "type" => "text",
						"name" => "Error Page Title",
						"id" => THEME_SLUG."_404_title",
						"std" => "404 Error",
						"size" => "normal",
						"desc" => "Enter the title that should be displayed on your 404 error page. This will display as the header for the page." );							
						
$general_settings[] =  array( "type" => "textarea",
						"name" => "Page Contents / Layout",
						"id" => THEME_SLUG."_404_content",
						"std" => "[one_half]<h1>Yikes! Something Isn't Right Here...</h1><p>It appears the page you are trying to view is no longer here. Perhaps try using the search function or you could always go to the <a href=\"".home_url()."\">Home Page</a>.</p><p>[search_box]</p>[/one_half]
[one_half_last]<img src=\"".THEME_HOME."/images/404.png\" />[/one_half_last]",
						"desc" => "Enter the content that should be displayed on your 404 erorr page. This field may contain shortcodes, HTML and text." );											
		
$general_settings[] = array( "type" => "stop" );


$general_settings[] = array( "type" => "start",
						"name" => "Custom CSS" );	
						
$general_settings[] =  array( "type" => "textarea",
						"name" => "CSS Code",
						"id" => THEME_SLUG."_customcss",
						"std" => "",
						"size" => "normal",
						"desc" => "Enter any custom CSS styles you want to use on your website here. Use standard CSS rule formatting. Example:  .new-css-rule {font-size: 36px;color: #090;}" );		
						
$general_settings[] = array( "type" => "stop" );


$general_settings[] = array( "type" => "start",
						"name" => "Custom JavaScript" );	

$general_settings[] =  array( "type" => "textarea",
						"name" => "Header Scripts",
						"id" => THEME_SLUG."_custom_js_header",
						"std" => "",
						"size" => "normal",
						"desc" => "Enter custom JavaScript code here. Include each code snippit within <script> & </script> HTML tags. This code will be loaded in between the <head> </head> tags of every page." );									

$general_settings[] =  array( "type" => "textarea",
						"name" => "Footer Scripts / Google Analytics",
						"id" => THEME_SLUG."_custom_js_footer",
						"std" => "",
						"size" => "normal",
						"desc" => "Enter custom JavaScript code here. Include each code snippit within <script> & </script> HTML tags. This code will be loaded just before the </body> tag of every page. Google Analytics code should be added here." );							
						
$general_settings[] = array( "type" => "stop" );		


$theme_options[] =  array( "name" => "General",
					"id" => "general",
					"slug" => "general",
					"options" => $general_settings
				);	
