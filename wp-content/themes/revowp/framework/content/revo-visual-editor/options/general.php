<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Colors', 'id'=>'general_colors', 'info'=>'<b>Primary Color Block = </b>Used For Generating All Complimenting Colors (When set you must click generate for colors to be generated)<br /><b>Block 1 = </b>Headings (H1, H2, H3&#8230;etc.)<br /><b>Block 2 = </b>General Content<br /><b>Block 3 = </b>Menu Font, Button Font,  Header/Footer links<br /><b>Block 4 = </b>Header Area Background<br /><b>Block 5 = </b>Whole Site Background<br /><b>Block 6 = </b>Widgetized Footer &amp; Top Bar<br /><b>Block 7 = </b>Bottom Footer<br /><b>Block 8 = </b>Buttons &amp; Modern/Executive Menu BG color<br /><b>Block 9 = </b>Content Area<br /><b>Block 10 = </b>Highlight Color<br /><b>Block 11 = </b>Content Area Links')); ?>
	<?php	

	?>	
	<div class="visual-editor-primary-color">
		<div class="visual-editor-label"><label>Primary Color:</label></div>
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_primary_color"]); ?>
	</div><div class="clear"></div>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_h1_font_color"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_gcontent_font_color"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_button_font_color"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_header_bgcolor"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_bgcolor"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_top_toolbar_bgcolor"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_footer_bar_bgcolor"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_buttoncolor"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_content_bgcolor"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_secondarycolor"]); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_colors'][VE_THEME_SLUG."_linkcolor"]); ?>
	<div class="clear"></div>	
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Color Gradients', 'id'=>'general_gradients', 'info'=>'<b>None = </b>No color gradients will be applied to the site backgrounds.<br /><br /><b>Light = </b>A light color gradient (going from the selected color to about 50% lighter) will be applied to selected areas on Elements tab.<br /><br /><b>Dark = </b>A dark color gradient (going from the selected color to about 50% darker) will be applied to selected areas on Elements tab.')); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_gradients'][VE_THEME_SLUG."_gradience"]); ?>
	<div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Menu Style, Alignment & Spacing', 'id'=>'general_menu_style', 'info'=>'<b>First Option = </b>Menu style. This dramatically affects how the main menu looks.<br /><br /><b>Second Option = </b>Spacing between each menu item in pixels.<br /><br /><b>Third Option = </b>Menu Alignment.')); ?>
	<div class="one-third"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_menu_style'][VE_THEME_SLUG."_menu_style"]); ?></div>
	<div class="one-third"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_menu_style'][VE_THEME_SLUG."_mainmenu_padding"]); ?></div>
	<div class="one-third last"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_menu_style'][VE_THEME_SLUG."_menu_align"]); ?></div>	
	<div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Menu / Heading Font Family & Size', 'id'=>'heading_content', 'info'=>'<b>First Option = </b>Font Family<br /><br /><b>Second Option = </b>Font Size in pixels. This will be the font size for the menu and the font size for the H1 tag (Headers on the page). The remaining heading tags will be a descending % smaller than this value.')); ?>
	<div class="two-third"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['heading_content'][VE_THEME_SLUG."_h1_font_family"]); ?></div>
	<div class="one-third last"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['heading_content'][VE_THEME_SLUG."_h1_font_size"]); ?></div>
	<div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Content Font Family & Size', 'id'=>'general_content', 'info'=>'<b>First Option = </b>Font Family<br /><br /><b>Second Option = </b>Font Size in pixels for the general content (excluding headers).')); ?>
	<div class="two-third"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_content'][VE_THEME_SLUG."_gcontent_font_family"]); ?></div>
	<div class="one-third last"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_content'][VE_THEME_SLUG."_gcontent_font_size"]); ?></div>
	<div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Background Pattern / Image', 'id'=>'general_background', 'info'=>'<b>First Option = </b>Texture overlay. This will overlay a transparent image on top of the background image/color giving it a textures appearance. If you do not want a texture select &#8220;None&#8221; from the top of the list.<br /><br /><b>Second Option = </b>Background image. Revo comes with a selection of included background images you can use on your websites. If you do not want a texture select &#8220;None&#8221; from the top of the list.')); ?>
	<div class="one-half"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_background'][VE_THEME_SLUG."_bgpattern"]); ?></div>
	<div class="one-half last"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_background'][VE_THEME_SLUG."_bgimage"]); ?></div>
	<div class="clear"></div>
</div>
