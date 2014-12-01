<?php

function theme_sc_blockquote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'cite' => false,
		'box' => 'true',
		'quotemark' => 'white',
	), $atts));
	
	return '<blockquote class="quotebox-'.$quotemark.($box=='true' ? '' : ' qoutebox-nobg').'">' . do_shortcode($content) .''. ($cite ? '<div><cite>- ' . $cite . '</cite></div>' : '') . '</blockquote>';
}
add_shortcode('blockquote', 'theme_sc_blockquote');


function theme_sc_message($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'align' => false,
	), $atts));
	$align = $align?' '.$align:'';
	return '<div class="' . $code . '">' . do_shortcode($content) . '</div>';
}

add_shortcode('info','theme_sc_message');
add_shortcode('success','theme_sc_message');
add_shortcode('error','theme_sc_message');
add_shortcode('error_msg','theme_sc_message');
add_shortcode('notice','theme_sc_message');


function theme_sc_framed_box($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '',
		'height' => '',
		'bgcolor' => '',
		'textcolor' => '',
		'rounded' => 'false',
	), $atts));
	
	$width = $width?'width:'.$width.';':'';
	$height = $height?'height:'.$height.';':'';

	if(!empty($width)){
		$style = ' style="'.$width.'"';
	}else{
		$style = '';
	}

	$bgcolor = $bgcolor?'background-color:#'.$bgcolor.';':'';
	$textcolor = $textcolor?'color:#'.$textcolor:'';
	$rounded = ($rounded == 'true')?' rounded':'';
	if( !empty($height) || !empty($bgcolor) || !empty($textcolor)){
		$content_style = ' style="'.$height.$bgcolor.$textcolor.'"';
	}else{
		$content_style = '';
	}
	
	return '[raw]<div class="framed-box' .$rounded. '"'.$style.'><div class="framed-box-content"'.$content_style.'>[/raw]' . do_shortcode($content) . '[raw]<div class="clear"></div></div></div>[/raw]';
}
add_shortcode('framed_box','theme_sc_framed_box');

function theme_sc_note($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'width' => false,
	), $atts));
	$width = $width?' style="width:'.$width.'"':'';
	if(!empty($title)){
		$title = '<h4 class="note-title">'.$title.'</h4>';
	}
	return '[raw]<div class="note"'.$width.'>'.$title.'<div class="note-content">[/raw]' . do_shortcode($content) . '[raw]</div></div>[/raw]';
}
add_shortcode('note','theme_sc_note');

