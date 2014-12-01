<?php

function get_font_styles($element){
	$styles = (array)theme_get_option($element);
	$output = "";
	if(in_array('bold', $styles)){
		$output .= 'font-weight:bold;';
	}else{
		$output .= 'font-weight:normal;';
	}
	if(in_array('italic', $styles)){
		$output .= 'font-style:italic;';
	}
	if(in_array('underline', $styles)){
		$output .= 'text-decoration:underline;';
	}
	if(in_array('uppercase', $styles)){
		$output .= 'text-transform:uppercase;';
	}
	return $output;
}

function get_font_color($element, $important = false){
	$color = theme_get_option($element);
	$output = "";
	if($color){
		$output .= 'color:#'.$color.($important ? ' !important' : '').';';
	}
	return $output;
}

function get_text_shadow($element, $important = false){
	$color = theme_get_option($element);
	$output = "";
	if($color && $color != 'none'){
		$output .= 'text-shadow:1px 1px #'.$color.($important ? ' !important' : '').';';
	}else{
		$output .= 'text-shadow:none'.($important ? ' !important' : '').';';
	}
	return $output;
}

function get_gradient_background($bg_color_1, $bg_color_2){
	
	if ($bg_color_1 && $bg_color_2)
		return 'background:-moz-linear-gradient(top, #'.$bg_color_1.' 0%, #'.$bg_color_2.' 100%);background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#'.$bg_color_1.'), color-stop(100%,#'.$bg_color_2.'));background:-webkit-linear-gradient(top, #'.$bg_color_1.' 0%,#'.$bg_color_2.' 100%);background:-o-linear-gradient(top, #'.$bg_color_1.' 0%,#'.$bg_color_2.' 100%);background:-ms-linear-gradient(top, #'.$bg_color_1.' 0%,#'.$bg_color_2.' 100%);background:linear-gradient(to bottom, #'.$bg_color_1.' 0%,#'.$bg_color_2.' 100%);';
	return '';
}

function get_font_family($element){
	global $general_fonts, $google_fonts;
	if($element){
		$font_family = explode('::', $element);
		$font_family_type = $font_family[0];
		$font_family = $font_family[1];
		if($font_family_type == 'cufon'){
			$font_family = array_search($font_family, $cufon_fonts);
			if($font_family){
				$custom_cufon_fonts[] = $font_family;
				$custom_cufon_replace[$font_family][] = $cl;
			}
		}elseif($font_family_type == 'google'){
			return get_google_font_family($font_family);
		}elseif($font_family_type == 'general'){
			return 'font-family:'.$general_fonts[$font_family].';';
		}
	}
}

function get_google_font_family($element){
	global $google_fonts;
	$element = str_replace(' ', '+', $element);
	$font = array_search($element, $google_fonts);	
	if($font != ''){
		wp_enqueue_style("theme-gfont-".str_replace(' ', '', $font), 'http://fonts.googleapis.com/css?family='.$element);
		return 'font-family:"'.$font.'";';
	}
}

