<?php


function theme_gplusone_js(){
		
	echo "<script type='text/javascript'>(function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0];  s.parentNode.insertBefore(po, s); })();</script>";
}

function theme_gplusone_btn($url="", $layout=""){

	add_action('wp_footer', 'theme_gplusone_js');

	if(!$layout){
		$layout = theme_get_option(THEME_SLUG."_gplusone_layout");	
	}
	
	if($layout == "vertical"){
		$layout_options = 'size="tall"';
	}elseif($layout == "horizontal"){
		$layout_options = 'size="medium"';
	}else{
		$layout_options = 'size="medium" annotation="none"';
	}
	
	if($url){
		$url = ' href="'.$url.'"';
	}

	$gplus1 = '<div class="gplusone gplusone-'.$layout.'">';
	$gplus1 .= '<g:plusone '.$layout_options.$url.'></g:plusone>';
	$gplus1 .= '</div>';
	return $gplus1;
}

function theme_sc_gplusone($atts) {
	extract(shortcode_atts(array(), $atts));
	
	return theme_gplusone_btn();
}
add_shortcode('gplus1', 'theme_sc_gplusone');
