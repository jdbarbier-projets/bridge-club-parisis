/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.logo a' ).text( to );
			$( '.banner-txt-section h1' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.logo a' ).attr( 'title', to );
			$( '.banner-txt-section p' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			// console.log(to);
			if ( 'blank' == to ) {

				$( '.logo a' ).hide();
				$( '.banner-txt-section h1' ).hide();
				$( '.banner-txt-section p' ).hide();
			}
			if ( 'blank' != to ) {

				$( '.logo a, .wp-menu > li > a' ).css( {
					'color': to
				} );
				$( '.logo a' ).show();
				$( '.banner-txt-section h1' ).show();
				$( '.banner-txt-section p' ).show();

			} else {
				$( '.logo a, .wp-menu > li > a' ).css( {
					'color': '#4a88c2'
				} );
			}
		} );
	} );
} )( jQuery );
