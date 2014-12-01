<?php
require_once(dirname(__FILE__)."/type.php");
require_once(dirname(__FILE__)."/metaboxes.php");

if ( !class_exists('Overlay') ){	
	class Overlay{
		
		function __construct(){
			add_action('wp_footer', array(&$this,'_init'));
		}
			
		function _init(){
			global $post;
			$page_id = $post->ID;
			
			$isblog = false;
			if (is_home() || (is_front_page() && theme_get_option('show_on_front') == 'posts')) {$isblog = true;}
			if (is_archive()) {$isblog = true;}
			if (is_single()) {$isblog = true;}
			
			$current_time = time();
			
			$query = array(
				'post_type' 		=> 'overlay',
				'order' 			=> 'ASC',
				'posts_per_page'	=>	-1,
			);			
					
			query_posts($query);
			
			while(have_posts()) {
				the_post();
				$id = get_the_id();	
				
				$display = get_post_meta($id, THEME_SLUG."_overlay_display", true);
				$type = get_post_meta($id, THEME_SLUG."_overlay_type", true);
				$activate = (int)strtotime(get_post_meta($id, THEME_SLUG."_overlay_start", true));
				$expire = (int)strtotime(get_post_meta($id, THEME_SLUG."_overlay_end", true));
				
				$isoverlay = false;
				if(($activate == 0 || $activate <= $current_time) && ($expire == 0 || $expire >= $current_time)){
				
					switch($display){						
						case 'pages':
							$pages = get_post_meta($id, THEME_SLUG."_overlay_pages", true);
							if(is_array($pages) && in_array($page_id, $pages)) {$isoverlay = true;}
							break;
							
						case 'blog':
							if($isblog) {$isoverlay = true;}
							break;
							
						default:	
							$isoverlay = true;
							break;
					
					}				
					
					if($isoverlay && $_COOKIE['overlay_'.$id] != "true"){
						$cookie_time = get_post_meta($id, THEME_SLUG."_overlay_time", true);
						echo '<script type="text/javascript">';
						echo '	function overlayCookie(){';
						if($cookie_time != 'always'){
							echo '		var overlay_cookie = "overlay_'.$id.'=true";';
							if($cookie_time == 'day'){
								echo '		var overlay_exdate=new Date();overlay_exdate.setDate(overlay_exdate.getDate() + 1);';
								echo '		overlay_cookie += "; expires="+overlay_exdate.toUTCString();';
							}
							if($cookie_time == 'user'){
								echo '		var overlay_exdate=new Date();overlay_exdate.setDate(overlay_exdate.getDate() + 365);';
								echo '		overlay_cookie += "; expires="+overlay_exdate.toUTCString();';							
							}
							echo '		document.cookie=overlay_cookie;';
						}
						echo '	}';
						echo '</script>';
						echo $this->$type(get_the_content(''), get_post_meta($id, THEME_SLUG."_overlay_url", true), $id);						
						break;
					}
				}				
			}

			if(theme_get_option(THEME_SLUG."_overlay_browser") == "true"){
				$this->browser_check();
			}	
			
			wp_reset_query();
		}
				
		function fade($content, $link, $id){
			
			$timeout = get_post_meta($id, THEME_SLUG."_overlay_fade_timeout", true);
			$fadebg = get_post_meta($id, THEME_SLUG."_overlay_bgcolor", true);
			$width = get_post_meta($id, THEME_SLUG."_overlay_width", true);
			
			$output = '<script type="text/javascript" src="'.THEME_FRAMEWORK.'/content/overlays/jquery.tools.min.js"></script>';
			$output .= '<div id="overlay-facebox"><h4 class="overlay-counter">Overlay Will Close in <span></span>...</h4>';						
			$output .= '<div class="om-details '.(($link)?'overlay_link ':'').get_post_meta($id, THEME_SLUG."_overlay_css", true).'" style="width:'.$width.'px;">';

			$output .= theme_formatter(do_shortcode($content));
			
			$output .= '</div></div>';
			
			$output .= <<< EOH
			
<script type="text/javascript">
overlayCookie();
jQuery(document).ready(function() {
	jQuery("#overlay-facebox").overlay({
		top: '0',
		mask: {
			color: '#{$fadebg}',
			loadSpeed: 200,
			opacity: 0.9
		},
		closeOnClick: true,
		load: true,
		onLoad: function(){
			overlayTimeoutCounter(this);
		}
	});
	
	jQuery(".overlay-counter a").click(function(){
		overlay_countdown_clear();
		jQuery('.overlay-counter').hide();
	});	
EOH;
			if($link){
				$output .= <<< EOH
			
	jQuery("#overlay-facebox .om-details").click(function(){
		window.location.href = "{$link}";
	});
EOH;
			}
			$output .= <<< EOH
			
});

var overlay_box;
var overlay_countdown;
var overlay_countdown_number;

function overlayTimeoutCounter(overlay){
	overlay_box = overlay;
	overlay_countdown_init();
}

function overlay_countdown_init() {
    overlay_countdown_number = {$timeout};
	if(overlay_countdown_number > 0){
		jQuery('.overlay-counter').show();
	}
    overlay_countdown_trigger();
}

function overlay_countdown_trigger() {
    if(overlay_countdown_number > 0) {
        overlay_countdown_number--;
        jQuery('.overlay-counter span').html(overlay_countdown_number);
        if(overlay_countdown_number > 0) {
            overlay_countdown = setTimeout('overlay_countdown_trigger()', 1000);
        }else{
			overlay_box.close();	
		}
    }
}

function overlay_countdown_clear() {
    clearTimeout(overlay_countdown);
}
</script>
EOH;
			return $output;
		}

		function top($content, $link, $id){
						
			$height = get_post_meta($id, THEME_SLUG."_overlay_top_height", true);
			$height = $height ? $height : theme_get_option(THEME_SLUG."_overlay_top_height");
			
			$width = get_post_meta($id, THEME_SLUG."_overlay_width", true);
			$width = $width ? $width : theme_get_option(THEME_SLUG."_overlay_top_width");
			
			$bgcolor = get_post_meta($id, THEME_SLUG."_overlay_bgcolor", true);
			$bgcolor = $bgcolor ? $bgcolor : theme_get_option(THEME_SLUG."_overlay_top_bgcolor");			
			
			$output = '<div id="top-overlay" style="height:'.$height.'px;background-color:#'.$bgcolor.'">';
			$output .= '<div class="om-details '.(($link)?'overlay_link ':'').get_post_meta($id, THEME_SLUG."_overlay_css", true).'" style="width:'.$width.'px;">';		
			
			$output .= theme_formatter(do_shortcode($content));
						
			if(theme_get_option(THEME_SLUG."_overlay_top_close") == "true"){
				$output .= <<< EOH
				 <div class="om-top-close"><a href="#" title="Close">X</a></div>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery(".om-top-close a").click(function(){
		jQuery("#top-overlay").slideUp();
		jQuery("body").animate({"margin-top":"0px"},400);
		overlayCookie();
	});
EOH;
			if($link){
				$output .= <<< EOH
			
	jQuery("#top-overlay .om-details").click(function(){
		window.location.href = "{$link}";
	});
EOH;
			}
			$output .= <<< EOH
			
});
</script>
EOH;
			}					
			$output .= <<< EOH
				</div>
			</div>
			<style>body{margin-top:{$height}px;}</style>	
EOH;

			return $output;			
		}
		
		function browser_check(){
			
			if (!class_exists('UADetector')){
				include(dirname(__FILE__)."/browser/uadetector.class.php");
			}
			if (!class_exists('Browser')){
				include(dirname(__FILE__)."/browser/Browser.php");
			}

			$browser = new UADetector();
			$browser_info = array();
			$browser_info['name'] = strtolower($browser->name);
			$browser_info['version'] = $browser->version;
			unset($browser);

			$browser = new Browser();
			if(!$browser_info['name']){$browser_info['name']=strtolower($browser->getBrowser());}
			if(!$browser_info['version']){$browser_info['version']=$browser->getVersion();}
			unset($browser);
			
			$isoldbrowser = false;
			switch($browser_info['name']){
				case 'firefox':
					if($browser_info['version'] < 3)
						$isoldbrowser = true;
					break;
				case 'safari':
					if($browser_info['version'] < 3)
						$isoldbrowser = true;
					break;	
				case 'ie':
					if($browser_info['version'] < 8)
						$isoldbrowser = true;
					break;	
				case 'opera':
					if($browser_info['version'] < 7)
						$isoldbrowser = true;
					break;
				default:
					break;
			}
			
			if($isoldbrowser)
				echo $this->top('<p>You seem to be using an old browser version, please update it</p>', "", "-99");
			
		}
	}
	
	$overlay = new Overlay;		
}
