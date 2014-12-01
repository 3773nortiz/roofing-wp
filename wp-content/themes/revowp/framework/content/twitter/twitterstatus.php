<?php
/***** TwitterStatus *****/

class TwitterStatus
{

	public $ID;				// twitter user name
	public $Count;				// tweets to fetch
	public $CacheFor;			// number of seconds to cache feed	
	private $cache;			// location of cache files

	
	// ______________________________________________
	// constructor
	public function __construct($id = null, $count = 5) {

		// constants
		$this->cache = ABSPATH . 'wp-content/uploads/twittercache';	// cache location
		$this->CacheFor = (preg_replace("/[^0-9]/","", theme_get_option(THEME_SLUG."_twitter_cache_for")) * 60);		// cache feed for 15 minutes
		
		if(!(is_dir($this->cache))){
			@mkdir ( $this->cache , 0777 );
		}
		
		$defaultUser = theme_get_option(THEME_SLUG."_twitter_username");
		
		if ($id != '') :
			$this->ID = $id;
		elseif ($defaultUser != '') :
			$this->ID = $defaultUser;
		else : 
			$this->ID = 'Ankit_Ruia';
		endif;
		
		$this->Count = $count;

	}
	
	
	// ______________________________________________
	// returns formatted feed widget
	public function Render() {
		
		// returned HTML string
		$render = '';
		
		$is_cache = theme_get_option(THEME_SLUG."_twitter_cache");
		$cacheage = -1;
		
		$cache = $this->cache . '/'. $this->ID . '-' . $this->Count . '.html';
		
		if($is_cache == "true"){
			// cached file available?			
			$cacheage = (file_exists($cache) ? time() - filemtime($cache) : -1);
		}else{
			if(file_exists($cache)){
				@unlink($cache);
			}
		}
		
		if ($cacheage < 0 || $cacheage > $this->CacheFor) {
		
			// fetch feed
			$json = $this->FetchFeed();
			if ($json) {
			//	print_r($json);
				$widget = '';
				$status = '';
			
				// examine all tweets
				
				
				for ($t = 0, $tl = count($json); $t < $tl; $t++) {
										
					// parse tweet
					if(is_array($json[$t])){
						$render .= '<li><p>';
						$render .= $this->ParseTwitterLinks($json[$t]['text']);
						$render .= '<span class="date">';					
						$render .= '{DATE:'.$json[$t]['created_at'].'}';
						$render .= '</span>';					
						$render .= '</p></li>';
					}
				}
							
				if($is_cache == "true"){
					// update cache file
					@file_put_contents($cache, $render);
				}
				
			}
		
		}
		
		// fetch from cache
		if ($render == '' && $cacheage > 0 && $is_cache == "true") {
			$render = @file_get_contents($cache);
		}
		
		if($render){
			$render = $this->ParseDates($render);
			$render = '<div class="twitterstatus">' . '<ul class="twitterList">' . $render . '</ul>' . '</div>';
		}else{
			ob_start();	
			wp_list_tweets($this->ID, $this->Count);
			$render = ob_get_contents();;
			ob_end_clean();
		}
		
		
		
		return $render;
	
	}
	

	// ______________________________________________
	// returns JSON-formatted status feed or false on failure
	private function FetchFeed() {
		
		echo 'http://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$this->ID.'&include_entities=1&include_rts=1&count='.$this->Count;
		$r = '';
		if(function_exists('curl_init')){
			if ($this->ID != '' && $this->Count > 0) {
				// fetch feed
				$c = curl_init();
				curl_setopt_array($c, array(
					CURLOPT_URL => 'http://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$this->ID.'&include_entities=1&include_rts=1&count='.$this->Count,
					CURLOPT_HEADER => false,
					CURLOPT_TIMEOUT => 10,
					CURLOPT_RETURNTRANSFER => true
				));
				$r = curl_exec($c);
				curl_close($c);
			}
		
			// return JSON as array
			return (!!$r ? json_decode($r, true) : false);
		}else{
			return false;
		}
	}
	
	
	// ______________________________________________
	// parses Twitter links
	private function ParseTwitterLinks($str) {
	
		// parse URL
		$str = preg_replace('/(https{0,1}:\/\/[\w\-\.\/#?&=]*)/', '<a href="$1">$1</a>', $str);
	
		// parse @id
		$str = preg_replace('/@(\w+)/', '@<a href="http://twitter.com/$1" class="at">$1</a>', $str);
		
		// parse #hashtag
		$str = preg_replace('/\s#(\w+)/', ' <a href="http://twitter.com/#!/search?q=%23$1" class="hashtag">#$1</a>', $str);

		return $str;
	
	}
	
	
	// ______________________________________________
	// parses Tweet dates
	private function ParseDates($str) {
	
	
		preg_match_all('/{DATE:(.+)}/U', $str, $m);
		for ($i = 0, $il = count($m[0]); $i < $il; $i++) {
		
			$time = strtotime($m[1][$i]);

			$delta = strtotime('+2 hours') - $time;
			if ($delta < 120) {
				$date = "1 min ago";
			}elseif ($delta < 2700) {
				$date = floor($delta / 60) . " mins ago";
			}elseif ($delta < 5400) {
				$date = "1 hour ago";
			}elseif ($delta < 86400) {
				$date = floor($delta / 3600) . " hours ago";
			}elseif ($delta < 172800) {
				$date = "yesterday";
			}elseif ($delta < 2592000) {
				$date = floor($delta / 86400) . " days ago";
			}elseif ($delta < 31104000) {
				$months = floor($delta / 86400 / 30);
				$date = $months <= 1 ? "1 month ago" : $months . " months ago";
			}else{
				$years = floor($delta / 86400 / 365);
				$date = $years <= 1 ? "1 year ago" : $years . " years ago";
			}
			
			$str = str_replace($m[0][$i], $date, $str);
		
		}

		return $str;
	}
	
}