<?php
function theme_sc_column($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'divider' => false,
		'responsive' => 'stack',
	), $atts));
	$content = do_shortcode(trim($content));
	$content = $content ? $content : '&nbsp;';
	return '[raw]'.'<div class="'.str_replace('_','-',$code).($divider ? ' column-separator' : '').' column-responsive-'.$responsive.'">'.'[/raw]' . $content . '[raw]'.'</div>'.'[/raw]';
}
function theme_sc_column_last($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'responsive' => 'stack',
	), $atts));
	$content = do_shortcode(trim($content));
	$content = $content ? $content : '&nbsp;';
	return '[raw]'.'<div class="'.str_replace('_','-',str_replace('_last','',$code)).' last column-responsive-'.$responsive.'">'.'[/raw]' . $content . '[raw]'.'</div><div class="clear"></div>'.'[/raw]';
}

add_shortcode('one_half', 'theme_sc_column');
add_shortcode('one_third', 'theme_sc_column');
add_shortcode('one_fourth', 'theme_sc_column');
add_shortcode('one_fifth', 'theme_sc_column');
add_shortcode('one_sixth', 'theme_sc_column');

add_shortcode('two_third', 'theme_sc_column');
add_shortcode('three_fourth', 'theme_sc_column');
add_shortcode('two_fifth', 'theme_sc_column');
add_shortcode('three_fifth', 'theme_sc_column');
add_shortcode('four_fifth', 'theme_sc_column');
add_shortcode('five_sixth', 'theme_sc_column');

add_shortcode('one_half_last', 'theme_sc_column_last');
add_shortcode('one_third_last', 'theme_sc_column_last');
add_shortcode('one_fourth_last', 'theme_sc_column_last');
add_shortcode('one_fifth_last', 'theme_sc_column_last');
add_shortcode('one_sixth_last', 'theme_sc_column_last');

add_shortcode('two_third_last', 'theme_sc_column_last');
add_shortcode('three_fourth_last', 'theme_sc_column_last');
add_shortcode('two_fifth_last', 'theme_sc_column_last');
add_shortcode('three_fifth_last', 'theme_sc_column_last');
add_shortcode('four_fifth_last', 'theme_sc_column_last');
add_shortcode('five_sixth_last', 'theme_sc_column_last');

function theme_sc_custom_columns($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'divider' => false,
		'responsive' => 'stack',
	), $atts));	
	if (!preg_match_all("/(.?)\[(column)\b(.*?)(?:(\/))?\](?:(.+?)\[\/column\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$width = preg_replace("/[^0-9]/", "", $matches[3][$i]['width']);
			$padding = preg_replace("/[^0-9]/", "", $matches[3][$i]['padding']);
			$margin = 0;
			if($divider == "true"){
				if(count($matches[0]) - $i != 1){
					$padding = $padding/2;
					$margin = $padding;
				}else{
					$divider = false;
				}
			}
			$content = do_shortcode(trim($matches[5][$i]));
			$content = $content ? $content : '&nbsp;';
			
			$output .= '[raw]<div class="custom-column'.($divider == "true" ? ' column-separator' : '').' column-responsive-'.$responsive.'" style="width:'.$width.'%;padding-right:'.$padding.'%;margin-right:'.$margin.'%;">[/raw]'.$content.'[raw]</div>[/raw]';
		}
		
		return '[raw]<div class="custom-columns">[/raw]' . $output . '[raw]<div class="clear"></div></div>[/raw]';
	}
}
add_shortcode('custom_columns', 'theme_sc_custom_columns');

function theme_sc_custom_columns_1($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'divider' => false,
		'responsive' => 'stack',
	), $atts));	
	if (!preg_match_all("/(.?)\[(column_1)\b(.*?)(?:(\/))?\](?:(.+?)\[\/column_1\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$width = preg_replace("/[^0-9]/", "", $matches[3][$i]['width']);
			$padding = preg_replace("/[^0-9]/", "", $matches[3][$i]['padding']);
			$margin = 0;
			if($divider == "true"){
				if(count($matches[0]) - $i != 1){
					$padding = $padding/2;
					$margin = $padding;
				}else{
					$divider = false;
				}
			}
			$content = do_shortcode(trim($matches[5][$i]));
			$content = $content ? $content : '&nbsp;';
			
			$output .= '[raw]<div class="custom-column'.($divider == "true" ? ' column-separator' : '').' column-responsive-'.$responsive.'" style="width:'.$width.'%;padding-right:'.$padding.'%;margin-right:'.$margin.'%;">[/raw]'.$content.'[raw]</div>[/raw]';
		}
		
		return '[raw]<div class="custom-columns">[/raw]' . $output . '[raw]<div class="clear"></div></div>[/raw]';
	}
}
add_shortcode('custom_columns_1', 'theme_sc_custom_columns_1');

function theme_sc_custom_columns_2($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'divider' => false,
		'responsive' => 'stack',
	), $atts));	
	if (!preg_match_all("/(.?)\[(column_2)\b(.*?)(?:(\/))?\](?:(.+?)\[\/column_2\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$width = preg_replace("/[^0-9]/", "", $matches[3][$i]['width']);
			$padding = preg_replace("/[^0-9]/", "", $matches[3][$i]['padding']);
			$margin = 0;
			if($divider == "true"){
				if(count($matches[0]) - $i != 1){
					$padding = $padding/2;
					$margin = $padding;
				}else{
					$divider = false;
				}
			}
			$content = do_shortcode(trim($matches[5][$i]));
			$content = $content ? $content : '&nbsp;';
			
			$output .= '[raw]<div class="custom-column'.($divider == "true" ? ' column-separator' : '').' column-responsive-'.$responsive.'" style="width:'.$width.'%;padding-right:'.$padding.'%;margin-right:'.$margin.'%;">[/raw]'.$content.'[raw]</div>[/raw]';
		}
		
		return '[raw]<div class="custom-columns">[/raw]' . $output . '[raw]<div class="clear"></div></div>[/raw]';
	}
}
add_shortcode('custom_columns_2', 'theme_sc_custom_columns_2');

function theme_sc_custom_columns_3($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'divider' => false,
		'responsive' => 'stack',
	), $atts));	
	if (!preg_match_all("/(.?)\[(column_3)\b(.*?)(?:(\/))?\](?:(.+?)\[\/column_3\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$width = preg_replace("/[^0-9]/", "", $matches[3][$i]['width']);
			$padding = preg_replace("/[^0-9]/", "", $matches[3][$i]['padding']);
			$margin = 0;
			if($divider == "true"){
				if(count($matches[0]) - $i != 1){
					$padding = $padding/2;
					$margin = $padding;
				}else{
					$divider = false;
				}
			}
			$content = do_shortcode(trim($matches[5][$i]));
			$content = $content ? $content : '&nbsp;';
			
			$output .= '[raw]<div class="custom-column'.($divider == "true" ? ' column-separator' : '').' column-responsive-'.$responsive.'" style="width:'.$width.'%;padding-right:'.$padding.'%;margin-right:'.$margin.'%;">[/raw]'.$content.'[raw]</div>[/raw]';
		}
		
		return '[raw]<div class="custom-columns">[/raw]' . $output . '[raw]<div class="clear"></div></div>[/raw]';
	}
}
add_shortcode('custom_columns_3', 'theme_sc_custom_columns_3');