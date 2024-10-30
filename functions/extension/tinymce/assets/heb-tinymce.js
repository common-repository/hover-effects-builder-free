(function( $, wp, _ ) {
	var ImageDetailsView, frame;
	if ( ! wp.media.events ) {
		return;
	}
	function ImageDetailsImageView( view ) {
		var advancedView;
		advancedView = new ImageDetailsView( { model: view.model } );
		view.on( 'post-render', function() {
			view.views.insert( view.$el.find('.column-settings'), advancedView.render().el );
		} );
	}
	wp.media.events.on( 'editor:image-edit', function( options ) {
		var dom = options.editor.dom,
		    image = options.image,
		    attributes = {};
		var keys    = [ 'hi_style', 'hi_title', 'hi_link', 'hi_view', 'hi_text', 'hi_share', 'hi_display', 'hi_new_window' ];
		_.each( keys, function( key ) {
			attributes[ key ] = dom.getAttrib( image, 'data-' + key );
		} );

		options.metadata = _.extend( options.metadata, attributes );
	} );

	wp.media.events.on( 'editor:frame-create', function( options ) {
		frame = options.frame;
		frame.on( 'content:render:image-details', ImageDetailsImageView );
	} );

	wp.media.events.on( 'editor:image-update', function( options ) {
		var editor  = options.editor,
		    dom     = editor.dom,
		    image   = options.image,
		    model   = frame.content.get().model;
		var keys    = [ 'hi_style', 'hi_title', 'hi_link', 'hi_view', 'hi_text', 'hi_share', 'hi_display', 'hi_new_window' ];
		var hi_id   = model.get('hi_style');
		if( ! _.isUndefined( hi_id ) )
		{
			// common fields
			_.each( keys, function( key ) {
				var val = model.get( key );
				if( _.isUndefined( val ) ){
					dom.setAttrib( image, 'data-' + key, null );
				}else{
					dom.setAttrib( image, 'data-' + key, val );
				}
			} );

			// size field
			var hi_size = model.get('size');
			if( hi_size == "custom" ){
				hi_size = model.get('customWidth') +"x" + model.get('customHeight');
			}
			dom.setAttrib( image, 'data-size', hi_size );

			// align field
			dom.setAttrib( image, 'data-alignment', model.get('align') );
		}
		else
		{
			_.each( keys, function( key ) {
				dom.setAttrib( image, 'data-' + key, null );
			} );
		}
	} );

	ImageDetailsView = wp.Backbone.View.extend( {
		className: 'advanced-hi',
		template: wp.media.template('advanced-hi'),
		initialize: function() {
			wp.Backbone.View.prototype.initialize.apply( this, arguments );
		},
		prepare: function() {
			var data = this.model.toJSON();
			return data;
		},
		render: function() {
			wp.Backbone.View.prototype.render.apply( this, arguments );
			return this;
		},
		toggleInputs: function( model, align ) {
		}
	} );
})( jQuery, wp, _ );
