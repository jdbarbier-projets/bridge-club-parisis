/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {
	var api = wp.customize;

	// Site title.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	});

	// Site tagline.
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Add custom-background-image body class when background image is added.
	api( 'background_image', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).toggleClass( 'custom-background-image', '' !== to );
		} );
	});

	api( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			$('#masthead, #masthead a').css('color',to);
		} );
	});

	// Canary colors.
	api( 'header_background_color', function( value ) {
		value.bind( function( color ) {
			$('#masthead').css('background-color',color);
		} );
	});
	api( 'wt_bg_color', function( value ) {
		value.bind( function( color ) {
			$('#secondary.sidebar .widget .widget-title').css('background-color',color);
		});
	});
	api( 'footer_bg_color', function( value ) {
		value.bind( function( color ) {
			$('#colophon').css('background-color',color);
		});
	});
	api( 'bt_bg_color', function( value ) {
		value.bind( function( color ) {
			$('button,input[type="submit"], input[type="reset"], .button').css('background-color',color);
		});
	});

	api( 'wt_color', function( value ) {
		value.bind( function( color ) {
			$('#secondary.sidebar .widget .widget-title').css('color',color);
		});
	});

	api( 'bt_color', function( value ) {
		value.bind( function( color ) {
			$('button,input[type="submit"], input[type="reset"], .button').css('color',color);
		});
	});
	api( 'link_color', function( value ) {
		value.bind( function( color ) {
			$('#content a').css('color',color);
		});
	});

	api( 'footer_color', function( value ) {
		value.bind( function( color ) {
			$('#colophon, #colophon a').css('color',color);
		});
	});

	api( 'footer_text', function( value ) {
		value.bind( function( text ) {
			$('#colophon div.site-info').html(text);
		});
	});

} )( jQuery );