<?php

$GLOBALS['visual_editor_options'] = array();
if (isset($_COOKIE['visual_editor_generate']) && $_COOKIE['visual_editor_generate'] == '1') {
	
//	print_r($_COOKIE);

	foreach ($GLOBALS['visual_editor_settings'] as $key=>$settings) {
		foreach ($settings as $id=>$option) {
			$GLOBALS['visual_editor_options'][$option['id']] = (isset($_COOKIE[$option['id']]) && $_COOKIE[$option['id']] != 'null') ? $_COOKIE[$option['id']] : '';
		}
	}

	
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bgcolor"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_bgcolor"];		
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menubg_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_buttoncolor"];	
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_highlight_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_secondarycolor"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_ddmenu_highlight_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_secondarycolor"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_menu_highlight_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_secondarycolor"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_tab_highlight_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_secondarycolor"];
	

	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h2_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h3_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h4_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h5_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h6_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_heading_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_title_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_ddnmenu_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_button_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_feature_snippets_header_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_toggle_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_accordion_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_pricing_header_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_date_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_month_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_sidebar_heading_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_form_label_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_feature_snippets_header_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_comments_count_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_meta_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_image_caption_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bottom_footer_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_menu_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bar_graph_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_family"];				

	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_feature_snippets_content_font_family"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_gcontent_font_family"];				

	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h2_font_size"] = round(0.8*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h3_font_size"] = round(0.65*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h4_font_size"] = round(0.55*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h5_font_size"] = round(0.45*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h6_font_size"] = round(0.35*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_date_font_size"] = round(1*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_title_font_size"] = round(0.8*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_sidebar_heading_font_size"] = round(0.8*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_team_name_font_size"] = round(0.8*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_font_size"] = round(0.65*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_heading_font_size"] = round(0.65*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_feature_snippets_header_font_size"] = round(0.65*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_toggle_font_size"] = round(0.65*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_accordion_font_size"] = round(0.65*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_pricing_header_font_size"] = round(0.65*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_team_designation_font_size"] = round(0.65*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_form_label_font_size"] = round(0.55*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_month_font_size"] = round(0.55*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_comments_count_font_size"] = round(0.55*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_image_caption_font_size"] = round(0.55*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_tab_font_size"] = round(0.55*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_ddmenu_font_size"] = round(0.55*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_meta_font_size"] = round(0.45*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_button_font_size"] = round(0.45*$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_size"]);
	
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_feature_snippets_content_font_size"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_gcontent_font_size"];
	
	
	foreach ($GLOBALS['visual_editor_settings'] as $key=>$settings) {
		if ($key == 'elements_backgrounds') {
			$box_shadow_check = "true";
		//	print_r($GLOBALS['visual_editor_options']); $_COOKIE['elements_backgrounds'] == 'true' implies some elements have transparent bgs
			foreach ($settings as $id=>$option) {	
				if (isset($_COOKIE['elements_backgrounds']) && $_COOKIE['elements_backgrounds'] == 'true') {
					if ($GLOBALS['visual_editor_options'][$option['id']] != "true") {
						$GLOBALS['visual_editor_options'][$option['id']."color"] = "";				//say revowp_footer_bg.color="" if footer_bg=FALSE
						$GLOBALS['visual_editor_options'][$option['id']."image"] = "";
						$box_shadow_check = ($box_shadow_check == "true" ? "false" : "false");
					}																				//Do for individually unchecked element_bg flags
				} else {
					if ($GLOBALS['visual_editor_options'][$option['id']] != "true") {
						if (mt_rand(1,10) == 10) {
							$GLOBALS['visual_editor_options'][$option['id']."color"] = "";
							$GLOBALS['visual_editor_options'][$option['id']."image"] = "";
							$box_shadow_check = ($box_shadow_check == "true" ? "false" : "false");
						} else {
							$GLOBALS['visual_editor_options'][$option['id']] = "true";
						}
					}
				}
			}
			if ($box_shadow_check == "false" && !(isset($_COOKIE['general_side_gradient']) && $_COOKIE['general_side_gradient'] == 'true')) {
				$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_box_shadow"] = $box_shadow_check;
			}
		//	print_r($GLOBALS['visual_editor_options']);
		}
	}
	
	$luminance = 0;
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_bgcolor_gradient"] = "";
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_content_bgcolor_gradient"] = "";
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_bgcolor_gradient"] = "";
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bgcolor_gradient"] = "";
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor_gradient"] = "";
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_bgcolor_gradient"] = "";
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_modernmenu_gradient"] = "";
	if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_gradience"] == "light") {
		$luminance = 0.45;
	} elseif ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_gradience"] == "dark") {
		$luminance = -0.45;
	}
	if ($luminance != 0) {
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_gradient"] == "true" && $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_bgcolor"] != 'fafafa') {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_bgcolor_gradient"] = visual_editor_color_luminance($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_bgcolor"], $luminance);
		}
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_content_area_gradient"] == "true" && ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_content_bgcolor"] != 'fafafa' || $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_content_bgcolor"] != 'eeeeee')) {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_content_bgcolor_gradient"] = visual_editor_color_luminance($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_content_bgcolor"], $luminance);
		}
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bottom_footer_gradient"] == "true") {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_bgcolor_gradient"] = visual_editor_color_luminance($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_bgcolor"], $luminance);
		}
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_widgetized_footer_gradient"] == "true") {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bgcolor_gradient"] = visual_editor_color_luminance($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bgcolor"], $luminance);
		}
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_site_gradient"] == "true" && ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"] != 'fafafa' || $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"] != 'eeeeee')) {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor_gradient"] = visual_editor_color_luminance($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], $luminance);
		}
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_bar_gradient"] == "true") {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_bgcolor_gradient"] = visual_editor_color_luminance($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_bgcolor"], $luminance);
		}
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_gradient"] == "true") {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_modernmenu_gradient"] = visual_editor_color_luminance($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menubg_color"], $luminance);
		} elseif ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_bg"] != "true") {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_modernmenu_gradient"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_bgcolor"];
		}
	}

	if (isset($_COOKIE[VE_THEME_SLUG."_complemetary_colors"])) {
		$complemetary_colors = unserialize($_COOKIE[VE_THEME_SLUG."_complemetary_colors"]);
	}
	
	if (!$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_content_bgcolor"] && isset($complemetary_colors)) {
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_gcontent_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
	}
	
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h2_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h3_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h4_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h5_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h6_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_heading_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_title_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_feature_snippets_header_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];	
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_pricing_header_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_font_color"];				
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_button_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_linkcolor"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_button_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_linkcolor"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_button_font_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_date_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_primary_color"];
	$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_comments_count_font_color"] = $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_primary_color"];
	
	if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_style"] == "elegant-menu" || $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_style"] == "plain-menu" && isset($complemetary_colors)) {
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_bgcolor"]) {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_header_bgcolor"], "");
		} else {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
		}
	}
	
	if (isset($complemetary_colors)) {
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bgcolor"]) {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_heading_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bgcolor"], "");
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_linkcolor"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bgcolor"], "");
		} else {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_heading_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_linkcolor"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
		}
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_bgcolor"]) {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_menu_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_bgcolor"], "");
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_linkcolor"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_bgcolor"], "");
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bottom_footer_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_bgcolor"], "");
		} else {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_menu_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_bar_linkcolor"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bottom_footer_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
		}
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_bgcolor"]) {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_bgcolor"], "");
		} else {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_font_color"] = visual_editor_contrast_color($complemetary_colors, $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgcolor"], "");
		}
	}
	
	$shadow = 'none';
	if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_text_shadow"] == "light") {
		$shadow = 'fafafa';
	} elseif ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_text_shadow"] == "dark") {
		$shadow = '333333';
	}
	if ($shadow) {
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_accordion_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bar_graph_btn_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bar_graph_pct_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_title_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_date_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_month_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_comments_count_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_post_meta_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_breadcrumb_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_button_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_feature_snippets_header_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_feature_snippets_content_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_form_label_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_gcontent_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h1_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h2_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h3_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h4_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h5_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_h6_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_image_caption_fade_bar_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_image_caption_top_bottom_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_pricing_header_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_pricing_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_sidebar_heading_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_scontent_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_tab_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_team_name_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_team_designation_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_team_content_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_toggle_text_shadow"] = $shadow;		
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_heading_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_content_text_shadow"] = $shadow;		
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_footer_menu_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bottom_footer_text_shadow"] = $shadow;		
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bottom_footer_text_shadow"] = $shadow;		
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_top_toolbar_text_shadow"] = $shadow;
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_text_shadow"] = $shadow;
	}
	
	if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_blog_layouts_sidebar"]) {
		$blog_layouts_sidebar = explode('_', $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_blog_layouts_sidebar"]);
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_blog_layout"] = $blog_layouts_sidebar[0];
		$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_blog_sidebar"] = $blog_layouts_sidebar[1];
	}
	
	if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_logo_position"] == "header") {
		if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_logo_align"] == "logo-left" || $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_logo_align"] == "logo-right") {
			if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_align"] == "menu-left" || $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_align"] == "menu-right") {
				if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_style"] == "modern-menu") {
					$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_spacing"] = "30px 0 0 0";
				} elseif ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_style"] == "executive-menu") {
					$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_spacing"] = "40px 0 0 0";
				} elseif ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_style"] == "elegant-menu") {
					$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_spacing"] = "50px 0 0 0";
				} elseif ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_menu_style"] == "plain-menu") {
					$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_mainmenu_spacing"] = "50px 0 0 0";
				}
			}
		}
	}
	
	if ($GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgimage"] != "none") {
		
		$theme_backgrounds = array(
			'abstract-icon1.jpg' 	=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'abstract-icon2.jpg'	=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'abstract-icon3.jpg'	=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'abstract-icon4.jpg'	=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'abstract-icon5.jpg'	=> array('position'=>'left top', 'repeat'=>'repeat-x', 'scale'=>'false', 'attachment'=>'fixed'),
			'abstract-overlay.png'	=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'angular.png' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'angular-2.png' 		=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'brick-1.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'brick-2.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'brick-3.jpg'			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'brick-4.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'brick-5.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'brick-6.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),														
			'bubbled.png' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'diamonds.png' 			=> array('position'=>'left top', 'repeat'=>'repeat', 'scale'=>'false', 'attachment'=>'fixed'),
			'grunge-1.png' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'paper-1.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'pastel.png' 			=> array('position'=>'center top', 'repeat'=>'repeat-y', 'scale'=>'false', 'attachment'=>'fixed'),
			'tile.jpg' 				=> array('position'=>'left top', 'repeat'=>'repeat', 'scale'=>'false', 'attachment'=>'fixed'),
			'tropical-1.jpg' 		=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'tropical-2.jpg' 		=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'tropical-3.jpg' 		=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'tropical-4.png' 		=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'tropical-5.jpg' 		=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'tunnel.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'wallpaper.png' 		=> array('position'=>'left top', 'repeat'=>'repeat-x', 'scale'=>'false', 'attachment'=>'fixed'),
			'wood-1.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'wood-2.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
			'wood-3.jpg' 			=> array('position'=>'center top', 'repeat'=>'no-repeat', 'scale'=>'true', 'attachment'=>'fixed'),
		);
		$background = str_replace(THEME_BACKGROUNDS, '', $GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgimage"]);
		if (isset($theme_backgrounds[$background])) {
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgimage_repeat"] = $theme_backgrounds[$background]['repeat'];
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgimage_position"] = $theme_backgrounds[$background]['position'];
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgimage_scale"] = $theme_backgrounds[$background]['scale'];
			$GLOBALS['visual_editor_options'][VE_THEME_SLUG."_bgimage_attachment"] = $theme_backgrounds[$background]['attachment'];
		}
	}
	
/*	echo '<pre>';
	print_r($GLOBALS['visual_editor_options']);
	echo '</pre>';*/
}

else
{
	$cookie_expire = time() + (3600*6);
	foreach ($GLOBALS['visual_editor_settings'] as $key=>$settings) {
		foreach ($settings as $id=>$option) {
			$GLOBALS['visual_editor_options'][$option['id']] = $GLOBALS['visual_editor_settings'][$key][$id]['value'] ? $GLOBALS['visual_editor_settings'][$key][$id]['value'] : '';
			if ( is_user_logged_in() ) : 										//Set Customization cookies only if user is logged in (i.e User is logged in)
			if( current_user_can('edit_theme_options') ) : 						//Proceed only if the user can edit_theme_options
				setcookie($option['id'], $GLOBALS['visual_editor_settings'][$key][$id]['value'], $cookie_expire, '/');
			endif;
			endif;
		}
	}
	
	//print_r($GLOBALS['visual_editor_settings']);
}