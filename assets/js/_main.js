/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

( function ( $ ) {
	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var Roots = {
		// All pages
		common: {
			init: function () {

				// $( function () {
				// 	function facebook_photo_load() {
				// 		var e = "http://graph.facebook.com/v1.0/742005059173576/photos?pretty=1&limit=100";

				// 		$.ajax( {
				// 			url: e
				// 		} )
				// 			.done( function ( e ) {
				// 				var randum = Math.floor( Math.random() * 80 );
				// 				var target = $( "#livestage .slider img" );
				// 				var large_picture = e.data[ randum ].images[ 0 ].source;
				// 				var small_pricture = e.data[ randum ].images[ 2 ].source;
				// 			  target.animate({
				// 			    opacity: 0,
				// 			  }, 2000, function() {
				// 			    $(this).remove();
				// 					$( "#livestage .slider" )
				// 						.append( '<img src="' + large_picture + '" alt="写真 ' + randum + '" class="img-responsive slider-image" />' );
				// 				  });
				// 				setTimeout( facebook_photo_load, 6000 );
				// 			} )
				// 	}
				// 	facebook_photo_load();

				// } );
			}
		},
		// Home page
		home: {
			init: function () {
				var timer = false;

				var resizeCanvas = function(){
	    		var window_width = $(window).width();
	    		var window_innerWidth = 1920 - window_width;
	    		if ( window_width >= 900 && window_width <= 1920  ) {
	    			var mlwidth = 0 - window_innerWidth/1.8;
						$("#canvas").css( 'margin-left', mlwidth );
					}
				}
				resizeCanvas();
				$(window).resize(function() {
				    if (timer !== false) {
				        clearTimeout(timer);
				    }
				    timer = setTimeout(function() {
				    	resizeCanvas();
				    }, 200);
				});
			}
		},
		// About us page, note the change from about-us to about_us.
		about_us: {
			init: function () {
				// JavaScript to be fired on the about us page
			}
		}
	};

	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire: function ( func, funcname, args ) {
			var namespace = Roots;
			funcname = ( funcname === undefined ) ? 'init' : funcname;
			if ( func !== '' && namespace[ func ] && typeof namespace[ func ][ funcname ] === 'function' ) {
				namespace[ func ][ funcname ]( args );
			}
		},
		loadEvents: function () {
			UTIL.fire( 'common' );

			$.each( document.body.className.replace( /-/g, '_' )
				.split( /\s+/ ), function ( i, classnm ) {
					UTIL.fire( classnm );
				} );
		}
	};

	$( document )
		.ready( UTIL.loadEvents );

} )( jQuery ); // Fully reference jQuery after this point.
