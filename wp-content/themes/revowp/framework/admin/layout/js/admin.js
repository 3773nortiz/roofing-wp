jQuery.noConflict()(function($){


    $(document).ready(function(){
		
		$("a[rel^='prettyPhoto']").prettyPhoto({theme:'light_square',social_tools:''});
		
		$( ".datepicker" ).datepicker();
		
		$('.themechooser-img').click(function(){
			$(this).parent().parent().find('.themechooser-img').removeClass('themechooser-selected');
			$(this).addClass('themechooser-selected');
		//	$('.theme-color-preview').css('backgroundColor', $(this).next().next().html());
		});
		$('.themechooser-label').hide();
		$('.themechooser-img').show();
		$('.themechooser-radio').hide();
		
		$('.shadowchooser').click(function(){
			$(this).parents('.shadowchooser-field').find('.shadowchooser').removeClass('shadowchooser-selected');
			$(this).addClass('shadowchooser-selected');
		});
		$('.shadowchooser-radio').hide();
		
		$('.imgboxchooser').click(function(){
			$(this).parents('.imgboxchooser-field').find('.imgboxchooser').removeClass('imgboxchooser-selected');
			$(this).addClass('imgboxchooser-selected');
		});
		$('.imgboxchooser-radio').hide();

		
		$("#theme-options .toggle-title").toggle(
			function(){
				$(this).addClass('toggle-active');
				$(this).siblings('.toggle-content').slideDown("fast");
			},
			function(){
				$(this).removeClass('toggle-active');
				$(this).siblings('.toggle-content').slideUp("fast");
			}
		);
		
		var cp_input;
		$('.color_picker, .theme-input-color').ColorPicker({
			onBeforeShow: function () {
				cp_input = this;
				$(this).ColorPickerSetColor($(cp_input).parent().find('.theme-input-color').val());
			},
			onChange: function (hsb, hex, rgb) {
						$(cp_input).parent().find('.theme-input-color').val(hex);
					},
		}).bind("keyup", function(){
			$(this).ColorPickerSetColor(this.value);
		});
		
/*		$('#theme-options .toggle-button:checkbox').each(function(){
				$(this).iphoneStyle();		
		});
		
		$('#theme-metabox .toggle-button:checkbox').each(function(){
				$(this).iphoneStyle();		
		});
 */    
        //Clear uploaded file field
        $('a.theme-file-remove').click(function() {
            $($(this).attr('href')).fadeOut();
            var field = $(this).parent().parent().find('input.upload');
            $(field).val('');
            return false;
        });

		$('select.theme-general-font-selector').change(function() {
		  	var font_select_id = $(this).attr('id');			
		  	var selected_body_font = $("#"+font_select_id+" option:selected").text();
		  	$('#'+font_select_id+'-preview').css('font-family', selected_body_font );		  	
        });
        
        //Header font preview
		$('select.theme-google-font-selector').change(function() {
			var font_select_id = $(this).attr('id');
			$('.'+font_select_id+'-temp-header-font').remove();
			
			var selected_header_font = $("#"+font_select_id+" option:selected").val();
		  	var selected_header_font_val = $("#"+font_select_id+" option:selected").text();
			
		  	if(selected_header_font == 'none'){		  		
		  		if(!selected_body_font){
		  			var selected_body_font = $('#theme_font_body_preview select option:selected').val();
		  		}		  		
		  		$('#'+font_select_id+'-preview').css('font-family', selected_body_font );		  		
		  	} else {		  	
		  		var google_include = '<link href="http://fonts.googleapis.com/css?family=' + selected_header_font + '" rel="stylesheet" type="text/css" class="'+font_select_id+'-temp-header-font" />';
		  	
			  	$('#'+font_select_id+'-preview').prepend(google_include);
			  	
			  	selected_header_font = selected_header_font.replace(/\+/g, " ");
			  	selected_header_font = selected_header_font.split(":");
			  	selected_header_font = selected_header_font[0];
			  	
			  	$('#'+font_select_id+'-preview').css('font-family', selected_header_font_val );		  	
		  	}
		  	
        });
		
		$('select.theme-font-selector').change(function() {
			var font_select_id = $(this).attr('id');
			$('.'+font_select_id+'-temp-header-font').remove();
			var selected_font = $("#"+font_select_id+" option:selected").val();
		  	var selected_font_val = $("#"+font_select_id+" option:selected").text();
			var selected_font_arr = selected_font.split('::');
			var font_type = selected_font_arr[0];
			var font = selected_font_arr[1];
			if(font){
				$('#'+font_select_id+'-preview').html('Lorem ipsum dolor sit amet');
				if(font_type == 'cufon'){
					var cufon_include = '<script type="text/javascript" src="'+siteurl+'/fonts/'+font+'" class="'+font_select_id+'-temp-header-font"></script>';
					$('#'+font_select_id+'-preview').prepend(cufon_include);					
					font = font.replace(/\+/g, " ");
					font = font.split(":");
					font = font[0];					
					Cufon.replace('#'+font_select_id+'-preview', { fontFamily: selected_font_val });	
				}
				if(font_type == 'google'){
					var google_include = '<link href="http://fonts.googleapis.com/css?family=' + font + '" rel="stylesheet" type="text/css" class="'+font_select_id+'-temp-header-font" />';		  	
					$('#'+font_select_id+'-preview').prepend(google_include);					
					font = font.replace(/\+/g, " ");
					font = font.split(":");
					font = font[0];					
					$('#'+font_select_id+'-preview').css('font-family', selected_font_val );
				}
				if(font_type == 'general'){
					$('#'+font_select_id+'-preview').css('font-family', selected_font_val );
				}
			}
		});
		
		$('.theme-tweet-selector').change(function() {
			var tweet_select_id = $(this).attr('name');
			var selected_tweet = $("input[name="+tweet_select_id+"]:checked").val();
			$('#'+tweet_select_id+'-preview').html('<a href="http://twitter.com/share" class="twitter-share-button" data-count="'+selected_tweet+'">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>');
			
		});

		$('.theme-fblike-selector').change(function() {
			var fblike_select_id = $(this).attr('name');
			var selected_fblike = $("input[name="+fblike_select_id+"]:checked").val();
			$('#'+fblike_select_id+'-preview').html('<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.viperthemes.com&amp;send=false&amp;layout='+selected_fblike+'&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:65px;" allowTransparency="true"></iframe>');
			
		});
		
		$('.theme-gplus-selector').change(function() {
			var gplus_select_id = $(this).attr('name');
			var selected_gplus = $("input[name="+gplus_select_id+"]:checked").val();
			layout_options = 'size="medium" annotation="none"';
			if(selected_gplus == "vertical"){
				layout_options = 'size="tall"';
			}
			if(selected_gplus == "horizontal"){
				layout_options = 'size="medium"';
			}
			$('#'+gplus_select_id+'-preview').html('<script type="text/javascript">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true; po.src = "https://apis.google.com/js/plusone.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s); })();</script><g:plusone '+layout_options+'></g:plusone>');
			
		});
	
		$('.bg_pattern_selector').change(function() {
			var selected_pattern = $(this).val();
			$('.theme-color-preview').css('backgroundImage', 'url(' +selected_pattern + ')');
			
		});
	
		$('.bg_gradient').change(function() {
			if($('.bg_gradient:checked').val() == "true"){
				$('.theme-color-preview div').addClass('theme-gradient');
			}else{
				$('.theme-color-preview div').removeClass('theme-gradient');
			}
		});
    });

});

/*
//Upload Option
(function ($) {
  uploadOption = {
    init: function () {
      
      // On Click
      $('.upload_button').live("click", function () {
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=1');
        return false;
      });
    }
  };
  $(document).ready(function () {
    uploadOption.init()
  })
})(jQuery);
*/

function add_more_elements(e, element) {
		element = "div."+element+":last";
		current_meta_forms = jQuery(e).parent().children(element);  // grab the form container
		new_meta_forms = current_meta_forms.clone(true); // clone the form container
		jQuery("label input", new_meta_forms).val(''); // reset all contained forms to empty
		current_meta_forms.after(new_meta_forms);  // append it after the container of the clicked element
		return false;
	}
