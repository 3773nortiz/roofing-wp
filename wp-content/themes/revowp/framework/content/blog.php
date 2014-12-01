<?php

function theme_blog_categories($orderby='name', $exclude='', $hide_empty=1){

	$order = 'ASC';
	if($orderby == 'count'){
		$order = 'DESC';
	}	
	
	$output  = '';
	$output .= '<div class="blog-categories"><ul>';
	$output .= wp_list_categories(array('orderby'=>$orderby, 'order'=>$order, 'hide_empty'=>$hide_empty, 'exclude'=>trim($exclude), 'title_li'=>'', 'show_option_none'=>'', 'echo'=>0));
	$output .= '</ul></div>';
	return $output;
}

function theme_sc_blog_categories($atts) {
	extract(shortcode_atts(array(
  		'exclude' => "",
 		'orderby' => "name",
 		'hide_empty' => "true",
	), $atts));
	
	if($hide_empty == "true"){
		$hide_empty = 1;
	}else{
		$hide_empty = 0;	
	}
	
	return theme_blog_categories($orderby, $exclude, $hide_empty);
}
add_shortcode('blog_categories', 'theme_sc_blog_categories');


function theme_blog_posts($args){
	
	$defaults = array (
 		'count'   => "5",
 		'orderby' => "post_date",
  		'cat' => "",
		'exclude' => '',
 		'box' => "",
  		'shadow' => "",
		'size' => "",
  		'title' => "",
		'excerpt' => "",
  		'excerpt_size' => "",
 		'category' => "",
		'date' => "",
 		'author' => "",
		'width' => "",
 		'height' => "",	);
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);
	
	$sizes = array();
	$sizes['small'] = array(60, 60);
	$sizes['medium'] = array(100, 75);
	$sizes['large'] = array(205, 120);
	
	$count = preg_replace("/[^0-9]/", "", $count);
	$count = $count ? $count : 5;
	
	$iwidth = preg_replace("/[^0-9]/", "", $width);
	$iheight = preg_replace("/[^0-9]/", "", $height);
	
	$excerpt_size = preg_replace("/[^0-9]/", "", $excerpt_size);
	$excerpt_size = $excerpt_size ? $excerpt_size : 100;
		
	$output = '<div class="blog-posts"><ul>';
	$posts = get_posts(array('numberposts'=>$count, 'category'=>$cat, 'orderby'=>$orderby, 'exclude'=>$exclude));
	foreach($posts as $post){
		setup_postdata($post);
		
		$post_permalink = get_permalink($post->ID);
		$post_title = get_the_title($post->ID);
		
		$output .= '<li><div class="blog-post-item">';
		if(has_post_thumbnail($post->ID) && $size){
			$attachment_id = get_post_thumbnail_id($post->ID); 
			$thumb = wp_get_attachment_image_src($attachment_id, 'full', true);
			$output .= '<div class="blog-post-item-thumb blog-post-item-thumb-'.$size.'">';
			$output .= theme_image(array('src'=>$thumb[0], 'link'=>$post_permalink, 'title'=>$post_title, 'width'=>$sizes[$size][0], 'height'=>$sizes[$size][1], 'box'=>$box, 'shadow'=>$shadow, 'resize'=>true, 'alt'=>get_post_meta($attachment_id, '_wp_attachment_image_alt', true)));
			$output .= '</div>';
		}
		$output .= '<div class="blog-post-item-content">';
		$output .= ($title == 'true') ? '<h4 class="blog-post-item-title"><a href="'.$post_permalink.'">'.$post_title.'</a></h4>' : '';
		if($excerpt == 'true'){
			$post_excerpt = $post->post_excerpt ? $post->post_excerpt : $post->post_content; 
			$output .= '<p>'.theme_text_summary($post_excerpt, $excerpt_size).'</p>';
		}
		$output .= ($category == 'true') ? '<div class="blog-post-item-cat small-content"><span>in: </span>'.get_the_category_list(', ', '', $post->ID).'</div>' : '';
		$output .= ($date == 'true') ? '<div class="blog-post-item-date small-content"><span>on: </span>'.get_the_date().'</div>' : '';
		$output .= ($author == 'true') ? '<div class="blog-post-item-author small-content"><span>by: </span>'.get_the_author_link().'</div>' : '';		
		$output .= '</div>';							
		
		$output .= '<div class="clear"></div></div></li>';
	}
	$output .= '</ul></div>';
	
	wp_reset_query();
	return $output;
}


