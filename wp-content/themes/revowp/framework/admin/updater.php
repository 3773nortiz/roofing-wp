<?php

define(THEME_VERIFY_URL, 'http://members.revowp.com');
//define(THEME_PRODUCT_ID, '1a3qr7s');
define(THEME_PRODUCT_ID, 'mooyh1');
global $verification_notice;

add_filter('site_transient_update_themes', 'transient_update_themes_filter');
function transient_update_themes_filter($data) {

	$_theme = wp_get_theme();	
	$new_version = $theme_version = $_theme->Version;
	$theme_key = THEME_SLUG;
	
	if (defined('THEME_SLUG')) {
		
		$license_key = get_option(THEME_SLUG."_license_key");
		$url = THEME_VERIFY_URL . '/themes/check';
		$response = get_transient(md5($url));
		if(empty($response)){
			$raw_response = wp_remote_post( $url, array(
					'method' => 'POST',
					'timeout' => 10,
					'sslverify' => false,
					'body' => array( 
								'pid' => THEME_PRODUCT_ID,
								'website' => site_url(),
								'admin_email' => get_option('admin_email'),
								'license_key' => $license_key,
							),
				)
			);
			if( is_wp_error( $raw_response ) ) {} else {
				$response = json_decode($raw_response['body']);
				$response2 = json_decode($raw_response['response']['code']);
			//	echo 'Response:<pre>';	print_r( $raw_response ); echo '</pre>';				
			}
			set_transient(md5($url), $response, 5);
		}
		if (isset($response->error)) {
			global $verification_notice;
			$verification_notice = $response->error;
			add_action('admin_notices', 'theme_verification_notice');
			update_option(THEME_SLUG.'_metrics', '');			
		}elseif ($response2 == 200) {
			update_option(THEME_SLUG.'_metrics', md5(THEME_PRODUCT_ID));
		}
		
		if (isset($response->version)) {
			$new_version = $response->version;
		}
				
		if (version_compare($theme_version, $new_version, '>=')) {
			$data->up_to_date[$theme_key] = true;
		} else {
			
			$array = array( 
				'pid' => THEME_PRODUCT_ID,
				'website' => site_url(),
				'license_key' => $license_key,
			);	
			$download_link = THEME_VERIFY_URL.'/themes/get?c='.base64_encode(serialize($array));
			$update = array();
			$update['new_version'] = $new_version;
			$update['url']         = 'http://revowp.com';
			$update['package']     = $download_link;
			$data->response[$theme_key] = $update;	
		}
	}
	return $data;
}

add_filter('upgrader_source_selection', 'upgrader_source_selection_filter', 10, 3);
function upgrader_source_selection_filter($source, $remote_source=NULL, $upgrader=NULL){

	if(isset($source, $remote_source, $upgrader->skin->theme)){
		$corrected_source = $remote_source . '/' . $upgrader->skin->theme . '/';
		if(@rename($source, $corrected_source)){
			return $corrected_source;
		} else {
			$upgrader->skin->feedback("Unable to rename downloaded theme.");
			return new WP_Error();
		}
	}
	return $source;
}

add_action('http_request_args', 'no_ssl_http_request_args', 10, 2);
function no_ssl_http_request_args($args, $url) {
	$args['sslverify'] = false;
	return $args;
}

function theme_verification_notice() {
	global $verification_notice;
	echo '<div id="message" class="error fade"><p>'.$verification_notice.'</p></div>';
}
