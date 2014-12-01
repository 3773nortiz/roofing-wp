<?php

function theme_social_icons(){

	$social_icons = "";		
	$facebook = theme_get_option(THEME_SLUG."_sn_facebook");
	if(!empty($facebook)){
		$social_icons .= '<li><a href="'.$facebook.'" class="facebook" title="Like us on Facebook!">facebook</a></li>';
	}
	$twitter = theme_get_option(THEME_SLUG."_sn_twitter");
	if(!empty($twitter)){
		$social_icons .= '<li><a href="'.$twitter.'" class="twitter" title="Follow us on Twitter!">twitter</a></li>';
	}
	$gplus = theme_get_option(THEME_SLUG."_sn_gplus");
	if(!empty($gplus)){
		$social_icons .= '<li><a href="'.$gplus.'" class="gplus" title="View our Google Plus profile!">gplus</a></li>';
	}
	$youtube = theme_get_option(THEME_SLUG."_sn_youtube");
	if(!empty($youtube)){
		$social_icons .= '<li><a href="'.$youtube.'" class="youtube" title="View Our Channel!">youtube</a></li>';
	}
	$linkedin = theme_get_option(THEME_SLUG."_sn_linkedin");
	if(!empty($linkedin)){
		$social_icons .= '<li><a href="'.$linkedin.'" class="linkedin" title="View our LinkedIn profile!">linkedin</a></li>';
	}
	$pinterest = theme_get_option(THEME_SLUG."_sn_pinterest");
	if(!empty($pinterest)){
		$social_icons .= '<li><a href="'.$pinterest.'" class="pinterest" title="View our Pinterest page!">pinterest</a></li>';
	}
	$rss = theme_get_option(THEME_SLUG."_sn_rss");
	if(!empty($rss)){
		$social_icons .= '<li><a href="'.$rss.'" class="rss" title="View our RSS feeds!">rss</a></li>';
	}
	return '<ul class="social-icons">'.$social_icons.'</ul>';			
}

function theme_sc_social_icons($atts) {
	extract(shortcode_atts(array(
		'size' => 'small',
	), $atts));
	
	return theme_social_icons();	
}
add_shortcode('social_icons', 'theme_sc_social_icons');

class theme_social_widget extends WP_Widget {

	function theme_social_widget() {
		$widget_ops = array('classname' => 'theme_social_widget', 'description' => __('Link to your RSS feed and social media accounts.', THEME_SLUG));
		$this->WP_Widget('theme_social_widget', __(THEME_NAME.' - Social Presence', THEME_SLUG), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$title_link = strip_tags($instance['title_link']);		
		
		$social['RSS'] = $instance['rss'];
		$social['Facebook'] = $instance['facebook'];
		$social['Twitter'] = $instance['twitter'];
		$social['YouTube'] = $instance['youtube'];
		$social['Gplus'] = $instance['gplus'];
		
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		echo theme_social_icons();
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
	
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
			
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("theme_social_widget");'));
