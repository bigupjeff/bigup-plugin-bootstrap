<?php
namespace Bigup\Plugin_Bootstrap;

/**
 * Bigup Plugin Bootstrap - Shortcode.
 *
 * This class handles all aspects of shortcode usage.
 *
 * @package bigup_plugin_bootstrap
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2023, Jefferson Real
 * @license GPL3+
 * @link https://jeffersonreal.uk
 */

class Shortcode {


	/**
	 * This function is called by WordPress when the shortcode is used.
	 */
	public static function display_shortcode( $attributes ) {

		if ( empty( $attributes ) ) {
			$attributes = array(
				'title' => 'Fallback Title (no title passed with shortcode)',
			);
		}

		$output_with_variables = Utilities::include_with_variables(
			plugin_dir_path( __DIR__ ) . 'parts/example-template-part.php',
			array(
				'title' => $attributes['title'],
			)
		);

		return $output_with_variables;
	}


}//end class
