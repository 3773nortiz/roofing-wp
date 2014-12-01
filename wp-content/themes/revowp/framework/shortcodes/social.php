<?php

function theme_sc_share($atts) {
	extract(shortcode_atts(array(
		'type' => 'all',
	), $atts));
	
	if($type == "all"){
		$output = "";
		if(function_exists('theme_tweet_button')) {
			$output .= theme_tweet_button();
		}		
		if(function_exists('theme_gplusone_btn')) {
			$output .= theme_gplusone_btn();
		}
		if(function_exists('theme_facebook_like')) {
			$output .= theme_facebook_like();
		}				
		return $output;
	}	
	if($type == "facebook"){
		if(function_exists('theme_facebook_like')) {
			return theme_facebook_like();
		}		
	}	
	if($type == "gplus"){
		if(function_exists('theme_gplusone_btn')) {
			return theme_gplusone_btn();
		}		
	}
	if($type == "twitter"){
		if(function_exists('theme_tweet_button')) {
			return theme_tweet_button();
		}
	}
	
}
add_shortcode('share', 'theme_sc_share');
