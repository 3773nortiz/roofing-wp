<?php

function theme_image($args){
	
	$defaults = array (
 		'src'   => "",
 		'link'	=> "",
 		'title' => "",
 		'width' => "",
 		'height' => "",
 		'lightbox' => "",
 		'lightbox_group' => "",
  		'lightbox_desc' => "",
		'align' => "none",
 		'box' => "",
 		'shadow' => "",
 		'resize' => false,
 		'alt' => "",
 		'caption' => "",
 		'caption_position' => "",
 		'hover_image_url' => "",
 		'extra' => "",
 		'leftspacing' => "",
 		'rightspacing' => "",
 		'topspacing' => "5",
 		'bottomspacing' => "5",
 		'responsive' => false,
	);
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);
	
	$iwidth = preg_replace("/[^0-9]/", "", $width);
	$iheight = preg_replace("/[^0-9]/", "", $height);	
	$leftspacing = (int)preg_replace("/[^0-9]/", "", $leftspacing);	
	$rightspacing = (int)preg_replace("/[^0-9]/", "", $rightspacing);	
	$topspacing = (int)preg_replace("/[^0-9]/", "", $topspacing);	
	$bottomspacing = (int)preg_replace("/[^0-9]/", "", $bottomspacing);	
	
	$alinkbefore = '';
	$alinkafter = '';
	
	$box_width = theme_image_box_size($box, $iwidth);
	$caption_left = (int)(theme_image_box_size($box, 0)/2);
	$shadow_height = $shadow ? $box_width*40/960 : 0;

	if($link){
		$alinkbefore = '<a class="image-link" href="'.$link.'"'.(($lightbox == 'true')?' rel="prettyPhoto'.($lightbox_group ? '['.$lightbox_group.']' : '').'" data-lightbox="'.$lightbox_desc.'"':'').' title="'.$title.'"'.$extra.'>';
		$alinkafter = '</a>';
		$caption = $caption ? '<a href="'.$link.'"'.(($lightbox == 'true')?' rel="prettyPhoto" data-lightbox="'.$lightbox_desc.'"':'').' title="'.$title.'">'.$caption.'</a>' : '';
	}else{
		$alinkbefore = '<span class="image-link">';
		$alinkafter = '</span>';
		$caption = $caption ? '<span>'.$caption.'</span>' : '';
	}
	
	$caption_style = '';
	if($caption_position == 'bar'){
	//	$caption_style .= 'left:'.$caption_left.'px;';
		$caption_style .= 'bottom:'.($caption_left+$shadow_height+15).'px;';
	}
	if($caption_position == 'fade'){
		$caption_style .= 'left:'.$caption_left.'px;';
		$caption_style .= 'top:'.$caption_left.'px;';
	}
		
	$caption = $caption && $caption_position ? '<div class="image-caption image-caption-'.$caption_position.'" style="'.$caption_style.'">'.$caption.'</div>' : '';
	
	$box = $box ? 'border-'.$box : '';
//	$responsive = $responsive ? ' img-fixed' : '';
		
	$output  = '<div class="image preload align'.$align.'" style="'.(($box_width)?'width:'.$box_width.'px;':'').'padding:'.$topspacing.'px '.$rightspacing.'px '.$bottomspacing.'px '.$leftspacing.'px;"><div class="img-wrapper'.(($lightbox == 'true' && $link)?' imghover':'').'">';
	$output .= ($caption_position == 'top' && $caption) ? $caption : '';
	$output .= $alinkbefore;
	$output .= '<span class="img-container'.($box ? ' '.$box : '').'">';
	if($resize){
		$output .= theme_resized_image($src, $iwidth, $iheight, 'img-primary'.$responsive, $alt);
		$output .= $hover_image_url ? theme_resized_image($hover_image_url, $iwidth, $iheight, 'img-hover', $alt) : '';
//		$output .= $responsive ? theme_resized_image($src, "", "", 'img-responsive', $alt) : '';
	}else{
		$output .= '<img class="img-primary'.$responsive.'"'.($iwidth ? ' width="'.$iwidth.'"' : '').($iheight ? ' height="'.$iheight.'"' : '').' alt="'.$alt.'" src="'.$src.'" />';
		$output .= $hover_image_url ? '<img class="img-hover"'.($iwidth ? ' width="'.$iwidth.'"' : '').($iheight ? ' height="'.$iheight.'"' : '').' alt="'.$alt.'" src="'.$hover_image_url.'" />' : '';
//		$output .= $responsive ? '<img class="img-responsive" alt="'.$alt.'" src="'.$src.'" />' : '';		
	}
	$output .= '</span>';
	$output .= $alinkafter;
	if($iwidth){
		$output .= theme_shadow_image($shadow, $box_width);		
	}
	$output .= ($caption_position != 'top' && $caption) ? $caption : '';
	$output .= '</div><div class="clear"></div></div>';
	
	if (check_theme_metrics()) {
		return $output;
	}
}

function theme_sc_image($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'alt' => '',
		'width' => false,
		'height' => false,
		'lightbox' => false,
		'align' => 'left',
		'box' => '',
		'shadow' => '',
		'caption' => '',
		'caption_position' => 'bottom',
		'hover_image_url' => '',
		'leftspacing' => '',
		'rightspacing' => '',
		'topspacing' => '5',
		'bottomspacing' => '5',
	), $atts));

	$src = trim($content);	
	$hover_image_url = trim($hover_image_url);	
	return theme_image(array('src'=>$src, 'link'=>$link, 'title'=>$title, 'width'=>$width, 'height'=>$height, 'lightbox'=>$lightbox, 'align'=>$align, 'box'=>$box, 'shadow'=>$shadow, 'alt'=>$alt, 'caption'=>$caption, 'caption_position'=>$caption_position, 'hover_image_url'=>$hover_image_url, 'leftspacing'=>$leftspacing, 'rightspacing'=>$rightspacing, 'topspacing'=>$topspacing, 'bottomspacing'=>$bottomspacing));	
}
add_shortcode('image', 'theme_sc_image');

