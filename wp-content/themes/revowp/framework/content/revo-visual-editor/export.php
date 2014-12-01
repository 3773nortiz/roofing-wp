<?php

add_action('template_redirect', 'visual_editor_redirect_download_files');
function visual_editor_redirect_download_files(){
	global $wp;
	global $wp_query;
	if (array_key_exists('visual_editor_export_options', $wp->query_vars) && $wp->query_vars['visual_editor_export_options'] == 'safe_download'){
		visual_editor_download_file();
		die();
	}
}

function visual_editor_export() {
		
	$home_url = home_url();
	$site_url = site_url();
	$options = array();
	foreach ($GLOBALS['theme_options'] as $option) {		
		foreach($option['options'] as $key=>$value) {
			if(isset($value['id'])) {
				if ($value['type'] == 'upload') {
					$options[$option['id']][$value['id']] = str_replace($home_url, "WP_HOME", theme_get_option($value['id']));
				} elseif ($value['type'] == 'checkbox') {
					$options[$option['id']][$value['id']] = is_array(theme_get_option($value['id'])) ? theme_get_option($value['id']) : array();
				} else {
					$options[$option['id']][$value['id']] = str_replace($site_url, "WP_SITEURL", theme_get_option($value['id']));
				}		
			}
		}
	}
	unset($options['general'][VE_THEME_SLUG.'_license_key']);
	return $options;
}
	
function visual_editor_download_file($content = null, $file_name = null){
	
	if (! wp_verify_nonce($_REQUEST['nonce'], md5(site_url())) ) 
		wp_die('Security check'); 

	$options = visual_editor_export();
//	print_r($options);
//	die();
	$content = "<!*!* START export Code !*!*>\n".base64_encode(serialize($options))."\n<!*!* END export Code !*!*>";
	$file_name = 'theme_export.txt';
	header('HTTP/1.1 200 OK');

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