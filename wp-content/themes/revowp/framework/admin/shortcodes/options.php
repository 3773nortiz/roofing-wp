<?php

$shortcodes = array(
	array(
		"name" => "Content Layouts",
		"value" => "layouts",
		"icon" => "content-layouts.png",
		"sub" => true,
		"options" => array(
			array(
				"name" => "Two Column Layout",
				"value" => "one_half_layout",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),	
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-half Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-half Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Three Column Layout",
				"value" => "one_third_layout",
				"options" => array (				
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),	
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-third Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-third Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-third Content",
						"id" => "3",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Four Column Layout",
				"value" => "one_fourth_layout",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),	
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-fourth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fourth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fourth Content",
						"id" => "3",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fourth Content",
						"id" => "4",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Five Column Layout",
				"value" => "one_fifth_layout",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),					
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-fifth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fifth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fifth Content",
						"id" => "3",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fifth Content",
						"id" => "4",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fifth Content",
						"id" => "5",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Six Column Layout",
				"value" => "one_sixth_layout",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-sixth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-sixth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-sixth Content",
						"id" => "3",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-sixth Content",
						"id" => "4",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-sixth Content",
						"id" => "5",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-sixth Content",
						"id" => "6",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "One Third - Two Third",
				"value" => "one_third_two_third",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-third Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Two-third Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Two Third - One Third",
				"value" => "two_third_one_third",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "Two-third Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-third Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "One Fourth - Three Fourth",
				"value" => "one_fourth_three_fourth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-fourth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Three-fourth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Three Fourth - One Fourth",
				"value" => "three_fourth_one_fourth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "Three-fourth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fourth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "One Fourth - One Fourth - One Half",
				"value" => "one_fourth_one_fourth_one_half",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-fourth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fourth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-half Content",
						"id" => "3",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "One Fourth - One Half - One Fourth",
				"value" => "one_fourth_one_half_one_fourth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-fourth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-half Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fourth Content",
						"id" => "3",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "One Half - One Fourth - One Fourth",
				"value" => "one_half_one_fourth_one_fourth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-half Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fourth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fourth Content",
						"id" => "3",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "One Fifth - Four Fifth",
				"value" => "one_fifth_four_fifth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-fifth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Four-fifth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Four Fifth - One Fifth",
				"value" => "four_fifth_one_fifth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "Four-fifth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-fifth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Two Fifth - Three Fifth",
				"value" => "two_fifth_three_fifth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "Two-fifth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Three-fifth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Three Fifth - Two Fifth",
				"value" => "three_fifth_two_fifth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "Three-fifth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Two-fifth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "One Sixth - Five Sixth",
				"value" => "one_sixth_five_sixth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-sixth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Five-sixth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Five Sixth - One Sixth",
				"value" => "five_sixth_one_sixth",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "Five-sixth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-sixth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "One Sixth - One Sixth - One Sixth - One Half",
				"value" => "one_sixth_one_sixth_one_sixth_one_half",
				"options" => array (
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "One-sixth Content",
						"id" => "1",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-sixth Content",
						"id" => "2",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-sixth Content",
						"id" => "3",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "One-half Content",
						"id" => "4",
						"std" => "",
						"type" => "textarea"
					),
				)
			),
			array(
				"name" => "Custom Columns",
				"value" => "custom_columns",
				"options" => array(
					array(
						"name" => "html",
						"id" => "html",
						"desc" => "Please make sure that the sum of column width and padding is always 100%. The last column can have 0% padding.",
						"type" => "html",
					),
					array (
						"name" => "Level",
						"id" => "level",
						"std" => "",
						"data" => array(
							"" => "0",						
							"_1" => "1",
							"_2" => "2",
							"_3" => "3",							
						),
						"type" => "select",
						"desc" => "Use this in case you need to nest the shortcode",
					),
					array (
						"name" => "Divider",
						"id" => "divider",
						"std" => "false",
						"type" => "toggle"
					),
					array (
						"name" => "Responsive",
						"id" => "responsive",
						"std" => "stack",
						"type" => "radio",
						"data" => array(
							"stack" => "Stack",
							"scale" => "Scale",
						),
					),
					array(
						"name" => "customcolumns_fields",
						"id" => "",
						"std" => "",
						"type" => "addmore_start",
					),
					array(
						"name" => "Width",
						"id" => "width[]",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Provide width of the column in %"
					),
					array(
						"name" => "Padding",
						"id" => "padding[]",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Provide right padding of the column in %. Default 4%"
					),
					array(
						"name" => "Content",
						"id" => "content[]",
						"std" => "",
						"type" => "textarea"
					),	
					array(
						"name" => "customcolumns_fields",
						"id" => "",
						"std" => "",
						"type" => "addmore_stop",
					),		
				),
			),
		),
	),
	array(
		"name" => "Elements",
		"value" => "html",
		"icon" => "elements.png",
		"sub" => "true",
		"options" => array(
			array(
				"name" => "Tabs",
				"value" => "tabs",
				"options" => array(			
					array(
						"name" => "tabs_fields",
						"id" => "",
						"std" => "",
						"type" => "addmore_start",
					),
					array(
						"name" => "Title",
						"id" => "title[]",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Content",
						"id" => "content[]",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Background Color",
						"id" => "bgcolor[]",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value. Eg: 23a5b3",
					),
					array(
						"name" => "Background Image",
						"id" => "bgimage[]",
						"std" => "",
						"type" => "text",
						"size" => "normal",
						"desc" => "Set the URL of the image",
					),
					array( 
						"type" => "select",
						"name" => "Background Repeat",
						"id" => "bgrepeat[]",
						"std" => "no-repeat",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "Set the repeat direction of your background image."
					),
					array( 
						"type" => "select",
						"name" => "Background Image Scale",
						"id" => "bgscale[]",
						"std" => "true",
						"data" => array(
							"true" => "Yes",
							"" => "No",
						),
						"size" => "small",
						"desc" => "Set whether a background image is scaled with the screen width."
					),				
					array(
						"name" => "tabs_fields",
						"id" => "",
						"std" => "",
						"type" => "addmore_stop",
					),	
				),
			),
			array(
				"name" => "Accordion",
				"value" => "accordion",
				"options" => array(
					array(
						"name" => "Style",
						"id" => "style",
						"std" => 'light',
						"data" => array(
							"light" => 'Light',
							"dark" => 'Dark',
							"color" => 'Color',
						),
						"type" => "select",
						"size" => "normal"
					),
					array(
						"name" => "Heading Color",
						"id" => "heading_color",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value for the heading. Eg: 23a5b3",
					),	
					array(
						"name" => "accordion_fields",
						"id" => "",
						"std" => "",
						"type" => "addmore_start",
					),
					array(
						"name" => "Title",
						"id" => "title[]",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Content",
						"id" => "content[]",
						"std" => "",
						"type" => "textarea"
					),	
					array(
						"name" => "accordion_fields",
						"id" => "",
						"std" => "",
						"type" => "addmore_stop",
					),		
				),
			),
			array(
				"name" => "Toggle",
				"value" => "toggle",
				"options" => array(
					array(
						"name" => "Title",
						"id" => "title",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Title Color",
						"id" => "title_color",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value for the title. Eg: 23a5b3",
					),	
					array(
						"name" => "Content",
						"id" => "content",
						"std" => "",
						"type" => "textarea"
					),
				),
			),
			array(
				"name" => "Bar Graph",
				"value" => "bar_graph",
				"options" => array(
					array(
						"name" => "Width",
						"id" => "width",
						"std" => '',						
						"type" => "text",
						"size" => "small",
						"desc" => "Provide width of the graph area (in px)",
					),
					array(
						"name" => "Height",
						"id" => "height",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Provide height of the bar (in px)",
					),					
					array(
						"name" => "bar_fields",
						"id" => "",
						"std" => "",
						"type" => "addmore_start",
					),
					array(
						"name" => "Bar Label",
						"id" => "title[]",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Bar Color",
						"id" => "color[]",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value for the bar. Eg: 23a5b3",
					),	
					array(
						"name" => "Bar Text Color",
						"id" => "text_color[]",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value for the text inside the bar. Eg: 23a5b3",
					),	
					array(
						"name" => "Bar Percentage Color",
						"id" => "percent_color[]",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value for the percentage text next to the bar. Eg: 23a5b3",
					),	
					array(
						"name" => "Precentage",
						"id" => "percentage[]",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Provide percentage, Eg: 85",
					),	
					array(
						"name" => "bar_fields",
						"id" => "",
						"std" => "",
						"type" => "addmore_stop",
					),		
				),
			),
			array(
				"name" => "Lists",
				"value" => "list",
				"options" => array (
					array(
						"name" => "Style",
						"id" => "style",
						"std" => 'disc',
						"data" => array(
							"none" => 'None',
							"circle" => 'Circle',
							"disc" => 'Disc',
							"square" => 'Square',
							"upper-roman" => 'Upper-case Roman',
							"lower-roman" => 'Lower-case Roman',
							"upper-alpha" => 'Upper-case Alphabets',
							"lower-alpha" => 'Lower-case Alphabets',
							"decimal" => 'Decimal',
							"green-arrow" => 'Arrow - Green',
							"red-arrow" => 'Arrow - Red',
							"bars" => 'Bars',
							"bomb" => 'Bomb',
							"check" => 'Check',
							"blue-chevron" => 'Chevron - Blue',
							"green-chevron" => 'Chevron - Green',
							"purple-chevron" => 'Chevron - Purple',
							"red-chevron" => 'Chevron - Red',
							"clock" => 'Clock',
							"green-cross" => 'Green Cross',
							"info" => 'Info',
							"lightning" => 'Lightning',
							"not-allowed" => 'Not Allowed',
							"green-plus" => 'Plus',
							"red-x" => 'Red X',
							"star" => 'Star',							
							"stop" => 'Stop',
							"warning" => 'Warning',
						),
						"type" => "select",
						"size" => "normal"
					),		
					array(
						"name" => "Float type",
						"id" => "float",
						"std" => 'none',
						"data" => array(
							"none" => "None",
							"left" => "Left",
							"right" => "Right",
						),
						"type" => "select",
						"size" => "small"
					),
					array(
						"name" => "Content",
						"id" => "content",
						"std" => "",
						"type" => "textarea",
						"desc" => "Enter lists enclosed in [li]...[/li] tags"
					),
				)
			),
			array(
				"name" => "Divider",
				"value" => "divider",
				"options" => array(
					array(
						"name" => "Type",
						"id" => "type",
						"std" => 'divider_top',
						"data" => array(
							"" => "Divider Line",
							"top" => "Divider Line With Top Scroll",
							"padding" => "Divider Padding",
							"clear" => "Clear Both",
						),
						"type" => "select",
						"size" => "normal"
					),
					array(
						"name" => "Width",
						"id" => "width",
						"std" => '100',
						"type" => "text",
						"size" => "normal",
						"desc" => "(%)",
					),
					array(
						"name" => "Height",
						"id" => "height",
						"std" => '1',
						"type" => "text",
						"size" => "normal",
						"desc" => "(px)",
					),
					array(
						"name" => "Color",
						"id" => "color",
						"std" => '404040',
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value. Eg: 23a5b3",
					),
					array(
						"name" => "Align",
						"id" => "align",
						"std" => '',
						"data" => array(
							"" => "Center",
							"left" => "Left",
							"right" => "Right",
						),
						"type" => "select",
						"size" => "normal"
					),					
				),
			),
			array(
				"name" => "iFrame",
				"value" => "vtframe",
				"options" => array(
					array(
						"name" => "Source URL",
						"id" => "src",
						"size" => "large",
						"std" => "http://",
						"type" => "text",
						"desc" => "",
					),
					array(
						"name" => "Width",
						"desc" => "Provide width (in px)",
						"id" => "width",
						"size" => "small",
						"std" => "",
						"type" => "text",
					),
					array(
						"name" => "Height",
						"desc" => "Provide height (in px)",
						"id" => "height",
						"size" => "small",
						"std" => "",
						"type" => "text",
					),
					array(
						"name" => "Scroller?",
						"id" => "scroller",
						"std" => "true",
						"type" => "toggle",
						"size" => "normal"
					),
					
				),
			),
			array(
				"name" => "Quotes",
				"value" => "blockquote",
				"options" => array (					
					array(
						"name" => "Cite (optional)",
						"id" => "cite",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Content",
						"id" => "content",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Box?",
						"id" => "box",
						"std" => "true",
						"type" => "toggle",
						"size" => "normal"
					),
					array(
						"name" => "Quotation Mark",
						"id" => "quotemark",
						"std" => "light",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"light" => "Light",
							"dark" => "Dark",
						),
					),					
				)
			),
			array(
				"name" => "Callout Box",
				"value" => "callout",
				"options" => array (					
					array (
						"name" => "Level",
						"id" => "level",
						"std" => "",
						"data" => array(
							"" => "0",						
							"_1" => "1",
							"_2" => "2",
							"_3" => "3",							
						),
						"type" => "select",
						"desc" => "Use this in case you need to nest the shortcode",
					),
					array(
						"name" => "Background Color",
						"id" => "bgcolor",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value. Eg: 23a5b3",
					),
					array(
						"name" => "Background Image",
						"id" => "bgimage",
						"std" => "",
						"type" => "text",
						"size" => "normal",
						"desc" => "Set the URL of the image",
					),
					array( 
						"type" => "select",
						"name" => "Background Repeat",
						"id" => "bgrepeat",
						"std" => "no-repeat",
						"data" => array(
							"no-repeat" => "None",
							"repeat-x" => "Horizontally",
							"repeat-y" => "Vertically",
							"repeat" => "Both"
						),
						"size" => "small",
						"desc" => "Set the repeat direction of your background image."
					),
					array( 
						"type" => "toggle",
						"name" => "Background Image Scale",
						"id" => "bgscale",
						"std" => "true",
						"size" => "small",
						"desc" => "Set whether a background image is scaled with the screen width."
					),
					array(
						"name" => "Border Color",
						"id" => "border_color",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value. Eg: 23a5b3",
					),
					array(
						"name" => "Border Width",
						"id" => "border_width",
						"std" => "1",
						"type" => "text",
						"size" => "small",
						"desc" => "(in px)",
					),
					array(
						"name" => "Border Style",
						"id" => "border_style",
						"std" => "solid",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"solid" => "Solid",
							"dotted" => "Dotted",
							"dashed" => "Dashed",
							"double" => "Double",
						),
					),
					array( 
						"type" => "toggle",
						"name" => "Rounded Corners",
						"id" => "rounded_corners",
						"std" => "false",
						"size" => "small",
						"desc" => "Set whether the corners should be rounded or not."
					),
					
					array(
						"name" => "Box Link",
						"id" => "box_link",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Enter  URL if you want this box (and all content inside) to link somewhere. Useful for making buttons",
					),
					
					array(
						"name" => "Box Width",
						"id" => "width",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Provide box width (in px)",
					),
					array (
						"name" => "Align",
						"id" => "align",
						"std" => "",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"" => "None",
							"left" => "Left",
							"center" => "Center",
							"right" => "Right",
						)
					),
					array(
						"name" => "Shadow",
						"id" => "shadow",
						"desc" => "Choose the shadow type.",
						"data" => $GLOBALS['shadow_styles'],
						"type" => "select"
					),
					array(
						"name" => "Content",
						"id" => "content",
						"std" => "",
						"type" => "textarea"
					),					
					array (
						"name" => "Left Padding",
						"id" => "leftpadding",
						"std" => "",
						"desc" => "Provide left padding in PX (optional) - this affects the inner margins of the element",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Right Padding",
						"id" => "rightpadding",
						"std" => "",
						"desc" => "Provide right padding in PX (optional) - this affects the inner margins of the element",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Top Padding",
						"id" => "toppadding",
						"std" => "",
						"desc" => "Provide top padding in PX (optional) - this affects the inner margins of the element",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Bottom Padding",
						"id" => "bottompadding",
						"std" => "",
						"desc" => "Provide bottom padding in PX (optional) - this affects the inner margins of the element",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Left Spacing",
						"id" => "leftspacing",
						"std" => "",
						"desc" => "Provide left spacing in px (optional) - this affects the spacing outside of the element",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Right Spacing",
						"id" => "rightspacing",
						"std" => "",
						"desc" => "Provide top spacing in px (optional) - this affects the spacing outside of the element",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Top Spacing",
						"id" => "topspacing",
						"std" => "",
						"desc" => "Provide top spacing in px (optional) - this affects the spacing outside of the element",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Bottom Spacing",
						"id" => "bottomspacing",
						"std" => "",
						"desc" => "Provide bottom spacing in px (optional) - this affects the spacing outside of the element",
						"type" => "text",
						"size" => "small"
					),					
					array (
						"name" => "Min Height",
						"id" => "minheight",
						"std" => "",
						"desc" => "Provide minimum height in px (optional)",
						"type" => "text",
						"size" => "small"
					),	
				)
			),
			array(
				"name" => "Elegant Box",
				"value" => "elegant",
				"options" => array (					
					array(
						"name" => "Background Color",
						"id" => "bgcolor",
						"std" => "",
						"type" => "colorpicker",
						"size" => "small",
						"desc" => "Provide HEX value. Eg: 23a5b3",
					),
					array(
						"name" => "Width",
						"id" => "width",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Provide box width (in px)",
					),
					array(
						"name" => "Height (optional)",
						"id" => "height",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Provide box height (in px)",
					),
					array (
						"name" => "Align",
						"id" => "align",
						"std" => "",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"" => "None",
							"left" => "Left",
							"center" => "Center",
							"right" => "Right",
						)
					),			
					array(
						"name" => "Shadow",
						"id" => "shadow",
						"desc" => "Choose the shadow type.",
						"data" => $GLOBALS['shadow_styles'],
						"type" => "select"
					),
					array(
						"name" => "Content",
						"id" => "content",
						"std" => "",
						"type" => "textarea"
					),					
				)
			),
			array(
				"name" => "Buttons",
				"value" => "buttons",
				"options" => array(
					array(
						"name" => "Id (optional)",
						"id" => "id",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Class (optional)",
						"id" => "class",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Size",
						"id" => "size",
						"std" => 'medium',
						"data" => array(
							"small" => "Small",
							"medium" => "Medium",
							"large" => "Large",
						),
						"type" => "select",
						"size" => "small"
					),
					array (
						"name" => "Align",
						"id" => "align",
						"std" => "left",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"" => "None",
							"left" => "Left",
							"center" => "Center",
							"right" => "Right",
						)
					),			
					array (
						"name" => "Full Width",
						"id" => "full",
						"std" => "false",
						"type" => "toggle"
					),			
					array(
						"name" => "Link (optional)",
						"id" => "link",
						"std" => "",
						"type" => "text",
						"size" => "normal",
						"desc" => "Include http://"
					),			
					array (
						"name" => "Open link in Lightbox",
						"id" => "lightbox",
						"std" => "false",
						"type" => "toggle"
					),						
					array(
						"name" => "Button Color",
						"id" => "color",
						"std" => "",				
						"type" => "colorpicker",
						"desc" => "Include the HEX # eg. 2ba412 (Optional)"
					),			
					array(
						"name" => "Text",
						"id" => "text",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Title",
						"id" => "title",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Append Character",
						"id" => "append",
						"std" => '',
						"data" => array(
							"" => "",
							"&raquo;" => "&raquo;",
							"&rsaquo;" => "&rsaquo;",
						),
						"type" => "select",
						"size" => "small"
					),					
					array (
						"name" => "Width (optional)",
						"id" => "width",
						"std" => '',
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Font Size",
						"id" => "fontsize",
						"std" => "",
						"desc" => "Provide the font size in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array(
						"name" => "Font Color",
						"id" => "fontcolor",
						"std" => "",				
						"type" => "colorpicker",
						"desc" => "Include the HEX # eg. 2ba412 (Optional)"
					),			
					array (
						"name" => "Left Spacing",
						"id" => "leftspacing",
						"std" => "",
						"desc" => "Provide left spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Right Spacing",
						"id" => "rightspacing",
						"std" => "",
						"desc" => "Provide right spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Top Spacing",
						"id" => "topspacing",
						"std" => "",
						"desc" => "Provide top spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Bottom Spacing",
						"id" => "bottomspacing",
						"std" => "",
						"desc" => "Provide bottom spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),					
				),
			),	
			array(
				"name" => "Content",
				"value" => "content",
				"options" => array (					
					array(
						"name" => "Font Family",
						"id" => "font_family",
						"std" => "",
						"type" => "font",
						"data" => array('google','general'),
						"size" => "large",
						"preview" => false,
					),
					array(
						"name" => "Font Size",
						"id" => "font_size",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Specify font size in px (Optional).",						
					),
					array(
						"name" => "Font Color",
						"id" => "color",
						"std" => "",
						"type" => "colorpicker",
						"size" => "normal"
					),
					array(
						"name" => "Text Shadow",
						"id" => "text_shadow",
						"std" => "",
						"type" => "colorpicker",
						"size" => "normal",
					),
					array(
						"name" => "Text Align",
						"id" => "text_align",
						"std" => "left",
						"type" => "select",
						"data" => array(
										"left" => "Left",
										"center" => "Center",
										"right" => "Right",
										"justify" => "Justify",
									),
						"size" => "small",
						"desc" => "Align the text inside.",						
					),
					array(
						"name" => "Content Width",
						"id" => "width",
						"std" => "",
						"type" => "text",
						"size" => "small",
						"desc" => "Specify the content width in PX or % (including px/%, optional).",						
					),					
					array(
						"name" => "Content Align",
						"id" => "align",
						"std" => "none",
						"type" => "select",
						"data" => array(
										"none" => "None",
										"left" => "Left",
										"center" => "Center",
										"right" => "Right",
									),
						"size" => "small",
						"desc" => "Align the content area.",						
					),
					array(
						"name" => "Content",
						"id" => "content",
						"std" => "",
						"type" => "textarea"
					),
					array(
						"name" => "Scale?",
						"id" => "scale",
						"std" => '',
						"desc" => "",
						"type" => "toggle"
					),
					array (
						"name" => "Left Spacing",
						"id" => "leftspacing",
						"std" => "",
						"desc" => "Provide left spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Right Spacing",
						"id" => "rightspacing",
						"std" => "",
						"desc" => "Provide right spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Top Spacing",
						"id" => "topspacing",
						"std" => "",
						"desc" => "Provide top spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Bottom Spacing",
						"id" => "bottomspacing",
						"std" => "",
						"desc" => "Provide bottom spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
				)
			),
			array(
				"name" => "Header",
				"value" => "header",
				"options" => array (					
					array(
						"name" => "Type",
						"id" => "type",
						"std" => "h1",
						"type" => "select",
						"data" => array(
							"h1" => "H1",
							"h2" => "H2",
							"h3" => "H3",
							"h4" => "H4",
							"h5" => "H5",
						),
						"size" => "small"
					),
					array (
						"name" => "Align",
						"id" => "align",
						"std" => "left",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"left" => "Left",
							"center" => "Center",
							"right" => "Right",
						)
					),					
					array(
						"name" => "Text",
						"id" => "text",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
				)
			),
			array(
				"name" => "Search Box",
				"value" => "search_box",
				"options" => array (					
					array (
						"name" => "Align",
						"id" => "align",
						"std" => "none",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"none" => "None",
							"left" => "Left",
							"center" => "Center",
							"right" => "Right",
						)
					),
					array (
						"name" => "Box",
						"id" => "box",
						"std" => "",
						"type" => "toggle",						
					),
				)
			),
			
		),	
	),	
	
	array(
		"name" => "Social Integration",
		"value" => "social",
		"icon" => "social-integration.png",
		"sub" => "true",
		"options" => array(
			array(
				"name" => "Share Buttons",
				"value" => "share",
				"options" => array (
					array(
						"name" => "Type",
						"desc" => "",
						"id" => "type",
						"std" => "all",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"twitter" => "Twitter",
							"facebook" => "Facebook",
							"gplus" => "Google +1",
							"all" => "All",
						),
					),										
				)
			),
			array(
				"name" => "Twitter Feed",
				"value" => "twitter",
				"options" => array (
					array(
						"name" => "Username",
						"desc" => "Twitter Username",
						"id" => "username",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Count",
						"desc" => "",
						"id" => "count",
						"std" => '4',
						"desc" => "Provide a number between 0 & 20",
						"type" => "text",
						"size" => "small"
					),					
				)
			),	
			array(
				"name" => "Facebook Comments",
				"value" => "fbcomments",
				"options" => array (
					array(
						"name" => "Width",
						"desc" => "Width of the commenting window (in px)",
						"id" => "width",
						"std" => "400px",
						"type" => "text",
						"size" => "small"
					),
					array(
						"name" => "Count",
						"desc" => "# of posts to be displayed, provide a number between 0 & 30",
						"id" => "count",
						"std" => '10',
						"type" => "text",
						"size" => "small"
					),					
				)
			),	
			array(
				"name" => "Facebook Like Box",
				"value" => "fbbox",
				"options" => array (
					array(
						"name" => "Facebook Page URL",
						"desc" => "",
						"id" => "url",
						"std" => "",
						"type" => "text",
						"size" => "large"
					),
					array(
						"name" => "Width",
						"desc" => "Width of the like box (in px)",
						"id" => "width",
						"std" => "282px",
						"type" => "text",
						"size" => "small"
					),
					array(
						"name" => "Show Faces",
						"desc" => "",
						"id" => "faces",
						"std" => 'true',
						"type" => "toggle"
					),	
					array(
						"name" => "Show Stream",
						"desc" => "",
						"id" => "stream",
						"std" => 'true',
						"type" => "toggle"
					),	
				)
			),			
			array(
				"name" => "Google Maps",
				"value" => "gmaps",
				"options" => array (
					array(
						"name" => "Width",
						"desc" => "Width of the window (in px)",
						"id" => "width",
						"std" => "400px",
						"type" => "text",
						"size" => "small"
					),
					array(
						"name" => "Height",
						"desc" => "Height of the window (in px)",
						"id" => "height",
						"std" => "400px",
						"type" => "text",
						"size" => "small"
					),
					array(
						"name" => "Latitude",
						"desc" => "Eg. 50.98106",
						"id" => "lat",
						"std" => "",
						"type" => "text",
						"size" => "small"
					),
					array(
						"name" => "Longtitude",
						"desc" => "Eg. -114.07680",
						"id" => "long",
						"std" => "",
						"type" => "text",
						"size" => "small"
					),
					array(
						"name" => "Address",
						"desc" => "If you do not know your location co-ordinates, indicate your address.<br>This must be indexed by Google in order to properly display the map.",
						"id" => "address",
						"std" => "",
						"type" => "textarea",
					),					
				),
			),	
			array(
				"name" => "Pin It Button",
				"value" => "pinit",
				"options" => array (
					array(
						"name" => "Image URL",
						"desc" => "Set the URL of the image",
						"id" => "image",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array(
						"name" => "Layout",
						"desc" => "Choose the layout of the button",
						"id" => "layout",
						"std" => "horizontal",
						"data" => array(
							"nocount" => "No Count",
							"vertical" => "Vertical",
							"horizontal" => "Horizontal",
						),
						"size" => "small",					
						"type" => "select",
					),							
				),
			),
			array(
				"name" => "Social Icons",
				"value" => "social_icons",
				"options" => array (
					array(
						"name" => "",
						"desc" => "Insert Social Network Icons.",
						"id" => "size",
						"std" => "",
						"type" => "html",						
					),	
				),
			),
		),
	),
	array(
		"name" => "Blog",
		"value" => "blog",
		"icon" => "blog-posts.png",
		"sub" => "true",	
		"options" => array(
			array(
				"name" => "Categories",
				"value" => "blog_categories",
				"options" => array (
					array(
						"name" => "Order",
						"id" => "orderby",
						"std" => 'name',
						"desc" => "Select the ordering of the categories",
						"type" => "select",
						"data" => array(
							"name" => "Category Name",
							"count" => "Post Count",
						),
					),					
					array(
						"name" => "Exclude",
						"id" => "exclude",
						"std" => "",
						"type" => "text",
						"desc" => "Provide comma separated category IDs (Ex: 9,16)",
						"size" => "small",						
					),
					array(
						"name" => "Hide Empty",
						"id" => "hide_empty",
						"std" => 'true',
						"desc" => "Hide empty categories",
						"type" => "toggle",
					),
				)
			),
			array(
				"name" => "Popular Posts",
				"value" => "popular_posts",
				"options" => array (
					array(
						"name" => "Count",
						"id" => "count",
						"std" => '4',
						"desc" => "Provide a number between 0 & 20",
						"type" => "text",
						"size" => "small"
					),					
					array(
						"name" => "Category (optional)",
						"id" => "cat",
						"std" => "all",
						"type" => "category_dropdown",
					),
					array(
						"name" => "Thumbnail",
						"id" => "size",
						"std" => 'medium',
						"desc" => "Size of the thumbnail image",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"" => "None",
							"small" => "Small",
							"medium" => "Medium",
							"large" => "Large"							
						)
					),
					array (
						"name" => "Image Box",
						"id" => "image_box",
						"std" => "",
						"data" => $GLOBALS['image_boxes'],
						"desc" => "Choose a image box",
						"type" => "select"	
					),
					array(
						"name" => "Shadow",
						"id" => "shadow",
						"desc" => "Choose the shadow type.",
						"data" => $GLOBALS['shadow_styles'],
						"type" => "select"
					),
					array(
						"name" => "Show title",
						"id" => "title",
						"std" => 'true',
						"desc" => "",
						"type" => "toggle"
					),
					array(
						"name" => "Show excerpt",
						"id" => "excerpt",
						"std" => 'true',
						"desc" => "",
						"type" => "toggle"
					),					
					array(
						"name" => "Excerpt Length",
						"id" => "excerpt_size",
						"std" => '100',
						"desc" => "",
						"type" => "text",
						"size" => "small",						
					),					
					array(
						"name" => "Show category",
						"id" => "category",
						"std" => 'true',
						"desc" => "",
						"type" => "toggle"
					),							
					array(
						"name" => "Show date",
						"desc" => "",
						"id" => "date",
						"std" => 'true',
						"type" => "toggle"
					),	
					array(
						"name" => "Show author",
						"desc" => "",
						"id" => "author",
						"std" => 'true',
						"type" => "toggle"
					),	
				)
			),
			array(
				"name" => "Recent Posts",
				"value" => "recent_posts",
				"options" => array (
					array(
						"name" => "Count",
						"id" => "count",
						"std" => '4',
						"desc" => "Provide a number between 0 & 20",
						"type" => "text",
						"size" => "small"
					),					
					array(
						"name" => "Category (optional)",
						"id" => "cat",
						"std" => "all",
						"type" => "category_dropdown",
					),
					array(
						"name" => "Thumbnail",
						"id" => "size",
						"std" => 'medium',
						"desc" => "Size of the thumbnail image",
						"type" => "select",
						"size" => "small",
						"data" => array(
							"" => "None",
							"small" => "Small",
							"medium" => "Medium",
							"large" => "Large"							
						)
					),					
					array (
						"name" => "Image Box",
						"id" => "image_box",
						"std" => "",
						"data" => $GLOBALS['image_boxes'],
						"desc" => "Choose a image box",
						"type" => "select"	
					),
					array(
						"name" => "Shadow",
						"id" => "shadow",
						"desc" => "Choose the shadow type.",
						"data" => $GLOBALS['shadow_styles'],
						"type" => "select"
					),
					array(
						"name" => "Show title",
						"id" => "title",
						"std" => 'true',
						"desc" => "",
						"type" => "toggle"
					),
					array(
						"name" => "Show excerpt",
						"id" => "excerpt",
						"std" => 'true',
						"desc" => "",
						"type" => "toggle"
					),					
					array(
						"name" => "Excerpt Length",
						"id" => "excerpt_size",
						"std" => '100',
						"desc" => "",
						"type" => "text",
						"size" => "small",						
					),					
					array(
						"name" => "Show category",
						"id" => "category",
						"std" => 'true',
						"desc" => "",
						"type" => "toggle"
					),							
					array(
						"name" => "Show date",
						"id" => "date",
						"std" => 'true',
						"desc" => "",
						"type" => "toggle"
					),							
					array(
						"name" => "Show author",
						"desc" => "",
						"id" => "author",
						"std" => 'true',
						"type" => "toggle"
					),	
				)
			),
		),
	),
	array(
		"name" => "Image",
		"value" => "images",		
		"icon" => "image.png",
		"options" => array(
			array(
				"name" => "Image Source URL",
				"id" => "src",
				"std" => "",
				"type" => "text",
				"size" => "large"
			),
			array(
				"name" => "Image Title (optional)",
				"id" => "title",
				"size" => "normal",
				"std" => "",
				"type" => "text",
			),							
			array (
				"name" => "Width (optional)",
				"id" => "width",
				"std" => "",
				"desc" => "Provide a width (in px)",
				"type" => "text",
				"size" => "small"
			),
			array (
				"name" => "Height (optional)",
				"id" => "height",
				"std" => "",
				"desc" => "Provide a height (in px)",
				"type" => "text",
				"size" => "small"
			),
			array(
				"name" => "Alt Text (optional)",
				"id" => "alt",
				"size" => "normal",
				"std" => "",
				"type" => "text",
			),							
			array(
				"name" => "Link (optional)",
				"size" => "large",
				"id" => "link",
				"std" => "",
				"type" => "text",
			),
			array (
				"name" => "Open link in Lightbox",
				"id" => "lightbox",
				"std" => "false",
				"type" => "toggle"
			),	
			array(
				"name" => "Hover Image URL",
				"id" => "hover_image_url",
				"std" => "",
				"type" => "text",
				"size" => "large",
				"desc" => ""
			),				
			array(
				"name" => "Caption (optional)",
				"size" => "normal",
				"id" => "caption",
				"std" => "",
				"type" => "text",
			),			
			array (
				"name" => "Caption Position",
				"id" => "caption_position",
				"std" => "bottom",
				"type" => "select",
				"size" => "small",
				"data" => array(
					"top" => "Top",
					"bottom" => "Bottom",
					"bar" => "Bar",
					"fade" => "Fade",
				)
			),
			array (
				"name" => "Image Box",
				"id" => "box",
				"std" => "",
				"data" => $GLOBALS['image_boxes'],
				"desc" => "Choose a image box",
				"type" => "select"	
			),
			array(
				"name" => "Shadow",
				"id" => "shadow",
				"desc" => "Choose the shadow type.",
				"data" => $GLOBALS['shadow_styles'],
				"type" => "select"
			),
			array (
				"name" => "Align",
				"id" => "align",
				"std" => "left",
				"type" => "select",
				"size" => "small",
				"data" => array(
					"left" => "Left",
					"center" => "Center",
					"right" => "Right",
				)
			),	
			array (
				"name" => "Left Spacing",
				"id" => "leftspacing",
				"std" => "",
				"desc" => "Provide left spacing in px (optional)",
				"type" => "text",
				"size" => "small"
			),
			array (
				"name" => "Right Spacing",
				"id" => "rightspacing",
				"std" => "",
				"desc" => "Provide right spacing in px (optional)",
				"type" => "text",
				"size" => "small"
			),
			array (
				"name" => "Top Spacing",
				"id" => "topspacing",
				"std" => "",
				"desc" => "Provide top spacing in px (optional)",
				"type" => "text",
				"size" => "small"
			),
			array (
				"name" => "Bottom Spacing",
				"id" => "bottomspacing",
				"std" => "",
				"desc" => "Provide bottom spacing in px (optional)",
				"type" => "text",
				"size" => "small"
			),
		),
	),	
	array(
		"name" => "Video",
		"value" => "video",
		"icon" => "video.png",
		"sub" => "true",
		"options" => array(			
			array(
				"name" => "Local",
				"value" => "local",
				"options" => array(
					array(
						"name" => "URL",
						"desc" => '',
						"id" => "src",
						"size" => "large",
						"std" => "http://",
						"type" => "text",
					),
					array(
						"name" => "Id (optional)",
						"id" => "id",
						"std" => "",
						"type" => "text",
						"size" => "normal"
					),
					array (
						"name" => "Width",
						"id" => "width",
						"std" => "0px",
						"desc" => "Provide a width between 0px & 960px",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Height",
						"id" => "height",
						"std" => "0px",
						"desc" => "Provide a height (in px)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Align",
						"id" => "align",
						"std" => "center",
						"type" => "select",
						"data" => array(
							"left" => "Left",
							"center" => "Center",
							"right" => "Right",
						),
						"size" => "normal"
					),	
					array(
						"name" => "Shadow",
						"id" => "shadow",
						"desc" => "Choose the shadow type.",
						"data" => $GLOBALS['shadow_styles'],
						"type" => "select"
					),								
					array (
						"name" => "Left Spacing",
						"id" => "leftspacing",
						"std" => "",
						"desc" => "Provide left spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Right Spacing",
						"id" => "rightspacing",
						"std" => "",
						"desc" => "Provide right spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Top Spacing",
						"id" => "topspacing",
						"std" => "",
						"desc" => "Provide top spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Bottom Spacing",
						"id" => "bottomspacing",
						"std" => "",
						"desc" => "Provide bottom spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
				),
			),
			array(
				"name" => "YouTube",
				"value" => "youtube",
				"options" => array(
					array(
						"name" => "Clip ID",
						"desc" => "the id from the clip's URL after v= (e.g. http://www.youtube.com/watch?v=<span style='color:red'>2DclLrdaxQd</span>)",
						"id" => "clip_id",
						"size" => "small",
						"std" => "",
						"type" => "text",
					),
					array (
						"name" => "Width",
						"id" => "width",
						"std" => "200",
						"desc" => "Provide a width between 0px & 960px",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Height",
						"id" => "height",
						"std" => "200",
						"desc" => "Provide a height (in px)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Align",
						"id" => "align",
						"std" => "center",
						"type" => "select",
						"data" => array(
							"left" => "Left",
							"center" => "Center",
							"right" => "Right",
						),
						"size" => "normal"
					),	
					array(
						"name" => "Related",
						"id" => "rel",
						"desc" => "Show/Hide Related Videos",
						"std" => "true",
						"type" => "toggle"
					),					
					array(
						"name" => "Show Info",
						"id" => "showinfo",
						"desc" => "Show/Hide Video Information",
						"std" => "true",
						"type" => "toggle"
					),
					array(
						"name" => "Player Controls",
						"id" => "controls",
						"desc" => "Show/Hide Player Controls",
						"std" => "true",
						"type" => "toggle"
					),
					array(
						"name" => "Shadow",
						"id" => "shadow",
						"desc" => "Choose the shadow type.",
						"data" => $GLOBALS['shadow_styles'],
						"type" => "select"
					),
					array (
						"name" => "Left Spacing",
						"id" => "leftspacing",
						"std" => "",
						"desc" => "Provide left spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Right Spacing",
						"id" => "rightspacing",
						"std" => "",
						"desc" => "Provide right spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Top Spacing",
						"id" => "topspacing",
						"std" => "",
						"desc" => "Provide top spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Bottom Spacing",
						"id" => "bottomspacing",
						"std" => "",
						"desc" => "Provide bottom spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
				),
			),
			array(
				"name" => "Vimeo",
				"value" => "vimeo",
				"options" => array(
					array(
						"name" => "Clip ID",
						"desc" => "the number from the clip's URL (e.g. http://vimeo.com/<span style='color:red'>123456</span>)",
						"id" => "clip_id",
						"size" => "small",
						"std" => "",
						"type" => "text",
					),
					array (
						"name" => "Width",
						"id" => "width",
						"std" => "200",
						"desc" => "Provide a width between 0px & 960px",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Height",
						"id" => "height",
						"std" => "200",
						"desc" => "Provide a height (in px)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Align",
						"id" => "align",
						"std" => "center",
						"type" => "select",
						"data" => array(
							"left" => "Left",
							"center" => "Center",
							"right" => "Right",
						),
						"size" => "normal"
					),	
					array(
						"name" => "Title",
						"id" => "title",
						"desc" => "Show/Hide Title",
						"std" => "true",
						"type" => "toggle"
					),					
					array(
						"name" => "Byline",
						"id" => "byline",
						"desc" => "Show/Hide user's byline",
						"std" => "true",
						"type" => "toggle"
					),
					array(
						"name" => "Portrait",
						"id" => "portrait",
						"desc" => "Show/Hide user's portrait",
						"std" => "true",
						"type" => "toggle"
					),
					array(
						"name" => "Shadow",
						"id" => "shadow",
						"desc" => "Choose the shadow type.",
						"data" => $GLOBALS['shadow_styles'],
						"type" => "select"
					),					
					array (
						"name" => "Left Spacing",
						"id" => "leftspacing",
						"std" => "",
						"desc" => "Provide left spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Right Spacing",
						"id" => "rightspacing",
						"std" => "",
						"desc" => "Provide right spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Top Spacing",
						"id" => "topspacing",
						"std" => "",
						"desc" => "Provide top spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
					array (
						"name" => "Bottom Spacing",
						"id" => "bottomspacing",
						"std" => "",
						"desc" => "Provide bottom spacing in px (optional)",
						"type" => "text",
						"size" => "small"
					),
				),
			),
		),
	),
	array(
		"name" => "Portfolio",
		"value" => "portfolio",
		"icon" => "portfolio.png",
		"options" => array(
			array(
				"name" => "Columns",
				"id" => "column",
				"std" => '4',
				"data" => array(
					"1" => "1 Column",
					"2" => "2 Columns",
					"3" => "3 Columns",
					"4" => "4 Columns",
					"5" => "5 Columns",
					"6" => "6 Columns",
				),
				"type" => "select",
				"size" => "normal"
			),
			array(
				"name" => "Paging",
				"id" => "paging",
				"desc" => "",
				"std" => "true",
				"type" => "toggle"
			),
			array(
				"name" => "# of items",
				"desc" => "Number of items to show per page (between -1 & 50)",
				"id" => "max",
				"std" => '10',
				"type" => "text",
				"size" => "small"
			),			
			array(
				"name" => "Category (optional)",
				"id" => "category",
				"std" => "all",
				"type" => "portfolio_category",
			),
			array(
				"name" => "Display Title",
				"id" => "title",
				"desc" => "If the option is on, it will display title of portfolio items underneith the thumbnail image.",
				"std" => "true",
				"type" => "toggle"
			),
			array(
				"name" => "Display Description",
				"id" => "desc",
				"desc" => "If the option is on, it will display title of portfolio items underneith the thumbnail image",
				"std" => "true",
				"type" => "toggle"
			),
			array(
				"name" => "Area Width",
				"desc" => "Provide width (in px) for the portfolio area (Optional)",
				"id" => "width",
				"size" => "small",
				"std" => "",
				"type" => "text",
			),
			array(
				"name" => "Thumbnail Width",
				"desc" => "Provide thumbnail width in px (Optional)",
				"id" => "thumb_width",
				"size" => "small",
				"std" => "",
				"type" => "text",
			),
			array(
				"name" => "Thumbnail Height",
				"desc" => "Provide thumbnail height in px (Optional)",
				"id" => "thumb_height",
				"size" => "small",
				"std" => "",
				"type" => "text",
			),
			array(
				"name" => "Group",
				"id" => "group",
				"desc" => "If the option is on, the lightbox will group all displayed items.",
				"std" => "true",
				"type" => "toggle"
			),
			array (
				"name" => "Image Box",
				"id" => "box",
				"std" => "",
				"data" => $GLOBALS['image_boxes'],
				"desc" => "Choose a image box",
				"type" => "select"	
			),
			array(
				"name" => "Shadow",
				"id" => "shadow",
				"desc" => "Choose the shadow type.",
				"data" => $GLOBALS['shadow_styles'],
				"type" => "select"
			),
			array (
				"name" => "Caption Position",
				"id" => "caption_position",
				"std" => "bottom",
				"type" => "select",
				"size" => "small",
				"data" => array(
					"" => "None",
					"top" => "Top",
					"bottom" => "Bottom",
					"bar" => "Bar",
					"fade" => "Fade",
				)
			),
		),
	),
/*	array(
		"name" => "Slideshow",
		"value" => "slideshow",
		"icon" => "slideshow.png",
		"options" => array(
			array(
				"name" => "Slideshow",
				"desc" => 'Select which slideshow to show. You can create slideshows <a href="'.admin_url('admin.php?page=revslider').'" target="_blank">here</a>.',
				"id" => "id",
				"type" => "slideshow",
				"std" => ""
			),		
		),
	),*/
	array(
		"name" => "Contact Information",
		"value" => "contact_info",
		"icon" => "contact-information.png",
		"options" => array(				
			array(
				"name" => "Name",
				"id" => "name",
				"size" => "normal",
				"std" => "",
				"type" => "text",
			),							
			array(
				"name" => "Address",
				"id" => "address",
				"size" => "normal",
				"std" => "",
				"type" => "textarea",
			),							
			array (
				"name" => "Phone",
				"id" => "phone",
				"std" => "",
				"type" => "text",
				"size" => "normal"
			),
			array (
				"name" => "Fax",
				"id" => "fax",
				"std" => "",
				"type" => "text",
				"size" => "normal"
			),
			array (
				"name" => "Email",
				"id" => "email",
				"std" => "",
				"type" => "text",
				"size" => "normal"
			),
			array(
				"name" => "Hours",
				"id" => "hours",
				"size" => "normal",
				"std" => "",
				"type" => "textarea",
			),					
		),
	),
	array(
		"name" => "Contact Forms",
		"value" => "contact_forms",
		"icon" => "contact-form.png",
		"options" => array(				
			array(
				"name" => "Form",
				"id" => "id",
				"std" => '',				
				"type" => "contact_forms",
				"size" => "normal",
				"desc" => 'You can create contact forms <a href="'.admin_url('admin.php?page=wpcf7').'" target="_blank">here</a>.'
			),		
		),
	),		
	array(
		"name" => "Snippet",
		"value" => "snippet",		
		"icon" => "snippet.png",
		"options" => array(
			array (
				"name" => "Layout",
				"id" => "layout",
				"std" => "1",
				"desc" => "",
				"type" => "select",
				"data" => array(
					"1" => "1",
					"2" => "2",
				),
				"size" => "normal"
			),
			array(
				"name" => "Title",
				"id" => "title",
				"std" => "",
				"type" => "text",
				"size" => "large",
				"desc" => "",
			),
			array(
				"name" => "Thumbnail URL",
				"id" => "thumbnail",
				"std" => "",
				"type" => "text",
				"size" => "large"				
			),
			array(
				"name" => "Thumbnail Height",
				"id" => "thumb_height",
				"std" => "",
				"type" => "text",
				"size" => "small",
				"desc" => "Provide height (in px) for the thumbnail area (optional)",				
			),
			array(
				"name" => "Thumbnail Width",
				"id" => "thumb_width",
				"std" => "",
				"type" => "text",
				"size" => "small",
				"desc" => "Provide width (in px) for the thumbnail (optional)"
			),			
			array(
				"name" => "Thumbnail Shadow",
				"id" => "thumb_shadow",
				"std" => "",
				"data" => $GLOBALS['shadow_styles'],
				"type" => "select",
				"size" => "small"				
			),			
			array(
				"name" => "Image Box",
				"id" => "image_box",
				"std" => "",
				"data" => $GLOBALS['image_boxes'],
				"type" => "select",
				"size" => "small"				
			),
			array(
				"name" => "Alt Text (optional)",
				"id" => "image_alt",
				"size" => "normal",
				"std" => "",
				"type" => "text",
				"desc" => "For the thumbnail image."
			),							
			array(
				"name" => "Link URL",
				"id" => "url",
				"size" => "large",
				"std" => "",
				"type" => "text",
			),							
			array(
				"name" => "Make Image Clickable",
				"id" => "image_clickable",
				"std" => "",
				"type" => "toggle",
			),
			array (
				"name" => "Button Text",
				"id" => "button_text",
				"std" => "Learn More &raquo;",
				"desc" => "",
				"type" => "text",
				"size" => "normal"
			),
			array (
				"name" => "Button Alignment",
				"id" => "button_align",
				"std" => "right",
				"desc" => "",
				"type" => "select",
				"data" => array(
					"right" => "Right",
					"left" => "Left",
				),
				"size" => "small"
			),
			array(
				"name" => "Button Size",
				"id" => "button_size",
				"std" => 'medium',
				"data" => array(
					"" => "None",
					"small" => "Small",
					"medium" => "Medium",
					"large" => "Large",
				),
				"type" => "select",
				"size" => "small"
			),
			array(
				"name" => "Button Color",
				"id" => "button_color",
				"std" => "",				
				"type" => "colorpicker",
				"desc" => "Include the HEX # eg. 2ba412 (Optional)"
			),			
			array(
				"name" => "Width",
				"id" => "width",
				"std" => "",
				"type" => "text",
				"size" => "small",
				"desc" => "Provide width (in px) for the snippet area (optional)",				
			),	
			array (
				"name" => "Align",
				"id" => "align",
				"std" => "center",
				"type" => "select",
				"data" => array(
					"left" => "Left",
					"center" => "Center",
					"right" => "Right",
				),
				"size" => "normal"
			),	
			array(
				"name" => "Content",
				"id" => "content",
				"std" => "",
				"type" => "textarea",
			),			
		),
	),
	array(
		"name" => "Pricing Block",
		"value" => "pricing_block",		
		"icon" => "pricing-block.png",
		"options" => array(
			array (
				"name" => "Layout",
				"id" => "layout",
				"std" => "1",
				"desc" => "",
				"type" => "select",
				"data" => array(
					"1" => "1",
					"2" => "2",
					"3" => "3",
					"4" => "4",
				),
				"size" => "normal"
			),
			array(
				"name" => "Title",
				"id" => "title",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => "",
			),
			array(
				"name" => "Price",
				"id" => "price",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => "Eg - 99.99",
			),
			array(
				"name" => "Currency",
				"id" => "currency",
				"size" => "small",
				"std" => "$",
				"type" => "text",				
			),							
			array (
				"name" => "Before Text",
				"id" => "before",
				"std" => "Starting From",
				"desc" => "",
				"type" => "text",
				"size" => "normal"
			),
			array (
				"name" => "After Text",
				"id" => "after",
				"std" => "Per Month",
				"desc" => "",
				"type" => "text",
				"size" => "normal"
			),
			array(
				"name" => "Link URL",
				"id" => "url",
				"size" => "normal",
				"std" => "",
				"type" => "text",
			),							
			array (
				"name" => "Button Text",
				"id" => "button_text",
				"std" => "Order Now &raquo;",
				"desc" => "",
				"type" => "text",
				"size" => "normal"
			),
			array(
				"name" => "Button Size",
				"id" => "button_size",
				"std" => 'medium',
				"data" => array(
					"" => "None",
					"small" => "Small",
					"medium" => "Medium",
					"large" => "Large",
				),
				"type" => "select",
				"size" => "small"
			),
			array(
				"name" => "Button Color",
				"id" => "button_color",
				"std" => "",				
				"type" => "colorpicker",
				"desc" => "Include the HEX # eg. 2ba412 (Optional)"
			),			
			array(
				"name" => "Thumbnail URL",
				"id" => "thumbnail",
				"std" => "",
				"type" => "text",
				"size" => "normal"				
			),
			array(
				"name" => "Image Box",
				"id" => "image_box",
				"std" => "",
				"data" => $GLOBALS['image_boxes'],
				"type" => "select",
				"size" => "small"				
			),
			array(
				"name" => "Alt Text (optional)",
				"id" => "image_alt",
				"size" => "normal",
				"std" => "",
				"type" => "text",
				"desc" => "For the thumbnail image."
			),							
			array(
				"name" => "Thumbnail Width",
				"id" => "thumb_width",
				"std" => "",
				"type" => "text",
				"size" => "small",
				"desc" => "Provide width (in px) for the thumbnail (optional)"
			),			
			array(
				"name" => "Thumbnail Shadow",
				"id" => "thumb_shadow",
				"std" => "",
				"data" => $GLOBALS['shadow_styles'],
				"type" => "select",
				"size" => "small"				
			),
			array(
				"name" => "Make Image Clickable",
				"id" => "image_clickable",
				"std" => "",
				"type" => "toggle",
			),
			array(
				"name" => "Block Width",
				"id" => "width",
				"std" => "",
				"type" => "text",
				"size" => "small",
				"desc" => "Provide width (in px) for the block (optional)",				
			),
			array (
				"name" => "Align",
				"id" => "align",
				"std" => "center",
				"type" => "select",
				"data" => array(
					"left" => "Left",
					"center" => "Center",
					"right" => "Right",
				),
				"size" => "normal"
			),	
			array(
				"name" => "Content",
				"id" => "content",
				"std" => "",
				"type" => "textarea",
			),					
		),		
	),
	array(
		"name" => "Pricing Tables",
		"value" => "pricing_table",
		"icon" => "pricing-table.png",
		"options" => array(	
			array(
				"name" => "Table",
				"id" => "id",
				"std" => '',				
				"type" => "pricing_table",
				"size" => "normal",
				"desc" => 'You can create pricing tables <a href="'.admin_url('edit.php?post_type=pricetable').'" target="_blank">here</a>.'
			),
		),
	),	
	array(
		"name" => "Team",
		"value" => "team",
		"icon" => "team-members.png",
		"options" => array(			
			array(
				"name" => "Type",
				"id" => "type",
				"std" => 'horizontal',
				"data" => array(
					"horizontal" => "Horizontal",
					"vertical" => "Vertical",
				),
				"type" => "select",
				"size" => "normal"
			),
			array(
				"name" => "team_fields",
				"id" => "",
				"std" => "",
				"type" => "addmore_start",
			),
			array(
				"name" => "Member Name",
				"id" => "name[]",
				"std" => "",
				"type" => "text",
				"size" => "normal"
			),
			array(
				"name" => "Designation",
				"id" => "designation[]",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => ""
			),
			array(
				"name" => "Facebook URL",
				"id" => "facebook[]",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => "Include http://"
			),
			array(
				"name" => "Twitter URL",
				"id" => "twitter[]",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => "Include http://"
			),
			array(
				"name" => "Google+ URL",
				"id" => "gplus[]",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => "Include http://"
			),
			array(
				"name" => "LinkedIn URL",
				"id" => "linkedin[]",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => "Include http://"
			),
			array(
				"name" => "vCard URL",
				"id" => "vcard[]",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => "Include http://"
			),
			array(
				"name" => "Phone",
				"id" => "phone[]",
				"std" => "",
				"type" => "textarea",
				"size" => "normal",
				"desc" => "Eg. 888-555-1234"
			),
			array(
				"name" => "Email",
				"id" => "email[]",
				"std" => "",
				"type" => "text",
				"size" => "normal",
				"desc" => "Eg. john@company.com"
			),
			array(
				"name" => "Image URL",
				"id" => "image_url[]",
				"std" => "",
				"type" => "text",
				"size" => "large",
				"desc" => ""
			),
			array(
				"name" => "Hover Image URL",
				"id" => "hover_image_url[]",
				"std" => "",
				"type" => "text",
				"size" => "large",
				"desc" => ""
			),
			array(
				"name" => "Image Box",
				"id" => "image_box[]",
				"std" => "",
				"type" => "select",
				"data" => $GLOBALS['image_boxes'],
			),
			array(
				"name" => "Alt Text (optional)",
				"id" => "image_alt[]",
				"size" => "normal",
				"std" => "",
				"type" => "text",
				"desc" => "For the image."
			),							
			array(
				"name" => "Image Width",
				"id" => "image_width[]",
				"std" => "",
				"type" => "text",
				"size" => "small",
				"desc" => "Eg. 200px"
			),
			array(
				"name" => "Shadow",
				"id" => "shadow[]",
				"desc" => "Choose the shadow type.",
				"data" => $GLOBALS['shadow_styles'],
				"type" => "select"
			),						
			array(
				"name" => "Bio",
				"id" => "bio[]",
				"std" => "",
				"type" => "textarea",
				"desc" => ""
			),
			array(
				"name" => "team_fields",
				"id" => "",
				"std" => "",
				"type" => "addmore_stop",
			),			
		),
	),	
	array(
		"name" => "Pre-done Layouts",
		"value" => "predone_layouts",
		"icon" => "layouts.png",
		"options" => array(			
			array(
				"name" => "Type",
				"id" => "type",
				"type" => "predone_layouts",
				"size" => "normal"
			),		
		),
	),	
);
