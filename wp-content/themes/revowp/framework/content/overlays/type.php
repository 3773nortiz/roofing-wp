<?php

if ( !class_exists('Overlay_type') ){
	
	class Overlay_type{
	
		var $post_type_id;
	
		function __construct(){
			$this->post_type_id = "overlay";
			$this->_register_post_type();		

		}
				
		function _register_post_type(){
			register_post_type('overlay', array(
				'labels' => array(
					'name' => 'Overlay',
					'singular_name' => 'Overlay',
					'add_new' => 'Add New',
					'add_new_item' => 'Add New Overlay',
					'edit_item' => 'Edit Overlay',
					'new_item' => 'New Overlay',
					'view_item' => 'View Overlay',
					'search_items' => 'Search Overlays',
					'not_found' =>  'No overlay found',
					'not_found_in_trash' => 'No overlays found in Trash', 
					'parent_item_colon' => '',
					'menu_name' => 'Overlays',
				),
				'singular_label' => 'overlay',
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => true,
				'show_ui' => true,
				'show_in_menu' => ((get_option(THEME_SLUG.'_is_dashboard_locked') != 'true' || (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true' && get_option(THEME_SLUG.'_admin_menu_overlays') != 'false')) ? true : false),
				'capability_type' => 'page',
				'hierarchical' => false,
				'supports' => array('title', 'editor', 'thumbnail'),
				'has_archive' => false,
				'rewrite' => false,
				'query_var' => false,
				'can_export' => true,
				'show_in_nav_menus' => true,
				'menu_position' => 104,	
			));

			if (is_admin()){
				// remove autosave
				add_filter('admin_init',array(&$this,'remove_autosave'));
				
				// remove quick edit actions
				add_filter('post_row_actions',  array(&$this,'_custom_remove_action'), 10, 2 );
				
				// manage the custom columns
				add_filter('manage_edit-'.$this->post_type_id.'_columns', array(&$this,'_overlay_custom_columns'));
				add_action('manage_'.$this->post_type_id.'_posts_custom_column', array(&$this,'_overlay_columns_content'), 10, 2);
			
				// do all the metaboxes
				add_action('admin_menu', array(&$this,'_custom_metaboxes'));
				add_action('do_meta_boxes', array(&$this,'_custom_featured_box'));
						
				// Status messages
				add_filter('post_updated_messages', array(&$this,'_custom_update_messages'));
										
			}
			
			add_action('template_redirect', array(&$this,'_context_fixer') );
					
		}
		
		function _custom_remove_action($actions, $post) {
		    if( $post->post_type == $this->post_type_id ) {
		        unset( $actions['inline hide-if-no-js'] );
				unset( $actions['view'] );
		    }	
		    return $actions;
		}
		
		function _custom_metaboxes(){
			remove_meta_box('slugdiv', $this->post_type_id, 'core');
		    remove_meta_box('submitdiv', $this->post_type_id, 'core');

			$this->_custom_add_metaboxes();

		}
		
		function _custom_add_metaboxes(){
			// add submit box
		 	add_meta_box('submitdiv', 'Publish', array(&$this,'_custom_post_submit_box'), $this->post_type_id, 'side','high');
		}
		
		function _custom_featured_box(){
			remove_meta_box('postimagediv', $this->post_type_id, 'side');
		}
		
		function _custom_post_submit_box($post){ 
			global $action;

			$post_type = $post->post_type;
			$post_type_object = get_post_type_object($post_type);
			$can_publish = current_user_can($post_type_object->cap->publish_posts);
		
			?>
			<div class="submitbox" id="submitpost">

				<div id="major-publishing-actions">
			
					<div id="delete-action">
					<?php
					if ( current_user_can( "delete_post", $post->ID ) ) {
						if ( !EMPTY_TRASH_DAYS )
							$delete_text = 'Delete Permanently';
						else
							$delete_text = 'Move to Trash';
						?>
					<a class="submitdelete deletion" href="<?php echo get_delete_post_link($post->ID); ?>"><?php echo $delete_text; ?></a><?php
					} ?>
					</div>

					<div id="publishing-action">
						<img src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ); ?>" id="ajax-loading" style="visibility:hidden;" alt="" />
						<?php
						if ( !in_array( $post->post_status, array('publish', 'future', 'private') ) || 0 == $post->ID ) {
							if ( $can_publish ) :
								if ( !empty($post->post_date_gmt) && time() < strtotime( $post->post_date_gmt . ' .0000' ) ) : ?>
								<input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Schedule') ?>" />
								<input name="publish" type="submit" class="button-primary" id="publish" tabindex="5" accesskey="p" value="<?php esc_attr_e('Schedule') ?>" />
						<?php	else : ?>
								<input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Publish') ?>" />
								<input name="publish" type="submit" class="button-primary" id="publish" tabindex="5" accesskey="p" value="<?php esc_attr_e('Publish') ?>" />
						<?php	endif;
							else : ?>
								<input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Submit for Review') ?>" />
								<input name="publish" type="submit" class="button-primary" id="publish" tabindex="5" accesskey="p" value="<?php esc_attr_e('Submit for Review') ?>" />
						<?php
							endif;
						} else { ?>
								<input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Update') ?>" />
								<input name="save" type="submit" class="button-primary" id="publish" tabindex="5" accesskey="p" value="<?php esc_attr_e('Update') ?>" />
						<?php
						} ?>
					</div>
		
					<div class="clear"></div>
		
				</div>
		
			</div>

			<?php
		}

		function _custom_update_messages($messages)	{
			global $post;
			global $post_ID;
		
			$messages[$this->post_type_id] = array(
				0 => '', 
				1 => 'Overlay updated.',
				2 => 'Custom field updated.',
				3 => 'Custom field deleted.',
				4 => 'Overlay item updated.',
				5 => isset($_GET['revision']) ? sprintf( 'Overlay restored to revision from %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
				6 => 'Overlay published',
				7 => 'Overlay saved.',
				8 => 'Overlay submitted.',
				9 => 'Overlay scheduled.',
				10 => 'Overlay draft updated.',
			);

			return $messages;
		
		}
	
		function remove_autosave() {
			if (!empty($_GET['post']) || (!empty($_GET['post_type']) && $_GET['post_type'] == $this->post_type_id)) {
				$post_type = '';

				if (!empty($_GET['post'])) {
					$post_type = get_post_type(intval($_GET['post']));
				}
				else if (!empty($_GET['post_type'])) {
					$post_type = $_GET['post_type'];
				}

				if (!empty($post_type) && $post_type == $this->post_type_id) 
				{
					wp_deregister_script('autosave');
				}
			}

		}

		function _overlay_custom_columns($overlay_columns){
			$new_columns['cb'] = '<input type="checkbox" />';
			$new_columns['title'] = 'Item Name';
			$new_columns['type'] = 'Type';
			$new_columns['display'] = 'Display';
			$new_columns['date'] = 'Date';
			return $new_columns;
		}
		
		function _overlay_columns_content($column){
			global $post;
		
			switch ($column){			
				case "type":
					echo ucfirst(get_post_meta($post->ID, THEME_SLUG."_overlay_type", true));
					break;
					
				case "display":
					$display = get_post_meta($post->ID, THEME_SLUG."_overlay_display", true);
					if($display == "all"){
						echo "All Site";
					}elseif($display == "blog"){
						echo "Blog";
					}elseif($display == "pages"){
						echo "<ul class='column-list'>";
						$pages = get_post_meta($post->ID, THEME_SLUG."_overlay_pages", true);
						foreach($pages as $value){
							$page = get_page($value);
							echo "<li>".$page->post_title."</li>";
						}
						echo "</ul>";
					}

					break;
			} 
		}
				
		function _context_fixer() { 
			if ( get_query_var( 'post_type' ) == 'overlay' ) {
				global $wp_query;
				$wp_query->is_home = false;
				$wp_query->is_404 = true;
				$wp_query->is_single = false;
				$wp_query->is_singular = false;
			}
		}
	}
}

if ( !function_exists('init_overlay_type')){
	
	function init_overlay_type(){
		if ( class_exists('Overlay_type')){
			$overlay_type = new Overlay_type; 
		}
	}
}

add_action( 'init', 'init_overlay_type', 0 );


?>