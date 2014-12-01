<?php

if(!is_array($theme_options)) { $theme_options = array(); }

class OptionGenerator {

    var $options;

    function OptionGenerator($options) {
        $this->options = $options;
        add_action('admin_menu', array(&$this, 'add_to_menu'));
			
		foreach ($options as $option) {
			foreach($option['options'] as $value) {
				if(isset($value['id'])){
					if(get_option($value['id']) === FALSE){
						update_option( $value['id'], $value['std'] );
					}
				}
			}
		} 
		
		add_action('admin_enqueue_scripts', array(&$this, 'theme_admin_init'));		
		add_action('admin_head', array(&$this, 'theme_admin_head'));
		add_action('wp_ajax_theme_ajax_save', array(&$this, 'theme_ajax_callback'));
		add_action('wp_ajax_theme_save_license_key', array(&$this, 'theme_ajax_save_license_key'));
		add_action('wp_ajax_theme_lock_page', array(&$this, 'theme_ajax_lock_page'));
		add_action('wp_ajax_theme_unlock_page', array(&$this, 'theme_ajax_unlock_page'));
		add_action('wp_ajax_enable_visual_editor', array(&$this, 'theme_ajax_enable_visual_editor'));
		add_action('wp_ajax_disable_visual_editor', array(&$this, 'theme_ajax_disable_visual_editor'));		
    }

