<?php
$data = $_POST['data'];
parse_str($data, $new_settings);	

if($new_settings['resetreq']=='reset')				//Function called when reset button is pressed
{
	foreach ($_COOKIE as $key=>$val)				//Removes all customisation cookies
		if (strpos($key,VE_THEME_SLUG) !== false) 
		{
			setcookie($key, "", time()-3600,'/'); 	//Empty the value and mark as expired
			unset($_COOKIE[$key]);					//Unset the cookie
		}
	//Unset all other irrelevant cookies
	setcookie('visual_editor_generate', "", time()-3600,'/'); 
	setcookie('resetreq', "", time()-3600,'/'); 
	unset($_COOKIE['visual_editor_generate']);
	unset($_COOKIE['resetreq']);
}

else if($new_settings['resetreq']=='save')	
{
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
	//print_r($options);
	//$options array now has the saved settings
	
	global $general_fonts, $google_fonts;	

		$settings = array('yes'=>array(), 'no'=>array());
		foreach ($GLOBALS['theme_options'] as $option) {
			foreach($option['options'] as $value) {
				if(isset($value['id'])){
					$import = false;
					if (isset($options[$option['id']][$value['id']])) {
						if (maybe_unserialize($options[$option['id']][$value['id']])) $options[$option['id']][$value['id']] = maybe_unserialize($options[$option['id']][$value['id']]);
						if (isset($value['type']) && $value['type'] == 'font') {
							$current_family = explode('::', $options[$option['id']][$value['id']]);
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
							if (is_array($options[$option['id']][$value['id']])) {
								$import_array = 1;
								foreach ($options[$option['id']][$value['id']] as $val) {
									if (array_key_exists($val, $value['data'])) {
										$import_array = $import_array * 1;
									} else {
										$import_array = $import_array * 0;
									}
								}
								$import = (bool) $import_array;
							} elseif (array_key_exists($options[$option['id']][$value['id']], $value['data'])) {
								$import = true;
							}
						} else {
							$import = true;
						}
					}
					if ($import) {
						$settings['yes'][] = $value['id'];
						if ($value['type'] == 'upload') {
							update_option($value['id'], str_replace("WP_HOME", $home_url, $options[$option['id']][$value['id']]));
						} else {
							update_option($value['id'], str_replace("WP_SITEURL", $site_url, $options[$option['id']][$value['id']]));
						}
					} else {
						if ($value['id'] != THEME_SLUG.'_license_key') {
							$settings['no'][] = array('id'=>$value['id'], 'name'=>$option['name'].' - '.$value['name'], 'value'=>(is_array($options[$option['id']][$value['id']]) ? implode(', ', $options[$option['id']][$value['id']]) : $options[$option['id']][$value['id']]));
						}
					}
				}
			}
		}
}

