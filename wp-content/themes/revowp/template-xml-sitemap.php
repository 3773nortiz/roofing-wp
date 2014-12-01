<?php
/*
Template Name: XML Sitemap
*/
?>
<?php

$posts = get_posts(array(
	'numberposts' => -1,
	'orderby' => 'modified',
	'post_type' => array('post','page'),
	'order' => 'DESC'
));
 
$currpage = $post->ID;
$sitemap = '';
$sm_posts = array();
$time = time();
$siteurl = trailingslashit(get_option('siteurl'));
$homepage = '';

foreach($posts as $post){
	$visibility = (array)get_post_meta($post->ID, THEME_SLUG.'_visibility', true);
	if(!in_array('sitemap', $visibility)){
		$sm_posts[] = array('id' => $post->ID, 'loc' => get_permalink($post->ID), 'lastmod' => $post->post_modified, 'priority' => '0.6', 'comment_count' => $post->comment_count);
	}
}

foreach($sm_posts as $key=>$post){
	if($siteurl == $post['loc']){
		$homepage = $key;		
	}
	if($currpage == $post['id']){
		$currpage = $key;
	}
	if($post['comment_count'] > 0){
		$sm_posts[$key]['priority'] = '0.8';
	}		
}

unset($sm_posts[$currpage]);
$temp = $sm_posts[$homepage];
unset($sm_posts[$homepage]);
array_unshift($sm_posts, array('id' => $temp['id'], 'loc' => $temp['loc'], 'lastmod' => $temp['lastmod'], 'priority' => '1.0'));

foreach($sm_posts as $post){

	$postdate = explode(" ", $post['lastmod']);
	
	$sitemap .= '<url>';
	$sitemap .= '<loc>'.$post['loc'].'</loc>';
	$sitemap .= '<lastmod>'.$postdate[0].'</lastmod>';
	$sitemap .= '<changefreq>monthly</changefreq>';
	$sitemap .= '<priority>'.$post['priority'].'</priority>';
	$sitemap .= '</url>';
}

//print_r($sm_posts);

header("Content-type: text/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
echo $sitemap;
echo '</urlset>';