function theme_sc_callout_box($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '',
		'bgcolor' => '',
		'bgimage' => '',
		'bgrepeat' => '',
		'bgscale' => '',
		'align' => '',
		'border_style' => 'solid',
		'border_width' => '1',
		'border_color' => '',
		'rounded_corners' => '',
		'link' => '',
 		'shadow' => '',
		'leftpadding' => '15',
		'rightpadding' => '15',
		'toppadding' => '10',
		'bottompadding' => '10',		
		'leftspacing' => '',
		'rightspacing' => '',
		'topspacing' => '',
		'bottomspacing' => '',
		'minheight'	=> '',
	), $atts));
	
	// Check if % is specified or not and set type to px or % accordingly	
	    $width_type_check = strpos($width, "%");
         if($width_type_check === false) {
                // if % isn't entered in assume they want px
                $width_type = "px";
        }
        else {
                // if % is entered ensure that's what they get
                $width_type = "%";
        }	
		// Strip out anything that's not a number
	$width = preg_replace("/[^0-9]/", "", $width);
	$border_width = (int)preg_replace("/[^0-9]/", "", $border_width);
	$leftpadding = (int)preg_replace("/[^0-9]/", "", $leftpadding);	
	$rightpadding = (int)preg_replace("/[^0-9]/", "", $rightpadding);	
	$toppadding = (int)preg_replace("/[^0-9]/", "", $toppadding);	
	$bottompadding = (int)preg_replace("/[^0-9]/", "", $bottompadding);	
	$leftspacing = (int)preg_replace("/[^0-9]/", "", $leftspacing);	
	$rightspacing = (int)preg_replace("/[^0-9]/", "", $rightspacing);	
	$topspacing = (int)preg_replace("/[^0-9]/", "", $topspacing);	
	$bottomspacing = (int)preg_replace("/[^0-9]/", "", $bottomspacing);	
	$minheight = (int)preg_replace("/[^0-9]/", "", $minheight);	
	
	$style  = ' style="';	
	$bgcolor = theme_get_option(THEME_SLUG.'_'.$bgcolor) ? theme_get_option(THEME_SLUG.'_'.$bgcolor) : $bgcolor;
	$border_color = theme_get_option(THEME_SLUG.'_'.$border_color) ? theme_get_option(THEME_SLUG.'_'.$border_color) : $border_color;
	$style .= $bgcolor ? 'background-color:#'.$bgcolor.';' : '';
	$style .= $bgimage ? 'background-image:url('.$bgimage.');' : '';
	$style .= $bgrepeat ? 'background-repeat:'.$bgrepeat.';' : '';
	$style .= ($bgscale == 'true') ? '-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;' : '';
	$style .= 'border-width:'.$border_width.'px;';
	$style .= $border_style ? 'border-style:'.$border_style.';' : '';
	$style .= $border_color ? 'border-color:#'.$border_color.';' : '';
	$style .= ($rounded_corners == 'true') ? '-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;' : '';
	$style .= $minheight ? 'min-height:'.$minheight.'px;' : '';
	$style .= '"';
	
	$margins  = $topspacing ? 'margin-top:'.$topspacing.'px;' : '';
	$margins .= $bottomspacing ? 'margin-bottom:'.$bottomspacing.'px;' : '';
	$margins .= $leftspacing ? 'margin-left:'.$leftspacing.'px;' : '';
	$margins .= $rightspacing ? 'margin-right:'.$rightspacing.'px;' : '';
	
	$output = '';
	// If a link was added be sure to add in the A tag	
	if ($link != '') {
		$output .= '<a href="' . $link . '" style="text-decoration:none">';
	}
	$output .= '<div class="callout-box-outer'.($align ? ' align-'.$align : '').'" style="'.$margins.($width ? 'width:'.$width.$width_type.';' : '').'">';
	$output .= '<div class="callout-box"'.$style.'><div class="callout-box-inner" style="padding:'.$toppadding.'px '.$rightpadding.'px '.$bottompadding.'px '.$leftpadding.'px;">' . do_shortcode($content) . '<div class="clear"></div></div></div>';
	$output .= theme_shadow_image($shadow, $width);
	$output .= '</div>';
	// If a link was added be sure to close the A tag	
	if ($link != '') {
		$output .= '</a>';
	}
	return $output;
}
add_shortcode('callout_box','theme_sc_callout_box');
add_shortcode('callout_box_1','theme_sc_callout_box');
add_shortcode('callout_box_2','theme_sc_callout_box');
add_shortcode('callout_box_3','theme_sc_callout_box');

function theme_sc_elegant_box($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'width' => '',
		'height' => '',
		'bgcolor' => '',
		'align' => '',
		'shadow' => '',
	), $atts));
	
	$width = preg_replace("/[^0-9]/", "", $width);
	$height = preg_replace("/[^0-9]/", "", $height);
	
	$output  = '<div class="elegant-box'.($align ? ' align-'.$align : '').'"'.($width ? ' style="width:'.$width.'px;"' : '').'>';
	$output .= '<div class="elegant-box-outer"><div class="elegant-box-inner"'.($bgcolor ? ' style="background-color:#'.$bgcolor.';"' : '').'>';
	$output .= '<div class="elegant-box-gradient-left"><div class="elegant-box-gradient-right"><div class="elegant-box-content"'.($height ? ' style="height:'.$height.'px;"' : '').'>';
	$output .= do_shortcode($content);
	$output .= '<div class="clear"></div></div></div></div></div></div>';
	$output .= theme_shadow_image($shadow, $width);		
	$output .= '</div>';
	return $output;
}
add_shortcode('elegant_box','theme_sc_elegant_box');

