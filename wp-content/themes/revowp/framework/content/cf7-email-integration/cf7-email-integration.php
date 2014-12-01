<?php

define( 'JB_CF7_PATH', dirname(__FILE__) . '/' );
if (!class_exists('MCAPI')) {
	include_once ( JB_CF7_PATH . 'inc/mailchimp/MCAPI.class.php' );
}

if (!class_exists('AweberAPI')){
	include_once ( JB_CF7_PATH . 'inc/aweber_api/aweber_api.php');
}

if (!class_exists('jsonRPCClient')) {
	include_once ( JB_CF7_PATH . 'inc/getresponse/jsonRPCClient.php' );
}

class CF7_Email_Integration {

	var $settings;
	
	function __construct() {

		add_action('wpcf7_before_send_mail', array(&$this, 'integrate'));
        add_action('admin_menu', array(&$this, 'admin_menu'));
		
		add_filter('plugin_action_links_'.plugin_basename(__FILE__), array(&$this, 'settings_link'));
	}
	
	function settings_link($links) { 
		$settings_link = '<a href="options-general.php?page=cf7_email_integration">Settings</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}

	function admin_menu() {
		if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true' || (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true' && get_option(THEME_SLUG.'_options_panel_theme-cf7-email-integration') != 'false')) {			
			add_submenu_page('theme-dashboard', 'Revo Options - Contact Form 7 Email Integration', 'CF7 Email Integration', 'edit_pages', 'theme-cf7-email-integration', array(&$this, 'option_page'));
		}
	}

	function option_page() {
	
		$errors = '';
		$aw_auth_status = '';
		$aw_consumer_key = '';
		$aw_consumer_secret = '';
		$aw_access_key = '';
		$aw_access_secret = '';
		
		$aw_access_settings = get_option('cf7_email_aw_access_keys');
		if ($aw_access_settings) {
			$aw_auth_status = $aw_access_settings['aweber_auth_status'];
			$aw_consumer_key = $aw_access_settings['aw_consumer_key'];
			$aw_consumer_secret = $aw_access_settings['aw_consumer_secret'];
			$aw_access_key = $aw_access_settings['aw_access_key'];
			$aw_access_secret = $aw_access_settings['aw_access_secret'];
		}
		
		if (isset($_POST['cf7_email_update'])){
						
			if (isset($_POST['aweber_connect'])) {
				if($aw_auth_status != 'authorized'){
					$authorization_code = trim($_POST['aw-auth-code']);	        
		
					try {
						$auth = AweberAPI::getDataFromAweberID($authorization_code);
						list($aw_consumer_key, $aw_consumer_secret, $aw_access_key, $aw_access_secret) = $auth;
					}
					catch(AweberAPIException $exc) {
						$errors .= $exc->message.'<br/>';
					}
					if ($aw_access_key){
						try {
							$aweber = new AweberAPI($aw_consumer_key, $aw_consumer_secret);
							$account = $aweber->getAccount($aw_access_key, $aw_access_secret);
						} catch (AweberException $e) {
							$account = null;
						}
						if (!$account){
							$errors .= 'Aweber authentication failed! Please try connecting again.';            	
						}
						else{
							$aw_auth_status = 'authorized';
							$cf7_email_aw_access_keys = array(
								'aw_consumer_key'    => $aw_consumer_key,
								'aw_consumer_secret' => $aw_consumer_secret,
								'aw_access_key'      => $aw_access_key,
								'aw_access_secret'   => $aw_access_secret,
								'aweber_auth_status' => $aw_auth_status
							);	
							update_option('cf7_email_aw_access_keys', $cf7_email_aw_access_keys);
							
							echo '<div id="message" class="updated fade"><p><strong>Aweber authorization success!</strong></p></div>'; 	        		
						}			
					} else {
						$errors .= 'Please specify a valid Aweber authorization code in order to establish an API connection';
					}
				}
			} else if(isset($_POST['aweber_remove_connect'])) {

				$cf7_email_aw_access_keys = array(
					'aw_consumer_key'    => '',
					'aw_consumer_secret' => '',
					'aw_access_key'      => '',
					'aw_access_secret'   => '',
					'aweber_auth_status' => ''
				);	
				update_option('cf7_email_aw_access_keys', $cf7_email_aw_access_keys);
				$aw_auth_status = '';
				echo '<div id="message" class="updated fade"><p><strong>Aweber connection removed!</strong></p></div>';
			}
						
			$aw_enabled = $mc_enabled = $gr_enabled = $is_enabled = 0;
			$aw_list_name = $mc_list_name = $gr_list_name = $is_list_name = '';
			$mc_api_key = $gr_api_key = $is_api_key = '';
			
			$mc_disable_double_opt = false;

			if ($_POST['enable-aw'] == "true") {
				$aw_enabled = 1;
				
				$aw_custom_fields = array();
				if (is_array($_POST['aw-custom-fields-cf7']) && is_array($_POST['aw-custom-fields-list'])) {
					for ($i = 0; $i < count($_POST['aw-custom-fields-cf7']); $i++) {
						if ($_POST['aw-custom-fields-cf7'][$i] && $_POST['aw-custom-fields-list'][$i]) {
							$aw_custom_fields[] = array('list'=>$_POST['aw-custom-fields-list'][$i], 'cf7'=>$_POST['aw-custom-fields-cf7'][$i]);
						}
					}
				}
				update_option('cf7_email_aw_custom_fields', $aw_custom_fields);
				
				$aw_lists = array();
				if (is_array($_POST['aw-list-names']) && is_array($_POST['aw-cf7-forms'])) {
					for ($i = 0; $i < count($_POST['aw-list-names']); $i++) {
						if ($_POST['aw-cf7-forms'][$i] && $_POST['aw-list-names'][$i]) {
							$aw_lists[] = array('list'=>$_POST['aw-list-names'][$i], 'cf7'=>$_POST['aw-cf7-forms'][$i]);
						}
					}
				}
				update_option('cf7_email_aw_lists', $aw_lists);
				
				if ($_POST['aw-first-name-field'] != '') {
					$_POST['aw-first-name-field'] = filter_var($_POST['aw-first-name-field'], FILTER_SANITIZE_STRING);
				} 
				
				if ($_POST['aw-last-name-field'] != '') {
					$_POST['aw-last-name-field'] = filter_var($_POST['aw-last-name-field'], FILTER_SANITIZE_STRING);
				}
				
				if ($_POST['aw-email-field'] != '') {
					$_POST['aw-email-field'] = filter_var($_POST['aw-email-field'], FILTER_SANITIZE_STRING);
				}
							
			} else {
				$aw_enabled = 0;
			}
			
			if ($_POST['enable-gr'] == "true") {
				$gr_enabled = 1;
				
				$gr_custom_fields = array();
				if (is_array($_POST['gr-custom-fields-cf7']) && is_array($_POST['gr-custom-fields-list'])) {
					for ($i = 0; $i < count($_POST['gr-custom-fields-cf7']); $i++) {
						if ($_POST['gr-custom-fields-cf7'][$i] && $_POST['gr-custom-fields-list'][$i]) {
							$gr_custom_fields[] = array('list'=>$_POST['gr-custom-fields-list'][$i], 'cf7'=>$_POST['gr-custom-fields-cf7'][$i]);
						}
					}
				}
				update_option('cf7_email_gr_custom_fields', $gr_custom_fields);

				$gr_lists = array();
				if (is_array($_POST['gr-list-names']) && is_array($_POST['gr-cf7-forms'])) {
					for ($i = 0; $i < count($_POST['gr-list-names']); $i++) {
						if ($_POST['gr-cf7-forms'][$i] && $_POST['gr-list-names'][$i]) {
							$gr_lists[] = array('list'=>$_POST['gr-list-names'][$i], 'cf7'=>$_POST['gr-cf7-forms'][$i]);
						}
					}
				}
				update_option('cf7_email_gr_lists', $gr_lists);
				
				if ($_POST['gr-api'] != '') {
					$_POST['gr-api'] = filter_var($_POST['gr-api'], FILTER_SANITIZE_STRING);
					if ($_POST['gr-api'] == '') {
						$errors .= 'Please enter a valid GetResponse api key.<br/><br/>';
					}
				} else {
					$errors .= 'Please enter your GetResponse API key.<br/>';
				}			

				if ($_POST['gr-first-name-field'] != '') {
					$_POST['gr-first-name-field'] = filter_var($_POST['gr-first-name-field'], FILTER_SANITIZE_STRING);
				} 
				
				if ($_POST['gr-last-name-field'] != '') {
					$_POST['gr-last-name-field'] = filter_var($_POST['gr-last-name-field'], FILTER_SANITIZE_STRING);
				}
				
				if ($_POST['gr-email-field'] != '') {
					$_POST['gr-email-field'] = filter_var($_POST['gr-email-field'], FILTER_SANITIZE_STRING);
				}
							
			} else {
				$gr_enabled = 0;
			}
			 
			if ($_POST['enable-mc'] == "true") {
				$mc_enabled = 1;
				
				$mc_custom_fields = array();
				if (is_array($_POST['mc-custom-fields-cf7']) && is_array($_POST['mc-custom-fields-list'])) {
					for ($i = 0; $i < count($_POST['mc-custom-fields-cf7']); $i++) {
						if ($_POST['mc-custom-fields-cf7'][$i] && $_POST['mc-custom-fields-list'][$i]) {
							$mc_custom_fields[] = array('list'=>$_POST['mc-custom-fields-list'][$i], 'cf7'=>$_POST['mc-custom-fields-cf7'][$i]);
						}
					}
				}
				update_option('cf7_email_mc_custom_fields', $mc_custom_fields);
				
				$mc_lists = array();
				if (is_array($_POST['mc-list-names']) && is_array($_POST['mc-cf7-forms'])) {
					for ($i = 0; $i < count($_POST['mc-list-names']); $i++) {
						if ($_POST['mc-cf7-forms'][$i] && $_POST['mc-list-names'][$i]) {
							$mc_lists[] = array('list'=>$_POST['mc-list-names'][$i], 'cf7'=>$_POST['mc-cf7-forms'][$i]);
						}
					}
				}
				update_option('cf7_email_mc_lists', $mc_lists);

				if ($_POST['mc-api'] != '') {
					$_POST['mc-api'] = filter_var($_POST['mc-api'], FILTER_SANITIZE_STRING);
					if ($_POST['mc-api'] == '') {
						$errors .= 'Please enter a valid Mailchimp api key.<br/><br/>';
					}
				} else {
					$errors .= 'Please enter your Mailchimp API key.<br/>';
				}
				
				if ($_POST['disable-double-opt'] == "true") {
					$mc_disable_double_opt = true; //this means that we want to disable double optin emails
				} else {
					$mc_disable_double_opt = false;
				}
				
				if ($_POST['mc-first-name-field'] != '') {
					$_POST['mc-first-name-field'] = filter_var($_POST['mc-first-name-field'], FILTER_SANITIZE_STRING);
				} 
				
				if ($_POST['mc-last-name-field'] != '') {
					$_POST['mc-last-name-field'] = filter_var($_POST['mc-last-name-field'], FILTER_SANITIZE_STRING);
				}
				
				if ($_POST['mc-email-field'] != '') {
					$_POST['mc-email-field'] = filter_var($_POST['mc-email-field'], FILTER_SANITIZE_STRING);
				}			
					
			} else {
				$mc_enabled = 0;
			}	

			if ($_POST['enable-is'] == "true") {
				$is_enabled = 1;
				
				$is_custom_fields = array();
				if (is_array($_POST['is-custom-fields-cf7']) && is_array($_POST['is-custom-fields-list'])) {
					for ($i = 0; $i < count($_POST['is-custom-fields-cf7']); $i++) {
						if ($_POST['is-custom-fields-cf7'][$i] && $_POST['is-custom-fields-list'][$i]) {
							$is_custom_fields[] = array('list'=>$_POST['is-custom-fields-list'][$i], 'cf7'=>$_POST['is-custom-fields-cf7'][$i]);
						}
					}
				}
				update_option('cf7_email_is_custom_fields', $is_custom_fields);

				$is_lists = array();
				if (is_array($_POST['is-list-names']) && is_array($_POST['is-cf7-forms'])) {
					for ($i = 0; $i < count($_POST['is-list-names']); $i++) {
						if ($_POST['is-cf7-forms'][$i] && $_POST['is-list-names'][$i]) {
							$is_lists[] = array('list'=>$_POST['is-list-names'][$i], 'cf7'=>$_POST['is-cf7-forms'][$i]);
						}
					}
				}
				update_option('cf7_email_is_lists', $is_lists);
				
				if ($_POST['is-url'] != '') {
					$_POST['is-url'] = filter_var($_POST['is-url'], FILTER_SANITIZE_STRING);
					if ($_POST['is-url'] == '') {
						$errors .= 'Please enter a valid Interspire URL.<br/><br/>';
					}
				} else {
					$errors .= 'Please enter your Interspire URL.<br/>';
				}
				
				if ($_POST['is-username'] != '') {
					$_POST['is-username'] = filter_var($_POST['is-username'], FILTER_SANITIZE_STRING);
					if ($_POST['is-username'] == '') {
						$errors .= 'Please enter a valid Interspire username.<br/><br/>';
					}
				} else {
					$errors .= 'Please enter your Interspire username.<br/>';
				}
				
				if ($_POST['is-api'] != '') {
					$_POST['is-api'] = filter_var($_POST['is-api'], FILTER_SANITIZE_STRING);
					if ($_POST['is-api'] == '') {
						$errors .= 'Please enter a valid Interspire api key.<br/><br/>';
					}
				} else {
					$errors .= 'Please enter your Interspire API key.<br/>';
				}
				 		
				if ($_POST['is-email-field'] != '') {
					$_POST['is-email-field'] = filter_var($_POST['is-email-field'], FILTER_SANITIZE_STRING);
				}			
			} else {
				$is_enabled = 0;
			}			

			if (!$errors) {

				$options = array(
					'aw_enabled'	 		=>	$aw_enabled,
					'aw_fname_field' 		=> 	$_POST['aw-first-name-field'],
					'aw_lname_field' 		=> 	$_POST['aw-last-name-field'],
					'aw_email_field'		=> 	$_POST['aw-email-field'],
					
					'gr_enabled' 			=> 	$gr_enabled,
					'gr_api_key' 			=> 	$_POST['gr-api'],
					'gr_fname_field' 		=> 	$_POST['gr-first-name-field'],
					'gr_lname_field' 		=> 	$_POST['gr-last-name-field'],
					'gr_email_field'		=> 	$_POST['gr-email-field'],
					
					'mc_enabled' 			=> 	$mc_enabled,
					'mc_api_key' 			=> 	$_POST['mc-api'],
					'mc_disable_double_opt' => 	$mc_disable_double_opt,
					'mc_fname_field' 		=> 	$_POST['mc-first-name-field'],
					'mc_lname_field' 		=> 	$_POST['mc-last-name-field'],
					'mc_email_field'		=> 	$_POST['mc-email-field'],
					
					'is_enabled' 			=> 	$is_enabled,
					'is_url' 				=> 	$_POST['is-url'],
					'is_api_key' 			=> 	$_POST['is-api'],
					'is_username'			=> 	$_POST['is-username'],
					'is_email_field'		=> 	$_POST['is-email-field'],
				);
				update_option('cf7_email_integration', $options); //store the results in WP options table
				echo '<div id="message" class="updated fade">';
				echo '<p>Settings Saved</p>';
				echo '</div>';
			} else {
				echo '<div class="error fade"><p>' . $errors . '</p></div>';
			}
		}
		
		if (get_option('cf7_email_integration')) {
			$this->settings = get_option('cf7_email_integration');
		}
		$aw_fname_field = $gr_fname_field = $mc_fname_field = 'your-name';
		$aw_email_field = $gr_email_field = $mc_email_field = $is_email_field = 'your-email';
		$aw_custom_fields = $gr_custom_fields = $mc_custom_fields = $is_custom_fields = array();
		$aw_lists = $gr_lists = $mc_lists = $is_lists = array();
		if (isset($this->settings)) {
			
		//	print_r($this->settings);
			
			$aw_enabled = $this->settings['aw_enabled'] ? "true" : "false";
			$aw_fname_field = $this->settings['aw_fname_field'];
			$aw_lname_field = $this->settings['aw_lname_field'];
			$aw_email_field = $this->settings['aw_email_field'];
			$aw_custom_fields = get_option('cf7_email_aw_custom_fields') ? get_option('cf7_email_aw_custom_fields') : array() ;
			$aw_lists = get_option('cf7_email_aw_lists') ? get_option('cf7_email_aw_lists') : array() ;		
			
			$gr_enabled = $this->settings['gr_enabled'] ? "true" : "false";;
			$gr_api_key = $this->settings['gr_api_key'];
			$gr_fname_field = $this->settings['gr_fname_field'];
			$gr_lname_field = $this->settings['gr_lname_field'];
			$gr_email_field = $this->settings['gr_email_field'];
			$gr_custom_fields = get_option('cf7_email_gr_custom_fields') ? get_option('cf7_email_gr_custom_fields') : array() ;
			$gr_lists = get_option('cf7_email_gr_lists') ? get_option('cf7_email_gr_lists') : array() ;		
			
			$mc_enabled = $this->settings['mc_enabled'] ? "true" : "false";;
			$mc_api_key = $this->settings['mc_api_key'];
			$mc_disable_double_opt = $this->settings['mc_disable_double_opt'] ? "true" : "false";
			$mc_fname_field = $this->settings['mc_fname_field'];
			$mc_lname_field = $this->settings['mc_lname_field'];
			$mc_email_field = $this->settings['mc_email_field'];
			$mc_custom_fields = get_option('cf7_email_mc_custom_fields') ? get_option('cf7_email_mc_custom_fields') : array() ;
			$mc_lists = get_option('cf7_email_mc_lists') ? get_option('cf7_email_mc_lists') : array() ;		
			
			$is_enabled = $this->settings['is_enabled'] ? "true" : "false";;
			$is_url = $this->settings['is_url'];
			$is_api_key = $this->settings['is_api_key'];
			$is_username = $this->settings['is_username'];
			$is_email_field = $this->settings['is_email_field'];
			$is_custom_fields = get_option('cf7_email_is_custom_fields') ? get_option('cf7_email_is_custom_fields') : array() ;		
			$is_lists = get_option('cf7_email_is_lists') ? get_option('cf7_email_is_lists') : array() ;		
		}

		echo '<div class="theme-wrap">';
		echo '<form action="'.$_SERVER["REQUEST_URI"].'" method="POST" onsubmit="">';
		echo '<input type="hidden" name="cf7_email_update" id="cf7_email_update" value="true" />';
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
				
		echo '<h3>Contact Form 7 Email Integration</h3>';
		echo '<span class="save"><input name="action" type="submit" class="button-save" value="Save Changes" /></span>';
		echo '<div class="divider"></div><br /><br /><br />';
				
	?>
	
<?php echo generateField(array("type"=>"start", "name"=>"Aweber")); ?>
<?php echo generateField(array("type"=>"toggle", "name"=>"Enable", "id"=>"enable-aw", "current"=>$aw_enabled, "desc"=>"Click here to enable Aweber Integration")); ?>
<?php
	echo '<div class="theme-entry">';
	if ($aw_auth_status == 'authorized') {
		echo '<a class="tooltip"><span>Click on the button to remove the connection.</span></a>';
	} else {
		echo '<a class="tooltip"><span>Get the code by clicking on the "Get Key" link will take you to the Aweber site where you will need to log in using your Aweber username and password. Then allow access to the Contact Form 7 Email Integration app and paste the authorization code you obtained in this field and click the "Connect To Aweber" button</span></a>';
	}
	echo '<div class="theme-label"><label for="aw-auth-code">Authorization Code</label></div>';
	echo '<div class="theme-field">';
	if ($aw_auth_status == 'authorized') {
		echo '<input name="aweber_remove_connect" type="submit" value="Remove Aweber Connection" class="linkbutton" />';	
	} else {
		echo '<input name="aw-auth-code" id="aw-auth-code" type="text" class="theme-input size-small" /><a href="https://auth.aweber.com/1.0/oauth/authorize_app/a5e91bb3" class="linkbutton" id="aw-connect-link" target="_blank">Get Key</a><input name="aweber_connect" type="submit" value="Connect to Aweber" id="aw-connect-button" class="linkbutton" />';
	}
	
	echo '</div>';
	echo '</div>';
?>	
<?php echo generateField(array("type"=>"text", "name"=>"First Name Field", "id"=>"aw-first-name-field", "size"=>"large", "current"=>$aw_fname_field, "desc"=>"Enter the \"First Name\" field's name being used in CF7")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Last Name Field", "id"=>"aw-last-name-field", "size"=>"large", "current"=>$aw_lname_field, "desc"=>"Enter the \"Last Name\" field's name being used in CF7")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Email Field", "id"=>"aw-email-field", "size"=>"large", "current"=>$aw_email_field, "desc"=>"Enter the \"Email\" field's name being used in CF7")); ?>

