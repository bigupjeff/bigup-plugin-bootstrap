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

export { jsModule }
