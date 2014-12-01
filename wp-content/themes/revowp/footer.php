<?php // edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
<div class="clear"></div>
</div><!-- #main -->
</div></div><!-- .wrapper -->
</div>
<?php theme_footer(); ?>
<div class="wrapper-shadow-bottom"></div>
</div></div>
<?php echo stripslashes(get_option(THEME_SLUG."_custom_js_footer")); ?>
<?php wp_footer(); ?>
<script type="text/javascript">
jQuery(document).ready(function($){
<?php if (theme_get_option(THEME_SLUG."_headings_highlight") == "true") { ?>
	$("#head h1, .colored-header, .footer-header, .ptable-title h2, .team-member-contact ul li h3").lettering('words');	
<?php } ?>
<?php if (in_array(theme_get_option(THEME_SLUG."_headings_highlight_words"), array("last", "last_2", "last_3"))) { ?>	
	$("#head h1 span:last-child, .colored-header span:last-child, .footer-header span:last-child, .ptable-title h2 span:last-child, .team-member-contact ul li h3 span:last-child").addClass('secondary-color');
<?php } ?>
<?php if (in_array(theme_get_option(THEME_SLUG."_headings_highlight_words"), array("last_2", "last_3"))) { ?>	
	$("#head h1 span:nth-last-child(2), .colored-header span:nth-last-child(2), .footer-header span:nth-last-child(2), .ptable-title h2 span:nth-last-child(2), .team-member-contact ul li h3 span:last-child(2)").addClass('secondary-color');
<?php } ?>
<?php if (theme_get_option(THEME_SLUG."_headings_highlight_words") == "last_3") { ?>	
	$("#head h1 span:nth-last-child(3), .colored-header span:nth-last-child(3), .footer-header span:nth-last-child(3), .ptable-title h2 span:nth-last-child(3), .team-member-contact ul li h3 span:last-child(3)").addClass('secondary-color');
<?php } ?>
<?php if (in_array(theme_get_option(THEME_SLUG."_headings_highlight_words"), array("first", "first_2", "first_3"))) { ?>	
	$("#head h1 span:first-child, .colored-header span:first-child, .footer-header span:first-child, .ptable-title h2 span:first-child, .team-member-contact ul li h3 span:first-child").addClass('secondary-color');
<?php } ?>
<?php if (in_array(theme_get_option(THEME_SLUG."_headings_highlight_words"), array("first_2", "first_3"))) { ?>	
	$("#head h1 span:nth-child(2), .colored-header span:nth-child(2), .footer-header span:nth-child(2), .ptable-title h2 span:nth-child(2), .team-member-contact ul li h3 span:nth-child(2)").addClass('secondary-color');
<?php } ?>
<?php if (theme_get_option(THEME_SLUG."_headings_highlight_words") == "first_3") { ?>	
	$("#head h1 span:nth-child(3), .colored-header span:nth-child(3), .footer-header span:nth-child(3), .ptable-title h2 span:nth-child(3), .team-member-contact ul li h3 span:nth-child(3)").addClass('secondary-color');
<?php } ?>
});	
</script>
</body>
</html>