<div class="theme-entry">
<p class="description">You can map the lists with CF7 forms. List name go on the left and CF7 form name go on the right. <a href="#" id="" class="add_more_lists">Add More Lists</a></p>
<table class="form-table">
<?php if (count($aw_lists)) { ?>
<?php foreach ($aw_lists as $list) { ?>
	<tr valign="top" class="tr-lists"><td width="200"><input size="35" name="aw-list-names[]" value="<?php echo $list['list']; ?>" /></td><td><input size="40" name="aw-cf7-forms[]" value="<?php echo $list['cf7']; ?>" /></td></tr>
<?php } ?>
<?php } else { ?>
	<tr valign="top" class="tr-lists"><td width="200"><input size="35" name="aw-list-names[]" value="" /></td><td><input size="40" name="aw-cf7-forms[]" value="" /></td></tr>
<?php } ?>	
</table></div>

<div class="theme-entry">
<p class="description">You can map the custom fields (if any) with those of Contact Form 7. Custom field name go on the left and CF7 field name go on the right. <a href="#" id="" class="add_more_fields">Add More Fields</a></p>
<table class="form-table">
<?php if (count($aw_custom_fields)) { ?>
<?php foreach ($aw_custom_fields as $custom_field) { ?>
	<tr valign="top" class="tr-custom-fields"><td width="200"><input size="35" name="aw-custom-fields-list[]" value="<?php echo $custom_field['list']; ?>" /></td><td><input size="40" name="aw-custom-fields-cf7[]" value="<?php echo $custom_field['cf7']; ?>" /></td></tr>
<?php } ?>
<?php } else { ?>
	<tr valign="top" class="tr-custom-fields"><td width="200"><input size="35" name="aw-custom-fields-list[]" value="" /></td><td><input size="40" name="aw-custom-fields-cf7[]" value="" /></td></tr>
<?php } ?>
</table></div>
<?php echo generateField(array("type"=>"stop")); ?>


