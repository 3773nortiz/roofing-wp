<?php

$content_width = array('full'=>960, 'sidebar'=>614);

function check_theme_metrics(){	
	return (get_option(THEME_SLUG.'_metrics') == md5(THEME_PRODUCT_ID));
}

function theme_get_option($option){
	if (check_theme_metrics()) {
		if (isset($GLOBALS['visual_editor_options'][$option])) {
			return ($GLOBALS['visual_editor_options'][$option] != 'null' ? $GLOBALS['visual_editor_options'][$option] : '');
		} else {
			global $vt_options;
			if(isset($GLOBALS['vt_options'][$option]))
				return $GLOBALS['vt_options'][$option];
			else
				return get_option($option);
		}
	}
}


/***** Add Menus *****/

if (function_exists('add_theme_support')) {
    add_theme_support('nav-menus');
	add_theme_support('menus');
}


/***** Register Menu *****/

register_nav_menu('Primary Navigation', 'Main Navigation');
register_nav_menu('Footer Navigation', 'Footer Navigation');


/***** Activate Post Thumbnails *****/

if ( function_exists( 'add_theme_support' ) ){
	add_theme_support('post-thumbnails', array('post', 'slideshow', 'portfolio'));
}


/***** Custom Thumbnail Sizes *****/

add_image_size('blog_thumb_image', 560, 260, true);
add_image_size('thumb', 80, 64, true);


/***** Scripts *****/

function theme_scripts(){
	
	if (check_theme_metrics()) {
		wp_enqueue_script("jquery");
		wp_enqueue_script('theme', THEME_JS.'/theme.js', array('jquery'));
		wp_localize_script('theme', 'ThemeAjax', array('ajaxurl' => admin_url( 'admin-ajax.php')));
	}
}
add_action('wp_enqueue_scripts', 'theme_scripts');


/***** CSS *****/

function theme_css(){
	
	if (check_theme_metrics()) {
		wp_enqueue_style("theme", THEME_HOME.'/style.css');	
	}
	if(!isset($GLOBALS['shortcode_preview']) && theme_get_option(THEME_SLUG."_responsive") != "false"){
		wp_enqueue_style("theme-mobile", THEME_CSS.'/mobile.css');
	}

	theme_custom_styles();
	echo '<style type="text/css">'."\n";
	echo $GLOBALS['custom_styles'];
	echo '</style>'."\n";
	
}
add_action('wp_enqueue_scripts', 'theme_css');


/***** Header *****/

