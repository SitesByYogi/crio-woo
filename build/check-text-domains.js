const textdomain = require( './modules/wp-textdomain-lint.js' );

textdomain( 'src/**/*.php', {
	domain: [ 'crio' ],
	fix: true,
	force: true
} );

textdomain( 'boldgrid-theme-framework/**/*.php', {
	domain: [ 'crio' ],
	fix: true,
	force: true
} );