<?php echo generateField(array("type"=>"start", "name"=>"GetResponse")); ?>
<?php echo generateField(array("type"=>"toggle", "name"=>"Enable", "id"=>"enable-gr", "current"=>$gr_enabled, "desc"=>"Click here to enable GetResponse Integration")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"API Key", "id"=>"gr-api", "size"=>"large", "current"=>$gr_api_key, "desc"=>"Enter the API Key")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"First Name Field", "id"=>"gr-first-name-field", "size"=>"large", "current"=>$gr_fname_field, "desc"=>"Enter the \"First Name\" field's name being used in CF7")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Last Name Field", "id"=>"gr-last-name-field", "size"=>"large", "current"=>$gr_lname_field, "desc"=>"Enter the \"Last Name\" field's name being used in CF7")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Email Field", "id"=>"gr-email-field", "size"=>"large", "current"=>$gr_email_field, "desc"=>"Enter the \"Email\" field's name being used in CF7")); ?>

<div class="theme-entry">
<p class="description">You can map the lists with CF7 forms. List name go on the left and CF7 form name go on the right. <a href="#" id="" class="add_more_lists">Add More Lists</a></p>
<table class="form-table">
<?php if (count($gr_lists)) { ?>
<?php foreach ($gr_lists as $list) { ?>
	<tr valign="top" class="tr-lists"><td width="200"><input size="35" name="gr-list-names[]" value="<?php echo $list['list']; ?>" /></td><td><input size="40" name="gr-cf7-forms[]" value="<?php echo $list['cf7']; ?>" /></td></tr>
<?php } ?>
<?php } else { ?>
	<tr valign="top" class="tr-lists"><td width="200"><input size="35" name="gr-list-names[]" value="" /></td><td><input size="40" name="gr-cf7-forms[]" value="" /></td></tr>
<?php } ?>	
</table></div>

