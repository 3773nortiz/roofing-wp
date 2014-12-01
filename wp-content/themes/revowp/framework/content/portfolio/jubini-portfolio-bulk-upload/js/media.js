
jQuery(document).ready(function($){

    var pbu_media_frame;
    
    $(document.body).on('click.pbuOpenMediaManager', '.pbu-open-media', function(e){

		e.preventDefault();

        if ( pbu_media_frame ) {
            pbu_media_frame.open();
            return;
        }

        pbu_media_frame = wp.media.frames.pbu_media_frame = wp.media({
           
            className	: 	'media-frame pbu-media-frame',           
            frame		: 	'select',
            multiple	: 	true,
			title		: 	pbu_nmp_media.title,
			library		: 	{type: 	'image'},
            button		: 	{text:  pbu_nmp_media.button}
        });
		
        pbu_media_frame.on('select', function(event){
			
			var files = {files: pbu_media_frame.state().get('selection').toJSON()};
			
			console.log(JSON.stringify(files));
			
			$('#items').html(Mustache.render($('#items_template').html(), files));
        });

        pbu_media_frame.open();
    });
});