    function add_to_menu() {   
		
	    add_menu_page('Theme Options - Dashboard', 'Theme Options', 'manage_options', 'theme-dashboard', array(&$this, 'dashboard'), THEME_HOME.'/framework/admin/layout/images/favi.png', 101);
		add_submenu_page('theme-dashboard', 'Theme Options - Dashboard', 'Dashboard', 'manage_options', 'theme-dashboard', array(&$this, 'dashboard'));		
		if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true') {
			add_submenu_page('theme-dashboard', 'Theme Options - White Labeling', 'White Labeling', 'manage_options', 'theme-whitelabel-settings', array(&$this, 'options_page'));		
		}
		foreach ($this->options as $option) {
			if ($option['slug'] != 'whitelabel') {
				if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true' || (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true' && get_option(THEME_SLUG.'_options_panel_'.$option['slug']) != 'false')) {			
					add_submenu_page('theme-dashboard', 'Theme Options - '.$option['name'], $option['name'], 'manage_options', 'theme-'.$option['slug'].'-settings', array(&$this, 'options_page'));
				}
			}
		}
	}

    function options_page() {
	
		echo '<script type="text/javascript">jQuery.noConflict()(function($){$(document).ready(function(){$("SELECT").selectBox();});});</script>';
		
 		$page_option = str_replace('-settings', '', str_replace('theme-', '', $_GET['page']));
		$options = $this->options;
      		
		if( isset($_REQUEST['action']) && $_REQUEST['action'] == 'Save Changes' ) {			
			foreach ($options as $option) {
				if ($page_option == $option['slug']) {
					foreach($option['options'] as $value) {		
						if($value['id']){
							update_option( $value['id'], $_REQUEST[$value['id']] );
						}
					}
				}
			}
			echo '<div class="updated"><p><strong>Theme Options saved!</strong></p></div>'; 	
		}
        
		echo '<div class="theme-wrap">';
        echo '<div id="theme-options">';  
        echo '<form method="post" id="theme-options-form">';
		echo '<input type="hidden" name="option" value="'.$page_option.'" />';
		echo '<div id="theme-options-save">';
        echo '<div class="pad">';
        echo '<p><strong>Theme Options saved!</strong></p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="theme-options-header"></div>';
        echo '<div class="theme-options-main">';		
						
        foreach ($options as $option) {
			
			if ($page_option == $option['slug']) {
				echo '<div id="'.$option['id'].'" class="theme-tab">';
				echo '<div class="pad">';
				
				echo '<h3>'.$option['name'].'</h3>';
				echo '<span class="save"><input name="action" type="submit" class="button-save" value="Save Changes" /></span>';
				echo '<div class="divider"></div>';
				
				foreach($option['options'] as $value){
					if(!isset($value['id']))
						$value['id'] = "";
					if(!isset($value['std']))
						$value['std'] = "";	
					$value['current'] = get_option( $value['id'], $value['std']);
					echo generateField($value);
				}
				
				echo '</div>';
				echo '</div>';
			}
        }

        echo '<div class="clear"></div>';
        echo '</div><!-- #theme-options-main -->';
        echo '<div class="theme-footer">';
        echo '<span class="save"><input type="submit" name="action" value="Save Changes" class="button-save" /></span>';        
        echo '<div class="clear"></div>';        
        echo '</div><!-- .theme-footer -->';
        echo '</form><!-- #theme-options-form -->';             
        echo '</div><!-- #theme-options -->';
        echo '</div><!-- .wrap -->';
    }
	
	function dashboard() {
		
		echo '<div class="theme-wrap">';
        echo '<div id="theme-options">';  
        echo '<form method="post" id="theme-options-form">';
		echo '<input type="hidden" name="option" value="'.$page_option.'" />';
		echo '<div id="theme-options-save">';
        echo '<div class="pad">';
        echo '<p><strong>Theme Options saved!</strong></p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="theme-options-header"></div>';
        echo '<div class="theme-options-main">';		

		echo '<div id="revo_dashboard" class="theme-tab">';
		echo '<div class="pad">';
		
		echo '<h3>Theme Dashboard</h3>';
		echo '<div class="divider"></div>';
		if (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true') {
			echo generateField(array( "type" => "html", "desc" => "Welcome to the Custom Framework! Customize it using the navigation on the left or buttons below.." ));
		} else {		
			echo generateField(array( "type" => "html", "desc" => "Welcome to the Custom Framework! In order to get started simply follow the steps below. Once you've completed those steps you may start customizing it using the navigation on the left or buttons below.." ));
		}
		
		echo '<ul class="theme-options-area-buttons">';
		if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true') {
			echo '<li><a class="option-btn-small" href="'.admin_url('admin.php?page=theme-whitelabel-settings').'">White Labeling</a></li>';
		}
		$options = $this->options;
		foreach ($options as $option) {
			if ($option['slug'] != 'whitelabel') {
				if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true' || (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true' && get_option(THEME_SLUG.'_options_panel_'.$option['slug']) != 'false')) {			
					echo '<li><a class="option-btn-small" href="'.admin_url('admin.php?page=theme-'.$option['slug'].'-settings').'">'.$option['name'].'</a></li>';
				}
			}
		}
		if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true' || (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true' && get_option(THEME_SLUG.'_options_panel_import-export') != 'false')) {			
			echo '<li><a class="option-btn-small" href="'.admin_url('admin.php?page=theme-import-export').'">Import / Export</a></li>';
		}
		echo '</ul>';

		if (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true') {
		
			echo '<h4 class="option-title">Initial Setup Configuration</h4>';			
			echo '<div class="theme-entry">If you need to see the initial setup configuration again simply enter your license key in the field below.</div>';
			echo '<div class="theme-entry">';
			echo '<div class="theme-label"><label for=""></label></div>';
			echo '<div class="theme-field license-key-field">';
			echo '<input name="'.THEME_SLUG."_license_key".'" type="text" value="" class="theme-input size-small" />';
			echo '<a class="option-btn-large" id="theme_unlock_page" href="#">Submit</a></div><div class="clear"></div>';
			echo '</div>';
			
		} else {
		
			echo '<h4 class="option-title"><b>Step 1</b> - Enter Your License Key And Add Domain To Whitelist</h4>';			
			echo '<div class="theme-entry">';
			echo '<div class="theme-label"><label for=""></label></div>';
			echo '<div class="theme-field license-key-field">';
			echo '<input name="'.THEME_SLUG."_license_key".'" type="text" value="'.get_option(THEME_SLUG."_license_key").'" class="theme-input size-small" />';
			echo '<a class="option-btn-large" id="save_license_key" href="#">Save</a></div><div class="clear"></div>';
			echo '<div class="button-area"><p>Get your license key and update your whitelist by logging in to <a href="http://members.revowp.com" target="_blank">http://members.revowp.com</a></p></div>';
			echo '</div>';
			echo '<br />';

			$installed_plugins = get_plugins();
		
			echo '<h4 class="option-title"><b>Step 2</b> - Install Revolution Slider <i>(optional)</i></h4>';			
			echo '<div class="theme-entry">The Revolution Slider plugin will allow you to easily create beautiful slideshows on your website. Clicking the button below will open a new window where you can install it.</div>';
			echo '<div class="theme-entry">';
			if (!isset($installed_plugins['revslider/revslider.php'])) {
				echo '<div class="button-area"><a class="option-btn-large" href="'.admin_url('themes.php?page=install-required-plugins').'" target="_blank">Install Slider</a></div>';
			} else {
				echo '<div class="button-area"><a class="option-btn-large" href="'.admin_url('plugins.php').'" target="_blank">Install Slider</a></div>';
			}
			echo '</div>';
			echo '<br /><br />';
			
			echo '<h4 class="option-title"><b>Step 3</b> - Enable/Disable Visual Editor <i>(optional)</i></h4>';			
			echo '<div class="theme-entry">The Visual Editor allows you to easily generate theme designs with the click of a button when viewing the frontend of your website. Once you have a theme generated you will need to disable this before putting the site liv.</div>';
			echo '<div class="theme-entry">';
			if (theme_get_option(THEME_SLUG.'_revo_visual_editor') == 'true') {
				echo '<div class="button-area"><a class="option-btn-large" href="#" id="disable_visual_editor">Disable Editor</a></div>';
			} else {
				echo '<div class="button-area"><a class="option-btn-large" href="#" id="enable_visual_editor">Enable Editor</a></div>';
			}
			echo '</div>';
			echo '<br /><br />';
			
			echo '<h4 class="option-title"><b>Step 4</b> - Import Theme File <i>(optional)</i></h4>';			
			echo '<div class="theme-entry">If you\'ve already generated a theme design and want to import it you can do so on the Import/Export page. Clicking the button below will open that section in a new window.</div>';
			echo '<div class="theme-entry">';
			echo '<div class="button-area"><a class="option-btn-large" href="'.admin_url('admin.php?page=theme-import-export').'" target="_blank">Import Theme</a></div>';
			echo '</div>';
			echo '<br /><br />';
			
			echo '<h4 class="option-title"><b>Step 5</b> - Install Default Content <i>(optional)</i></h4>';			
			echo '<div class="theme-entry">Installing the default content will create several content filled pages in Wordpress that you can use as a starting point in building your website. For more information follow the instructions in the <a href="http://revowp.com/doc" target="_blank">Documentation</a>.</div>';
			echo '<div class="theme-entry">';
			echo '<div class="button-area"><a class="option-btn-large" href="'.admin_url('admin.php?import=wordpress').'" target="_blank">Install Content</a></div>';
			echo '</div>';
			echo '<br /><br />';
			
			echo '<h4 class="option-title"><b>Step 6</b> - Activate White Label Lock <i>(optional)</i></h4>';			
			echo '<div class="theme-entry">If you are building this website for a client and would like to hide this options page click the button below. With this page locked you will need to enter your license key any time you want to access this page.</div>';
			echo '<div class="theme-entry">';
			echo '<div class="button-area"><a class="option-btn-large" href="#" id="theme_lock_page">Lock Page</a></div>';
			echo '</div>';
			echo '<br /><br />';		
			
			echo '<h4 class="option-title"><b>Step 7</b> - View The Tutorials / Documentation <i>(optional)</i></h4><br />';			
			echo '<div class="theme-entry">';
			echo '<div class="button-area-left"><a class="option-btn-large" href="http://revowp.com/video" target="_blank">Video Tutorial</a></div>';
			echo '<div class="button-area-right"><a class="option-btn-large" href="http://revowp.com/doc" target="_blank">Documentation</a></div>';
			echo '<div class="clear"></div></div>';
			echo '<br /><br />';

			echo '<h4 class="option-title"><b>Step 8</b> - Get Support <i>(optional)</i></h4>';			
			echo '<div class="theme-entry">If you are having problems using the theme and need help you can either access our community forum or submit a support request using the buttons below.</div>';
			echo '<div class="theme-entry">';
			echo '<div class="button-area-left"><a class="option-btn-large" href="http://revowp.com/forum" target="_blank">Access Forum</a></div>';
			echo '<div class="button-area-right"><a class="option-btn-large" href="http://members.revowp.com" target="_blank">Support Ticket</a></div>';
			echo '<div class="clear"></div></div>';
		
		}
		echo '</div>';
		echo '</div>';

        echo '<div class="clear"></div>';
        echo '</div><!-- #theme-options-main -->';
        echo '<div class="theme-footer">';
        echo '<span class="save"></span>';        
        echo '<div class="clear"></div>';        
        echo '</div><!-- .theme-footer -->';
        echo '</form><!-- #theme-options-form -->';             
        echo '</div><!-- #theme-options -->';
        echo '</div><!-- .wrap -->';
	}
	
	function whitelabel() {
	
		echo '<div class="theme-wrap">';
        echo '<div id="theme-options">';  
        echo '<form method="post" id="theme-options-form">';
		echo '<input type="hidden" name="option" value="'.$page_option.'" />';
		echo '<div id="theme-options-save">';
        echo '<div class="pad">';
        echo '<p><strong>Theme Options saved!</strong></p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="theme-options-header"></div>';
        echo '<div class="theme-options-main">';		

		echo '<div id="revo_dashboard" class="theme-tab">';
		echo '<div class="pad">';
		
		echo '<h3>Theme White-Labeling</h3>';
		echo '<div class="divider"></div>';
		echo generateField(array( "type" => "html", "desc" => "Welcome to the Custom Framework! Use this area to white-label the theme." ));
		
		if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true') {
				
		
		}
		echo '</div>';
		echo '</div>';

        echo '<div class="clear"></div>';
        echo '</div><!-- #theme-options-main -->';
        echo '<div class="theme-footer">';
        echo '<span class="save"></span>';        
        echo '<div class="clear"></div>';        
        echo '</div><!-- .theme-footer -->';
        echo '</form><!-- #theme-options-form -->';             
        echo '</div><!-- #theme-options -->';
        echo '</div><!-- .wrap -->';	
	}
	
	function theme_admin_init() {
		wp_enqueue_media();
	}
	
	function theme_admin_head() {
?>
<script type="text/javascript">	

jQuery.noConflict()(function($){		
	$(document).ready(function(){		

		$.fn.positionit = function () {
			this.animate({"top":( $(window).height() - this.height() - 200 ) / 2+$(window).scrollTop() + "px"},100);
			this.css("left", 250 );
			return this;
		}				
		$('#theme-options-save').positionit();
		$(window).scroll(function() { 				
			$('#theme-options-save').positionit();
		});
	
		$('#theme-options-form').submit(function(){
								
			$('input.button-save').val('Saving...');			
			function updated_values() {						
				var serialized_values = $("#theme-options-form").serialize();						
				return serialized_values;
			}					
			var serialized_return = updated_values();
						
			var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';					

			var data = {
				action: 'theme_ajax_save',
				data: serialized_return
			};					
			
			$.post(ajax_url, data, function(response) {				
				var success = $('#theme-options-save');				
				success.fadeIn();
				window.setTimeout(function(){
				   success.fadeOut();   	
				}, 2000);
				
				$('input.button-save').val('Save Changes');		
						
<?php
		foreach($this->options as $option){
			foreach($option['options'] as $value) {
				if($value['type'] == 'upload'){
				
?>
				var image_url = $('#<?php echo $value['id']; ?>').val();
				
				$('#<?php echo $value['id']; ?>_image img').remove();
				$('#<?php echo $value['id']; ?>_image .warning').remove();
				$('#<?php echo $value['id']; ?>_image').hide();
				
				if(image_url){							
					var uploaded_image_display = '<img src="' + image_url + '" />';							
					$('#<?php echo $value['id']; ?>_image').prepend(uploaded_image_display);
					$('#<?php echo $value['id']; ?>_image').show();
				}
<?php
				}
			}
		}
?>					
			});					
			return false; 					
		});		

		$('#save_license_key').click(function(){
								
			var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';					
			var data = {
				action: 'theme_save_license_key',
				data: $('input[name=<?php echo THEME_SLUG; ?>_license_key]').val()
			};					
			
			$.post(ajax_url, data, function(response) {				
				var success = $('#theme-options-save');				
				success.fadeIn();
				window.setTimeout(function(){
				   success.fadeOut();   	
				}, 2000);
									
			});					
			return false; 					
		});	
		
		$('#disable_visual_editor').click(function(){
								
			var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';					
			var data = {
				action: 'disable_visual_editor'
			};					
			
			$.post(ajax_url, data, function(response) {				
				location.reload();
			});					
			return false; 					
		});	
		
		$('#enable_visual_editor').click(function(){
								
			var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';					
			var data = {
				action: 'enable_visual_editor'
			};					
			
			$.post(ajax_url, data, function(response) {				
				location.reload();
			});					
			return false; 					
		});	

		$('#theme_lock_page').click(function(){
								
			var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';					
			var data = {
				action: 'theme_lock_page'
			};					
			
			$.post(ajax_url, data, function(response) {				
				location.reload();
			});					
			return false; 					
		});		

		$('#theme_unlock_page').click(function(){
								
			var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';					
			var data = {
				action: 'theme_unlock_page',
				data: $('input[name=<?php echo THEME_SLUG; ?>_license_key]').val()
			};					
			
			$.post(ajax_url, data, function(response) {	
				console.log(response);
				if (response == 1) {
					location.reload();
				} else {
				
				}							
			});					
			return false; 					
		});
	});
});	
</script>
<?php
	}

	function theme_ajax_callback() {
		
		$options = $this->options;
		$data = $_POST['data'];
		parse_str($data, $values);		
		
		foreach ($options as $option) {
			if ($values['option'] == $option['slug']) {
				foreach($option['options'] as $value) {
					if($value['id']){
						update_option( $value['id'], $values[$value['id']] );
					}
				}
			}
		}
	}
	
	function theme_ajax_save_license_key() {
		
		$data = $_POST['data'];
		update_option( THEME_SLUG."_license_key", $data );
	}
	
	function theme_ajax_lock_page() {
		
		update_option( THEME_SLUG."_is_dashboard_locked", "true" );
	}
	
	function theme_ajax_enable_visual_editor() {
		
		update_option( THEME_SLUG."_revo_visual_editor", "true" );
	}
	
	function theme_ajax_disable_visual_editor() {
		
		update_option( THEME_SLUG."_revo_visual_editor", "false" );
	}
	
	function theme_ajax_unlock_page() {
		
		$data = $_POST['data'];
		if ($data) {
			if (get_option(THEME_SLUG."_license_key") == $data) {
				echo "1";
				update_option( THEME_SLUG."_is_dashboard_locked", "" );
			} else {
				echo "0";
			}
		} else {
			echo "0";
		}
		die();
	}

} 

$theme_option_settings = new OptionGenerator($theme_options);
