<?php 
header("Content-Type:text/javascript");

//Setup URL to WordPres
$absolute_path = __FILE__;
$path_to_wp = explode( 'wp-content', $absolute_path );
$wp_url = $path_to_wp[0];

//Access WordPress
require_once( $wp_url.'/wp-load.php' );

//URL to TinyMCE plugin folder
$plugin_url = THEME_HOME.'/includes/theme_shortcodes/tinymce/';

$show = $_GET['show'];
$sc = '';
foreach($GLOBALS['shortcodes'] as $shortcode){
	if($shortcode['value'] == $show){
		$sc = $shortcode;
	}
}

?>
(function() {
    tinymce.PluginManager.add('<?php echo $sc['value']; ?>', function(editor, url) {
        editor.addButton('<?php echo $sc['value']; ?>', {
			<?php if($sc['sub']) { ?>
 			type: 'menubutton',
			<?php } ?>
			title: '<?php echo $sc['name']; ?>',
			icon: '<?php echo $sc['value']; ?>',
			<?php if($sc['sub']) { $sub_menu = array(); ?>
			menu: [
				<?php foreach($sc['options'] as $sc1) { $sub_menu[] = '{text:\''.$sc1['name'].'\', onclick: function() {tb_show("Insert '.$sc1['name'].' Shortcode", "'.THEME_HOME.'/framework/admin/shortcodes/dialog.php?post='.$_GET['post'].'&show='.$sc['value'].'&amp;show1='.$sc1['value'].'&amp;TB_iframe=1");}}'; } ?>
				<?php echo implode(',', $sub_menu); ?>
            ],
 			<?php } ?>
			onclick: function() {
				<?php if(!$sc['sub']) { ?>
				tb_show("Insert <?php echo $sc['name']; ?> Shortcode", "<?php echo THEME_HOME; ?>/framework/admin/shortcodes/dialog.php?post=<?php echo $_GET['post']; ?>&show=<?php echo $sc['value']; ?>&amp;TB_iframe=1");
				<?php } ?>
			}			
       });	
    });
})();
<?php 
