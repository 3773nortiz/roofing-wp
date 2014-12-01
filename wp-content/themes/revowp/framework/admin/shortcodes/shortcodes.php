<?php

require_once(THEME_ADMIN . '/shortcodes/options.php');

if (get_option(THEME_SLUG.'_is_dashboard_locked') != 'true' || (get_option(THEME_SLUG.'_is_dashboard_locked') == 'true' && get_option(THEME_SLUG.'_editor_shortcode_buttons') != 'false')) {
	add_action('init', 'shortcodes_button');
}

function shortcodes_button(){ 
	if(!current_user_can('edit_posts') && !current_user_can('edit_pages')){
		return;
	}
	if(get_user_option('rich_editing') == 'true'){
		$version = get_bloginfo('version');
		if ($version < 3.9) {	
			add_filter('mce_external_plugins', 'add_editor_plugin');
		} else {
			add_filter('mce_external_plugins', 'add_editor_plugin_new');
		}
		add_filter('mce_buttons_3', 'register_button_3');
	} 
}

function register_button_3($buttons){
	foreach($GLOBALS['shortcodes'] as $shortcode){
		 array_push($buttons, $shortcode['value']);
	}
	return $buttons;
}

function add_editor_plugin($plugin_array){
	foreach($GLOBALS['shortcodes'] as $shortcode){
		$plugin_array[$shortcode['value']] = THEME_HOME.'/framework/admin/shortcodes/editor.php?post='.$_GET['post'].'&show='.$shortcode['value'];	
	}   
	return $plugin_array;
}

function add_editor_plugin_new($plugin_array){
	foreach($GLOBALS['shortcodes'] as $shortcode){
		$plugin_array[$shortcode['value']] = THEME_HOME.'/framework/admin/shortcodes/editor_new.php?post='.$_GET['post'].'&show='.$shortcode['value'];	
	}   
	return $plugin_array;
}
