<?php

$saved_options=array();									//Global Declaration for saved settings

function visual_editor_heading($args=array()) {

	$output = '';
	
	$output .= '<div class="visual-editor-header">';
	$output .= '<div class="area-lock lock-unlock"><a href="#" class="'.(isset($_COOKIE[$args['id']]) && $_COOKIE[$args['id']] == 'true' ? 'lock' : 'unlock').'" title="Lock/Unlock" data-id="'.$args['id'].'">Lock/Unlock</a><input type="checkbox" value="true" id="'.$args['id'].'" name="'.$args['id'].'" '.(isset($_COOKIE[$args['id']]) && $_COOKIE[$args['id']] == 'true' ? 'checked' : '').'/></div>';
	$output .= '<h4>'.$args['name'].':</h4>';
	$output .= '<a class="visual-editor-info" href="#"><span>'.$args['info'].'</span></a>';
	$output .= '</div><div class="clear"></div>';
	
	return $output;
}

function visual_editor_field($field) {
	$output = '';
	if (!isset($field['value'])) $field['value'] = '';
	if (!is_array($field['value'])) $field['value'] = stripslashes($field['value']);
	$output .= '<div class="visual-editor-element visual-editor-input-'.$field['type'].'">';	
	switch ( $field['type'] ) {		
		case 'text' :			
			$output .= '<div class="visual-editor-field">';
			$output .= '<input name="'.$field['id'].'" type="text" value="'.$field['value'].'" />';
			$output .= '</div>';			
			break;			
		case 'colorpicker' :			
			$output .= '<div class="visual-editor-field">';
			$output .= '<div class="visual-editor-field-preview" style="background:#'.$field['value'].';">'.((isset($field['info']) && $field['info']) ? '<span>'.$field['info'].'</span>' : '&nbsp;').'</div>';
			$output .= '<input name="'.$field['id'].'" type="hidden" value="'.$field['value'].'" />';
			$output .= '<div class="area-lock lock-unlock"><a href="#" class="'.(isset($_COOKIE['lock_'.$field['id']]) && $_COOKIE['lock_'.$field['id']] == 'true' ? 'lock' : 'unlock').'" title="Lock/Unlock" data-id="'.'lock_'.$field['id'].'">Lock/Unlock</a><input type="checkbox" value="true" id="'.'lock_'.$field['id'].'" name="'.'lock_'.$field['id'].'" '.(isset($_COOKIE['lock_'.$field['id']]) && $_COOKIE['lock_'.$field['id']] == 'true' ? 'checked' : '').'/></div>';
			$output .= '</div>';
			break;				
		case 'pixel' :				
			$output .= '<div class="visual-editor-field">';
			$output .= '<input name="'.$field['id'].'" type="text" value="'.$field['value'].'" maxlength="3" data-min="'.$field['min'].'" data-max="'.$field['max'].'" />';
			$output .= 'px</div>';
			break;				
		case 'select' :			
			$output .= '<div class="visual-editor-field'.(isset($field['lock']) && $field['lock'] ? ' with-lock' : '').'">';						
			$output .= '<select name="' . $field['id'] . '" id="' . $field['id'] . '">';
			foreach($field['data'] as $key => $entry) {
				if($field['value'] == (isset($field['root']) ? $field['root'] : '') . $key) {
					$selected = " selected='selected'";
				} else {
					$selected = "";
				}							
				$output .= '<option'.$selected.' value="'. (isset($field['root']) ? $field['root'] : '') . $key .'">' . $entry . '</option>';
			}
			$output .= '</select>';
			if (isset($field['lock']) && $field['lock']) {
				$output .= '<div class="area-lock lock-unlock"><a href="#" class="'.(isset($_COOKIE['lock_'.$field['id']]) && $_COOKIE['lock_'.$field['id']] == 'true' ? 'lock' : 'unlock').'" title="Lock/Unlock" data-id="'.'lock_'.$field['id'].'">Lock/Unlock</a><input type="checkbox" value="true" id="'.'lock_'.$field['id'].'" name="'.'lock_'.$field['id'].'" '.(isset($_COOKIE['lock_'.$field['id']]) && $_COOKIE['lock_'.$field['id']] == 'true' ? 'checked' : '').'/></div>';
			}
			$output .= '</div>';
			break;			
		case 'toggle' :						
			$output .= '<div class="visual-editor-field">';
			$output .= '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" value="true"'.(($field['value'] == 'true')?' checked':'').'>';
			$output .= '</div>';
			$output .= '<div class="visual-editor-label"><label for="'.$field['id'].'">'.$field['name'].':</label></div>';
			break;
		case 'radio_group' :			
			foreach($field['data'] as $key => $entry) {
				$output .= '<div class="visual-editor-label"><label for="'.$field['id'].'_'.$key.'">'.$entry.':</label></div>';
				$output .= '<div class="visual-editor-field"><input type="radio" name="' . $field['id'] . '" id="' . $field['id'].'_'.$key . '" value="'.$key.'"';
				if($field['value'] == $key) {
					$selected = " checked='checked'";
				} else {
					$selected = "";
				}							
				$output .= $selected.' /></div>';
			}
			break;				
		case 'font' :	
			global $general_fonts, $google_fonts;							
			$output .= '<div class="visual-editor-field">';	
			$current_family = explode('::', $field['value']);
			$family_type = $current_family[0];
			$current_family = $current_family[1];					
			$output .= '<select name="'.$field['id'].'" id="'.$field['id'].'_family">';
			$output .= '<option value="" '.selected($entry,"",false).'>None</option>';
			$output .= '<optgroup label="Google Fonts">';
			foreach($google_fonts as $key => $entry) $output .= '<option value="google::'.$entry.'" '.selected($entry,$current_family,false).'>'.$key.'</option>';
			$output .= '</optgroup>';
			$output .= '<optgroup label="General Fonts">';
			foreach($general_fonts as $key => $entry) $output .= '<option value="general::'.$key.'" '.selected($key,$current_family,false).'>'.$entry.'</option>';
			$output .= '</optgroup>';
			$output .= '</select>';			
			$output .= '</div>';
			break;
	}	
	$output .= '</div>';	
	return $output;
}

