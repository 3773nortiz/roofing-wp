<?php
/*
Template Name: HTML Sitemap
*/
?>
<?php get_header(); ?>
<?php theme_head(); ?>
<div class="main-container content-full">
<div id="content" class="html-sitemap">
<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>
<h2>Pages</h2>
<ul class="small-content"><?php wp_list_pages(array('title_li'=>'', 'walker'=>new sitemap_walker())); ?></ul>
<div class="divider-top"><a href="#" class="link-top">Top</a></div>
<h2>Categories</h2>
<ul class="small-content"><?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?></ul>
<div class="divider-top"><a href="#" class="link-top">Top</a></div>
<h2>Blog Posts</h2>
<?php $cats = get_categories(); ?>
<?php foreach ($cats as $cat) : ?>
<?php query_posts('cat='.$cat->cat_ID); ?>
<?php if(have_posts()) : ?>
<h4><?php echo $cat->cat_name; ?></h4>
<ul class="small-content">
<?php while (have_posts()) : the_post(); global $post; ?>
<?php $visibility = (array)get_post_meta($post->ID, THEME_SLUG.'_visibility', true); if(!in_array('sitemap', $visibility)) : ?>
<li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <?php _e('Comments', THEME_SLUG) ?> (<?php echo $post->comment_count ?>)</li>
<?php endif; ?>
<?php endwhile;  ?>
</ul>
<?php endif; ?>
<?php endforeach; ?>
<?php wp_reset_query(); ?>
</div><!-- #content -->
</div><!-- .main-container -->
<?php get_footer(); ?>