<?php

/***** Categories *****/

class theme_custom_cats extends WP_Widget {

	function theme_custom_cats() {
		$widget_ops = array( 'classname' => 'widget_categories', 'description' => __( "A list of blog categories" , THEME_SLUG) );
		$this->WP_Widget('categories', __(THEME_NAME.' - Blog Categories', THEME_SLUG), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Categories' , THEME_SLUG) : $instance['title'], $instance, $this->id_base);
		$c = $instance['count'] ? '1' : '0';

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
			
			$cat_args = array('orderby' => 'name', 'exclude' => '', 'title_li' => '', 'show_count' => $c, 'hierarchical' => true);
			
?>
		<div id="cat-nav"><ul class="categories-widget">
<?php
		$cat_args['title_li'] = '';
		wp_list_categories(apply_filters('widget_categories_args', $cat_args));
?>
		</ul></div>
<?php
		
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = $new_instance['count'] ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {
		
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' , THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts' , THEME_SLUG); ?></label><br />

<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("theme_custom_cats");'));

?>