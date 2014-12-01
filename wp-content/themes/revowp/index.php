<?php get_header(); ?>
<?php theme_head(); ?>
<div class="main-container">
<?php $blog_sidebar = theme_get_option(THEME_SLUG."_blog_sidebar"); $pagetype='sidebar'; ?>
<?php if ($blog_sidebar != "none") : ?>
<div id="sidebar" class="sidebar-<?php echo $blog_sidebar; ?>">
<?php theme_sidebar("blog"); ?>
</div>
<div class="content-sidebar content-<?php echo $blog_sidebar; ?>">
<?php endif; ?>
<div id="content">
<?php $blog_layout = theme_get_option(THEME_SLUG."_blog_layout"); ?>
<?php $post_date = theme_get_option(THEME_SLUG."_post_date"); $comments_count = theme_get_option(THEME_SLUG."_comments_count"); ?>
<?php $image_box = theme_get_option(THEME_SLUG."_blog_imagebox"); $box_width = theme_image_box_size($image_box, 0); ?>
<?php $blog_tweet = theme_get_option(THEME_SLUG."_blog_tweet"); $blog_fblike = theme_get_option(THEME_SLUG."_blog_fblike"); ?>
<?php $blog_gplus1 = theme_get_option(THEME_SLUG."_blog_gplus1"); $blog_pinterest = theme_get_option(THEME_SLUG."_blog_pinterest"); ?>
<?php $blog_postby = theme_get_option(THEME_SLUG."_posted_by"); $blog_categories = theme_get_option(THEME_SLUG."_post_categories"); ?>
<?php $blog_tags = theme_get_option(THEME_SLUG."_post_tags"); $image_shadow = theme_get_option(THEME_SLUG."_blog_shadow"); ?>
<?php $blog_img_width = ($blog_layout == 'layout-1' && ($post_date == "true" || $comments_count == "true")) ? 572 : 636; ?>
<?php $blog_img_width = ($blog_layout == 'layout-2') ? 260 : $blog_img_width; ?>
<?php $blog_img_height = ($blog_layout == 'layout-2') ? 135 : 260; ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); $post_title = get_the_title(); $post_permalink = get_permalink(); ?>
<?php $attachment_id = get_post_thumbnail_id(); $imgsrc = wp_get_attachment_image_src($attachment_id, "full"); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class("post-wrapper ".$blog_layout.' post-wrapper-'.$blog_sidebar); ?>>
	<div class="post-title<?php if($blog_layout == 'layout-1' && ($post_date == "true" || $comments_count == "true")) : ?> post-title-indent<?php endif; ?>">
		<h2><a href="<?php echo $post_permalink; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></h2>
	</div>
	<?php if($blog_layout == 'layout-1' && ($post_date == "true" || $comments_count == "true")) : ?>
	<div class="post-left-meta">
		<?php if($post_date == "true") : ?><div class="post-date"><span class="post-date-day"><?php the_time('j'); ?></span><span class="post-date-month"><?php the_time('M'); ?></span></div><?php endif; ?>
		<?php if($comments_count == "true") : ?><div class="post-comments-count"><a href="<?php echo $post_permalink.'#post-comments'; ?>" title="Comments"><?php comments_number('0', '1', '%'); ?></a></div><?php endif; ?>
	</div>
	<?php endif; ?>
	<?php if($blog_layout == 'layout-3') : ?><div class="post-content-wrapper"><?php endif; ?>
	<div class="post-content">		
		<?php if($blog_layout != 'layout-1') : ?>	
		<div class="post-meta">
			<ul>
				<?php if($post_date == "true") : ?><li class="post-date"><span class="post-date-day"><?php the_time('F j, Y'); ?></span></li><?php endif; ?>
				<?php if($comments_count == "true") : ?><li class="post-comments-count"><a href="<?php echo $post_permalink.'#post-comments'; ?>" title="Comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a></li><?php endif; ?>
				<?php if($blog_categories == "true") : ?><li class="post-meta-element">Posted in: <?php the_category(', '); ?></li><?php endif; ?>
				<?php if($blog_postby == "true") : ?><li>Posted by: <?php the_author_posts_link(); ?></li><?php endif; ?>
				<?php if(get_the_tags() && $blog_tags == "true") : ?><li>Tags: <?php the_tags('', ', '); ?></li><?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php if(has_post_thumbnail()) : ?>
		<div class="post-thumb"><?php echo theme_image(array('src'=>$imgsrc[0], 'link'=>$post_permalink, 'title'=>$post_title, 'width'=>($blog_img_width-$box_width), 'height'=>$blog_img_height, 'box'=>$image_box, 'shadow'=>$image_shadow, 'resize'=>true, 'caption'=>get_post_meta($post->ID, THEME_SLUG."_post_image_caption", true), 'caption_position'=>'bar', 'alt'=>get_post_meta($attachment_id, '_wp_attachment_image_alt', true))); ?></div>
		<?php endif; ?>	
		<?php if($blog_layout == 'layout-1') : ?>	
		<div class="post-meta">
			<ul>
				<?php if($blog_categories == "true") : ?><li class="post-meta-element">Posted in: <?php the_category(', '); ?></li><?php endif; ?>
				<?php if($blog_postby == "true") : ?><li>Posted by: <?php the_author_posts_link(); ?></li><?php endif; ?>
				<?php if(get_the_tags() && $blog_tags == "true") : ?><li>Tags: <?php the_tags('', ', '); ?></li><?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>
		<div class="post-text">			
			<p><?php echo theme_text_summary($post->post_content, theme_get_option(THEME_SLUG."_blog_summary"));?></p>
			<?php echo theme_button(array('text'=>__('Read More &raquo;', THEME_SLUG), 'link'=>$post_permalink, 'align'=>(($blog_layout=='layout-3' || ($blog_layout=='layout-1' && $blog_sidebar=="none")) ? 'center' : 'right'), 'class'=>'more-link')); ?>
			<div class="post-social">
				<?php if($blog_tweet == "true" && function_exists('theme_tweet_button')){ echo theme_tweet_button($post_permalink, $post_title, 'horizontal'); } ?>
				<?php if($blog_gplus1 == "true" && function_exists('theme_gplusone_btn')){ echo theme_gplusone_btn($post_permalink, 'horizontal'); } ?>
				<?php if($blog_pinterest == "true" && function_exists('theme_pinterest_btn')){ echo theme_pinterest_btn($post_permalink, $imgsrc[0], "horizontal"); } ?>
				<?php if($blog_fblike == "true" && function_exists('theme_facebook_like')){ echo theme_facebook_like($post_permalink, "button_count"); } ?>
			</div>
		</div>
	</div>
	<?php if($blog_layout == 'layout-3') : ?></div><?php echo theme_shadow_image($image_shadow, 0); ?><?php endif; ?>
	<div class="clear"></div>
</div>
<?php endwhile; else: ?>
<h2>Nothing Found</h2>
<p>Sorry, it appears there is no content in this section.</p>
<?php endif; ?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div><!-- #content -->
<?php if ($blog_sidebar != "none") : ?></div><!-- .content-sidebar --><?php endif; ?>
</div><!-- .main-container -->
<?php get_footer(); ?>