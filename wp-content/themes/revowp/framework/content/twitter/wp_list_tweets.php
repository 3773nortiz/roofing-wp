<?php
/*
Plugin Name: WP List Tweets
Plugin URI: http://martythornley.com/downloads/wp-list-tweets
Description: Easily List any number of latest Tweets from any user.
Version: 1.2
Author: Marty Thornley
Author URI: http://martythornley.com
*/

/*  Copyright 2009  Marty Thornley  (email : marty@martythornley.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*********************************************************************
/
/	wp_list_tweets ($username, $number, $id);
/
/	Lists latest Tweets.
/	
/	All attributes are optional:
/		$username:	Just the username 
/ 		$number:	Number of latest Tweets to display
/		$id:		option to add a unique string to the id of the containing ul
/					will default to a running count of the number of times the plugin
/					has been used on any given page.
/
/	Possible Uses:
/		wp_list_tweets(); - will display my 3 latest tweets (shameless self promotion!)
/
/		wp_list_tweets('yourname');
/			will display your 3 latest tweets
/
/		wp_list_tweets('username', '2');
/			will display your 2 latest tweets
/
/		wp_list_tweets('username', '2', 'mycustomID');
/			will display your 2 latest tweets and add 'mycustomID' to the
/			id of the containing ul as shown below:
/
/	The funtion returns an unordered list of each tweet wrapped like this 
/		<ul id="twitterList-username-mycustomID">
/			<li> TWEET GOES HERE </li>
/			<li> TWEET GOES HERE </li>
/			<li> TWEET GOES HERE </li>
/		</ul>
/
/	Function automatically adds the <ul> wrapper, no need to give it an ID.
/	
/	the ul will have an id of the word 'twitterList-' followed by the post's ID. 
/	id="twitterList-315'
/
/	the ul will have a class of 'twitterList' and a class of the username
/		you can style all occurances together
/		you can also style each user separately
/
/	style the ul:
/		ul#twitterList-315	
/		ul.twitterList
/		ul.username
/	
/	style the li:
/		ul.twitterList li
/		
/	THE SHORTCODE
/
/	[wp_list_tweets user="martythornley" num="3" id="stuff"]
/
/	all attributes are optional
/	will default to:
/		user='martythornley'
/		num='3'
/		id will be a running count of the number of times 
/		this plugin has been used on a given page.
/
*********************************************************************/?>
<?php

// Empty the constant on each page load to store this page's info:

function empty_twitter_info() {
	$GLOBALS['twitter_info_store'] = '';
 	$GLOBALS['twitter_list_count'] = 1;

};

add_action ('wp_head','empty_twitter_info');

function wp_list_tweets($user='', $number='3', $element = '') {	
	ob_start();	

// get needed global info
	
	global $post;
	
	$defaultUser = theme_get_option(THEME_SLUG."_twitter_username");
	
	if ($user != '') :
		$tweet_user = $user;
	elseif ($defaultUser != '') :
		$tweet_user = $defaultUser;
	else : 
		$tweet_user = 'martythornley';
	endif;

	$tweet_number = $number;
	
	if ($element == '') :
		$tweet_element = 'twitterList-' . $tweet_user . '-' . $GLOBALS['twitter_list_count'];
	else : 
		$tweet_element = 'twitterList-' . $tweet_user . '-' . $element;
	endif; 
	
	echo '<div class="twitterstatus"><ul id="' . $tweet_element. '" class="twitterList ' . $user . '"></ul></div>';
	
	$wp_twitter_info['tweet_user'] = $tweet_user;
	$wp_twitter_info['tweet_number'] = $tweet_number;
	$wp_twitter_info['tweet_element'] = $tweet_element;
	
	$old = $GLOBALS['twitter_info_store'];
	
	if ( $old == '' ) :
		$new = serialize($wp_twitter_info);
	else : 
		$new = $old . ',' . serialize($wp_twitter_info);
	endif; 
	
	$GLOBALS['twitter_info_store'] = $new;	

	$GLOBALS['twitter_list_count'] ++;
	
	$output_string=ob_get_contents();;
	ob_end_clean();

	echo $output_string;
	
};

function add_twitter_js_to_footer () {

	$wp_twitter_infos = $GLOBALS['twitter_info_store'];
	
	$wp_twitter_infos = explode( ',' ,  $wp_twitter_infos );
	
	foreach ($wp_twitter_infos as $wp_twitter_info) {
		$instances[] = unserialize ($wp_twitter_info);
	}
	
	foreach ( $instances as $instance ) {
		$tweet_user = $instance['tweet_user'];
		$tweet_number  = $instance['tweet_number'];
		$tweet_element  = $instance['tweet_element'];

	if ($instance['tweet_user'] !='') {
	
	
	?>
	
		<script type="text/javascript">
		/* <![CDATA[ */
		function twitterCallback<?php echo $tweet_user; ?>(C) {

			var A=[];
			for(var D=0;D<C.length;D++) {
				var E=C[D].user.screen_name;
				var B=C[D].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(F) { return'<a href="'+F+'">'+F+"</a>"}).replace(/\B@([_a-z0-9]+)/ig, function(F) { return F.charAt(0)+'<a href="http://www.twitter.com/'+F.substring(1)+'">'+F.substring(1)+"</a>" } );

				A.push("<li><p>"+B+' <span class="date">'+relative_time(C[D].created_at)+"</span></p></li>");
			}
			
			document.getElementById("<?php echo $tweet_element; ?>").innerHTML=A.join("");
		}

		function relative_time(C) {
		var B=C.split(" ");C=B[1]+" "+B[2]+", "+B[5]+" "+B[3];
		var A=Date.parse(C);
		var D=(arguments.length>1)?arguments[1]:new Date();
		var E=parseInt((D.getTime()-A)/1000);
		E=E+(D.getTimezoneOffset()*60);

		if (E<60) { return"less than a minute ago" }

		else {
			if (E<120) { return"about a minute ago" }

		else {
			if(E<(60*60)) { return(parseInt(E/60)).toString()+" minutes ago" }
 
		else {
			if(E<(120*60)) {return"about an hour ago" }

		else {
			if (E<(24*60*60)){return"about "+(parseInt(E/3600)).toString()+" hours ago" }
	
		else {
			if (E<(48*60*60)){return"1 day ago"}else{return(parseInt(E/86400)).toString()+" days ago"}}}}}}};
		/* ]]> */
		</script>

	<?php
		
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'; 
		echo $tweet_user;
		echo '.json?callback=twitterCallback' . $tweet_user .'&amp;count=' . $tweet_number . '"></script>';
	}
	}
};

add_action ('wp_footer' , 'add_twitter_js_to_footer' );


// SHORTCODE *************************************************

function wp_list_tweets_shortcode($atts) {
		
	extract(shortcode_atts(array(
		'user' => 'martythornley',
		'num' => '1',
		'element' => $GLOBALS['twitter_list_count'],
	), $atts));
	
	ob_start();	

	wp_list_tweets($user, $num, $element);
	$output_string=ob_get_contents();;
	ob_end_clean();

	return $output_string;
};

add_shortcode('wp_list_tweets', 'wp_list_tweets_shortcode');


?>