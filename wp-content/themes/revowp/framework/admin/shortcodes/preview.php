<?php
$GLOBALS['shortcode_preview'] = 1;
require_once( '../../../../../../wp-load.php' );
?>
<!DOCTYPE HTML >
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<?php theme_head_meta(); ?>
<?php wp_head(); ?>
<style>#wpadminbar{display:none !important;}</style>
</head>
<body style="margin:0;padding:0;">
<div id="wrapper" style="width:560px;padding:10px;">
<div class="main-container content-full">
<div id="content" >
<?php $content = '<div id="shortcode_preview">'.stripslashes(urldecode($_GET['shortcode'])).'</div>'; ?>
<?php $content = apply_filters('the_content', $content); ?>
<?php $content = str_replace(']]>', ']]&gt;', $content); ?>
<?php echo $content; ?>
<div class="clear"></div></div></div></div>
<?php wp_footer(); ?>
</body>
</html>