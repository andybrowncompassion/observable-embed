<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Observable_Embed
 * @subpackage Observable_Embed/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Observable_Embed
 * @subpackage Observable_Embed/admin
 * @author     Your Name <email@example.com>
 */
class Observable_Embed_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $observable_embed    The ID of this plugin.
	 */
	private $observable_embed;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $observable_embed       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $observable_embed, $version ) {

		$this->observable_embed = $observable_embed;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Observable_Embed_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Observable_Embed_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->observable_embed, plugin_dir_url( __FILE__ ) . 'css/observable-embed-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Observable_Embed_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Observable_Embed_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->observable_embed, plugin_dir_url( __FILE__ ) . 'js/observable-embed-admin.js', array( 'jquery' ), $this->version, false );

	}

}
