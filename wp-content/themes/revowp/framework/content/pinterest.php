<?php

function theme_pinterest_js(){
		
	echo '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>';
}

function theme_pinterest_btn($url="", $image="", $layout=""){
	
	add_action('wp_footer', 'theme_pinterest_js');

	if(!$layout){
		$layout = theme_get_option(THEME_SLUG."_pinit_layout");	
	}
	
	if(!$url){
		$url = get_permalink();	
	}
		
	$pinterest  = '<div class="pinterest-btn pinterest-'.$layout.'">';
	$pinterest .= '<a href="http://pinterest.com/pin/create/button/?url='.urlencode($url).'&media='.urlencode($image).'" class="pin-it-button" count-layout="'.$layout.'"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>';
	$pinterest .= '</div>';
	return $pinterest;
}

function theme_sc_pinterest($atts) {
	extract(shortcode_atts(array(
		'image' => '',
		'layout' => '',		
	),	$atts));
	
	return theme_pinterest_btn("", $image, $layout);
}
add_shortcode('pinterest', 'theme_sc_pinterest');

