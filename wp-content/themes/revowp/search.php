<?php get_header(); ?>
<?php theme_head(); ?>
<div class="main-container content-full">
<div id="content" >
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<ul class="search-list">
<li>
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php
ob_start();
the_content();
$old_content = ob_get_clean();
$new_content = strip_tags($old_content);
echo '<p>'.substr($new_content,0,300).'...<br />';
?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More</a></p>
</li>
</ul>
<?php endwhile; else: ?>
Your search did not return any results. Please try using a different search term.
<?php endif; ?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div><!-- #content -->
</div><!-- .main-container -->
<?php get_footer(); ?>