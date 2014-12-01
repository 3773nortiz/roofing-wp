<?php

add_action('admin_init', 'theme_check_rve_plugin_installation');

function theme_check_rve_plugin_installation() {

	if (is_plugin_active('revo-visual-editor/editor.php')) {
		deactivate_plugins('revo-visual-editor/editor.php');
	}
}

if (!function_exists('visualeditor_scripts')) {

	define('THEME_BACKGROUNDS', WP_CONTENT_URL . '/themes/revowp/images/backgrounds/');
	define('VE_THEME_SLUG', 'revowp');

	if(!is_array($theme_options)) { $theme_options = array(); }

	$textures = array(
		"" => "None",
		'Big-Hearts.png' => "Big Hearts",
		'Crosshatch-Thick.png' => "Crosshatch Thick",
		'Crosshatch-Thin.png' => "Crosshatch Thin",
		'Diagonal-Back.png' => "Diagonal Back",
		'Diagonal-Back-Pinstripe.png' => "Diagonal Back Pinstripe",
		'Diagonal-Front.png' => "Diagonal Front",
		'Diagonal-Front-Pinstripe.png' => "Diagonal Front Pinstripe",
		'Diamonds.png' => "Diamonds",
		'Dots-Staggered.png' => "Dots Staggered",
		'Double-Grid-Dark.png' => "Double Grid Dark",
		'Double-Grid-Light.png' => "Double Grid Light",
		'Grain.png' => "Grain",
		'Grid-Medium.png' => "Grid Medium",
		'Grid-Textured-Large.png' => "Grid Textured Large",
		'Grid-Textured-Small.png' => "Grid Textured Small",
		'Grid-Thick.png' => "Grid Thick",
		'Grid-Thin.png' => "Grid Thin",
		'Horizontal-Thick.png' => "Horizontal Thick",
		'Horizontal-Thin.png' => "Horizontal Thin",
		'Horizontal-Medium.png' => "Horizontal Medium",
		'Little-Hearts.png' => "Little Hearts",
		'Mesh.png' => "Mesh",
		'Noisy.png' => "Noisy",
		'Noisy-Light.png' => "Noisy Light",
		'Paper.png' => "Paper",
		'Parchment.png' => "Parchment",
		'Patriotic-Stars.png' => "Patriotic Stars",
		'Plaster.png' => "Plaster",
		'Polished-Loose.png' => "Polished Loose",
		'Polished-Tight.png' => "Polished Tight",
		'Rings.png' => "Rings",
		'Scratchy.png' => "Scratchy",
		'Small-Dots.png' => "Small Dots",
		'Stone.png' => "Stone",
		'Stone-Sanded.png' => "Stone Sanded",
		'Veloso-Special.png' => "Revo Special",
		'Verticle-Medium.png' => "Verticle Medium",
		'Verticle-Thick.png' => "Verticle Thick",
		'Verticle-Thin.png' => "Verticle Thin",
		'Verticle-Ultra-Thin.png' => "Verticle Ultra Thin",
		'dark-35.png' => "Dark 35",
		'dark-50.png' => "Dark 50",
		'dark-70.png' => "Dark 70",
		'light-35.png' => "Light 35",
		'light-50.png' => "Light 50",
		'light-70.png' => "Light 70",
	);

	require_once(THEME_CONTENT.'/revo-visual-editor/functions.php');
	require_once(THEME_CONTENT.'/revo-visual-editor/options.php');
	require_once(THEME_CONTENT.'/revo-visual-editor/export.php');
	require_once(THEME_CONTENT.'/revo-visual-editor/set-options.php');
}		
		

$visual_editor_settings_saved = array();

if (get_option(THEME_SLUG.'_revo_visual_editor') == 'true') {
	if ( is_user_logged_in() ) : 													//Proceed only if user is logged in (i.e User is logged in)
	if( current_user_can('edit_theme_options') ) : 								//Proceed only if the user can edit_theme_option
		if(!isset($GLOBALS['shortcode_preview'])){
			add_action('wp_enqueue_scripts', 'visualeditor_scripts');
			add_action('wp_print_styles', 'visualeditor_css');
			add_action('wp_footer', 'visualeditor_options');
		}
	
			add_action('wp_ajax_visualeditor', 'theme_visualeditor_callback');
			add_action('wp_ajax_nopriv_visualeditor', 'theme_visualeditor_callback');
			add_filter('init', 'theme_visual_editor_add_query_var_vars');
	endif;
	endif;
}

