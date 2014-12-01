<?php

function theme_sc_team($atts, $content = null, $code){
	extract(shortcode_atts(array(
		'type' => 'horizontal',	
	), $atts));

	$content = trim($content);
	
	if (!preg_match_all("/(.?)\[(team_member)\b(.*?)(?:(\/))?\](?:(.+?)\[\/team_member\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
	
		$members = count($matches[0]);
		
		$output = '';
		if($members){
			$output .= '<div class="team team-'.$type.'">';
			if($type == 'horizontal'){
				for($i = 0; $i < $members; $i++) {
					$output .= do_shortcode(trim($matches[0][$i]));	
				}
			}else{
				
				for($i = 0; $i < $members; $i++) {
					if($members == 1){
						$output .= '<div class="full">';
					}elseif($members == 2 || $members == 4){
						$output .= '<div class="one-half'.(($i+1)%2==0 ? ' last' : '').'">';
					}else{
						$output .= '<div class="one-third'.(($i+1)%3==0 ? ' last' : '').'">';
					}					
					$output .= do_shortcode(trim($matches[0][$i]));
					$output .= '</div>';	
				}	
			}
			$output .= '</div><div class="clear"></div>';
		}
		return $output;
	}
}
add_shortcode('team', 'theme_sc_team');

function theme_sc_team_member($atts, $content = null, $code){
	extract(shortcode_atts(array(
		'name' => '',
		'designation' => '',
		'phone' => '',
		'email' => '',
		'facebook' => '',
		'gplus' => '',
		'twitter' => '',
		'linkedin' => '',
		'vcard' => '',
		'image_url' => '',
		'image_alt' => '',
		'image_box' => '',
		'hover_image_url' => '',	
		'image_width' => 200,
		'shadow' => '',
	), $atts));
	
	$content = trim($content);
	$name = trim($name);
	$designation = trim($designation);
	$phone = trim($phone);
	$email = trim($email);
	$facebook = trim($facebook);
	$twitter = trim($twitter);
	$linkedin = trim($linkedin);
	$vcard = trim($vcard);
	$gplus = trim($linkedin);
	$image_url = trim($image_url);
	$hover_image_url = trim($hover_image_url);
	$image_width = trim($image_width);
	
	$iwidth = preg_replace("/[^0-9]/", "", $image_width);
	
	$output = '<div class="team-member">';
	
	if($image_url){
		$output .= '<div class="team-member-image">'.theme_image(array('src'=>$image_url, 'title'=>$name, 'width'=>$image_width, 'box'=>$image_box, 'shadow'=>$shadow, 'alt'=>$image_alt, 'hover_image_url'=>$hover_image_url)).'</div>';
	}
	
	$output .= '<div class="team-member-details">';
	$output .= '<h2 class="team-member-name">'.$name.'</h2>';

	if($facebook || $twitter || $gplus || $linkedin || $vcard){
		$output .= '<div class="team-member-social"><ul class="social-icons">';
		if($facebook)
			$output .= '<li><a class="facebook" href="'.$facebook.'" title="Facebook">Facebook</a></li>';
		if($twitter)
			$output .= '<li><a class="twitter" href="'.$twitter.'" title="Twitter">Twitter</a></li>';
		if($gplus)
			$output .= '<li><a class="gplus" href="'.$gplus.'" title="Google+">Google+</a></li>';
		if($linkedin)
			$output .= '<li><a class="linkedin" href="'.$linkedin.'" title="LinkedIn">LinkedIn</a></li>';
		if($vcard)
			$output .= '<li><a class="vcard" href="'.$vcard.'" title="vCard">vCard</a></li>';			
		$output .= '</ul></div>';
	}
	
	$output .= '<div class="clear"></div><h3 class="team-member-designation">'.$designation.'</h3>';
	
	$output .= '<h5 class="team-member-phone">'.nl2br($phone).'</h5>';
	
	$output .= '[raw]<div class="team-member-desc">[/raw]'.do_shortcode($content).'[raw]</div>[/raw]';
	
	if($email){		
		$rand = mt_rand(1,1000);
		$output .= theme_button(array('text'=>__('Send Email', THEME_SLUG), 'link'=>'#tm_email_'.$rand, 'align'=>'right', 'lightbox'=>'true', 'title'=>__('Send Email to ', THEME_SLUG).$name));		
		$output .= '<div style="display:none;" id="tm_email_'.$rand.'"><div class="team-member-email">';
		$output .= '<div class="contact-form"><form id="tm_form_'.$rand.'" action=""><input type="hidden" name="tm_to" value="'.base64_encode($email).'" />';
		$output .= '<div class="text"><label for="tm_name" class="text">'.__('Your Name (Required)', THEME_SLUG).'</label><input type="text" name="tm_name" /></div>';
		$output .= '<div class="email"><label for="tm_email" class="email">'.__('Your Email (Required)', THEME_SLUG).'</label><input type="text" name="tm_email" /></div>';
		$output .= '<div class="textarea"><label for="tm_message" class="textarea">'.__('Your Message', THEME_SLUG).'</label><textarea name="tm_message"></textarea></div>';	
		$output .= '<div class="text">'.theme_button(array('text'=>__('Send Email', THEME_SLUG), 'link'=>'#', 'align'=>'right', 'class'=>'tm_submit')).'</div>';
		$output .= '</form></div><div class="contact-us-info"></div></div></div>';
	}
	
	$output .= '</div>';
	
	$output .= '<div class="clear"></div></div>';
	
	return $output;
}
add_shortcode('team_member', 'theme_sc_team_member');

add_action('wp_ajax_tmemailsubmit', 'theme_tmemailsubmit_callback');
add_action('wp_ajax_nopriv_tmemailsubmit', 'theme_tmemailsubmit_callback');

function theme_tmemailsubmit_callback(){	
	$sitename = get_bloginfo('name');
	$siteurl = site_url();

	$to = ($_POST['tm_to'])?base64_decode($_POST['tm_to']):'';
	$name = ($_POST['tm_name'])?trim($_POST['tm_name']):'';
	$email = ($_POST['tm_email'])?trim($_POST['tm_email']):'';
	$comment = ($_POST['tm_message'])?trim($_POST['tm_message']):'';
	
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
			echo 'Message Sent!';
		}
	}else{
		echo 'Please check the validity of the fields!';
	}
	exit;
}

