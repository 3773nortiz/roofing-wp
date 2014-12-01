<?php

/******** Social Settings ********/	

$social_settings = array();

$social_settings[] =  array( "type" => "html",
						"desc" => "In this section you can configure the options for connecting your Facebook, Youtube and Twitter accounts to your website. You can also configure how your site will appear to visitors on mobile devices." );
						
						
$social_settings[] = array( "type" => "start",
						"name" => "Social Buttons" );
						
$social_settings[] =  array( "type" => "select",
						"name" => "Top Social Buttons",
						"id" => THEME_SLUG."_social_buttons_top",
						"std" => "left",	
						"data" => array(
							"left" => "Align Left",
							"right" => "Align Right",
							"hide" => "Disabled",
						),
						"desc" => "Set the alignment of the social buttons in the Top Bar" );

$social_settings[] =  array( "type" => "toggle",
						"name" => "Bottom Social Buttons",
						"id" => THEME_SLUG."_social_buttons_bottom",
						"std" => "false",						
						"desc" => "Shows/hides the social buttons in the Bottom Footer" );
						
$social_settings[] =  array( "type" => "text",
						"name" => "RSS",
						"id" => THEME_SLUG."_sn_rss",
						"std" => get_bloginfo('rss2_url'),
						"class" => "rss",
						"desc" => "Enter the URL's that you want you social buttons to link to. Leave a field blank to not show that button. By default your RSS feed URL will be yourdomain.com/theme/revo/feed/" );	

$social_settings[] =  array( "type" => "text",
						"name" => "Facebook",
						"id" => THEME_SLUG."_sn_facebook",
						"std" => "http://facebook.com",
						"class" => "facebook",
						"desc" => "Enter the URL of your websites Facebook page. (If left blank the button won't be shown)" );

$social_settings[] =  array( "type" => "text",
						"name" => "Twitter",
						"id" => THEME_SLUG."_sn_twitter",
						"std" => "http://twitter.com",
						"class" => "twitter",
						"desc" => "Enter the URL of your websites Twitter profile. (If left blank the button won't be shown)" );

$social_settings[] =  array( "type" => "text",
						"name" => "Youtube",
						"id" => THEME_SLUG."_sn_youtube",
						"std" => "http://youtube.com",
						"class" => "youtube",
						"desc" => "Enter the URL of your websites Youtube channel. (If left blank the button won't be shown)" );

$social_settings[] =  array( "type" => "text",
						"name" => "LinkedIn",
						"id" => THEME_SLUG."_sn_linkedin",
						"std" => "http://linkedin.com",
						"class" => "linkedin",
						"desc" => "Enter the URL of your websites LinkedIn profile. (If left blank the button won't be shown)" );
						
$social_settings[] =  array( "type" => "text",
						"name" => "Google Plus",
						"id" => THEME_SLUG."_sn_gplus",
						"std" => "http://plus.google.com",
						"class" => "gplus",
						"desc" => "Enter the URL of your websites Google Plus profile. (If left blank the button won't be shown)" );

$social_settings[] =  array( "type" => "text",
						"name" => "Pinterest",
						"id" => THEME_SLUG."_sn_pinterest",
						"std" => "http://pinterest.com",
						"class" => "pinterest",
						"desc" => "Enter the URL of your websites Pinterest profile. (If left blank the button won't be shown)" );
						
$social_settings[] = array( "type" => "stop" );


$social_settings[] = array( "type" => "start",
						"name" => "Facebook" );
									
$social_settings[] =  array( "type" => "text",
						"name" => "Max Comments Per Page",
						"id" => THEME_SLUG."_fb_comments_count",
						"std" => "20",
						"size" => "small",
						"desc" => "if you are using the Facebook comment system this will adjust how many Facebook comments should be shown on each page of comments." );								

$social_settings[] =  array( "type" => "toggle",
						"name" => "\"Like\" Button On Blog Posts",
						"id" => THEME_SLUG."_blog_fblike",
						"std" => "true",
						"desc" => "This will set if there should be a Facebook Like button shown on your blog posts." );	

$social_settings[] =  array( "type" => "fblike",
						"name" => "\"Like\" Button Style",
						"id" => THEME_SLUG."_fb_like_layout",
						"std" => "standard",
						"data" => array(
							"standard" => "Standard",
							"button_count" => "Button Count",
							"box_count" => "Box Count",
						),
						"size" => "normal",
						"desc" => "Pick the style of like button that best matches your site layout and design." );
						
$social_settings[] =  array( "type" => "toggle",
						"name" => "Show Profile Pictures",
						"id" => THEME_SLUG."_fb_like_faces",
						"std" => "true",
						"desc" => "Enable this to show the profile picture of all the people that have liked each post. NOTE: Standard \"Like\" Button Style must be selected." );
		