if (!function_exists('visualeditor_scripts')) {
	function visualeditor_scripts(){
		wp_enqueue_script('visual-editor', THEME_FRAMEWORK.'/content/revo-visual-editor/visual-editor.js', array('jquery'), false, true);
		wp_enqueue_script('theme-colorpicker', THEME_FRAMEWORK.'/admin/layout/js/colorpicker.js', array('jquery'), false, true);
		wp_enqueue_script('theme-jqui', THEME_JS.'/jquery-ui-1.7.3.custom.min.js', array('jquery'), false, true);
	}
}

if (!function_exists('visualeditor_css')) {
	function visualeditor_css(){
		wp_enqueue_style("visual-editor", THEME_FRAMEWORK.'/content/revo-visual-editor/visual-editor.css');
		wp_enqueue_style("theme-colorpicker", THEME_FRAMEWORK.'/admin/layout/css/colorpicker.css');
	}
}

if (!function_exists('visualeditor_options')) {
	function visualeditor_options(){
		
	//	print_r($_COOKIE); 
		foreach ($GLOBALS['visual_editor_settings'] as $key=>$settings) {
			foreach ($settings as $id=>$option) {
				$GLOBALS['visual_editor_settings'][$key][$id]['value'] = (isset($GLOBALS['visual_editor_options'][$id]) ? $GLOBALS['visual_editor_options'][$id] : '');
			}
		}
?>
<div id="visualeditor_wrapper">
	<div class="visualeditor">
		<div id="visualeditor_btn"></div>
		<form id="visualeditor_form" method="POST" action="<?php echo add_query_arg(array('visual_editor_generate'=>'go')); ?>">
		<!-- Hidden Field Set as "Reset" if the form is to be reset -->
		<input type="hidden" name="resetreq" value="no">
		<div class="tabs_container tabs">
			<ul>
				<li><h4><a href="#tabs_visualeditor_1">General</a></h4></li>
				<li><h4><a href="#tabs_visualeditor_2">Elements</a></h4></li>
				<li><h4><a href="#tabs_visualeditor_3">Layout</a></h4></li>
				<li><h4><a href="#tabs_visualeditor_4">Misc</a></h4></li>
			</ul>
			<div id="tabs_visualeditor_1">
				<?php include(THEME_CONTENT.'/revo-visual-editor/options/general.php'); ?>
			</div>
			<div id="tabs_visualeditor_2">
				<?php include(THEME_CONTENT.'/revo-visual-editor/options/elements.php'); ?>
			</div>
			<div id="tabs_visualeditor_3">
				<?php include(THEME_CONTENT.'/revo-visual-editor/options/layout.php'); ?>
			</div>
			<div id="tabs_visualeditor_4">
				<?php include(THEME_CONTENT.'/revo-visual-editor/options/misc.php'); ?>
			</div>
		</div>
		<div class="visual-editor-global-lock">
			<div class="visual-editor-element visual-editor-input-toggle"><div class="visual-editor-field"><input type="checkbox" name="global_lock_toggle" id="global_lock_toggle" value="true" <?php echo (isset($_COOKIE['global_lock_toggle']) && $_COOKIE['global_lock_toggle'] == 'true' ? 'checked' : ''); ?>></div><div class="visual-editor-label"><label for="global_lock_toggle">Global Lock Toggle:</label></div></div>
		</div>
		</form>
		<div class="clear"></div>
		<table style="width:100%; margin-bottom:10px;">
		<tr>
			<td rowspan="2"> <a href="" class="undo-btn" title="Undo"> Undo </a> </td>
			<td>
				<a href="<?php echo add_query_arg(array('visual_editor_export_options'=>'safe_download', 'nonce'=>wp_create_nonce(md5(site_url()))), site_url()); ?>" class="export-btn">Export</a>
			</td>
			<td>	<a href="" class="reset-btn">Reset</a>			</td>
			<td rowspan="2"> <a href="" class="redo-btn"  title="Redo"> Redo </a> </td>
		</tr>
		<tr>
			<td>	<a href="#" class="generate-btn">Generate</a>	</td>
			<td>	<a href="#" class="save-btn">Save</a>	</td>
		</tr>
		</table>	
	</div>
</div>
<?php
	}
}

if (!function_exists('theme_visualeditor_callback')) {
	function theme_visualeditor_callback(){	
		require_once(THEME_CONTENT.'/revo-visual-editor/generate.php');
		exit(0);
	}
}

if (!function_exists('theme_visual_editor_add_query_var_vars')) {
	function theme_visual_editor_add_query_var_vars() {
		global $wp;
		$wp->add_query_var('visual_editor_export_options');
	}
}