function theme_head_meta(){
	global $post;
	
	echo '<meta http-equiv="Content-Type" content="'.get_bloginfo('html_type').'; charset='.get_bloginfo('charset').'" />'."\n";	
	$meta_description = "";
	if(is_singular()) { wp_enqueue_script('comment-reply');	}
	echo '<meta name="template_url" content="'.get_bloginfo('template_url').'" />'."\n";
	
	if(theme_get_option(THEME_SLUG."_seo") == "true" && isset($post->ID)){
		$meta_keywords = get_post_meta($post->ID, THEME_SLUG.'_meta_keywords', true);
		if(!$meta_keywords){
			$meta_keywords = theme_get_option(THEME_SLUG.'_meta_keywords');
		}
		if($meta_keywords){
			echo '<meta name="keywords" content="'.$meta_keywords.'" />'."\n";
		}		
		
		$meta_description = get_post_meta($post->ID, THEME_SLUG.'_meta_description', true);
		if(!$meta_description){
			$meta_description = theme_get_option(THEME_SLUG.'_meta_description');
		}
		if($meta_description){
			echo '<meta name="description" content="'.$meta_description.'" />'."\n";
		}
		$visibility = (array)get_post_meta($post->ID, THEME_SLUG.'_visibility', true);
		if(in_array('robots', $visibility)){
			echo '<meta name="robots" content="noindex,nofollow" />'."\n";
		}
	}	

	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />'."\n";

	$site_title = theme_get_option(THEME_SLUG.'_site_title');
	$meta_title = isset($post->ID) ? get_post_meta($post->ID, THEME_SLUG.'_meta_title', true) : '';
	echo '<title>';
	if($site_title){
		echo $site_title;
	}elseif($meta_title){
		echo $meta_title;
	}else{
		wp_title('-', true, 'right'); bloginfo('name');		
	}		
	echo '</title>'."\n";	
	
	echo '<link rel="pingback" href="'.get_bloginfo('pingback_url').'" />'."\n";
	
	$favicon_img = theme_get_option(THEME_SLUG."_favicon");
	if($favicon_img) { echo '<link rel="shortcut icon" href="'.$favicon_img.'">'."\n"; }
		
	if(isset($post->ID)){
		echo '<meta property="og:site_name" content="'.get_bloginfo('name').'"/>'."\n";
		$fb_appid = theme_get_option(THEME_SLUG."_fb_appid");
		if($fb_appid){
			echo '<meta property="fb:app_id" content="'.$fb_appid.'" />'."\n";
		}
		$fb_title = $fb_img = $fb_desc = $fb_url = "";
		if(is_home() || (is_front_page() && theme_get_option('show_on_front') == 'posts')){
			$fb_title = theme_get_option(THEME_SLUG."_blog_title");
		}elseif(is_single() || is_page($post->ID)){
			$fb_title = get_the_title($post->ID);
			if(has_post_thumbnail($post->ID)) {
				$image = array();
				$image = wp_get_attachment_image_src((int)get_post_thumbnail_id($post->ID), 'thumbnail', true);
				$fb_img = $image[0];
			}
			$fb_desc = theme_text_summary($post->post_content, 200);
			$fb_url = get_permalink($post->ID);
		}
		if($fb_title){
			echo '<meta property="og:title" content="'.$fb_title.'" />'."\n";
		}
		if($fb_img){
			echo '<meta property="og:image" content="'.$fb_img.'" />'."\n";
		}
		if($fb_desc){
			echo '<meta property="og:description" content="'.$fb_desc.'" />'."\n";
		}elseif($meta_description){
			echo '<meta property="og:description" content="'.$meta_description.'" />'."\n";
		}
		if($fb_url){
			echo '<meta property="og:url" content="'.$fb_url.'" />'."\n";
		}
	}
}

function theme_top_toolbar(){
	global $post;
	
	$post_id = isset($post->ID) ? $post->ID : 0;
	if(get_post_meta($post_id, THEME_SLUG.'_page_top_bar', true) == "" && theme_get_option(THEME_SLUG.'_top_bar') == "true"){
		echo '<div class="header-top-wrapper-shadow wrapper-shadow"><div id="header-top"><div class="top-toolbar-pattern"><div class="top-toolbar">';
		
		$logo = '';
		if(get_post_meta($post_id, THEME_SLUG.'_page_logo', true) == "" && theme_get_option(THEME_SLUG.'_logo') == "true" && theme_get_option(THEME_SLUG.'_logo_position') == "toptoolbar"){
			$logo_align = isset($_COOKIE[THEME_SLUG."_logo_align"]) ? $_COOKIE[THEME_SLUG."_logo_align"] : theme_get_option(THEME_SLUG."_logo_align");
			$logo .= '<div class="'.$logo_align.'"><a href="'.home_url().'" class="logo">';
			$logo_img = theme_get_option(THEME_SLUG."_site_logo");
			if($logo_img){
				$logo .= '<img src="'.$logo_img.'" alt="'.get_bloginfo('name').'" />';
			}
			$logo .= '</a></div>';
		}
		
		if ($logo && theme_get_option(THEME_SLUG.'_topbar_logo_position') == "top") {
			echo $logo;
		}
	
		$social_buttons_top = theme_get_option(THEME_SLUG."_social_buttons_top");
		if($social_buttons_top != "hide") {	
			$social_icons = theme_social_icons();
			echo '<div class="top-toolbar-'.$social_buttons_top.'">';
			echo '<div class="header-social">'.$social_icons.'</div>';
			echo '</div>';	
		}
		
		echo '<div class="'.theme_get_option(THEME_SLUG."_top_toolbar_align").'">';		
		generated_dynamic_sidebar("Top Toolbar");
		echo '</div>';
		
		if ($logo && theme_get_option(THEME_SLUG.'_topbar_logo_position') == "bottom") {
			echo $logo;
		}
		
		echo '<div class="clear"></div></div></div></div></div>';
	}
}

