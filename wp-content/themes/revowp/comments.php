<?php 
function theme_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>" class="comment-body">
<div class="gravatar"><?php echo get_avatar($comment,$size='48',$default=''); ?></div><!-- .gravatar -->
<div class="comment-content">
<div class="comment-meta">
<?php printf( '<cite class="comment-author">%s</cite>', get_comment_author_link()) ?><?php edit_comment_link(' (Edit)','  ','') ?>
<div class="comment-time"><?php echo get_comment_date(); ?></div><!-- .comment-time -->
</div><!-- .comment-meta -->
<div class='comment-text'>
<?php comment_text() ?>
<?php if($comment->comment_approved == '0') : ?>
<span class="unapproved"><?php echo 'Your comment is awaiting moderation.'; ?></span>
<?php endif; ?>
</div><!-- .comment-text -->
<div class="reply">
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div><!-- .reply -->
</div><!-- .comment-content -->
</div><!-- .comment-body -->
<?php
}
?>

<div id="comments">
<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
<?php die('Please do not load this page directly!'); ?>
<?php endif; ?>
<?php if(!empty($post->post_password)) : ?>
<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<?php endif; ?>
<?php endif; ?>
	
<?php $comment_type = theme_get_option(THEME_SLUG."_blog_comments"); ?>
<h3 class="comment-heading"><a name="post-comments">Comments</a></h3>
<?php if($comment_type == 'facebook' && function_exists('theme_facebook_comments')) : ?>	
<div id="fb-comments">
<?php echo theme_facebook_comments('634'); ?>
</div><!-- #fb-comments -->
<?php endif; ?>
<?php if($comment_type == 'wordpress') : ?>	
<div id="wp-comments">
<?php if($comments) : ?>		
<ul>
<?php wp_list_comments( array( 'callback' => 'theme_comments' ) ); ?>
</ul>	    
<?php endif; ?>	  
<div class="clear"></div>
<?php if('open' == $post->comment_status) : ?>
<div id="respond">
<h3><?php comment_form_title('Add a Comment', 'Reply to %s'); ?></h3>
<div><?php cancel_comment_reply_link(); ?></div><!-- .comment-cancel -->
<form method="post" action="<?php echo theme_get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" class="comment-form">
<?php if($user_ID) : ?>
<p>Logged in as <a href="<?php echo theme_get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
<?php else : ?>
<p class="comment-label"><label for="author">Name <span class="mc_required">*</span></label><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" class="comment-input" /></p>
<p class="comment-label"><label for="email">Email <span class="mc_required">*</span></label><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" class="comment-input comment-email" /></p>
<p class="comment-label"><label for="url">Website</label><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" class="comment-input comment-website" /></p>
<?php endif; ?>
<div class="clear"></div>
<p><label for="comment">Your Comments</label><textarea name="comment" class="comment-textarea" tabindex="4" rows="5" cols="5" id="comment"></textarea></p>
<p><?php echo theme_button(array('type'=>'submit', 'id'=>'comment-submit', 'text'=>'Add Comment', 'align'=>'left')); ?><?php comment_id_fields(); ?></p>
<p><?php do_action('comment_form', $post->ID); ?></p>
</form>	
</div><!-- #respond -->
<?php endif; ?>	
</div><!-- #wp-comments -->
<?php endif; ?>
<div class="clear"></div>
</div><!-- #comments -->