class theme_image_widget extends WP_Widget {

	function theme_image_widget() {
		$widget_ops = array( 'classname' => 'theme_image_widget', 'description' => __( "Image Banner" , THEME_SLUG) );
		$this->WP_Widget('theme_image_widget', __(THEME_NAME.' - Images', THEME_SLUG), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title']);
		$src = $instance['src'];
		$alt = $instance['alt'];
		$link = $instance['link'];
		$width = $instance['width'];
		$height = $instance['height'];
		$lightbox = $instance['lightbox'] ? 'true' : 'false';
		$align = $instance['align'];
		$image_box = $instance['image_box'];
		$shadow = $instance['shadow'];
		$caption = $instance['caption'];
		$caption_position = $instance['caption_position'];
		
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		
		echo theme_image(array('src'=>$src, 'link'=>$link, 'title'=>$title, 'width'=>$width, 'height'=>$height, 'lightbox'=>$lightbox, 'align'=>$align, 'box'=>$image_box, 'shadow'=>$shadow, 'alt'=>$alt, 'caption'=>$caption, 'caption_position'=>$caption_position));	
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['src'] = trim($new_instance['src']);
		$instance['link'] = trim($new_instance['link']);
		$instance['width'] = $new_instance['width'];
		$instance['alt'] = $new_instance['alt'];
		$instance['height'] = $new_instance['height'];
		$instance['align'] = $new_instance['align'];
		$instance['image_box'] = $new_instance['image_box'];
		$instance['shadow'] = $new_instance['shadow'];
		$instance['caption'] = $new_instance['caption'];
		$instance['caption_position'] = $new_instance['caption_position'];
		$instance['lightbox'] = !empty($new_instance['lightbox']) ? 1 : 0;
		return $instance;
	}

	function form( $instance ) {
		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
		$src = $instance['src'];
		$link = $instance['link'];
		$alt = $instance['alt'];
		$width = $instance['width'];
		$height = $instance['height'];
		$align = $instance['align'];
		$image_box = $instance['image_box'];
		$shadow = $instance['shadow'];
		$caption = $instance['caption'];
		$caption_position = $instance['caption_position'];
		$lightbox = isset($instance['lightbox']) ? (bool) $instance['lightbox'] :false;
		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
				
		<p><label for="<?php echo $this->get_field_id('src'); ?>"><?php _e( 'Image URL:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('src'); ?>" name="<?php echo $this->get_field_name('src'); ?>" type="text" value="<?php echo $src; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e( 'Alt Text:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" name="<?php echo $this->get_field_name('alt'); ?>" type="text" value="<?php echo $alt; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('width'); ?>"><?php _e( 'Width:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('height'); ?>"><?php _e( 'Height:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('caption'); ?>"><?php _e( 'Caption:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('caption'); ?>" name="<?php echo $this->get_field_name('caption'); ?>" type="text" value="<?php echo $caption; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('caption_position'); ?>"><?php _e( 'Caption Position:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('caption_position'); ?>" name="<?php echo $this->get_field_name('caption_position'); ?>">
			<option value="top" <?php selected($caption_position, "top"); ?>>Top</option>
			<option value="bottom" <?php selected($caption_position, "bottom"); ?>>Bottom</option>
			<option value="fade" <?php selected($caption_position, "fade"); ?>>Fade</option>
			<option value="bar" <?php selected($caption_position, "bar"); ?>>Bar</option>
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('align'); ?>"><?php _e( 'Align:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('align'); ?>" name="<?php echo $this->get_field_name('align'); ?>">
			<option value="left" <?php selected($align, "left"); ?>>Left</option>
			<option value="center" <?php selected($align, "center"); ?>>Center</option>
			<option value="right" <?php selected($align, "right"); ?>>Right</option>
		</select></p>
				
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e( 'Link URL:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" /></p>
									
		<p><label for="<?php echo $this->get_field_id('image_box'); ?>"><?php _e( 'Image Box:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('image_box'); ?>" name="<?php echo $this->get_field_name('image_box'); ?>">
			<?php foreach($GLOBALS['image_boxes'] as $key=>$value) { echo '<option value="'.$key.'" '.selected($image_box, $key).'>'.$value.'</option>'; } ?>
		</select></p>
	
		<p><label for="<?php echo $this->get_field_id('shadow'); ?>"><?php _e( 'Shadow:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('shadow'); ?>" name="<?php echo $this->get_field_name('shadow'); ?>">
			<?php foreach($GLOBALS['shadow_styles'] as $key=>$value) { echo '<option value="'.$key.'" '.selected($shadow, $key, false).'>'.$value.'</option>'; } ?>
		</select></p>
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('lightbox'); ?>" name="<?php echo $this->get_field_name('lightbox'); ?>"<?php checked( $lightbox ); ?> />
		<label for="<?php echo $this->get_field_id('lightbox'); ?>"><?php _e( 'Use Lighbox' , THEME_SLUG); ?></label><br />
		
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("theme_image_widget");'));