function theme_header(){	
	global $post;
	
	$post_id = isset($post->ID) ? $post->ID : 0;
        if(get_post_meta($post_id, THEME_SLUG.'_page_header_shown', true) == "" && theme_get_option(THEME_SLUG.'_header_shown') == "true"){
            echo '<div class="header-'.theme_get_option(THEME_SLUG.'_header_layout').'"><div class="header-wrapper-shadow wrapper-shadow">';
            echo '<div id="header"><div class="header-pattern">';
            echo '<div class="header-wrapper">';

            $top_header_align = isset($_COOKIE[THEME_SLUG."_top_header_align"]) ? $_COOKIE[THEME_SLUG."_top_header_align"] : theme_get_option(THEME_SLUG."_top_header_align");
            echo '<div class="top-header '.$top_header_align.' small-content"><div class="top-header-widgets">';
            generated_dynamic_sidebar("Header");
            echo '</div></div>';	

            if(get_post_meta($post_id, THEME_SLUG.'_page_logo', true) == "" && theme_get_option(THEME_SLUG.'_logo') == "true" && theme_get_option(THEME_SLUG.'_logo_position') == "header"){
                    $logo_align = isset($_COOKIE[THEME_SLUG."_logo_align"]) ? $_COOKIE[THEME_SLUG."_logo_align"] : theme_get_option(THEME_SLUG."_logo_align");
                    echo '<div class="logo-container '.$logo_align.'"><a href="'.home_url().'" class="logo">';
                    $logo_img = theme_get_option(THEME_SLUG."_site_logo");
                    if($logo_img){
                            echo '<img src="'.$logo_img.'" alt="'.get_bloginfo('name').'" />';
                    }
                    echo '</a></div>';
            }

            if(get_post_meta($post_id, THEME_SLUG.'_page_main_menu', true) == "" && theme_get_option(THEME_SLUG.'_main_menu') == "true"){
                    echo theme_menu();
            }
            echo '<div class="clear"></div>';
            echo '<div class="'.((get_post_meta($post_id, THEME_SLUG.'_page_header_divider', true) == "" && theme_get_option(THEME_SLUG.'_header_divider') == "true") ? 'header-divider' : 'header-nodivider').'"></div>';
            echo '</div></div></div></div></div>';
        }
}

function theme_menu(){
	
	$depth = 1;
	if(theme_get_option(THEME_SLUG."_mainmenu_dropdown") == 'true'){	
		$depth = 0;
	}
	if(has_nav_menu('Primary Navigation')){
		$menu_style = isset($_COOKIE[THEME_SLUG."_menu_style"]) ? $_COOKIE[THEME_SLUG."_menu_style"] : theme_get_option(THEME_SLUG."_menu_style");
		$menu_align = isset($_COOKIE[THEME_SLUG."_menu_align"]) ? $_COOKIE[THEME_SLUG."_menu_align"] : theme_get_option(THEME_SLUG."_menu_align");
		$ddmenu_style = isset($_COOKIE[THEME_SLUG."_ddmenu_style"]) ? $_COOKIE[THEME_SLUG."_ddmenu_style"] : theme_get_option(THEME_SLUG."_ddmenu_style");
		echo '<div class="main-menu-wrapper '.$menu_align.'"><div id="main-menu-nav" class="'.$menu_style.' '.$ddmenu_style.'">';
		wp_nav_menu(array('container' => '', 'theme_location' => 'Primary Navigation', 'sort_column' => 'menu_order', 'menu_class' => '', 'echo' => true, 'menu_id' => 'main-menu', 'depth' => $depth, 'walker' => new nav_walker()));		
		echo '<div id="mobile-menu-nav"><select id="mobile-menu-select"></select></div></div></div>';
	}
}

