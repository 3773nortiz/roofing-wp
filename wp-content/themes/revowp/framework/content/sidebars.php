<?php

$footer_column_sidebars = array(
	'First Footer Column',
	'Second Footer Column',
	'Third Footer Column',
	'Fourth Footer Column',
);

function theme_widgets_init() {

	global $footer_column_sidebars;
	$sh = theme_get_option(THEME_SLUG."_sidebar_h_type");
		
	register_sidebar( array(
		'name' => 'Content Sidebar',
		'description' => 'This sidebar is displayed on all content pages with sidebar enabled.',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<'.$sh.' class="sidebar-header">',
		'after_title' => '</'.$sh.'>',
	));	
	
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'description' => 'This sidebar is displayed on all Blog pages.',
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<'.$sh.' class="sidebar-header">',
		'after_title' => '</'.$sh.'>',
	));
			
	register_sidebar( array(
		'name' => 'Top Toolbar',
		'description' => 'This region is located on the top toolbar.',
		'before_widget' => '<div class="toolbar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));	
	
	register_sidebar( array(
		'name' => 'Header',
		'description' => 'This region is located on the right side above the main navigation.',
		'before_widget' => '<div class="header-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	
	$fh = theme_get_option(THEME_SLUG."_footer_h_type");
	foreach($footer_column_sidebars as $name){
		register_sidebar( array(
		'name' => $name,
		'description' => $name,
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<'.$fh.' class="footer-header">',
		'after_title' => '</'.$fh.'>',
		));	
	}
		
}
add_action( 'widgets_init', 'theme_widgets_init' );
