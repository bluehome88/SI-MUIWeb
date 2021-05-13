<?php

/**
  Plugin Name: Bizipress Features
  Plugin URI:http://xpeedstudio.com
  Description: Bizipress Features is a plugin for our Bizipress theme.
  Author: xpeedstudio
  Author URI: http://xpeedstudio.com
  Version:1.0
 */
if ( !defined( 'ABSPATH' ) )
	exit;

define( "XS_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );

class Xs_Main {

	/**
	 * Holds the class object.
	 *
	 * @since 1.0.0
	 *
	 */
	public static $_instance;

	/**
	 * Plugin Name
	 *
	 * @since 1.0.0
	 *
	 */
	public $plugin_name = 'Finances Assistance';

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 */
	public $plugin_version = '1.0.0';

	/**
	 * Plugin File
	 *
	 * @since 1.0.0
	 *
	 */
	public $file = __FILE__;

	/**
	 * Load Construct
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->xs_plugin_init();
	}

	/**
	 * Plugin Initialization
	 *
	 * @since 1.0.0
	 *
	 */
	public function xs_plugin_init() {

		require_once (plugin_dir_path( $this->file ) . 'post-type/xs-post-class.php');
	}

	/**
	 *
	 * Get Catagories/Taxonomies List
	 *
	 * @since 1.0.0
	 */
	public function xs_category_list( $cat ) {
		$query_args	 = array(
			'orderby'	 => 'ID',
			'order'		 => 'DESC',
			'hide_empty' => 1,
			'taxonomy'	 => $cat
		);
		$categories	 = get_categories( $query_args );
		$options	 = array( esc_html__( '0', 'bizcraft' ) => 'All Category' );
		if ( is_array( $categories ) && count( $categories ) > 0 ) {
			foreach ( $categories as $cat ) {
				$options[ $cat->term_id ] = $cat->name;
			}
			return $options;
		}
	}

	public static function xs_get_instance() {
		if ( !isset( self::$_instance ) ) {
			self::$_instance = new Xs_Main();
		}
		return self::$_instance;
	}

}

$Xs_Main = Xs_Main::xs_get_instance();



require_once ('inc/xs-social-share.php');


