<?php
namespace Bigup\Plugin_Bootstrap;

/**
 * Bigup Plugin Bootstrap - Widget.
 *
 * This template defines the widget including:
 *  - settings form
 *  - front end html
 *  - saving settings
 *
 * @package bigup_plugin_bootstrap
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2023, Jefferson Real
 * @license GPL3+
 * @link https://jeffersonreal.uk
 */
use WP_Widget;

class Widget extends WP_Widget {


	/**
	 * Construct the Widget.
	 */
	public function __construct() {
		$widget_options = array(
			'classname'   => 'bigup_plugin_bootstrap',
			'description' => 'An example widget.',
		);
		parent::__construct(
			'bigup_plugin_bootstrap', /* Base ID */
			'Bigup Web: Example Widget',        /* widget name as it appears in widget picker */
			$widget_options
		);
	}


	/**
	 * Output the widget settings form.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 'Bigup Web: Example Widget';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}


	/**
	 * Display the widget on the front end.
	 */
	public function widget( $args, $instance ) {

		// define variables.
		$title = apply_filters( 'widget_title', $instance['title'] );

		// Output front end HTML.
		echo $args['before_widget'];

			// Include the template with the widget variables.
			$output_with_variables = Utilities::include_with_variables(
				plugin_dir_path( __DIR__ ) . 'parts/example-template-part.php',
				array( 'title' => $title )
			);
			echo $output_with_variables;

		echo $args['after_widget'];

	}


	/**
	 * Define the data saved by the widget.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
}
