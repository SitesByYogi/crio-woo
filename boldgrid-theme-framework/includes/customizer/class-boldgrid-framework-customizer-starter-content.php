<?php
/**
 * Class: BoldGrid_Framework_Customizer_Starter_Content
 *
 * This is used for the starter content import functionality in the WordPress customizer.
 *
 * @since      2.0.0
 * @category   Customizer
 * @package    Boldgrid_Framework
 * @subpackage Boldgrid_Framework_Customizer
 * @author     BoldGrid <support@boldgrid.com>
 * @link       https://boldgrid.com
 */

// If this file is called directly, abort.
defined( 'WPINC' ) ? : die;

/**
 * BoldGrid_Framework_Customizer_Starter_Content
 *
 * Responsible for the starter content import functionality in the WordPress customizer.
 *
 * @since 2.0.0
 */
class BoldGrid_Framework_Customizer_Starter_Content {

	/**
	 * The BoldGrid Theme Framework configurations.
	 *
	 * @since     2.0.0
	 * @access    protected
	 * @var       string     $configs       The BoldGrid Theme Framework configurations.
	 */
	protected $configs;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param     string $configs       The BoldGrid Theme Framework configurations.
	 * @since     2.0.0
	 */
	public function __construct( $configs ) {
		$this->configs = $configs;
	}

	/**
	 * Add hooks to customizer register action.
	 *
	 * @since 2.0.0
	 */
	public function add_hooks() {
		if ( self::has_valid_content() ) {
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue' ) );
			add_action( 'wp_ajax_load_starter_content', array( $this, 'load_starter_content' ) );
		}
	}

	/**
	 * Enqueue scripts in customizer.
	 *
	 * @since 2.0.0
	 */
	public function enqueue() {

		// Minify if script debug is off.
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_script(
			'bgtfw-customizer-starter-content',
			$this->configs['framework']['js_dir'] . 'customizer/starter-content' . $suffix . '.js',
			array( 'customize-controls' ),
			$this->configs['version']
		);
	}

	/**
	 * Determine whether or not the theme has valid starter content.
	 *
	 * @since 2.0.0
	 *
	 * @return bool
	 */
	public static function has_valid_content() {
		$content = get_theme_support( 'starter-content' );
		return is_array( $content ) && ! empty( $content[0] ) && is_array( $content[0] ) && ( bool ) array_filter( $content[0] );
	}

	/**
	 * Handles ajax request for loading starter content.
	 *
	 * @since 2.0.0
	 */
	public function load_starter_content() {
		global $wp_customize;
		if ( ! is_user_logged_in() ) {
			wp_send_json_error( 'unauthenticated' );
		}
		if ( empty( $wp_customize ) || ! $wp_customize->is_preview() ) {
			wp_send_json_error( 'not_preview' );
		}
		$action = 'preview-customize_' . $wp_customize->get_stylesheet();
		if ( ! check_ajax_referer( $action, 'nonce', false ) ) {
			wp_send_json_error( 'invalid_nonce' );
		}

		$starter_content_applied = 0;
		$wp_customize->import_theme_starter_content();
		foreach ( $wp_customize->changeset_data() as $setting_id => $setting_params ) {
			if ( ! empty( $setting_params['starter_content'] ) ) {
				$starter_content_applied += 1;
			}
		}

		if ( 0 === $starter_content_applied ) {
			wp_send_json_error( 'no_starter_content' );
		} else {
			wp_send_json_success();
		}
	}
}