class theme_popular_posts extends WP_Widget {
	function theme_popular_posts() {
		$widget_ops = array('classname' => 'theme_popular_posts', 'description' => __('Show your popular posts.', THEME_SLUG));
		$this->WP_Widget('theme_popular_posts', __(THEME_NAME.' - Popular Posts', THEME_SLUG), $widget_ops);
	}

	function widget($args, $instance){
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		$posts = $instance['posts'];
		$stitle = ($instance['stitle']) ? "true" : "false";
		$category = $instance['category'] ? 'true' : 'false';
		$author = $instance['author'] ? 'true' : 'false';
		$date = $instance['date'] ? 'true' : 'false';
		$excerpt = $instance['excerpt'] ? 'true' : 'false';
		$excerpt_size = $instance['excerpt_size'];
		$size = $instance['size'];
		$image_box = $instance['image_box'];
		$shadow = $instance['shadow'];
			
		global $post;
		$myposts = get_posts('numberposts='.$posts.'&offset=0&orderby=comment_count');
		
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
			
		echo theme_blog_posts(array('count'=>$posts, 'orderby'=>"comment_count", 'box'=>$image_box, 'shadow'=>$shadow, 'size'=>$size, 'title'=>$stitle, 'excerpt'=>$excerpt, 'excerpt_size'=>$excerpt_size, 'category'=>$category, 'date'=>$date, 'author'=>$author));
	
		echo $after_widget;
	}

	function upcategory($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['posts'] = $new_instance['posts'];
		$instance['category'] = !empty($new_instance['category']) ? 1 : 0;
		$instance['date'] = !empty($new_instance['date']) ? 1 : 0;
		$instance['author'] = !empty($new_instance['author']) ? 1 : 0;
		$instance['size'] = trim($new_instance['size']);
		$instance['stitle'] = (trim($new_instance['stitle'])) ? 1 : 0;
		$instance['excerpt'] = !empty($new_instance['excerpt']) ? 1 : 0;
		$instance['excerpt_size'] = trim($new_instance['excerpt_size']);
		$instance['image_box'] = $new_instance['image_box'];
		$instance['shadow'] = $new_instance['shadow'];
		return $instance;
	}

