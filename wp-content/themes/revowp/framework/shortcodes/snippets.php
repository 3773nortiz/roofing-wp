<?php

function theme_sc_snippets($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'url' => '',
		'button_text' => 'Learn More &raquo;',
		'button_align' => 'right',
		'button_size' => 'large',
		'button_color' => '',
		'thumbnail' => '',
		'thumb_height' => '',
		'thumb_width' => '',
		'thumb_shadow' => '',
		'image_box' => '',
		'image_alt' => '',
		'image_clickable' => '',
		'layout' => '1',
		'width' => '',
		'title' => '',
		'align' => 'center',
	), $atts));

	$width = preg_replace("/[^0-9]/", "", $width);
	$thumbnail_height = preg_replace("/[^0-9]/", "", $thumb_height);
		
	$output  = '';
	$img_url = ($image_clickable == 'true') ? $url : '';
	$output .= ($thumbnail) ? '<div class="snippet-thumb"'.($thumbnail_height ? ' style="height:'.$thumbnail_height.'px;"' : '' ).'>'.theme_image(array('src'=>$thumbnail, 'link'=>$img_url, 'title'=>$title, 'width'=>$thumb_width, 'box'=>$image_box, 'shadow'=>$thumb_shadow, 'alt'=>$image_alt)).'</div>' : '';
	$output .= '[raw]<div class="snippet-content">[/raw]';
	$output .= ($title) ? '<h3>'.$title.'</h3>' : '';
	$output .= do_shortcode(trim($content));
	$output .= '[raw]</div>[/raw]';
	$output .= ($url && $button_size) ? '<div class="snippet-url">'.theme_button(array('text'=>$button_text, 'size'=>$button_size, 'link'=>$url, 'align'=>$button_align, 'color'=>$button_color)).'</div>' : '';	
	
	return '<div class="snippet snippet-'.$layout.' align'.$align.'"'.($width ? ' style="width:'.$width.'px;"' : '').'>'.$output.'<div class="clear"></div></div>';
}

add_shortcode('snippet', 'theme_sc_snippets');

