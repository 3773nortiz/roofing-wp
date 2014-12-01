<?php

/******** Blog Settings ********/

$blog_settings = array();

$blog_settings[] = array( "type" => "html",
						"desc" => "These blog settings will control various aspects of how your blog will look such as the Comment System to use, the Background Colors of posts and widgets, the style of Featured Images and the Sidebar." );

$blog_settings[] = array( "type" => "start",
						"name" => "Layout" );

$blog_settings[] =  array( "type" => "select",
						"name" => "Layout",
						"id" => THEME_SLUG."_blog_layout",
						"std" => "layout-1",
						"data" => array(
							"layout-1" => "Modern",
							"layout-2" => "Basic",
							"layout-3" => "Elegant Box",
						),
						"desc" => "Sets the blog layout." );
				
$blog_settings[] = array( "type" => "stop" );

						
$blog_settings[] = array( "type" => "start",
						"name" => "Background Colors" );

$blog_settings[] =  array( "type" => "colorpicker",
						"name" => "Blog Background Color",
						"id" => THEME_SLUG."_blogbg_color",
						"std" => "FAFAFA",
						"desc" => "Sets the background color of each blog post. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Please note this will work only if the content background color is not set." );
												
$blog_settings[] =  array( "type" => "colorpicker",
						"name" => "Widget Background Color",
						"id" => THEME_SLUG."_widgetbg_color",
						"std" => "FAFAFA",
						"desc" => "Sets the background colors of each sidebar widget. Enter the HEX # for the color you want. (For example:. 2ba412) Or click the \"Pick Color\" button to choose from a color selector. Please note this will work only if the content background color is not set." );	
						
$blog_settings[] = array( "type" => "stop" );
						

$blog_settings[] = array( "type" => "start",
						"name" => "Post Elements" );			

$blog_settings[] =  array( "type" => "text",
						"name" => "Blog Title",
						"id" => THEME_SLUG."_blog_title",
						"std" => "Our Blog",
						"size" => "large",
						"desc" => "Sets the meta title for the main blog page. This title will also be used as the main heading for your blog. You may disable this heading directly on the page that is used to load your blog." );							

$blog_settings[] =  array( "type" => "text",
						"name" => "Post Summary Length",
						"id" => THEME_SLUG."_blog_summary",
						"std" => "200",
						"size" => "small",
						"desc" => "Sets how many characters of each blog post should be shown as a teaser on the main blog page." );
						
$blog_settings[] =  array( "type" => "toggle",
						"name" => "\"Posted by\" text",
						"id" => THEME_SLUG."_posted_by",
						"std" => "true",
						"desc" => "Enable this to show the blog poster's username below the blog post." );

$blog_settings[] =  array( "type" => "toggle",
						"name" => "\"Posted In\" text",
						"id" => THEME_SLUG."_post_categories",
						"std" => "true",
						"desc" => "Enable this to show the catagory that the blog entry is posted in. This will appear below the blog post." );
						
$blog_settings[] =  array( "type" => "toggle",
						"name" => "Post Date",
						"id" => THEME_SLUG."_post_date",
						"std" => "true",
						"desc" => "Enable this to show the date which the blog entry was posted." );	

$blog_settings[] =  array( "type" => "toggle",
						"name" => "Post Tags",
						"id" => THEME_SLUG."_post_tags",
						"std" => "true",
						"desc" => "Enable this to show the tags selected for the blog post." );	
						
$blog_settings[] =  array( "type" => "toggle",
						"name" => "Comment Counter",
						"id" => THEME_SLUG."_comments_count",
						"std" => "true",
						"desc" => "Enable this to show a counter of how many comments each blog post has received." );	

$blog_settings[] = array( "type" => "stop" );


$blog_settings[] = array( "type" => "start",
						"name" => "Sidebar" );	
						
$blog_settings[] =  array( "type" => "radio",
						"name" => "Sidebar Alignment",
						"id" => THEME_SLUG."_blog_sidebar",
						"std" => "right",
						"data" => array(
							"none" => "None",
							"left" => "Left",
							"right" => "Right",
						),
						"size" => "small",
						"desc" => "Sets which side the sidebar should be shown on the blog" );

$blog_settings[] =  array( "type" => "button",
						"name" => "Sidebar Contents",
						"data" => "Click To Open Widgets",
						"link" => "widgets.php",
						"desc" => "You may set the items / widgets you want in the sidebar from within the Widgets page. Click the button to open the Widgets page within Wordpress" );						

$blog_settings[] = array( "type" => "stop" );


$blog_settings[] = array( "type" => "start",
						"name" => "Comment System & Featured Images" );	

$blog_settings[] =  array( "type" => "select",
						"name" => "Blog Comment System",
						"id" => THEME_SLUG."_blog_comments",
						"std" => "wordpress",
						"data" => array(
							"wordpress" => "Wordpress",
							"facebook" => "Facebook",
						),
						"desc" => "The selected comment system will be used for handling all the comments made on your blog posts. In order to moderate Facebook comments you must configure your Facebook settings under the Social Menu." );	
						
$blog_settings[] =  array( "type" => "imgboxchooser",
						"name" => "Featured Image Box",
						"id" => THEME_SLUG."_blog_imagebox",
						"std" => "thick-dark",
						"data" => $GLOBALS['image_boxes'],
						"desc" => "Select the image box or \"outline\" that should be displayed around the featured image for each blog post." );	
						
$blog_settings[] =  array( "type" => "shadowchooser",
						"name" => "Featured Image Shadow",
						"id" => THEME_SLUG."_blog_shadow",
						"std" => "perspective-1",
						"data" => $GLOBALS['shadow_styles'],
						"desc" => "Select the style of drop shadow that should be displayed under the featured image for each blog post." );							
								
$blog_settings[] = array( "type" => "stop" );


$blog_settings[] = array( "type" => "start",
						"name" => "Social Share Buttons" );	

$blog_settings[] =  array( "type" => "button",
						"name" => "Modify Blog Social Buttons",
						"data" => "Click To Open Social Page",
						"link" => "admin.php?page=theme-social-settings",
						"desc" => "The social network share buttons shown on each blog post are controled in the Social Settings area. Click the button to open that page in a new window." );						

$blog_settings[] = array( "type" => "stop" );


$theme_options[] =  array( "name" => "Blog",
					"id" => "blog",
					"slug" => "blog",
					"options" => $blog_settings
				);	