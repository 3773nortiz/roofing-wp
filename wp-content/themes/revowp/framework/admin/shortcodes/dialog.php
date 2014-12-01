<?php 
//Setup URL to WordPres
$absolute_path = __FILE__;
$path_to_wp = explode( 'wp-content', $absolute_path );
$wp_url = $path_to_wp[0];

//Access WordPress
require_once( $wp_url.'/wp-load.php' );

add_action('init', 'init_theme_method');
 
function init_theme_method() {
   add_thickbox();
}

function theme_sc_admin_enqueue() {

	wp_enqueue_script('theme_js', THEME_HOME.'/framework/admin/layout/js/admin.js', array('jquery'), false );
    wp_enqueue_script('theme_colorpicker_script', THEME_HOME.'/framework/admin/layout/js/colorpicker.js', array('jquery'), false );
	wp_enqueue_script('theme_eye_script', THEME_HOME.'/framework/admin/layout/js/eye.js', array('jquery'), false );
	wp_enqueue_script('prettyphoto', THEME_HOME.'/framework/admin/layout/js/jquery.prettyPhoto.js', array('jquery'), false );
	wp_enqueue_script('selectbox', THEME_HOME.'/framework/admin/layout/js/jquery.selectBox.min.js', array('jquery'), false );
	wp_enqueue_script('datepicker', THEME_HOME.'/framework/admin/layout/js/jquery.ui.datepicker.js', array('jquery-ui-core'), false );
}

add_action('admin_print_scripts', 'theme_sc_admin_enqueue');

//URL to TinyMCE plugin folder
$plugin_url = THEME_HOME.'/includes/theme_shortcodes/tinymce/';

$show = $_GET['show'];
$shortcode = '';
foreach($GLOBALS['shortcodes'] as $sc){
	if($sc['value'] == $show){
		$shortcode = $sc;
	}
}
$show1 = '';
if($shortcode['sub']){
	$show1 = $_GET['show1'];
	foreach($shortcode['options'] as $sc1){
		if($sc1['value'] == $show1){
			$shortcode_parent = $shortcode;
			$shortcode = $sc1;
		}
	}
}
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="<?php echo THEME_HOME; ?>/framework/admin/layout/css/colorpicker.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo THEME_HOME; ?>/framework/admin/layout/css/admin.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo THEME_HOME; ?>/framework/admin/layout/css/prettyPhoto.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo THEME_HOME; ?>/framework/admin/layout/css/jquery.selectBox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo THEME_HOME; ?>/framework/admin/layout/css/datepicker/jquery.ui.all.css" type="text/css" media="screen" />
<?php wp_admin_css( 'wp-admin', true ); wp_admin_css( 'colors-fresh', true ); ?> 
<?php do_action('admin_print_scripts'); ?>
<script type="text/javascript" src="<?php echo THEME_HOME; ?>/framework/admin/shortcodes/shortcodes.js"></script>
</head>
<body>
<div id="theme-shortcode">
<input type="hidden" name="show" value="<?php echo $show; ?>" />
<?php if($show1) : ?><input type="hidden" name="sc_<?php echo $show; ?>_selector" value="<?php echo $show1; ?>" /><?php endif; ?>
<div id="shortcode_<?php echo $shortcode['value']; ?>" class="shortcode_wrap">
<?php
	if($show1){
		echo '<div id="sub_shortcode_'.$shortcode['value'].'">';
		foreach($shortcode['options'] as $option){
			$option['id']='sc_'.$shortcode_parent['value'].'_'.$shortcode['value'].'_'.$option['id'];
			$option['current'] = $option['std'];
			echo generateField($option);
		}
		echo '</div>';
	}else{		
		foreach($shortcode['options'] as $option){				
			$option['id']='sc_'.$shortcode['value'].'_'.$option['id'];
			$option['current'] = $option['std'];
			echo generateField($option);	
		}
		
	}
?>
</div>
<div id="shortcode_preview" style="display:none;"></div><input type="hidden" name="shortcode_preview_url" id="shortcode_preview_url" value="<?php echo THEME_HOME; ?>/framework/admin/shortcodes/preview.php?post=<?php echo $_GET['post']; ?>" />
<p style="float:left;margin-right:10px;"><input type="button" id="shortcode_generate" class="button" value="Preview Shortcode" /></p>
<p style="float:left;margin-right:10px;"><input type="button" id="shortcode_send" class="button" value="Send to editor" /></p>
<div style="clear:both;"></div></div>

</body>
</html>