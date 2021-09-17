jQuery( function($) {
	
	$('form#widget-export-settings').submit(function() {
		window.setTimeout(redirect_to_data_export, 1500);
	});	
	
	$('form#import-widget-data').submit(function(event){
		event.preventDefault();
		
		var message;
		var new_class;
		
		$.post(ajaxurl, $("#import-widget-data").serialize(),
		function(data){
			if(data == "SUCCESS") {
				window.setTimeout(redirect_to_data_import, 1000)
			} else {
				message = 'There was a problem importing your widgets.  Please try again.';
				new_class = 'error';
			}
		});

	});
	
	var wrapper = $('<div/>').css({});
	var fileInput = $('#upload-file').wrap(wrapper);

	fileInput.change(function(){
		$this = $(this);
		sub = $this.val().lastIndexOf('\\') + 1;
		new_string = $this.val().substring(sub);
		$('#output-text').text(new_string);
		$('#output-text').fadeIn('slow');
	})

	$('#upload-button').click(function(){
		fileInput.click();
	}).show();
	
	function redirect_to_data_export() {
		window.location.replace('export.php');
	}
	function redirect_to_data_import() {
		window.location.replace('admin.php?page=options-framework-import&step=2');
	}
});