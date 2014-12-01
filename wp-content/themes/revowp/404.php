<?php get_header(); ?>
<?php theme_head(); ?>
<div class="main-container content-full">
<div id="content">
<?php echo theme_formatter(do_shortcode(stripslashes(theme_get_option(THEME_SLUG."_404_content")))); ?>
<div class="clear"></div>
</div><!-- #content -->
</div><!-- .main-container -->
<?php get_footer(); ?>