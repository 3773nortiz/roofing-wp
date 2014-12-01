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
    tinymce.create('tinymce.plugins.<?php echo $sc['value']; ?>', {
        
		createControl: function(n, cm) {
            switch (n) {
                case '<?php echo $sc['value']; ?>':
				<?php if($sc['sub']) { ?>
					var c = cm.createSplitButton('<?php echo $sc['value']; ?>', {
						title : '<?php echo $sc['name']; ?>',
						image : '<?php echo THEME_HOME; ?>/framework/admin/layout/images/sc_icons/<?php echo $sc['icon']; ?>',
						onclick : function() {
						}
					});				
				<?php }else{ ?>	
					var c = cm.createMenuButton('<?php echo $sc['value']; ?>', {
						title : '<?php echo $sc['name']; ?>',
						image : '<?php echo THEME_HOME; ?>/framework/admin/layout/images/sc_icons/<?php echo $sc['icon']; ?>',
						icons : false,
						onclick : function() {
							tb_show("Insert <?php echo $sc['name']; ?> Shortcode", "<?php echo THEME_HOME; ?>/framework/admin/shortcodes/dialog.php?post=<?php echo $_GET['post']; ?>&show=<?php echo $sc['value']; ?>&amp;TB_iframe=1");
						}
					});	
				<?php } ?>
               
                c.onRenderMenu.add(function(c, m) {
					
					<?php if($sc['sub']) { ?>
						m.add({title : '<?php echo $sc['name']; ?>', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
						<?php foreach($sc['options'] as $sc1) { ?>
							m.add({title : '<?php echo $sc1['name']; ?>', onclick : function() {
								tb_show("Insert <?php echo $sc1['name']; ?> Shortcode", "<?php echo THEME_HOME; ?>/framework/admin/shortcodes/dialog.php?post=<?php echo $_GET['post']; ?>&show=<?php echo $sc['value']; ?>&amp;show1=<?php echo $sc1['value']; ?>&amp;TB_iframe=1");
							}});
						<?php } ?>
					<?php } ?>				
                });

                return c;                
            }
            return null;
        }
    });
    tinymce.PluginManager.add('<?php echo $sc['value']; ?>', tinymce.plugins.<?php echo $sc['value']; ?>);
})();
<?php 
