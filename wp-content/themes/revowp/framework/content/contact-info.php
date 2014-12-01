<?php

class theme_contactinfo_widget extends WP_Widget {

	function theme_contactinfo_widget() {
		$widget_ops = array('classname' => 'theme_contactinfo_widget', 'description' => __('Display Business Contact information.', THEME_SLUG));
		$this->WP_Widget('theme_contactinfo_widget', __(THEME_NAME.' - Contact Information', THEME_SLUG), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$description = strip_tags($instance['description']);
		
		$name = $instance['name'];
		$phone = $instance['phone'];		
		$fax = $instance['fax'];		
		$email = $instance['email'];
		$address = trim($instance['address']);
		$hours = trim($instance['hours']);
		$coords = $instance['coords'];
		$gmap = $instance['gmap'] ? 1 : 0;
	
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
			
		if($gmap){
			$lat = explode(',', $coords);			
			echo theme_gmap($address, trim($lat[0]), trim($lat[1]));
		}
		if($name || $phone || $fax || $email || $address || $hours){
			echo theme_contact_info($name, $address, $phone, $fax, $email, $hours);
		}
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['name'] = $new_instance['name'];
		$instance['phone'] = $new_instance['phone'];		
		$instance['address'] = $new_instance['address'];			
		$instance['hours'] = $new_instance['hours'];
		$instance['gmap'] = $new_instance['gmap'] ? '1' : '0';		
		$instance['email'] = $new_instance['email'];		
		$instance['fax'] = $new_instance['fax'];	
		$instance['coords'] = $new_instance['coords'];		

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);

		$name = $instance['name'];
		$phone= $instance['phone'];		
		$address = $instance['address'];
		$hours = $instance['hours'];
		$gmap = $instance['gmap'] ? '1' : '0';
		$email = $instance['email'];
		$coords = $instance['coords'];
		$fax = $instance['fax'];
		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo esc_attr($name); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', THEME_SLUG); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>"><?php echo esc_attr($address); ?></textarea></p>
		
		<p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_attr($phone); ?>" /></p>
			
		<p><label for="<?php echo $this->get_field_id('fax'); ?>"><?php _e('Fax:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo esc_attr($fax); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('coords'); ?>"><?php _e('Co-ordinates:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('coords'); ?>" name="<?php echo $this->get_field_name('coords'); ?>" type="text" value="<?php echo esc_attr($coords); ?>" /></p>
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('gmap'); ?>" name="<?php echo $this->get_field_name('gmap'); ?>"<?php checked( $gmap ); ?> />
		<label for="<?php echo $this->get_field_id('gmap'); ?>"><?php _e( 'Show Google Map' , THEME_SLUG); ?></label><br /><br />
		
		<p><label for="<?php echo $this->get_field_id('hours'); ?>"><?php _e('Hours of operation:', THEME_SLUG); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('hours'); ?>" name="<?php echo $this->get_field_name('hours'); ?>"><?php echo esc_attr($hours); ?></textarea></p>

<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("theme_contactinfo_widget");'));

$lat = $long = $gmap = "";
function theme_gmap($address="", $lat="", $long="", $width="", $height=""){

	if(!isset($GLOBALS['gmaps'])){
		$GLOBALS['gmaps'] = array();
	}
	
	if(!($lat && $long)){
		if($address){
			if(function_exists('curl_init')){
				$c = curl_init();
				curl_setopt_array($c, array(
					CURLOPT_URL => 'http://maps.google.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false',
					CURLOPT_HEADER => false,
					CURLOPT_TIMEOUT => 10,
					CURLOPT_RETURNTRANSFER => true
				));
				$geocode = curl_exec($c);
				curl_close($c);
			}else{
				$geocode = @file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');		
			}
			$output = json_decode($geocode);
			if($output->status == "OK") {
				$lat = $output->results[0]->geometry->location->lat;
				$long = $output->results[0]->geometry->location->lng;	
			}else{
				return;
			}			
		}else{
			return;
		}
	}

	$gmap_id = mt_rand();
	$GLOBALS['gmaps'][$gmap_id] = array('lat'=>$lat, 'long'=>$long);
	wp_enqueue_script('theme-gmaps', 'http://maps.googleapis.com/maps/api/js?sensor=false', array(), false, true);
	$output = '<div class="gmap-canvas border" id="gmap_'.$gmap_id.'" style="'.(($width)?'width:'.$width.';':'').(($height)?'height:'.$height.';':'').'"></div>';
	return $output;
}

function theme_gmap_footer(){
	if(isset($GLOBALS['gmaps']) && is_array($GLOBALS['gmaps'])){
		foreach($GLOBALS['gmaps'] as $gmap_id=>$coord){
			if(!empty($gmap_id) && !empty($coord['long']) && !empty($coord['lat'])){
				echo '<script type="text/javascript">'."\n";
				echo 'jQuery(document).ready(function($) {'."\n";
				echo 'var myLatlng = new google.maps.LatLng('.$coord['lat'].', '.$coord['long'].');'."\n";
				echo 'var myOptions = {zoom: 10, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP}'."\n";
				echo 'var map = new google.maps.Map(document.getElementById("gmap_'.$gmap_id.'"), myOptions);'."\n";
				echo 'var marker = new google.maps.Marker({position: myLatlng, map: map});'."\n";
				echo '});'."\n";
				echo '</script>'."\n";
			}
		}
	}
}
add_action('wp_footer', 'theme_gmap_footer');

function theme_contact_info($name, $address, $phone, $fax, $email, $hours){
	
	$output  = '';
	$output .= '<ul class="contact-info">';
	$output .= ($name) ? '<li class="contact-info-name"><h3>'.$name.'</h3></li>': '';
	$output .= ($address) ? '<li class="contact-info-address"><p>'.nl2br($address).'</p></li>': '';
	$output .= ($phone) ? '<li class="contact-info-phone">'.$phone.'</li>': '';
	$output .= ($fax) ? '<li class="contact-info-fax">'.$fax.'</li>': '';
	$output .= ($email) ? '<li class="contact-info-email">'.$email.'</li>': '';
	$output .= ($hours) ? '<li class="contact-info-hours"><p>'.nl2br($hours).'</p></li>': '';
	$output .= '</ul>';
	
	return $output;
}


function theme_sc_gmaps($atts) {
	extract(shortcode_atts(array(
		'width' => '400px',
		'height' => '400px',
		'lat' => "",		
		'long' => "",	
		'address' => "",	
	), $atts));
		
	return theme_gmap($address, $lat, $long, $width, $height);
}
add_shortcode('gmaps', 'theme_sc_gmaps');

function theme_sc_contact_info($atts) {
	extract(shortcode_atts(array(
		'name' => '',
		'address' => '',
		'phone' => '',		
		'fax' => '',	
		'email' => '',
		'hours' => '',		
	), $atts));
		
	return theme_contact_info($name, $address, $phone, $fax, $email, $hours);
}
add_shortcode('contact_info', 'theme_sc_contact_info');
