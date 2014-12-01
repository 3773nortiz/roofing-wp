<?php

function theme_button($args){
	
	$defaults = array (
 		'type' => 'link',
 		'text' => '',
		'id'   => '',
 		'class' => '',
		'size' => 'medium',
		'align' => 'left',
		'fontsize' => '',
		'fontcolor' => '',
		'color' => '',
 		'title' => '',
		'link' => '',
		'width' => '',
		'full' => "false",
		'lightbox' => "false",
		'append' => '',
 		'leftspacing' => "",
 		'rightspacing' => "",
 		'topspacing' => "",
 		'bottomspacing' => "",
 		'extra' => '',		
	);
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);
	
	$id = $id ? 'id="'.$id.'" ' : '';
	$align = ($full==="false") ? $align : 'none';
	$full = ($full==="false") ? '' : ' vtbtnfull';
	$class = $class ? ' '.$class : '';
	$size = $size ? ' '.$size : '';
	$text = trim($text).($append ? ' '.$append : '');		
	$width = preg_replace("/[^0-9]/", "", $width);
	$fontsize = (int)preg_replace("/[^0-9]/", "", $fontsize);	
	$leftspacing = (int)preg_replace("/[^0-9]/", "", $leftspacing);	
	$rightspacing = (int)preg_replace("/[^0-9]/", "", $rightspacing);	
	$topspacing = (int)preg_replace("/[^0-9]/", "", $topspacing);	
	$bottomspacing = (int)preg_replace("/[^0-9]/", "", $bottomspacing);	
	
	$content = $id.'class="vtbutton'.$size.$full.$class.'" style="'.(($color)?'background:#'.$color.';':'').($width ? 'width:'.$width.'px;' : '').'"';
	
	if($type == 'submit'){
		$content = '<input type="submit" value="'.$text.'" '.$content.' '.$extra.' />';
	}elseif($type == 'button'){
		$content = '<button type="button" '.$content.' '.$extra.'><span'.($width ? ' style="width:'.$width.'px;padding-left:0px;padding-right:0px;"' : '').'>'.$text.'</span></button>';
	}else{
		$content = '<a href="'.$link.'"'.(($lightbox == 'true')?' rel="prettyPhoto"':'').' title="'.$title.'" '.$content.' '.$extra.'><span style="'.($width ? 'width:'.$width.'px;padding-left:0px;padding-right:0px;' : '').($fontsize ? 'font-size:'.$fontsize.'px !important;' : '').(($fontcolor)?'color:#'.$fontcolor.' !important;':'').'">'.$text.'</span></a>';
	}
	
	$content = '<div class="vtbutton-container align-'.$align.'" style="padding:'.$topspacing.'px '.$rightspacing.'px '.$bottomspacing.'px '.$leftspacing.'px;">'.$content.'</div>';
		
	return $content;
}

function theme_sc_button($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id' => '',
		'class' => '',
		'size' => '',
		'color' => '',
		'link' => '',
		'align' => 'left',
 		'title' => '',
		'width' => '',
		'fontsize' => '',
		'fontcolor' => '',
		'full' => "false",
		'lightbox' => "false",
		'append' => '',
		'leftspacing' => '',
		'rightspacing' => '',
		'topspacing' => '',
		'bottomspacing' => '',
	), $atts));
	
	return theme_button(array('text'=>$content, 'id'=>$id, 'class'=>$class, 'size'=>$size, 'align'=>$align, 'title'=>$title, 'color'=>$color, 'link'=>$link, 'width'=>$width, 'full'=>$full, 'lightbox'=>$lightbox, 'append'=>$append, 'fontsize'=>$fontsize, 'fontcolor'=>$fontcolor, 'leftspacing'=>$leftspacing, 'rightspacing'=>$rightspacing, 'topspacing'=>$topspacing, 'bottomspacing'=>$bottomspacing));
}
add_shortcode('button','theme_sc_button');