/***** Head *****/

function theme_head($breadcrumbs="true", $title="true"){
	global $post;

	$post_id = isset($post->ID) ? $post->ID : 0;
	echo '<div id="head">';
	if(!is_front_page()){		
		
		if(get_post_meta($post_id, THEME_SLUG.'_page_breadcrumbs', true) == "" && theme_get_option(THEME_SLUG."_breadcrumbs") == "true" && $breadcrumbs == "true" && !((is_front_page() && theme_get_option('show_on_front') == 'posts'))) {
			echo '<div class="breadcrumb">';
			breadcrumbs_plus();
			echo '</div>';
		}	
		
		if(get_post_meta($post_id, THEME_SLUG.'_page_heading', true) == "" && theme_get_option(THEME_SLUG."_heading") == "true" && $title == "true"){
			echo '<h1>';	
			if (is_home() || (is_front_page() && theme_get_option('show_on_front') == 'posts')) { echo theme_get_option(THEME_SLUG."_blog_title"); }
			elseif (is_404()) { echo theme_get_option(THEME_SLUG."_404_title"); }
			elseif (is_search()) { echo "Search Results"; }
			elseif (is_archive()) {
				if (is_category()) { echo "Archive for '".single_cat_title('',false)."'"; }
				elseif (is_tag()) { echo "Archive for '".single_tag_title('',false)."'"; }
				elseif (is_day()) { echo "Archive for '".get_the_time('F jS, Y')."'"; }
				elseif (is_month()) { echo "Archive for '".get_the_time('F, Y')."'"; }
				elseif (is_year()) { echo "Archive for '".get_the_time('Y')."'"; }
				elseif (is_author()) { echo "Author Archive"; }
				elseif (is_tax()) { echo single_term_title('',false); }
				elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { echo "Blog Archives"; }					
			}else echo get_the_title($post_id);
			echo '</h1>';				
		}				
	}
	echo '</div><div class="clear"></div>';
}

function theme_search_bar($align="none", $box="true"){

	$output = '<div class="align-'.$align.($box=="true" ? ' search-box': '').'"><form method="get" id="searchform" action="'.site_url().'" >';
	$output .= '<div><input type="text" name="s" value="Search..." id="s" onfocus=\'this.value=(this.value=="Search...") ? "" : this.value;\' onblur=\'this.value=(this.value=="") ? "Search..." : this.value;\' /><input type="submit" id="searchsubmit" value="Search" />';
	$output .= '</div></form></div>';
	return $output;
}

function theme_sidebar($type="content"){
	
	if($type == "content"){
		generated_dynamic_sidebar();
	}
	if($type == "blog"){
		if( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) {}	
	}		
}


/***** Footer *****/

function theme_footer(){
	global $post;
	
	$post_id = isset($post->ID) ? $post->ID : 0;
	$page_footer_widgets = (get_post_meta($post_id, THEME_SLUG.'_page_footer_widgets', true) == "" && theme_get_option(THEME_SLUG."_footer_widgets") == "true") ? true : false;
	$page_bottom_footer = (get_post_meta($post_id, THEME_SLUG.'_page_bottom_footer', true) == "" && theme_get_option(THEME_SLUG."_bottom_footer") == "true") ? true : false;
	echo '<div class="footer-wrapper-shadow wrapper-shadow">';
	if(!$page_footer_widgets){
		echo '<div class="wrapper no-footer"></div>';
	}
	echo '<div id="footer">';
	if($page_footer_widgets || $page_bottom_footer){
		echo '<div class="footer-wrapper"><div class="footer-overlay"><div class="footer-pattern">';
		if($page_footer_widgets){
			echo theme_footer_widgets();
		}
		if($page_bottom_footer){
			echo theme_footer_bottom();
		}
		echo '</div></div></div>';
	}
	echo '</div></div>';
}

