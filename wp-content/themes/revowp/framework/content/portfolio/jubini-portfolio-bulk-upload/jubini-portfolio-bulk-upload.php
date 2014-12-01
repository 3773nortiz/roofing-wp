<?php

class JB_Portfolio_Bulk_Upload {

    function __construct() {

        add_action('admin_enqueue_scripts', array($this, 'assets'));
        add_action('admin_menu', array(&$this, 'admin_menu'));
    }

    function assets() {

        if (! ('portfolio' == get_current_screen()->post_type))
            return;

		wp_enqueue_media();
        wp_register_script('pbu-media', THEME_FRAMEWORK.'/content/portfolio/jubini-portfolio-bulk-upload/js/media.js', array('jquery'), '1.0.0', true);
        wp_localize_script('pbu-media', 'pbu_nmp_media', array('title' => __('Upload or Choose Your Portfolio Images', THEME_SLUG), 'button' => __('Insert Images', THEME_SLUG)));
        wp_enqueue_script('pbu-media');
		
		wp_enqueue_script('mustache-js', THEME_FRAMEWORK.'/content/portfolio/jubini-portfolio-bulk-upload/js/mustache.js', array('jquery'), '1.0.0', true);
    }
	
	function admin_menu(){
		add_submenu_page('edit.php?post_type=portfolio', __('Bulk Upload', THEME_SLUG), __('Bulk Upload', THEME_SLUG), 'administrator', 'bulk-upload', array(&$this, 'bulk_upload'));
	}

    function bulk_upload() {
		
		echo '<div class="wrap">';
		screen_icon();
		echo '<h2>'.__('Bulk Upload', THEME_SLUG).'</h2><br /><br />';

		if($_POST['type']){
			$i = 0;
			foreach ($_POST['attachment'] as $attachment) {
				if ($attachment) {
					$i++;
										
					$item = array(
									'post_type' 	=> 	'portfolio',
									'post_status' 	=> 	'publish',
								);
					
					$item['post_title'] = $_POST['title'] ? $_POST['title'].' '.$i : str_replace('-', ' ', $_POST['file_title'][$attachment]);
						
					$item['menu_order'] = $_POST['menu_order'] ? (int)$_POST['menu_order']+$i-1 : (int)$_POST['order'][$attachment];	
		
		
					if (is_array($_POST['cat']))
						$item['tax_input']['portfolio_category'] = $_POST['cat'];
						
					$post_id = wp_insert_post($item);
					
					update_post_meta($post_id, '_thumbnail_id', $attachment);
					
					if ($_POST['url'][$attachment])
						update_post_meta($post_id, THEME_SLUG."_portfolio_url", $_POST['url'][$attachment]);
						
					update_post_meta($post_id, THEME_SLUG."_portfolio_type", $_POST['type']);
					update_post_meta($post_id, THEME_SLUG."_portfolio_lightbox", "true");
				}
			}
			echo '<div id="message" class="updated fade"><p>Items Created!</p></div>';
		}

		echo '<div id="poststuff">';
		echo '<p><a href="#" class="pbu-open-media button button-primary" title="' . esc_attr__('Click Here to Upload Images', THEME_SLUG) . '">' . __('Click Here to Upload Images', THEME_SLUG) . '</a></p>';
		echo '<hr />';
		echo <<< EOH
			<script id="items_template" type="text/template">			
			<table class="items-list">
			{{#files}}
			<tr>
			<td id="file_{{id}}" style="float:left;margin:0 10px 10px 0;">
				<img src="{{url}}" width="100" title="{{title}}" alt="{{title}}" />
				<input type="hidden" name="attachment[]" value="{{id}}" />
				<input type="hidden" name="file_title[{{id}}]" value="{{title}}" />
			<//td>
			<td>URL: <input type="name" name="url[{{id}}]" class="regular-text" /></td>
			<td>Order: <input type="name" name="order[{{id}}]" class="small-text" /></td>
			{{/files}}
			</table>
			</script>
EOH;
		$categories = get_categories(array('taxonomy'=>'portfolio_category', 'hide_empty'=>0));
		
		echo '<form action="" method="POST">';
	
		echo '<table class="form-table"><tr>';
		echo '<th><label for="title">Titles</label></th>';
		echo '<td><input type="text" name="title" id="title" class="medium-text" /> <span class="description">Enter the title you want to set for portfolio items. Leave empty to use image name as title.</span></td>';
		echo '</tr><tr>';
		echo '<th><label for="first_name">Category</label></th>';
		echo '<td><select name="cat[]" multiple="multiple">';
		foreach ($categories as $category) {
		echo '<option value="'.$category->term_id.'">'.$category->name.'</option>';
		}
		echo '</select></td>';			
		echo '</tr><tr>';
		echo '<th><label for="type">Type</label></th>';
		echo '<td><select name="type"><option value="image">Image</option><option value="video">Video</option><option value="audio">Audio</option><option value="iframe">Iframe</option><option value="link">Link</option></select></td>';
		echo '</tr><tr>';
		echo '<th><label for="menu_order">Order</label></th>';
		echo '<td><input type="text" name="menu_order" id="menu_order" class="small-text" /> <span class="description">Enter the starting order of the items. This will override the individual settings.</span></td>';	
		echo '</tr></table><br />';
		echo '<div id="items"></div>';
		echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Create Portfolio Items"  /></p>';
		echo '</form>';
		echo '</div></div>';
    }

}

$JB_Portfolio_Bulk_Upload = new JB_Portfolio_Bulk_Upload();