<?php
namespace Bigup\Plugin_Bootstrap;

/**
 * Bigup Plugin Bootstrap - Utility Functions.
 *
 * A class of utility functions for use throughout the plugin.
 *
 * @package bigup_plugin_bootstrap
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2023, Jefferson Real
 * @license GPL3+
 * @link https://jeffersonreal.uk
 */
class Utilities {


	/**
	 * Include With Variables.
	 *
	 * This function allows the passing of variables to template parts when they are included in
	 * the calling function. This is useful for populating templates with data.
	 *
	 * Example of passing a title from index.php to header.php:
	 *
	 * index.php:
	 * $title = includeWithVariables( 'h1-template.php', array( 'title' => 'Title Text' ) );
	 *
	 * header.php:
	 * return '<h1>' . $title . '</h1>';
	 */
	public static function include_with_variables( $file_path, $variables = array() ) {
		$output = null;
		if ( file_exists( $file_path ) ) {

			// Extract variables to local namespace.
			extract( $variables );

			// Start output buffering.
			ob_start();

			// Include the template file.
			include $file_path;

			// End buffering and return its contents.
			$output = ob_get_clean();

		}
		return $output;
	}
}
