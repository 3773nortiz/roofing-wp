<?php 

$basestart = strpos(__FILE__, 'wp-content');
$basepath = substr(__FILE__, 0, $basestart);
$wp_load = $basepath . 'wp-load.php';
$wp_conf = $basepath . 'wp-config.php';

if(file_exists($wp_load)) include_once($wp_load);
elseif(file_exists($wp_conf)) include_once($wp_conf);
else die("Unable to include WordPress configuration files.");

theme_custom_styles();

header("Content-type: text/css");

echo $GLOBALS['custom_styles'];