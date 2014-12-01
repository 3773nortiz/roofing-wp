<?php
/***** Contact-us Widget *****/

class theme_contactus_widget extends WP_Widget {

	function theme_contactus_widget() {
		$widget_ops = array('classname' => 'theme_contactus_widget', 'description' => __('A simple contact form.', THEME_SLUG));
		$this->WP_Widget('theme_contactus_widget', __(THEME_NAME.' - Contact Us Form', THEME_SLUG), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$email = $instance['email'];		
		$style = $instance['style'];		
	
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
					
		$contactus_rand = "contactus_".rand(1,1000);
		?>
<div class="contact-us <?php echo $style; ?>-style">
<form id="<?php echo $contactus_rand; ?>" action="">
<input type="hidden" name="to" value="<?php echo base64_encode(trim($email)); ?>" />
<div class="contact-us-field"><input type="text" name="contactus_name" data-value="Name" class="contact-us-textbox" /></div>
<div class="contact-us-field"><input type="text" name="contactus_email" data-value="Email" class="contact-us-textbox" /></div>
<div class="contact-us-field"><textarea name="contactus_comment" data-value="Message" class="contact-us-textarea"></textarea></div>
<div class="contact-us-info"></div><?php echo theme_button(array('type'=>'button', 'text'=>'Submit', 'id'=>$contactus_rand.'_button', 'align'=>'right')); ?>
<div style="clear:both;"></div>
</form>
</div>

<script type="text/javascript">
var $ = jQuery.noConflict();

jQuery(document).ready(function(){	
	$('#<?php echo $contactus_rand; ?>_button').click(function(){
		
		var error = false;
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var to_val = $('#<?php echo $contactus_rand; ?> input[name=to]').val();
		var name_val = $('#<?php echo $contactus_rand; ?> input[name=contactus_name]').val();
		var email_val = $('#<?php echo $contactus_rand; ?> input[name=contactus_email]').val();
		var comment_val = $('#<?php echo $contactus_rand; ?> textarea[name=contactus_comment]').val();
        if(name_val == '') {
            error = true;
        } 
		if(comment_val == '') {
            error = true;
        }
		if(email_val == '') {
            error = true;
        } 
        if(!emailReg.test(email_val)) {
            error = true;
        }		
		if(error == false){
			$("#<?php echo $contactus_rand; ?> .contact-us-info").html('Sending message...');
			$.post(ThemeAjax.ajaxurl, {action:'contactussubmit', to:to_val, name:name_val, email:email_val, comment:comment_val}, function(response) {			
				$("#<?php echo $contactus_rand; ?> .contact-us-info").html(response);
				$('#<?php echo $contactus_rand; ?> input[name=contactus_name]').val('');
				$('#<?php echo $contactus_rand; ?> input[name=contactus_email]').val('');
				$('#<?php echo $contactus_rand; ?> textarea[name=contactus_comment]').val('');
			});
		}else{
			$("#<?php echo $contactus_rand; ?> .contact-us-info").html('Please check the validity of the fields!');
		}
	});
});	
</script>

		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = $new_instance['email'];
		$instance['style'] = $new_instance['style'];

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = strip_tags($instance['title']);
		$email = $instance['email'];
		$style = $instance['style'];
		
?>
		<p style="color:#999;"><em>Enter the email addreses (comma separated) to which the contact-us information should be emailed to.</em></p><br />

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
				
		<p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', THEME_SLUG); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('style'); ?>"><?php _e( 'Style:' , THEME_SLUG); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>">
			<option value="light" <?php selected($style, "light"); ?>>Light</option>
			<option value="dark" <?php selected($style, "dark"); ?>>Dark</option>
		</select></p>

<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("theme_contactus_widget");'));


add_action('wp_ajax_contactussubmit', 'theme_contactus_submit_callback');
add_action('wp_ajax_nopriv_contactussubmit', 'theme_contactus_submit_callback');

function theme_contactus_submit_callback(){	
	$sitename = get_bloginfo('name');
	$siteurl = site_url();

	$to = ($_POST['to'])?base64_decode($_POST['to']):get_bloginfo('admin_email');
	$name = ($_POST['name'])?trim($_POST['name']):'';
	$email = ($_POST['email'])?trim($_POST['email']):'';
	$comment = ($_POST['comment'])?trim($_POST['comment']):'';
	
	$error = false;
	if($to == '' || $email == '' || $name == '' || $comment == ''){
		$error = true;
	}
	if(!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)){
		$error = true;
	}

	if($error == false){
		$subject = $sitename."'s Email from ".$name;
		$body = "Site: ".$sitename." (".$siteurl." )\n\nName: ".$name." \n\nEmail: ".$email." \n\nComment: ".$comment;
		$headers = "From: ".$name." <".$email.">\r\n";
		$headers .= "Reply-To: ".$email."\r\n";
		
		
		if(wp_mail($to, $subject, $body, $headers)){
			do_action_ref_array( 'theme_contactus_mail_sent', array(array('name'=>$name, 'email'=>$email, 'comment'=>$comment)) );
			echo 'Message Sent!';
		}
	}else{
		echo 'Please check the validity of the fields!';
	}
	exit;
}
