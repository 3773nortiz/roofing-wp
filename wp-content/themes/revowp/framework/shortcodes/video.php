<?php
function theme_sc_video($atts){
	if(isset($atts['type'])){
		switch($atts['type']){			
			case 'local':
				return theme_video_flash($atts);
				break;
			case 'youtube':
				return theme_video_youtube($atts);
				break;
			case 'vimeo':
				return theme_video_vimeo($atts);
				break;			
		}
	}
	return '';
}
add_shortcode('video', 'theme_sc_video');
add_shortcode('revo_video', 'theme_sc_video');

function theme_video_flash($atts) {
	extract(shortcode_atts(array(
		'src' => '',
		'id' => '',
		'width' => false,
		'height' => false,
		'align' => '',
		'shadow' => '',
		'leftspacing' => '',
		'rightspacing' => '',
		'topspacing' => '',
		'bottomspacing' => '',
	), $atts));
	
	if($id!=''){
		$id = ' id="'.$id.'"';
	}
	
	$iwidth = preg_replace("/[^0-9]/", "", $width);
	$iheight = preg_replace("/[^0-9]/", "", $height);		
	$leftspacing = (int)preg_replace("/[^0-9]/", "", $leftspacing);	
	$rightspacing = (int)preg_replace("/[^0-9]/", "", $rightspacing);	
	$topspacing = (int)preg_replace("/[^0-9]/", "", $topspacing);	
	$bottomspacing = (int)preg_replace("/[^0-9]/", "", $bottomspacing);	
	$output = "";

	$uri = parse_url(THEME_HOME.'/jwplayer/', PHP_URL_PATH);
	if (!empty($src)){
		$video_id = rand(1,1000);
				
		$output .= '<div class="video-box local-video-box'.($align ? ' align-'.$align : '').'" style="width:'.$iwidth.'px;padding:'.$topspacing.'px '.$rightspacing.'px '.$bottomspacing.'px '.$leftspacing.'px;"><script type="text/javascript" src="'.$uri.'jwplayer.js"></script>';
		$output .= '<div id="player_'.$video_id.'"></div>';		
		if($iwidth){
			$output .= theme_shadow_image($shadow, $iwidth);		
		}
		$output .= '<div><script type="text/javascript">jwplayer("player_'.$video_id.'").setup({"flashplayer":"'.$uri.'player.swf", "width":"'.$iwidth.'", "height":"'.$iheight.'", "file":"'.$src.'", "controlbar":"bottom"});</script></div>';
		$output .= '</div>';

	}
	return $output;
}

function theme_video_vimeo($atts) {
	extract(shortcode_atts(array(
		'clip_id' => '',
		'width' => '200',
		'height' => '200',
		'title' => 'true',
		'byline' => 'true',
		'portrait' => 'true',
		'align' => '',
		'shadow' => '',
		'leftspacing' => '',
		'rightspacing' => '',
		'topspacing' => '',
		'bottomspacing' => '',
	), $atts));

	$iwidth = preg_replace("/[^0-9]/", "", $width);
	$iheight = preg_replace("/[^0-9]/", "", $height);	
	$leftspacing = (int)preg_replace("/[^0-9]/", "", $leftspacing);	
	$rightspacing = (int)preg_replace("/[^0-9]/", "", $rightspacing);	
	$topspacing = (int)preg_replace("/[^0-9]/", "", $topspacing);	
	$bottomspacing = (int)preg_replace("/[^0-9]/", "", $bottomspacing);	

	$output = "";
	if (!empty($clip_id)){
		$output = '<div class="video-box'.($align ? ' align-'.$align : '').'" style="width:'.$iwidth.'px;padding:'.$topspacing.'px '.$rightspacing.'px '.$bottomspacing.'px '.$leftspacing.'px;"><div class="video-container">';
		$output .= '<iframe style="width:'.$iwidth.'px;" src="http://player.vimeo.com/video/'.$clip_id.'?title='.(($title=='true')?'1':'0').'&byline='.(($byline=='true')?'1':'0').'&portrait='.(($portrait=='true')?'1':'0').'" width="'.$iwidth.'" height="'.$iheight.'" frameborder="0"></iframe></div>';		
		if($iwidth){
			$output .= theme_shadow_image($shadow, $iwidth);		
		}
		$output .= '</div>';	
	}
	return $output;
}

function theme_video_youtube($atts, $content=null) {
	extract(shortcode_atts(array(
		'clip_id' => '',
		'width' => '200',
		'height' => '200',
		'rel' => 'true',
		'showinfo' => 'true',
		'controls' => 'true',
		'align' => '',
		'shadow' => '',
		'leftspacing' => '',
		'rightspacing' => '',
		'topspacing' => '',
		'bottomspacing' => '',
	), $atts));
	
	$iwidth = preg_replace("/[^0-9]/", "", $width);
	$iheight = preg_replace("/[^0-9]/", "", $height);	
	$leftspacing = (int)preg_replace("/[^0-9]/", "", $leftspacing);	
	$rightspacing = (int)preg_replace("/[^0-9]/", "", $rightspacing);	
	$topspacing = (int)preg_replace("/[^0-9]/", "", $topspacing);	
	$bottomspacing = (int)preg_replace("/[^0-9]/", "", $bottomspacing);	
	
	$output = "";
	if (!empty($clip_id)){
		$output = '<div class="video-box'.($align ? ' align-'.$align : '').'" style="width:'.$iwidth.'px;padding:'.$topspacing.'px '.$rightspacing.'px '.$bottomspacing.'px '.$leftspacing.'px;"><div class="video-container">';
		$output .= '<iframe style="width:'.$iwidth.'px;" src="http://www.youtube.com/embed/'.$clip_id.'?wmode=transparent&rel='.(($rel=='true')?'1':'0').'&showinfo='.(($showinfo=='true')?'1':'0').'&controls='.(($controls=='true')?'1':'0').'" width="'.$iwidth.'" height="'.$iheight.'" frameborder="0"></iframe></div>';
		if($iwidth){
			$output .= theme_shadow_image($shadow, $iwidth);		
		}
		$output .= '</div>';
		
	}
	return $output;
}