$social_settings[] =  array( "type" => "select",
						"name" => "\"Like\" Button Color Scheme",
						"id" => THEME_SLUG."_fb_like_color",
						"std" => "dark",
						"data" => array(
							"light" => "Light",
							"dark" => "Dark",
						),
						"size" => "normal",
						"desc" => "Select which Facebook button color scheme you would like to use." );						
						
$social_settings[] = array( "type" => "stop" );


$social_settings[] = array( "type" => "start",
						"name" => "Twitter" );
												
$social_settings[] =  array( "type" => "text",
						"name" => "Twitter User Name",
						"id" => THEME_SLUG."_twitter_username",
						"std" => "youtube",
						"size" => "normal",
						"desc" => "This username will be added as @username to the end of a tweet when someone tweets one of your blog posts .The @ sign is used to call out usernames in Tweets, like this: Hello @Twitter! When a username is preceded by the @ sign, it becomes a link to a Twitter profile. In addition the original tweet will be shown on the @user's profile page.A great way to help see who's tweeting your stuff." );	

$social_settings[] =  array( "type" => "button",
						"name" => "Latest Tweets Widget",
						"data" => "Click To Open Widgets",
						"link" => "widgets.php",
						"desc" => "If you would like to add a Twitter feed widget to your site or widgetized footer you must do so on the Wordpress Widgets page. Click the button to open that page in a new window." );											
						
$social_settings[] =  array( "type" => "toggle",
						"name" => "Tweet Cache",
						"id" => THEME_SLUG."_twitter_cache",
						"std" => "true",
						"desc" => "This works in conjunction with the Twitter widget that displays recent tweets from your account. In an effort to reduce website load time your tweets can be stored locally temporarily to reduce how often the server needs to access twitter to get your recent tweets NOTE: the \"/wp-content/uploads/\" directory must be writable for this to work." );

$social_settings[] =  array( "type" => "text",
						"name" => "Cache Time",
						"id" => THEME_SLUG."_twitter_cache_for",
						"std" => "60",
						"size" => "small",
						"desc" => "This is how many minutes to cache your recent tweets locally. Set this to a value that won't interfere with your tweeting schedule. So for example if you tweet once at about the same time each day you could set this to 1440 minutes. However if you tweet every couple hours each day set this to a lower value such as 60." );						
		
$social_settings[] =  array( "type" => "toggle",
						"name" => "\"Tweet\" Button On Blog Posts",
						"id" => THEME_SLUG."_blog_tweet",
						"std" => "true",
						"desc" => "This will set if there should be a Tweet button shown on your blog posts." );
						
$social_settings[] =  array( "type" => "tweet",
						"name" => "\"Tweet\" Button Style",
						"id" => THEME_SLUG."_tweetbutton_layout",
						"std" => "none",
						"data" => array(
							"none" => "Standard",
							"vertical" => "Vert. Count",
							"horizontal" => "Horiz. Count",
						),
						"size" => "normal",
						"desc" => "Pick the style of Tweet button that best matches your site layout and design." );

$social_settings[] = array( "type" => "stop" );


$social_settings[] = array( "type" => "start",
						"name" => "Google+" );
						
$social_settings[] =  array( "type" => "gplus",
						"name" => "Google +1 Button",
						"id" => THEME_SLUG."_gplusone_layout",
						"std" => "none",
						"data" => array(
							"none" => "Standard",
							"vertical" => "Vertical Count",
							"horizontal" => "Horizontal Count",
						),
						"size" => "normal",
						"desc" => "Sets which layout you would like to use for your Google +1 button." );	
	
$social_settings[] =  array( "type" => "toggle",
						"name" => "\"+1\" Button On Blog Posts",
						"id" => THEME_SLUG."_blog_gplus1",
						"std" => "true",
						"desc" => "This will set if there should be a Google +1 button shown on your blog posts." );
	
$social_settings[] = array( "type" => "stop" );

	
$social_settings[] = array( "type" => "start",
						"name" => "Pinterest" );
						
$social_settings[] =  array( "type" => "toggle",
						"name" => "\"Pin It\" Button On Blog Posts",
						"id" => THEME_SLUG."_blog_pinterest",
						"std" => "true",
						"desc" => "This will set if there should be a Pin It button shown on your blog posts." );						

$social_settings[] =  array( "type" => "pinit",
						"name" => "\"Pin It\" Button Layout",
						"id" => THEME_SLUG."_pinit_layout",
						"std" => "no-count",
						"data" => array(
							"no-count" => "No Count",
							"vertical" => "Vertical",
							"horizontal" => "Horizontal",
						),
						"size" => "normal",
						"desc" => "Select how you want your Pin It button to look." );
						
$social_settings[] = array( "type" => "stop" );

						
$theme_options[] =  array( "name" => "Social",
					"id" => "social",
					"slug" => "social", 
					"options" => $social_settings
				);
				
