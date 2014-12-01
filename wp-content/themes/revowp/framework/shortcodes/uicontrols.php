<?php

function theme_sc_tabs($atts, $content = null, $code) {
		
	wp_enqueue_script('theme-jqui', THEME_JS.'/jquery-ui-1.7.3.custom.min.js', array('jquery'), false, true);
	
	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		$tab_id = rand(1,1000);
	
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$output = '<ul>';		
		for($i = 0; $i < count($matches[0]); $i++) {			
			$output .= '<li><h4><a href="#tabs'.$tab_id.'-'.($i+1).'">' . $matches[3][$i]['title'] . '</a></h4></li>';
		}
		$output .= '</ul>';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$background_style = '';
			$matches[3][$i]['bgcolor'] = theme_get_option(THEME_SLUG.'_'.$matches[3][$i]['bgcolor']) ? theme_get_option(THEME_SLUG.'_'.$matches[3][$i]['bgcolor']) : $matches[3][$i]['bgcolor'];
			if ($matches[3][$i]['bgcolor'] || $matches[3][$i]['bgimage']) {
				$background_style .= $matches[3][$i]['bgcolor'] ? '#'.$matches[3][$i]['bgcolor'].'' : '';
				$background_style .= $matches[3][$i]['bgimage'] ? ' url('.$matches[3][$i]['bgimage'].')' : '';
			}
			$style = ' style="';
			$style .= $background_style ? 'background:'.$background_style.';' : '';
			$style .= $matches[3][$i]['bgrepeat'] ? 'background-repeat:'.$matches[3][$i]['bgrepeat'].';' : '';
			$style .= ($matches[3][$i]['bgscale'] == 'true') ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '';
			$style .= '"';
			$output .= '[raw]<div id="tabs'.$tab_id.'-'.($i+1).'" class="general-content"'.$style.'>[/raw]' . do_shortcode(trim($matches[5][$i])) . '[raw]<div class="clear"></div></div>[/raw]';
		}
	
		return '<div class = "tabs_container tabs">' . $output . '</div>';
	}
}
add_shortcode('tabs', 'theme_sc_tabs');


function theme_sc_toggle($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => false,
		'title_color' => ''
	), $atts));
	$title_color = theme_get_option(THEME_SLUG.'_'.$title_color) ? theme_get_option(THEME_SLUG.'_'.$title_color) : $title_color;
	return '<div class="toggle"><h3 class="toggle-title"'.($title_color?' style="color:#'.$title_color.';"':'').'>' . $title . '</h3>[raw]<div class="toggle-content">[/raw]' . do_shortcode(trim($content)) . '[raw]<div class="clear"></div></div>[/raw]</div>';
}
add_shortcode('toggle', 'theme_sc_toggle');


function theme_sc_accordions($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'style' => 'light',
		'heading_color' => ''
	), $atts));
	
	$heading_color = theme_get_option(THEME_SLUG.'_'.$heading_color) ? theme_get_option(THEME_SLUG.'_'.$heading_color) : $heading_color;
	wp_enqueue_script('theme-jqui', THEME_JS.'/jquery-ui-1.7.3.custom.min.js', array('jquery'), false, true);
	
	if (!preg_match_all("/(.?)\[(accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div class="accordion-area">';
			$output .= '<div class="accordion-title accordion-title-'.$style.'"><h3'.($heading_color?' style="color:#'.$heading_color.';"':'').'>' . $matches[3][$i]['title'] . '</h3></div>';
			$output .= '[raw]<div class="pane general-content"><div class="accordion-content">[/raw]' . do_shortcode(trim($matches[5][$i])) . '[raw]<div class="clear"></div></div></div>[/raw]';
			$output .= '</div>';
		}
		
		return '<div class="accordion">' . $output . '</div>';
	}
}
add_shortcode('accordions', 'theme_sc_accordions');


function theme_sc_bar_graph($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '',
		'height' => '',
	), $atts));
	
	$width = preg_replace("/[^0-9]/", "", $width);
	$height = preg_replace("/[^0-9]/", "", $height);
	
	$height_style = $height ? 'line-height:'.($height-2).'px;height:'.($height-2).'px;padding-bottom:2px;' : '';
	
	if (!preg_match_all("/(.?)\[(bar)\b(.*?)(?:(\/))?\](?:(.+?)\[\/bar\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {

			$matches[3][$i]['color'] = theme_get_option(THEME_SLUG.'_'.$matches[3][$i]['color']) ? theme_get_option(THEME_SLUG.'_'.$matches[3][$i]['color']) : $matches[3][$i]['color'];
			$matches[3][$i]['percent_color'] = $matches[3][$i]['percent_color'] ? $matches[3][$i]['percent_color'] : $matches[3][$i]['color'];
			$matches[3][$i]['percent_color'] = theme_get_option(THEME_SLUG.'_'.$matches[3][$i]['percent_color']) ? theme_get_option(THEME_SLUG.'_'.$matches[3][$i]['percent_color']) : $matches[3][$i]['percent_color'];
			$matches[3][$i]['text_color'] = theme_get_option(THEME_SLUG.'_'.$matches[3][$i]['text_color']) ? theme_get_option(THEME_SLUG.'_'.$matches[3][$i]['text_color']) : $matches[3][$i]['text_color'];
			
			$percentage = preg_replace("/[^0-9]/", "", $matches[3][$i]['percentage']);
			$percentage = ($percentage < 100) ? $percentage : 100;
			$output .= '<div class="bar"'.($height ? ' style="height:'.$height.'px;"' : '').'>';
			$output .= '<div class="bar-text"><div style="width:'.$percentage.'%;"><div style="'.($matches[3][$i]['color'] ? 'background:#'.$matches[3][$i]['color'].';' : '').($matches[3][$i]['text_color'] ? 'color:#'.$matches[3][$i]['text_color'].';' : '').$height_style.'">' . trim($matches[5][$i]) . '</div></div></div>';
			$output .= '<div class="bar-percent" style="'.($matches[3][$i]['percent_color'] ? 'color:#'.$matches[3][$i]['percent_color'].' !important;' : '').$height_style.'">'.$percentage.'%</div>';
			$output .= '</div>';
		}
		
		return '<div class="bar-graph"'.($width ? ' style="width:'.$width.'px;"' : '').'>' . $output . '</div>';
	}	
}
add_shortcode('bar_graph','theme_sc_bar_graph');