	function form($instance){
		
		$date = isset($instance['date']) ? (bool) $instance['date'] :false;
		$category = isset($instance['category']) ? (bool) $instance['category'] :false;
		$author = isset($instance['author']) ? (bool) $instance['author'] :false;
		$excerpt = isset($instance['excerpt']) ? (bool) $instance['excerpt'] :false;
		$size = $instance['size'];
		$excerpt_size = $instance['excerpt_size'];
		$stitle = ($instance['stitle']) ? 1 : 0;
		$image_box = $instance['image_box'];
		$shadow = $instance['shadow'];
		
?>	
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of Posts:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" type="text" value="<?php echo $instance['posts']; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('size'); ?>"><?php _e( 'Thumbnail:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
			<option value="" <?php echo ($size=='small')?'selected':''; ?>>None</option>
			<option value="small" <?php echo ($size=='small')?'selected':''; ?>>Small</option>
			<option value="medium" <?php echo ($size=='medium')?'selected':''; ?>>Medium</option>
			<option value="large" <?php echo ($size=='large')?'selected':''; ?>>Large</option>
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('image_box'); ?>"><?php _e( 'Image Box:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('image_box'); ?>" name="<?php echo $this->get_field_name('image_box'); ?>">
			<?php foreach($GLOBALS['image_boxes'] as $key=>$value) { echo '<option value="'.$key.'" '.selected($image_box, $key).'>'.$value.'</option>'; } ?>
		</select></p>		
		
		<p><label for="<?php echo $this->get_field_id('shadow'); ?>"><?php _e( 'Shadow:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('shadow'); ?>" name="<?php echo $this->get_field_name('shadow'); ?>">
			<?php foreach($GLOBALS['shadow_styles'] as $key=>$value) { echo '<option value="'.$key.'" '.selected($shadow, $key, false).'>'.$value.'</option>'; } ?>
		</select></p>
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('stitle'); ?>" name="<?php echo $this->get_field_name('stitle'); ?>"<?php checked( $stitle ); ?> />
		<label for="<?php echo $this->get_field_id('stitle'); ?>"><?php _e( 'Show title' , THEME_SLUG); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>"<?php checked( $date ); ?> />
		<label for="<?php echo $this->get_field_id('date'); ?>"><?php _e( 'Show date', THEME_SLUG ); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>"<?php checked( $category ); ?> />
		<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e( 'Show post category', THEME_SLUG ); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>"<?php checked( $author ); ?> />
		<label for="<?php echo $this->get_field_id('author'); ?>"><?php _e( 'Show author' , THEME_SLUG); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>"<?php checked( $excerpt ); ?> />
		<label for="<?php echo $this->get_field_id('excerpt'); ?>"><?php _e( 'Show excerpt' , THEME_SLUG); ?></label><br /><br />
		
		<p><label for="<?php echo $this->get_field_id('excerpt_size'); ?>"><?php _e('Excerpt character limit:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('excerpt_size'); ?>" name="<?php echo $this->get_field_name('excerpt_size'); ?>" type="text" value="<?php echo $instance['excerpt_size']; ?>" /></p>		
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("theme_popular_posts");'));


class theme_recent_posts extends WP_Widget {
	function theme_recent_posts() {
		$widget_ops = array('classname' => 'theme_recent_posts', 'description' => __('Show your recent posts.', THEME_SLUG));
		$this->WP_Widget('theme_recent_posts', __(THEME_NAME.' - Recent Posts', THEME_SLUG), $widget_ops);
	}

	function widget($args, $instance){
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		$posts = $instance['posts'];
		$stitle = !empty($instance['stitle']) ? "true" : "false";
		$category = !empty($instance['category']) ? 'true' : 'false';
		$author = !empty($instance['author']) ? 'true' : 'false';
		$date = !empty($instance['date']) ? 'true' : 'false';
		$excerpt = !empty($instance['excerpt']) ? 'true' : 'false';
		$excerpt_size = $instance['excerpt_size'];
		$size = $instance['size'];
		$image_box = $instance['image_box'];
		$shadow = $instance['shadow'];
			
		global $post;
		$myposts = get_posts('numberposts='.$posts.'&offset=0&orderby=comment_count');
		
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
			
		echo theme_blog_posts(array('count'=>$posts, 'orderby'=>"post_date", 'box'=>$image_box, 'shadow'=>$shadow, 'size'=>$size, 'title'=>$stitle, 'excerpt'=>$excerpt, 'excerpt_size'=>$excerpt_size, 'category'=>$category, 'date'=>$date, 'author'=>$author));
	
		echo $after_widget;
	}

	function upcategory($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['posts'] = $new_instance['posts'];
		$instance['category'] = !empty($new_instance['category']) ? 1 : 0;
		$instance['date'] = !empty($new_instance['date']) ? 1 : 0;
		$instance['author'] = !empty($new_instance['author']) ? 1 : 0;
		$instance['size'] = trim($new_instance['size']);
		$instance['stitle'] = (trim($new_instance['stitle'])) ? 1 : 0;
		$instance['excerpt'] = !empty($new_instance['excerpt']) ? 1 : 0;
		$instance['excerpt_size'] = trim($new_instance['excerpt_size']);
		$instance['image_box'] = $new_instance['image_box'];
		$instance['shadow'] = $new_instance['shadow'];
		return $instance;
	}

	function form($instance){
		
		$date = isset($instance['date']) ? (bool) $instance['date'] :false;
		$category = isset($instance['category']) ? (bool) $instance['category'] :false;
		$author = isset($instance['author']) ? (bool) $instance['author'] :false;
		$excerpt = isset($instance['excerpt']) ? (bool) $instance['excerpt'] :false;
		$size = $instance['size'];
		$excerpt_size = $instance['excerpt_size'];
		$stitle = ($instance['stitle']) ? 1 : 0;
		$image_box = $instance['image_box'];
		$shadow = $instance['shadow'];
		
?>	
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of Posts:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" type="text" value="<?php echo $instance['posts']; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('size'); ?>"><?php _e( 'Thumbnail:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
			<option value="" <?php echo ($size=='small')?'selected':''; ?>>None</option>
			<option value="small" <?php echo ($size=='small')?'selected':''; ?>>Small</option>
			<option value="medium" <?php echo ($size=='medium')?'selected':''; ?>>Medium</option>
			<option value="large" <?php echo ($size=='large')?'selected':''; ?>>Large</option>
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('image_box'); ?>"><?php _e( 'Image Box:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('image_box'); ?>" name="<?php echo $this->get_field_name('image_box'); ?>">
			<?php foreach($GLOBALS['image_boxes'] as $key=>$value) { echo '<option value="'.$key.'" '.selected($image_box, $key).'>'.$value.'</option>'; } ?>
		</select></p>		
		
		<p><label for="<?php echo $this->get_field_id('shadow'); ?>"><?php _e( 'Shadow:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('shadow'); ?>" name="<?php echo $this->get_field_name('shadow'); ?>">
			<?php foreach($GLOBALS['shadow_styles'] as $key=>$value) { echo '<option value="'.$key.'" '.selected($shadow, $key, false).'>'.$value.'</option>'; } ?>
		</select></p>
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('stitle'); ?>" name="<?php echo $this->get_field_name('stitle'); ?>"<?php checked( $stitle ); ?> />
		<label for="<?php echo $this->get_field_id('stitle'); ?>"><?php _e( 'Show title' , THEME_SLUG); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>"<?php checked( $date ); ?> />
		<label for="<?php echo $this->get_field_id('date'); ?>"><?php _e( 'Show date', THEME_SLUG ); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>"<?php checked( $category ); ?> />
		<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e( 'Show post category', THEME_SLUG ); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>"<?php checked( $author ); ?> />
		<label for="<?php echo $this->get_field_id('author'); ?>"><?php _e( 'Show author' , THEME_SLUG); ?></label><br />
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>"<?php checked( $excerpt ); ?> />
		<label for="<?php echo $this->get_field_id('excerpt'); ?>"><?php _e( 'Show excerpt' , THEME_SLUG); ?></label><br /><br />
		
		<p><label for="<?php echo $this->get_field_id('excerpt_size'); ?>"><?php _e('Excerpt character limit:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('excerpt_size'); ?>" name="<?php echo $this->get_field_name('excerpt_size'); ?>" type="text" value="<?php echo $instance['excerpt_size']; ?>" /></p>		
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("theme_recent_posts");'));


function theme_sc_popular_posts($atts) {
	extract(shortcode_atts(array(
		'count' => "5",
  		'cat' => "",
 		'image_box' => "",
  		'shadow' => "",
		'size' => "",
  		'title' => "",
		'excerpt' => "",
  		'excerpt_size' => "100",
 		'category' => "",
		'date' => "",
 		'author' => "",
	), $atts));
	
	return theme_blog_posts(array('count'=>$count, 'orderby'=>"comment_count", 'box'=>$image_box, 'cat'=>$cat, 'shadow'=>$shadow, 'size'=>$size, 'title'=>$title, 'excerpt'=>$excerpt, 'excerpt_size'=>$excerpt_size, 'category'=>$category, 'date'=>$date, 'author'=>$author));
}
add_shortcode('popular_posts', 'theme_sc_popular_posts');


function theme_sc_recent_posts($atts) {
	extract(shortcode_atts(array(
		'count' => "5",
  		'cat' => "",
 		'image_box' => "",
  		'shadow' => "",
		'size' => "",
  		'title' => "",
		'excerpt' => "",
  		'excerpt_size' => "100",
 		'category' => "",
		'date' => "",
 		'author' => "",
	), $atts));
	
	return theme_blog_posts(array('count'=>$count, 'orderby'=>"post_date", 'box'=>$image_box, 'cat'=>$cat, 'shadow'=>$shadow, 'size'=>$size, 'title'=>$title, 'excerpt'=>$excerpt, 'excerpt_size'=>$excerpt_size, 'category'=>$category, 'date'=>$date, 'author'=>$author));
}
add_shortcode('recent_posts', 'theme_sc_recent_posts');
