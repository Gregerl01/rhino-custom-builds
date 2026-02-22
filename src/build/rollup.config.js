'use strict';

/**
 * External dependencies
 */
const path = require( 'path' );
const { babel } = require( '@rollup/plugin-babel' );
const { nodeResolve } = require( '@rollup/plugin-node-resolve' );
const commonjs = require( '@rollup/plugin-commonjs' );
const multi = require( '@rollup/plugin-multi-entry' );
const replace = require( '@rollup/plugin-replace' );

/**
 * Internal dependencies
 */
const banner = require( './banner.js' );
const babelConfig = require( './babel.config' );

const globals = {
	jquery: 'jQuery',
	'@popperjs/core': 'Popper',
};

const external = [ 'jquery' ];

const plugins = [
	babel( {
		presets: babelConfig.presets,
		browserslistEnv: 'bs5',
		babelHelpers: 'bundled',
	} ),
	replace( {
		'process.env.NODE_ENV': '"production"',
		preventAssignment: true,
	} ),
	nodeResolve(),
	commonjs(),
	multi(),
];

module.exports = {
	input: [
		path.resolve( __dirname, '../js/theme.js' ),
	],
	output: [
		{
			banner: banner( '' ),
			file: path.resolve( __dirname, '../../js/theme.js' ),
			format: 'umd',
			globals,
			name: 'starterTheme',
		},
		{
			banner: banner( '' ),
			file: path.resolve( __dirname, '../../js/theme.min.js' ),
			format: 'umd',
			globals,
			name: 'starterTheme',
		},
	],
	external,
	plugins,
};
