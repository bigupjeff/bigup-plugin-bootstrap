<?php
namespace Bigup\Plugin_Bootstrap;

/**
 * Bigup WordPress Plugin Bootstrap - Initialisation.
 *
 * Setup styles and helper functions for this plugin.
 *
 * @package bigup_plugin_bootstrap
 * @author Jefferson Real <me@jeffersonreal.uk>
 * @copyright Copyright (c) 2023, Jefferson Real
 * @license GPL3+
 * @link https://jeffersonreal.uk
 */

// WordPress dependencies.
use function add_action;
use function add_shortcode;
use function is_admin;
use function wp_register_style;
use function wp_register_script;

class Initialise {


	/**
	 * Initialise all dependencies for the plugin.
	 */
	public function __construct() {
		if ( is_admin() ) {
			new Admin_Settings();
		}
		add_action( 'init', array( $this, 'register_global_scripts_and_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts_and_styles' ) );
		add_shortcode( 'bigup_plugin_bootstrap', array( new Shortcode(), 'display_shortcode' ) );
		add_action(
			'widgets_init',
			function() {
				return register_widget( new Widget() );
			}
		);
	}


	/**
	 * Register global scripts and styles.
	 *
	 * These assets can be enqueued from anywhere.
	 */
	public function register_global_scripts_and_styles() {
		wp_register_style( 'bigup_plugin_bootstrap_css', BIGUP_WORDPRES_PLUGIN_BOOTSTRAP_URL . 'public/bundle.css', array(), filemtime( BIGUP_WORDPRES_PLUGIN_BOOTSTRAP_PATH . 'public/bundle.css' ), 'all' );
		wp_register_script( 'bigup_plugin_bootstrap_js', BIGUP_WORDPRES_PLUGIN_BOOTSTRAP_URL . 'public/bundle.js', array(), filemtime( BIGUP_WORDPRES_PLUGIN_BOOTSTRAP_PATH . 'public/bundle.js' ), 'true' );
	}


	/**
	 * Register front end scripts and styles.
	 *
	 * These assets can be enqueued only for public pages.
	 */
	public function register_front_end_scripts_and_styles() {
		// Register front end assets here.
	}


	/**
	 * Enqueue admin scripts and styles.
	 *
	 * These assets will be automatically enqueued in admin only.
	 */
	public function enqueue_admin_scripts_and_styles() {
		if ( ! wp_script_is( 'bigup_icons', 'registered' ) ) {
			wp_register_style( 'bigup_icons', BIGUP_WORDPRES_PLUGIN_BOOTSTRAP_URL . 'dashicons/css/bigup-icons.css', array(), filemtime( BIGUP_WORDPRES_PLUGIN_BOOTSTRAP_PATH . 'dashicons/css/bigup-icons.css' ), 'all' );
		}
		if ( ! wp_script_is( 'bigup_icons', 'enqueued' ) ) {
			wp_enqueue_style( 'bigup_icons' );
		}
	}
}
