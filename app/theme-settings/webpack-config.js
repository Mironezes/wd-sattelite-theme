const path = require( 'path' );

const configuration = {
	entry: {
		'scripts': './src/index.js',
	},

	output: {
		filename: '[name].js',
		path: path.resolve( __dirname, 'assets' ),
	},
};



// Export the config object.
module.exports = configuration;