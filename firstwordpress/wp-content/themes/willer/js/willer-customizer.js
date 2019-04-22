/**
 * willer-customizer.js
 *
 * author    Denis Franchi
 * package   Willer
 * version   1.1.2
 */

/* TABLE OF CONTENT
   1 - Site title
	 2 - Site description
	 3 - Header text color
     4 - Font-size logo
     5 - Height Footer
	 6 - Title Blog Slider Home page Willer
	 7 - Subtitle Blog Slider Home page Willer
*/



// Function Refresh
( function( $ ) {
	// 1 Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// 2 Site description
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// 3 Header text color
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


	wp.customize('willer_font_size_logo', function(control) {
		control.bind(function( controlValue ) {
			$('.willer-logo-header img').css('width', controlValue + 'px');
		});
	});

	// 5 Height Footer
	wp.customize('willer_height_footer', function(control) {
		control.bind(function( controlValue ) {
			$('.willer-footer-effect-parallax').css('height', controlValue + 'px');
		});
	});

	// 5 Height Footer
	wp.customize('willer_height_footer', function(control) {
		control.bind(function( controlValue ) {
			$('.willer-contact').css('margin-bottom', controlValue + 'px');
		});
	});

	// 6 Title Blog Slider Home page Willer
	wp.customize( 'willer_title_blog_slider', function( value ) {
		value.bind( function( newval ) {
			$( 'h2.title-willer-blog' ).html( newval );

		} );
	} );

	// 7 Subtitle Blog Slider Home page Willer
	wp.customize( 'willer_subtitle_blog_slider', function( value ) {
		value.bind( function( newval ) {
			$( 'h3.subtitle-willer-blog' ).html( newval );

		} );
	} );

// End Function Refresh
} )( jQuery );






