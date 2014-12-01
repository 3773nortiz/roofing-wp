<?php

class MetaboxGenerator {

    var $info;
    var $options;

    function MetaboxGenerator($info, $options) {
        $this->info = $info;
        $this->options = $options;
        add_action('admin_menu', array(&$this, 'add_to_menu'));
		add_action('save_post', array(&$this, 'save_data'));
    }

    function add_to_menu() {

		add_meta_box( $this->info['id'], $this->info['title'], array(&$this, 'display_metabox'), $this->info['post_type'], $this->info['context'], $this->info['priority'] );		
    }
	

    function display_metabox() {
		global $post;
		
		echo '<div id="theme-metabox">';
		foreach($this->options as $value) {
			$value['current'] = get_post_meta($post->ID, $value['id'], true);
			if(!$value['current']) {
				$value['current'] = $value['std'];
			}
			echo generateField($value);
		}
		echo '</div> <!--- .theme-metabox --->';
		echo '<input type="hidden" name="'.$this->info['id'].'_noncename" id="'.$this->info['id'].'_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';	
	}
	
	function save_data($post_id){
	
		if (! isset($_POST[$this->info['id'].'_noncename'])) {
			return $post_id;
		}	

		if(!wp_verify_nonce( $_POST[$this->info['id'].'_noncename'], plugin_basename(__FILE__))) {
			return $post_id;
		}
		
		if(isset($_POST['post_type'])){
			if('page' == $_POST['post_type']) {
				if(!current_user_can('edit_page', $post_id)) {
					return $post_id;
				} else {
					if(!current_user_can('edit_post', $post_id)) {
						return $post_id;
					}
				}
			}
		}	

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}			

		foreach($this->options as $option) {
			
			if (isset($option['id'])) {			
				if($_POST[$option['id']]) {				
					$value = $_POST[$option['id']];				
				} else if ($option['type'] == 'toggle') {
					$value = 'false';
				} else {
					$value = false;
				}
				
				if ($value != get_post_meta($post_id, $option['id'], true)) {
					update_post_meta($post_id, $option['id'], $value);
				}

			}		
		}
	}
} 

?>