function theme_footer_widgets() {

	echo '<div class="footer-widgets">';
	$footer_columns = theme_get_option(THEME_SLUG."_footer_columns");
	$footer_separator = (theme_get_option(THEME_SLUG."_footer_separator") == "true")?' separator':'';
	
	switch($footer_columns){
		case 'one':
			get_footer_sidebar(1, 'full');
			break;
		case 'one-half':
			get_footer_sidebar(1, 'one-half'.$footer_separator);
			get_footer_sidebar(2, 'one-half last');
			break;
		case 'one-third':
			get_footer_sidebar(1, 'one-third'.$footer_separator);
			get_footer_sidebar(2, 'one-third'.$footer_separator);
			get_footer_sidebar(3, 'one-third last');
			break;
		case 'one-fourth':
			get_footer_sidebar(1, 'one-fourth'.$footer_separator);
			get_footer_sidebar(2, 'one-fourth'.$footer_separator);
			get_footer_sidebar(3, 'one-fourth'.$footer_separator);
			get_footer_sidebar(4, 'one-fourth last');
			break;		
	}

	echo '<div class="clear"></div></div>';
}

function get_footer_sidebar($i, $class){
	global $footer_column_sidebars;
	echo '<div class="'.$class.' column-responsive-'.theme_get_option(THEME_SLUG."_footer_columns_responsive").'">';
	dynamic_sidebar($footer_column_sidebars[$i-1]);
	echo '</div>';
}

function theme_footer_bottom(){

	$footer_bar_layout = theme_get_option(THEME_SLUG."_footer_bar_layout");
	$logo_img = theme_get_option(THEME_SLUG."_footer_logo");
	$copyright_text = trim(stripslashes(theme_get_option(THEME_SLUG."_copyright_text")));
	echo '<div id="footer-bottom"><div class="footer-bar-pattern"><div class="bottom-toolbar '.$footer_bar_layout.'">';	
	echo '<div class="footer-text-wrapper">';
	echo $copyright_text ? '<div class="copyright">'.$copyright_text.'</div>' : '';
	if(has_nav_menu('Footer Navigation')){
		wp_nav_menu(array('container_class' => 'footer-menu', 'theme_location' => 'Footer Navigation', 'sort_column' => 'menu_order', 'menu_class' => '', 'echo' => true, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 1));
	}
	echo '</div>';
	echo ($logo_img && $footer_bar_layout=='layout-1') ? '<div class="footer-logo"><a href="'.home_url().'"><img src="'.$logo_img.'" alt="'.get_bloginfo('name').'" /></a></div>' : '';
	if(theme_get_option(THEME_SLUG."_social_buttons_bottom") == "true"){
		$social_icons = theme_social_icons();
		echo '<div class="footer-social">'.$social_icons.'</div>';
	}
	echo ($logo_img && $footer_bar_layout!='layout-1') ? '<div class="footer-logo"><a href="'.home_url().'"><img src="'.$logo_img.'" alt="'.get_bloginfo('name').'" /></a></div>' : '';
	echo '<div class="clear"></div></div></div></div>';
}

