<?php

if(!is_array($theme_options)) { $theme_options = array(); }

class OptionImportExport {

    var $options;

    function OptionImportExport($options) {
	
        $this->options = $options;
        add_action('admin_menu', array(&$this, 'add_to_menu'));
		add_action('template_redirect', array(&$this, 'admin_redirect_download_files'));
		add_filter('init', array(&$this, 'add_query_var_vars'));
    }

    function add_to_menu() {		
		if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true' || (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true' && get_option(THEME_SLUG.'_options_panel_import-export') != 'false')) {			
			add_submenu_page('theme-dashboard', 'Revo Options - Import / Export', 'Import / Export', 'edit_pages', 'theme-import-export', array(&$this, 'import_export'));
		}
	}
	
	function add_query_var_vars() {
		global $wp;
		$wp->add_query_var('export_theme_options');
	}
	
	function import_export() {
		
		$message = '';
		if($_FILES['file']['type']){
			if($_FILES['file']['type'] != "text/plain"){
				$message = '<div id="message" class="error fade"><p>Not a valid file.</p></div>';
			}elseif(is_uploaded_file($_FILES['file']['tmp_name'])) {
				$import_code = file_get_contents($_FILES['file']['tmp_name']);
				$import_code = str_replace("<!*!* START export Code !*!*>\n","",$import_code);
				$import_code = str_replace("\n<!*!* END export Code !*!*>","",$import_code);
				$import_code = base64_decode($import_code);
				$import_code = unserialize($import_code);
				$settings = $this->import($import_code);
			//	print_r($settings['no']);
				$message  = '<div id="message" class="updated fade"><p>';
				$message .= (int) count($settings['yes']).' Theme options imported successfully.';
				if (count($settings['no'])) {
					$message .= ' Following '.(int)count($settings['no']).' options were not found/compatible from the import file.<br />';
					for($i=0; $i<count($settings['no']); $i++) $message .= $settings['no'][$i]['name'].' - '.$settings['no'][$i]['value'].'<br />';
				}
				$message .= ' </p></div>';
			}
		}
		
		echo '<div class="theme-wrap">';
        echo '<div id="theme-options">';  
		echo '<div id="theme-options-save">';
        echo '<div class="pad">';
        echo '<p><strong>Theme Options saved!</strong></p>';
        echo '</div>';
        echo '</div>';
        echo '<div class="theme-options-header"></div>';
        echo '<div class="theme-options-main">';
		
		echo '<div class="theme-tab">';
		echo '<div class="pad">';

		echo '<h3>Import/Export Theme Options</h3>';		
		echo '<div class="divider"></div>';
		
		echo $message ? $message : '';
		
		echo '<br /><br /><br />';
		
		echo '<h4 class="option-title">Export Options</h4><br />';			
		echo '<div class="theme-entry">';
		echo '<a class="tooltip"><span>Click this button to download a txt file that contains all your control panel settings. NOTE: this does NOT save your page/post content.</span></a>';
		echo '<div class="theme-label"><label for="">Export control panel settings:</label></div><!-- .theme-label -->';
		echo '<div class="theme-field">';
		echo '<a class="download-btn" href="'.add_query_arg(array('export_theme_options' => 'safe_download', 'nonce' => wp_create_nonce(md5(site_url()))), site_url()).'">Download File</a>';
		echo '</div><!-- .theme-field -->';
		echo '</div>';
		echo '<br /><br /><br />';
		
		echo '<h4 class="option-title">Import Options</h4><br />';	
		echo '<div class="theme-entry">';
		echo '<a class="tooltip"><span>Click "Select File" to browse to the settings file stored on your computer then click import selected file to apply the settings. NOTE this cannot be undone. Make sure you have first backed up your existing settings before importing new settings.</span></a>';
		echo '<div class="theme-label"><label for="">Import Control Panel Settings</label></div><!-- .theme-label -->';
		echo '<div class="theme-field">';
		echo '<form action="" method="POST" enctype="multipart/form-data">';
		echo '<input type="file" name="file" />';
		echo '<input type="submit" class="import-btn" value="Import" />';
		echo '</form>';
		echo '</div><!-- .theme-field -->';
		echo '</div>';
		
		echo '</div>';
		echo '</div>';		

		echo '<div class="clear"></div>';
        echo '</div><!-- #theme-options-main -->';
        echo '<div class="theme-footer">';
        echo '<span class="save"></span>';        
        echo '<div class="clear"></div>';        
        echo '</div><!-- .theme-footer -->';
        echo '</div><!-- #theme-options -->';
        echo '</div><!-- .wrap -->';		
		
	}
	
	function export() {
		
		$home_url = home_url();
		$site_url = site_url();
		$options = array();
		foreach ($this->options as $option) {
			foreach($option['options'] as $value) {
				if(isset($value['id'])){
					if ($value['type'] == 'upload') {
						$options[$option['id']][$value['id']] = str_replace($home_url, "WP_HOME", get_option($value['id']));
					} elseif ($value['type'] == 'checkbox') {
						$options[$option['id']][$value['id']] = is_array(get_option($value['id'])) ? get_option($value['id']) : array();
					} else {
						$options[$option['id']][$value['id']] =str_replace($site_url, "WP_SITEURL", get_option($value['id']));
					}
				}
			}
		}
		unset($options['general'][THEME_SLUG.'_license_key']);
		return $options;
	}
	
	function import($imported_options) {		
		global $general_fonts, $google_fonts;	

		$home_url = home_url();
		$site_url = site_url();
		$settings = array('yes'=>array(), 'no'=>array());
		foreach ($this->options as $option) {
			foreach($option['options'] as $value) {
				if(isset($value['id'])){
					$import = false;
					if (isset($imported_options[$option['id']][$value['id']])) {
						if (maybe_unserialize($imported_options[$option['id']][$value['id']])) $imported_options[$option['id']][$value['id']] = maybe_unserialize($imported_options[$option['id']][$value['id']]);
						if (isset($value['type']) && $value['type'] == 'font') {
							$current_family = explode('::', $imported_options[$option['id']][$value['id']]);
							$family_type = $current_family[0];
							$current_family = $current_family[1];
							if($family_type == 'google'){
								if (in_array($current_family, $google_fonts)) {
									$import = true;
								}
							}
							if($family_type == 'general'){
								if (array_key_exists($current_family, $general_fonts)) {
									$import = true;
								}
							}
						} elseif (isset($value['data']) && is_array($value['data'])) {
							if (is_array($imported_options[$option['id']][$value['id']])) {
								$import_array = 1;
								foreach ($imported_options[$option['id']][$value['id']] as $val) {
									if (array_key_exists($val, $value['data'])) {
										$import_array = $import_array * 1;
									} else {
										$import_array = $import_array * 0;
									}
								}
								$import = (bool) $import_array;
							} elseif (array_key_exists($imported_options[$option['id']][$value['id']], $value['data'])) {
								$import = true;
							}
						} else {
							$import = true;
						}
					}
					if ($import) {
						$settings['yes'][] = $value['id'];
						if ($value['type'] == 'upload') {
							update_option($value['id'], str_replace("WP_HOME", $home_url, $imported_options[$option['id']][$value['id']]));
						} else {
							update_option($value['id'], str_replace("WP_SITEURL", $site_url, $imported_options[$option['id']][$value['id']]));
						}
					} else {
						if ($value['id'] != THEME_SLUG.'_license_key') {
							$settings['no'][] = array('id'=>$value['id'], 'name'=>$option['name'].' - '.$value['name'], 'value'=>(is_array($imported_options[$option['id']][$value['id']]) ? implode(', ', $imported_options[$option['id']][$value['id']]) : $imported_options[$option['id']][$value['id']]));
						}
					}
				}
			}
		}
		return $settings;		
	}
	
	function admin_redirect_download_files(){
		global $wp;
		global $wp_query;
		if (array_key_exists('export_theme_options', $wp->query_vars) && $wp->query_vars['export_theme_options'] == 'safe_download'){
			$this->download_file();
			die();
		}
	}

	function download_file($content = null, $file_name = null){
	
		if (! wp_verify_nonce($_REQUEST['nonce'], md5(site_url())) ) 
			wp_die('Security check'); 

		$options = $this->export();
		$content = "<!*!* START export Code !*!*>\n".base64_encode(serialize($options))."\n<!*!* END export Code !*!*>";
		$file_name = 'theme_export.txt';
		header('HTTP/1.1 200 OK');

		if ( !current_user_can('edit_themes') ) {
			wp_die('<p>'.__('You do not have sufficient permissions to edit templates for this site.').'</p>');
		}
		if ($content === null || $file_name === null){
			wp_die('<p>'.__('Error Downloading file.').'</p>');     
		}
		$fsize = strlen($content);
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Description: File Transfer');
		header("Content-Disposition: attachment; filename=" . $file_name);
		header("Content-Length: ".$fsize);
		header("Expires: 0");
		header("Pragma: public");
		echo $content;
		exit;
	}
}

$theme_option_export_import = new OptionImportExport($theme_options);
