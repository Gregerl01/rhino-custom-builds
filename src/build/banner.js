'use strict';

const pkg = require( '../../package.json' );
const year = new Date().getFullYear();

function getBanner( pluginFilename ) {
	return `/*!
 * Starter Theme${ pluginFilename ? ` ${ pluginFilename }` : '' } v${ pkg.version }
 * Copyright ${ year } ${ pkg.author }
 * Licensed under ${ pkg.license } (${ pkg.licenseUrl })
 */`;
}

module.exports = getBanner;
