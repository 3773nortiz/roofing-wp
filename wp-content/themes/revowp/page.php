<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); theme_head(); $pagetype='full'; ?>
<div class="main-container content-full">
<div id="content" >
<?php the_content(); ?>
<div class="clear"></div>
</div><!-- #content -->
</div><!-- .main-container -->
<?php endwhile; endif; ?>
<?php get_footer(); ?>