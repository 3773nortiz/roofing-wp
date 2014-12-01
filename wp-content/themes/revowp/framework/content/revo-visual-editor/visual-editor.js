var $ = jQuery.noConflict();

jQuery(document).ready(function(){	
	
	$.fn.getHexBackgroundColor = function() {
		var rgb = $(this).css('background-color');
		if(rgb){
			rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			function hex(x) {return ("0" + parseInt(x).toString(16)).slice(-2);}
			if ( rgb instanceof Array ){
				return hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
			}
		}
	}
	
	$('#visualeditor_wrapper').animate({"left": "0px"}, { duration: 300 });
	$('#visualeditor_btn').animate({"left": "325px"}, { duration: 300 });
	
	$('#visualeditor_btn').click(
    	function() {
    		if($('#visualeditor_wrapper').css('left') != '0px') {
 				$('#visualeditor_wrapper').animate({"left": "0px"}, { duration: 300 });
	 			$(this).animate({"left": "325px"}, { duration: 300 });
	 		} else {
	 			$('#visualeditor_wrapper').animate({"left": "-325px"}, { duration: 300 });
    			$('#visualeditor_btn').animate({"left": "0px"}, { duration: 300 });
	 		}
    	}
    );
	
	$('.themechooser-img').click(function(){
		$(this).parent().parent().find('.themechooser-img').removeClass('themechooser-selected');
		$(this).addClass('themechooser-selected');
		$.post(ThemeAjax.ajaxurl, {action:'visualeditor', reset:1, style:$(this).html()}, function(response) {window.location.reload();});	
		return false;
	});
	
	$('select[name=bgpattern]').change(function(){
		$.post(ThemeAjax.ajaxurl, {action:'visualeditor', bgpattern:$(this).val()}, function(response) {});
		$('.pattern').css('backgroundImage', 'url(' + $(this).val() + ')');
	});
	
	$('select[name=bgimage]').change(function(){
		$.post(ThemeAjax.ajaxurl, {action:'visualeditor', bgimage:$(this).val()}, function(response) {});
		$('html').css('backgroundImage', 'url(' + $(this).val() + ')');
	});
	
	$('select[name=bgimage_attachment]').change(function(){
		$.post(ThemeAjax.ajaxurl, {action:'visualeditor', bgimage_attachment:$(this).val()}, function(response) {});
		$('html, .pattern').css('backgroundAttachment', $(this).val());
	});
	
	$('select[name=menu_style]').change(function(){
		$.post(ThemeAjax.ajaxurl, {action:'visualeditor', menu_style:$(this).val()}, function(response) {window.location.reload();});			
	});
	
	$('select[name=layout]').change(function(){
		$.post(ThemeAjax.ajaxurl, {action:'visualeditor', layout:$(this).val()}, function(response) {window.location.reload();});
	});
	
	var cp_input;
	$('.visual-editor-field-preview').ColorPicker({
		onBeforeShow: function () {
			cp_input = this;
			$(this).ColorPickerSetColor($(cp_input).parent().find('input[type=hidden]').val());
		},			
		onShow: function (colrpkr) {
			$(colrpkr).fadeIn(200);
			return false;
		},
		onHide: function (colrpkr) {
			$(colrpkr).fadeOut(200);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$(cp_input).parent().find('input[type=hidden]').val(hex);
			$(cp_input).css('background-color', '#'+hex);
		}
	});	
	
	$('.generate-btn').click(function() {	
		$('#visualeditor_form').submit();
		return false;
	});
	
	$('.reset-btn').click(function() {
		if(confirm("Any unsaved changes will be lost.\nAre you sure you wish to revert back to the saved settings?"))
		{
			$('[name="resetreq"]').val("reset");
			$('#visualeditor_form').submit();
			$('[name="resetreq"]').val("");
			return false;
		}
		else location.reload();
	});
	
	$('.undo-btn').click(function() {	
		$('[name="resetreq"]').val("undo");
		$('#visualeditor_form').submit();
		$('[name="resetreq"]').val("");
		return false;
	});
	
	$('.redo-btn').click(function() {	
		$('[name="resetreq"]').val("redo");
		$('#visualeditor_form').submit();
		$('[name="resetreq"]').val("");
		return false;
	});
	
	$('.save-btn').click(function() {	
	if(!$('.save-btn').hasClass('inactive'))
	{
		if(confirm("The current settings will be saved permanently.\nThis action is irreversible.\nAre you sure you wish to save the settings?"))
		{
			$('[name="resetreq"]').val("save");
			$('#visualeditor_form').submit();
			//$('#visualeditor_wrapper .save-btn').addClass('inactive');
			$('[name="resetreq"]').val("");
			return false;
		}
		else location.reload();
	}	
	});
	
	$('.lock-unlock a').click(function() {
		if ($(this).hasClass('unlock')) {
			$(this).removeClass('unlock').addClass('lock');
			$(this).next('input').prop('checked', true);
		} else {
			$(this).removeClass('lock').addClass('unlock');
			$(this).next('input').prop('checked', false);
		}
		$('#global_lock_toggle').prop('checked', false);
		return false;
	});
	
	$('#visualeditor_wrapper .visual-editor-input-pixel .visual-editor-field input').keydown(function(event) {
        if ( $.inArray(event.keyCode,[46,8,9,27,13,190]) !== -1 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
            return;
		} else {
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
	
/*	$(document).on('blur', '#visualeditor_wrapper .visual-editor-input-pixel .visual-editor-field input', function(event) {
		var val = $(this).val();
		if (val != '') {
			if ($(this).attr('data-min') && $(this).attr('data-max')) {
				var data_min = parseInt($(this).attr('data-min'));
				var data_max = parseInt($(this).attr('data-max'));
				if (val < data_min || val > data_max) {
					$(this).val(data_min);
				}
			} else if ($(this).attr('data-min')) {
				var data_min = parseInt($(this).attr('data-min'));
				if (val < data_min) {
					$(this).val(data_min);
				}
			} else if ($(this).attr('data-max')) {
				var data_max = parseInt($(this).attr('data-max'));
				if (val > data_max) {
					$(this).val(data_max);
				} 
			}	
		}
	});
*/	
	$('#global_lock_toggle').on("change", function() {
		if ($(this).is(":checked")) {
			$(".visual-editor-header > .area-lock").each(function (i) { 
				$(this).find('a').removeClass('unlock').addClass('lock');
				$(this).find('input').prop('checked', true);
			});
		} else {
			$(".visual-editor-header > .area-lock").each(function (i) { 
				$(this).find('a').removeClass('lock').addClass('unlock');
				$(this).find('input').prop('checked', false);
			});	
		}
	});
	
	$('#visualeditor_form').submit(function(){
								
		function updated_values() {						
			var serialized_values = $("#visualeditor_form").serialize();						
			return serialized_values;
		}					
		var serialized_return = updated_values();						
		
		//console.log(serialized_return);
		
		var data = {
			action: 'visualeditor',
			data: serialized_return
		};					
		
		$.post(ThemeAjax.ajaxurl, data, function(response) {				
			window.location.href = window.location.href;
		});					
		return false; 					
	});			
	
});
	
