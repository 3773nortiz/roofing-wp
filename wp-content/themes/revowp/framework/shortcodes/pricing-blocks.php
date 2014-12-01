<?php

function theme_sc_pricing_block($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'price' => '00.00',
		'currency' => '$',
		'before' => '',
		'after' => '',
		'url' => '',
		'button_text' => 'Order Now &raquo;',
		'button_size' => 'large',
		'button_color' => '',
		'thumbnail' => '',
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

	$output = '';
	$price = explode('.', $price);
	$pricing  = '<div class="pricing-block">';	
	$pricing .= '<div class="pricing-block-pricing">';
	$pricing .= ($before) ? '<div class="pricing-block-before">'.$before.'</div>' : '';
	$pricing .= '<div class="pricing-block-price">';
	$pricing .= '<span class="pricing-block-price-0">'.$currency.'</span>';
	$pricing .= $price[0];
	$pricing .= '<span class="pricing-block-price-2">'.$price[1].'</span>';
	$pricing .= '</div>';
	$pricing .= ($after) ? '<div class="pricing-block-after">'.$after.'</div>' : '';;
	$pricing .= '</div>';	
	$pricing .= ($url && $button_size) ? '<div class="pricing-block-url">'.theme_button(array('text'=>$button_text, 'size'=>$button_size, 'link'=>$url, 'color'=>$button_color)).'</div>' : '';	
	$pricing .= '</div>';

	$content  = '[raw]<div class="pricing-content">[/raw]'.($title ? '<h3>'.$title.'</h3>' : '').do_shortcode(trim($content)).'[raw]</div>[/raw]';
	
	$img_url = ($image_clickable == 'true') ? $url : '';
	$thumbnail = ($thumbnail) ? '<div class="pricing-thumb">'.theme_image(array('src'=>$thumbnail, 'link'=>$img_url, 'title'=>$title, 'width'=>$thumb_width, 'box'=>$image_box, 'shadow'=>$thumb_shadow, 'alt'=>$image_alt)).'</div>' : '';

	switch($layout){
		case '2':
		case '4':
		case '3':
			$output = $thumbnail.$content.'<div style="text-align:center;">'.$pricing.'</div>';
			break;
		case '1':
		default:
			$output = $thumbnail.$pricing.$content;
			break;
	}
		
	return '<div class="pricing pricing-'.$layout.' align'.$align.'"'.($width ? ' style="width:'.$width.'px;"' : '').'>'.$output.'<div class="clear"></div></div>';
}

add_shortcode('pricing_block', 'theme_sc_pricing_block');
