<!DOCTYPE HTML >
<html <?php language_attributes(); ?>>
<head>
<?php theme_head_meta(); ?>
<?php wp_head(); ?>
<?php echo stripslashes(get_option(THEME_SLUG."_custom_js_header")); ?>
</head>
<body <?php body_class(); ?>>
<div class="pattern">
<?php if($bg_gradient = theme_get_option(THEME_SLUG."_bggradient")) : ?><div class="<?php echo $bg_gradient; ?>-left-gradient"><div class="<?php echo $bg_gradient; ?>-right-gradient"></div></div><?php endif; ?>
<div class="container">
<div class="wrapper-shadow-top"></div>
<?php echo do_shortcode('[rev_slider roofing]');//theme_top_toolbar(); ?>
<?php theme_header(); ?>
<div class="wrapper-shadow">
<div class="wrapper"><div class="wrapper-pattern">
<div id="main">