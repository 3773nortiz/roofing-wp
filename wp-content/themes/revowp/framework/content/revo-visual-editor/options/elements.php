<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Page Elements', 'id'=>'elements_page_elements', 'info'=>'Check the elements that you want to appear on the website. All unchecked items will be hidden.')); ?>
	<div class="one-half">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_page_elements'][VE_THEME_SLUG."_top_bar"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_page_elements'][VE_THEME_SLUG."_breadcrumbs"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_page_elements'][VE_THEME_SLUG."_header_divider"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_page_elements'][VE_THEME_SLUG."_main_menu"]); ?><div class="clear"></div>	
	</div>
	<div class="one-half last">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_page_elements'][VE_THEME_SLUG."_footer_widgets"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_page_elements'][VE_THEME_SLUG."_heading"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_page_elements'][VE_THEME_SLUG."_bottom_footer"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_page_elements'][VE_THEME_SLUG."_logo"]); ?><div class="clear"></div>
	</div><div class="clear"></div>	
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Highlights', 'id'=>'elements_highlights', 'info'=>'Some elements on the theme have a colored highlight on them. The color of these highlights is controled by Color block #10.<br /><br /><b>Top Bar = </b>Controls if the colored line under the top bar should be shown<br /><br /><b>Heading = </b>Controls if the final word in headings should be highlighted.<br /><br /><b>Footer = </b>Controls if the colored line above the bottom footer should be shown')); ?>
	<div class="one-third">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_highlights'][VE_THEME_SLUG."_top_bar_highlight"]); ?>
	</div>
	<div class="one-third">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_highlights'][VE_THEME_SLUG."_headings_highlight"]); ?>
	</div>
	<div class="one-third last">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_highlights'][VE_THEME_SLUG."_footer_widgets_highlight"]); ?>
	</div><div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Backgrounds', 'id'=>'elements_backgrounds', 'info'=>'Select which page elements should have a background color/image. If an item is not checked it will have a transparent background. This is useful when trying to make full width style sites.')); ?>
	<div class="one-half">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_backgrounds'][VE_THEME_SLUG."_content_bg"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_backgrounds'][VE_THEME_SLUG."_top_toolbar_bg"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_backgrounds'][VE_THEME_SLUG."_footer_bar_bg"]); ?><div class="clear"></div>	
	</div>
	<div class="one-half last">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_backgrounds'][VE_THEME_SLUG."_header_bg"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_backgrounds'][VE_THEME_SLUG."_footer_bg"]); ?><div class="clear"></div>	
	</div><div class="clear"></div>		
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Gradients', 'id'=>'elements_gradients', 'info'=>'Select which page element backgrounds should have a gradient applied. This only comes into effect when A) A color (not an image) is selected for the area background &amp; B) When a gradient type is selected In the General &gt; Color Gradients option area.<br /><br />So for example if you only wanted to have the header have a dark gradient going from a light blue to a dark blue you would select the light blue using color block #4, set General &gt; Color Gradients to dark and only check Header under Elements &gt; Gradients.')); ?>
	<div class="one-half">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_gradients'][VE_THEME_SLUG."_content_area_gradient"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_gradients'][VE_THEME_SLUG."_top_bar_gradient"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_gradients'][VE_THEME_SLUG."_bottom_footer_gradient"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_gradients'][VE_THEME_SLUG."_mainmenu_gradient"]); ?><div class="clear"></div>	
	</div>
	<div class="one-half last">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_gradients'][VE_THEME_SLUG."_header_gradient"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_gradients'][VE_THEME_SLUG."_widgetized_footer_gradient"]); ?><div class="clear"></div>	
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['elements_gradients'][VE_THEME_SLUG."_site_gradient"]); ?><div class="clear"></div>	
	</div><div class="clear"></div>	
</div>