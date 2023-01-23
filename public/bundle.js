/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};

;// CONCATENATED MODULE: ./src/js/js-module.js
/**
 * Bigup Plugin - JS Module.
 *
 * Description of the JS module.
 *
 * @package bigup_plugin_bootstrap
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2023, Jefferson Real
 * @license GPL3+
 * @link https://jeffersonreal.uk
 */

const jsModule = () => {

    /**
     * Initialise the module.
     */
	function initialise() {
		console.log( exampleFunction() )
    }


    /**
     * Example function.
     */
    const exampleFunction = () => {
        document.querySelector( '#jsTest' ).classList.add( 'jsLoaded' )
    }


    /**
     * Call initialise on 'doc ready'.
     */
    const docReady = setInterval( () => {
        if ( document.readyState === 'complete' ) {
            clearInterval( docReady )
			initialise()
        }
    }, 50 )
}



;// CONCATENATED MODULE: ./src/index.js
/**
 * Index file for all JS modules.
 *
 * This file is used to import all JS modules and stylesheets to provide an entry point for bundling.
 *
 * @link https://metabox.io/modernizing-javascript-code-in-wordpress/
 */





jsModule()

/******/ })()
;