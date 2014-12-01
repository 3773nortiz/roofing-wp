<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Top Bar Height', 'id'=>'layout_top_bar_height', 'info'=>'Sets the minimum height for the top bar element. The actual height may vary during responsive behavior.')); ?>
	<div class="visual-editor-center1">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['layout_top_bar_height'][VE_THEME_SLUG."_top_bar_min_height"]); ?>
	</div><div class="clear"></div>	
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Header Height', 'id'=>'layout_header_height', 'info'=>'Sets the minimum height for the header element. The actual height may vary during responsive behavior. ')); ?>
	<div class="visual-editor-center1">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['layout_header_height'][VE_THEME_SLUG."_header_min_height"]); ?>
	</div><div class="clear"></div>	
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Footer Height', 'id'=>'layout_footer_bar_height', 'info'=>'Sets the minimum height for the bottom footer element. The actual height may vary during responsive behavior.')); ?>
	<div class="visual-editor-center1">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['layout_footer_bar_height'][VE_THEME_SLUG."_footer_bar_min_height"]); ?>
	</div><div class="clear"></div>	
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Widgetized Footer Height', 'id'=>'layout_widgetized_footer_height', 'info'=>'Sets the minimum height for the widgetized footer element. The actual height may vary during responsive behavior.')); ?>
	<div class="visual-editor-center1">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['layout_widgetized_footer_height'][VE_THEME_SLUG."_widgetized_footer_min_height"]); ?>
	</div><div class="clear"></div>	
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Top Bar', 'id'=>'layout_header_bar', 'info'=>'Sets the layout of the top bar element.<br /><br /><b>Full Width</b> =  Attached to the top of the page and spans the full width of the website.<br /><br /><b>Fixed Width</b> <b>Attached</b>=  Attached to the top of the page and only spans the width of the content area.<br /><br /><b>Fixed Width Detached</b> =  Detached from the top (padding between the element and the top of the page) and only spans the width of the content area.')); ?>
	<div class="visual-editor-center">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['layout_header_bar'][VE_THEME_SLUG."_header_attachment"]); ?>
	</div><div class="clear"></div>	
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Header', 'id'=>'layout_header', 'info'=>'Sets the layout of the header element.<br /><br /><b>Full Width</b> =  Spans the full width of the website.<br /><br /><b>Fixed Width</b> =  spans the width of the content area')); ?>
	<div class="visual-editor-center">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['layout_header'][VE_THEME_SLUG."_header_layout"]); ?>
	</div><div class="clear"></div>
</div>
<div class="visual-editor-area">	
	<?php echo visual_editor_heading(array('name'=>'Footer', 'id'=>'layout_footer', 'info'=>'Sets the layout of the bottom footer element.<br /><br /><b>Full Width</b> =  Attached to the bottom of the page and spans the full width of the website.<br /><br /><b>Fixed Width</b> <b>Attached</b>=  Attached to the bottom of the page and only spans the width of the content area.<br /><br /><b>Fixed Width Detached</b> =  Detached from the bottom (padding between the element and the bottom of the page) and only spans the width of the content area.')); ?>
	<div class="visual-editor-center">
		<?php echo visual_editor_field($GLOBALS['visual_editor_settings']['layout_footer'][VE_THEME_SLUG."_footer_attachment"]); ?>
	</div><div class="clear"></div>
</div>