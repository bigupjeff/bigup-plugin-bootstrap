<?php
/**
 * Bigup Plugin Bootstrap - Example Template Part.
 *
 * This is an example of how you might define a temlpate part for use throughout the plugin.
 * $title is passed from the calling function using Initialise::includeWithVariables().
 *
 * @package bigup_plugin_bootstrap
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2023, Jefferson Real
 * @license GPL3+
 * @link https://jeffersonreal.uk
 */

use function wp_script_is;
use function wp_enqueue_script;
use function wp_enqueue_style;

// Enqueue contact form and styles.
wp_enqueue_script( 'bigup_plugin_bootstrap_js' );
wp_enqueue_style( 'bigup_plugin_bootstrap_css' );

$example_option = get_option( 'example-option' );

?>
<div class="bigup__example_template_part">
	<h3>
		<?php echo ( ! empty( $title ) ) ? $title : 'Fallback Title (no value passed to the template)'; ?>
	</h3>
	<label>
		Example Option:
		<input
			type="text"
			value="<?php echo ( ! empty( $example_option ) ) ? $example_option : 'Not found in DB'; ?>"
		>
	</label>
	<p>Checks</p>
	<ul>
		<li>
			Template part loaded ✅
		</li>
		<li id="cssTest">
			CSS loaded
		</li>
		<li id="jsTest">
			JavaScript loaded
		</li>
		<li id="jsTest">
			Option read from DB <?php echo ( ! empty( $example_option ) ) ? '✅' : ''; ?>
		</li>
	</ul>
</div>