function theme_resized_image($url, $width, $height, $class="", $alt="", $hover_image_url=""){
	$height = preg_replace("/[^0-9]/", "", $height);
	$width = preg_replace("/[^0-9]/", "", $width);
	
	$h = $h1 = "";
	if($height){
		$h = '&amp;h='.$height;
	//	$h1 = ' height="'.$height.'"';
	}
	
	$alt = $alt ? ' alt="'.$alt.'"' : '';
	$class = $class ? ' class="'.$class.'"' : '';
	
	if($width && $url){
		return '<img src="'.THEME_HOME.'/timthumb.php?src='.urlencode($url).'&amp;w='.$width.$h.'&amp;zc=1" width="'.$width.'"'.$h1.$alt.$class.' />';
	}elseif($url){
		return '<img src="'.$url.'"'.$alt.$class.' />';
	}
}

function theme_image_box_size($box, $iwidth){
	$iwidth = (int)$iwidth;
	switch($box){
		case 'thick-dark':	
			$iwidth = $iwidth+10;
			break;
		case 'thick-light':	
			$iwidth = $iwidth+12;
			break;
		case 'thin-dark':	
			$iwidth = $iwidth+6;
			break;
		case 'thin-light':	
			$iwidth = $iwidth+8;
			break;
		case 'basic-outline':	
			$iwidth = $iwidth+4;
			break;
		case 'elegant':	
			$iwidth = $iwidth+16;
			break;			
		case '':
		default:
			$iwidth = $iwidth;
			break;
	}
	return $iwidth;
}

function theme_shadow_image($shadow, $width){
	$output = '';
	if($shadow && $width){
		$output .= '<div class="image-shadow"><img src="'.THEME_HOME.'/timthumb.php?src='.THEME_HOME.'/images/shadows/'.$shadow.'.png&amp;w='.$width.'" alt="" /></div>';
	}elseif($shadow){
		$output .= '<div class="image-shadow"><img src="'.THEME_HOME.'/images/shadows/'.$shadow.'.png" alt="" /></div>';	
	}
	return $output;
}

function theme_text_summary($str, $limit=100, $strip = true) {

	$str = strip_shortcodes($str);
	$str = $strip ? strip_tags($str) : $str;
	$str = preg_replace('/\s+/', ' ', $str);
	$str = str_replace('&nbsp;', '', $str);
	$str = str_replace('[raw]', '', $str);
 	$str = str_replace('[/raw]', '', $str);
	if(strlen($str) > $limit){
		$str = substr($str, 0, $limit);
        $str = (substr($str, 0, strrpos($str, ' ')).'...');
    }
	$str = trim($str);
    return $str;
}

function theme_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
remove_filter ('the_content',  'wpautop');
remove_filter ('comment_text', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'theme_formatter', 99);
remove_filter ('widget_text',  'wpautop');
remove_filter('widget_text', 'wptexturize');
add_filter('widget_text', 'theme_formatter', 99);


function wp_new_excerpt($text) {
	if ($text == '')
	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 80);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '...');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_new_excerpt');



add_filter('user_contactmethods','hide_profile_fields',10,1);

function hide_profile_fields( $contactmethods ) {
unset($contactmethods['aim']);
unset($contactmethods['jabber']);
unset($contactmethods['yim']);
return $contactmethods;
}




