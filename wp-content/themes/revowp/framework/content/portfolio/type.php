<?php

if ( !class_exists('Portfolio_type') ){
	
	class Portfolio_type{
	
		var $post_type_id;
	
		function __construct(){
			$this->post_type_id = "portfolio";
			$this->_register_post_type();		

		}
				
		function _register_post_type(){
			register_post_type('portfolio', array(
				'labels' => array(
					'name' => 'Portfolio',
					'singular_name' => 'Portfolio',
					'add_new' => 'Add New',
					'add_new_item' => 'Add New Portfolio Item',
					'edit_item' => 'Edit Portfolio Item',
					'new_item' => 'New Portfolio Item',
					'view_item' => 'View Portfolio Item',
					'search_items' => 'Search Portfolio Items',
					'not_found' =>  'No portfolio item found',
					'not_found_in_trash' => 'No portfolio items found in Trash', 
					'parent_item_colon' => '',
					'menu_name' => 'Portfolio',
				),
				'singular_label' => 'portfolio',
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'show_in_menu' => ((get_option(THEME_SLUG.'_is_dashboard_locked') != 'true' || (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true' && get_option(THEME_SLUG.'_admin_menu_portfolio') != 'false')) ? true : false),
				'capability_type' => 'page',
				'hierarchical' => false,
				'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
				'has_archive' => true,
				'rewrite' => array( 'slug' => 'portfolio_item', 'with_front' => true, 'pages' => true, 'feeds'=>false ),
				'query_var' => false,
				'can_export' => true,
				'show_in_nav_menus' => true,
				'menu_position' => 103,
			));

			register_taxonomy('portfolio_category','portfolio',array(
				'hierarchical' => true,
				'labels' => array(
					'name' =>  'Portfolio Categories',
					'singular_name' =>  'Portfolio Category',
					'search_items' =>   'Search Portfolio Categories',
					'popular_items' =>  'Popular Portfolio Categories',
					'all_items' =>  'All Portfolio Categories',
					'parent_item' => null,
					'parent_item_colon' => null,
					'edit_item' =>  'Edit Portfolio Category', 
					'update_item' =>  'Update Portfolio Category',
					'add_new_item' =>  'Add New Portfolio Category',
					'new_item_name' =>  'New Portfolio Category Name',
					'separate_items_with_commas' =>  'Separate Portfolio Category with commas',
					'add_or_remove_items' =>  'Add or remove Portfolio Category',
					'choose_from_most_used' =>  'Choose from the most used Portfolio Category',
					'menu_name' =>  'Categories',
				),
				'public' => true,
				'show_in_nav_menus' => false,
				'show_ui' => true,
				'show_tagcloud' => false,
				'query_var' => false,
				'rewrite' => false,
			));	
			
			if (is_admin()){
				// remove autosave
				add_filter('admin_init',array(&$this,'remove_autosave'));
				
				// remove quick edit actions
				add_filter('post_row_actions',  array(&$this,'_custom_remove_action'), 10, 2 );
				
				// manage the custom columns
				add_filter('manage_edit-'.$this->post_type_id.'_columns', array(&$this,'_portfolio_custom_columns'));
				add_action('manage_'.$this->post_type_id.'_posts_custom_column', array(&$this,'_portfolio_columns_content'), 10, 2);
			
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
			add_meta_box('postimagediv', 'Portfolio Thumbnail',  array(&$this,'_thumbnail_meta_box'), $this->post_type_id, 'side', 'high');
		}
		
		function _thumbnail_meta_box() {
			global $post;
			$thumbnail_id = get_post_meta( $post->ID, '_thumbnail_id', true );
			echo $this->_wp_post_thumbnail_html( $thumbnail_id );
		}
		
		function _wp_post_thumbnail_html( $thumbnail_id = NULL ) {
			global $content_width, $_wp_additional_image_sizes, $post_ID;
			$set_thumbnail_link = '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Set portfolio image' ) . '" href="' . esc_url( get_upload_iframe_src('image') ) . '" id="set-post-thumbnail" class="thickbox">%s</a></p>';
			$content = sprintf($set_thumbnail_link, esc_html__( 'Set thumbnail' ));

			if ( $thumbnail_id && get_post( $thumbnail_id ) ) {
				$old_content_width = $content_width;
				$content_width = 266;
				if ( !isset( $_wp_additional_image_sizes['post-thumbnail'] ) )
					$thumbnail_html = wp_get_attachment_image( $thumbnail_id, array($content_width, $content_width ) );
				else
					$thumbnail_html = wp_get_attachment_image( $thumbnail_id, 'post-thumbnail' );
				if ( !empty( $thumbnail_html ) ) {
					$ajax_nonce = wp_create_nonce( "set_post_thumbnail-$post_ID" );
					$content = sprintf($set_thumbnail_link, $thumbnail_html);
					$content .= '<p class="hide-if-no-js"><a href="#" id="remove-post-thumbnail" onclick="WPRemoveThumbnail(\'' . $ajax_nonce . '\');return false;">' . esc_html__( 'Remove thumbnail' ) . '</a></p>';
				}
				$content_width = $old_content_width;
			}

			return apply_filters( 'admin_post_thumbnail_html', $content );
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
				1 => 'Portfolio item updated.',
				2 => 'Custom field updated.',
				3 => 'Custom field deleted.',
				4 => 'Portfolio item updated.',
				5 => isset($_GET['revision']) ? sprintf( 'Portfolio item restored to revision from %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
				6 => 'Portfolio item published',
				7 => 'Portfolio item saved.',
				8 => 'Portfolio item submitted.',
				9 => 'Portfolio item scheduled.',
				10 => 'Portfolio item draft updated.',
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
		
		function _portfolio_custom_columns($portfolio_columns){
			$new_columns['cb'] = '<input type="checkbox" />';
			$new_columns['title'] = 'Item Name';
			$new_columns['portfolio_categories'] = 'Categories';
			$new_columns['date'] = 'Date';
			$new_columns['portfolio_thumbnail'] = 'Thumbnail';
			$new_columns['menu_order'] = 'Order';
			return $new_columns;
		}
		
		function _portfolio_columns_content($column){
			global $post;
		
			switch ($column){
				case "portfolio_categories":
					$terms = get_the_terms($post->ID, 'portfolio_category');
					
					if (! empty($terms)) {
						foreach($terms as $t)
							$output[] = "<a href='edit.php?post_type=portfolio&portfolio_category=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'portfolio_category', 'display')) . "</a>";
						$output = implode(', ', $output);
					} else {
						$t = get_taxonomy('portfolio_category');
						$output = "No $t->label";
					}
					
					echo $output;
					break;
			
				case 'portfolio_thumbnail':
					the_post_thumbnail('thumbnail');
					break;
				case 'menu_order':
					echo $post->menu_order;
					break;
			} 
		}
		
		function _context_fixer() { 
			if ( get_query_var( 'post_type' ) == 'portfolio' ) {
				global $wp_query;
				$wp_query->is_home = false;
			}
			if ( get_query_var( 'taxonomy' ) == 'portfolio_category' ) {
				global $wp_query;
				$wp_query->is_tax = true;
			}
		}
	}
}

if ( !function_exists('init_portfolio_type')){
	
	function init_portfolio_type(){
		if ( class_exists('Portfolio_type')){
			$portfolio_type = new Portfolio_type; 
		}
	}
}

add_action( 'init', 'init_portfolio_type', 0 );