function visual_editor_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb;
}

function visual_editor_rgb2hex($rgb) {
   $hex  = "";
   $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);
   return $hex;
}

function visual_editor_luminance($hex) {	
	$rgb = visual_editor_hex2rgb($hex);
	$luminance = 0.2126*$rgb[0] + 0.7152*$rgb[1] + 0.0722*$rgb[2];
	return $luminance;
}

function visual_editor_contrast_color($colors, $bgcolor, $lum) {
	$max = 40;
	$luminance = visual_editor_luminance($bgcolor);
	$contrast_color = '';
	if (is_array($colors)) {
		foreach ($colors as $c) {
			if ((abs(visual_editor_luminance($c)-$luminance) > $max)) {							
				$max = abs(visual_editor_luminance($c)-$luminance);
				$contrast_color = $c;
			}
		//	echo $c.'='.abs(visual_editor_luminance($c)-$luminance).'--';
		}
	}
//	echo '----';
	return $contrast_color;
}

function visual_editor_complementary_colors($primary_color_hex) {	
	$grade1 = 0.8;
	$grade2 = 0.4;
	$grade3 = 0.6;
	$grade4 = 0.3;	
	$primary_color_rgb = visual_editor_hex2rgb($primary_color_hex);
	$color_1_rgb = array(
						round($primary_color_rgb[0]+(255-$primary_color_rgb[0])*$grade1),
						round($primary_color_rgb[1]+(255-$primary_color_rgb[1])*$grade1),
						round($primary_color_rgb[2]+(255-$primary_color_rgb[2])*$grade1),
					);
	$color_2_rgb = array(
						round($primary_color_rgb[0]+(255-$primary_color_rgb[0])*$grade2),
						round($primary_color_rgb[1]+(255-$primary_color_rgb[1])*$grade2),
						round($primary_color_rgb[2]+(255-$primary_color_rgb[2])*$grade2),
					);
	$color_3_rgb = array(
						round($primary_color_rgb[0]*$grade3),
						round($primary_color_rgb[1]*$grade3),
						round($primary_color_rgb[2]*$grade3),
					);
	$color_4_rgb = array(
						round($primary_color_rgb[0]*$grade4),
						round($primary_color_rgb[1]*$grade4),
						round($primary_color_rgb[2]*$grade4),
					);	
	$colors = array();
	$colors[] = visual_editor_rgb2hex($color_1_rgb);
	$colors[] = visual_editor_rgb2hex($color_2_rgb);
	$colors[] = $primary_color_hex;
	$colors[] = visual_editor_rgb2hex($color_3_rgb);
	$colors[] = visual_editor_rgb2hex($color_4_rgb);	
//	print_r($colors);
	return $colors;
}

function visual_editor_opposite_color($primary_color_hex) {
	$primary_color_rgb = visual_editor_hex2rgb($primary_color_hex);	
	$color_rgb = array(
					round(255-$primary_color_rgb[0]),
					round(255-$primary_color_rgb[1]),
					round(255-$primary_color_rgb[2]),
				);
	$color_hex = visual_editor_rgb2hex($color_rgb);
	return $color_hex;
}

function visual_editor_generate_random_color() {
	$length = 6;
	$valueCheck = 99999999;            
	$length = ($length<0)?-$length:$length;
	$length = ($length==0)?rand(0,$valueCheck):$length;
	$length = ($length>$valueCheck)?rand(0,$valueCheck):$length;
	$randString = "";
	srand();
	$characters = "123456789abcdef";
	while (strlen($randString) < $length) {
		$randString .= substr($characters, rand() % (strlen($characters)),1 );
	}
    return $randString;
}

function visual_editor_color_luminance($primary_color_hex, $luminance) {
	$primary_color_rgb = visual_editor_hex2rgb($primary_color_hex);	
	$color_rgb = array(
					round(min(max(0, $primary_color_rgb[0] + ($primary_color_rgb[0] * $luminance)), 255)),
					round(min(max(0, $primary_color_rgb[1] + ($primary_color_rgb[1] * $luminance)), 255)),
					round(min(max(0, $primary_color_rgb[2] + ($primary_color_rgb[2] * $luminance)), 255)),
				);
	$color_hex = visual_editor_rgb2hex($color_rgb);
	return $color_hex;	
}

function visual_editor_reset()
{
	unset($_COOKIE['visual_editor_generate']);
	
}