/* CUSTOM ARCHIVES PARAMETERS 

MODIFIED BY FIVESQUARED, ORIGINAL PLUGIN DEVELOPER:
Plugin Name: Archives for a category 
Plugin URI: http://kwebble.com/blog/2007_08_15/archives_for_a_category
Description: Adds a cat parameter to wp_get_archives() to limit the posts used to generate the archive links to one or more categories.   
Author: Rob Schlüter
Author URI: http://kwebble.com/
Version: 1.4a

Copyright
=========
Copyright 2007, 2008, 2009 Rob Schlüter. All rights reserved.

Licensing terms
===============
- You may use, change and redistribute this software provided the copyright notice above is included. 
- This software is provided without warranty, you use it at your own risk. 
*/
function kwebble_getarchives_where_for_category($where, $args){
	global $kwebble_getarchives_data, $wpdb;

	if (isset($args['cat'])){
		// Preserve the category for later use.
		$kwebble_getarchives_data['cat'] = $args['cat'];

		// Split 'cat' parameter in categories to include and exclude.
		$allCategories = explode(',', $args['cat']);

		// Element 0 = included, 1 = excluded.
		$categories = array(array(), array());
		foreach ($allCategories as $cat) {
			if (strpos($cat, ' ') !== FALSE) {
				// Multi category selection.
			}
			$idx = $cat < 0 ? 1 : 0;
			$categories[$idx][] = abs($cat);
		}

		$includedCatgories = implode(',', $categories[0]);
		$excludedCatgories = implode(',', $categories[1]);

		// Add SQL to perform selection.
		if (get_bloginfo('version') < 2.3){
			$where .= " AND $wpdb->posts.ID IN (SELECT DISTINCT ID FROM $wpdb->posts JOIN $wpdb->post2cat post2cat ON post2cat.post_id=ID";

			if (!empty($includedCatgories)) {
				$where .= " AND post2cat.category_id IN ($includedCatgories)";
			}
			if (!empty($excludedCatgories)) {
				$where .= " AND post2cat.category_id NOT IN ($excludedCatgories)";
			}

			$where .= ')';
		} else{
			$where .= ' AND ' . $wpdb->prefix . 'posts.ID IN (SELECT DISTINCT ID FROM ' . $wpdb->prefix . 'posts'
					. ' JOIN ' . $wpdb->prefix . 'term_relationships term_relationships ON term_relationships.object_id = ' . $wpdb->prefix . 'posts.ID'
					. ' JOIN ' . $wpdb->prefix . 'term_taxonomy term_taxonomy ON term_taxonomy.term_taxonomy_id = term_relationships.term_taxonomy_id'
					. ' WHERE term_taxonomy.taxonomy = \'category\'';
			if (!empty($includedCatgories)) {
				$where .= " AND term_taxonomy.term_id IN ($includedCatgories)";
			}
			if (!empty($excludedCatgories)) {
				$where .= " AND term_taxonomy.term_id NOT IN ($excludedCatgories)";
			}

			$where .= ')';
		}
	}

	return $where;
}

 /* Changes the archive link to include the categories from the 'cat' parameter.
 */
function kwebble_archive_link_for_category($url){
	global $kwebble_getarchives_data;

	if (isset($kwebble_getarchives_data['cat'])){
		$url .= strpos($url, '?') === false ? '?' : '&';
		$url .= 'cat=' . $kwebble_getarchives_data['cat'];

		// Remove cat parameter so it's not automatically used in all following archive lists.
		unset($kwebble_getarchives_data['cat']);
	}

	return $url;
}

// Prevent error if executed outside WordPress.
if (function_exists('add_filter')){
	// Constants for form field and options.
	define('KWEBBLE_OPTION_DISABLE_CANONICAL_URLS', 'kwebble_disable_canonical_urls');
	define('KWEBBLE_GETARCHIVES_FORM_CANONICAL_URLS', 'kwebble_disable_canonical_urls');
	define('KWEBBLE_ENABLED', '');
	define('KWEBBLE_DISABLED', 'Y');

	add_filter('getarchives_where', 'kwebble_getarchives_where_for_category', 10, 2);

	add_filter('year_link', 'kwebble_archive_link_for_category');
	add_filter('month_link', 'kwebble_archive_link_for_category');
	add_filter('day_link', 'kwebble_archive_link_for_category');

	// Disable canonical URLs if the option is set.
	if (theme_get_option(KWEBBLE_OPTION_DISABLE_CANONICAL_URLS) == KWEBBLE_DISABLED){
		remove_filter('template_redirect', 'redirect_canonical');
	}
}


function check_content($content) {
	
	if (!check_theme_metrics()) {
		return '';
	} else {
		return $content;
	}
	
}
add_filter( 'the_content', 'check_content' );


