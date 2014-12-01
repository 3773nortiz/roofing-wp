<?php
require_once(dirname(__FILE__)."/type.php");
require_once(dirname(__FILE__)."/metaboxes.php");

if (!class_exists('JB_Portfolio_Bulk_Upload')) {
	require_once(dirname(__FILE__)."/jubini-portfolio-bulk-upload/jubini-portfolio-bulk-upload.php");	
}

if ( !class_exists('Portfolio') ){	
	class Portfolio{
		
		function __construct(){
			add_shortcode('portfolio', array(&$this, '_sc_portfolio'));
		}
		
		function _get_portfolio($category, $max, $paging, $orderby="menu_order"){
			
			$query = array(
				'post_type' => 'portfolio', 
				'posts_per_page' => $max, 
				'taxonomy' => 'portfolio_category', 
				'orderby' => $orderby, 
				'order' => 'ASC'
			);
			
			if($category != "all"){
				$query['term'] = $category;
			}
			
			if ($paging == 'true') {
				global $wp_version;
				if(is_front_page() && version_compare($wp_version, "3.1", '>=')){
					$paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
				}else{
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				}
				
				$query['paged'] = $paged;				
			}
			
			query_posts($query);

			$portfolio_list = array();
			while(have_posts()) {
				the_post();
				global $post;	
				
				if (has_post_thumbnail()) {
				
					$post_id = get_the_id();
					$type =  get_post_meta($post_id, THEME_SLUG."_portfolio_type", true);
					$linkurl =  get_post_meta($post_id, THEME_SLUG."_portfolio_url", true);
					$lightbox = get_post_meta($post_id, THEME_SLUG."_portfolio_lightbox", true);
					$lightbox_desc = get_post_meta($post_id, THEME_SLUG."_lightbox_desc", true);
					$caption = get_post_meta($post_id, THEME_SLUG."_image_caption", true);
					
					if($lightbox_desc == 'title'){
						$lightbox_desc = get_the_title();
					}					
					if($lightbox_desc == 'caption'){
						$lightbox_desc = $caption;
					}
					if($lightbox_desc == 'description'){
						$lightbox_desc = $post->post_content;
						$lightbox_desc = trim(strip_tags($lightbox_desc));
					}
					
					if($type == "iframe"){
						$str = parse_url($linkurl, PHP_URL_QUERY);				
						$amp = "?";
						if($str != ""){
							$amp = "&";
						}						
						$linkurl = $linkurl.$amp."iframe=true&width=90%&height=90%";
					}					
					if($type == "audio"){
						$linkurl = THEME_HOME.'/swf/audio.swf?width=292&amp;height=30&amp;flashvars=snd_name='.urlencode($linkurl).'&amp;controls_color=0x888888&amp;controls_color_over=0xffffff&amp;player_color=0x0000000&amp;auto_play_on_start=On';
					}						
				
					$image_id = get_post_thumbnail_id($post_id);
					$image = wp_get_attachment_image_src($image_id, 'full', true);				
					
					if(empty($linkurl)){
						$linkurl = $image[0];
					}

					$portfolio_list[] = array(
						'id' => $post_id,
						'thumb' => $image[0],
						'type' => $type,
						'lightbox' => $lightbox,
						'linkurl' => $linkurl,
						'title' => get_the_title(),
						'content' => get_the_content(''),
						'permalink' => get_permalink(),
						'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
						'link_title' => get_post_meta($post_id, THEME_SLUG."_link_title", true),
						'lightbox_desc' => $lightbox_desc,
						'caption' => $caption,						
					);
				}								
			}
			
			return $portfolio_list;
		}
				
		function _portfolio_list($column, $category, $max, $title, $desc, $paging, $group, $box, $shadow, $width="", $thumb_width="", $thumb_height="", $caption_position="") {
			
			$iwidth = preg_replace("/[^0-9]/", "", $width);
			if(!$iwidth){
				switch($GLOBALS['pagetype']){
					case 'sidebar':
						$iwidth = $GLOBALS['content_width'][$GLOBALS['pagetype']];
						break;
					case 'full':
					default:
						$iwidth = $GLOBALS['content_width'][$GLOBALS['pagetype']];
						break;
				}
			}
			
			switch($column){
				case 1:
					$size = array((int)(floor($iwidth*0.584)), 250, 'three-fifth');
					break;
				case 2:
					$size = array((int)(floor($iwidth*0.48)), 200, 'one-half');
					break;
				case 3:
					$size = array((int)(floor($iwidth*0.3066)), 150, 'one-third');
					break;
				case 5:
					$size = array((int)(floor($iwidth*0.168)), 100, 'one-fifth');
					break;
				case 6:
					$size = array((int)(floor($iwidth*0.1333)), 80, 'one-sixth');
					break;		
				case 4:
				default:
					$size = array((int)(floor($iwidth*0.22)), 120, 'one-fourth');					
			}
			
			if($thumb_height){
				$size[1] = preg_replace("/[^0-9]/", "", $thumb_height);
			}
			if($thumb_width){
				$size[0] = preg_replace("/[^0-9]/", "", $thumb_width);
			}
			
			$box_width = theme_image_box_size($box, "");
			$size[0] = $size[0] - $box_width;
				
			$rel_group = 'portfolio_'.rand(1,1000);	
		
			$output = "";			
			$output .= '<div class="portfolio" style="width:'.$iwidth.'px;">';
			$output .= '<ul>';	

			$list = $this->_get_portfolio($category, $max, $paging);							
			$i = 1;
									
			foreach($list as $item){				
				if ($item['thumb']) {
					
					$output .= '<li class="'.(($column != 1) ? $size[2].(($i % $column == 0) ? ' last' : '') : '').'">';			
					
					$rel = "";
					if($item['lightbox'] == "true"){
						if($group != 'true'){
							$rel_group = "";
						}
					}					
					if($item['type'] == "link"){
						$item['lightbox'] = "";
					}
													
					$output .= '<div class="portfolio-image'.(($column == 1) ? ' '.$size[2] : '').'">';
					$output .= theme_image(array('src'=>$item['thumb'], 'link'=>$item['linkurl'], 'title'=>$item['link_title'], 'width'=>$size[0], 'height'=>$size[1],  'resize'=>true, 'box'=>$box, 'shadow'=>$shadow, 'caption'=>$item['caption'], 'caption_position'=>$caption_position, 'alt'=>$item['alt'], 'lightbox'=>$item['lightbox'], 'lightbox_desc'=>$item['lightbox_desc'], 'lightbox_group'=>$rel_group));
					$output .= '</div>';

					if($title == 'true' || $desc == 'true'){
						$output .= '<div class="portfolio-details">';					
						if($title == 'true'){
							$output .= '<h3>'.$item['title'].'</h3>';
						}						
						if($desc == 'true'){
							$output .= $item['content'];										
						}					 
						$output .= '<div class="clear"></div></div>';
					}
					
					$output .= '</li>';
					$i++;
				}
			}
			$output .= '</ul>';			
			
			if($group == 'true'){
				$output .= '[raw]<script type="text/javascript">'."\n";
				$output .= '	$(document).ready(function(){	'."\n";
				$output .= '		$("a[rel^=\'prettyPhoto['.$rel_group.']\']").prettyPhoto({theme:\'light_square\',social_tools:\'\'});'."\n";
				$output .= '	});'."\n";
				$output .= '</script>[/raw]'."\n";	
			}
			
			$output .= '<div class="clear"></div></div>';
			
			if ($paging == 'true') {
				$output .= '<div class="portfolio-navi">';
				ob_start();
				if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				$output .= ob_get_clean();
				$output .= '</div>';
				$output .= '<div class="clear"></div>';
			}							
				
			return $output;
		}

		function _sc_portfolio($atts, $content = null, $code) {

			extract(shortcode_atts(array(
				'column' => 4,
				'category' => 'all',
				'max' => -1,
				'title' => '',
				'desc' => '',
				'paging' => '',
				'group' => '',
				'box' => '',
				'shadow' => '',
				'width' => '',
				'thumb_width' => '',
				'thumb_height' => '',
				'caption_position' => '',				
			), $atts));
			
			$output = $this->_portfolio_list($column, $category, $max, $title, $desc, $paging, $group, $box, $shadow, $width, $thumb_width, $thumb_height, $caption_position);
		
			wp_reset_query();
			return $output;
		}		
	}
	
	$portfolio = new Portfolio;		
}
