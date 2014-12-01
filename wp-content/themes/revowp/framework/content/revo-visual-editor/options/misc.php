<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Text Shadow', 'id'=>'general_text_shadow', 'info'=>'<b>Light</b> = Applies a white colored drop shadow to all text.<br /><br /><b>Dark</b> =  Applies a black colored drop shadow to all text.<br /><br /><b>None</b> =  No drop shadow will be applied to text.')); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_text_shadow'][VE_THEME_SLUG."_text_shadow"]); ?>
	<div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Side Gradient / Drop Shadows', 'id'=>'general_side_gradient', 'info'=>'<b>First Option</b> =  Select the type of dark gradient to be applied to the sizes of the website or choose none.<br /><br /><b>Second Option</b> =  Select if drop shadows should be applied to the content area/header of the wesite.')); ?>
	<div class="one-half"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_side_gradient'][VE_THEME_SLUG."_bggradient"]); ?></div>
	<div class="one-half last"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['general_side_gradient'][VE_THEME_SLUG."_box_shadow"]); ?></div>
	<div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Top Social Icons', 'id'=>'misc_social_icons', 'info'=>'Select the alignment for the social buttons that show in the top bar area or if they should be hidden. This only gets used if the Top Bar element is enabled.')); ?>
	<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_social_icons'][VE_THEME_SLUG."_social_buttons_top"]); ?>
	<div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Blog Layout', 'id'=>'misc_blog_layouts', 'info'=>'Select the blog layout.')); ?>
	<div class="visual-editor-center">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_blog_layouts'][VE_THEME_SLUG."_blog_layouts_sidebar"]); ?>
	</div><div class="clear"></div>	
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Logo Position & Alignment', 'id'=>'misc_logo_style', 'info'=>'<b>First Option = </b>Position of the logo.<br /><br /><b>Second Option = </b>Logo Alignment.')); ?>
	<div class="one-half"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_logo_style'][VE_THEME_SLUG."_logo_position"]); ?></div>
	<div class="one-half last"><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_logo_style'][VE_THEME_SLUG."_logo_align"]); ?></div>
	<div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Area Background Patterns', 'id'=>'misc_area_patterns', 'info'=>'')); ?>
	<div class="one-half"><div style="text-align:center;">Top Bar</div><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_area_patterns'][VE_THEME_SLUG."_top_toolbar_bgpattern"]); ?></div>
	<div class="one-half last"><div style="text-align:center;">Header</div><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_area_patterns'][VE_THEME_SLUG."_header_bgpattern"]); ?></div>
	<div class="one-half"><div style="text-align:center;">Content Area</div><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_area_patterns'][VE_THEME_SLUG."_content_bgpattern"]); ?></div>
	<div class="one-half last"><div style="text-align:center;">Widgetized Footer</div><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_area_patterns'][VE_THEME_SLUG."_footer_bgpattern"]); ?></div>
	<div class="visual-editor-center"><div style="text-align:center;">Bottom Footer</div><?php echo visual_editor_field($GLOBALS['visual_editor_settings']['misc_area_patterns'][VE_THEME_SLUG."_footer_bar_bgpattern"]); ?></div>	
	<div class="clear"></div>
</div>