<div class="theme-entry">
<p class="description">You can map the custom fields (if any) with those of Contact Form 7. Custom field name go on the left and CF7 field name go on the right. <a href="#" id="" class="add_more_fields">Add More Fields</a></p>
<table class="form-table">
<?php if (count($gr_custom_fields)) { ?>
<?php foreach ($gr_custom_fields as $custom_field) { ?>
	<tr valign="top" class="tr-custom-fields"><td width="200"><input size="35" name="gr-custom-fields-list[]" value="<?php echo $custom_field['list']; ?>" /></td><td><input size="40" name="gr-custom-fields-cf7[]" value="<?php echo $custom_field['cf7']; ?>" /></td></tr>
<?php } ?>
<?php } else { ?>
	<tr valign="top" class="tr-custom-fields"><td width="200"><input size="35" name="gr-custom-fields-list[]" value="" /></td><td><input size="40" name="gr-custom-fields-cf7[]" value="" /></td></tr>
<?php } ?>
</table></div>
<?php echo generateField(array("type"=>"stop")); ?>
	
	
<?php echo generateField(array("type"=>"start", "name"=>"Mailchimp")); ?>
<?php echo generateField(array("type"=>"toggle", "name"=>"Enable", "id"=>"enable-mc", "current"=>$mc_enabled, "desc"=>"Click here to enable Mailchimp Integration")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"API Key", "id"=>"mc-api", "size"=>"large", "current"=>$mc_api_key, "desc"=>"Enter the API Key")); ?>
<?php echo generateField(array("type"=>"toggle", "name"=>"Double Opt-in Email", "id"=>"disable-double-opt", "current"=>$mc_disable_double_opt, "desc"=>"When enabling this Mailchimp will send a confirmation (double opt-in) email")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"First Name Field", "id"=>"mc-first-name-field", "size"=>"large", "current"=>$mc_fname_field, "desc"=>"Enter the \"First Name\" field's name being used in CF7")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Last Name Field", "id"=>"mc-last-name-field", "size"=>"large", "current"=>$mc_lname_field, "desc"=>"Enter the \"Last Name\" field's name being used in CF7")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Email Field", "id"=>"mc-email-field", "size"=>"large", "current"=>$mc_email_field, "desc"=>"Enter the \"Email\" field's name being used in CF7")); ?>

