<?php

function generateField($value){

	$output = '';
	if(!is_array($value['current']))
		$value['current'] = stripslashes($value['current']);
	
	if($value['type'] != 'addmore_start')
		if(!empty($value['name']))
			$value['name'] = $value['name'] . ':';
		
	if(!isset($value['class']))
		$value['class'] = "";
		
	if(!isset($value['size']))
		$value['size'] = "";	
	
	switch ( $value['type'] ) {	

		/***** HTML Block *****/

		case 'start' :
		
			$output .= '<div class="toggle">';
			$output .= '<h4 class="toggle-title">';
			$output .= $value['name'];
			$output .= '</h4>';
			$output .= '<div class="toggle-content">';
			break;
	
		case 'stop' :
		
			$output .= '</div><!-- .toggle-content -->';
			$output .= '</div><!-- .toggle -->';
			break;	
	
		/***** Heading *****/

		case 'heading' :
		
			$output .= '<div class="theme-entry">';
			$output .= '<div class="heading">';
			$output .= $value['name'];
			$output .= '</div><!-- .heading -->';
			$output .= '</div><!-- .theme-entry -->';
			break;	

		/***** Buttons *****/

		case 'button' :
		
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<a href="'.$value['link'].'" class="linkbutton" target="_blank">'.$value['data'].'</a>';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;	
			
		/***** HTML Block *****/

		case 'html' :
		
			$output .= '<div class="theme-entry">';
			$output .= $value['desc'];
			$output .= '</div><!-- .theme-entry -->';
			break;

		/***** Text Field *****/

		case 'text' :			
			
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field '.$value['class'].'">';
			$output .= '<input name="'.$value['id'].'" type="text" value="'.$value['current'].'" class="theme-input size-'.$value['size'].'" />';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;
			
		/***** Datepicker *****/

		case 'datepicker' :			
			
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<input name="'.$value['id'].'" type="text" value="'.$value['current'].'" class="theme-input datepicker" />';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;			
			
		/***** Range Field *****/

		case 'range' :			
			
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<input type="range" name="'.$value['id'].'" min="'.$value['min'].'" max="'.$value['max'].'" step="'.$value['step'].'" value="'.$value['current'].'" />';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;		

		/***** Text Area *****/

		case 'textarea' :

			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 			
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<textarea name="'.$value['id'].'" cols="" rows="" class="theme-textarea">'.$value['current'].'</textarea>';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;
			
		/***** WYSIWYG*****/

		case 'wysiwyg' :

			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 	
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';			
			$output .= '<div class="theme-field wysiwyg">';  
		//	ob_start();	
			$output .= wp_editor($value['current']);
		//	$output .= ob_get_contents();;
		//	ob_end_clean();
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;			
		
		/***** Select box *****/

		case 'select' :
			
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field" id="'.$value['id'].'_preview">';						
			$output .= '<select name="' . $value['id'] . '" id="' . $value['id'] . '" class = "size-'.$value['size'].' '.$value['class'].'">';
			foreach($value['data'] as $key => $entry) {
				if($value['current'] == $key) {
					$selected = " selected='selected'";
				} else {
					$selected = "";
				}							
				$output .= '<option'.$selected.' value="'. $key .'">' . $entry . '</option>';
			}
			$output .= '</select>';						
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;
			
		/***** Font Selector box *****/

		case 'font' :						

			global $general_fonts, $google_fonts;		
			
			if(!isset($value['preview'])) $value['preview'] = true;
			
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';	
			if(is_array($value['data'])){
				$current_family = explode('::', $value['current']);
				$family_type = $current_family[0];
				$current_family = $current_family[1];					
				$output .= '<select name="'.$value['id'].'" class="theme-font-selector" id="'.$value['id'].'_family">';
				$output .= '<option value="" '.selected($entry,"",false).'>None</option>';
				if(array_search('cufon', $value['data']) !== FALSE){
					$output .= '<optgroup label="Cufon Fonts">';
					foreach($cufon_fonts as $key => $entry) {
						$output .= '<option value="cufon::'. $entry .'" '.selected($entry,$current_family,false).'>'.$key.'</option>';
					}
					$output .= '</optgroup>';
				}
				if(array_search('google', $value['data']) !== FALSE){
					$output .= '<optgroup label="Google Fonts">';
					foreach($google_fonts as $key => $entry){
						$output .= '<option value="google::'.$entry.'" '.selected($entry,$current_family,false).'>'.$key.'</option>';
					}
					$output .= '</optgroup>';
				}
				if(array_search('general', $value['data']) !== FALSE){
					$output .= '<optgroup label="General Fonts">';
					foreach($general_fonts as $key => $entry){
						$output .= '<option value="general::'.$key.'" '.selected($key,$current_family,false).'>'.$entry.'</option>';
					}
					$output .= '</optgroup>';
				}
				$output .= '</select>';
				if($value['preview']){
					if($family_type == 'cufon'){
						$header_font_family = array_search($current_family, $cufon_fonts);							
						$output .= '<script src="'.THEME_HOME.'/fonts/'.$current_family.'" type="text/javascript"></script>';
						$output .= '<script type="text/javascript">Cufon.replace(\'#'.$value['id'].'_family-preview\', { fontFamily: \''.$header_font_family.'\' });</script>';
						$output .= '<div id="'.$value['id'].'_family-preview" class="theme-header-font-preview" style="font-size:'.$value['current']['size'].'px;">';
					}
					if($family_type == 'google'){
						$header_font_family = array_search($current_family, $google_fonts);							
						$output .= '<link href="http://fonts.googleapis.com/css?family='.$current_family.'" rel="stylesheet" type="text/css" class="'.$value['id'].'-temp-header-font" />';							
						$output .= '<div id="'.$value['id'].'_family-preview" class="theme-header-font-preview" style=\'font-size:'.$value['current']['size'].'px;font-family: '.$header_font_family.'\'>';
					}
					if($family_type == 'general'){
						$output .= '<div id="'.$value['id'].'_family-preview" class="theme-header-font-preview" style=\'font-size:'.$value['current']['size'].'px;font-family: '.$general_fonts[$current_family].';\'>';
					}
					$output .= 'Lorem ipsum dolor sit amet';
					$output .= '</div>';
					$output .= '<small>Font Preview</small>';
				}
			}else{			
				if($value['data'] == 'general'){						
					$output .= '<select name="' . $value['id'] . '" class="theme-general-font-selector" id = "'. $value['id'].'">';
					foreach($general_fonts as $key => $entry) {
						if($value['current'] == $key) {
							$selected = " selected='selected'";
						} else {
							$selected = "";
						}
						$output .= '<option'.$selected.' value="'. $key .'">' . $entry . '</option>';
					}
					$output .= '</select>';							
					$output .= '<div id="'.$value['id'].'-preview" class="theme-header-font-preview" style="font-family: '.$general_fonts[$value['current']].'">';
					$output .= 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.';
					$output .= '</div>';
					$output .= '<small>Font Preview</small>';
				}
				if($value['data'] == 'google'){						
					$output .= '<select name="' . $value['id'] . '" class="theme-google-font-selector" id = "'. $value['id'].'">';
					foreach($google_fonts as $key => $entry) {
						if($value['current'] == $entry) {
							$selected = " selected='selected'";
						} else {
							$selected = "";
						}
						$output .= '<option'.$selected.' value="'. $entry .'">' . $key . '</option>';
					}
					$output .= '</select>';						
					$header_font_family = array_search($value['current'], $google_fonts);							
					$output .= '<link href="http://fonts.googleapis.com/css?family='.$value['current'].'" rel="stylesheet" type="text/css" class="'.$value['id'].'-temp-header-font" />';							
					$output .= '<div id="'.$value['id'].'-preview" class="theme-header-font-preview" style="font-family: '.$header_font_family.'">';
					$output .= 'Lorem ipsum dolor sit amet';
					$output .= '</div>';							
					$output .= '<small>Note: Give a second for each Google font to load when previewing.</small>';
				}
			}
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;

		/***** Tweet Button *****/

		case 'tweet' :						

			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';												
			foreach($value['data']  as $key => $entry) {
				if($value['current'] == $key) {
					$checked = " checked";
				} else {
					$checked = "";
				}							
				$output .= '<p class="checkbox"><input class="theme-radio theme-tweet-selector '.$value['class'].'" type="radio" name="'.$value['id'].'" value="'.$key.'"'.$checked.'>'.$entry.'</p>';
			}		
			$output .= '<div id="'.$value['id'].'-preview" class="theme-tweet-preview">';
			$output .= '<a href="http://twitter.com/share" class="twitter-share-button" data-count="'.$value['current'].'">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
			$output .= '</div>';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;			

		/***** FB Like Button *****/

		case 'fblike' :						

			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';			
			foreach($value['data']  as $key => $entry) {
				if($value['current'] == $key) {
					$checked = " checked";
				} else {
					$checked = "";
				}							
				$output .= '<p class="checkbox"><input class="theme-radio theme-fblike-selector '.$value['class'].'" type="radio" name="'.$value['id'].'" value="'.$key.'"'.$checked.'>'.$entry.'</p>';
			}				
			$output .= '<div id="'.$value['id'].'-preview" class="theme-fblike-preview">';
			$output .= '<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.viperthemes.com&amp;send=false&amp;layout='.$value['current'].'&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:65px;" allowTransparency="true"></iframe>';
			$output .= '</div>';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;				

		/***** Google +1 Button *****/

		case 'gplus' :						

			if($value['current'] == "vertical"){
				$layout_options = 'size="tall"';
			}elseif($value['current'] == "horizontal"){
				$layout_options = 'size="medium"';
			}else{
				$layout_options = 'size="medium" annotation="none"';
			}
		
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';			
			foreach($value['data']  as $key => $entry) {
				if($value['current'] == $key) {
					$checked = " checked";
				} else {
					$checked = "";
				}							
				$output .= '<p class="checkbox"><input class="theme-radio theme-gplus-selector '.$value['class'].'" type="radio" name="'.$value['id'].'" value="'.$key.'"'.$checked.'>'.$entry.'</p>';
			}				
			$output .= '<br /><div id="'.$value['id'].'-preview" class="theme-gplus-preview">';
			$output .= '<script type="text/javascript">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true; po.src = "https://apis.google.com/js/plusone.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s); })();</script>';
			$output .= '<g:plusone '.$layout_options.'></g:plusone>';
			$output .= '</div>';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;			

		/***** Google +1 Button *****/

		case 'pinit' :

			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';			
			foreach($value['data']  as $key => $entry) {
				if($value['current'] == $key) {
					$checked = " checked";
				} else {
					$checked = "";
				}							
				$output .= '<p class="checkbox"><input class="theme-radio theme-pinit-selector '.$value['class'].'" type="radio" name="'.$value['id'].'" value="'.$key.'"'.$checked.'>'.$entry.'</p>';
			}				
		/*	$output .= '<br /><div id="'.$value['id'].'-preview" class="theme-pinit-preview">';
			$output .= '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>';
			$output .= '<a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fviperthemes.com%2Ftheme%2F'.THEME_SLUG.'&media=http%3A%2F%2Fviperthemes.com%2Ftheme%2F'.THEME_SLUG.'%2Fwp-content%2Fthemes%2F'.THEME_SLUG.'%2Fscreenshot.png" class="pin-it-button" count-layout="'.$value['current'].'"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>';
			$output .= '</div>';*/
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;		
			
		/***** Radio Set *****/

		case 'radio' :					
			$radio_options = $value['data'];
			$output .= '<div class="theme-entry theme-radio">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			foreach($radio_options as $key => $entry) {
				if($value['current'] == $key) {
					$checked = " checked";
				} else {
					$checked = "";
				}							
				$output .= '<p class="checkbox"><input class="theme-radio '.$value['class'].'" type="radio" name="'.$value['id'].'" value="'.$key.'"'.$checked.'>'.$entry.'</p>';
			}
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;

		/***** Checkbox (group of checkboxes) *****/

		case 'checkbox' :
			
			$checkboxes = $value['data'];
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 					  
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			foreach($checkboxes as $key => $entry) {				
				$checked = '';
				if(is_array($value['current']) && in_array($key, $value['current']) ) {
				   $checked = ' checked="checked"';
				}
				$output .= '<p class="checkbox"><input type="checkbox" name="'.$value['id'].'[]" value="'.$key.'" class="theme-checkbox"'.$checked.' />'.$entry.'</p>';						
			}
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;
			
		/***** Toggle *****/							
		
		case 'toggle' :
						
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 					  
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<p class="checkbox"><input class="theme-radio '.$value['class'].'" type="radio" name="'.$value['id'].'" value="true"'.(($value['current'] == 'true')?' checked':'').'>Enabled</p>';
			$output .= '<p class="checkbox"><input class="theme-radio '.$value['class'].'" type="radio" name="'.$value['id'].'" value="false"'.(($value['current'] != 'true')?' checked':'').'>Disabled</p>';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;						
		
		/***** Color Picker *****/

		case 'colorpicker' :						

			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 						
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
		/*	$output .= '<script type="text/javascript">';
			$output .= '(function($){';
			$output .= 'var initLayout = function() {';
			$output .= 'var hash = window.location.hash.replace("#", "");';
			$output .= '$("#'.$value['id'].'_picker, #'.$value['id'].'").ColorPicker({';
			$output .= 'color: $("#'.$value['id'].'").val(),';
			$output .= 'onChange: function (hsb, hex, rgb) {';
			$output .= '';
			if($value['class']){
				$output .= '$(".'.$value['class'].'").css("backgroundColor", "#" + hex);';
			}
			$output .= '$("#'.$value['id'].'").val(hex);';
			$output .= '},';
			$output .= '})';
			$output .= '.bind("keyup", function(){';
			$output .= '$(this).ColorPickerSetColor(this.value);';
			$output .= '});';
			$output .= '};';
			$output .= 'EYE.register(initLayout, "init");';
			$output .= '})(jQuery)';
			$output .= '</script>';*/
			$output .= '<div class="theme-field">';
			$output .= '<input name="'.$value['id'].'" id="'.$value['id'].'" type="text" value="'.$value['current'].'" class="theme-input-color" />';
			$output .= '<input id="'.$value['id'].'_picker" class="linkbutton color_picker" type="button" value="Pick Color" />';			
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;

		/***** Upload File *****/

		case 'upload' :						

			if($value['current']) {
				$hasFile =  ' has-file';
			} else {
				$hasFile = '';
			}
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<input type="text" name="'.$value['id'].'" id="'.$value['id'].'" value="'.$value['current'].'" class="theme-input upload'.$hasFile.'" />';
			$output .= '<input id="upload_'.$value['id'].'" class="upload_button linkbutton" type="button" value="Upload" />';
			$output .= '<div class="clear"></div>';
		/*	$output .= '<div class="theme-file" ';
			if(!$value['current']){	
				$output .= 'style="display:none;" ';
			}
			$output .= 'id="'.$value['id'].'_image">';
			
			if ( $value['current'] ) {
				$image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value['current'] );
				if($image){								
					$output .= '<img src="'.$value['current'].'" alt="" />';
				} else {
					$output .= '<div class="warning">';
					$output .= 'Oops! You did not enter a URL to an image.';
					$output .= '</div>';
				}
			}
			$removeId = $value['id']."_image";
			$output .= '<a href="#'.$removeId.'" title="Remove" class="theme-file-remove">';
			$output .=  "Remove Image";
			$output .= '</a>';
			$output .= '</div><!-- .theme-file -->';
		*/
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;

		/***** Checkbox list of Pages *****/

		case 'page_list' :
			
			$entries = get_pages('title_li=&sort_column=menu_order');
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 						
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';

			foreach ($entries as $key => $entry) {
				$title = $entry->post_title;
				$checked = '';
				if($value['current']) {
					foreach ($value['current'] as $entry2) {
						if($entry2 == $entry->ID) {
							$checked = ' checked="checked" ';
						}
					}
				}
				$output .= '<p><input class="theme-checkbox" type="checkbox" name="' . $value['id'] . '[]" value="' . $entry->ID . '"' . $checked . '> ' . $title . '</p>';
			}

			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;

		/***** Checkbox list of Blog Categories *****/

		case 'category_list' :
			
			$entries = get_categories('title_li=&orderby=name&hide_empty=0');
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			
			foreach ($entries as $key => $entry) {
				$title = $entry->name;
				$checked = '';
				if($value['current']) {
					foreach ($value['current'] as $entry2) {
						if($entry2 == $entry->ID) {
							$checked = ' checked="checked" ';
						}
					}
				}
				$output .= '<p><input class="theme-checkbox" type="checkbox" name="' . $value['id'] . '[]" value="' . $entry->ID . '"' . $checked . '> ' . $title . '</p>';
			}

			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;
			
		/***** Dropdown of Slideshows *****/

		case 'slideshow' :
			
			$arrSliders = array();
			if(class_exists('RevSlider')){
				$slider = new RevSlider();
				$arrSliders = $slider->getArrSliders();

				$output .= '<div class="theme-entry">';
				$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
				$output .= '<div class="theme-label">';
				$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
				$output .= '</div><!-- .theme-label -->';
				$output .= '<div class="theme-field">';

				$output .= '<select name="'.$value['id'].'" id="'.$value['id'].'">';
				if(!empty($arrSliders)){				
					foreach ($arrSliders as $slider) {		
						$alias = $slider->getAlias();
						$title = $slider->getTitle();
						
						if ( $value['current'] == $alias) {
							$selected = "selected='selected'";
						} else {
							$selected = "";
						}
						$output .= '<option '.$selected.' value="'. $alias.'">' . $title . '</option>';						
					}
				}

				$output .= '</select>';

				$output .= '</div><!-- .theme-field -->';
				$output .= '</div><!-- .theme-entry -->';
			}else{
				$output .= '<div class="theme-entry">In order to use the slideshow, please install Revolution Slider plugin packaged with the theme.</div>';
			}
			break;
			
		/***** Dropdown of Contact Forms *****/

		case 'contact_forms' :
			
			$entries = get_posts('post_type=wpcf7_contact_form&numberposts=-1');
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 						
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<select name="'.$value['id'].'" id="'.$value['id'].'">';

			foreach ($entries as $entry) {				
				if ( $value['current'] == $entry->ID) {
					$selected = "selected='selected'";
				} else {
					$selected = "";
				}
				$output .= '<option '.$selected.' value="'. $entry->ID.'">' . $entry->post_title . '</option>';							
			}

			$output .= '</select>';

			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;		
			
		/***** Dropdown of Pricing Tables *****/

		case 'pricing_table' :
			
			$entries = get_posts('post_type=pricetable&numberposts=-1');
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 						
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<select name="'.$value['id'].'" id="'.$value['id'].'">';

			foreach ($entries as $entry) {				
				if ( $value['current'] == $entry->ID) {
					$selected = "selected='selected'";
				} else {
					$selected = "";
				}
				$output .= '<option '.$selected.' value="'. $entry->ID.'">' . $entry->post_title . '</option>';							
			}

			$output .= '</select>';

			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;	
			
		/***** Dropdown of Portfolio Categories *****/

		case 'portfolio_category' :
			
			$select = 'All Categories';
			$entries = get_terms('portfolio_category','orderby=name&hide_empty=0');
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			
			$output .= '<select name="'.$value['id'].'" id="'.$value['id'].'">';
			$output .= '<option value="all">' . $select .'</option>';

			foreach ($entries as $key => $entry) {				
				if ( $value['current'] == $entry->slug) {
					$selected = "selected='selected'";
				} else {
					$selected = "";
				}
				$output .= '<option '.$selected.' value="'. $entry->slug.'">' . $entry->name . '</option>';							
			}

			$output .= '</select>';

			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;	
			
		/***** Dropdown of Portfolio Categories *****/

		case 'portfolio_items' :
			
			$entries = get_posts(array('post_type'=>'portfolio', 'orderby'=>'post_title', 'numberposts'=>-1, 'order'=>'ASC'));
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			
			$output .= '<select name="'.$value['id'].'" id="'.$value['id'].'">';

			foreach ($entries as $key => $entry) {				
				if ( $value['current'] == $entry->ID ) {
					$selected = "selected='selected'";
				} else {
					$selected = "";
				}
				$output .= '<option '.$selected.' value="'. $entry->ID .'">' . $entry->post_title . '</option>';							
			}

			$output .= '</select>';

			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;			

		/***** Dropdown of Galley Categories *****/

		case 'gallery_category' :
			
			$entries = get_terms('portfolio_category','orderby=name&hide_empty=0');
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			
			foreach ($entries as $key => $entry) {		
				if (in_array($entry->term_id,  $value['current'])) {
					$checked = ' checked="checked" ';
				} else {
					$checked = "";
				}
				$output .= '<p><input class="theme-checkbox" type="checkbox" name="' . $value['id'] . '[]" value="' . $entry->term_id . '"' . $checked . '> ' . $entry->name . '</p>';			
			}

			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;	
			
		/***** Dropdown of Pages *****/

		case 'page_dropdown' :					
			
			$entries = get_pages('title_li=&sort_column=post_title');
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<select name="'.$value['id'].'[]" id="'.$value['id'].'" multiple="multiple" size="10" style="width:75%;height:150px;padding:10px;">';
			$output .= '<option value="all">All Pages</option>';
			foreach ($entries as $key => $entry) {
				$value['id'] = $entry->ID;
				$title = $entry->post_title;
				if (in_array($value['id'],  $value['current'])) {
					$selected = "selected='selected'";
				} else {
					$selected = "";
				}
				$output .= '<option '.$selected.' value="'. $value['id'].'">' . $title . '</option>';
			}

			$output .= '</select>';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;

		/***** Dropdown of Blog Categories *****/

		case 'category_dropdown' :				

			$select = 'All Categories';
			$entries = get_categories('title_li=&orderby=name&hide_empty=0');
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 			   
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<select name="'.$value['id'].'" id="'.$value['id'].'">';
			$output .= '<option value="all">' . $select .'</option>';

			foreach ($entries as $key => $entry) {
				$title = $entry->name;
				if ( $value['current'] == $entry->term_id) {
					$selected = "selected='selected'";
				} else {
					$selected = "";
				}
				$output .= '<option '.$selected.' value="'. $entry->term_id.'">' . $title . '</option>';							
			}

			$output .= '</select>';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;

		/***** Dropdown of Widget Areas *****/

		case 'widgetarea_dropdown' :						

			global $wp_registered_sidebars;
			$entries = $wp_registered_sidebars;
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<select name="'.$value['id'].'" id="'.$value['id'].'">';						

			foreach ($entries as $key => $entry) {
				$value['id'] = $entry['id'];
				$title = $entry['name'];
				if ( $value['current'] == $value['id']) {
					$selected = "selected='selected'";
				} else {
					$selected = "";
				}
				$output .= '<option '.$selected.' value="'. $value['id'].'">' . $title . '</option>';
			}

			$output .= '</select>';						
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;					

		case 'themechooser' :
		
			$i = 0;				   
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';			
			foreach ($value['data'] as $key => $option) { 
				$i++;
				$checked = '';
				$selected = '';
				if($value['current'] != '') {
					if ( $value['current'] == $key) { $checked = ' checked'; $selected = 'themechooser-selected'; } 
				} else {
					if ($value['std'] == $key) { $checked = ' checked'; $selected = 'themechooser-selected'; }
					elseif ($i == 1  && !isset($value['current'])) { $checked = ' checked'; $selected = 'themechooser-selected'; }
					elseif ($i == 1  && $value['std'] == '') { $checked = ' checked'; $selected = 'themechooser-selected'; }
					else { $checked = ''; }
				}	
				
				$output .= '<div class="themechooser">';
				$output .= '<input type="radio" id="themechooser-' . $value['id'] . $i . '" class="checkbox themechooser-radio" value="'.$key.'" name="'. $value['id'].'" '.$checked.' />';
				$output .= '<div class="themechooser-label">'. $key .'</div>';
				$output .= '<div style="background-color:#'.$option[1].'" title="'.$option[0].'" class="themechooser-img '. $selected .'" onClick="document.getElementById(\'themechooser-'. $value['id'] . $i.'\').checked = true;"></div>';
				$output .= '<div class="themechooser-name">'.$option[0].'</div>';
				$output .= '</div>';							
			}
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;
			
		case 'shadowchooser' :
		
			$i = 0;				   
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field shadowchooser-field">';			
			foreach ($value['data'] as $key => $option) { 
				$i++;
				$checked = '';
				$selected = '';
				if($value['current'] != '') {
					if ( $value['current'] == $key) { $checked = ' checked'; $selected = 'shadowchooser-selected'; } 
				} else {
					if ($value['std'] == $key) { $checked = ' checked'; $selected = 'shadowchooser-selected'; }
					else { $checked = ''; }
				}	
				
				$output .= '<div class="shadowchooser '. $selected .'" onClick="document.getElementById(\'shadowchooser-'. $value['id'] . $i.'\').checked = true;">';
				$output .= '<input type="radio" id="shadowchooser-' . $value['id'] . $i . '" class="checkbox shadowchooser-radio" value="'.$key.'" name="'. $value['id'].'" '.$checked.' />';
				$output .= '<div class="shadowchooser-name">'.$option.'</div>';
				$output .= '<div class="shadowchooser-block"></div>';
				if ($key) $output .= '<div title="'.$option.'" class="shadowchooser-img" ><img src="'.THEME_HOME.'/timthumb.php?src='.THEME_HOME.'/images/shadows/'.$key.'.png&amp;w=142" alt="" /></div>';
				$output .= '</div>';							
			}
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;

		case 'imgboxchooser' :
		
			$i = 0;				   
			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field imgboxchooser-field">';			
			foreach ($value['data'] as $key => $option) { 
				$i++;
				$checked = '';
				$selected = '';
				if($value['current'] != '') {
					if ( $value['current'] == $key) { $checked = ' checked'; $selected = 'imgboxchooser-selected'; } 
				} else {
					if ($value['std'] == $key) { $checked = ' checked'; $selected = 'imgboxchooser-selected'; }
					else { $checked = ''; }
				}	
				
				$output .= '<div class="imgboxchooser '. $selected .'" onClick="document.getElementById(\'imgboxchooser-'. $value['id'] . $i.'\').checked = true;">';
				$output .= '<input type="radio" id="imgboxchooser-' . $value['id'] . $i . '" class="checkbox imgboxchooser-radio" value="'.$key.'" name="'. $value['id'].'" '.$checked.' />';
				$output .= '<div class="imgboxchooser-block">';
				$output .= '<div title="'.$option.'" class="imgboxchooser-img border-'.$key.'" ><img src="'.THEME_FRAMEWORK.'/admin/layout/images/box-image.png" /></div>';
				$output .= '</div><div class="imgboxchooser-name">'.$option.'</div>';
				$output .= '</div>';							
			}
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;
			
		/***** Color Preview *****/

		case 'color_preview' :						

			$output .= '<div class="theme-entry">';
			$output .= ($value['desc'] ? '<a class="tooltip"><span>'.$value['desc'].'</span></a>' : ''); 
			$output .= '<div class="theme-label">';
			$output .= '<label for="'.$value['id'].'">'.$value['name'].'</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';
			$output .= '<div class="theme-color-preview" style="background-color:#'.get_option(THEME_SLUG."_bgcolor").';background-image:url('.get_option(THEME_SLUG."_bgpattern").');"><div class="theme-gradient"></div></div>';		
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			break;				

		
		case 'predone_layouts' :						
			
			global $predone_layouts, $predone_layouts_content;
				
			$output .= '<div class="theme-entry">';
			$output .= '<div class="theme-label">';
			$output .= '<label for="predone_layout_type">Page</label>';
			$output .= '</div><!-- .theme-label -->';
			$output .= '<div class="theme-field">';						
			$output .= '<select name="predone_layout_type" id="predone_layout_type" class = "size-large">';
			foreach($predone_layouts as $key => $layouts) {										
				$output .= '<option value="'. $key .'">' . $layouts['name'] . '</option>';
			}
			$output .= '</select>';	
			$output .= '<input type="hidden" name="predone_layout" value="" />';
			$output .= '</div><!-- .theme-field -->';
			$output .= '</div><!-- .theme-entry -->';
			
			foreach($predone_layouts as $key => $layouts) {
				$output .= '<ul class="predone-layouts" id="predone_layout_'.$key.'">';
				foreach($layouts['options'] as $layout_id => $layout_name) {
					$output .= '<li><a href="#" title="'.$layout_name.'" data-id="'.$layout_id.'"><img src="'.THEME_FRAMEWORK.'/admin/layout/images/predone_layouts/'.$layout_id.'.jpg" /></a></li>';
				}
				$output .= '</ul>';
			}
			
			$output .= '<ul class="predone-layouts-content">';
			foreach($predone_layouts_content as $layout_id => $layout_name) {
				$output .= '<li id="predone_layout_content_'.$layout_id.'">'.str_replace('{{placeholder}}', THEME_HOME.'/images/placeholders/', file_get_contents(THEME_ADMIN.'/shortcodes/predone_layouts/'.$layout_name.'.php')).'</li>';
			}
			$output .= '</ul>';

			break;


			
		case 'addmore_start' :
			
			$output .= '<a href="#" onclick=\'return add_more_elements(this, "'.$value['name'].'")\'>Add More</a><br /><br />';
			$output .= '<div class="'.$value['name'].'">';
			
			break;
			
		case 'addmore_stop' :
			
			$output .= '<br /><br /></div>';
			break;			
	}	
				
	return $output;
}

?>