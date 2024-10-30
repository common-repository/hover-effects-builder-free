jQuery( document ).ready( function( $ )
{
	/*
	 * Hi
	 * */
	var HI = {
		/* Wrappers an main elements*/
		W: {
			layout: {
				preview:  $( '#hi-preview-block' ),
				options:  $( '#hi-options-block' ),
				controls: $( '#hi-controls-block' )
			},
			preview:       $( '#hi-preview' ),
			image:         $( '#hi-preview-image' ),
			overlay:       $( '#hi-preview-overlay' ),
			buttons:       $( '#hi-preview-buttons' ),
			content:       $( '#hi-preview-content' ),
			buttons_div:   $( '#hi-buttons' ),
			buttons_a:     $( '#hi-buttons' ).find( 'a' ),
			content_div:   $( '#hi-content' ),
			content_parts: {
				title:      $( '#hi-content-title' ),
				excerpt:    $( '#hi-content-excerpt' ),
				categories: $( '#hi-content-categories' ),
				shares:     $( '#hi-content-share' )
			}
		},

		/* controls */
		C: {
			// common
			mode_buttons:       $( '.hi-mode' ),
			size_select:        $( '.hi-preview-sizes' ),
			transition_speed:   $( '.hi-transition_speed' ),
			wrapper_overflow:   $( '.hi-image-overflow' ),
			wrapper_background: $( '#hi-image-background' ),
			tpl_name_control: $( '#hi-tpl-name' ),
			tpl_name:         $( '#hi-name' ),
			tpl_assign:       $( '.hi-tpl-assign' ),
			save_btn:         $( '#hi-save' ),

			// Image
			I: {
				push_enable:     $( '.hi-image-push' ),

                radius:          $( '.hi-image-radius' ),
                radius_units:    $( '.hi-image-radius-units' ),
				// slide
				slide_enable:     $( '.hi-image-slide' ),
				slide_direction:  $( '.hi-image-slide-direction' ),

				// rotate
				rotate_enable:  $( '.hi-image-rotate-enable' ),
				rotate_grad_x:  $( '.hi-image-rotate-grad-x' ),
				rotate_grad_y:  $( '.hi-image-rotate-grad-y' ),
				rotate_grad_z:  $( '.hi-image-rotate-grad-z' ),

				// scale
				scale_enable:   $( '.hi-image-scale-enable' ),
				scale_percents: $( '.hi-image-scale-percents' ),

				// other
				perspective:    $( '.hi-image-rotate-grad-p' ),
				origin:         $( '.hi-image-origin' )
			},

			// OVERLAY
			O:        {
				enable:     $( '.hi-overlay-enable' ),
				background: $( '#hi-overlay-background' ),

				fade_enable:      $( '.hi-overlay-fade' ),

				/* transform */
				// slide
				slide_enable:     $( '.hi-overlay-slide' ),
				slide_direction:  $( '.hi-overlay-slide-direction' ),

				// rotate
				rotate_enable:    $( '.hi-overlay-rotate-enable' ),
				rotate_grad_x:    $( '.hi-overlay-rotate-grad-x' ),
				rotate_grad_y:    $( '.hi-overlay-rotate-grad-y' ),
				rotate_grad_z:    $( '.hi-overlay-rotate-grad-z' ),
				rotate_direction: $( '.hi-overlay-rotate-direction' ),

				// scale
				scale_enable:     $( '.hi-overlay-scale-enable' ),
				scale_percents:   $( '.hi-overlay-scale-percents' ),

				// other
				perspective:      $( '.hi-overlay-rotate-grad-p' ),
				origin:           $( '.hi-overlay-origin' )
			},

			// BUTTONS
			B:        {
				enable:             $( '.hi-buttons-enable' ),
				pphoto:             $( '.hi-pretty-photo' ),
				set:                $( '.hi-buttons-set' ),
				link_single:        $( '.hi-buttons-link-single-enable' ),
				type:               $( '.hi-buttons-type' ),
				size:               $( '.hi-buttons-size' ),
				color:              $( '#hi-buttons-foreground-color' ),
				color_opacity:      $( '#hi-buttons-foreground-color-opacity' ),
				background:         $( '#hi-buttons-background-color' ),
				background_opacity: $( '#hi-buttons-background-color-opacity' ),

				radius: $( '.hi-buttons-radius' ),

				fade_enable:      $( '.hi-buttons-fade' ), /* transform */
				// slide
				slide_enable:     $( '.hi-buttons-slide' ),
				slide_direction:  $( '.hi-buttons-slide-direction' ),

				// rotate
				rotate_enable:    $( '.hi-buttons-rotate-enable' ),
				rotate_grad_x:    $( '.hi-buttons-rotate-grad-x' ),
				rotate_grad_y:    $( '.hi-buttons-rotate-grad-y' ),
				rotate_grad_z:    $( '.hi-buttons-rotate-grad-z' ),
				rotate_direction: $( '.hi-buttons-rotate-direction' ),

				// scale
				scale_enable:     $( '.hi-buttons-scale-enable' ),
				scale_percents:   $( '.hi-buttons-scale-percents' ),

				// other
				perspective:      $( '.hi-buttons-rotate-grad-p' ),
				origin:           $( '.hi-buttons-origin' )
			},

			// content
			C:        {
				enable:                $( '.hi-content-enable' ),
				enable_parts:          $( '.hi-content-parts' ),
				always:               $( '.hi-content-always' ),
				type:                  $( '.hi-content-type' ),
				background:            $( '#hi-content-background' ),
				opacity:               $( '#hi-content-background-opacity' ),
				margin:                $( '.hi-content-background-margin' ),
				align:                 $( '.hi-content-align' ),
				title_type:            $( '.hi-content-title-type' ),
				title_font_size:       $( '.hi-content-title-typo-font-size' ),
				title_color:           $( '#hi-content-title-typo-color' ),
				title_font_style:      $( '.hi-content-title-typo-font-style' ),
				excerpt_length:        $( '.hi-content-excerpt-length' ),
				excerpt_font_size:     $( '.hi-content-excerpt-typo-font-size' ),
				excerpt_color:         $( '#hi-content-excerpt-typo-color' ),
				excerpt_font_style:    $( '.hi-content-excerpt-typo-font-style' ),
				categories_font_size:  $( '.hi-content-categories-typo-font-size' ),
				categories_color:      $( '#hi-content-categories-typo-color' ),
				categories_font_style: $( '.hi-content-categories-typo-font-style' ),
				shares_font_size:      $( '.hi-content-shares-typo-font-size' ),
				shares_color:          $( '#hi-content-shares-typo-color' ),
				shares_font_style:     $( '.hi-content-shares-typo-font-style' ),
				shares_enable:         $( '.hi-content-shares-enable' ),
				shares_radius:         $( '.hi-content-shares-radius' ),
				fade_enable:           $( '.hi-content-fade' ),
				partial_size:          $( '.hi-content-partial-size' ),
				partial_position:      $( '.hi-content-partial-position' ),

				/* transform */
				// slide
				slide_enable:          $( '.hi-content-slide' ),
				slide_direction:       $( '.hi-content-slide-direction' ),

				// rotate
				rotate_enable:         $( '.hi-content-rotate-enable' ),
				rotate_grad_x:         $( '.hi-content-rotate-grad-x' ),
				rotate_grad_y:         $( '.hi-content-rotate-grad-y' ),
				rotate_grad_z:         $( '.hi-content-rotate-grad-z' ),
				rotate_direction:      $( '.hi-content-rotate-direction' ),

				// scale
				scale_enable:          $( '.hi-content-scale-enable' ),
				scale_percents:        $( '.hi-content-scale-percents' ),

				// other
				perspective:           $( '.hi-content-rotate-grad-p' ),
				origin:                $( '.hi-content-origin' )
			}
		},

		S:                  {
			tplId:            '',
			assigned:         false,
			edit_mode:        false,
			transition_speed: 400,

			wrapper: {
				overflow:   0,
				background: '#ffffff'
			},

			image: {
				enable:         true,
				slide:          0,
				scale:          0,
				push:           0,
				scale_percents: {
					start: 0,
					stop:  0
				},
				rotate:         0,
				rotate_grad_x:  {
					start: 0,
					stop:  0
				},
				rotate_grad_y:  {
					start: 0,
					stop:  0
				},
				rotate_grad_z:  {
					start: 0,
					stop:  0
				},
				perspective:    { start: 0 },
				origin:         0,
                radius_units:   'px',
                radius:          {
                    start: 0,
                    stop:  0
                }
			},

			overlay: {
				enable:          0,
				background:      '#000000',
				opacity:         '1',
				fade:            0,
				slide:           0,
				slide_direction: { start: 0 },
				scale:           0,
				scale_percents:  {
					start: 0,
					stop:  0
				},
				rotate:          0,
				rotate_grad_x:   {
					start: 0,
					stop:  0
				},
				rotate_grad_y:   {
					start: 0,
					stop:  0
				},
				rotate_grad_z:   {
					start: 0,
					stop:  0
				},
				perspective:     { start: 0 },
				origin:          0
			},
			buttons: {
				enable:          false,
				pphoto:          0,
				set:             {
					link: false,
					view: false
				},
				link_single: true,
				radius:          {
					start: 0,
					stop:  0
				},
				size:            { start: 0 },
				type:            '',
				background:      '#000000',
				opacity:         '1',
				fade:            0,
				slide:           0,
				slide_direction: { start: 0 },
				scale:           0,
				scale_percents:  {
					start: 0,
					stop:  0
				},
				rotate:          0,
				rotate_grad_x:   {
					start: 0,
					stop:  0
				},
				rotate_grad_y:   {
					start: 0,
					stop:  0
				},
				rotate_grad_z:   {
					start: 0,
					stop:  0
				},
				perspective:     { start: 0 },
				origin:          0
			},
			content: {
				enable:          0,
				enable_parts:    {
					title:      false,
					excerpt:    false,
					categories: false,
					shares:     false
				},
				always:           0,
				shares_enable:   {},
				title_type:      'link',
				typo:            {
					title:      {
						size:      0,
						height:    0,
						color:     '',
						bold:      0,
						italic:    0,
						underline: 0,
						uppercase: 0
					},
					excerpt:    {
						length:    { start: 0 },
						size:      0,
						height:    0,
						color:     '',
						bold:      0,
						italic:    0,
						underline: 0,
						uppercase: 0
					},
					categories: {
						size:      0,
						height:    0,
						color:     '',
						bold:      0,
						italic:    0,
						underline: 0,
						uppercase: 0
					},
					shares:     {
						size:   0,
						color:  '',
						radius: 0
					}
				},
				background:      '#000000',
				opacity:         '1',
				excerpt_length:  4,
				align:           '',
				partial:         'full',
				partial_size:    70,
				margin:          0,
				fade:            0,
				slide:           0,
				slide_direction: 0,
				scale:           0,
				scale_percents:  {
					start: 0,
					stop:  0
				},
				rotate:          0,
				rotate_grad_x:   {
					start: 0,
					stop:  0
				},
				rotate_grad_y:   {
					start: 0,
					stop:  0
				},
				rotate_grad_z:   {
					start: 0,
					stop:  0
				},
				perspective:     { start: 0 },
				origin:          0

			}
		},

		Lorem: 'Purto eius labitur vel id. Duo an justo aperiri integre, vidit dicat docendi sed ex, has prima simul tempor te. Dolorum detracto eu pro, enim ubique pericula te cum, ei dicam commune eos. An has legere option platonem. Animal atomorum te nam, ne vix movet tantas dissentiet, vel esse impedit delicata ad. Cu nec eripuit atomorum, veri pertinacia concludaturque cu mei. \nPer ut odio dolorum praesent, mea eu stet evertitur. Et hinc falli impedit mei, pri ex inani affert conclusionemque, quo reque legere reformidans ea. Cu usu brute convenire. Et mel mentitum definitiones necessitatibus. \nId persius laboramus mel, doming omnesque lucilius mel eu. Ne modo tamquam salutandi sit, duo erant verterem ne. In euripidis intellegebat sed. Ad purto diceret accumsan eos, inani timeam est id. Pro cetero recusabo at, sea imperdiet referrentur eu. \nEi mel habemus assentior. Mea paulo persius assentior ei, in pri quodsi indoctum, vel option ceteros qualisque ex. Ea alia deserunt inciderint quo, no laudem detraxit intellegat mea. Vel assum dolore legimus at, ne est nominati referrentur. \nVis solum perfecto imperdiet ne, ius homero platonem ad. Malis fierent insolens id ius. Per aeque dolore ubique id, has veniam splendide cu. Et per erat detracto omittantur. \nSolum vocent at eos, mea no quidam detracto. Eius tamquam an sea. Sumo aliquid debitis no vel, at essent copiosae has. Ea harum dolore mel, vis rationibus neglegentur consequuntur ne. Ex usu nisl invidunt. Eam esse saepe sententiae id, tation integre dolorem at vim. \nOmnis apeirian hendrerit in nec. Et elit recusabo corrumpit eam. Persecuti reformidans at nec, te mea vocent viderer. Ne vis autem simul. Te phaedrum molestiae sadipscing vix. Te quas alterum vel. \nSit vero brute adipisci an, eu mel minim iudico ridens, exerci oportere eu eam. Est modo choro adipiscing cu, hinc wisi eligendi usu ei. Timeam platonem an vel, mea errem nullam prodesset an, ex mel unum affert. Aliquip inermis sed ex, sed te amet signiferumque. No duo cetero impedit referrentur. Vix summo nostrud ad. An elit cibo tincidunt sit. \nRecteque laboramus usu te. Pri te quodsi torquatos, alienum pertinax explicari pri in. Vel aeque homero perfecto eu, sale legimus at eam, his ei idque aliquando deseruisse. Eum maiorum epicuri persequeris eu, ea vis docendi appellantur. \nEx enim iusto dicit qui, nam iuvaret delicatissimi ad, expetenda argumentum intellegebat vis at. Graeci regione propriae ut est, id assentior deterruisset sea, ea vis assum officiis. Ad mel postea epicuri, mazim propriae facilisis ius ut. Vis scriptorem delicatissimi eu. Erat corpora per at, an est ullum option honestatis.',
		// preview or edit mode
		_mode:              function()
		{
			HI.C.mode_buttons.on( 'change', function( e )
			{
				$( this ).val() == 'edit' ? HI.S.edit_mode = true : HI.S.edit_mode = false;
				HI.W.preview.toggleClass( 'hi-edit', HI.S.edit_mode );
				HI._edit_mode( HI.S.edit_mode );
			} ).filter( ':checked' ).trigger( 'change' );

			HI.C.transition_speed.on( 'change', function()
			{
				HI.S.transition_speed = $( this ).val();

				$.each( {
					'I': 'image',
					'O': 'overlay',
					'B': 'buttons',
					'C': 'content'
				}, function( i, e )
				{
					HI._css3( e );
				} );

			} ).trigger( 'change' );

			HI.C.tpl_assign.on( 'change', function( e )
			{
				var values = {};
				HI.C.tpl_assign.each( function( i, e )
				{
					var el = $( e );

					if( e.nodeName == 'INPUT' && el.is( ":checked" ) )
					{
						values[ el.data( 'key' ) ] = 1;
					}
					if( e.nodeName == 'TEXTAREA' )
					{
						var v = el.val().trim();
						if( v != '' )
						{
							values[ el.data( 'key' ) ] = v;
						}
					}
				} );

				HI.S.assigned = values;
			} ).trigger( 'change' );
		},

		// preview size
		_psize:             function()
		{
			/* Preview size */
			var a = localStorage.getItem( 'hi-preview-size' );
			if( !a )
			{
				a = '420xauto';
			}

			HI.C.size_select.val( a );
			var sizes = a.split( 'x' );

			HI.W.image.css( {
				width:  sizes[ 0 ],
				height: sizes[ 1 ]
			} );
			sizes[ 0 ] = parseInt( sizes[ 0 ] ) + parseInt( HI.W.layout.preview.css( 'padding-left' ) ) * 2;
			HI.W.layout.preview.css( { width: sizes[ 0 ] } );
			HI.C.size_select.on( 'change', function()
			{
				var size = $( this ).val();
				var sizes = size.split( 'x' );
				localStorage.setItem( 'hi-preview-size', size );
				HI.W.image.css( {
					width:  sizes[ 0 ],
					height: sizes[ 1 ]
				} );
				sizes[ 0 ] = parseInt( sizes[ 0 ] ) + parseInt( HI.W.layout.preview.css( 'padding-left' ) ) * 2;
				HI.W.layout.preview.css( { width: sizes[ 0 ] } );
			} );
		},

		// enable init
		_enable:            function()
		{
			$.each( {
				'O': 'overlay',
				'B': 'buttons',
				'C': 'content'
			}, function( i, e )
			{
				HI.C[ i ].enable.on( 'change', function()
				{
					HI.S[ e ].enable = HI._is_on( $( this ) );
					HI.W[ e ].toggleClass( 'hi-disable', !HI.S[ e ].enable );
					HI._hover_action( 0, e );
					HI._css3( e );

					if( i == 'C' )
					{
						HI._clamp( HI.W.content_parts.excerpt, HI.S.content.typo.excerpt.length );
					}

				} ).filter( ':checked' ).trigger( 'change' );
			} );

			// content always
			HI.C.C.always.on( 'change', function()
			{
				HI.S.content.always = HI._is_on( $( this ) );
				HI._hover_action( HI.S.content.always, 'content' );
				HI._css3( 'content' );
			} ).filter( ':checked' ).trigger( 'change' );

			// buttons parts
			HI.C.B.set.on( 'change', function()
			{
				var i = $( this ), v = i.val();
				HI.S.buttons.set[ v ] = i.is( ":checked" );
				HI.W.buttons_a.filter( '.hi-ff-' + v ).toggle( HI.S.buttons.set[ v ] );
			} ).trigger( 'change' );

			HI.C.B.link_single.on( 'change', function()
			{
				HI.S.buttons.link_single = HI._is_on( $( this ) );
			} ).trigger( 'change' );/**/

			HI.C.B.pphoto.on( 'change', function()
			{
				HI.S.buttons.pphoto = HI._is_on( $( this ) );
				if( HI.S.buttons.pphoto )
				{
					$( '.hi-pb' ).prettyPhoto({
						social_tools: false
					});
				}
				else
				{
					$( '.hi-pb' ).off( 'click' );
				}
			} ).filter( ':checked' ).trigger( 'change' );
		},

		// enable init
		_overflow:          function()
		{
			// overlay
			HI.C.wrapper_overflow.on( 'change', function()
			{
				HI.S.wrapper.overflow = $( this ).val();
				HI.W.preview.css( 'overflow', HI.S.wrapper.overflow );
			} ).filter( ':checked' ).trigger( 'change' );
		},

		// enable parts init
		_enable_parts:      function()
		{
			HI.C.C.enable_parts.on( 'change', function()
			{
				var i = $( this ), v = i.val();
				HI.S.content.enable_parts[ v ] = i.is( ":checked" );
				HI.W.content_parts[ v ].toggle( HI.S.content.enable_parts[ v ] );
				if( v == 'excerpt' && HI.S.content.enable_parts.excerpt )
				{
					HI.S.content.typo.excerpt.length = parseInt( HI.C.C.excerpt_length.val() );
					HI._clamp( HI.W.content_parts.excerpt, HI.S.content.typo.excerpt.length );
				}
			} ).trigger( 'change' );
		},

		// type init
		_buttons_type_init: function()
		{
			HI.C.B.type.on( 'change', function()
			{
				HI.S.buttons.type = $( this ).val();
				HI.W.buttons.removeClass( 'hi-b-simple hi-b-background hi-b-border' ).addClass( 'hi-b-' + HI.S.buttons.type );
				HI.C.B.background.trigger( 'change' );
				HI.C.B.size.trigger( 'change' );
				HI._css3( 'buttons' );
			} ).filter( ':checked' ).trigger( 'change' );
		},

		// background color props
		_background:        function()
		{
			// overlay background
			HI.C.O.background.on( 'change', function()
			{
				HI.S.overlay.background = HI.C.O.background.minicolors( 'rgbaString' );
				HI.W.overlay.css( { background: HI.S.overlay.background } );
			} ).trigger( 'change' );

			// image background
			HI.C.wrapper_background.on( 'change', function()
			{
				HI.S.wrapper.background = HI.C.wrapper_background.minicolors( 'rgbaString' );
				HI.W.preview.css( { background: HI.S.wrapper.background } );
			} ).trigger( 'change' );

			// buttons
			HI.C.B.background.on( 'change', function()
			{
				HI.S.buttons.type == 'background' ? HI.S.buttons.background = HI.C.B.background.minicolors( 'value' ) : HI.S.buttons.background = 'transparent';

				HI.W.buttons_a.css( 'background', HI.S.buttons.background );
			} ).trigger( 'change' );

			// content background
			HI.C.C.background.on( 'change', function()
			{
				HI.S.content.background = HI.C.C.background.minicolors( 'rgbaString' );
				HI.W.content_div.css( { background: HI.S.content.background } );
			} ).trigger( 'change' );
		},

		// color props
		_color:             function()
		{
			// buttons
			HI.C.B.color.on( 'change', function()
			{
				HI.S.buttons.color = HI.C.B.color.minicolors( 'value' );
				HI.W.buttons_a.css( { color: HI.S.buttons.color } );
				HI._border();
			} ).trigger( 'change' );
		},

		_border: function()
		{
			if( HI.S.buttons.type == 'border' )
			{
				HI.W.buttons_a.css( { border: 'solid ' + Math.ceil( HI.S.buttons.size * 0.06 ) + 'px ' + HI.S.buttons.color } );
			}
			else
			{
				HI.W.buttons_a.css( { border: 'solid 0px transparent' } );
			}
		},

		// margin
		_margin: function()
		{
			HI.C.C.margin.on( 'change', function()
			{
				HI.S.content.margin = parseInt( HI.C.C.margin.val() );
				HI.W.content.css( { padding: HI.S.content.margin + 'px' } );
			} ).trigger( 'change' );
		},

		// enable init
		_align:  function()
		{
			HI.C.C.align.on( 'change', function()
			{
				HI.S.content.align = $( this ).val();
				HI.W.content_div.css( 'text-align', HI.S.content.align );
			} ).filter( ':checked' ).trigger( 'change' );
		},

		// sizes
		_size:   function()
		{
			// buttons size
			HI.C.B.size.on( 'change', function()
			{
				var size = 0, px = '';

				HI.S.buttons.size = parseInt( HI.C.B.size.val() );
				HI.S.buttons.type != 'simple' ? size = Math.ceil( HI.S.buttons.size * 1.618 * 1.618 ) : size = HI.S.buttons.size + 2;
				px = size + 'px';
				HI.W.buttons_a.css( {
					fontSize:   HI.S.buttons.size + 'px',
					width:      px,
					height:     px,
					lineHeight: px
				} );
				HI.W.buttons_div.css( {
					height:    size,
					marginTop: (0 - (size / 2)) + 'px'
				} );
				HI._border();
			} ).trigger( 'change' );
		},

		_clamp: function( e, l )
		{
			var d = e.css('display');
			e.text( HI.Lorem );
			$clamp( e.get( 0 ), { clamp: l } );
			if( d == 'none' )
			{
				e.css('display', d);
			}
		},

		_check_clamp: function()
		{
			if( HI.W.content_parts.excerpt.height() > HI.W.content.height() )
			{
				HI._clamp( HI.W.content_parts.excerpt, HI.S.content.typo.excerpt.length );
			}
		},

		_typo:                      function()
		{
			HI.C.C.title_type.on( 'change', function()
			{
				HI.S.content.title_type = $( this ).val();
			} ).filter( ':checked' ).trigger( 'change' );

			/* TYTLE */
			// title
			HI.C.C.title_font_size.on( 'change', function()
			{
				HI.S.content.typo.title.size = parseInt( HI.C.C.title_font_size.val() );
				HI.S.content.typo.title.height = HI.S.content.typo.title.size + 4;
				HI.W.content_parts.title.css( {
					fontSize:   HI.S.content.typo.title.size + 'px',
					lineHeight: HI.S.content.typo.title.height + 'px'
				} );
			} ).trigger( 'change' );

			// color
			HI.C.C.title_color.on( 'change', function()
			{
				HI.S.content.typo.title.color = HI.C.C.title_color.minicolors( 'value' );
				HI.W.content_parts.title.css( 'color', HI.S.content.typo.title.color );
			} ).trigger( 'change' );

			// style
			HI.C.C.title_font_style.on( 'change', function()
			{
				var i = $( this ), v = i.val(), e = i.is( ":checked" ), p = {};
				e ? HI.S.content.typo.title[ v ] = v : HI.S.content.typo.title[ v ] = false;
				$.each( HI.S.content.typo.title, function( i, e )
				{
					if( i == 'bold' )
					{
						HI.S.content.typo.title.bold ? p.fontWeight = HI.S.content.typo.title.bold : p.fontWeight = 'normal';
					}
					if( i == 'italic' )
					{
						HI.S.content.typo.title.italic ? p.fontStyle = HI.S.content.typo.title.italic : p.fontStyle = 'normal';
					}
					if( i == 'underline' )
					{
						HI.S.content.typo.title.underline ? p.textDecoration = HI.S.content.typo.title.underline : p.textDecoration = 'none';
					}
					if( i == 'uppercase' )
					{
						HI.S.content.typo.title.uppercase ? p.textTransform = HI.S.content.typo.title.uppercase : p.textTransform = 'none';
					}
				} );
				HI.W.content_parts.title.css( p );
			} ).trigger( 'change' );

			/* EXCERPT */
			// size
			HI.C.C.excerpt_font_size.on( 'change.hi', function()
			{
				HI.S.content.typo.excerpt.size = parseInt( HI.C.C.excerpt_font_size.val() );
				HI.S.content.typo.excerpt.height = HI.S.content.typo.excerpt.size + 4;
				HI.W.content_parts.excerpt.css( {
					fontSize:   HI.S.content.typo.excerpt.size + 'px',
					lineHeight: HI.S.content.typo.excerpt.height + 'px'
				} );
				HI._clamp( HI.W.content_parts.excerpt, HI.S.content.typo.excerpt.length );
			} ).trigger( 'change' );

			// color
			HI.C.C.excerpt_color.on( 'change', function()
			{
				HI.S.content.typo.excerpt.color = HI.C.C.excerpt_color.minicolors( 'value' );
				HI.W.content_parts.excerpt.css( 'color', HI.S.content.typo.excerpt.color );
			} ).trigger( 'change' );

			// style
			HI.C.C.excerpt_font_style.on( 'change', function()
			{
				var i = $( this ), v = i.val(), e = i.is( ":checked" ), p = {};
				e ? HI.S.content.typo.excerpt[ v ] = v : HI.S.content.typo.excerpt[ v ] = false;
				$.each( HI.S.content.typo.excerpt, function( i, e )
				{
					if( i == 'bold' )
					{
						HI.S.content.typo.excerpt.bold ? p.fontWeight = HI.S.content.typo.excerpt.bold : p.fontWeight = 'normal';
					}
					if( i == 'italic' )
					{
						HI.S.content.typo.excerpt.italic ? p.fontStyle = HI.S.content.typo.excerpt.italic : p.fontStyle = 'normal';
					}
					if( i == 'underline' )
					{
						HI.S.content.typo.excerpt.underline ? p.textDecoration = HI.S.content.typo.excerpt.underline : p.textDecoration = 'none';
					}
					if( i == 'uppercase' )
					{
						HI.S.content.typo.excerpt.uppercase ? p.textTransform = HI.S.content.typo.excerpt.uppercase : p.textTransform = 'none';
					}
				} );
				HI.W.content_parts.excerpt.css( p );
				HI._clamp( HI.W.content_parts.excerpt, HI.S.content.typo.excerpt.length );
			} ).trigger( 'change' );

			// length
			HI.C.C.excerpt_length.on( 'change.hi', function()
			{
				HI.S.content.typo.excerpt.length = parseInt( HI.C.C.excerpt_length.val() );
				HI._clamp( HI.W.content_parts.excerpt, HI.S.content.typo.excerpt.length );
			} ).trigger( 'change' );

			/* CATEGORIES */
			// size
			HI.C.C.categories_font_size.on( 'change', function()
			{
				HI.S.content.typo.categories.size = parseInt( HI.C.C.categories_font_size.val() );
				HI.S.content.typo.categories.height = HI.S.content.typo.categories.size + 4;
				HI.W.content_parts.categories.css( {
					fontSize:   HI.S.content.typo.categories.size + 'px',
					lineHeight: HI.S.content.typo.categories.height + 'px'
				} );
			} ).trigger( 'change' );

			// color
			HI.C.C.categories_color.on( 'change', function()
			{
				HI.S.content.typo.categories.color = HI.C.C.categories_color.minicolors( 'value' );
				HI.W.content_parts.categories.css( 'color', HI.S.content.typo.categories.color );
			} ).trigger( 'change' );

			// style
			HI.C.C.categories_font_style.on( 'change', function()
			{
				var i = $( this ), v = i.val(), e = i.is( ":checked" ), p = {};
				e ? HI.S.content.typo.categories[ v ] = v : HI.S.content.typo.categories[ v ] = false;
				$.each( HI.S.content.typo.categories, function( i, e )
				{
					if( i == 'bold' )
					{
						HI.S.content.typo.categories.bold ? p.fontWeight = HI.S.content.typo.categories.bold : p.fontWeight = 'normal';
					}
					if( i == 'italic' )
					{
						HI.S.content.typo.categories.italic ? p.fontStyle = HI.S.content.typo.categories.italic : p.fontStyle = 'normal';
					}
					if( i == 'uppercase' )
					{
						HI.S.content.typo.categories.uppercase ? p.textTransform = HI.S.content.typo.categories.uppercase : p.textTransform = 'none';
					}
				} );
				HI.W.content_parts.categories.css( p );
			} ).trigger( 'change' );

			/* SHARES */
			// size
			HI.C.C.shares_font_size.on( 'change', function()
			{
				HI.S.content.typo.shares.size = parseInt( HI.C.C.shares_font_size.val() );
				HI.W.content_parts.shares.find( 'a' ).css( {
					fontSize:   HI.S.content.typo.shares.size + 'px',
					lineHeight: HI.S.content.typo.shares.size + 'px'
				} );
			} ).trigger( 'change' );

			// color
			HI.C.C.shares_color.on( 'change', function()
			{
				HI.S.content.typo.shares.color = HI.C.C.shares_color.minicolors( 'value' );
				HI.W.content_parts.shares.find( 'a' ).css( 'color', HI.S.content.typo.shares.color );
			} ).trigger( 'change' );

			// hover colors
			HI.W.content_parts.shares.on( 'mouseenter', 'a', function()
			{
				$( this ).css( 'background', $( this ).data( 'color' ) );
			} ).on( 'mouseleave', 'a', function()
			{
				$( this ).css( 'background', 'transparent' );
			} );

			// radius
			HI.C.C.shares_radius.on( 'change', function()
			{
				HI.S.content.typo.shares.radius = parseInt( HI.C.C.shares_radius.val() );
				HI.W.content_parts.shares.find( 'a' ).css( 'border-radius', HI.S.content.typo.shares.radius + '%' );
			} ).trigger( 'change' );

			// enable
			HI.C.C.shares_enable.on( 'change.hi', function()
			{
				var i = $( this ), v = i.val();
				HI.S.content.shares_enable[ v ] = i.is( ":checked" );
				HI.W.content_parts.shares.find( 'a.hi-ff-' + v ).toggle( HI.S.content.shares_enable[ v ] );
			} ).trigger( 'change' );

			HI.W.content_parts.shares.find( 'a' ).on( 'click', false );
		},

		// radius
		_radius:                    function()
		{
            // Image
            HI.C.I.radius.on( 'change.hi', function()
            {
                var el = $( this );
                HI.S.image.radius[ el.data( 'position' ) ] = el.val();
                HI._set_image_radius_hover();
                HI.W.image.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
                HI.W.overlay.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
                HI.W.content_div.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
            } ).trigger( 'change' );

            HI.C.I.radius_units.on( 'change.hi', function()
            {
                var el = $( this );
                HI.S.image.radius_units = el.val();
                HI._set_image_radius_hover();
                HI.W.image.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
                HI.W.overlay.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
                HI.W.content_div.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
            } ).trigger( 'change' );

            // buttons
			HI.C.B.radius.on( 'change.hi', function()
			{
				var el = $( this );
				HI.S.buttons.radius[ el.data( 'position' ) ] = el.val();
				HI._set_buttons_radius_hover();
				HI.W.buttons_a.css( 'borderRadius', HI.S.buttons.radius.start + '%' );
			} ).trigger( 'change' );
		},

		// set buttons hover action
		_set_buttons_radius_hover:          function()
		{
			HI.W.buttons_a.hover( function()
			{
				$( this ).css( 'borderRadius', HI.S.buttons.radius.stop + '%' );
			}, function()
			{
				$( this ).css( 'borderRadius', HI.S.buttons.radius.start + '%' );
			} );
		},

        // set image hover action
        _set_image_radius_hover:          function()
        {
            HI.W.preview.hover( function()
            {
                HI.W.image.css( 'borderRadius', HI.S.image.radius.stop + HI.S.image.radius_units );
                HI.W.overlay.css( 'borderRadius', HI.S.image.radius.stop + HI.S.image.radius_units );
                HI.W.content_div.css( 'borderRadius', HI.S.image.radius.stop + HI.S.image.radius_units );
            }, function()
            {
                HI.W.image.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
                HI.W.overlay.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
                HI.W.content_div.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
            } );
        },

		// fade init
		_fade:                      function()
		{
			$.each( {
				'O': 'overlay',
				'B': 'buttons',
				'C': 'content'
			}, function( i, e )
			{
				HI.C[ i ].fade_enable.on( 'change', function()
				{
					HI.S[ e ].fade = HI._is_on( $( this ) );
					HI.W[ e ].toggleClass( 'hi-disable-fade', !HI.S[ e ].fade );
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).filter( ':checked' ).trigger( 'change' );
			} );
		},

		// transform init ( slide, scale & rotate )
		_transform:                 function()
		{
			/* ROTATE */
			$.each( {
				'I': 'image',
				'O': 'overlay',
				'B': 'buttons',
				'C': 'content'
			}, function( i, e )
			{
				/* ROTATE ENABLE */
				HI.C[ i ].rotate_enable.on( 'change', function()
				{
					HI.S[ e ].rotate = HI._is_on( $( this ) );
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).filter( ':checked' ).trigger( 'change' );

				/* ROTATE X Y Z */
				$.each( [
					'x',
					'y',
					'z'
				], function( ri, re )
				{
					var n = 'rotate_grad_' + re;
					HI.C[ i ][ n ].on( 'change', function()
					{
						var el = $( this );
						HI.S[ e ][ n ][ el.data( 'position' ) ] = el.val();
						HI._hover_action( 0, e );
						HI._css3( e );
					} ).trigger( 'change' );
				} );

				/* PERSPECTIVE */
				HI.C[ i ].perspective.on( 'change', function()
				{
					HI.S[ e ].perspective = $( this ).val();
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).trigger( 'change' );

				/* ORIGIN */
				HI.C[ i ].origin.on( 'change', function()
				{
					HI.S[ e ].origin = $( this ).val();
					HI.W[ e ].css( 'transform-origin', HI.S[ e ].origin );
					HI.W[ e ].css( '-webkit-transform-origin', HI.S[ e ].origin );
					HI.W[ e ].css( '-ms-transform-origin', HI.S[ e ].origin );
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).trigger( 'change' );
			} );

			/* SCALE */
			$.each( {
				'I': 'image',
				'O': 'overlay',
				'B': 'buttons',
				'C': 'content'
			}, function( i, e )
			{
				/* SCALE ENABLE */
				HI.C[ i ].scale_enable.on( 'change', function()
				{
					HI.S[ e ].scale = HI._is_on( $( this ) );
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).filter( ':checked' ).trigger( 'change' );

				/* SCALE PERCENTS */
				HI.C[ i ].scale_percents.on( 'change', function()
				{
					var el = $( this );
					HI.S[ e ].scale_percents[ el.data( 'position' ) ] = el.val();
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).trigger( 'change' );
			} );

			/* SLIDE */
			$.each( {
				'I': 'image',
				'O': 'overlay',
				'B': 'buttons',
				'C': 'content'
			}, function( i, e )
			{
				/* SLIDE ENABLE */
				HI.C[ i ].slide_enable.on( 'change', function()
				{
					HI.S[ e ].slide = HI._is_on( $( this ) );
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).filter( ':checked' ).trigger( 'change' );

				/* SLIDE DIRECTION */
				HI.C[ i ].slide_direction.on( 'change', function()
				{
					HI.S[ e ].slide_direction = $( this ).val();
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).trigger( 'change' );
			} );

			/* Push */
			$.each( {
				'I': 'image'
			}, function( i, e )
			{
				/* Push ENABLE */
				HI.C[ i ].push_enable.on( 'change', function()
				{
					HI.S[ e ].push = HI._is_on( $( this ) );
					HI._hover_action( 0, e );
					HI._css3( e );
				} ).filter( ':checked' ).trigger( 'change' );
			} );

			// reset states
			HI._edit_mode( 1 );
			HI._edit_mode( 0 );
		},

		/* TRANFORM */
		// get slide start css prop
		_transform_get_slide_start: function( p )
		{
			if( HI.S[ p ].slide )
			{
				var v = HI._slide_pos( HI.S[ p ].slide_direction );
				return 'translate3d( ' + v[ 1 ] + ', ' + v[ 0 ] + ', 0)';
			}
			return '';
		},

		// get slide stop css prop
		_transform_get_slide_stop:  function( p )
		{
			if( p == 'image' )
			{
				if( HI.S.image.push && HI.S.content.enable && HI.S.content.slide )
				{
					var s = '';
					if( HI.S.content.partial == 'partial' )
					{
						var push_size = HI.S.content.partial_size + 'px';
						switch ( HI.S.content.partial_position )
						{
							case 'top':    s = '0, ' + push_size + ', 0';  break;
							case 'bottom': s = '0, -' + push_size + ', 0';  break;
							case 'left':   s =       push_size + ', 0, 0';  break;
							case 'right':  s = '-' + push_size + ', 0, 0';  break;
						}
						return 'translate3d( ' + s + ')';
					}
					else
					{
						var push_size = '100%';
						var v = HI._slide_pos( HI.S.content.slide_direction );
						$.each( v, function( i, s ){
							s.charAt( 0 ) == '-' ? v[ i ] = s.substr( 1, s.length ) : v[ i ] = '-' + s;
						} );
						return 'translate3d( ' + v[ 1 ] + ', ' + v[ 0 ] + ', 0)';
					}
				}
			}
			else
			{
				if( HI.S[ p ].slide )
				{
					return 'translate3d( 0% , 0%, 0)';
				}
			}
			return '';
		},

		// get scale start css prop
		_transform_get_scale:       function( p, d )
		{
			if( HI.S[ p ].scale )
			{
				var v = HI.S[ p ].scale_percents[ d ] / 100;
				return 'scale(' + v + ',' + v + ')';
			}
			return '';
		},

		// get rotate start css prop
		_transform_get_rotate:      function( p, d )
		{
			if( HI.S[ p ].rotate )
			{
				var Gx = HI.S[ p ].rotate_grad_x[ d ], Gy = HI.S[ p ].rotate_grad_y[ d ], Gz = HI.S[ p ].rotate_grad_z[ d ];
				return 'rotateX( ' + Gx + 'deg ) rotateY( ' + Gy + 'deg ) rotateZ( ' + Gz + 'deg )';
			}
			return '';
		},

		// get perspective start css prop
		_transform_get_perspective: function( p )
		{
			if( HI.S[ p ].rotate )
			{
				if( HI.S[ p ].perspective > 0 )
				{
					return 'perspective(' + HI.S[ p ].perspective + 'px)';
				}
			}
			return '';
		}, /* END TO */

		// init partial
		_partial:                   function()
		{
			HI.C.C.partial_size.on( 'change', function()
			{
				HI.S.content.partial_size = $( this ).val();
				HI.S.content.partial == 'partial' ? HI._set_partial_position_stop() : HI._remove_partial();
			} ).trigger( 'change' );

			HI.C.C.type.on( 'change', function()
			{
				HI.S.content.partial = $( this ).val();
				HI.S.content.partial == 'partial' ? HI._set_partial_position_stop() : HI._remove_partial();
			} ).filter( ':checked' ).trigger( 'change' );

			HI.C.C.partial_position.on( 'change', function()
			{
				HI.S.content.partial_position = $( this ).val();
				HI._set_partial_position_stop();
			} ).filter( ':checked' ).trigger( 'change' );
		},

		// set partial position
		_set_partial_position_stop: function()
		{
			if( HI.S.content.partial == 'partial' )
			{
				var size = HI.C.C.partial_size.val();
				var pos = HI.C.C.partial_position.filter( ':checked' ).val();
				// set position
				var p = {};
				switch( pos )
				{
					case 'top':
						p = {
							top:    0,
							left:   0,
							right:  0,
							bottom: 'auto',
							height: size + 'px',
							width:  '100%'
						};
						break;
					case 'bottom':
						p = {
							top:    'auto',
							left:   0,
							right:  0,
							bottom: 0,
							height: size + 'px',
							width:  '100%'
						};
						break;
					case 'left':
						p = {
							top:    0,
							left:   0,
							right:  'auto',
							bottom: 0,
							width:  size + 'px',
							height: '100%'
						};
						break;
					case 'right':
						p = {
							top:    0,
							left:   'auto',
							right:  0,
							bottom: 0,
							width:  size + 'px',
							height: '100%'
						};
						break;
				}
				HI.W.content.css( p );
				HI._hover_action( HI.S.content.always, 'image' );
			}
		},

		// remove partioal view
		_remove_partial:            function()
		{
			HI.W.content.css( {
				height: '100%',
				width:  '100%'
			} );
		},

		_get_as:       function( i, e )
		{
			var s = 0;
			if( i )
			{
				//s = HI.S.anim_speed[ e ][ f ];
				s = HI.S.transition_speed;
			}
			return s;
		},

		// hover action
		_hover:        function()
		{
			HI.W.preview.hover( function()
			{
				if( !HI.S.edit_mode )
				{
					HI._hover_action( 1, 'image' );
					HI._hover_action( 1, 'overlay' );
					HI._hover_action( 1, 'buttons' );
					HI._hover_action( 1, 'content' );
				}
			}, function()
			{
				if( !HI.S.edit_mode )
				{
					HI._hover_action( 0, 'image' );
					HI._hover_action( 0, 'overlay' );
					HI._hover_action( 0, 'buttons' );
					HI._hover_action( 0, 'content' );
				}
			} );
		},

		// hover overlay action
		_hover_action: function( i, p )
		{
			if( HI.S[ p ].enable == false )
			{
				return false;
			}

			if( HI.S.edit_mode )
			{
				i = 1;
			}

			if( !HI.S.edit_mode && p == 'content' && HI.S.content.always )
			{
				i = 1;
			}

			var s;
			if( i )
			{
				HI.W[ p ].css( {
					display: 'block',
					opacity: HI.S[ p ].opacity
				} );

                if( p == 'image' )
                {
                    HI.W.image.css( 'borderRadius', HI.S.image.radius.stop + HI.S.image.radius_units );
                    HI.W.overlay.css( 'borderRadius', HI.S.image.radius.stop + HI.S.image.radius_units );
                    HI.W.content_div.css( 'borderRadius', HI.S.image.radius.stop + HI.S.image.radius_units );
                }

				s = HI._transform_get_perspective( p ) + ' ' + HI._transform_get_rotate( p, 'stop' ) + ' ' + HI._transform_get_scale( p, 'stop' ) + ' ' + HI._transform_get_slide_stop( p );

				HI._set_tranform( HI.W[ p ], s.trim() );
			}
			else
			{
				if( !HI.S.edit_mode )
				{
					var o = 0;
					if( HI.S[ p ].slide && !HI.S[ p ].fade )
					{
						p == 'buttons' ? o = 1 : o = HI.S[ p ].opacity;
					}
					if( p == 'image' )
					{
						o = 1;
                        HI.W.image.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
                        HI.W.overlay.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
                        HI.W.content_div.css( 'borderRadius', HI.S.image.radius.start + HI.S.image.radius_units );
					}
					HI.W[ p ].css( { opacity: o } );
					s = HI._transform_get_perspective( p ) + ' ' + HI._transform_get_rotate( p, 'start' ) + ' ' + HI._transform_get_scale( p, 'start' ) + ' ' + HI._transform_get_slide_start( p );

					HI._set_tranform( HI.W[ p ], s.trim() );
				}
			}
		},

		_edit_mode: function( t )
		{
			if( t )
			{
				HI._hover_action( 1, 'image' );
				HI._hover_action( 1, 'overlay' );
				HI._hover_action( 1, 'buttons' );
				HI._hover_action( 1, 'content' );
			}
			else
			{
				HI._hover_action( 0, 'image' );
				HI._hover_action( 0, 'overlay' );
				HI._hover_action( 0, 'buttons' );
				HI._hover_action( 0, 'content' );
			}
		},

		_css_transition: function( i )
		{
			var s = [];
			if( i == 'image' )
			{
				if( HI.S.image.slide || HI.S.image.rotate || HI.S.image.scale || HI.S.image.push )
				{
					s.push( 'transform' );
				}
                s.push( 'border' );
			}

			if( i == 'overlay' )
			{
				if( HI.S.overlay.fade )
				{
					s.push( 'opacity' )
				}
				if( HI.S.overlay.slide || HI.S.overlay.rotate || HI.S.overlay.scale )
				{
					s.push( 'transform' )
				}
                s.push( 'border' );
			}

			if( i == 'content' )
			{
				if( HI.S.content.fade )
				{
					s.push( 'opacity' )
				}
				if( HI.S.content.slide || HI.S.content.rotate || HI.S.content.scale )
				{
					s.push( 'transform' )
				}
                s.push( 'border' );
			}

			if( i == 'buttons' )
			{
				if( HI.S.buttons.type == 'border' || HI.S.buttons.type == 'background' )
				{
					s.push( 'border' );
				}
				if( HI.S.buttons.fade )
				{
					s.push( 'opacity' )
				}
				if( HI.S.buttons.slide || HI.S.buttons.rotate || HI.S.buttons.scale )
				{
					s.push( 'transform' )
				}
			}

			return s;
		},

		_prfxz: function( s )
		{
			var o = [];
			$.each( [ '', '-webkit-', '-moz-', '-o-' ], function(i,e){
				o[ i ] = e + s;
			});
			return o;
		},

		// set transform css prop
		_set_tranform:              function( E, S )
		{
			E.css( {
				'-webkit-transform': S,
				'-ms-transform':     S,
				'transform':         S
			} );
		},

		// set transition css prop
		_set_transition: function( E, S )
		{
			$.each( [ '', '-webkit-', '-moz-', '-o-' ], function(i,e){
				var NS = S.replace( /(transform)(.*)/, e + "$1$2" );
				E.css( e + 'transition', NS );
			});
		},

		// some css rules
		_css3:           function( i )
		{
			var p, pb;
			$.each( [
				'image',
				'overlay',
				'buttons',
				'content'
			], function( i, e )
			{
				p = [];
				pb = [];
				var transitions = HI._css_transition( e );

				$.each( transitions, function( i2, t )
				{
					if( t == 'transform' )
					{
						p.push( t + ' ' + HI._get_as( 1, e ) + 'ms ease 0s' );
					}
					if( t == 'opacity' )
					{
						p.push( t + ' ' + HI._get_as( HI.S[ e ].fade, e ) + 'ms ease 0s' );
					}

                    if( e == 'image' || e == 'overlay' || e == 'content' )
                    {
                        p.push( 'border-radius ' + HI._get_as( 1, 'image' ) + 'ms ease 0s' );
                    }

					// buttons
					if( e == 'buttons' )
					{
						if( t == 'border' )
						{
							pb.push( 'border-radius ' + HI._get_as( 1, 'buttons' ) + 'ms ease 0s' );
						}
						pb.push( 'opacity ' + HI._get_as( 1, 'buttons' ) + 'ms ease 0s' );
						HI._set_transition( HI.W.buttons_a, pb.join( ',' ) );
					}

				} );

				HI._set_transition( HI.W[ e ], p.join( ',' ) );
			} );
		},

		// checks is ON
		_is_on:          function( e )
		{
			if( e.val() == 'on' )
			{
				return true;
			}
			return false;
		},

		// get slide start pos
		_slide_pos:      function( G )
		{
			var t = 0, l = 0;

			if( G >= 0 && G <= 45 )
			{
				l = Math.ceil( G * 2.222 );
				t = -100;
			}
			if( G >= 46 && G <= 135 )
			{
				l = 100;
				t = -( 100 - Math.ceil( ( G - 45 ) * 2.222 ) );
			}
			if( G >= 136 && G <= 225 )
			{
				l = 100 - Math.ceil( ( G - 135 ) * 2.222 );
				t = 100;
			}
			if( G >= 226 && G <= 315 )
			{
				l = -100;
				t = 100 - Math.ceil( ( G - 225 ) * 2.222 );
			}
			if( G >= 316 && G <= 360 )
			{
				l = -100 + Math.ceil( ( G - 315 ) * 2.222 );
				t = -100;
			}
			return [
				t + '%',
				l + '%'
			];
		},

		_set_wrapper_prop: function( data )
		{
			// overflow
			HI.C.wrapper_overflow.prop( 'checked', false ).parent().removeClass( 'active' );
			HI.C.wrapper_overflow.filter( '[value="' + data.overflow + '"]' ).prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' );

			// background
			var b = HI._rgb2hex( data.background );
			HI.C.wrapper_background.minicolors( 'value', b.hex );
			HI.C.wrapper_background.minicolors( 'opacity', b.opacity );
		},

		_set_enable: function( ctrl, val )
		{
			ctrl.prop( 'checked', false ).parent().removeClass( 'active' );
			val
				? ctrl.filter( '[value="on"]' ).prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' )
				: ctrl.filter( '[value="off"]' ).prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' );
		},

		_set_transform_prop: function( data, el )
		{
			$.each( [
				'start',
				'stop'
			], function( i, e )
			{
				HI.C[ el ].rotate_grad_x.eq( i ).val( data.rotate_grad_x[ e ] ).trigger( 'change' );
				HI.C[ el ].rotate_grad_y.eq( i ).val( data.rotate_grad_y[ e ] ).trigger( 'change' );
				HI.C[ el ].rotate_grad_z.eq( i ).val( data.rotate_grad_z[ e ] ).trigger( 'change' );
				HI.C[ el ].scale_percents.eq( i ).val( data.scale_percents[ e ] ).trigger( 'change' );
			} );

			//perspective
			HI.C[ el ].perspective.val( data.perspective ).trigger( 'change' );

			HI.C[ el ].origin.siblings( '.active' ).removeClass( 'active btn-primary' ).addClass( 'btn-default' );
			HI.C[ el ].origin.parent().find( '.btn' ).filter( '[value="' + data.origin + '"]' ).addClass( 'active btn-primary' ).removeClass( 'btn-default' );
			HI.C[ el ].origin.val( data.origin ).trigger( 'change' );
		},

		_set_image_prop: function( data )
		{
			// rotate
			HI._set_enable( HI.C.I.rotate_enable, data.rotate );

			// push
			HI._set_enable( HI.C.I.push_enable, data.push );

			// scale
			HI._set_enable( HI.C.I.scale_enable, data.scale );

			// transform
			HI._set_transform_prop( data, 'I' );

            // radius
            $.each( [
                'start',
                'stop'
            ], function( i, e )
            {
                var r = 0;
                if(typeof data.radius !== 'undefined'){
                    r = data.radius[ e ];
                };

                HI.C.I.radius.eq( i ).val( r ).trigger( 'change' );
            } );
		},

		_set_overlay_prop: function( data )
		{
			// enable
			HI._set_enable( HI.C.O.enable, data.enable );

			// rotate
			HI._set_enable( HI.C.O.rotate_enable, data.rotate );

			// scale
			HI._set_enable( HI.C.O.scale_enable, data.scale );

			// fade
			HI._set_enable( HI.C.O.fade_enable, data.fade );

			// slide
			HI._set_enable( HI.C.O.slide_enable, data.slide );

			// transform
			HI._set_transform_prop( data, 'O' );

			//slide direction
			HI.C.O.slide_direction.val( data.slide_direction ).trigger( 'change' );

			// background
			var b = HI._rgb2hex( data.background );
			HI.C.O.background.minicolors( 'value', b.hex );
			HI.C.O.background.minicolors( 'opacity', b.opacity );
		},

		_set_buttons_prop: function( data )
		{
			// enable
			HI._set_enable( HI.C.B.enable, data.enable );

			// pphoto
			HI._set_enable( HI.C.B.pphoto, data.pphoto );

			// rotate
			HI._set_enable( HI.C.B.rotate_enable, data.rotate );

			// scale
			HI._set_enable( HI.C.B.scale_enable, data.scale );

			// fade
			HI._set_enable( HI.C.B.fade_enable, data.fade );

			// slide
			HI._set_enable( HI.C.B.slide_enable, data.slide );

			// transform
			HI._set_transform_prop( data, 'B' );

			//slide direction
			HI.C.B.slide_direction.val( data.slide_direction ).trigger( 'change' );

			// buttons set
			HI.C.B.set.each( function( i, e )
			{
				var ie = $( e );
				data.set[ ie.val() ] ? ie.prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' ) : ie.prop( 'checked', false ).trigger( 'change' ).parent().removeClass( 'active' );
			} );

			// enable
			HI._set_enable( HI.C.B.link_single, data.link_single );

			// type
			HI.C.B.type.prop( 'checked', false ).parent().removeClass( 'active' );
			HI.C.B.type.filter( '[value="' + data.type + '"]' ).prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' );

			// color
			HI.C.B.color.minicolors( 'value', data.color );

			// background
			HI.C.B.background.minicolors( 'value', data.background );

			// opacity
			HI.C.B.background.minicolors( 'opacity', data.opacity );

			// size
			HI.C.B.size.val( data.size ).trigger( 'change' );

			// radius
			$.each( [
				'start',
				'stop'
			], function( i, e )
			{
				HI.C.B.radius.eq( i ).val( data.radius[ e ] ).trigger( 'change' );
			} );

		},

		_set_content_prop: function( data )
		{
			// enable
			HI._set_enable( HI.C.C.enable, data.enable );

			// always
			HI._set_enable( HI.C.C.always, data.always );

			// rotate
			HI._set_enable( HI.C.C.rotate_enable, data.rotate );

			// scale
			HI._set_enable( HI.C.C.scale_enable, data.scale );

			// fade
			HI._set_enable( HI.C.C.fade_enable, data.fade );

			// slide
			HI._set_enable( HI.C.C.slide_enable, data.slide );

			// transform
			HI._set_transform_prop( data, 'C' );

			//slide direction
			HI.C.C.slide_direction.val( data.slide_direction ).trigger( 'change' );

			// enable_parts
			HI.C.C.enable_parts.each( function( i, e )
			{
				var ie = $( e );
				data.enable_parts[ ie.val() ] ? ie.prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' ) : ie.prop( 'checked', false ).trigger( 'change' ).parent().removeClass( 'active' );
			} );

			// background
			var b = HI._rgb2hex( data.background );
			HI.C.C.background.minicolors( 'value', b.hex );
			HI.C.C.background.minicolors( 'opacity', b.opacity );

			// partial
			HI.C.C.type.prop( 'checked', false ).parent().removeClass( 'active' );
			HI.C.C.type.filter( '[value="' + data.partial + '"]' ).prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' );

			// title_type
			HI.C.C.title_type.prop( 'checked', false ).parent().removeClass( 'active' );
			HI.C.C.title_type.filter( '[value="' + data.title_type + '"]' ).prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' );

			// partial_size
			HI.C.C.partial_size.val( data.partial_size ).trigger( 'change' );

			// partial_position
			HI.C.C.partial_position.prop( 'checked', false ).parent().removeClass( 'active' );
			HI.C.C.partial_position.filter( '[value="' + data.partial_position + '"]' ).prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' );

			// content margin
			HI.C.C.margin.val( data.margin ).trigger( 'change' );

			// content align
			HI.C.C.align.prop( 'checked', false ).parent().removeClass( 'active' );
			HI.C.C.align.filter( '[value="' + data.align + '"]' ).prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' );

			// shares_enable
			HI.C.C.shares_enable.each( function( i, e )
			{
				var ie = $( e );
				data.shares_enable[ ie.val() ] ? ie.prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' ) : ie.prop( 'checked', false ).trigger( 'change' ).parent().removeClass( 'active' );
			} );

			// shares_radius
			HI.C.C.shares_radius.val( data.typo.shares.radius ).trigger( 'change' );

			/* TYTLE */
			// size
			HI.C.C.title_font_size.val( data.typo.title.size ).trigger( 'change' );

			// color
			HI.C.C.title_color.minicolors( 'value', data.typo.title.color );

			// title_font_style
			HI.C.C.title_font_style.each( function( i, e )
			{
				var ie = $( e );
				var iv = ie.val();
				iv == data.typo.title[ iv ] ? ie.prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' ) : ie.prop( 'checked', false ).trigger( 'change' ).parent().removeClass( 'active' );
			} );

			/* EXCERPT */
			// length
			HI.C.C.excerpt_length.val( data.typo.excerpt.length ).trigger( 'change' );

			// size
			HI.C.C.excerpt_font_size.val( data.typo.excerpt.size ).trigger( 'change' );

			// color
			HI.C.C.excerpt_color.minicolors( 'value', data.typo.excerpt.color );

			// excerpt_font_style
			HI.C.C.excerpt_font_style.each( function( i, e )
			{
				var ie = $( e );
				var iv = ie.val();
				iv == data.typo.excerpt[ iv ] ? ie.prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' ) : ie.prop( 'checked', false ).trigger( 'change' ).parent().removeClass( 'active' );
			} );

			/* CATEGORIES */
			// size
			HI.C.C.categories_font_size.val( data.typo.categories.size ).trigger( 'change' );

			// color
			HI.C.C.categories_color.minicolors( 'value', data.typo.categories.color );

			// categories_font_style
			HI.C.C.categories_font_style.each( function( i, e )
			{
				var ie = $( e );
				var iv = ie.val();
				iv == data.typo.categories[ iv ] ? ie.prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' ) : ie.prop( 'checked', false ).trigger( 'change' ).parent().removeClass( 'active' );
			} );

			/* SHARES */
			// size
			HI.C.C.shares_font_size.val( data.typo.shares.size ).trigger( 'change' );

			// color
			HI.C.C.shares_color.minicolors( 'value', data.typo.shares.color );

			// shares_font_style
			HI.C.C.shares_font_style.each( function( i, e )
			{
				var ie = $( e );
				var iv = ie.val();
				iv == data.typo.shares[ iv ] ? ie.prop( 'checked', true ).trigger( 'change' ).parent().addClass( 'active' ) : ie.prop( 'checked', false ).trigger( 'change' ).parent().removeClass( 'active' );
			} );
		},

		_set_other: function( data )
		{
			$( '#hi-tpl-id' ).val( data.tplid );

			data.tplid == '' ? $( '#hi-tpl-id-title' ).empty().text( $( '#hi-tpl-id-title' ).data( 'text' ) ) : $( '#hi-tpl-id-title' ).empty().text( ' ( ID: ' + data.tplid + ')' );

			HI.S.tplid = data.tplid;

			$( '#hi-tpl-name' ).val( data.tplname );
			$( '#hi-tpl-name-div' ).editable( 'setValue', data.tplname );
			HI.C.transition_speed.val( data.transition_speed ).trigger( 'change' )
			$.each( data.assigned, function( i, v )
			{
				var el = HI.C.tpl_assign.filter( '.hi-' + i );
				if( el.length )
				{
					if( el[ 0 ].nodeName == 'INPUT' )
					{
						el.prop( 'checked', true );
					}
					if( el[ 0 ].nodeName == 'TEXTAREA' )
					{
						el.empty().text( v );
					}
				}
			} );
			HI.C.tpl_assign.trigger( 'change' );

			HI.C.mode_buttons.removeAttr( 'checked' ).parent().removeClass( 'active' );
			data.edit_mode ? HI.C.mode_buttons.filter( '#hi-mode-edit' ).attr( 'checked', 'checked' ).trigger( 'change' ).parent().addClass( 'active' ) : HI.C.mode_buttons.filter( '#hi-mode-view' ).attr( 'checked', 'checked' ).trigger( 'change' ).parent().addClass( 'active' );

			$.each( [
				'overlay',
				'buttons',
				'content'
			], function( i, e )
			{
				store.set( 'index-hi-options-' + e + '-tabs', 0 );
				$( '#hi-options-' + e + '-tabs a:first' ).tab( 'show' );
			} );

		},

		_rgb2hex: function( rgb )
		{
			var d = rgb.replace( 'rgba', '' ).replace( '(', '' ).replace( ')', '' ).split( ',' );
			var hex = [
				parseInt( d[ 0 ] ).toString( 16 ),
				parseInt( d[ 1 ] ).toString( 16 ),
				parseInt( d[ 2 ] ).toString( 16 )
			];
			$.each( hex, function( nr, val )
			{
				if( val.length === 1 )
				{
					hex[ nr ] = '0' + val;
				}
			} );
			return {
				hex:     '#' + hex.join( '' ),
				opacity: d[ 3 ]
			};
		},

		_check_response: function( r )
		{
			if( r == 'no_rights' )
			{
				alert( 'You are using Hover Effects Builder in DEMO mode. Save Changes, Delete, Clone options are not available in DEMO.' );
				return false;
			}

			if( r == 'error' )
			{
				return false;
			}

			return true;
		},

		_save: function()
		{
			HI.C.save_btn.on( 'click', function( e )
			{
				e.preventDefault();
			} );
		},

		_ls: function()
		{
			var id = $( '#hi-tpl-id' );
			var name = $( '#hi-tpl-name' );
			setInterval( function()
			{
				store.set( 'HIS', {
					'id':   id.val(),
					'name': name.val(),
					'data': HI.S
				} );
			}, 2000 );
		},

		_loadData: function( data )
		{
			HI._set_wrapper_prop( data.wrapper );
			HI._set_image_prop( data.image );
			HI._set_overlay_prop( data.overlay );
			HI._set_buttons_prop( data.buttons );
			HI._set_content_prop( data.content );
			HI._set_other( data );
		},

		_hi: function()
		{
			this._mode();
			this._enable();
			this._enable_parts();
			this._overflow();
			this._buttons_type_init();
			this._background();
			this._color();
			this._size();
			this._margin();
			this._align();
			this._typo();
			this._radius();
			this._fade();
			this._transform();
			this._partial();
			this._hover();
			this._css3();
			this._save();
			this._psize();
			this._ls();
		},

		_after_load: function()
		{
			//HI.C.C.excerpt_length.trigger('change');
			setTimeout( function(){
				HI._clamp( HI.W.content_parts.excerpt, HI.S.content.typo.excerpt.length + 1 );
				HI._clamp( HI.W.content_parts.excerpt, HI.S.content.typo.excerpt.length );
			}, 1000 );

			if( $( '#hi-templates-tab' ).hasClass( 'active' ) )
			{
				hi_fix_tpls_clamp();
			}
		}
	};
	HI._hi();

	HI._after_load();

	/*
	 * Sortable tpls
	 * */
	var group = $( "#hi-tpls" ).sortable( {
		containerSelector: 'div#hi-tpls',
		itemSelector:      '.hi-tpl-item',
		delay:             100,
		placeholder:       '<div class="hi-tpl-item ph"><div class="hi-tpl-frame"></div></div>',
		onDrop:            function( item, container, _super )
		{
			hi_change_tpls_order( group );
			_super( item, container )
		}
	} );

	/*
	 * Change tpls order
	 * */
	function hi_change_tpls_order( group )
	{
		var ser = group.sortable( "serialize" );

		if( ser.length > 0 )
		{
			var data = group.sortable( "serialize" ).get( 0 );
			var post = {
				type:     'save-order',
				action:   'hi_ajax_post_action',
				security: $( '#security' ).val(),
				data:     JSON.stringify( data )
			}

			$.post( ajaxurl, post, function( r )
			{
			} );
		}
	}

	/*
	 * Edit Template
	 * */
	$( '#hi-templates-tab' ).on( 'click', '.hi-tpl-edit', function()
	{
		$( '#hi-tabs-main a[href="#hi-editor-tab"]' ).tab( 'show' );
		var data = $.parseJSON( $( $( this ).data( 'tpl' ) ).text() );
		HI._loadData( data );
	} );

	/*
	 * Add New TPL
	 * */
	$( '.hi-add-new' ).on( 'click', function()
	{
		$( '#hi-tabs-main a[href="#hi-editor-tab"]' ).tab( 'show' );
		hi_reset_builder();
	} );

	/*
	* Reset builder to default state
	* */
	function hi_reset_builder()
	{
		var data = $.parseJSON( $( '#hi-def-tpl' ).text() );
		$( '#hi-tpl-id' ).val( '' );
		$( '#hi-tpl-id-title' ).empty().text( $( '#hi-tpl-id-title' ).data( 'text' ) );
		$( '.hi-preview-sizes' ).find( 'option:selected' ).removeAttr( 'selected' );
		$( '.hi-preview-sizes' ).trigger( 'change' );
		HI._loadData( data );
	}

	/*
	 * Init tabs
	 * */
	$( '.hi-nav-tabs' ).each( function()
	{
		var id = this.id, el = $( this ), li = el.find( ' > li' ), a = el.find( ' > li > a' ), av = store.get( 'index-' + id );
		av ? '' : av = 0;
		a.eq( av ).tab( 'show' );
		li.removeClass( 'active' ).eq( av ).addClass( 'active' );
		a.on( 'click.' + id, function( e )
		{
			var el = $( this );
			el.tab( 'show' );
			store.set( 'index-' + id, el.parent().index() );
			e.preventDefault();
		} )
	} );


	/*
	$('a[href="#hi-editor-tab"]').on('shown.bs.tab', function (e) {
		// IE Fixes
		HI._check_clamp( );
	})
	/**/






	$('a[href="#hi-templates-tab"]').on('shown.bs.tab', function (e) {
		hi_fix_tpls_clamp();
	});

	function hi_fix_tpls_clamp()
	{
		var exerpts = $( '#hi-templates-tab .hi-content-excerpt' );
		if( exerpts.length )
		{
			exerpts.each( function(){
				var e = $(this);
				var c = e.data('hc');
				if( typeof c != 'undefined' && c == 0 )
				{
					$clamp( e.get( 0 ), { clamp: e.data( 'clamp' ) } );
				}
				e.data('hc', 1);
			} );
		}
	}
	hi_fix_tpls_clamp();

	/*
	 * hide / Show trigger
	 * */
	$( '.hi-trigger' ).each( function( i, e )
	{
		var block = $( e ), conditions = triggerTogler( block, false );

		$.each( conditions, function( s, v )
		{
			var condition = v.split( '=' ), option = $( '.' + condition[ 0 ] ), eventName = 'change.' + condition.join( '' ).hiReplaceAll( '-', '' ) + Math.random();
			option.off( eventName ).on( eventName, function()
			{
				triggerTogler( block, true );
			} );
		} );
	} );

	/*
	 * Trigger logic
	 * */
	function triggerTogler( block, slide )
	{
		var conditions = block.data( 'showif' ).split( '||' ), fire = [];

		$.each( conditions, function( s, v )
		{
			var condition = v.split( '=' ), option = $( '.' + condition[ 0 ] );

			if( option.length > 0 )
			{
				if( option[ 0 ].type == 'radio' )
				{
					option.filter( ':checked' ).val() == condition[ 1 ] ? fire.push( 1 ) : fire.push( 0 );
				}

				if( option[ 0 ].type == 'checkbox' )
				{
					option.filter( '[id="' + condition[ 0 ] + '-' + condition[ 1 ] + '"]' ).is( ":checked" ) ? fire.push( 1 ) : fire.push( 0 );
				}
			}
		} );

		if( slide )
		{
			Math.max.apply( Math, fire ) == 1 ? block.slideDown( 200 ) : block.slideUp( 200 );
		}
		else
		{
			Math.max.apply( Math, fire ) == 1 ? block.show() : block.hide();
		}

		return conditions;
	}

	/*
	 * Touch spinner init
	 * */
	$( '.hi-touchspin' ).each( function()
	{
		var input = $( this );
		var data = $.extend( {
			prefix:  '',
			postfix: '',
			step:    1
		}, input.data() );
		input.TouchSpin( data );
		input.on( 'change.s', function( a, b )
		{
			var i = $( this );
			if( i.val() == '' )
			{
				data.min < 0 ? i.val( 0 ) : i.val( data.min );
				i.trigger( 'change' );
			}
		} );
	} );

	/*
	 * "Direction" control - arrow rotate
	 * */
	$( '.hi-control-direction' ).each( function()
	{
		var el = $( this );
		var i = el.find( 'input.hi-touchspin' );
		var a = el.find( 'i.hi-dir-icon' );
		var val = i.val();
		a.css( 'transform', 'rotate(' + val + 'deg)' );
		i.on( 'change', function()
		{
			a.css( 'transform', 'rotate(' + $( this ).val() + 'deg)' );
		} );
	} );

	/*
	 * Origin control init
	 * */
	$( '.hi-control-origin span.btn' ).on( 'click', function( e )
	{
		e.preventDefault();
		var el = $( this );
		el.addClass( 'active btn-primary' ).siblings( '.active' ).removeClass( 'active' ).removeClass( 'btn-primary' ).addClass( 'btn-default' );
		el.parent().find( 'input' ).val( el.attr( 'value' ) ).trigger( 'change' );
	} );

	/*
	 * Set 'active' btn group elements
	 * */
	$( '.btn-group label' ).each( function()
	{
		var el = $( this );
		if( el.find( 'input' ).is( ':checked' ) )
		{
			el.addClass( 'active' );
		}
	} );

	/*
	 * TPLs share hover color
	 * */
	$( document ).on( 'mouseenter', '.hi-content-share a', function()
	{
		$( this ).css( 'background', $( this ).data( 'color' ) );
	} ).on( 'mouseleave', '.hi-content-share a', function()
	{
		$( this ).css( 'background', 'transparent' );
	} );

	/*
	 * Init UI color picker (minicolors)
	 * */
	$( '.hi-cp' ).each( function( i, e )
	{
		var input = $( e );
		var opacityValue = input.data( 'opacity' );
		var opacity;
		typeof opacityValue == 'undefined' ? opacity = false : opacity = true;

		input.minicolors( {
			change:  function( h, o )
			{
				$( $( this ).data( 'oi' ) ).val( o );
			},
			theme:   'bootstrap',
			opacity: opacity
		} );
	} );

	/*
	 * X-editable
	 * */
	/* Tpl name */
	var tplNameInput = $( '#hi-tpl-name' );
	var tplNameDiv = $( '#hi-tpl-name-div' );

	$.fn.editableform.buttons = '<button type="submit" class="btn btn-primary editable-submit"><i class="hi-fb-ok"></i></button><button type="button" class="btn btn-default editable-cancel"><i class="hi-fb-close"></i></button>';
	tplNameDiv.editable( {
		mode:       'inline',
		inputclass: 'form-control',
		emptyclass: '',
		success: function( response, newValue )
		{
			newValue == '' ? tplNameInput.val( tplNameDiv.data( 'emptytext' ) ) : tplNameInput.val( newValue );
		}
	} );
	hi_xEdit( $( '#hi-tpls' ) );

	function hi_xEdit( elem )
	{
		elem.find( 'a.hi-tpl-name' ).editable( {
			mode:       'inline',
			emptyclass: '',
			init:       function()
			{
			},
			success:    function( response, newValue )
			{
				var current_id = $( '#hi-tpl-id' ).val();
				var tpl_id = $( this ).data( 'id' );

				var d = $.parseJSON( $( '#data-' + tpl_id ).text() );
				d.tplname = newValue;
				$( '#data-' + tpl_id ).empty().text( JSON.stringify( d ) );

				if( current_id == tpl_id )
				{
					tplNameInput.val( newValue );
					tplNameDiv.editable( 'setValue', newValue );
				}

				hi_refresh_tpl_name( tpl_id, newValue );

				var post = {
					type:     'rename',
					action:   'hi_ajax_post_action',
					security: $( '#security' ).val(),
					id:       tpl_id,
					name:     newValue
				}

				$.post( ajaxurl, post, function( r )
				{
				} );
			}
		} ).on( 'shown', function( e, editable )
		{
			$( this ).siblings( '.hi-tpl-id-name' ).hide();
		} ).on( 'hidden', function( e, editable )
		{
			$( this ).siblings( '.hi-tpl-id-name' ).show();
		} );

	}

	/*
	* Refresh tpl name after rename
	* */
	function hi_refresh_tpl_name( id, name )
	{
		$( 'select.hi-tpl-assign option[value="' + id + '"]' ).text( name + ' ( id: ' + id + ' )' );
	}

	/*
	 * Remove template button
	 * */
	$( '#hi-templates-tab' ).on( 'click', '.hi-tpl-remove', function()
	{
		var button = $( this );
		var remove = confirm( button.data( 'confirm' ) );

		if( remove == true )
		{
			var name = button.data( 'tpl' );
			var tplId = name.replace( '#', '' );
			var nonce = $( '#security' ).val();

			button.addClass( 'hi-fb-refresh hi-spinner' );

			var post = {
				type:     'remove-tpl',
				action:   'hi_ajax_post_action',
				security: nonce,
				name:     tplId
			};

			$.post( ajaxurl, post, function( r )
			{
				if( HI._check_response( r ) == false )
				{
					button.removeClass( 'hi-fb-refresh hi-spinner' );
					return false;
				}

				if( r == 1 )
				{
					$( '#hi-' + name.replace( '#', '' ) ).fadeOut( '300', function()
					{
						$( this ).parent().remove();
					} );
					$( 'option[value="' + tplId + '"]' ).remove();

					if( $( '#hi-tpl-id' ).val() == tplId )
					{
						hi_reset_builder();
					}

					hi_change_tpls_order( $( "#hi-tpls" ) );
				}
				button.removeClass( 'hi-fb-refresh hi-spinner' );
			} );
		}
	} );


	/*
	 * Clone template button
	 * */
	$( '#hi-templates-tab' ).on( 'click', '.hi-tpl-copy', function( e )
	{
		e.preventDefault();

		var button = $( this );
		var parent = button.parents( '.hi-tpl-item' );

		var spinner = button.find( 'i' );
		var tplId = '';
		var tplName = button.data( 'name' );
		var tplData = $( button.data( 'tpl' ) ).text();

		var post = {
			type:     'save',
			action:   'hi_ajax_post_action',
			security: $( '#security' ).val(),
			data:     tplData,
			id:       tplId,
			name:     tplName
		}

		button.removeClass( 'hi-fb-copy' ).addClass( 'hi-fb-refresh hi-spinner' );

		$.post( ajaxurl, post, function( r )
		{
			if( HI._check_response( r ) == false )
			{
				button.removeClass( 'hi-fb-refresh hi-spinner' ).addClass( 'hi-fb-copy' );
				return false;
			}

			var resp = JSON.parse( r );

			if( resp.id )
			{
				$( '#hi-tpl-id' ).val( resp.id );
				$( '#hi-tpl-id-title' ).empty().text( ' ( ID: ' + resp.id + ')' );

				var tpls = $( '#hi-tpls' );
				var tpl = $( '#hi-' + resp.id )

				HI.S.tplid = resp.id;

				if( tpl.length )
				{
					tpl.parent().remove();
				}

				// appent tpl
				var new_tpl = $( resp.tpl );
				new_tpl.addClass( 'new-' + resp.id ).insertAfter( parent ).fadeOut( 0, function()
				{
					$( this ).fadeIn( 400 )
				} );

				var new_elem = $( '#hi-' + resp.id );
				if( new_elem.length )
				{
					var exerpt = new_elem.find( '.hi-content-excerpt' );
					if( exerpt.length )
					{
						exerpt.data( 'hc', exerpt.innerHeight() );
					}

					var view_btn = new_elem.find( '.hi-view-button' );
					if( view_btn.length )
					{
						hi_pphoto( view_btn );
					}

					hi_xEdit( new_elem );
				}

				// remove "no saves" message
				$( '.hi-no-saved-tpls' ).hide();

				//add to assifns selescs
				$( 'select.hi-tpl-assign' ).append( '<option value="' + resp.id + '">' + tplName + ' ( id: ' + resp.id + ' )</option>' );
			}

			hi_change_tpls_order( $( "#hi-tpls" ) );

			button.removeClass( 'hi-fb-refresh hi-spinner' ).addClass( 'hi-fb-copy' );
		} );
	} );


	/*
	* Save assign action
	* */
	$( '.hi-assign-save' ).on( 'click', function( e )
	{
		e.preventDefault();
		var button = $( this );
		var spinner = button.find( 'i' );

		button.attr( 'disabled', 'disabled' );
		spinner.removeClass( 'hide' );

		var data = {
			fi:       {},
			api:      {},
            ex:       {}
		};

		var ctrls = {
			fi:       $( '.hi-tpl-assign-fi' ),
			api:      $( '.hi-tpl-assign-api' ),
            ex:       $( '.hi-tpl-excludes' )
		};

		// fi
		ctrls.fi.each( function( i, e )
		{
			var el  = $( this );
			var key = el.data( 'key' );
			var val = el.val();

			if( val != '' )
			{
				data.fi[ key ] = val;
			}
		} );

		// api
		ctrls.api.each( function( i, e )
		{
			var el = $( this );
			var key = el.data( 'key' );
			var val = el.val();

			if( val != '' )
			{
				data.api[ key ] = val;
			}
		} );

        ctrls.ex.each( function( i, e )
        {
            var el = $( this );
            var key = 'hi-excludes';
            var val = el.val();
            var arr = val.split(',');
            data.ex[ key ] = arr;
        } );

		var post = {
			type:     'save-assigns',
			action:   'hi_ajax_post_action',
			security: $( '#security' ).val(),
			data:     JSON.stringify( data )
		}

		$.post( ajaxurl, post, function( r )
		{
			if( HI._check_response( r ) == false )
			{
				button.removeAttr( 'disabled' );
				spinner.addClass( 'hide' );
				return false;
			}

			button.removeAttr( 'disabled' );
			spinner.addClass( 'hide' );

			hi_assign_reload();
		} );
	} );

	/*
	* Reload assign on tpls tab
	* */
	function hi_assign_reload()
	{
		var post = {
			type:     'get-assigns',
			action:   'hi_ajax_post_action',
			security: $( '#security' ).val()
		}
		$.post( ajaxurl, post, function( r )
		{
			if( r != 'error' )
			{
				var data = JSON.parse( r );
				$.each( data, function( i, e ) {
					$( '#hi-' + i + ' .hi-tpl-assigned-info' ).replaceWith( e.html );
				} );
			}
		} );
	}

	/*
	* Go to assign tab
	* */
	$( document ).on( 'click', '.hi-assigned-link', function()
	{
		$( '#hi-tabs-main a[href="#hi-options-tab"]' ).tab( 'show' );
	} );

	/*
	* Load previous builder state
	* */
	var data = store.get( 'HIS' );
	if( data )
	{
		data.data.tplid = data.id;
		data.data.tplname = data.name;
		HI._loadData( data.data );
	}


	/*
	* init pretty photo
	* */
	function hi_pphoto( b )
	{
		if( b.hasClass( 'pphoto' ) )
		{
			b.prettyPhoto({
				social_tools: false
			});
		}
	}

 	$( '.hi-view-button' ).each( function()
	{
		hi_pphoto( $( this ) );
	} );
} );




