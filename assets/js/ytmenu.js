var YTMenu = (function() {

	function init() {
		
		[].slice.call( document.querySelectorAll( '.qb-menu' ) ).forEach( function( el, i ) {

			var trigger = el.querySelector( 'div.qb-trigger' ),
				icon = trigger.querySelector( 'span.qb-icon-menu' ),
				open = false;

			trigger.addEventListener( 'click', function( event ) {
				if( !open ) {
					el.className += ' qb-menu-open';
					open = true;
				}
			}, false );

			icon.addEventListener( 'click', function( event ) {
				if( open ) {
					event.stopPropagation();
					open = false;
					el.className = el.className.replace(/\bqb-menu-open\b/,'');
					return false;
				}
			}, false );

		} );

	}

	init();

})();