else if($new_settings['resetreq']=='undo')	
{
	foreach ($_COOKIE as $key=>$val)				//Scans and set relevant cookies
	{
		if (strpos($key,VE_THEME_SLUG) !== false)
		{
			$key_elements = explode("_", $key);
			$key_end = end($key_elements);
			if(($key_end!='undo')&&($key_end!='redo')&&isset($_COOKIE[$key.'_undo']))
			{
				setcookie($key.'_redo', $_COOKIE[$key], $cookie_expire, '/');
				setcookie($key, $_COOKIE[$key.'_undo'], $cookie_expire, '/');
				if(isset($_COOKIE[$key.'_undo']))
				{	setcookie($key.'_undo',  "", time()-3600,'/');
					unset($_COOKIE[$key.'_undo']);
				}
			}
		}
	}
}
else if($new_settings['resetreq']=='redo')	
{
	foreach ($_COOKIE as $key=>$val)				//Scans and set relevant cookies
	{
		if (strpos($key,VE_THEME_SLUG) !== false)
		{
			$key_elements = explode("_", $key);
			$key_end = end($key_elements);
			if(($key_end!='undo')&&($key_end!='redo')&&isset($_COOKIE[$key.'_redo']))
			{
				setcookie($key.'_undo', $_COOKIE[$key], $cookie_expire, '/');
				setcookie($key, $_COOKIE[$key.'_redo'], $cookie_expire, '/');
				setcookie($key.'_redo',  "", time()-3600,'/');
				unset($_COOKIE[$key.'_redo']);
			}
		}
	}
}
else
{
	global $general_fonts, $google_fonts;		
	$fonts = array();			
	foreach($google_fonts as $key => $entry){
		$fonts['google::'.$entry] = $key;
	}
	foreach($general_fonts as $key => $entry){
		$fonts['general::'.$key] = $entry;
	}

	$exclude_fonts = array(
		'google::Aclonica'					=>	'Aclonica',
		'google::PT+Serif+Caption'			=>	'PT Serif Caption',
		'google::Gentium+Book+Basic'		=>	'Gentium Book Basic',
		'google::Loved+by+the+King'			=>	'Loved by the King',
		'google::Petrona'					=>	'Petrona',
		'google::Ultra'						=>	'Ultra',
		'google::Candal'					=>	'Candal',
		'google::Short+Stack'				=>	'Short Stack',
		'google::Geostar'					=>	'Geostar',
		'google::Luckiest+Guy'				=>	'Luckiest Guy',
		'google::Pinyon+Script'				=>	'Pinyon Script',
		'google::Vast+Shadow'				=>	'Vast Shadow',
		'google::Carter+One'				=>	'Carter One',
		'google::Slackey'					=>	'Slackey',
		'google::Geostar+Fill'				=>	'Geostar Fill',
		'google::Meddon'					=>	'Meddon',
		'google::Poller+One'				=>	'Poller One',
		'google::Volkhov'					=>	'Volkhov',
		'google::Cherry+Cream+Soda'			=>	'Cherry Cream Soda',
		'google::Asset'						=>	'Asset',
		'google::Goblin+One'				=>	'Goblin One',
		'google::Merriweather'				=>	'Merriweather',
		'google::Radley'					=>	'Radley',
		'google::Vollkorn'					=>	'Vollkorn',
		'google::Chivo'						=>	'Chivo',
		'google::Adamina'					=>	'Adamina',
		'google::Gravitas+One'				=>	'Gravitas One',
		'google::Michroma'					=>	'Michroma',
		'google::Rammetto+One'				=>	'Rammetto One',
		'google::Wallpoet'					=>	'Wallpoet',
		'google::Cousine'					=>	'Cousine',
		'google::Alice'						=>	'Alice',
		'google::Herr+Von+Muellerhoff'		=>	'Herr Von Muellerhoff',
		'google::Miltonian'					=>	'Miltonian',
		'google::Ribeye'					=>	'Ribeye',
		'google::Yeseva+One'				=>	'Yeseva One',
		'google::Coustard'					=>	'Coustard',
		'google::Alike'						=>	'Alike',
		'google::Holtwood+One+SC'			=>	'Holtwood One SC',
		'google::Miss+Fajardose'			=>	'Miss Fajardose',
		'google::Ribeye+Marrow'				=>	'Ribeye Marrow',
		'google::Days+One'					=>	'Days One',
		'google::Alike+Angular'				=>	'Alike Angular',
		'google::Homemade+Apple'			=>	'Homemade Apple',
		'google::Miss+Saint+Delafield'		=>	'Miss Saint Delafield',
		'google::Rock+Salt'					=>	'Rock Salt',
		'google::Delius+Unicase'			=>	'Delius Unicase',
		'google::Bowlby+One'				=>	'Bowlby One',
		'google::Just+Another+Hand'			=>	'Just Another Hand',
		'google::Monofett'					=>	'Monofett',
		'google::Ruslan+Display'			=>	'Ruslan Display',
		'google::Fontdiner+Swanky'			=>	'Fontdiner Swanky',
		'google::Butcherman+Caps'			=>	'Butcherman Caps',
		'google::Just+Me+Again+Down+Here'	=>	'Just Me Again Down Here',
		'google::Monoton'					=>	'Monoton',
		'google::Sigmar+One'				=>	'Sigmar One',
		'google::Lemon'						=>	'Lemon',
		'google::Coda:800'					=>	'Coda',
		'google::Knewave'					=>	'Knewave',
		'google::Monsieur+La+Doulaise'		=>	'Monsieur La Doulaise',
		'google::Six+Caps'					=>	'Six Caps',
		'google::Merienda+One'				=>	'Merienda One',
		'google::Corben:bold'				=>	'Corben',
		'google::Kristi'					=>	'Kristi',
		'google::Mr+Dafoe'					=>	'Mr Dafoe',
		'google::Sniglet:800'				=>	'Sniglet',
		'google::Modern+Antiqua'			=>	'Modern Antiqua',
		'google::Dorsa'						=>	'Dorsa',
		'google::La+Belle+Aurore'			=>	'La Belle Aurore',
		'google::Mr+De+Haviland'			=>	'Mr De Haviland',
		'google::Syncopate'					=>	'Syncopate',
		'google::Numans'					=>	'Numans',
		"google::Dr+Sugiyama" 				=> 	'Dr Sugiyama',
		'google::League+Script'				=>	'League Script',
		'google::Nosifer+Caps'				=>	'Nosifer Caps',
		"google::Tienne" 					=>	'Tienne',
		'google::Orbitron'					=>	'Orbitron',
		'google::Eater+Caps'				=>	'Eater Caps',
		'google::Limelight'					=>	'Limelight',
		'google::Over+the+Rainbow'			=>	'Over the Rainbow',
		'google::Tulpen+One'				=>	'Tulpen One',
	);

	$fonts = array_diff_assoc($fonts, $exclude_fonts);

					
	//print_r($_COOKIE);
	if (!(isset($new_settings['global_lock_toggle']) && $new_settings['global_lock_toggle'] == 'true')) {
		$new_settings['global_lock_toggle'] = '';
	}

	//	$saved_settings = get_option(VE_THEME_SLUG.'_visual_editor_settings');		
	if (!(isset($new_settings['general_colors']) && $new_settings['general_colors'] == 'true')) {
		$new_settings['general_colors'] == '';
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_primary_color"]) && $new_settings["lock_".VE_THEME_SLUG."_primary_color"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_primary_color"] = '';
			$new_settings[VE_THEME_SLUG."_primary_color"] = visual_editor_generate_random_color(); 
		}
		$complemetary_colors = visual_editor_complementary_colors($new_settings[VE_THEME_SLUG."_primary_color"]);
		$new_settings[VE_THEME_SLUG."_complemetary_colors"] = serialize($complemetary_colors);
		$opposite_color = visual_editor_opposite_color($new_settings[VE_THEME_SLUG."_primary_color"]);
		shuffle($complemetary_colors);
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_header_bgcolor"]) && $new_settings["lock_".VE_THEME_SLUG."_header_bgcolor"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_header_bgcolor"] = '';
			$temp_array = array($complemetary_colors[2], $complemetary_colors[2], $complemetary_colors[2], $complemetary_colors[2], $complemetary_colors[2], $complemetary_colors[2], $complemetary_colors[2], $complemetary_colors[2], $complemetary_colors[2], 'fafafa'); 
			$temp_key = array_rand($temp_array);
			$new_settings[VE_THEME_SLUG."_header_bgcolor"] = $temp_array[$temp_key];
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_bgcolor"]) && $new_settings["lock_".VE_THEME_SLUG."_bgcolor"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_bgcolor"] = '';
			$temp_array = array($complemetary_colors[1], $complemetary_colors[1], $complemetary_colors[1], $complemetary_colors[1], $complemetary_colors[1], $complemetary_colors[1], $complemetary_colors[1], $complemetary_colors[1], 'fafafa', 'eeeeee'); 
			$temp_key = array_rand($temp_array);	
			$new_settings[VE_THEME_SLUG."_bgcolor"] = $temp_array[$temp_key];
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_top_toolbar_bgcolor"]) && $new_settings["lock_".VE_THEME_SLUG."_top_toolbar_bgcolor"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_top_toolbar_bgcolor"] = '';
			$new_settings[VE_THEME_SLUG."_top_toolbar_bgcolor"] = $complemetary_colors[3];
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_footer_bar_bgcolor"]) && $new_settings["lock_".VE_THEME_SLUG."_footer_bar_bgcolor"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_footer_bar_bgcolor"] = '';
			$new_settings[VE_THEME_SLUG."_footer_bar_bgcolor"] = $complemetary_colors[4];
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_buttoncolor"]) && $new_settings["lock_".VE_THEME_SLUG."_buttoncolor"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_buttoncolor"] = '';
			$new_settings[VE_THEME_SLUG."_buttoncolor"] = $complemetary_colors[4];
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_content_bgcolor"]) && $new_settings["lock_".VE_THEME_SLUG."_content_bgcolor"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_content_bgcolor"] = '';
			$temp_array = array($complemetary_colors[0], $complemetary_colors[0], $complemetary_colors[0], $complemetary_colors[0], $complemetary_colors[0], $complemetary_colors[0], $complemetary_colors[0], $complemetary_colors[0], 'fafafa', 'eeeeee'); 
			$temp_key = array_rand($temp_array);		
			$new_settings[VE_THEME_SLUG."_content_bgcolor"] = $temp_array[$temp_key];
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_linkcolor"]) && $new_settings["lock_".VE_THEME_SLUG."_linkcolor"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_linkcolor"] = '';
			$new_settings[VE_THEME_SLUG."_linkcolor"] = $complemetary_colors[2];
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_secondarycolor"]) && $new_settings["lock_".VE_THEME_SLUG."_secondarycolor"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_secondarycolor"] = '';
			$new_settings[VE_THEME_SLUG."_secondarycolor"] = $opposite_color;
		}
		// Group 1 and 2 (for block 2 and 9)
		// Group 1 and 3 (for block 3 and 8 and for block 1 and 9)		
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_h1_font_color"]) && $new_settings["lock_".VE_THEME_SLUG."_h1_font_color"] == 'true')) {	
			$new_settings["lock_".VE_THEME_SLUG."_h1_font_color"] = '';
			$new_settings[VE_THEME_SLUG."_h1_font_color"] = visual_editor_contrast_color($complemetary_colors, $new_settings[VE_THEME_SLUG."_content_bgcolor"], "");		
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_gcontent_font_color"]) && $new_settings["lock_".VE_THEME_SLUG."_gcontent_font_color"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_gcontent_font_color"] = '';
			$new_settings[VE_THEME_SLUG."_gcontent_font_color"] = visual_editor_contrast_color($complemetary_colors, $new_settings[VE_THEME_SLUG."_content_bgcolor"], "");
		}
		if (!(isset($new_settings["lock_".VE_THEME_SLUG."_button_font_color"]) && $new_settings["lock_".VE_THEME_SLUG."_button_font_color"] == 'true')) {
			$new_settings["lock_".VE_THEME_SLUG."_button_font_color"] = '';
			$new_settings[VE_THEME_SLUG."_button_font_color"] = visual_editor_contrast_color($complemetary_colors, $new_settings[VE_THEME_SLUG."_buttoncolor"], "");		
		}	
	} else {
		$new_settings[VE_THEME_SLUG."_primary_color"] = $_COOKIE[VE_THEME_SLUG."_primary_color"];
		$new_settings[VE_THEME_SLUG."_header_bgcolor"] = $_COOKIE[VE_THEME_SLUG."_header_bgcolor"];
		$new_settings[VE_THEME_SLUG."_bgcolor"] = $_COOKIE[VE_THEME_SLUG."_bgcolor"];
		$new_settings[VE_THEME_SLUG."_top_toolbar_bgcolor"] = $_COOKIE[VE_THEME_SLUG."_top_toolbar_bgcolor"];
		$new_settings[VE_THEME_SLUG."_footer_bar_bgcolor"] = $_COOKIE[VE_THEME_SLUG."_footer_bar_bgcolor"];
		$new_settings[VE_THEME_SLUG."_buttoncolor"] = $_COOKIE[VE_THEME_SLUG."_buttoncolor"];
		$new_settings[VE_THEME_SLUG."_content_bgcolor"] = $_COOKIE[VE_THEME_SLUG."_content_bgcolor"];
		$new_settings[VE_THEME_SLUG."_linkcolor"] = $_COOKIE[VE_THEME_SLUG."_linkcolor"];
		$new_settings[VE_THEME_SLUG."_secondarycolor"] = $_COOKIE[VE_THEME_SLUG."_secondarycolor"];
		$new_settings[VE_THEME_SLUG."_h1_font_color"] = $_COOKIE[VE_THEME_SLUG."_h1_font_color"];
		$new_settings[VE_THEME_SLUG."_gcontent_font_color"] = $_COOKIE[VE_THEME_SLUG."_gcontent_font_color"];
		$new_settings[VE_THEME_SLUG."_button_font_color"] = $_COOKIE[VE_THEME_SLUG."_button_font_color"];
	}

	//	print_r($new_settings);
	foreach ($GLOBALS['visual_editor_settings'] as $key=>$settings) {
		if ($key != 'misc_area_patterns') {
		//	echo $new_settings[$id];
			if (isset($new_settings[$key]) && $new_settings[$key] == 'true') {
				foreach ($settings as $id=>$option) {
					if (!isset($new_settings[$option['id']])) {
						$new_settings[$option['id']] = isset($_COOKIE[$option['id']]) ? $_COOKIE[$option['id']] : 'null';
						if ($option['type'] == 'toggle') {
							$new_settings[$option['id']] = "false";
						}
					}
				}
			} else {
				$new_settings[$key] = '';
				foreach ($settings as $id=>$option) {
					$set_random = true;
					if (isset($option['lock']) && $option['lock']) {
						if (!(isset($new_settings["lock_".$option['id']]) && $new_settings["lock_".$option['id']] == 'true')) {
							$new_settings["lock_".$option['id']] = '';
						} else {
							$set_random = false;
						}
					}
					if (!isset($new_settings[$option['id']])) {
						$new_settings[$option['id']] = isset($_COOKIE[$option['id']]) ? $_COOKIE[$option['id']] : 'null';
					}
					if ($set_random) {
						if ($option['type'] == 'text') {
							$new_settings[$option['id']] = '';
						} elseif ($option['type'] == 'pixel') {
							$new_settings[$option['id']] = mt_rand($option['min'], $option['max']);
						} elseif ($option['type'] == 'select') {
							$new_settings[$option['id']] = array_rand($option['data']);	
						} elseif ($option['type'] == 'radio_group') {
							$new_settings[$option['id']] = array_rand($option['data']);	
						} elseif ($option['type'] == 'font') {					
							$new_settings[$option['id']] = array_rand($fonts);	
						} elseif ($option['type'] == 'toggle') {
							$array = array("true", "false");
							$rand_key = array_rand($array);
							$new_settings[$option['id']] = $array[$rand_key];
						}
						
						if ($option['id'] == VE_THEME_SLUG."_text_shadow") {
							$new_settings[$option['id']] = 'none';
						}
					}
				}
			}
			
			foreach ($settings as $id=>$option) {
				if ($option['id'] == VE_THEME_SLUG."_bgimage" && $new_settings[$option['id']]) {
					if (isset($new_settings[$key]) && $new_settings[$key] == 'true') {
						$new_settings[VE_THEME_SLUG."_site_gradient"] = "null";
					} else {
						if (mt_rand(1,2) == 2) {
							$new_settings[$option['id']] = "null";
						} else {
							$new_settings[$option['id']] = THEME_BACKGROUNDS.$new_settings[$option['id']];
						}
					}			
				}
			}
			
			if ($new_settings[VE_THEME_SLUG."_header_attachment"] != 'full-width') {
				$new_settings[VE_THEME_SLUG."_header_layout"] = "fixed-width";
			}
			
			if ($new_settings[VE_THEME_SLUG."_header_bgcolor"] != $new_settings[VE_THEME_SLUG."_content_bgcolor"]) {
				if (!(isset($new_settings['elements_page_elements']) && $new_settings['elements_page_elements'] == 'true')) {
					$new_settings[VE_THEME_SLUG."_header_divider"] = "false";
				}
			}
			
			if (!(isset($new_settings['elements_page_elements']) && $new_settings['elements_page_elements'] == 'true')) {
				if ($new_settings[VE_THEME_SLUG."_logo"] == "false") {
					$new_settings[VE_THEME_SLUG."_main_menu"] = "true";
				} elseif ($new_settings[VE_THEME_SLUG."_main_menu"] == "false") {
					$new_settings[VE_THEME_SLUG."_logo"] = "true";
					if ($new_settings[VE_THEME_SLUG."_logo_position"] != "header") {
						$new_settings[VE_THEME_SLUG."_logo_position"] = "header";
					}
				}
				if ($new_settings[VE_THEME_SLUG."_top_bar"] == "false") {
					$new_settings[VE_THEME_SLUG."_logo_position"] = "header";
				}
			}
			
			$luminance = 0;
			if ($_COOKIE[VE_THEME_SLUG."_gradience"] == "light") {
				$luminance = 0.45;
			} elseif ($_COOKIE[VE_THEME_SLUG."_gradience"] == "dark") {
				$luminance = -0.45;
			}
			if ($_COOKIE[VE_THEME_SLUG."_content_area_gradient"] == "true") {
			//	$new_settings[VE_THEME_SLUG."_gcontent_font_color"] = visual_editor_contrast_color($complemetary_colors, $new_settings[VE_THEME_SLUG."_content_bgcolor"], $luminance);
			}
		}
	}

	//print_r($new_settings);
	$cookie_expire = time() + (3600*6);

	foreach ($new_settings as $key=>$value) {
		if (strpos($key,VE_THEME_SLUG) !== false) 
		{
			setcookie($key.'_undo', $_COOKIE[$key], $cookie_expire, '/');
			setcookie($key, $value, $cookie_expire, '/');
			setcookie($key.'_redo',  "", time()-3600,'/');
			unset($_COOKIE[$key.'_redo']);
		}
	}
	setcookie('visual_editor_generate', '1', $cookie_expire, '/');

	//	print_r($complemetary_colors);	
	//	print_r($new_settings);
	//	update_option(VE_THEME_SLUG.'_visual_editor_settings', $new_settings);
	//	$GLOBALS['visual_editor_settings_saved'] = get_option(VE_THEME_SLUG.'_visual_editor_settings');
	//	print_r($GLOBALS['visual_editor_settings_saved']);
}