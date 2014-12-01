<?php
/***** Twitter *****/

require(dirname(__FILE__)."/twitterstatus.php");
require(dirname(__FILE__)."/wp_list_tweets.php");

class theme_twitter extends WP_Widget {

	function theme_twitter() {
		$widget_ops = array( 'classname' => 'theme_twitter', 'description' => __( "Twitter", THEME_SLUG) );
		$this->WP_Widget('theme_twitter', __(THEME_NAME.' - Twitter', THEME_SLUG), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$username = $instance['username'];
		if(!$count)
			$count = 10;

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		
		$t = new TwitterStatus($username, $count);
		echo $t->Render();		
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = trim($new_instance['username']);
		$instance['count'] = (int)trim($new_instance['count']);

		return $instance;
	}

	function form( $instance ) {
		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
		$username = $instance['username'];
		$count = $instance['count'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
				
		<p><label for="<?php echo $this->get_field_id('username'); ?>"><?php _e( 'Username:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( '# of tweets:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></p>

<?php
	}
}
//add_action('widgets_init', create_function('', 'return register_widget("theme_twitter");'));


function theme_tweet_button($url="", $title="", $layout=""){
	
	if(!$layout){
		$layout = theme_get_option(THEME_SLUG."_tweetbutton_layout");	
	}
	
	$username = theme_get_option(THEME_SLUG."_twitter_username");	
	$mention = "";
	if($username){
		$mention = ' data-via="'.$username.'"';
	}	
	if($url){
		$url = ' data-url="'.$url.'"';
	}
	if($title){
		$title = ' data-text="'.$title.'"';
	}
	
	$output = '<div class="tweet-button twitbtn-'.$layout.'">';
	$output .= '<a href="http://twitter.com/share" class="twitter-share-button" data-count="'.$layout.'"'.$title.$url.$mention.'>Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
	$output .= '</div>';
	
	return $output;
}


function theme_sc_twitter($atts) {
	extract(shortcode_atts(array(
		'username' => '',
		'count' => 3,
	), $atts));
	
	$t = new TwitterStatus($username, $count);
	$output_string = $t->Render();		
	return $output_string;	
	
}
add_shortcode('twitter', 'theme_sc_twitter');


function theme_sc_tweetbutton($atts) {
	extract(shortcode_atts(array(), $atts));
	
	return theme_tweet_button();
}
add_shortcode('tweetbutton', 'theme_sc_tweetbutton');