$GLOBALS['custom_styles'] = '';
function theme_custom_styles() {
	global $general_fonts, $google_fonts, $post;
	
	$output  = '';		
	$bgcolor = theme_get_option(THEME_SLUG."_bgcolor");
	$bgimage = theme_get_option(THEME_SLUG."_bgimage");
	$bgimage = theme_get_option(THEME_SLUG."_bgimage_list") ? THEME_BACKGROUNDS.theme_get_option(THEME_SLUG."_bgimage_list") : $bgimage;
	$bgimage = $bgimage == THEME_BACKGROUNDS.'none' ? '' : $bgimage;
	$bgimage_scale = theme_get_option(THEME_SLUG."_bgimage_scale") == "true" ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '' ;
	$bgimage_position = theme_get_option(THEME_SLUG."_bgimage_position") ? theme_get_option(THEME_SLUG."_bgimage_position") : '';
	$output .= 'html{background-color:#'.$bgcolor.';'.get_gradient_background($bgcolor, theme_get_option(THEME_SLUG."_bgcolor_gradient")).($bgimage ? 'background-image:url('.$bgimage.');' : '').'background-repeat:'.theme_get_option(THEME_SLUG."_bgimage_repeat").';'.$bgimage_scale.($bgimage_position ? 'background-position:'.$bgimage_position.';' : '').'}'."\n";	
	$output .= 'body{'.get_font_family(theme_get_option(THEME_SLUG."_gcontent_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_gcontent_font_size").'px;'.get_font_color(THEME_SLUG."_gcontent_font_color").get_font_styles(THEME_SLUG."_gcontent_font_style").'}'."\n";	
	$bgimage_attachment = theme_get_option(THEME_SLUG."_bgimage_attachment");
	$output .= 'html, .pattern{background-attachment:'.$bgimage_attachment.';}'."\n";	
	$bgpattern = theme_get_option(THEME_SLUG."_bgpattern");
	if($bgpattern){
		$output .= '.pattern{background-image:url('.THEME_HOME.'/images/patterns/'.$bgpattern.');}'."\n";
	}		
	if($GLOBALS['content_bgcolor']){
		$output .= '.wrapper{background-color:#'.$GLOBALS['content_bgcolor'].';'.get_gradient_background($GLOBALS['content_bgcolor'], theme_get_option(THEME_SLUG."_content_bgcolor_gradient")).'}'."\n";
	}else{
		if($blogbg_color = theme_get_option(THEME_SLUG."_blogbg_color")){			
			$output .= '.post-content, .post-left-meta, .post-title, .progressive-content .html-sitemap, .progressive-content.search-results ul.search-list, .progressive-content.error404 #content{background-color:#'.$blogbg_color.';}'."\n";
		}	
		if($widgetbg_color = theme_get_option(THEME_SLUG."_widgetbg_color")){			
			$output .= '#sidebar .sidebar-widget{background-color:#'.$widgetbg_color.';}'."\n";
		}
	}
	$content_bgimage = theme_get_option(THEME_SLUG."_content_bgimage");
	$content_bgimage_scale = theme_get_option(THEME_SLUG."_content_bgimage_scale") == "true" ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '' ;	
	

	// Check if a max width is set and build output START
	    $main_content_max_width = theme_get_option(THEME_SLUG."_main_content_max_width");
         if($main_content_max_width === "") {
                // if max width isn't set echo nothing for max width area
				$main_content_max_width_export = ";";
                
        }
        else {
                // if max width is set build max wdith export
               $main_content_max_width_export = ";max-width:" . $main_content_max_width . ";";
        }	
	// 	Check if a max width is set and build output END
	
		// Check if a min width is set and build output START
	    $main_content_min_width = theme_get_option(THEME_SLUG."_main_content_min_width");
         if($main_content_min_width === "") {
                // if min width isn't set echo nothing for max width area
				$main_content_min_width_export = ";";
                
        }
        else {
                // if min width is set build max wdith export
               $main_content_min_width_export = ";min-width:" . $main_content_min_width . ";";
        }	
	// 	Check if a min width is set and build output END
	
			
		
	//main content width	
	$output .= '.wrapper{'.($content_bgimage ? 'background-image:url('.$content_bgimage.');' : '').'width: '.theme_get_option(THEME_SLUG."_main_content_width").$main_content_max_width_export.'background-repeat:'.theme_get_option(THEME_SLUG."_content_bgimage_repeat").$main_content_min_width_export.(theme_get_option(THEME_SLUG."_content_bgimage_position") ? 'background-position:'.theme_get_option(THEME_SLUG."_content_bgimage_position").';' : '').'background-attachment:'.theme_get_option(THEME_SLUG."_content_bgimage_attachment").';'.$content_bgimage_scale.'}'."\n";
	
	//Top Bar Content Width	
	$output .= '#header-top .top-toolbar{'.'width: '.theme_get_option(THEME_SLUG."_topbar_content_width").';}'."\n";
	
	//Top Bar Background Width	
	$output .= '.header-top-fixed-width-attached #header-top, .header-top-fixed-width-detached #header-top{'.'width: '.theme_get_option(THEME_SLUG."_topbar_background_width").';}'."\n";
	
	//Header Content Width	
	$output .= '#header .header-wrapper{'.'width: '.theme_get_option(THEME_SLUG."_header_content_width").';}'."\n";
	
	//Header Background Width	
	$output .= '.header-fixed-width #header{'.'width: '.theme_get_option(THEME_SLUG."_header_background_width").';}'."\n";
	
	//Bottom Footer Content Width	
	$output .= '#footer-bottom .bottom-toolbar{'.'width: '.theme_get_option(THEME_SLUG."_bottomfooter_content_width").';}'."\n";
	
	//Bottom Footer Areas Background Width	
	$output .= '.footer-fixed-width-attached #footer, .footer-fixed-width-detached #footer{'.'width: '.theme_get_option(THEME_SLUG."_footer_backgrounds_width").';}'."\n";	
		
	//Drop Shadow Areas	
	$output .= '.box-shadow.header-top-fixed-width-detached .wrapper-shadow-top{'.'width: '.theme_get_option(THEME_SLUG."_drop_shadow_width").';}'."\n";
	$output .= '.box-shadow.footer-fixed-width-detached .wrapper-shadow-bottom{'.'width: '.theme_get_option(THEME_SLUG."_drop_shadow_width").';}'."\n";
	$output .= '.box-shadow .wrapper-shadow{'.'width: '.theme_get_option(THEME_SLUG."_drop_shadow_width").';}'."\n";
	$output .= '.box-shadow .header-wrapper-shadow{'.'width: '.theme_get_option(THEME_SLUG."_drop_shadow_width").';}'."\n";
		
	$output .= theme_get_option(THEME_SLUG."_content_bgpattern") ? '.wrapper-pattern{background-image:url('.THEME_HOME.'/images/patterns/'.theme_get_option(THEME_SLUG."_content_bgpattern").');background-attachment:fixed;}'."\n" : '';
	
	$output .= '.main-container{ padding: '.theme_get_option(THEME_SLUG."_main_content_padding").';}';
	//$output .= '@media (max-width: 767px) { .main-container{ padding: '.theme_get_option(THEME_SLUG."_main_content_padding_mob").';}}';

	$top_toolbar_bgcolor = theme_get_option(THEME_SLUG."_top_toolbar_bgcolor");
	$top_toolbar_bgimage = theme_get_option(THEME_SLUG."_top_toolbar_bgimage");
	$top_toolbar_bgimage_scale = theme_get_option(THEME_SLUG."_top_toolbar_bgimage_scale") == "true" ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '' ;
	$output .= '#header-top{'.($top_toolbar_bgcolor ? 'background-color:#'.$top_toolbar_bgcolor.';' : '').get_gradient_background($top_toolbar_bgcolor, theme_get_option(THEME_SLUG."_top_toolbar_bgcolor_gradient")).($top_toolbar_bgimage ? 'background-image:url('.$top_toolbar_bgimage.');' : '').'background-repeat:'.theme_get_option(THEME_SLUG."_top_toolbar_bgimage_repeat").';'.(theme_get_option(THEME_SLUG."_top_toolbar_bgimage_position") ? 'background-position:'.theme_get_option(THEME_SLUG."_top_toolbar_bgimage_position").';' : '').$top_toolbar_bgimage_scale.'}'."\n";
	$output .= theme_get_option(THEME_SLUG."_top_toolbar_bgpattern") ? '.top-toolbar-pattern{background-image:url('.THEME_HOME.'/images/patterns/'.theme_get_option(THEME_SLUG."_top_toolbar_bgpattern").');background-attachment:fixed;}'."\n" : '';
	$output .= theme_get_option(THEME_SLUG."_top_bar_min_height") ? '.top-toolbar-pattern{min-height:'.theme_get_option(THEME_SLUG."_top_bar_min_height").'px;}'."\n" : '';
	
	$header_bgcolor = theme_get_option(THEME_SLUG."_header_bgcolor");
	$header_bgimage = theme_get_option(THEME_SLUG."_header_bgimage");
	$header_bgimage_scale = theme_get_option(THEME_SLUG."_header_bgimage_scale") == "true" ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '' ;
	$output .= '#header{'.($header_bgcolor ? 'background-color:#'.$header_bgcolor.';' : '').get_gradient_background($header_bgcolor, theme_get_option(THEME_SLUG."_header_bgcolor_gradient")).($header_bgimage ? 'background-image:url('.$header_bgimage.');' : '').'background-repeat:'.theme_get_option(THEME_SLUG."_header_bgimage_repeat").';'.(theme_get_option(THEME_SLUG."_header_bgimage_position") ? 'background-position:'.theme_get_option(THEME_SLUG."_header_bgimage_position").';' : '').$header_bgimage_scale.'}'."\n";		
	$output .= theme_get_option(THEME_SLUG."_header_bgpattern") ? '.header-pattern{background-image:url('.THEME_HOME.'/images/patterns/'.theme_get_option(THEME_SLUG."_header_bgpattern").');background-attachment:fixed;}'."\n" : '';
	$output .= theme_get_option(THEME_SLUG."_header_min_height") ? '.header-pattern{min-height:'.theme_get_option(THEME_SLUG."_header_min_height").'px;}'."\n" : '';
	
	$output .= '.logo-container{padding:'.theme_get_option(THEME_SLUG."_logo_padding").';}'."\n";	
	$output .= '.top-header{padding:'.theme_get_option(THEME_SLUG."_top_header_padding").';}'."\n";	
	
	$output .= '.general-content{'.get_font_family(theme_get_option(THEME_SLUG."_gcontent_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_gcontent_font_size").'px;'.get_font_color(THEME_SLUG."_gcontent_font_color").get_font_styles(THEME_SLUG."_gcontent_font_style").'}'."\n";	
	$output .= '.main-container p, .main-container li, .main-container td, .main-container a, input{'.get_text_shadow(THEME_SLUG."_gcontent_text_shadow").'}'."\n";
	$output .= 'input[type="text"], textarea{'.get_font_family(theme_get_option(THEME_SLUG."_gcontent_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_gcontent_font_size").'px;}'."\n";	
	$output .= '.small-content{'.get_font_family(theme_get_option(THEME_SLUG."_scontent_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_scontent_font_size").'px;'.get_font_color(THEME_SLUG."_scontent_font_color").get_font_styles(THEME_SLUG."_scontent_font_style").get_text_shadow(THEME_SLUG."_scontent_text_shadow").'}'."\n";	
	$output .= '.small-content input, .small-content textarea{'.get_font_family(theme_get_option(THEME_SLUG."_scontent_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_scontent_font_size").'px;}'."\n";
	
	$output .= '.main-menu-wrapper{margin:'.theme_get_option(THEME_SLUG."_mainmenu_spacing").';}'."\n";		
	$output .= '#main-menu > li > a{'.get_font_family(theme_get_option(THEME_SLUG."_mainmenu_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_mainmenu_font_size").'px;'.get_font_styles(THEME_SLUG."_mainmenu_font_style").get_font_color(THEME_SLUG."_mainmenu_font_color").get_text_shadow(THEME_SLUG."_mainmenu_text_shadow").'}'."\n";
	$output .= '#main-menu-nav.executive-menu #main-menu li{border-left:1px solid #'.theme_get_option(THEME_SLUG."_menu_divider_color").';}'."\n";
	$menu_bg_color = theme_get_option(THEME_SLUG."_menubg_color");
	if($menu_bg_color){
		$output .= '#main-menu-nav.modern-menu{background-color:#'.$menu_bg_color.';}'."\n";
		$output .= '#main-menu-nav.executive-menu{background-color:#'.$menu_bg_color.';}'."\n";
		$output .= '.accordion div.accordion-title-color{background-color:#'.$menu_bg_color.';}'."\n";
		if($modernmenu_gradient = theme_get_option(THEME_SLUG."_modernmenu_gradient")){
			$output .= '#main-menu-nav.modern-menu{'.get_gradient_background($menu_bg_color, $modernmenu_gradient).'}'."\n";
			$output .= '.vtbutton, input.vtbutton, input[type="submit"], input.wpcf7-submit, form#searchform input#searchsubmit, .accordion div.accordion-title-color{'.get_gradient_background($menu_bg_color, $modernmenu_gradient).'}'."\n";
		}
	}	
	if (theme_get_option(THEME_SLUG."_mainmenu_modern_rounded_corners") == "true") {
		$output .= '#main-menu-nav.modern-menu, #main-menu-nav.modern-menu #main-menu{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;}'."\n";
		$output .= '#main-menu-nav.modern-menu #main-menu li:first-child a{border-top-left-radius:5px;-moz-border-radius-topleft:5px;-webkit-border-top-left-radius:5px;border-bottom-left-radius:5px;-moz-border-radius-bottomleft:5px;-webkit-border-bottom-left-radius:5px;}'."\n";
		$output .= '#main-menu-nav.modern-menu #main-menu li:last-child a{border-top-right-radius:5px;-moz-border-radius-topright:5px;-webkit-border-top-right-radius:5px;border-bottom-right-radius:5px;-moz-border-radius-bottomright:5px;-webkit-border-bottom-right-radius:5px;}'."\n";
	}	
	if ($menu_height = theme_get_option(THEME_SLUG."_mainmenu_height")) {
		$output .= '#main-menu-nav.modern-menu #main-menu, #main-menu-nav.executive-menu #main-menu{height:'.(int)$menu_height.'px;}'."\n";
		$output .= '#main-menu-nav.modern-menu #main-menu a, #main-menu-nav.executive-menu #main-menu a{height:'.(int)$menu_height.'px;line-height:'.(int)$menu_height.'px;}'."\n";
		$output .= '#main-menu-nav.modern-menu #main-menu li:hover ul, #main-menu-nav.modern-menu #main-menu li.sfHover ul{top:'.(int)$menu_height.'px;}'."\n";
		$output .= '#main-menu-nav.executive-menu #main-menu li:hover ul, #main-menu-nav.executive-menu #main-menu li.sfHover ul{top:'.(int)($menu_height+1).'px;}'."\n";
	}
	if ($mainmenu_padding = theme_get_option(THEME_SLUG."_mainmenu_padding")) {
		$output .= '#main-menu-nav.modern-menu #main-menu a{padding-left:'.(int)$mainmenu_padding.'px;padding-right:'.(int)$mainmenu_padding.'px;}'."\n";
		$output .= '#main-menu-nav.executive-menu #main-menu a{padding-left:'.(int)$mainmenu_padding.'px;padding-right:'.(int)$mainmenu_padding.'px;}'."\n";
		$output .= '#main-menu-nav.elegant-menu #main-menu a{padding-left:'.(int)$mainmenu_padding.'px;padding-right:'.(int)$mainmenu_padding.'px;}'."\n";
		$output .= '#main-menu-nav.plain-menu #main-menu a{padding-left:'.(int)$mainmenu_padding.'px;padding-right:'.(int)$mainmenu_padding.'px;}'."\n";
	}
	$output .= '#main-menu-nav.executive-menu #main-menu > li > a:hover > span.menu-element, #main-menu-nav.executive-menu #main-menu > li.current-menu-ancestor > a > span.menu-element, #main-menu-nav.executive-menu #main-menu > li.current-menu-parent > a > span.menu-element, #main-menu-nav.executive-menu #main-menu > li.current-menu-item > a > span.menu-element, #main-menu-nav.executive-menu #main-menu > li.current_page_parent > a > span.menu-element, #main-menu-nav.executive-menu #main-menu > li.parent:hover > a > span.menu-element{'.get_font_color(THEME_SLUG."_menu_highlight_color").'}'."\n";	
	$output .= '#main-menu-nav.elegant-menu #main-menu > li > a:hover > span.menu-element, #main-menu-nav.elegant-menu #main-menu > li.parent:hover > a > span.menu-element, #main-menu-nav.elegant-menu #main-menu > li.current-menu-item > a > span.menu-element, #main-menu-nav.elegant-menu #main-menu > li.current_page_parent > a > span.menu-element, #main-menu-nav.elegant-menu #main-menu > li.current-menu-ancestor > a > span.menu-element, #main-menu-nav.elegant-menu #main-menu > li.current-menu-parent > a > span.menu-element{border-bottom:3px solid #'.theme_get_option(THEME_SLUG."_menu_highlight_color").';}'."\n";
	$output .= '#main-menu-nav.plain-menu #main-menu > li > a:hover > span.menu-element, #main-menu-nav.plain-menu #main-menu > li.current-menu-ancestor > a > span.menu-element, #main-menu-nav.plain-menu #main-menu > li.current-menu-parent > a > span.menu-element, #main-menu-nav.plain-menu #main-menu > li.current-menu-item > a > span.menu-element, #main-menu-nav.plain-menu #main-menu > li.current_page_parent > a > span.menu-element, #main-menu-nav.plain-menu #main-menu > li.parent:hover > a > span.menu-element{'.get_font_color(THEME_SLUG."_menu_highlight_color").'}'."\n";
	if ($ddmenu_width = theme_get_option(THEME_SLUG."_ddmenu_width")) {
		$output .= '#main-menu-nav.modern-menu ul#main-menu li li:hover ul, #main-menu-nav.modern-menu ul#main-menu li li.sfHover ul, #main-menu-nav.modern-menu ul#main-menu li li li:hover ul, #main-menu-nav.modern-menu ul#main-menu li li li.sfHover ul{left:'.($ddmenu_width+2).'px;top:0;}'."\n";
		$output .= '#main-menu-nav.executive-menu ul#main-menu li li:hover ul, #main-menu-nav.executive-menu ul#main-menu li li.sfHover ul, #main-menu-nav.executive-menu ul#main-menu li li li:hover ul, #main-menu-nav.executive-menu ul#main-menu li li li.sfHover ul{left:'.($ddmenu_width+2).'px;top:0;}'."\n";
		$output .= '#main-menu-nav.elegant-menu ul#main-menu li li:hover ul, #main-menu-nav.elegant-menu ul#main-menu li li.sfHover ul, #main-menu-nav.elegant-menu ul#main-menu li li li:hover ul, #main-menu-nav.elegant-menu ul#main-menu li li li.sfHover ul{left:'.($ddmenu_width+2).'px;top:0;}'."\n";
		$output .= '#main-menu-nav.plain-menu ul#main-menu li li:hover ul, #main-menu-nav.plain-menu ul#main-menu li li.sfHover ul, #main-menu-nav.plain-menu ul#main-menu li li li:hover ul, #main-menu-nav.plain-menu ul#main-menu li li li.sfHover ul{left:'.($ddmenu_width+2).'px;top:0;}'."\n";
		$output .= '#main-menu ul{width:'.$ddmenu_width.'px;}'."\n";
	}
	$output .= '#main-menu ul a{'.get_font_family(theme_get_option(THEME_SLUG."_ddnmenu_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_ddmenu_font_size").'px;'.get_font_styles(THEME_SLUG."_ddmenu_font_style").'}'."\n";
	$output .= '#main-menu ul a:hover, #main-menu ul li.current-menu-item > a, #main-menu ul li.current-menu-ancestor > a, #main-menu ul li.current_page_parent > a, #main-menu ul li.current-menu-parent > a{'.get_font_color(THEME_SLUG."_ddmenu_highlight_font_color", true).'}'."\n";
	$output .= '#main-menu-nav.dark-ddmenu #main-menu ul a{'.get_font_color(THEME_SLUG."_ddmenu_dark_font_color").get_text_shadow(THEME_SLUG."_ddmenu_dark_text_shadow").'}'."\n";
	$output .= '#main-menu-nav.light-ddmenu #main-menu ul a{'.get_font_color(THEME_SLUG."_ddmenu_light_font_color").get_text_shadow(THEME_SLUG."_ddmenu_light_text_shadow").'}'."\n";	
	$output .= '#main-menu-nav.custom-ddmenu #main-menu ul a{'.get_font_color(THEME_SLUG."_ddmenu_custom_font_color").get_text_shadow(THEME_SLUG."_ddmenu_custom_text_shadow").'}'."\n";	
	$ddmenu_custom_bgcolor = theme_get_option(THEME_SLUG."_ddmenu_custom_bgcolor");
	$ddmenu_custom_bgimage = theme_get_option(THEME_SLUG."_ddmenu_custom_bgimage");
	$ddmenu_custom_bgimage_scale = theme_get_option(THEME_SLUG."_ddmenu_custom_bgimage_scale") == "true" ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '' ;
	$output .= '#main-menu-nav.custom-ddmenu #main-menu ul{'.($ddmenu_custom_bgcolor ? 'background-color:#'.$ddmenu_custom_bgcolor.';' : '').get_gradient_background($ddmenu_custom_bgcolor, theme_get_option(THEME_SLUG."_ddmenu_custom_bgcolor_gradient")).($ddmenu_custom_bgimage ? 'background-image:url('.$ddmenu_custom_bgimage.');' : '').'background-repeat:'.theme_get_option(THEME_SLUG."_ddmenu_custom_bgimage_repeat").';'.(theme_get_option(THEME_SLUG."_ddmenu_custom_bgimage_position") ? 'background-position:'.theme_get_option(THEME_SLUG."_ddmenu_custom_bgimage_position").';' : '').$ddmenu_custom_bgimage_scale.'}'."\n";
	$output .= '#main-menu-nav.custom-ddmenu #main-menu ul a:hover{background:#'.theme_get_option(THEME_SLUG."_ddmenu_custom_hover_bgcolor").' !important;}'."\n";
	
	
	$output .= 'h1{'.get_font_family(theme_get_option(THEME_SLUG."_h1_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_h1_font_size").'px;'.get_font_color(THEME_SLUG."_h1_font_color").get_font_styles(THEME_SLUG."_h1_font_style").get_text_shadow(THEME_SLUG."_h1_text_shadow").'}'."\n";
	$output .= 'h2{'.get_font_family(theme_get_option(THEME_SLUG."_h2_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_h2_font_size").'px;'.get_font_color(THEME_SLUG."_h2_font_color").get_font_styles(THEME_SLUG."_h2_font_style").get_text_shadow(THEME_SLUG."_h2_text_shadow").'}'."\n";
	$output .= 'h3{'.get_font_family(theme_get_option(THEME_SLUG."_h3_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_h3_font_size").'px;'.get_font_color(THEME_SLUG."_h3_font_color").get_font_styles(THEME_SLUG."_h3_font_style").get_text_shadow(THEME_SLUG."_h3_text_shadow").'}'."\n";
	$output .= 'h4{'.get_font_family(theme_get_option(THEME_SLUG."_h4_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_h4_font_size").'px;'.get_font_color(THEME_SLUG."_h4_font_color").get_font_styles(THEME_SLUG."_h4_font_style").get_text_shadow(THEME_SLUG."_h4_text_shadow").'}'."\n";
	$output .= 'h5, .wp-caption .wp-caption-text, .gallery-caption{'.get_font_family(theme_get_option(THEME_SLUG."_h5_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_h5_font_size").'px;'.get_font_color(THEME_SLUG."_h5_font_color").get_font_styles(THEME_SLUG."_h5_font_style").get_text_shadow(THEME_SLUG."_h5_text_shadow").'}'."\n";
	$output .= 'h6{'.get_font_family(theme_get_option(THEME_SLUG."_h6_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_h6_font_size").'px;'.get_font_color(THEME_SLUG."_h6_font_color").get_font_styles(THEME_SLUG."_h6_font_style").get_text_shadow(THEME_SLUG."_h6_text_shadow").'}'."\n";

	$output .= '.sidebar-header{'.get_font_family(theme_get_option(THEME_SLUG."_sidebar_heading_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_sidebar_heading_font_size").'px;'.get_font_color(THEME_SLUG."_sidebar_heading_font_color").get_font_styles(THEME_SLUG."_sidebar_heading_font_style").get_text_shadow(THEME_SLUG."_sidebar_heading_text_shadow").'}'."\n";

	$output .= 'div.wpcf7 p, .contact-form label{'.get_font_family(theme_get_option(THEME_SLUG."_form_label_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_form_label_font_size").'px;'.get_font_color(THEME_SLUG."_form_label_font_color").get_font_styles(THEME_SLUG."_form_label_font_style").get_text_shadow(THEME_SLUG."_form_label_text_shadow").'}'."\n";

	$output .= '.snippet-content h3{'.get_font_family(theme_get_option(THEME_SLUG."_feature_snippets_header_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_feature_snippets_header_font_size").'px;'.get_font_color(THEME_SLUG."_feature_snippets_header_font_color").get_font_styles(THEME_SLUG."_feature_snippets_header_font_style").get_text_shadow(THEME_SLUG."_feature_snippets_header_text_shadow").'}'."\n";
	$output .= '.snippet-content p{'.get_font_family(theme_get_option(THEME_SLUG."_feature_snippets_content_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_feature_snippets_content_font_size").'px;'.get_font_color(THEME_SLUG."_feature_snippets_content_font_color").get_font_styles(THEME_SLUG."_feature_snippets_content_font_style").get_text_shadow(THEME_SLUG."_feature_snippets_content_text_shadow").'}'."\n";
	
	$output .= '.post-date .post-date-day{'.get_font_color(THEME_SLUG."_post_date_font_color").'}'."\n";
	$output .= '.layout-1 .post-date .post-date-day{'.get_font_family(theme_get_option(THEME_SLUG."_post_date_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_post_date_font_size").'px;'.get_font_styles(THEME_SLUG."_post_date_font_style").get_text_shadow(THEME_SLUG."_post_date_text_shadow").'}'."\n";
	$output .= '.post-title h2{'.get_font_family(theme_get_option(THEME_SLUG."_post_title_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_post_title_font_size").'px;'.get_font_color(THEME_SLUG."_post_title_font_color").get_font_styles(THEME_SLUG."_post_title_font_style").get_text_shadow(THEME_SLUG."_post_title_text_shadow").'}'."\n";
	$output .= '.post-date .post-date-month{'.get_font_family(theme_get_option(THEME_SLUG."_post_month_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_post_month_font_size").'px;'.get_font_color(THEME_SLUG."_post_month_font_color").get_font_styles(THEME_SLUG."_post_month_font_style").get_text_shadow(THEME_SLUG."_post_month_text_shadow").'}'."\n";
	$output .= '.post-meta, .post-meta a{'.get_font_family(theme_get_option(THEME_SLUG."_post_meta_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_post_meta_font_size").'px;'.get_font_color(THEME_SLUG."_post_meta_font_color").get_font_styles(THEME_SLUG."_post_meta_font_style").get_text_shadow(THEME_SLUG."_post_meta_text_shadow").'}'."\n";
	$output .= '.post-meta li{line-height:'.theme_get_option(THEME_SLUG."_post_meta_font_size").'px;}'."\n";
	$output .= '.post-comments-count a{'.get_font_color(THEME_SLUG."_comments_count_font_color").'}'."\n";
	$output .= '.layout-1 .post-comments-count a{'.get_font_family(theme_get_option(THEME_SLUG."_comments_count_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_comments_count_font_size").'px;'.get_font_styles(THEME_SLUG."_comments_count_font_style").get_text_shadow(THEME_SLUG."_comments_count_text_shadow").'line-height:'.theme_get_option(THEME_SLUG."_comments_count_font_size").'px;}'."\n";
	
	$output .= 'div.breadcrumb{'.get_font_family(theme_get_option(THEME_SLUG."_breadcrumb_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_breadcrumb_font_size").'px;'.get_font_color(THEME_SLUG."_breadcrumb_font_color").get_font_styles(THEME_SLUG."_breadcrumb_font_style").get_text_shadow(THEME_SLUG."_breadcrumb_text_shadow").'}'."\n";
	$output .= 'div.breadcrumb a{'.get_font_family(theme_get_option(THEME_SLUG."_breadcrumb_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_breadcrumb_font_size").'px;'.get_font_styles(THEME_SLUG."_breadcrumb_font_style").get_text_shadow(THEME_SLUG."_breadcrumb_text_shadow").'}'."\n";

	$output .= 'h3.toggle-title{'.get_font_family(theme_get_option(THEME_SLUG."_toggle_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_toggle_font_size").'px;'.get_font_color(THEME_SLUG."_toggle_font_color").get_font_styles(THEME_SLUG."_toggle_font_style").get_text_shadow(THEME_SLUG."_toggle_text_shadow", true).'}'."\n";	
	$output .= (int)theme_get_option(THEME_SLUG."_toggle_font_size") > 26 ? 'h3.toggle-title{line-height:'.theme_get_option(THEME_SLUG."_toggle_font_size")*(1.2).'px;}'."\n" : '';
	
	$output .= '.accordion div.accordion-title h3{'.get_font_family(theme_get_option(THEME_SLUG."_accordion_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_accordion_font_size").'px;'.get_font_color(THEME_SLUG."_accordion_font_color").get_font_styles(THEME_SLUG."_accordion_font_style").get_text_shadow(THEME_SLUG."_accordion_text_shadow", true).'}'."\n";	

	$output .= '.image-caption span, .image-caption a{'.get_font_family(theme_get_option(THEME_SLUG."_image_caption_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_image_caption_font_size").'px;'.get_font_styles(THEME_SLUG."_image_caption_font_style").'}'."\n";	
	$output .= '.image-caption-bar a, .image-caption-fade a, .image-caption-bar span, .image-caption-fade span{'.get_font_color(THEME_SLUG."_image_caption_fade_bar_font_color").get_text_shadow(THEME_SLUG."_image_caption_fade_bar_text_shadow").'}'."\n";
	$output .= '.image-caption-top a, .image-caption-bottom a, .image-caption-top span, .image-caption-bottom span{'.get_font_color(THEME_SLUG."_image_caption_top_bottom_font_color").get_text_shadow(THEME_SLUG."_image_caption_top_bottom_text_shadow").'}'."\n";
	
	$output .= '.footer-header{'.get_font_family(theme_get_option(THEME_SLUG."_footer_heading_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_footer_heading_font_size").'px;'.get_font_color(THEME_SLUG."_footer_heading_font_color").get_font_styles(THEME_SLUG."_footer_heading_font_style").get_text_shadow(THEME_SLUG."_footer_heading_text_shadow").'}'."\n";
	
	//Widgetized Footer Width
	$output .= '#footer .footer-widgets{'.get_font_family(theme_get_option(THEME_SLUG."_footer_content_font_family")).'font-size:'.theme_get_option(THEME_SLUG."_footer_content_font_size").'px;'.get_font_color(THEME_SLUG."_footer_content_font_color").get_font_styles(THEME_SLUG."_footer_content_font_style").get_text_shadow(THEME_SLUG."_footer_content_text_shadow").'width:'.theme_get_option(THEME_SLUG."_widgetized_content_width").';}'."\n";
	$output .= '#footer .footer-widgets a{'.get_text_shadow(THEME_SLUG."_footer_content_text_shadow").'}'."\n";
	$output .= '#footer .footer-widgets{min-height:'.(theme_get_option(THEME_SLUG."_widgetized_footer_min_height") ? theme_get_option(THEME_SLUG."_widgetized_footer_min_height") : '270').'px;}'."\n";

	$footer_bgcolor = theme_get_option(THEME_SLUG."_footer_bgcolor");
	$footer_bgimage = theme_get_option(THEME_SLUG."_footer_bgimage");
	$footer_bgimage_scale = theme_get_option(THEME_SLUG."_footer_bgimage_scale") == "true" ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '' ;
	$output .= '.footer-wrapper{'.($footer_bgcolor ? 'background-color:#'.$footer_bgcolor.';' : '').get_gradient_background($footer_bgcolor, theme_get_option(THEME_SLUG."_footer_bgcolor_gradient")).($footer_bgimage ? 'background-image:url('.$footer_bgimage.');' : '').'background-repeat:'.theme_get_option(THEME_SLUG."_footer_bgimage_repeat").';'.(theme_get_option(THEME_SLUG."_footer_bgimage_position") ? 'background-position:'.theme_get_option(THEME_SLUG."_footer_bgimage_position").';' : '').$footer_bgimage_scale.'}'."\n";
	$output .= theme_get_option(THEME_SLUG."_footer_bgpattern") ? '.footer-pattern{background-image:url('.THEME_HOME.'/images/patterns/'.theme_get_option(THEME_SLUG."_footer_bgpattern").');background-attachment:fixed;}'."\n" : '';
	$output .= '#footer .footer-overlay{'.(theme_get_option(THEME_SLUG."_footer_overlay") ? 'background-image:url('.theme_get_option(THEME_SLUG."_footer_overlay").');' : '').'}'."\n";
	
	$footer_bar_bgcolor = theme_get_option(THEME_SLUG."_footer_bar_bgcolor");
	$footer_bar_bgimage = theme_get_option(THEME_SLUG."_footer_bar_bgimage");
	$footer_bar_bgimage_scale = theme_get_option(THEME_SLUG."_footer_bar_bgimage_scale") == "true" ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '' ;
	$output .= '#footer-bottom{'.($footer_bar_bgcolor ? 'background-color:#'.$footer_bar_bgcolor.';' : '').get_gradient_background($footer_bar_bgcolor, theme_get_option(THEME_SLUG."_footer_bar_bgcolor_gradient")).($footer_bar_bgimage ? 'background-image:url('.$footer_bar_bgimage.');' : '').'background-repeat:'.theme_get_option(THEME_SLUG."_footer_bar_bgimage_repeat").';'.(theme_get_option(THEME_SLUG."_footer_bar_bgimage_position") ? 'background-position:'.theme_get_option(THEME_SLUG."_footer_bar_bgimage_position").';' : '').$footer_bar_bgimage_scale.'}'."\n";
	$output .= theme_get_option(THEME_SLUG."_footer_bar_bgpattern") ? '.footer-bar-pattern{background-image:url('.THEME_HOME.'/images/patterns/'.theme_get_option(THEME_SLUG."_footer_bar_bgpattern").');background-attachment:fixed;}'."\n" : '';
	$output .= theme_get_option(THEME_SLUG."_footer_bar_min_height") ? '.footer-bar-pattern{min-height:'.theme_get_option(THEME_SLUG."_footer_bar_min_height").'px;}'."\n" : '';

	$output .= '#footer-bottom .copyright{'.get_font_family(theme_get_option(THEME_SLUG."_bottom_footer_font_family")).get_font_color(THEME_SLUG."_bottom_footer_font_color").get_font_styles(THEME_SLUG."_bottom_footer_font_style").'font-size:'.theme_get_option(THEME_SLUG."_bottom_footer_font_size").'px;'.get_text_shadow(THEME_SLUG."_bottom_footer_text_shadow").'}'."\n";
	
	$output .= '.footer-menu ul li a{'.get_font_family(theme_get_option(THEME_SLUG."_footer_menu_font_family")).get_font_color(THEME_SLUG."_footer_menu_font_color").get_font_styles(THEME_SLUG."_footer_menu_font_style").'font-size:'.theme_get_option(THEME_SLUG."_footer_menu_font_size").'px;'.get_text_shadow(THEME_SLUG."_footer_menu_text_shadow").'}'."\n";	
	$output .= '.footer-menu ul li{padding:0 '.theme_get_option(THEME_SLUG."_footer_menu_padding").'px;border-left:1px solid #'.theme_get_option(THEME_SLUG."_footer_menu_divider_color").';}'."\n";
	$output .= '.footer-menu ul li a:hover, .footer-menu ul li.current-menu-item a, .footer-menu ul li.current_page_item a{'.get_font_color(THEME_SLUG."_footer_menu_highlight_color").'}'."\n";
	
	$output .= '.vtbutton span, input.vtbutton, input[type="submit"], input.wpcf7-submit, form#searchform input#searchsubmit{font-size:'.theme_get_option(THEME_SLUG."_button_font_size").'px !important;'.get_font_family(theme_get_option(THEME_SLUG."_button_font_family")).get_font_color(THEME_SLUG."_button_font_color").get_font_styles(THEME_SLUG."_button_font_style").get_text_shadow(THEME_SLUG."_button_text_shadow").'}'."\n";
	if($buttoncolor = theme_get_option(THEME_SLUG."_buttoncolor")){
		$output .= '.vtbutton, input.vtbutton, input[type="submit"], input.wpcf7-submit, form#searchform input#searchsubmit{background:#'.$buttoncolor.';}'."\n";
	}

	$output .= '.pricing-content h3{'.get_font_family(theme_get_option(THEME_SLUG."_pricing_header_font_family")).get_font_color(THEME_SLUG."_pricing_header_font_color").get_font_styles(THEME_SLUG."_pricing_header_font_style").'font-size:'.theme_get_option(THEME_SLUG."_pricing_header_font_size").'px;'.get_text_shadow(THEME_SLUG."_pricing_header_text_shadow").'}'."\n";	
	$output .= '.pricing-block-price{'.get_font_family(theme_get_option(THEME_SLUG."_pricing_font_family")).get_font_color(THEME_SLUG."_pricing_font_color").get_font_styles(THEME_SLUG."_pricing_font_style").'font-size:'.theme_get_option(THEME_SLUG."_pricing_font_size").'px;'.get_text_shadow(THEME_SLUG."_pricing_text_shadow").'}'."\n";
	
	$output .= '.team-member-name{'.get_font_family(theme_get_option(THEME_SLUG."_team_name_font_size")).get_font_color(THEME_SLUG."_team_name_font_color").get_font_styles(THEME_SLUG."_team_name_font_style").'font-size:'.theme_get_option(THEME_SLUG."_team_name_font_size").'px;'.get_text_shadow(THEME_SLUG."_team_name_text_shadow").'}'."\n";
	$output .= '.team-member-designation{'.get_font_family(theme_get_option(THEME_SLUG."_team_designation_font_size")).get_font_color(THEME_SLUG."_team_designation_font_color").get_font_styles(THEME_SLUG."_team_designation_font_style").'font-size:'.theme_get_option(THEME_SLUG."_team_designation_font_size").'px;'.get_text_shadow(THEME_SLUG."_team_designation_text_shadow").'}'."\n";
	$output .= '.team-member-desc{'.get_font_family(theme_get_option(THEME_SLUG."_team_content_font_size")).get_font_color(THEME_SLUG."_team_content_font_color").get_font_styles(THEME_SLUG."_team_content_font_style").'font-size:'.theme_get_option(THEME_SLUG."_team_content_font_size").'px;'.get_text_shadow(THEME_SLUG."_team_content_text_shadow").'}'."\n";	

	$output .= '.ui-tabs .ui-tabs-nav li h4 a{'.get_font_family(theme_get_option(THEME_SLUG."_tab_font_size")).get_font_color(THEME_SLUG."_tab_font_color").get_font_styles(THEME_SLUG."_tab_font_style").'font-size:'.theme_get_option(THEME_SLUG."_tab_font_size").'px;'.get_text_shadow(THEME_SLUG."_tab_text_shadow").'}'."\n";	
	$output .= '.ui-tabs .ui-tabs-nav li.ui-tabs-selected h4 a, .ui-tabs .ui-tabs-nav li.ui-state-disabled h4 a, .ui-tabs .ui-tabs-nav li.ui-state-processing h4 a{'.get_font_color(THEME_SLUG."_tab_highlight_font_color").'}'."\n";	

	$output .= '.bar-text div div, .bar-percent{'.get_font_family(theme_get_option(THEME_SLUG."_bar_graph_family")).'font-size:'.theme_get_option(THEME_SLUG."_bar_graph_size").'px;}'."\n";
	$output .= '.bar-text div div{'.get_font_styles(THEME_SLUG."_bar_graph_style").get_text_shadow(THEME_SLUG."_bar_graph_btn_text_shadow").'}'."\n";
	$output .= '.bar-percent{'.get_text_shadow(THEME_SLUG."_bar_graph_pct_text_shadow").'}'."\n";
	
	$linkcolor = theme_get_option(THEME_SLUG."_linkcolor");
	if($linkcolor){
		$output .= 'a, .bar-percent{color:#'.$linkcolor.';}'."\n";
		$output .= '.pages a:hover, .wp-pagenavi a:hover, .pages a:active, .pages span.current, .wp-pagenavi a:active, .wp-pagenavi span.current, .bar-text div div{background:#'.$linkcolor.';}'."\n";
	}
	$output .= '#header-top .toolbar-widget a{'.get_font_color(THEME_SLUG."_top_bar_linkcolor").'}'."\n";	
	$output .= '#header a{'.get_font_color(THEME_SLUG."_header_linkcolor").'}'."\n";	
	$output .= '#footer .footer-widgets a{'.get_font_color(THEME_SLUG."_footer_linkcolor").'}'."\n";	
	$output .= '#footer-bottom .copyright a{'.get_font_color(THEME_SLUG."_footer_bar_linkcolor").'}'."\n";	
	
	$output .= '#header-top, #header-top .toolbar-widget h1, #header-top .toolbar-widget  h2, #header-top .toolbar-widget  h3, #header-top .toolbar-widget  h4, #header-top .toolbar-widget  h5, #header-top .toolbar-widget  h6, #header-top .toolbar-widget p, #header-top .toolbar-widget li a{'.get_font_family(theme_get_option(THEME_SLUG."_top_toolbar_font_family")).get_font_color(THEME_SLUG."_top_toolbar_font_color").get_font_styles(THEME_SLUG."_top_toolbar_font_style").'font-size:'.theme_get_option(THEME_SLUG."_top_toolbar_font_size").'px;'.get_text_shadow(THEME_SLUG."_top_toolbar_text_shadow").'}'."\n";
	$output .= '#header-top .toolbar-widget li{border-left:1px solid #'.theme_get_option(THEME_SLUG."_top_toolbar_font_color").';}'."\n";
	
	$secondarycolor = theme_get_option(THEME_SLUG."_secondarycolor");
	if($secondarycolor){
		$output .= '.secondary-color{color:#'.$secondarycolor.';}'."\n";
		$output .= theme_get_option(THEME_SLUG."_footer_widgets_highlight") == "true" ? '#footer .footer-wrapper{border-top:5px solid #'.$secondarycolor.';}'."\n" : '';
		$output .= ((theme_get_option(THEME_SLUG."_top_bar_highlight") == "true") ? '#header-top{border-bottom:2px solid #'.$secondarycolor.';}'."\n" : '');
		$output .= '.callus-phone, .layout-1 .post-date{background-color:#'.$secondarycolor.';}'."\n";
	}

	$output .= '#overlay-facebox div.om-details{'.get_font_color(THEME_SLUG."_overlay_fade_color").'}'."\n";
	$output .= '#overlay-facebox div.om-details a{'.get_font_color(THEME_SLUG."_overlay_fade_link_color").'}'."\n";
	
	$output .= '#top-overlay div.om-details{'.get_font_color(THEME_SLUG."_overlay_top_color").'}'."\n";
	$output .= '#top-overlay div.om-details a{'.get_font_color(THEME_SLUG."_overlay_top_link_color").'}'."\n";

	$output .= theme_get_option(THEME_SLUG."_customcss");
	
	$GLOBALS['custom_styles'] = $output;
	
}

function theme_custom_styles1($output){
	echo $output;
}
