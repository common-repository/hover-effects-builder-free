jQuery( document ).ready( function( $ )
{
	// run first
	var ec = $( '#hi-excludes' );
	var ecx = [];
	if( ec.length ) {
		ecx = $.parseJSON( ec.text() );
	}

	hi_tpl_init_all();

	function hi_tpl_init_all()
	{
		var his = $( '.hi-tpl' );
		if( his.length ) {
			his.each( function( i, el )
			{
				hi_tpl_init( $( el ) );
			} );
		}
	}

	function hi_tpl_init( hi )
	{
		if( typeof hi.data( 'hi' ) !== "undefined" ) {
			return;
		}
		var h = '', valid = 1;

		var aC = ''; // Additional Class
		typeof DAHZ != "undefined" ? aC = ' pinit-button' : aC = '';

		// check ex
		$.each( ecx, function( ecxi, cn )
		{
			if( cn != '' && hi.parents( cn ).length ) {
				valid = 0;
				return false;
			}
		} );

		if( !valid ) {
			return false;
		}

		var pi = hi.data( 'hidata' ),
		    ex = pi.split( 'X' ),
		    al = hi.data( 'align' ),
		    dataAll = $.parseJSON( $( '#hi-data-post-' + ex[ 0 ] ).text() );

		if( !dataAll ) {
			return false;
		}
		var data = dataAll[ ex[ 1 ] ]

		if( !data ) {
			return;
		}

		var html = {overlay: '', buttons: '', content: ''};

		if( data.overlay ) {
			html.overlay = '<div class="hi-overlay"></div>';
		}

		if( data.buttons && Object.keys( data.buttons ).length ) {
			h = '';
			$.each( data.buttons, function( i, e )
			{
				if( i == 'view' )
				{ h += '<a href="' + e + '" rel="prettyPhoto" class="hi-ff-view' + aC + '"></a>'; }

				if( i == 'link' && data.buttons.link_single  )
				{ h += '<a href="' + e + '" class="hi-ff-link' + aC + '" target="' + data.buttons.target + '"></a>'; }
			} );

			html.buttons = '<div class="hi-tpl-buttons-wrap"><div class="hi-tpl-buttons">' + h + '</div></div>';
		}

		if( data.content && Object.keys( data.content ).length ) {
			h = '';

			if( data.content.title ) {
				if( data.content.title.title_type == 'heading' ) {
					h += '<h3 class="hi-content-title">' + data.content.title.title + '</h3>';
				}else{
					h += '<a href="' + data.content.title.permalink + '" class="hi-content-title" target="' + data.content.title.target + '" title="' + data.content.title.attr.title + '">' + data.content.title.title + '</a>';
				}
			}

			if( data.content.excerpt ) {
				h += '<p class="hi-content-excerpt" data-clamp="' + data.content.clamp + '">' + data.content.excerpt + '</p>';
			}

			if( data.content.categories ) {
				var c = [];
				$.each( data.content.categories, function( i, e )
				{
					c.push( '<a href="' + e.link + '" title="' + e.title + '">' + e.name + '</a>' );
				} );
				h += '<div class="hi-content-categories">' + c.join( ', ' ) + '</div>';
			}

			if( data.content.shares ) {
				var s = '';
				$.each( data.content.shares, function( i, e )
				{
					s += '<a target="_blank" href="' + e.link + '" data-color="' + e.color + '" class="' + e.icon + aC + '"></a>';
				} );
				h += '<div class="hi-content-share">' + s + '</div>';
			}

			html.content = '<div class="hi-tpl-content-wrap"><div class="hi-tpl-content">' + h + '</div></div>';
		}

		var margin = {
			top   : 0,
			//left:   0,
			//right:  0,
			bottom: 0
		};

		hi.children().each( function( i, e )
		{
			var el = $( e );
			$.each( margin, function( mi, mv )
			{
				margin[ mi ] += parseInt( el.css( 'margin-' + mi ) );
				el.css( 'margin-' + mi, 0 );
			} );
		} );

		//if(  )
		var dispClass = '';
		if( hi.hasClass( 'inline' ) ) {
			dispClass = ' inline';
		}

		var sizew = hi.data( 'sizew' );
		var sizew_str = '';
		var sizew_cl = '';
		if(sizew)
		{
			var sizesw = sizew.split('x');
			if( $( sizesw ).length == 2 )
			{
				sizew_str = ' width: ' + sizesw[0] + '; height: '  + sizesw[1] + ';'
				sizew_cl = ' resp';
			}
		}

 		hi.wrap( '<div class="hi-' + data.tplid + dispClass + sizew_cl + ' hi-tpl-wrap hi-text-' + al + '" style="margin: ' + margin.top + 'px auto ' + margin.bottom + 'px auto;' + sizew_str + '">' );

		$.each( html, function( i, v )
		{
			$( v ).appendTo( hi );

			// clamp
			if( data.content && Object.keys( data.content ).length && data.content.excerpt ) {
				var t = $( '.hi-' + data.tplid + ' .hi-content-excerpt' );
				if( t.length ) {
					var lines = t.data( "clamp" );
					$clamp( t.get( 0 ), {clamp: lines} );
					t.css( 'max-height', (lines * parseInt( t.css( 'line-height' ) ) ) )
				}
			}
		} );

		/*
		 * TPLs share hover color
		 * */
		hi.find( '.hi-content-share' ).on( 'mouseenter', 'a', function()
		{
			$( this ).css( 'background', $( this ).data( 'color' ) );
		} ).on( 'mouseleave', 'a', function()
		{
			$( this ).css( 'background', 'transparent' );
		} );

		hi.find( '.hi-content-share' ).on( 'click', 'a', function( e )
		{
			e.preventDefault();
			var w = 640, h = 480, l = (screen.width / 2) - (w / 2), t = (screen.height / 2) - (h / 2);
			window.open( $( this ).attr( 'href' ), '',
				'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, copyhistory=no, width=' + w + ', height=' + h + ', top=' + t + ', left=' + l );
		} );

		hi.find( "a[rel^='prettyPhoto']" ).prettyPhoto( {
			animation_speed        : 'fast', /* fast/slow/normal */
			slideshow              : 5000, /* false OR interval time in ms */
			autoplay_slideshow     : false, /* true/false */
			opacity                : 0.80, /* Value between 0 and 1 */
			show_title             : true, /* true/false */
			allow_resize           : true, /* Resize the photos bigger than viewport. true/false */
			default_width          : 500,
			default_height         : 344,
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			theme                  : 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			horizontal_padding     : 20, /* The padding on each side of the picture */
			hideflash              : false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			wmode                  : 'opaque', /* Set the flash wmode attribute */
			autoplay               : true, /* Automatically start videos: True/False */
			modal                  : false, /* If set to true, only the close button will close the window */
			deeplinking            : true, /* Allow prettyPhoto to update the url to enable deeplinking. */
			overlay_gallery        : true, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			keyboard_shortcuts     : true, /* Set to false if you open forms inside prettyPhoto */
			changepicturecallback  : function()
			{
			}, /* Called everytime an item is shown/changed */
			callback               : function()
			{
			}, /* Called when prettyPhoto is closed */
			ie6_fallback           : true,
			custom_markup          : '',
			social_tools           : false
		} );

		hi.data( 'hi', data );
	}

} );
