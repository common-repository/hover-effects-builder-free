/*( function() {

	// Register plugin
	tinymce.create( 'tinymce.plugins.hi_shortcode', {

		init: function( editor, url )  {

			// Add the Insert Gistpen button
			editor.addButton( 'hi_shortcode', {
				image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA0BJREFUeNrkl1tsTFEUhvfMnFHEJFKhiGmjpIi431W1cam7ClVeeNQHEvEg4o3EA4lHxLukEVM0dY1Q2gqNaocGRYUgMhEi0rjUMFP/av6p7Thnzm4l+mAlX+bMOTtn/Xvttddex9fZ2an60vyqj81qb29XsVhM+Xy+v31XPzAePAQJr8HiLxwOK6utrU1FIhFlWVZvnPYHs0EJWAnGgsmg1URAeXm5svx+vwoGgz0RMBDMo9NlIM/2vMRUgGDqNQTmg3WgGOSmGVsKDgGj7E4nYDBYQKdLQbah2GnMhdbeCMgERQzjEjCylzvrBDgH6kELeJ9OQCZnKE4XgSwDJx2gAVSDrWCq7fkMMF2WGnwH98ANUMvrN7oAydyTBk6/gFt0egk808Qcs439AdbwuogT2wV2814jo3NQBDSBu2Cmg9OPnGkVuAJeaM9GMXLrXSI7F+wDl3lvKJgCCsBOXncJkKJx1kFAgstS5+BgGzjM3eFmZeAAoyH2DlwlW8BLuZcqxVUO1SvAjM4B2xmBAj576uFcbIJLVMeB0aBGPwtkyzQ7DJYZPABHGO7NvH8TPDbIm1KHe/n8rdcFSNGodBg8iKRMEmsAw3rGQEAJzwjdZHvHuT1/Ow2rtPVyszBYyOtKg2onO2yO9j8ICkEUfLALkHW9YzCrMv7eJ162UbvOY3GrcesHIgYvXMUETILTBuPX8tRUPMSUvrPsAqq5Puksi4VFMQ+8zv4cLfEWc3zUTcBzVjsv28TfRy51wm4btKooyfc2XUtmsgzFjIScAd8MBUgUhoPrXj3hefDV44VDmLBSO5Z7jH3NSRXyf62XgFepIuFh2TztnEzOjONgBZgIdoBJTNwmk4bkFMNsah2smNd4Ujby9ExZBhO3VT+K07XlF8HnHgj4xAakAty2OU/t/2HsCYxashiTZbXDsxYKlLUcw15xFthPOhjmOi5ls1Y9a/8QIF9GyWSyC4fdkBIgL7nAWTbb9v5RlthcdkIF7CX3kiTHJ9l3dHfF4tuSljwUCjm15dJI7OH5HfWo+9J2PSEVvDeC3wj5jFKCPUC3gEAgoHyJRELF43H1DyxIob8yMyND+f77j9M+F/BTgAEA5efK8f9h8FgAAAAASUVORK5CYII=',
				tooltip: 'Insert Hover Image Effect Shortcode',
				cmd: 'hi_CW'
			});

			// Called when we click the Insert Gistpen button
			editor.addCommand( 'hi_CW', function() {

				var windowW = jQuery( window ).width() * 0.7;
				if( windowW > 800 ){ windowW = 800; }
				// Calls the pop-up modal
				editor.windowManager.open({
					// Modal settings
					title: 'Insert Hover Image Effect Shortcode',
					width: windowW,
					// minus head and foot of dialog box
					height: (jQuery( window ).height() - 36 - 50) * 0.8,
					inline: 1,
					id: 'hi_shortcode-insert-dialog',
					buttons: [{
						text: 'Insert',
						id: 'hi_shortcode-button-insert',
						class: 'insert',
						onclick: function( e ) {
							var formData = jQuery( "#hi_shortcode_dialog" ).serializeArray();
							var scData = '';

							jQuery.each( formData, function( i, e ) {
								if( e.value != "" ){ scData += e.name.replace( 'hi_', '' ) +'="' + e.value + '" '; }
							} );

							editor.insertContent( '[hi_image ' + scData + '][/hi_image]' );
							editor.windowManager.close();
						},
					},
						{
							text: 'Cancel',
							id: 'hi_shortcode-button-cancel',
							onclick: 'close'
						}],
				});

				appendInsertDialog();

			});

		}

	});

	tinymce.PluginManager.add( 'hi_shortcode', tinymce.plugins.hi_shortcode );

	function appendInsertDialog () {
		var dialogBody = jQuery( '#hi_shortcode-insert-dialog-body' ).append( '<span class="spinner"></span>' );
		// Get the form template from WordPress
		jQuery.post( ajaxurl, {
			action: 'hi_shortcode_insert_dialog'
		}, function( response ) {
			template = response;
			dialogBody.children( '.loading' ).remove();
			dialogBody.append( template );
			jQuery( '.spinner' ).hide();
		});
	}

})();
