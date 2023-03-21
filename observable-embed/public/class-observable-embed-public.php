<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Observable_Embed
 * @subpackage Observable_Embed/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Observable_Embed
 * @subpackage Observable_Embed/public
 * @author     Your Name <email@example.com>
 */
class Observable_Embed_Public
{

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
	 * @param      string    $observable_embed       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($observable_embed, $version)
	{

		$this->observable_embed = $observable_embed;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

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

		wp_enqueue_style($this->observable_embed, plugin_dir_url(__FILE__) . 'css/observable-embed-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

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

		 function set_scripts_type_attribute( $tag, $handle, $src ) {
			if ( 'observable-embed-module' === $handle ) {
				$tag = '<script type="module" src="'. $src .'"></script>';
			}
			return $tag;
		}
		add_filter( 'script_loader_tag', 'set_scripts_type_attribute', 10, 3 );

		wp_enqueue_script($this->observable_embed, plugin_dir_url(__FILE__) . 'js/observable-embed-public.js', array('jquery'), $this->version, false);
		wp_enqueue_script('observable-embed-module', plugin_dir_url(__FILE__) . 'js/observable-embed-module.js', array(), $this->version, false);
	}

	public function observable_embed_shortcode($atts)
	{
		$a = shortcode_atts(array(
			'notebook' => null,
			'runtime' => 'https://cdn.jsdelivr.net/npm/@observablehq/runtime@5/dist/runtime.js',
			'stylesheet' => 'https://cdn.jsdelivr.net/npm/@observablehq/inspector@5/dist/inspector.css',
			'cell' => null,
			// ...etc
		), $atts);

		wp_enqueue_style('observableinspector', $a['stylesheet'], array($this->observable_embed), $this->version, 'all');

		$output = '';
		$uniqID = uniqid();

		try {
			if (empty($a['notebook'])) {
				throw new Exception("Missing required attribute 'notebook'");
			}
			$output .= '<div id="observablehq-' . $uniqID . '"></div>
			<script>if (window.observableCells===undefined) { window.observableCells=[];}
			window.observableCells.push({div: "observablehq-' . $uniqID . '"' ;

			//iterate through the $atts and pass them on to the PoemDataViz call
			foreach ($a as $key => $val) {
				$output .= ", " . $key . ":'" . $val . "'";
			}

			$output .= " });</script>";
			/*
			$output .= "<script type='module'>

			// Load the Observable runtime and inspector.
			import {Runtime, Inspector, Library} from 'https://cdn.jsdelivr.net/npm/@observablehq/runtime@4/dist/runtime.js';
			
			import notebook from 'https://api.observablehq.com/@d3/bar-chart.js?v=3';
			const runtime = new Runtime();
			const main = runtime.module(notebook, name => {
			  if (name === 'chart') return new Inspector(document.querySelector('#observablehq-{$uniqID}'));
			});

			main.redefine('width',640);
			
			</script>";*/
		} catch (Exception $e) {
			$output = '<pre>' . $e->getMessage() . esc_html('
			
Proper usage:

&#91;
	observable-embed 	notebook="URL to .js (export -> embed cells -> Runtime with JavaScript - > url from import define line)"
						cell="name of cell" (optional, otherwise entire notebook will be embedded)
&#93;

note: this shortcode may be embedded multiple times to display cells in different places');
			$output .= '</pre>';
		} finally {
			return $output;
		}
	}
}
