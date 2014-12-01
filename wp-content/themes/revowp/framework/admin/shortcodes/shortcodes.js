jQuery.noConflict()(function($){


var shortcode = {

	init:function(){
		$('select.option_selector').val('');
		$('select.option_selector').change(function(){
			
			$(".shortcode_wrap").hide();
			if(this.value !=''){
				var wrap = $("#shortcode_"+this.value).show();

			}
			
		});
		
		$('#shortcode_generate').click(function(){
			shortcode_text = shortcode.generate();
			document.getElementById("shortcode_preview").innerHTML = shortcode_text;
			$.prettyPhoto.open($('#shortcode_preview_url').val()+'&shortcode='+encodeURIComponent(shortcode_text)+'&iframe=true&width=600&height=80%', 'Shortcode Preview', shortcode_text);
		});
		
		$('#shortcode_send').click(function(){
			shortcode.sendToEditor();
		});
		$('select.option_sub_selector').val('');
		$('select.option_sub_selector').change(function(){
			$(this).closest('.shortcode_wrap').children('.sub_shortcode_wrap').hide();
			if(this.value !=''){
				sub = $("#sub_shortcode_"+this.value).show();

			}
			
		});
	
	},
	generate:function(){
		var type = $('input[name=show]').val();
		switch( type ){		
		case 'layouts':
			var sub_type = shortcode.getVal('layouts','selector');
			var divider = shortcode.getVal('layouts', sub_type, 'divider');
			var responsive = shortcode.getVal('layouts', sub_type, 'responsive');
			if(divider == "true"){
				divider = ' divider="true"';
			}else{
				divider = '';
			}
			if(responsive !== ''){
				responsive= ' responsive="'+responsive+'"';
			}
			switch(sub_type){
				case 'one_half_layout':
					return '<br />[one_half'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_half_layout', '1')+'<br />[/one_half]<br />[one_half_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_half_layout', '2')+'<br />[/one_half_last]<br />';
					break;
				case 'one_third_layout':
					return '<br />[one_third'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_third_layout', '1')+'<br />[/one_third]<br />[one_third'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_third_layout', '2')+'<br />[/one_third]<br />[one_third_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_third_layout', '3')+'<br />[/one_third_last]<br />';
					break;
				case 'one_fourth_layout':
					return '<br />[one_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_layout', '1')+'<br />[/one_fourth]<br />[one_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_layout', '2')+'<br />[/one_fourth]<br />[one_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_layout', '3')+'<br />[/one_fourth]<br />[one_fourth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_layout', '4')+'<br />[/one_fourth_last]<br />';
					break;
				case 'one_fifth_layout':
					return '<br />[one_fifth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fifth_layout', '1')+'<br />[/one_fifth]<br />[one_fifth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fifth_layout', '2')+'<br />[/one_fifth]<br />[one_fifth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fifth_layout', '3')+'<br />[/one_fifth]<br />[one_fifth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fifth_layout', '4')+'<br />[/one_fifth]<br />[one_fifth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_fifth_layout', '5')+'<br />[/one_fifth_last]<br />';
					break;
				case 'one_sixth_layout':
					return '<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_layout', '1')+'<br />[/one_sixth]<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_layout', '2')+'<br />[/one_sixth]<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_layout', '3')+'<br />[/one_sixth]<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_layout', '4')+'<br />[/one_sixth]<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_layout', '5')+'<br />[/one_sixth]<br />[one_sixth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_layout', '6')+'<br />[/one_sixth_last]<br />';
					break;
				case 'one_third_two_third':
					return '<br />[one_third'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_third_two_third', '1')+'<br />[/one_third]<br />[two_third_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_third_two_third', '2')+'<br />[/two_third_last]<br />';
					break;
				case 'two_third_one_third':
					return '<br />[two_third'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'two_third_one_third', '1')+'<br />[/two_third]<br />[one_third_last'+responsive+']<br />'+shortcode.getVal('layouts', 'two_third_one_third', '2')+'<br />[/one_third_last]<br />';
					break;
				case 'one_fourth_three_fourth':
					return '<br />[one_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_three_fourth', '1')+'<br />[/one_fourth]<br />[three_fourth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_three_fourth', '2')+'<br />[/three_fourth_last]<br />';
					break;
				case 'three_fourth_one_fourth':
					return '<br />[three_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'three_fourth_one_fourth', '1')+'<br />[/three_fourth]<br />[one_fourth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'three_fourth_one_fourth', '2')+'<br />[/one_fourth_last]<br />';
					break;
				case 'one_fourth_one_fourth_one_half':
					return '<br />[one_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_one_fourth_one_half', '1')+'<br />[/one_fourth]<br />[one_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_one_fourth_one_half', '2')+'<br />[/one_fourth]<br />[one_half_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_one_fourth_one_half', '3')+'<br />[/one_half_last]<br />';
					break;
				case 'one_fourth_one_half_one_fourth':
					return '<br />[one_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_one_half_one_fourth', '1')+'<br />[/one_fourth]<br />[one_half'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_one_half_one_fourth', '2')+'<br />[/one_half]<br />[one_fourth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_fourth_one_half_one_fourth', '3')+'<br />[/one_fourth_last]<br />';
					break;
				case 'one_half_one_fourth_one_fourth':
					return '<br />[one_half'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_half_one_fourth_one_fourth', '1')+'<br />[/one_half]<br />[one_fourth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_half_one_fourth_one_fourth', '2')+'<br />[/one_fourth]<br />[one_fourth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_half_one_fourth_one_fourth', '3')+'<br />[/one_fourth_last]<br />';
					break;
				case 'four_fifth_one_fifth':
					return '<br />[four_fifth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'four_fifth_one_fifth', '1')+'<br />[/four_fifth]<br />[one_fifth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'four_fifth_one_fifth', '2')+'<br />[/one_fifth_last]<br />';
					break;
				case 'one_fifth_four_fifth':
					return '<br />[one_fifth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_fifth_four_fifth', '1')+'<br />[/one_fifth]<br />[four_fifth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_fifth_four_fifth', '2')+'<br />[/four_fifth_last]<br />';
					break;
				case 'two_fifth_three_fifth':
					return '<br />[two_fifth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'two_fifth_three_fifth', '1')+'<br />[/two_fifth]<br />[three_fifth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'two_fifth_three_fifth', '2')+'<br />[/three_fifth_last]<br />';
					break;
				case 'three_fifth_two_fifth':
					return '<br />[three_fifth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'three_fifth_two_fifth', '1')+'<br />[/three_fifth]<br />[two_fifth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'three_fifth_two_fifth', '2')+'<br />[/two_fifth_last]<br />';
					break;
				case 'one_sixth_five_sixth':
					return '<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_five_sixth', '1')+'<br />[/one_sixth]<br />[five_sixth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_five_sixth', '2')+'<br />[/five_sixth_last]<br />';
					break;
				case 'five_sixth_one_sixth':
					return '<br />[five_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'five_sixth_one_sixth', '1')+'<br />[/five_sixth]<br />[one_sixth_last'+responsive+']<br />'+shortcode.getVal('layouts', 'five_sixth_one_sixth', '2')+'<br />[/one_sixth_last]<br />';
					break;
				case 'one_sixth_one_sixth_one_sixth_one_half':
					return '<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_one_sixth_one_sixth_one_half', '1')+'<br />[/one_sixth]<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_one_sixth_one_sixth_one_half', '2')+'<br />[/one_sixth]<br />[one_sixth'+divider+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_one_sixth_one_sixth_one_half', '3')+'<br />[/one_sixth]<br />[one_half_last'+responsive+']<br />'+shortcode.getVal('layouts', 'one_sixth_one_sixth_one_sixth_one_half', '4')+'<br />[/one_half_last]<br />';
					break;
				case 'custom_columns':
					var level = shortcode.getVal('layouts','custom_columns','level');
					var widthArray = new Array();
					jQuery('input[name="sc_layouts_'+sub_type+'_width[]"]').each(function() {
					   widthArray.push(jQuery(this).val());
					});
					var paddingArray = new Array();
					jQuery('input[name="sc_layouts_'+sub_type+'_padding[]"]').each(function() {
					   paddingArray.push(jQuery(this).val());
					});
					var contentArray = new Array();
					jQuery('textarea[name="sc_layouts_'+sub_type+'_content[]"]').each(function() {
					   contentArray.push(jQuery(this).val());
					});					
					var output = '';				
					for(var i = 0; i < widthArray.length; i++){
						if(widthArray[i]){
							output += '[column'+level+' width="'+widthArray[i]+'" padding="'+paddingArray[i]+'"]<br />'+contentArray[i]+'<br />[/column'+level+']<br />';
						}
					}				
					return '<br />[custom_columns'+level+divider+responsive+']<br />'+output+'[/custom_columns'+level+']<br />';
					break;	
			}
			break;
		case 'html':
			var sub_type = shortcode.getVal('html','selector');
			switch(sub_type){
			case 'content':
				var font_family = shortcode.getVal('html','content','font_family');
				var font_size = shortcode.getVal('html','content','font_size');
				var color = shortcode.getVal('html','content','color');
				var text_shadow = shortcode.getVal('html','content','text_shadow');
				var text_align = shortcode.getVal('html','content','text_align');
				var width = shortcode.getVal('html','content','width');
				var align = shortcode.getVal('html','content','align');
				var leftspacing = shortcode.getVal('html','content','leftspacing');
				var rightspacing = shortcode.getVal('html','content','rightspacing');
				var topspacing = shortcode.getVal('html','content','topspacing');
				var bottomspacing = shortcode.getVal('html','content','bottomspacing');
				var scale = shortcode.getVal('html','content','scale');

				if(font_family !== ''){
					font_family= ' font_family="'+font_family+'"';
				}				
				if(font_size !== ''){
					font_size= ' font_size="'+font_size+'"';
				}				
				if(color !== ''){
					color= ' color="'+color+'"';
				}	
				if(text_shadow !== ''){
					text_shadow= ' text_shadow="'+text_shadow+'"';
				}	
				if(text_align !== ''){
					text_align= ' text_align="'+text_align+'"';
				}				
				if(width !== ''){
					width= ' width="'+width+'"';
				}				
				if(align !== ''){
					align= ' align="'+align+'"';
				}				
				if(leftspacing!=''){
					leftspacing = ' leftspacing="'+leftspacing+'"';
				}else{
					leftspacing ='';
				}
				if(rightspacing!=''){
					rightspacing = ' rightspacing="'+rightspacing+'"';
				}else{
					rightspacing ='';
				}
				if(topspacing!=''){
					topspacing = ' topspacing="'+topspacing+'"';
				}else{
					topspacing ='';
				}
				if(bottomspacing!=''){
					bottomspacing = ' bottomspacing="'+bottomspacing+'"';
				}else{
					bottomspacing ='';
				}
				if(scale=="true"){
					scale = ' scale="true"';
				}else{
					scale = '';
				}
				return '<br />[content'+font_family+font_size+color+text_shadow+text_align+width+align+scale+leftspacing+rightspacing+topspacing+bottomspacing+']<br /><br />'+shortcode.getVal('html','content','content')+'<br /><br />[/content]<br />';
				break;			
			case 'list':
				var style = shortcode.getVal('html','list','style');
				if(style !== ''){
					style= ' style="'+style+'"';
				}
				var floattype = shortcode.getVal('html','list','float');
				if(floattype !== ''){
					floattype= ' float="'+floattype+'"';
				}
				return '<br />[list'+style+floattype+']<br />'+shortcode.getVal('html','list','content')+'<br />[/list]<br />';
				break;				
			case 'divider':
				var type = shortcode.getVal('html','divider','type');
				var width = shortcode.getVal('html','divider','width');
				var height = shortcode.getVal('html','divider','height');
				var color = shortcode.getVal('html','divider','color');
				var align = shortcode.getVal('html','divider','align');
				if(type!= ''){
					type = ' type="'+type+'"';
				}
				if(width!= ''){
					width = ' width="'+width+'"';
				}
				if(height!= ''){
					height = ' height="'+height+'"';
				}
				if(color!=""){
					color = ' color="'+color+'"';
				}else{
					color = '';
				}
				if(align!=""){
					align = ' align="'+align+'"';
				}else{
					align = '';
				}
				return '<br />[divider'+type+width+height+color+align+']<br />';
				break;	
			case 'vtframe':
				var src = shortcode.getVal('html','vtframe','src');
				var width = shortcode.getVal('html','vtframe','width');
				var height = shortcode.getVal('html','vtframe','height');
				var scroller = shortcode.getVal('html','vtframe','scroller');
				
				if(src!= ''){
					src = ' src="'+src+'"';
				}
				if(width!= ''){
					width = ' width="'+width+'"';
				}
				if(height!= ''){
					height = ' height="'+height+'"';
				}
				if(scroller!="true"){
					scroller = ' scroller="false"';
				}else{
					scroller = '';
				}
				return '[vtframe'+src+width+height+scroller+']';
				break;
			case 'blockquote':
				var cite = shortcode.getVal('html','blockquote','cite');
				var box = shortcode.getVal('html','blockquote','box');
				var quotemark = shortcode.getVal('html','blockquote','quotemark');
				if(cite !== ''){
					cite = ' cite="'+cite+'"';
				}
				if(box!="true"){
					box = ' box="false"';
				}else{
					box = '';
				}
				if(quotemark!= ''){
					quotemark = ' quotemark="'+quotemark+'"';
				}
				return '[blockquote'+cite+box+quotemark+']'+ shortcode.getVal('html','blockquote','content') +'[/blockquote]<br />';
				break;
			case 'callout':
				var level = shortcode.getVal('html','callout','level');
				var bgcolor = shortcode.getVal('html','callout','bgcolor');
				var bgimage = shortcode.getVal('html','callout','bgimage');
				var bgrepeat = shortcode.getVal('html','callout','bgrepeat');
				var bgscale = shortcode.getVal('html','callout','bgscale');
				var border_color = shortcode.getVal('html','callout','border_color');
				var border_width = shortcode.getVal('html','callout','border_width');
				var border_style = shortcode.getVal('html','callout','border_style');
				var rounded_corners = shortcode.getVal('html','callout','rounded_corners');
				var box_link = shortcode.getVal('html','callout','box_link');
				var width = shortcode.getVal('html','callout','width');
				var align = shortcode.getVal('html','callout','align');
				var shadow = shortcode.getVal('html','callout','shadow');
				var leftpadding = shortcode.getVal('html','callout','leftpadding');
				var rightpadding = shortcode.getVal('html','callout','rightpadding');
				var toppadding = shortcode.getVal('html','callout','toppadding');
				var bottompadding = shortcode.getVal('html','callout','bottompadding');
				var leftspacing = shortcode.getVal('html','callout','leftspacing');
				var rightspacing = shortcode.getVal('html','callout','rightspacing');
				var topspacing = shortcode.getVal('html','callout','topspacing');
				var bottomspacing = shortcode.getVal('html','callout','bottomspacing');
				var minheight = shortcode.getVal('html','callout','minheight');

				if(bgcolor !== ''){
					bgcolor = ' bgcolor="'+bgcolor+'"';
				}
				if(bgimage !== ''){
					bgimage = ' bgimage="'+bgimage+'"';
					if(bgrepeat !== ''){
						bgrepeat = ' bgrepeat="'+bgrepeat+'"';
					}
					if(bgscale=="true"){
						bgscale = ' bgscale="true"';
					}else{
						bgscale = '';
					}
				}else{
					bgrepeat = '';
					bgscale = '';
				}			
				if(border_color!=""){
					border_color = ' border_color="'+border_color+'"';
				}
				if(border_width!= ''){
					border_width = ' border_width="'+border_width+'"';
				}
				if(border_style!= ''){
					border_style = ' border_style="'+border_style+'"';
				}
				if(rounded_corners=="true"){
					rounded_corners = ' rounded_corners="true"';
				}else{
					rounded_corners = '';
				}
				if(box_link!= ''){
					box_link = ' link="'+box_link+'"';
				}
				if(width!= ''){
					width = ' width="'+width+'"';
				}
				if(align!= ''){
					align = ' align="'+align+'"';
				}
				if(shadow!=""){
					shadow = ' shadow="'+shadow+'"';
				}
				if(leftpadding!=''){
					leftpadding = ' leftpadding="'+leftpadding+'"';
				}else{
					leftpadding ='';
				}
				if(rightpadding!=''){
					rightpadding = ' rightpadding="'+rightpadding+'"';
				}else{
					rightpadding ='';
				}
				if(toppadding!=''){
					toppadding = ' toppadding="'+toppadding+'"';
				}else{
					toppadding ='';
				}
				if(bottompadding!=''){
					bottompadding = ' bottompadding="'+bottompadding+'"';
				}else{
					bottompadding ='';
				}
				if(leftspacing!=''){
					leftspacing = ' leftspacing="'+leftspacing+'"';
				}else{
					leftspacing ='';
				}
				if(rightspacing!=''){
					rightspacing = ' rightspacing="'+rightspacing+'"';
				}else{
					rightspacing ='';
				}
				if(topspacing!=''){
					topspacing = ' topspacing="'+topspacing+'"';
				}else{
					topspacing ='';
				}
				if(bottomspacing!=''){
					bottomspacing = ' bottomspacing="'+bottomspacing+'"';
				}else{
					bottomspacing ='';
				}
				if(minheight!=''){
					minheight = ' minheight="'+minheight+'"';
				}else{
					minheight ='';
				}
				return '[callout_box'+level+width+align+bgcolor+bgimage+bgrepeat+bgscale+border_color+border_width+border_style+rounded_corners+box_link+shadow+leftpadding+rightpadding+toppadding+bottompadding+leftspacing+rightspacing+topspacing+bottomspacing+minheight+']'+ shortcode.getVal('html','callout','content') +'[/callout_box'+level+']<br />';
				break;	
			case 'elegant':
				var bgcolor = shortcode.getVal('html','elegant','bgcolor');
				var shadow = shortcode.getVal('html','elegant','shadow');
				var width = shortcode.getVal('html','elegant','width');
				var height = shortcode.getVal('html','elegant','height');
				var align = shortcode.getVal('html','elegant','align');
				if(bgcolor !== ''){
					bgcolor = ' bgcolor="'+bgcolor+'"';
				}
				if(shadow!=""){
					shadow = ' shadow="'+shadow+'"';
				}
				if(width!= ''){
					width = ' width="'+width+'"';
				}
				if(height!= ''){
					height = ' height="'+height+'"';
				}
				if(align!= ''){
					align = ' align="'+align+'"';
				}
				return '[elegant_box'+width+height+align+bgcolor+shadow+']'+ shortcode.getVal('html','elegant','content') +'[/elegant_box]<br />';
				break;	
			case 'tabs':
				if(style != ''){
					style = ' style="'+ style +'"';
				}
				var titleArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_title[]"]').each(function() {
					titleArray.push(jQuery(this).val());
				});
				var contentArray = new Array();
				jQuery('textarea[name="sc_html_'+sub_type+'_content[]"]').each(function() {
					contentArray.push(jQuery(this).val());
				});
				var bgcolorArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_bgcolor[]"]').each(function() {
					bgcolorArray.push(jQuery(this).val());
				});
				var bgimageArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_bgimage[]"]').each(function() {
					bgimageArray.push(jQuery(this).val());
				});
				var bgrepeatArray = new Array();
				jQuery('select[name="sc_html_'+sub_type+'_bgrepeat[]"]').each(function() {
					bgrepeatArray.push(jQuery(this).val());
				});
				var bgscaleArray = new Array();
				jQuery('select[name="sc_html_'+sub_type+'_bgscale[]"]').each(function() {
					bgscaleArray.push(jQuery(this).val());
				});
							
				var output = '';				
				for(var i = 0; i < titleArray.length; i++){
					if(titleArray[i]){
						output += '[tab title="'+titleArray[i]+'"';
						if(bgcolorArray[i] !== ''){
							output += ' bgcolor="'+bgcolorArray[i]+'"';
						}
						if(bgimageArray[i] !== ''){
							output += ' bgimage="'+bgimageArray[i]+'"';
							if(bgrepeatArray[i] !== ''){
								output += ' bgrepeat="'+bgrepeatArray[i]+'"';
							}
							if(bgscaleArray[i]=="true"){
								output += ' bgscale="true"';
							}
						}
						output += ']<br />'+contentArray[i]+'<br />[/tab]<br />';
					}
				}				
				return '<br />[tabs]<br />'+output+'[/tabs]<br />';				
				break;
			case 'accordion':
				var style = shortcode.getVal('html','accordion','style');
				var heading_color = shortcode.getVal('html','accordion','heading_color');
				if(style != ''){
					style = ' style="'+ style +'"';
				}
				if(heading_color != ''){
					heading_color = ' heading_color="'+ heading_color +'"';
				}
				var titleArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_title[]"]').each(function() {
				   titleArray.push(jQuery(this).val());
				});
				var contentArray = new Array();
				jQuery('textarea[name="sc_html_'+sub_type+'_content[]"]').each(function() {
				   contentArray.push(jQuery(this).val());
				});					
				var output = '';				
				for(var i = 0; i < titleArray.length; i++){
					if(titleArray[i]){
						output += '[accordion title="'+titleArray[i]+'"]<br />'+contentArray[i]+'<br />[/accordion]<br />';
					}
				}				
				return '<br />[accordions'+style+heading_color+']<br />'+output+'[/accordions]<br />';	
				break;
			case 'toggle':
				var title_color = shortcode.getVal('html','toggle','title_color');
				if(title_color != ''){
					title_color = ' title_color="'+ title_color +'"';
				}
				return '<br />[toggle '+title_color+' title="'+shortcode.getVal('html','toggle','title')+'"]<br />'+shortcode.getVal('html','toggle','content')+'<br />[/toggle]<br />';
				break;
			case 'bar_graph':
				var width = shortcode.getVal('html','bar_graph','width');
				var height = shortcode.getVal('html','bar_graph','height');
				if(width != ''){
					width = ' width="'+ width +'"';
				}
				if(height != ''){
					height = ' height="'+ height +'"';
				}
				var titleArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_title[]"]').each(function() {
				   titleArray.push(jQuery(this).val());
				});
				var colorArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_color[]"]').each(function() {
				   colorArray.push(jQuery(this).val());
				});
				var text_colorArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_text_color[]"]').each(function() {
				   text_colorArray.push(jQuery(this).val());
				});
				var percent_colorArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_percent_color[]"]').each(function() {
				   percent_colorArray.push(jQuery(this).val());
				});
				var percentageArray = new Array();
				jQuery('input[name="sc_html_'+sub_type+'_percentage[]"]').each(function() {
				   percentageArray.push(jQuery(this).val());
				});					
				var output = '';				
				for(var i = 0; i < titleArray.length; i++){
					if(titleArray[i]){
						output += '[bar percentage="'+percentageArray[i]+'" color="'+colorArray[i]+'" text_color="'+text_colorArray[i]+'" percent_color="'+percent_colorArray[i]+'"]'+titleArray[i]+'[/bar]<br />';
					}
				}				
				return '<br />[bar_graph'+width+height+']<br />'+output+'[/bar_graph]<br />';	
				break;		
			case 'buttons':
				var id = shortcode.getVal('html','buttons','id');
				var c = shortcode.getVal('html','buttons','class');
				var size = shortcode.getVal('html','buttons','size');
				var full = shortcode.getVal('html','buttons','full');
				var link = shortcode.getVal('html','buttons','link');
				var color = shortcode.getVal('html','buttons','color');
				var text = shortcode.getVal('html','buttons','text');			
				var title = shortcode.getVal('html','buttons','title');			
				var append = shortcode.getVal('html','buttons','append');			
				var width = shortcode.getVal('html','buttons','width');
				var lightbox = shortcode.getVal('html','buttons','lightbox');
				var fontsize = shortcode.getVal('html','buttons','fontsize');
				var fontcolor = shortcode.getVal('html','buttons','fontcolor');
				var leftspacing = shortcode.getVal('html','buttons','leftspacing');
				var rightspacing = shortcode.getVal('html','buttons','rightspacing');
				var topspacing = shortcode.getVal('html','buttons','topspacing');
				var bottomspacing = shortcode.getVal('html','buttons','bottomspacing');
				var align = shortcode.getVal('html','buttons','align');

				if(id != ''){
					id = ' id="'+ id +'"';
				}
				if(c != ''){
					c = ' class="'+ c +'"';
				}
				if(size!=''){
					size =' size="'+size+'"';
				}
				if(full=="true"){
					full = ' full="true"';
				}else{
					full = '';
				}
				if(link!= ''){
					link = ' link="'+link+'"';
				}		
				if(title!= ''){
					title = ' title="'+title+'"';
				}
				if(color!=''){
					color = ' color="'+color+'"';
				}			
				if(width!=0){
					width = ' width="'+width+'"';
				}else{
					width ='';
				}
				if(append!=''){
					append = ' append="'+append+'"';
				}
				if(lightbox=="true"){
					lightbox = ' lightbox="true"';
				}else{
					lightbox = '';
				}
				if(fontsize!=''){
					fontsize = ' fontsize="'+fontsize+'"';
				}else{
					fontsize ='';
				}
				if(fontcolor!=''){
					fontcolor = ' fontcolor="'+fontcolor+'"';
				}			
				if(leftspacing!=''){
					leftspacing = ' leftspacing="'+leftspacing+'"';
				}else{
					leftspacing ='';
				}
				if(rightspacing!=''){
					rightspacing = ' rightspacing="'+rightspacing+'"';
				}else{
					rightspacing ='';
				}
				if(topspacing!=''){
					topspacing = ' topspacing="'+topspacing+'"';
				}else{
					topspacing ='';
				}
				if(bottomspacing!=''){
					bottomspacing = ' bottomspacing="'+bottomspacing+'"';
				}else{
					bottomspacing ='';
				}
				if(align!=''){
					align = ' align="'+align+'"';
				}else{
					align ='';
				}
				
				return '[button'+id+c+size+full+title+align+link+lightbox+color+width+append+fontsize+fontcolor+leftspacing+rightspacing+topspacing+bottomspacing+']'+text+'[/button]';
				break;
			case 'header':
				var type = shortcode.getVal('html','header','type');
				var align = shortcode.getVal('html','header','align');
				var text = shortcode.getVal('html','header','text');
				if(type !== ''){
					type = ' type="'+type+'"';
				}
				if(align !== ''){
					align = ' align="'+align+'"';
				}
				return '[header'+type+align+']'+ text +'[/header]<br />';
				break;	
			case 'search_box':
				var align = shortcode.getVal('html','search_box','align');
				var box = shortcode.getVal('html','search_box','box');
				if(align !== ''){
					align = ' align="'+align+'"';
				}
				if(box !== ''){
					box = ' box="'+box+'"';
				}
				return '[search_box'+align+box+']';
				break;
			}
			break;		
		case 'images':			
			var src = shortcode.getVal('images','src');
			var title = shortcode.getVal('images','title');
			var alt = shortcode.getVal('images','alt');
			var lightbox = shortcode.getVal('images','lightbox');
			var width = shortcode.getVal('images','width');
			var height = shortcode.getVal('images','height');
			var link = shortcode.getVal('images','link');
			var align = shortcode.getVal('images','align');
			var box = shortcode.getVal('images','box');
			var caption = shortcode.getVal('images','caption');
			var caption_position = shortcode.getVal('images','caption_position');
			var shadow = shortcode.getVal('images','shadow');
			var hover_image_url = shortcode.getVal('images','hover_image_url');
			var leftspacing = shortcode.getVal('images','leftspacing');
			var rightspacing = shortcode.getVal('images','rightspacing');
			var topspacing = shortcode.getVal('images','topspacing');
			var bottomspacing = shortcode.getVal('images','bottomspacing');
						
			if(lightbox=="true"){
				lightbox = ' lightbox="true"';
			}else{
				lightbox = '';
			}
			if(link!= ''){
				link = ' link="'+link+'"';
			}
			if(width!=0){
				width = ' width="'+width+'"';
			}else{
				width ='';
			}
			if(height!=0){
				height = ' height="'+height+'"';
			}else{
				height ='';
			}
			if(align!=''){
				align = ' align="'+align+'"';
			}else{
				align ='';
			}
			if(title!=''){
				title = ' title="'+title+'"';
			}
			if(alt!=''){
				alt = ' alt="'+alt+'"';
			}
			if(box!=''){
				box = ' box="'+box+'"';
			}else{
				box ='';
			}
			if(shadow!=""){
				shadow = ' shadow="'+shadow+'"';
			}else{
				shadow = '';
			}
			if(hover_image_url!=""){
				hover_image_url = ' hover_image_url="'+hover_image_url+'"';
			}else{
				hover_image_url = '';
			}
			if(leftspacing!=''){
				leftspacing = ' leftspacing="'+leftspacing+'"';
			}else{
				leftspacing ='';
			}
			if(rightspacing!=''){
				rightspacing = ' rightspacing="'+rightspacing+'"';
			}else{
				rightspacing ='';
			}
			if(topspacing!=''){
				topspacing = ' topspacing="'+topspacing+'"';
			}else{
				topspacing ='';
			}
			if(bottomspacing!=''){
				bottomspacing = ' bottomspacing="'+bottomspacing+'"';
			}else{
				bottomspacing ='';
			}
			if(caption!=''){
				caption = ' caption="'+caption+'"';
				if(caption_position!=''){
					caption_position = ' caption_position="'+caption_position+'"';
				}
			}else{
				caption ='';
				caption_position ='';
			}			
			return '<br />[image'+title+alt+link+lightbox+width+height+caption+caption_position+hover_image_url+box+shadow+align+leftspacing+rightspacing+topspacing+bottomspacing+']'+src+'[/image]<br />';
			break;				
		case 'social':
			var sub_type = shortcode.getVal('social','selector');
			switch(sub_type){
			case 'share':
				var type = shortcode.getVal('social','share','type');
				
				if(type !="" ){
					type = ' type="'+type+'"';
				}						
				return '<br />[share'+type+']<br />';
				break;	
			case 'twitter':
				var username = shortcode.getVal('social','twitter','username');
				var count = shortcode.getVal('social','twitter','count');
				
				if(username !="" ){
					username = ' username="'+username+'"';
				}
				if(count !="" ){
					count = ' count="'+count+'"';
				}				
				return '<br />[twitter'+username+count+']<br />';
				break;	
			case 'fbcomments':
				var width = shortcode.getVal('social','fbcomments','width');
				var count = shortcode.getVal('social','fbcomments','count');
				
				if(width !="" ){
					width = ' width="'+width+'"';
				}
				if(count !="" ){
					count = ' count="'+count+'"';
				}				
				return '<br />[fbcomments'+width+count+']<br />';
				break;	
			case 'fbbox':
				var url = shortcode.getVal('social','fbbox','url');			
				var width = shortcode.getVal('social','fbbox','width');
				var faces = shortcode.getVal('social','fbbox','faces');			
				var stream = shortcode.getVal('social','fbbox','stream');
				
				if(url !="" ){
					url = ' url="'+url+'"';
				}else{
					url = '';
				}
				if(width !="" ){
					width = ' width="'+width+'"';
				}
				if(faces=="true"){
					faces = ' faces="true"';
				}else{
					faces = ' faces="false"';
				}
				if(stream=="true"){
					stream = ' stream="true"';
				}else{
					stream = ' stream="false"';
				}					
				return '<br />[fbbox'+url+width+faces+stream+']<br />';
				break;
			case 'gmaps':
				var width = shortcode.getVal('social','gmaps','width');
				var height = shortcode.getVal('social','gmaps','height');
				var latitude = shortcode.getVal('social','gmaps','lat');
				var longitude = shortcode.getVal('social','gmaps','long');
				var address = shortcode.getVal('social','gmaps','address');
				
				if(width !="" ){
					width = ' width="'+width+'"';
				}else{
					width = '';
				}
				if(height !="" ){
					height = ' height="'+height+'"';
				}else{
					height = '';
				}
				if(latitude !="" ){
					latitude = ' lat="'+latitude+'"';
				}else{
					latitude = '';
				}	
				if(longitude !="" ){
					longitude = ' long="'+longitude+'"';
				}else{
					longitude = '';
				}	
				if(address !="" ){
					address = ' address="'+address+'"';
				}else{
					address = '';
				}
				return '<br />[gmaps'+width+height+latitude+longitude+address+']<br />';
				break;	
			case 'pinit':
				var image = shortcode.getVal('social','pinit','image');
				var layout = shortcode.getVal('social','pinit','layout');
				
				if(image !="" ){
					image = ' image="'+image+'"';
				}else{
					image = '';
				}
				if(layout !="" ){
					layout = ' layout="'+layout+'"';
				}else{
					layout = '';
				}
								
				return '<br />[pinterest'+image+layout+']<br />';
				break;		
			case 'social_icons':
			/*	var size = shortcode.getVal('social','social_icons','size');
				
				if(size !="" ){
					size = ' size="'+size+'"';
				}else{
					size = '';
				}
					*/					
				return '<br />[social_icons]<br />';
				break;	
			}
			break;
		case 'blog':
			var sub_type = shortcode.getVal('blog','selector');
			switch(sub_type){	
			case 'blog_categories':
				var orderby = shortcode.getVal('blog','blog_categories','orderby');
				var hide_empty = shortcode.getVal('blog','blog_categories','hide_empty');				
				var exclude = shortcode.getVal('blog','blog_categories','exclude');
			
				if(orderby !="" ){
					orderby = ' orderby="'+orderby+'"';
				}				
				if(hide_empty == "true"){
					hide_empty = ' hide_empty="true"';
				}else{
					hide_empty = '';
				}				
				if(exclude !="" ){
					exclude = ' exclude="'+exclude+'"';
				}	
				return '<br />[blog_categories'+orderby+hide_empty+exclude+']<br />';
				break;
			case 'popular_posts':
				var count = shortcode.getVal('blog','popular_posts','count');
				var cat = shortcode.getVal('blog','popular_posts','cat');				
				var title = shortcode.getVal('blog','popular_posts','title');
				var excerpt = shortcode.getVal('blog','popular_posts','excerpt');
				var size = shortcode.getVal('blog','popular_posts','size');
				var image_box = shortcode.getVal('blog','popular_posts','image_box');
				var shadow = shortcode.getVal('blog','popular_posts','shadow');
				var date = shortcode.getVal('blog','popular_posts','date');
				var excerpt_size = shortcode.getVal('blog','popular_posts','excerpt_size');
				var date = shortcode.getVal('blog','popular_posts','date');
				var author = shortcode.getVal('blog','popular_posts','author');
				var category = shortcode.getVal('blog','popular_posts','category');
				if(count !="" ){
					count = ' count="'+count+'"';
				}			
				if(cat!=undefined){
					cat = ' cat="'+cat+'"';
				}else{
					cat = '';
				}
				if(title == "true"){
					title = ' title="true"';
				}else{
					title = '';
				}
				if(category == "true"){
					category = ' category="true"';
				}else{
					category = '';
				}
				if(author == "true"){
					author = ' author="true"';
				}else{
					author = '';
				}				
				if(excerpt == "true"){
					excerpt = ' excerpt="true"';
					if(excerpt_size !="" ){
						excerpt_size = ' excerpt_size="'+excerpt_size+'"';					
					}
				}else{
					excerpt = '';
					excerpt_size = '';
				}
				if(size !="" ){
					size = ' size="'+size+'"';
					if(image_box !="" ){
						image_box = ' image_box="'+image_box+'"';					
					}
					if(shadow !="" ){
						shadow = ' shadow="'+shadow+'"';					
					}
				}else{
					image_box = '';
					shadow = '';
				}
				if(date == "true"){
					date = ' date="true"';
				}else{
					date = '';
				}	
				return '<br />[popular_posts'+count+cat+size+image_box+shadow+title+excerpt+excerpt_size+date+author+category+']<br />';
				break;
			case 'recent_posts':
				var count = shortcode.getVal('blog','recent_posts','count');				
				var cat = shortcode.getVal('blog','recent_posts','cat');
				var title = shortcode.getVal('blog','recent_posts','title');
				var excerpt = shortcode.getVal('blog','recent_posts','excerpt');
				var size = shortcode.getVal('blog','recent_posts','size');
				var image_box = shortcode.getVal('blog','recent_posts','image_box');
				var shadow = shortcode.getVal('blog','recent_posts','shadow');
				var excerpt_size = shortcode.getVal('blog','recent_posts','excerpt_size');
				var date = shortcode.getVal('blog','recent_posts','date');
				var author = shortcode.getVal('blog','recent_posts','author');
				var category = shortcode.getVal('blog','recent_posts','category');
				if(count !="" ){
					count = ' count="'+count+'"';
				}			
				if(cat!=undefined){
					cat = ' cat="'+cat+'"';
				}else{
					cat = '';
				}
				if(title == "true"){
					title = ' title="true"';
				}else{
					title = '';
				}
				if(category == "true"){
					category = ' category="true"';
				}else{
					category = '';
				}
				if(author == "true"){
					author = ' author="true"';
				}else{
					author = '';
				}				
				if(excerpt == "true"){
					excerpt = ' excerpt="true"';
					if(excerpt_size !="" ){
						excerpt_size = ' excerpt_size="'+excerpt_size+'"';					
					}
				}else{
					excerpt = '';
					excerpt_size = '';
				}
				if(size !="" ){
					size = ' size="'+size+'"';
					if(image_box !="" ){
						image_box = ' image_box="'+image_box+'"';					
					}
					if(shadow !="" ){
						shadow = ' shadow="'+shadow+'"';					
					}
				}else{
					image_box = '';
					shadow = '';
				}
				if(date == "true"){
					date = ' date="true"';
				}else{
					date = '';
				}
				return '<br />[recent_posts'+count+cat+size+image_box+shadow+title+excerpt+excerpt_size+date+author+category+']<br />';
				break;
			}
			break;
		case 'video':
			var sub_type = shortcode.getVal('video','selector');
			switch(sub_type){				
				case 'local':
					var id = shortcode.getVal('video','local','id');
					var src = shortcode.getVal('video','local','src');
					var width = shortcode.getVal('video','local','width');
					var height = shortcode.getVal('video','local','height');
					var align = shortcode.getVal('video','local','align');
					var shadow = shortcode.getVal('video','local','shadow');
					var leftspacing = shortcode.getVal('video','local','leftspacing');
					var rightspacing = shortcode.getVal('video','local','rightspacing');
					var topspacing = shortcode.getVal('video','local','topspacing');
					var bottomspacing = shortcode.getVal('video','local','bottomspacing');
				
					if(id !=""){
						id = ' id="'+id+'"';
					}
					if(src !=""){
						src = ' src="'+src+'"';
					}
					if(width!=0){
						width = ' width="'+width+'"';
					}else{
						width ='';
					}
					if(height!=0){
						height = ' height="'+height+'"';
					}else{
						height ='';
					}
					if(align !=""){
						align = ' align="'+align+'"';
					}					
					if(shadow!=''){
						shadow = ' shadow="'+shadow+'"';
					}else{
						shadow ='';
					}
					if(leftspacing!=''){
						leftspacing = ' leftspacing="'+leftspacing+'"';
					}else{
						leftspacing ='';
					}
					if(rightspacing!=''){
						rightspacing = ' rightspacing="'+rightspacing+'"';
					}else{
						rightspacing ='';
					}
					if(topspacing!=''){
						topspacing = ' topspacing="'+topspacing+'"';
					}else{
						topspacing ='';
					}
					if(bottomspacing!=''){
						bottomspacing = ' bottomspacing="'+bottomspacing+'"';
					}else{
						bottomspacing ='';
					}
					
					return '<br />[revo_video type="local"'+src+id+width+height+align+shadow+leftspacing+rightspacing+topspacing+bottomspacing+']<br />';
					break;
				case 'youtube':
					var clip_id = shortcode.getVal('video','youtube','clip_id');
					var width = shortcode.getVal('video','youtube','width');
					var height = shortcode.getVal('video','youtube','height');
					var align = shortcode.getVal('video','youtube','align');
					var rel = shortcode.getVal('video','youtube','rel');
					var showinfo = shortcode.getVal('video','youtube','showinfo');
					var controls = shortcode.getVal('video','youtube','controls');
					var shadow = shortcode.getVal('video','youtube','shadow');
					var leftspacing = shortcode.getVal('video','youtube','leftspacing');
					var rightspacing = shortcode.getVal('video','youtube','rightspacing');
					var topspacing = shortcode.getVal('video','youtube','topspacing');
					var bottomspacing = shortcode.getVal('video','youtube','bottomspacing');

					if(clip_id !=""){
						clip_id = ' clip_id="'+clip_id+'"';
					}
					if(width!=0){
						width = ' width="'+width+'"';
					}else{
						width ='';
					}
					if(height!=0){
						height = ' height="'+height+'"';
					}else{
						height ='';
					}
					if(align !=""){
						align = ' align="'+align+'"';
					}					
					if(rel == "true"){
						rel = ' rel="true"';
					}else{
						rel = ' rel="false"';
					}
					if(showinfo == "true"){
						showinfo = ' showinfo="true"';
					}else{
						showinfo = ' showinfo="false"';
					}
					if(controls == "true"){
						controls = ' controls="true"';
					}else{
						controls = ' controls="false"';
					}
					if(shadow!=''){
						shadow = ' shadow="'+shadow+'"';
					}else{
						shadow ='';
					}
					if(leftspacing!=''){
						leftspacing = ' leftspacing="'+leftspacing+'"';
					}else{
						leftspacing ='';
					}
					if(rightspacing!=''){
						rightspacing = ' rightspacing="'+rightspacing+'"';
					}else{
						rightspacing ='';
					}
					if(topspacing!=''){
						topspacing = ' topspacing="'+topspacing+'"';
					}else{
						topspacing ='';
					}
					if(bottomspacing!=''){
						bottomspacing = ' bottomspacing="'+bottomspacing+'"';
					}else{
						bottomspacing ='';
					}
								
					return '<br />[revo_video type="youtube"'+clip_id+width+height+align+rel+showinfo+controls+shadow+leftspacing+rightspacing+topspacing+bottomspacing+']<br />';
					break;
				case 'vimeo':
					var clip_id = shortcode.getVal('video','vimeo','clip_id');
					var width = shortcode.getVal('video','vimeo','width');
					var height = shortcode.getVal('video','vimeo','height');
					var align = shortcode.getVal('video','vimeo','align');
					var title = shortcode.getVal('video','vimeo','title');
					var byline = shortcode.getVal('video','vimeo','byline');
					var portrait = shortcode.getVal('video','vimeo','portrait');
					var shadow = shortcode.getVal('video','vimeo','shadow');
					var leftspacing = shortcode.getVal('video','vimeo','leftspacing');
					var rightspacing = shortcode.getVal('video','vimeo','rightspacing');
					var topspacing = shortcode.getVal('video','vimeo','topspacing');
					var bottomspacing = shortcode.getVal('video','vimeo','bottomspacing');
					
					if(clip_id !=""){
						clip_id = ' clip_id="'+clip_id+'"';
					}
					if(width!=0){
						width = ' width="'+width+'"';
					}else{
						width ='';
					}
					if(height!=0){
						height = ' height="'+height+'"';
					}else{
						height ='';
					}
					if(align !=""){
						align = ' align="'+align+'"';
					}					
					if(title == "true"){
						title = ' title="true"';
					}else{
						title = ' title="false"';
					}
					if(byline == "true"){
						byline = ' byline="true"';
					}else{
						byline = ' byline="false"';
					}
					if(portrait == "true"){
						portrait = ' portrait="true"';
					}else{
						portrait = ' portrait="false"';
					}
					if(shadow!=''){
						shadow = ' shadow="'+shadow+'"';
					}else{
						shadow ='';
					}
					if(leftspacing!=''){
						leftspacing = ' leftspacing="'+leftspacing+'"';
					}else{
						leftspacing ='';
					}
					if(rightspacing!=''){
						rightspacing = ' rightspacing="'+rightspacing+'"';
					}else{
						rightspacing ='';
					}
					if(topspacing!=''){
						topspacing = ' topspacing="'+topspacing+'"';
					}else{
						topspacing ='';
					}
					if(bottomspacing!=''){
						bottomspacing = ' bottomspacing="'+bottomspacing+'"';
					}else{
						bottomspacing ='';
					}
					
					return '<br />[revo_video type="vimeo"'+clip_id+width+height+align+title+byline+portrait+shadow+leftspacing+rightspacing+topspacing+bottomspacing+']<br />';
					break;				
			};
			break;		
		case 'portfolio':
			var column = shortcode.getVal('portfolio','column');
			var thumb_height = shortcode.getVal('portfolio','thumb_height');
			var thumb_width = shortcode.getVal('portfolio','thumb_width');
			var width = shortcode.getVal('portfolio','width');
			var paging = shortcode.getVal('portfolio','paging');
			var max = shortcode.getVal('portfolio','max');
			var category = shortcode.getVal('portfolio','category');
			var title = shortcode.getVal('portfolio','title');
			var desc = shortcode.getVal('portfolio','desc');
			var group = shortcode.getVal('portfolio','group');
			var box = shortcode.getVal('portfolio','box');
			var shadow = shortcode.getVal('portfolio','shadow');
			var caption_position = shortcode.getVal('portfolio','caption_position');
						
			if(column !=""){
				column = ' column="'+column+'"';
			}else{
				column = '';
			}
			if(thumb_height!=''){
				thumb_height = ' thumb_height="'+thumb_height+'"';
			}else{
				thumb_height ='';
			}
			if(thumb_width!=''){
				thumb_width = ' thumb_width="'+thumb_width+'"';
			}else{
				thumb_width ='';
			}
			if(width!=''){
				width = ' width="'+width+'"';
			}else{
				width ='';
			}
			if(paging=="true"){
				paging = ' paging="true"';
			}else{
				paging = '';
			}
			if(max!='-1' && max!='0'){
				max = ' max="'+max+'"';
			}else{
				max = '';
			}
			if(category!=undefined){
				category = ' category="'+category+'"';
			}else{
				category = '';
			}
			if(title=="true"){
				title = ' title="true"';
			} else {
				title = '';
			}
			if(desc=="true"){
				desc = ' desc="true"';
			} else {
				desc = '';
			}			
			if(group=="true"){
				group = ' group="true"';
			}else{
				group = '';
			}
			if(box!=''){
				box = ' box="'+box+'"';
			}
			if(shadow!=''){
				shadow = ' shadow="'+shadow+'"';
			}
			if(caption_position!=''){
				caption_position = ' caption_position="'+caption_position+'"';
			}
			
			return '<br />[portfolio'+column+thumb_height+thumb_width+width+paging+max+category+title+desc+group+box+shadow+caption_position+']<br />';
			break;
		case 'slideshow':
			var id = shortcode.getVal('slideshow', 'id');
						
			if(id!=''){
				id = ' '+id;
			}else{
				id = '';
			}
			
			return '[raw][rev_slider'+id+'][/raw]';					
			break;					
		case 'pricing_table':
			var id = shortcode.getVal('pricing_table', 'id');
						
			if(id!=''){
				id = ' id='+id+'';
			}else{
				id = '';
			}
			
			return '[raw][price_table'+id+'][/raw]';					
			break;					
		case 'contact_info':
			var name = shortcode.getVal('contact_info','name');
			var address = shortcode.getVal('contact_info','address');		
			var phone = shortcode.getVal('contact_info','phone');	
			var fax = shortcode.getVal('contact_info','fax');	
			var email = shortcode.getVal('contact_info','email');	
			var hours = shortcode.getVal('contact_info','hours');	
			
			if(name!=""){
				name = ' name="'+name+'"';
			} else {
				name = '';
			}			
			if(address!=""){
				address = ' address="'+address+'"';
			} else {
				address = '';
			}
			if(hours!=""){
				hours = ' hours="'+hours+'"';
			} else {
				hours = '';
			}
			if(phone!=""){
				phone = ' phone="'+phone+'"';
			} else {
				phone = '';
			}
			if(fax!=""){
				fax = ' fax="'+fax+'"';
			} else {
				fax = '';
			}
			if(email!=""){
				email = ' email="'+email+'"';
			} else {
				email = '';
			}
			
			return '<br />[contact_info'+name+address+phone+fax+email+hours+']<br />';
			break;			
		case 'contact_forms':
			var id = shortcode.getVal('contact_forms', 'id');
						
			if(id!=''){
				id = ' id="'+id+'"';
			}else{
				id = '';
			}
			return '<br />[raw][contact-form-7'+id+'][/raw]<br />';
			break;	
		case 'formcreator':
			var sub_type = shortcode.getVal('formcreator','selector');
			switch(sub_type){	
				case 'contactform':
					var name = shortcode.getVal('formcreator','contactform','name');
					var to = shortcode.getVal('formcreator','contactform','to');		
					var antispam = shortcode.getVal('formcreator','contactform','antispam');	
					
					if(name!=""){
						name = ' subject="'+name+'"';
					} else {
						name = '';
					}			
					if(to!=""){
						to = ' to="'+to+'"';
					} else {
						to = '';
					}
					if(antispam=="true"){
						antispam = ' antispam="true"';
					} else {
						antispam = ' antispam="false"';
					}

					return '[contact-form'+name+to+antispam+']<br />[contact-field type="name" label="Name" required="true" /]<br />[contact-field type="email" label="Email" required="true" /]<br />[contact-field type="url" label="Website" /]<br />[contact-field type="textarea" label="Comments" required="true" /]<br />[/contact-form]<br />';
					break;				
				case 'text':
					var label = shortcode.getVal('formcreator','text','label');
					var required = shortcode.getVal('formcreator','text','required');					
					
					if(required=="true"){
						required = ' required="true"';
					} else {
						required = '';
					}
					if(label !=""){
						label = ' label="'+label+'"';
					} else {
						label = '';
					}
					
					return '<br />[contact-field type="text"'+label+required+']';
					break;
				case 'email':
					var label = shortcode.getVal('formcreator','email','label');
					var required = shortcode.getVal('formcreator','email','required');					
					
					if(required=="true"){
						required = ' required="true"';
					} else {
						required = '';
					}
					if(label !=""){
						label = ' label="'+label+'"';
					} else {
						label = '';
					}
					
					return '<br />[contact-field type="email"'+label+required+']';
					break;
				case 'textarea':
					var label = shortcode.getVal('formcreator','textarea','label');
					var required = shortcode.getVal('formcreator','textarea','required');					
					
					if(required=="true"){
						required = ' required="true"';
					} else {
						required = '';
					}
					if(label !=""){
						label = ' label="'+label+'"';
					} else {
						label = '';
					}
					
					return '<br />[contact-field type="textarea"'+label+required+']';
				case 'select':
					var label = shortcode.getVal('formcreator','select','label');
					var required = shortcode.getVal('formcreator','select','required');	
					var options = shortcode.getVal('formcreator','select','options')		
					
					if(required=="true"){
						required = ' required="true"';
					} else {
						required = '';
					}
					if(label !=""){
						label = ' label="'+label+'"';
					} else {
						label = '';
					}
					if(options !=""){
						options = ' options="'+options+'"';
					} else {
						options = '';
					}
					
					return '<br />[contact-field type="select"'+label+required+options+']';					
					break;
				case 'radio':
					var label = shortcode.getVal('formcreator','radio','label');
					var required = shortcode.getVal('formcreator','radio','required');	
					var options = shortcode.getVal('formcreator','radio','options')		
					
					if(required=="true"){
						required = ' required="true"';
					} else {
						required = '';
					}
					if(label !=""){
						label = ' label="'+label+'"';
					} else {
						label = '';
					}
					if(options !=""){
						options = ' options="'+options+'"';
					} else {
						options = '';
					}
					
					return '<br />[contact-field type="radio"'+label+required+options+']';					
					break;	
				case 'checkbox':
					var label = shortcode.getVal('formcreator','checkbox','label');
					var required = shortcode.getVal('formcreator','checkbox','required');					
					
					if(required=="true"){
						required = ' required="true"';
					} else {
						required = '';
					}
					if(label !=""){
						label = ' label="'+label+'"';
					} else {
						label = '';
					}
					
					return '<br />[contact-field type="checkbox"'+label+required+']';
					break;	
			};
			break;	
		case 'snippet':			
			var thumbnail = shortcode.getVal('snippet','thumbnail');
			var thumb_height = shortcode.getVal('snippet','thumb_height');
			var image_box = shortcode.getVal('snippet','image_box');
			var image_alt = shortcode.getVal('snippet','image_alt');
			var thumb_width = shortcode.getVal('snippet','thumb_width');
			var thumb_shadow = shortcode.getVal('snippet','thumb_shadow');
			var url = shortcode.getVal('snippet','url');
			var image_clickable = shortcode.getVal('snippet','image_clickable');
			var button_text = shortcode.getVal('snippet','button_text');
			var button_align = shortcode.getVal('snippet','button_align');
			var button_size = shortcode.getVal('snippet','button_size');
			var button_color = shortcode.getVal('snippet','button_color');
			var content = shortcode.getVal('snippet','content');
			var layout = shortcode.getVal('snippet','layout');
			var width = shortcode.getVal('snippet','width');
			var title = shortcode.getVal('snippet','title');
			var align = shortcode.getVal('snippet','align');
		
			if(thumbnail!= ''){
				thumbnail = ' thumbnail="'+thumbnail+'"';
				if(image_box!= ''){
					image_box = ' image_box="'+image_box+'"';
				}
				if(thumb_width!= ''){
					thumb_width = ' thumb_width="'+thumb_width+'"';
				}
				if(thumb_shadow!= ''){
					thumb_shadow = ' thumb_shadow="'+thumb_shadow+'"';
				}
				if(image_alt!= ''){
					image_alt = ' image_alt="'+image_alt+'"';
				}				
			}else{
				thumbnail = '';
				image_box = '';
				thumb_width = '';
				thumb_shadow = '';
				image_alt = '';
			}	
			if(thumb_height!= ''){
				thumb_height = ' thumb_height="'+thumb_height+'"';
			}else{
				thumb_height = '';
			}			
			if(url!=''){
				url = ' url="'+url+'"';
				if(button_size!=''){
					button_size = ' button_size="'+button_size+'"';
					if(button_align!=''){
						button_align = ' button_align="'+button_align+'"';
					}				
					if(button_text!=''){
						button_text = ' button_text="'+button_text+'"';
					}
					if(button_color!=''){
						button_color = ' button_color="'+button_color+'"';
					}
				}
				if(image_clickable=='true'){
					image_clickable = ' image_clickable="true"';
				}else{
					image_clickable ='';
				}
			}else{
				url ='';
				button_align ='';
				button_text ='';
				button_size ='';
				button_color ='';
				image_clickable ='';
			}
			if(width!=''){
				width = ' width="'+width+'"';
			}else{
				width ='';
			}
			if(title!=''){
				title = ' title="'+title+'"';
			}else{
				title ='';
			}
			if(layout!=''){
				layout = ' layout="'+layout+'"';
			}else{
				layout = '';
			}			
			if(align!=''){
				align = ' align="'+align+'"';
			}else{
				align ='';
			}
			return '<br />[snippet'+layout+title+thumbnail+image_alt+thumb_height+image_box+thumb_width+thumb_shadow+url+button_text+button_align+button_size+button_color+image_clickable+width+align+']'+content+'[/snippet]<br />';
			break;	
		case 'pricing_block':			
			var thumbnail = shortcode.getVal('pricing_block','thumbnail');
			var image_box = shortcode.getVal('pricing_block','image_box');
			var image_alt = shortcode.getVal('pricing_block','image_alt');
			var thumb_width = shortcode.getVal('pricing_block','thumb_width');
			var thumb_shadow = shortcode.getVal('pricing_block','thumb_shadow');
			var url = shortcode.getVal('pricing_block','url');
			var button_text = shortcode.getVal('pricing_block','button_text');
			var button_size = shortcode.getVal('pricing_block','button_size');
			var button_color = shortcode.getVal('pricing_block','button_color');
			var image_clickable = shortcode.getVal('pricing_block','image_clickable');
			var price = shortcode.getVal('pricing_block','price');
			var currency = shortcode.getVal('pricing_block','currency');
			var layout = shortcode.getVal('pricing_block','layout');
			var before = shortcode.getVal('pricing_block','before');
			var after = shortcode.getVal('pricing_block','after');
			var content = shortcode.getVal('pricing_block','content');
			var width = shortcode.getVal('pricing_block','width');
			var title = shortcode.getVal('pricing_block','title');
			var align = shortcode.getVal('pricing_block','align');
			
			if(thumbnail!= ''){
				thumbnail = ' thumbnail="'+thumbnail+'"';
				if(image_box!= ''){
					image_box = ' image_box="'+image_box+'"';
				}
				if(thumb_width!= ''){
					thumb_width = ' thumb_width="'+thumb_width+'"';
				}
				if(thumb_shadow!= ''){
					thumb_shadow = ' thumb_shadow="'+thumb_shadow+'"';
				}
				if(image_alt!= ''){
					image_alt = ' image_alt="'+image_alt+'"';
				}
			}else{
				thumbnail = '';
				image_box = '';
				thumb_width = '';
				thumb_shadow = '';
				image_alt = '';
			}			
			if(price!=''){
				price = ' price="'+price+'"';
				if(currency!=''){
					currency = ' currency="'+currency+'"';
				}else{
					currency = ' currency=""';
				}
			}else{
				price ='';
				currency ='';
			}			
			if(layout!=''){
				layout = ' layout="'+layout+'"';
			}else{
				layout = '';
			}
			if(before!=''){
				before = ' before="'+before+'"';
			}else{
				before = ' before=""';
			}
			if(after!=''){
				after = ' after="'+after+'"';
			}else{
				after = ' after=""';
			}
			if(width!=''){
				width = ' width="'+width+'"';
			}else{
				width ='';
			}
			if(title!=''){
				title = ' title="'+title+'"';
			}else{
				title ='';
			}
			if(url!=''){
				url = ' url="'+url+'"';				
				if(button_size!=''){
					button_size = ' button_size="'+button_size+'"';
					if(button_text!=''){
						button_text = ' button_text="'+button_text+'"';
					}
					if(button_color!=''){
						button_color = ' button_color="'+button_color+'"';
					}
				}
				if(image_clickable=='true'){
					image_clickable = ' image_clickable="true"';
				}else{
					image_clickable ='';
				}
			}else{
				url ='';
				button_text ='';
				button_size ='';
				button_color ='';
				image_clickable ='';
			}		
			if(align!=''){
				align = ' align="'+align+'"';
			}else{
				align ='';
			}
			return '<br />[pricing_block'+layout+price+currency+title+thumbnail+image_alt+image_box+thumb_width+thumb_shadow+url+button_text+button_size+button_color+image_clickable+before+after+width+align+']'+content+'[/pricing_block]<br />';
			break;	
		case 'team':
			var nameArray = new Array();
			jQuery('input[name="sc_team_name[]"]').each(function() {
			   nameArray.push(jQuery(this).val());
			});
			var designationArray = new Array();
			jQuery('input[name="sc_team_designation[]"]').each(function() {
			   designationArray.push(jQuery(this).val());
			});
			var facebookArray = new Array();
			jQuery('input[name="sc_team_facebook[]"]').each(function() {
			   facebookArray.push(jQuery(this).val());
			});
			var twitterArray = new Array();
			jQuery('input[name="sc_team_twitter[]"]').each(function() {
			   twitterArray.push(jQuery(this).val());
			});
			var gplusArray = new Array();
			jQuery('input[name="sc_team_gplus[]"]').each(function() {
			   gplusArray.push(jQuery(this).val());
			});
			var linkedinArray = new Array();
			jQuery('input[name="sc_team_linkedin[]"]').each(function() {
			   linkedinArray.push(jQuery(this).val());
			});
			var vcardArray = new Array();
			jQuery('input[name="sc_team_vcard[]"]').each(function() {
			   vcardArray.push(jQuery(this).val());
			});
			var telephoneArray = new Array();
			jQuery('textarea[name="sc_team_phone[]"]').each(function() {
			   telephoneArray.push(jQuery(this).val());
			});			
			var emailArray = new Array();
			jQuery('input[name="sc_team_email[]"]').each(function() {
			   emailArray.push(jQuery(this).val());
			});
			var bioArray = new Array();
			jQuery('textarea[name="sc_team_bio[]"]').each(function() {
			   bioArray.push(jQuery(this).val());
			});
			var imgurlArray = new Array();
			jQuery('input[name="sc_team_image_url[]"]').each(function() {
			   imgurlArray.push(jQuery(this).val());
			});
			var hoverimgurlArray = new Array();
			jQuery('input[name="sc_team_hover_image_url[]"]').each(function() {
			   hoverimgurlArray.push(jQuery(this).val());
			});
			var imagewidthArray = new Array();
			jQuery('input[name="sc_team_image_width[]"]').each(function() {
			   imagewidthArray.push(jQuery(this).val());
			});
			var imageAltArray = new Array();
			jQuery('input[name="sc_team_image_alt[]"]').each(function() {
			   imageAltArray.push(jQuery(this).val());
			});
			var imageboxArray = new Array();
			jQuery('select[name="sc_team_image_box[]"]').each(function() {
			   imageboxArray.push(jQuery(this).val());
			});
			var shadowArray = new Array();
			jQuery('select[name="sc_team_shadow[]"]').each(function() {
			   shadowArray.push(jQuery(this).val());
			});
			var output = '';
			for(var i = 0; i < nameArray.length; i++){
				if(nameArray[i]){
					output += '[team_member name="'+nameArray[i]+'" designation="'+designationArray[i]+'" facebook="'+facebookArray[i]+'" twitter="'+twitterArray[i]+'" gplus="'+gplusArray[i]+'" linkedin="'+linkedinArray[i]+'" vcard="'+vcardArray[i]+'" phone="'+telephoneArray[i]+'" email="'+emailArray[i]+'" image_url="'+imgurlArray[i]+'" hover_image_url="'+hoverimgurlArray[i]+'" image_alt="'+imageAltArray[i]+'" image_box="'+imageboxArray[i]+'" image_width="'+imagewidthArray[i]+'" shadow="'+shadowArray[i]+'"]<br />'+bioArray[i]+'<br />[/team_member]';
				}
			}
			var type = shortcode.getVal('team','type');
			return '<br />[team type="'+type+'"]'+output+'[/team]<br />';
			break;	
		case 'predone_layouts':
			type = jQuery('input[name="predone_layout"]').val();
			output = jQuery('#predone_layout_content_'+type).html();
			return output;
			break;				
		}
		return '';
	},
	getVal:function(a,b,c){
		if(b == undefined){
			var target = $('[name="sc_'+a+'"]');
			if(target.is('[type=radio]')){
				return $('[name="sc_'+a+'"]:checked').val();				
			}
			if(target.size() == 0){
				return $('[name="sc_'+a+'[]"]').val();
			}else{
				return target.val();
			}
		}else if(c == undefined){
			var target = $('[name="sc_'+a+'_'+b+'"]');
			if(target.is('[type=radio]')){
				return $('[name="sc_'+a+'_'+b+'"]:checked').val();				
			}
			if(target.size() == 0){
				return $('[name="sc_'+a+'_'+b+'[]"]').val();
			}else{
				return target.val();
			}
		}else {
			var target = $('[name="sc_'+a+'_'+b+'_'+c+'"]');
			if(target.is('[type=radio]')){
				return $('[name="sc_'+a+'_'+b+'_'+c+'"]:checked').val();				
			}			
			if(target.size() == 0){
				return $('[name="sc_'+a+'_'+b+'_'+c+'[]"]').val();
			}else{
				return target.val();
			}
		}
		
	},
	sendToEditor :function(){
		shortcode_text = shortcode.generate();
		
		parent.window.tinyMCE.activeEditor.execCommand("mceInsertContent", false, shortcode_text);
		parent.window.tb_remove();
	}
		
}

$(document).ready( function($) {
	shortcode.init();
	
	$('ul.predone-layouts li a').click(function(){
		$('ul.predone-layouts li a').removeClass('active');
		$(this).addClass('active');
		$('input[name=predone_layout]').val($(this).attr('data-id'));
		return false;
	});
	
	$('#predone_layout_type').change(function(){
		layout_type = $(this).val();
		$('ul.predone-layouts').hide();
		$('ul#predone_layout_'+layout_type).show();
		$('ul#predone_layout_'+layout_type+' li:first-child a').trigger('click');		
	});
	
	$('#predone_layout_type').change();
		
});

});