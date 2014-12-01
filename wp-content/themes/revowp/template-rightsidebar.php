<?php
/*
Template Name: Right Sidebar
*/
$pagetype='sidebar';
?>
<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); theme_head(); ?>
<div class="main-container">
<div id="sidebar" class="sidebar-right">
<?php theme_sidebar("content"); ?>
</div>
<div class="content-sidebar content-right">
<div id="content">
<?php the_content(); ?>
<div class="clear"></div>
</div><!-- #content -->
</div><!-- .content-sidebar -->
</div><!-- .main-container -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>