<?php


function theme_facebook_js(){
		
	echo "<script type='text/javascript'>(function(d){var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;} js = d.createElement('script'); js.id = id; js.async = true; js.src = '//connect.facebook.net/en_US/all.js#xfbml=1'; d.getElementsByTagName('head')[0].appendChild(js); }(document));</script>";
}

function theme_facebook_comments($width = '640', $posts = ''){
	
	add_action('wp_footer', 'theme_facebook_js');

	if(!$posts){
		$posts = theme_get_option(THEME_SLUG."_fb_comments_count");
	}	
	
	$width = (int)$width - 20; 
	
	$fbcomments = '<div class="fbcomments">';
	$fbcomments .= '<div class="fb-comments" data-href="'.THEME_CURR_PAGE.'" data-num-posts="'.$posts.'" data-width="'.$width.'"></div>';
	$fbcomments .= '</div>';
	return $fbcomments;
	
}

function theme_facebook_like($url="", $layout=""){
	
	add_action('wp_footer', 'theme_facebook_js');

	if($url){
		$url = 'data-href="'.$url.'"';
	}
	
	if(!$layout){
		$layout = theme_get_option(THEME_SLUG."_fb_like_layout");	
	}
		
	$height = "70";
	$width = "300";
	$faces = theme_get_option(THEME_SLUG."_fb_like_faces");
	if(!$faces)
		$faces = "false";
	
	$extstyle = "";
		
	if($layout == "standard" && $faces != "true"){
		$height = "40";
	}elseif($layout == "box_count"){
		$height = "65";
		$width = "45";
	}elseif($layout == "button_count"){
		$height = "30";
		$width = "45";
	}
	
	$fblike = '<div class="fblike fblike-'.$layout.'">';
	$fblike .= '<div class="fb-like" '.$url.' data-send="false" data-show-faces="'.$faces.'" data-layout="'.$layout.'"></div>';
	$fblike .= '</div>';
	return $fblike;
}

function theme_facebook_box($fburl, $width="292", $stream="true", $faces="true"){

	add_action('wp_footer', 'theme_facebook_js');

	$fbbox = "";
	if($fburl){	
	
		if(!$faces)
			$faces = "false";
			
		if(!$stream)
			$stream = "false";	
			
		$width = preg_replace("/[^0-9]/", "", $width);
		if(!$width)
			$width = "292";

		$fbbox = '<div class="fb-box" style="width:'.$width.'px;">';
		$fbbox .= '<div class="fb-like-box" data-href="'.$fburl.'" data-width="'.$width.'" data-show-faces="'.$faces.'" data-stream="'.$stream.'" data-header="false"></div>';
		$fbbox .= '</div>';	
	}
	return $fbbox;
}


function theme_sc_fblike($atts) {
	extract(shortcode_atts(array(), $atts));
	
	return theme_facebook_like();
}
add_shortcode('fblike', 'theme_sc_fblike');

function theme_sc_fbcomments($atts) {
	extract(shortcode_atts(array(
		'width' => '400px',
		'count' => 10,		
	), $atts));
	
	$width = preg_replace("/[^0-9]/", "", $width);
	
	return theme_facebook_comments($width, $count);
}
add_shortcode('fbcomments', 'theme_sc_fbcomments');

function theme_sc_fbbox($atts) {
	extract(shortcode_atts(array(
		'url' => '',
		'width' => '292px',
		'faces' => 'true',
		'stream' => 'true',
	), $atts));
	
	$width = preg_replace("/[^0-9]/", "", $width);
	
	return theme_facebook_box($url, $width, $stream, $faces);
}
add_shortcode('fbbox', 'theme_sc_fbbox');


class theme_fb_box extends WP_Widget {

	function theme_fb_box() {
		$widget_ops = array( 'classname' => 'theme_fb_box', 'description' => __( "Facebook Like Box" , THEME_SLUG) );
		$this->WP_Widget('theme_fb_box', __(THEME_NAME.' - Facebook Like Box', THEME_SLUG), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title']);
		$url = $instance['url'];
		$faces = $instance['faces'] ? 'true' : 'false';
		$stream = $instance['stream'] ? 'true' : 'false';

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		
		echo theme_facebook_box($url, "258", $stream, $faces);
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['url'] = trim($new_instance['url']);
		$instance['faces'] = !empty($new_instance['faces']) ? 1 : 0;
		$instance['stream'] = !empty($new_instance['stream']) ? 1 : 0;
		return $instance;
	}

	function form( $instance ) {
		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
		$url = $instance['url'];
		$faces = isset($instance['faces']) ? (bool) $instance['faces'] :false;
		$stream = isset($instance['stream']) ? (bool) $instance['stream'] :false;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', THEME_SLUG ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
				
		<p><label for="<?php echo $this->get_field_id('url'); ?>"><?php _e( 'Facebook Page URL:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" /></p>

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('faces'); ?>" name="<?php echo $this->get_field_name('faces'); ?>"<?php checked( $faces ); ?> />
		<label for="<?php echo $this->get_field_id('faces'); ?>"><?php _e( 'Show faces', THEME_SLUG ); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('stream'); ?>" name="<?php echo $this->get_field_name('stream'); ?>"<?php checked( $stream ); ?> />
		<label for="<?php echo $this->get_field_id('stream'); ?>"><?php _e( 'Show stream', THEME_SLUG ); ?></label><br />

<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("theme_fb_box");'));
