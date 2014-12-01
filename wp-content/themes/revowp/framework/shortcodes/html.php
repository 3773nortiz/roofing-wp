<?php

function theme_sc_content($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'font_family' => "",
		'font_size' => "",
		'color' => "",
		'text_shadow' => "",
		'width' => "",
		'align' => "",		
		'leftspacing' => '',
		'rightspacing' => '',
		'topspacing' => '',
		'bottomspacing' => '',
		'text_align' => 'left',
		'scale' => '',
		'span' => '',
		'lineheight' => '',
	), $atts));
	
	$font_family = get_font_family($font_family);
	$font_size = preg_replace("/[^0-9]/", "", $font_size);
	$leftspacing = (int)preg_replace("/[^0-9]/", "", $leftspacing);	
	$rightspacing = (int)preg_replace("/[^0-9]/", "", $rightspacing);	
	$topspacing = (int)preg_replace("/[^0-9]/", "", $topspacing);	
	$bottomspacing = (int)preg_replace("/[^0-9]/", "", $bottomspacing);	
	$color = theme_get_option(THEME_SLUG.'_'.$color) ? theme_get_option(THEME_SLUG.'_'.$color) : $color;
		//Check if content should be span or not and set open and close tags of content area accordingly
	if ($span == 'true')
		{
			$span_code_open = '<span class="';
			$span_code_close = '</span>';
		}
	else
		{
			$span_code_open = '<div class="';
			$span_code_close = '<div class="clear"></div></div>';	
		}
	//Check if lineheight is set if so apply it
	if ($lineheight != '')
		{
			$lineheight_code = 'line-height:' . $lineheight . 'px;';
		}
	
	return $span_code_open.($scale=="true" ? 'content-scale ' : '').'align-'.$align.'" style=\'text-align:'.$text_align.';'.($font_family ? $font_family : '').($font_size ? 'font-size:'.$font_size.'px;' : '').($color ? 'color:#'.$color.';' : '').($text_shadow ? 'text-shadow:1px 1px #'.$text_shadow.' !important;' : '').($width ? 'width:'.$width.';' : '').'padding:'.$topspacing.'px '.$rightspacing.'px '.$bottomspacing.'px '.$leftspacing.'px;' . $lineheight_code . '\'>'. do_shortcode($content) . $span_code_close;
}
add_shortcode('content', 'theme_sc_content');

function theme_sc_header($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => "h1",
		'align' => "left",
	), $atts));
	
	return '<'.$type.' class="colored-header" style="text-align:'.$align.';">' . trim($content) . '</'.$type.'>';
}
add_shortcode('header', 'theme_sc_header');

function theme_sc_list($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => false,
		'float' => false,
	), $atts));
	$ol_styles = array("upper-roman", "lower-roman", "upper-alpha", "lower-alpha", "decimal");
	if(in_array($style, $ol_styles)){
		$list_type = "ol";
	}else{
		$list_type = "ul";
	}
	if($float){
		$float = " float-".$float;
	}
	return '<' . $list_type . ' class="' . $style . $float . '">' . do_shortcode($content) . '</' . $list_type . '><div class="clear"></div>';
}
add_shortcode('list', 'theme_sc_list');

function theme_sc_li($atts, $content = null, $code) {
	extract(shortcode_atts(array(		
	), $atts));
	
	return '<li>' . do_shortcode($content) . '</li>';
}
add_shortcode('li', 'theme_sc_li');

function theme_sc_iframe($atts, $content = null) {
	extract(shortcode_atts(array(
		'width' => false,
		'height' => false,
		'src' => '',
		'scroller' => "true",
	), $atts));
	
	$width = preg_replace("/[^0-9]/", "", $width);
	$height = preg_replace("/[^0-9]/", "", $height);	
	
	$width = $width?'width:'.$width.'px;':'';
	$height = $height?'height:'.$height.'px;':'';
	
	$scroller = ($scroller==="true")?'':'overflow:hidden;';
	
	return '<iframe class="iframe" src="'.$src.'" style="'.$width.$height.$scroller.'"></iframe>';
}

add_shortcode('vtframe','theme_sc_iframe');

function theme_sc_link($atts, $content = null) {
	extract(shortcode_atts(array(
		'text' => 'Read More &rarr;',
		'target' => '_self',
		'url' => '',
	), $atts));
		
	return '<a class="link" href="'.$url.'" target="'.$target.'">'.$text.'</a>';
}

add_shortcode('link','theme_sc_link');

function theme_sc_divider($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => '',
		'width' => 100,
		'height' => 1,
		'color' => '404040',
		'align' => '',
	), $atts));
	
	$width = preg_replace("/[^0-9]/", "", $width);
	$height = preg_replace("/[^0-9]/", "", $height);	
	
	$color = theme_get_option(THEME_SLUG.'_'.$color) ? theme_get_option(THEME_SLUG.'_'.$color) : $color;

	$width = $width?'width:'.$width.'%;':'';
	$height = $height?'height:'.$height.'px;':'';
	$color = $color?'background-color:#'.$color.';':'';
	$align = $align=='left'?'float:left;':($align=='right'?'float:right;':'');	

	switch ($type) {
		case 'clear': return theme_sc_clear();
		case 'top': return '<div class="divider-top" style="'.$width.$height.$color.$align.'"><a href="#" class="link-top">Top</a></div>';				
		case 'padding': return '<div class="divider-padding" style="'.$height.'"></div>';						
		default: return '<div class="divider" style="'.$width.$height.$color.$align.'"></div>';				
	}
	
	return '<div class="divider"></div>';
}
add_shortcode('divider', 'theme_sc_divider');

function theme_sc_divider_top() {
	return '<div class="divider-top"><a href="#" class="link-top">Top</a></div>';
}
add_shortcode('divider_top', 'theme_sc_divider_top');

function theme_sc_divider_padding() {
	return '<div class="divider-padding"></div>';
}
add_shortcode('divider_padding', 'theme_sc_divider_padding');

function theme_sc_clear() {
   return '<div class="clear"></div>';
}
add_shortcode('clear', 'theme_sc_clear');

function theme_sc_search_box($atts, $content = null) {
	extract(shortcode_atts(array(
		'align' => 'none',
		'box' => '',
	), $atts));
	
   return theme_search_bar($align, $box);
}
add_shortcode('search_box', 'theme_sc_search_box');