<div class="theme-entry">
<p class="description">You can map the lists with CF7 forms. List name go on the left and CF7 form name go on the right. <a href="#" id="" class="add_more_lists">Add More Lists</a></p>
<table class="form-table">
<?php if (count($mc_lists)) { ?>
<?php foreach ($mc_lists as $list) { ?>
	<tr valign="top" class="tr-lists"><td width="200"><input size="35" name="mc-list-names[]" value="<?php echo $list['list']; ?>" /></td><td><input size="40" name="mc-cf7-forms[]" value="<?php echo $list['cf7']; ?>" /></td></tr>
<?php } ?>
<?php } else { ?>
	<tr valign="top" class="tr-lists"><td width="200"><input size="35" name="mc-list-names[]" value="" /></td><td><input size="40" name="mc-cf7-forms[]" value="" /></td></tr>
<?php } ?>	
</table></div>

<div class="theme-entry">
<p class="description">You can map the custom fields (if any) with those of Contact Form 7. Custom field Tag go on the left and CF7 field name go on the right. <a href="#" id="" class="add_more_fields">Add More Fields</a></p>
<table class="form-table">
<?php if (count($mc_custom_fields)) { ?>
<?php foreach ($mc_custom_fields as $custom_field) { ?>
	<tr valign="top" class="tr-custom-fields"><td width="200"><input size="35" name="mc-custom-fields-list[]" value="<?php echo $custom_field['list']; ?>" /></td><td><input size="40" name="mc-custom-fields-cf7[]" value="<?php echo $custom_field['cf7']; ?>" /></td></tr>
<?php } ?>
<?php } else { ?>
	<tr valign="top" class="tr-custom-fields"><td width="200"><input size="35" name="mc-custom-fields-list[]" value="" /></td><td><input size="40" name="mc-custom-fields-cf7[]" value="" /></td></tr>
<?php } ?>
</table></div>
<?php echo generateField(array("type"=>"stop")); ?>
	
	
<?php echo generateField(array("type"=>"start", "name"=>"Interspire")); ?>
<?php echo generateField(array("type"=>"toggle", "name"=>"Enable", "id"=>"enable-is", "current"=>$is_enabled, "desc"=>"Click here to enable Interspire Integration")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Interspire URL", "id"=>"is-url", "size"=>"large", "current"=>$is_url, "desc"=>"Ex: http://yourdomain.com/IEM/xml.php")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Username", "id"=>"is-username", "size"=>"large", "current"=>$is_username, "desc"=>"Enter your Interspire Username")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"API Key", "id"=>"is-api", "size"=>"large", "current"=>$is_api_key, "desc"=>"Enter the API Key")); ?>
<?php echo generateField(array("type"=>"text", "name"=>"Email Field", "id"=>"is-email-field", "size"=>"large", "current"=>$is_email_field, "desc"=>"Enter the \"Email\" field's name being used in CF7")); ?>	
	
<div class="theme-entry">
<p class="description">You can map the lists with CF7 forms. List name go on the left and CF7 form name go on the right. <a href="#" id="" class="add_more_lists">Add More Lists</a></p>
<table class="form-table">
<?php if (count($is_lists)) { ?>
<?php foreach ($is_lists as $list) { ?>
	<tr valign="top" class="tr-lists"><td width="200"><input size="35" name="is-list-names[]" value="<?php echo $list['list']; ?>" /></td><td><input size="40" name="is-cf7-forms[]" value="<?php echo $list['cf7']; ?>" /></td></tr>
<?php } ?>
<?php } else { ?>
	<tr valign="top" class="tr-lists"><td width="200"><input size="35" name="is-list-names[]" value="" /></td><td><input size="40" name="is-cf7-forms[]" value="" /></td></tr>
<?php } ?>	
</table></div>

<div class="theme-entry">
<p class="description">You can map the custom fields (if any) with those of Contact Form 7. Custom field ID's go on the left and CF7 field name go on the right. <a href="#" id="" class="add_more_fields">Add More Fields</a></p>
<table class="form-table">
<?php if (count($is_custom_fields)) { ?>
<?php foreach ($is_custom_fields as $custom_field) { ?>
	<tr valign="top" class="tr-custom-fields"><td width="200"><input size="35" name="is-custom-fields-list[]" value="<?php echo $custom_field['list']; ?>" /></td><td><input size="40" name="is-custom-fields-cf7[]" value="<?php echo $custom_field['cf7']; ?>" /></td></tr>
<?php } ?>
<?php } else { ?>
	<tr valign="top" class="tr-custom-fields"><td width="200"><input size="35" name="is-custom-fields-list[]" value="" /></td><td><input size="40" name="is-custom-fields-cf7[]" value="" /></td></tr>
<?php } ?>
</table></div>
<?php echo generateField(array("type"=>"stop")); ?>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('a.add_more_fields').click(function(){
		current_fields = jQuery(this).parent().next('table').find('tr:last-child');
		new_fields = current_fields.clone(true);
		jQuery("input", new_fields).val('');
		current_fields.after(new_fields);
		return false;
	});
	jQuery('a.add_more_lists').click(function(){
		current_fields = jQuery(this).parent().next('table').find('tr:last-child');
		new_fields = current_fields.clone(true);
		jQuery("input", new_fields).val('');
		current_fields.after(new_fields);
		return false;
	});	
});
</script>	




		<?php
		
		echo '</div>';
		echo '</div>';		

		echo '<div class="clear"></div>';
        echo '</div><!-- #theme-options-main -->';
        echo '<div class="theme-footer">';
        echo '<span class="save"><input type="submit" name="action" value="Save Changes" class="button-save" /></span>';        
        echo '<div class="clear"></div>';        
        echo '</div><!-- .theme-footer -->';
        echo '</div><!-- #theme-options -->';
        echo '</form></div><!-- .wrap -->';		
			
		
	}

	function integrate($cf7) {
		
		if (get_option('cf7_email_integration')) {
			$this->settings = get_option('cf7_email_integration');
		}
		
 		if (isset($this->settings)) {
			$aw_enabled = $this->settings['aw_enabled'];
			$gr_enabled = $this->settings['gr_enabled'];
			$mc_enabled = $this->settings['mc_enabled'];
			$is_enabled = $this->settings['is_enabled'];
		}
				
		if ($aw_enabled) {
			$this->aweber_func($cf7);
		}		
		if ($gr_enabled) {
			$this->getresponse_func($cf7);
		}
		if ($mc_enabled) {
			$this->mailchimp_func($cf7);
		}
		if ($is_enabled) {
			$this->interspire_func($cf7);
		}
	}

	function aweber_func($cf7) {

		$fname_field = $this->settings['aw_fname_field'] ? $this->settings['aw_fname_field'] : 'your-name';
		$lname_field = $this->settings['aw_lname_field'];
		$email_field = $this->settings['aw_email_field'] ? $this->settings['aw_email_field'] : 'your-email';
		
		$email = $cf7->posted_data[$email_field];
		$firstname = $cf7->posted_data[$fname_field];			
		if (array_key_exists($lname_field, $cf7->posted_data))
			$lastname = $cf7->posted_data[$lname_field];
		
		$subscriber_name = trim($firstname.' '.$lastname);
		
		
		if ($email) {
		
			$access_settings = get_option('cf7_email_aw_access_keys');
			if ($access_settings) {
				$consumer_key = $access_settings['aw_consumer_key'];
				$consumer_secret = $access_settings['aw_consumer_secret'];
				$access_key = $access_settings['aw_access_key'];
				$access_secret = $access_settings['aw_access_secret'];
				
				$lists = get_option('cf7_email_aw_lists') ? get_option('cf7_email_aw_lists') : array() ;
				foreach ($lists as $list) {
					if ($list['cf7'] == $cf7->title) {
					
						$params = array(
							'email' => $email,
							'name' => $subscriber_name,
						);	
							
						$custom_fields = array();	
						$aw_custom_fields = get_option('cf7_email_aw_custom_fields') ? get_option('cf7_email_aw_custom_fields') : array() ;
						foreach ($aw_custom_fields as $custom_field) {
							if (array_key_exists($custom_field['cf7'], $cf7->posted_data)) {
								if (is_array($cf7->posted_data[$custom_field['cf7']])) $cf7->posted_data[$custom_field['cf7']] = implode(', ', $cf7->posted_data[$custom_field['cf7']]);
								$custom_fields[$custom_field['list']] = $cf7->posted_data[$custom_field['cf7']];
							}
						}
						if (count($custom_fields))
							$params['custom_fields'] = $custom_fields;
							
						$aweber = new AweberAPI($consumer_key, $consumer_secret);
						try {
							$account = $aweber->getAccount($access_key, $access_secret);

							foreach ($account->lists as $aw_list) {
								if($aw_list->name == $list['list']) {
									$subscribers = $aw_list->subscribers;
									$new_subscriber = $subscribers->create($params);
								}
							}
						} catch(AweberAPIException $exc) {}
					}
				}
			}
		}
	}

	function getresponse_func($cf7) {
			
		$api_key = $this->settings['gr_api_key'];
		$fname_field = $this->settings['gr_fname_field'] ? $this->settings['gr_fname_field'] : 'your-name';
		$lname_field = $this->settings['gr_lname_field'];
		$email_field = $this->settings['gr_email_field'] ? $this->settings['gr_email_field'] : 'your-email';
		
		$email = $cf7->posted_data[$email_field];
		$firstname = $cf7->posted_data[$fname_field];			
		if (array_key_exists($lname_field, $cf7->posted_data))
			$lastname = $cf7->posted_data[$lname_field];
		
		$subscriber_name = trim($firstname.' '.$lastname);
		
		if ($email) {
			
			$lists = get_option('cf7_email_gr_lists') ? get_option('cf7_email_gr_lists') : array() ;
			foreach ($lists as $list) {
				if ($list['cf7'] == $cf7->title) {
				
					$custom_vars = array();
					$gr_custom_fields = get_option('cf7_email_gr_custom_fields') ? get_option('cf7_email_gr_custom_fields') : array() ;
					foreach ($gr_custom_fields as $custom_field) {
						if (array_key_exists($custom_field['cf7'], $cf7->posted_data)) {
							if (is_array($cf7->posted_data[$custom_field['cf7']])) $cf7->posted_data[$custom_field['cf7']] = implode(', ', $cf7->posted_data[$custom_field['cf7']]);
							$custom_vars[] = array('name'=>$custom_field['list'], 'content'=>$cf7->posted_data[$custom_field['cf7']]);
						}
					}
				
					$client = new jsonRPCClient('http://api2.getresponse.com');
					try {
						$result = $client->get_campaigns($api_key, array('name'=>array('EQUALS'=>$list['list'])));
						$campaigns = array_keys($result);
						$campaign_id = array_pop($campaigns);
						if ($campaign_id) {
							$result = $client->add_contact($api_key, array (
																		'campaign'  => $campaign_id,
																		'name'      => $subscriber_name,
																		'email'     => $email,
																		'cycle_day' => '0',
																		'customs'   => $custom_vars,
																	)
														);
						}
					}
					catch (Exception $e) {}
				}
			}
		}
	}

	function mailchimp_func($cf7) {

		$api_key = $this->settings['mc_api_key'];
		$disable_double_opt = $this->settings['mc_disable_double_opt'];
		$fname_field = $this->settings['mc_fname_field'] ? $this->settings['mc_fname_field'] : 'your-name';
		$lname_field = $this->settings['mc_lname_field'];
		$email_field = $this->settings['mc_email_field'] ? $this->settings['mc_email_field'] : 'your-email';
		$email_type = 'html';
					
		$email = $cf7->posted_data[$email_field];
		$firstname = $cf7->posted_data[$fname_field];			
		if (array_key_exists($lname_field, $cf7->posted_data))
			$lastname = $cf7->posted_data[$lname_field];
		
		if ($email) {
			
			$lists = get_option('cf7_email_mc_lists') ? get_option('cf7_email_mc_lists') : array() ;
			foreach ($lists as $list) {
				if ($list['cf7'] == $cf7->title) {
					
					$api = new MCAPI($api_key);
					$mc_lists = $api->lists();
					foreach ($mc_lists['data'] as $mc_list){
						if(strtolower($mc_list['name']) == strtolower($list['list'])) {
							
							$mergeVars = array('FNAME'=>$firstname, 'LNAME'=>$lastname);
						
							$custom_fields = get_option('cf7_email_mc_custom_fields') ? get_option('cf7_email_mc_custom_fields') : array() ;
							foreach ($custom_fields as $custom_field) {
								if (array_key_exists($custom_field['cf7'], $cf7->posted_data)) {
									if (is_array($cf7->posted_data[$custom_field['cf7']])) $cf7->posted_data[$custom_field['cf7']] = implode(', ', $cf7->posted_data[$custom_field['cf7']]);
									$mergeVars[$custom_field['list']] = $cf7->posted_data[$custom_field['cf7']];
								}
							}
							
							$retval = $api->listSubscribe( $mc_list['id'], $email, $mergeVars, $email_type, $disable_double_opt);
						}
						if ($api->errorCode){}
					}					
				}
			}						
		}
	}
	
	function interspire_func($cf7) {

		$api_key = $this->settings['is_api_key'];
		$api_url = $this->settings['is_url'];		
		$username = $this->settings['is_username'];
		$email_field = $this->settings['is_email_field'] ? $this->settings['is_email_field'] : 'your-email';
				
		$email = $cf7->posted_data[$email_field];
		$list_name = '';
			
		if ($email) {
		
			$lists = get_option('cf7_email_is_lists') ? get_option('cf7_email_is_lists') : array() ;
			foreach ($lists as $list) {
				if ($list['cf7'] == $cf7->title) {
					$list_name = $list['list'];
								
					$list_id = 0;
					$xml_data = "
						<xmlrequest>
							<username>{$username}</username>
							<usertoken>{$api_key}</usertoken>
							<requesttype>lists</requesttype>
							<requestmethod>GetLists</requestmethod>
							<details>
							</details>
						</xmlrequest>
						";

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $api_url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FAILONERROR, true);
					curl_setopt($ch, CURLOPT_POST, true);
					if (!ini_get('safe_mode') && ini_get('open_basedir') == '') {
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					}
					curl_setopt($ch, CURLOPT_TIMEOUT, 10);
					curl_setopt($ch, CURLOPT_POSTFIELDS, 'xml=' . $xml_data);
					$pageData = curl_exec($ch);
					if ($pageData) {
						$xml_doc = simplexml_load_string($pageData);
						if($xml_doc){
							if ($xml_doc->status == 'SUCCESS') {
								foreach ($xml_doc->data->item as $list) {
									$list = (array) $list;
									if($list['name'] == $list_name) {
										$list_id = $list['listid'];
									}
								}
							}
						}
					}
					curl_close($ch);
					
					if ($list_id) {
					
						$is_custom_fields = get_option('cf7_email_is_custom_fields') ? get_option('cf7_email_is_custom_fields') : array() ;
						$custom_fields = '<customfields>'."\n";
						foreach ($is_custom_fields as $custom_field) {
							if (array_key_exists($custom_field['cf7'], $cf7->posted_data)) {
								if (is_array($cf7->posted_data[$custom_field['cf7']])) $cf7->posted_data[$custom_field['cf7']] = implode(', ', $cf7->posted_data[$custom_field['cf7']]);
								$custom_fields .= '<item>'."\n";
								$custom_fields .= '<fieldid>'.$custom_field['list'].'</fieldid>'."\n";
								$custom_fields .= '<value>'.$cf7->posted_data[$custom_field['cf7']].'</value>'."\n";
								$custom_fields .= '</item>'."\n";
							}
						}
						$custom_fields .= '</customfields>';
						
						$xml_data = "
							<xmlrequest>
								<username>{$username}</username>
								<usertoken>{$api_key}</usertoken>
								<requesttype>subscribers</requesttype>
								<requestmethod>AddSubscriberToList</requestmethod>
								<details>
									<emailaddress>{$email}</emailaddress>
									<mailinglist>{$list_id}</mailinglist>
									<format>html</format>
									<confirmed>yes</confirmed>
									{$custom_fields}
								</details>
							</xmlrequest>
							";
							
						$ch = curl_init($api_url);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
						@curl_exec($ch);			
						curl_close($ch);
					}
				}
			}	
		}
	}

	public static function deactivate() {
		delete_option( 'cf7_email_integration' );
		delete_option( 'cf7_email_aw_access_keys' );
		delete_option( 'cf7_email_aw_custom_fields' );
		delete_option( 'cf7_email_gr_custom_fields' );
		delete_option( 'cf7_email_mc_custom_fields' );
		delete_option( 'cf7_email_is_custom_fields' );
		delete_option( 'cf7_email_aw_lists' );
		delete_option( 'cf7_email_gr_lists' );
		delete_option( 'cf7_email_mc_lists' );
		delete_option( 'cf7_email_is_lists' );
	}	

}

$CF7_Email_Integration = new CF7_Email_Integration();

//register_deactivation_hook(__FILE__, array('CF7_Email_Integration', 'deactivate'));
