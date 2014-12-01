<?php

define('THEME_NAME', 'Custom Framework');
define('THEME_SLUG', 'revowp');

define('THEME_DIR', get_template_directory());
define('THEME_FUNCTIONS', THEME_DIR . '/framework/functions');
define('THEME_WIDGETS', THEME_DIR . '/framework/widgets');
define('THEME_SHORTCODES', THEME_DIR . '/framework/shortcodes');
define('THEME_ADMIN', THEME_DIR . '/framework/admin');
define('THEME_CONTENT', THEME_DIR . '/framework/content');
define('THEME_HOME', get_template_directory_uri());
define('THEME_JS', THEME_HOME . '/js');
define('THEME_FRAMEWORK', THEME_HOME . '/framework');
define('THEME_CSS', THEME_HOME . '/css');
define('THEME_CURR_PAGE', $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);


require_once(THEME_FUNCTIONS . '/theme-functions.php');
require_once(THEME_FUNCTIONS . '/nav-output.php');
require_once(THEME_FUNCTIONS . '/custom-styles.php');
require_once(THEME_FUNCTIONS . '/breadcrumbs-plus/breadcrumbs-plus.php');
require_once(THEME_FUNCTIONS . '/sidebar_generator.php');
require_once(THEME_FUNCTIONS . '/wp-pagenavi.php');
require_once(THEME_ADMIN . '/layout/fieldgenerator.php');
require_once(THEME_ADMIN . '/layout/metaboxgenerator.php');


require_once(THEME_WIDGETS . '/archives.php');
require_once(THEME_WIDGETS . '/categories.php');
require_once(THEME_WIDGETS . '/contact-us.php');
require_once(THEME_WIDGETS . '/ads.php');


require_once(THEME_SHORTCODES . '/uicontrols.php');
require_once(THEME_SHORTCODES . '/boxes.php');
require_once(THEME_SHORTCODES . '/html.php');
require_once(THEME_SHORTCODES . '/layout.php');
require_once(THEME_SHORTCODES . '/video.php');
require_once(THEME_SHORTCODES . '/social.php');
require_once(THEME_SHORTCODES . '/pricing-blocks.php');
require_once(THEME_SHORTCODES . '/snippets.php');
require_once(THEME_SHORTCODES . '/team.php');


require_once(THEME_CONTENT . '/style-options.php');
require_once(THEME_CONTENT . '/sidebars.php');
require_once(THEME_CONTENT . '/social-icons.php');
require_once(THEME_CONTENT . '/buttons.php');
require_once(THEME_CONTENT . '/images.php');
require_once(THEME_CONTENT . '/blog.php');
require_once(THEME_CONTENT . '/twitter/twitter.php');
require_once(THEME_CONTENT . '/facebook.php');
require_once(THEME_CONTENT . '/gplus.php');
require_once(THEME_CONTENT . '/pinterest.php');
require_once(THEME_CONTENT . '/contact-info.php');
require_once(THEME_CONTENT . '/portfolio/portfolio.php' );
require_once(THEME_CONTENT . '/overlays/overlays.php' );
require_once(THEME_CONTENT . '/really-simple-captcha/really-simple-captcha.php');
require_once(THEME_CONTENT . '/contact-form-7/wp-contact-form-7.php');
require_once(THEME_CONTENT . '/pricetable/pt.php');
require_once(THEME_CONTENT . '/revo-visual-editor/editor.php');

require_once(THEME_ADMIN . '/layout/head.php');
require_once(THEME_ADMIN . '/theme-options/options.php' );
require_once(THEME_ADMIN . '/theme-options/generator.php' );
require_once(THEME_ADMIN . '/theme-options/import-export.php' );
require_once(THEME_ADMIN . '/shortcodes/predone_layouts.php' );
require_once(THEME_ADMIN . '/shortcodes/shortcodes.php');
require_once(THEME_ADMIN . '/page-general-metabox.php');
require_once(THEME_ADMIN . '/updater.php');
require_once(THEME_ADMIN . '/theme-activation.php');
require_once(THEME_ADMIN . '/plugin-activation.php');

require_once(THEME_CONTENT . '/cf7-email-integration/cf7-email-integration.php');


if(!isset($content_width)) $content_width = 960;

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
add_filter('widget_text', 'do_shortcode');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');

$GLOBALS['vt_options'] = array(); 
foreach($theme_options as $option){
	if(is_array($option['options'])){		
		foreach($option['options'] as $value) {
			if(isset($value['id'])){	
				$GLOBALS['vt_options'][$value['id']] = get_option($value['id']);
				if($GLOBALS['vt_options'][$value['id']] === FALSE){
					update_option($value['id'], $value['std']);
					$GLOBALS['vt_options'][$value['id']] = $value['std'];
				}
			}
		}			
	}
} 

$GLOBALS['header_attachment'] = theme_get_option(THEME_SLUG.'_header_attachment');
$GLOBALS['footer_attachment'] = theme_get_option(THEME_SLUG.'_footer_attachment');
$GLOBALS['content_bgcolor'] = theme_get_option(THEME_SLUG."_content_bgcolor");

add_filter('body_class','custom_body_classes');
function custom_body_classes($classes) {
	if(!$GLOBALS['content_bgcolor']){
		$classes[] = 'progressive-content';
	}
	$classes[] = 'header-top-'.$GLOBALS['header_attachment'];
	$classes[] = 'footer-'.$GLOBALS['footer_attachment'];
	$classes[] = theme_get_option(THEME_SLUG."_box_shadow") == "true" ? 'box-shadow' : '';
	return $classes;
}