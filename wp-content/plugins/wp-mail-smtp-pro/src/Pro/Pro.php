<?php

namespace WPMailSMTP\Pro;

use WPMailSMTP\Debug;
use WPMailSMTP\Options;
use WPMailSMTP\Pro\Emails\Logs\EmailsCollection;
use WPMailSMTP\Pro\Emails\Logs\Logs;
use WPMailSMTP\WP;

/**
 * Class Pro handles all Pro plugin code and functionality registration.
 * Initialized inside 'init' WordPress hook.
 *
 * @since 1.5.0
 */
class Pro {

	/**
	 * Plugin slug.
	 *
	 * @since 1.5.0
	 */
	const SLUG = 'wp-mail-smtp-pro';

	/**
	 * List of files to be included early.
	 * Path from the root of the plugin directory.
	 *
	 * @since 1.5.0
	 */
	const PLUGGABLE_FILES = array(
		'src/Pro/Emails/Control/functions.php',
		'src/Pro/activation.php',
	);

	/**
	 * URL to Pro plugin assets directory.
	 *
	 * @since 1.5.0
	 *
	 * @var string Without trailing slash.
	 */
	public $assets_url = '';

	/**
	 * Pro class constructor.
	 *
	 * @since 1.5.0
	 */
	public function __construct() {

		$this->assets_url = wp_mail_smtp()->assets_url . '/pro';

		$this->init();
	}

	/**
	 * Initialize the main Pro logic.
	 *
	 * @since 1.5.0
	 */
	public function init() {

		// Load translations just in case.
		load_plugin_textdomain( 'wp-mail-smtp-pro', false, plugin_basename( wp_mail_smtp()->plugin_path ) . '/assets/pro/languages' );

		add_filter( 'http_request_args', [ $this, 'request_lite_translations' ], 10, 2 );

		// Add the action links to a plugin on Plugins page.
		add_filter( 'plugin_action_links_' . plugin_basename( WPMS_PLUGIN_FILE ), [ $this, 'add_plugin_action_link' ], 15, 1 );

		// Register Action Scheduler tasks.
		add_filter( 'wp_mail_smtp_tasks_get_tasks', [ $this, 'get_tasks' ] );

		// Add Pro specific DB tables to the list of custom DB tables.
		add_filter( 'wp_mail_smtp_core_get_custom_db_tables', [ $this, 'add_pro_specific_custom_db_tables' ] );

		// Display custom auth notices based on the error/success codes.
		add_action( 'admin_init', [ $this, 'display_custom_auth_notices' ] );

		// Disable the admin education notice-bar.
		add_filter( 'wp_mail_smtp_admin_education_notice_bar', '__return_false' );

		$this->get_multisite()->init();
		$this->get_control();
		$this->get_logs();
		$this->get_providers();
		$this->get_license();
		$this->get_site_health()->init();
		$this->disable_wp_auto_update_plugins();

		// Usage tracking hooks.
		add_filter( 'wp_mail_smtp_usage_tracking_get_data', [ $this, 'usage_tracking_get_data' ] );
		add_filter( 'wp_mail_smtp_admin_pages_misc_tab_show_usage_tracking_setting', '__return_false' );
		add_filter( 'wp_mail_smtp_usage_tracking_is_enabled', '__return_true' );

		// Setup wizard hooks.
		add_filter( 'wp_mail_smtp_admin_setup_wizard_prepare_mailer_options', [ $this, 'setup_wizard_prepare_mailer_options' ] );
		add_action( 'wp_mail_smtp_admin_setup_wizard_get_oauth_url', [ $this, 'prepare_oauth_url_redirect' ], 10, 2 );
		add_action( 'wp_mail_smtp_admin_setup_wizard_license_exists', [ $this, 'does_license_key_exist' ] );
		add_action( 'wp_ajax_wp_mail_smtp_vue_get_amazon_ses_identities', [ $this, 'get_amazon_ses_identities' ] );
		add_action( 'wp_ajax_wp_mail_smtp_vue_amazon_ses_identity_registration', [ $this, 'amazon_ses_identity_registration' ] );
		add_action( 'wp_ajax_wp_mail_smtp_vue_verify_license_key', [ $this, 'verify_license_key' ] );

		// Maybe cancel Pro recurring AS tasks for PHP 8 compatibility in v2.6.
		add_filter( 'wp_mail_smtp_migration_cancel_recurring_tasks', [ $this, 'maybe_cancel_recurring_as_tasks_for_v26' ] );
	}

	/**
	 * Load the Control functionality.
	 *
	 * @since 1.5.0
	 *
	 * @return Emails\Control\Control
	 */
	public function get_control() {

		static $control;

		if ( ! isset( $control ) ) {
			$control = apply_filters( 'wp_mail_smtp_pro_get_control', new Emails\Control\Control() );
		}

		return $control;
	}

	/**
	 * Load the Logs functionality.
	 *
	 * @since 1.5.0
	 *
	 * @return Emails\Logs\Logs
	 */
	public function get_logs() {

		static $logs;

		if ( ! isset( $logs ) ) {
			$logs = apply_filters( 'wp_mail_smtp_pro_get_logs', new Emails\Logs\Logs() );
		}

		return $logs;
	}

	/**
	 * Load the new Providers functionality.
	 *
	 * @since 1.5.0
	 *
	 * @return \WPMailSMTP\Pro\Providers\Providers
	 */
	public function get_providers() {

		static $providers;

		if ( ! isset( $providers ) ) {
			$providers = apply_filters( 'wp_mail_smtp_pro_get_providers', new Providers\Providers() );
		}

		return $providers;
	}

	/**
	 * Load the new License functionality.
	 *
	 * @since 1.5.0
	 *
	 * @return \WPMailSMTP\Pro\License\License
	 */
	public function get_license() {

		static $license;

		if ( ! isset( $license ) ) {
			$license = apply_filters( 'wp_mail_smtp_pro_get_license', new License\License() );
		}

		return $license;
	}

	/**
	 * Load the Site Health functionality.
	 *
	 * @since 1.9.0
	 *
	 * @return \WPMailSMTP\Pro\SiteHealth
	 */
	public function get_site_health() {

		static $site_health;

		if ( ! isset( $site_health ) ) {
			$site_health = apply_filters( 'wp_mail_smtp_pro_get_site_health', new SiteHealth() );
		}

		return $site_health;
	}

	/**
	 * Get the Multisite object.
	 *
	 * @since 2.2.0
	 *
	 * @return Multisite
	 */
	public function get_multisite() {

		static $multisite;

		if ( ! isset( $multisite ) ) {
			$multisite = apply_filters( 'wp_mail_smtp_pro_get_multisite', new Multisite() );
		}

		return $multisite;
	}

	/**
	 * Adds WP Mail SMTP (Lite) to the update checklist of installed plugins, to check for new translations.
	 *
	 * @since 1.6.0
	 *
	 * @param array  $args HTTP Request arguments to modify.
	 * @param string $url  The HTTP request URI that is executed.
	 *
	 * @return array The modified Request arguments to use in the update request.
	 */
	public function request_lite_translations( $args, $url ) {

		// Only do something on upgrade requests.
		if ( strpos( $url, 'api.wordpress.org/plugins/update-check' ) === false ) {
			return $args;
		}

		/*
		 * If WP Mail SMTP is already in the list, don't add it again.
		 *
		 * Checking this by name because the install path is not guaranteed.
		 * The capitalized json data defines the array keys, therefore we need to check and define these as such.
		 */
		$plugins = json_decode( $args['body']['plugins'], true );
		foreach ( $plugins['plugins'] as $slug => $data ) {
			if ( isset( $data['Name'] ) && $data['Name'] === 'WP Mail SMTP' ) {
				return $args;
			}
		}

		// Pro plugin (current plugin) key in $plugins['plugins'].
		$pro_plugin_key = plugin_basename( wp_mail_smtp()->plugin_path ) . '/wp_mail_smtp.php';

		// The pro plugin key has to exist for the code below to work.
		if ( ! isset( $plugins['plugins'][ $pro_plugin_key ] ) ) {
			return $args;
		}

		/*
		 * Add an entry to the list that matches the WordPress.org slug for WP Mail SMTP Lite.
		 *
		 * This entry is based on the currently present data from this plugin, to make sure the version and textdomain
		 * settings are as expected. Take care of the capitalized array key as before.
		 */
		$plugins['plugins']['wp-mail-smtp/wp_mail_smtp.php'] = $plugins['plugins'][ $pro_plugin_key ];
		// Override the name of the plugin.
		$plugins['plugins']['wp-mail-smtp/wp_mail_smtp.php']['Name'] = 'WP Mail SMTP';
		// Override the version of the plugin to prevent increasing the update count.
		$plugins['plugins']['wp-mail-smtp/wp_mail_smtp.php']['Version'] = '9999.0';

		// Overwrite the plugins argument in the body to be sent in the upgrade request.
		$args['body']['plugins'] = wp_json_encode( $plugins );

		return $args;
	}

	/**
	 * Get the list of all custom DB tables that should be present in the DB.
	 *
	 * @since 1.9.0
	 *
	 * @return array List of table names.
	 */
	public function get_custom_db_tables() {

		return [
			Logs::get_table_name(),
		];
	}

	/**
	 * Add Pro specific custom DB tables to the list of all plugin's custom DB tables.
	 *
	 * @since 2.1.2
	 *
	 * @param array $tables A list of existing custom tables.
	 *
	 * @return array
	 */
	public function add_pro_specific_custom_db_tables( $tables ) {

		$pro_tables = [];

		if ( $this->get_logs()->is_enabled() ) {
			$pro_tables[] = Logs::get_table_name();
		}

		return array_merge( $tables, $pro_tables );
	}

	/**
	 * Add plugin action links on Plugins page.
	 *
	 * @since 2.0.0
	 *
	 * @param array $links Existing plugin action links.
	 *
	 * @return array
	 */
	public function add_plugin_action_link( $links ) {

		$custom['settings'] = sprintf(
			'<a href="%s" aria-label="%s">%s</a>',
			esc_url( wp_mail_smtp()->get_admin()->get_admin_page_url() ),
			esc_attr__( 'Go to WP Mail SMTP Settings page', 'wp-mail-smtp-pro' ),
			esc_html__( 'Settings', 'wp-mail-smtp-pro' )
		);

		$custom['docs'] = sprintf(
			'<a href="%1$s" target="_blank" aria-label="%2$s" rel="noopener noreferrer">%3$s</a>',
			'https://wpmailsmtp.com/docs/',
			esc_attr__( 'Go to WPMailSMTP.com documentation page', 'wp-mail-smtp-pro' ),
			esc_html__( 'Docs', 'wp-mail-smtp-pro' )
		);

		$custom['support'] = sprintf(
			'<a href="%1$s" target="_blank" aria-label="%2$s" rel="noopener noreferrer">%3$s</a>',
			'https://wpmailsmtp.com/account/support/',
			esc_attr__( 'Go to WPMailSMTP.com support page', 'wp-mail-smtp-pro' ),
			esc_html__( 'Support', 'wp-mail-smtp-pro' )
		);

		return array_merge( $custom, (array) $links );
	}

	/**
	 * Register the pro version Action Scheduler tasks.
	 *
	 * @since 2.1.0
	 * @since 2.1.2 Add EmailLogMigration4 task.
	 * @since 2.2.0 Add EmailLogMigration5 task.
	 *
	 * @param array $tasks Action Scheduler tasks to be registered.
	 *
	 * @return array
	 */
	public function get_tasks( $tasks ) {

		return array_merge(
			$tasks,
			[
				\WPMailSMTP\Pro\Tasks\EmailLogCleanupTask::class,
				\WPMailSMTP\Pro\Tasks\Migrations\EmailLogMigration4::class,
				\WPMailSMTP\Pro\Tasks\Migrations\EmailLogMigration5::class,
				\WPMailSMTP\Pro\Tasks\Logs\Mailgun\VerifySentStatusTask::class,
				\WPMailSMTP\Pro\Tasks\Logs\Sendinblue\VerifySentStatusTask::class,
				\WPMailSMTP\Pro\Tasks\Logs\SMTPcom\VerifySentStatusTask::class,
			]
		);
	}

	/**
	 * Display custom auth notices for pro mailers based on the error/success codes.
	 *
	 * @since 2.3.0
	 */
	public function display_custom_auth_notices() {

		$error   = isset( $_GET['error'] ) ? sanitize_key( $_GET['error'] ) : ''; // phpcs:ignore
		$success = isset( $_GET['success'] ) ? sanitize_key( $_GET['success'] ) : '';  // phpcs:ignore

		if ( empty( $error ) && empty( $success ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		switch ( $error ) {
			case 'microsoft_no_code':
			case 'zoho_no_code':
			case 'zoho_invalid_nonce':
				WP::add_admin_notice(
					esc_html__( 'There was an error while processing the authentication request. Please try again.', 'wp-mail-smtp-pro' ),
					WP::ADMIN_NOTICE_ERROR
				);
				break;

			case 'zoho_no_clients':
				WP::add_admin_notice(
					esc_html__( 'There was an error while processing the authentication request. Please make sure that you have Client ID and Client Secret both valid and saved.', 'wp-mail-smtp-pro' ),
					WP::ADMIN_NOTICE_ERROR
				);
				break;

			case 'zoho_access_denied':
				WP::add_admin_notice(
				/* translators: %s - error code, returned by Zoho API. */
					sprintf( esc_html__( 'There was an error while processing the authentication request: %s. Please try again.', 'wp-mail-smtp-pro' ), '<code>' . esc_html( $error ) . '</code>' ),
					WP::ADMIN_NOTICE_ERROR
				);
				break;
		}

		switch ( $success ) {
			case 'microsoft_site_linked':
				WP::add_admin_notice(
					esc_html__( 'You have successfully linked the current site with your Microsoft API project. Now you can start sending emails through Outlook.', 'wp-mail-smtp-pro' ),
					WP::ADMIN_NOTICE_SUCCESS
				);
				break;
			case 'zoho_site_linked':
				WP::add_admin_notice(
					esc_html__( 'You have successfully linked the current site with your Zoho Mail API project. Now you can start sending emails through Zoho Mail.', 'wp-mail-smtp-pro' ),
					WP::ADMIN_NOTICE_SUCCESS
				);
				break;
		}
	}

	/**
	 * Disable (temporary) new WordPress 5.5 'auto-update for plugins' feature.
	 *
	 * @since 2.3.0
	 */
	private function disable_wp_auto_update_plugins() {

		add_filter( 'plugin_auto_update_setting_html', [ $this, 'auto_update_setting_html' ], 100, 3 );
		add_filter( 'auto_update_plugin', [ $this, 'rollback_auto_update_plugin_default_value' ], 100, 2 );
		add_filter( 'pre_update_site_option_auto_update_plugins', [ $this, 'update_auto_update_plugins_option' ], 100, 4 );
	}

	/**
	 * Filter the HTML of the auto-updates setting for WP Mail SMTP Pro plugin.
	 *
	 * @since 2.3.0
	 *
	 * @param string $html        The HTML of the plugin's auto-update column content, including
	 *                            toggle auto-update action links and time to next update.
	 * @param string $plugin_file Path to the plugin file relative to the plugins directory.
	 * @param array  $plugin_data An array of plugin data.
	 *
	 * @return string
	 */
	public function auto_update_setting_html( $html, $plugin_file, $plugin_data ) {

		if (
			! empty( $plugin_data['Author'] ) &&
			$plugin_data['Author'] === 'WPForms' &&
			$plugin_file === plugin_basename( WPMS_PLUGIN_FILE )
		) {
			$html = esc_html__( 'Auto-updates are not available.', 'wp-mail-smtp-pro' );
		}

		return $html;
	}

	/**
	 * Rollback to default value for automatically update WP Mail SMTP Pro plugin.
	 * Some devs or tools can use `auto_update_plugin` filter and turn on auto-updates for all plugins.
	 *
	 * @since 2.3.0
	 *
	 * @param mixed  $auto_update    Whether to update.
	 * @param object $filter_payload The update offer.
	 *
	 * @return null|bool
	 */
	public function rollback_auto_update_plugin_default_value( $auto_update, $filter_payload ) {

		// Check whether auto-updates for plugins are supported and enabled. If not, return early.
		if (
			! function_exists( 'wp_is_auto_update_enabled_for_type' ) ||
			! wp_is_auto_update_enabled_for_type( 'plugin' )
		) {
			return $auto_update;
		}

		if ( empty( $auto_update ) ) {
			return $auto_update;
		}

		if ( ! is_object( $filter_payload ) || empty( $filter_payload->plugin ) ) {
			return $auto_update;
		}

		// Determine if it's a WP Mail SMTP Pro plugin. If so, return null (default value).
		if ( $filter_payload->plugin === plugin_basename( WPMS_PLUGIN_FILE ) ) {
			return null;
		}

		return $auto_update;
	}

	/**
	 * Filter value, which is prepared for `auto_update_plugins` option before it's saved into DB.
	 * We need to exclude WP Mail SMTP Pro.
	 *
	 * @since 2.3.0
	 *
	 * @param mixed  $plugins     New plugins of the network option.
	 * @param mixed  $old_plugins Old plugins of the network option.
	 * @param string $option      Option name.
	 * @param int    $network_id  ID of the network.
	 *
	 * @return array
	 */
	public function update_auto_update_plugins_option( $plugins, $old_plugins, $option, $network_id ) {

		// No need to filter out our plugins if none were saved.
		if ( empty( $plugins ) ) {
			return $plugins;
		}

		// Check whether auto-updates for plugins are supported and enabled. If so, exclude WP Mail SMTP Pro plugin.
		if ( function_exists( 'wp_is_auto_update_enabled_for_type' ) && wp_is_auto_update_enabled_for_type( 'plugin' ) ) {
			return array_diff( (array) $plugins, [ plugin_basename( WPMS_PLUGIN_FILE ) ] );
		}

		return $plugins;
	}

	/**
	 * Add the Pro usage tracking data.
	 *
	 * @since 2.3.0
	 *
	 * @param array $data The existing usage tracking data.
	 *
	 * @return array
	 */
	public function usage_tracking_get_data( $data ) {

		$options = Options::init();

		$disabled_controls = [];

		// Get the state of each control.
		foreach ( $this->get_control()->get_controls( true ) as $key ) {
			if ( (bool) $options->get( 'control', $key ) ) {
				$disabled_controls[] = $key;
			}
		}

		$data['wp_mail_smtp_pro_enable_log']           = (bool) $options->get( 'logs', 'enabled' );
		$data['wp_mail_smtp_pro_log_email_content']    = (bool) $options->get( 'logs', 'log_email_content' );
		$data['wp_mail_smtp_pro_log_retention_period'] = $options->get( 'logs', 'log_retention_period' );
		$data['wp_mail_smtp_pro_log_entry_count']      = $this->get_logs()->is_valid_db() ? ( new EmailsCollection() )->get_count() : 0;
		$data['wp_mail_smtp_pro_disabled_controls']    = $disabled_controls;

		return $data;
	}

	/**
	 * Setup any additional PRO mailer options for the Setup Wizard.
	 * This data is passed via `wp_localize_script` before the Vue app is initialized.
	 *
	 * @since 2.6.0
	 *
	 * @param array $data The default mailer options data.
	 *
	 * @return array
	 */
	public function setup_wizard_prepare_mailer_options( $data ) {

		if ( key_exists( 'amazonses', $data ) && empty( $data['amazonses']['disabled'] ) ) {
			$amazon_regions   = \WPMailSMTP\Pro\Providers\AmazonSES\Auth::get_regions_names();
			$prepared_regions = [];

			foreach ( $amazon_regions as $value => $label ) {
				$prepared_regions[] = [
					'label' => $label,
					'value' => $value,
				];
			}

			$data['amazonses']['region_options'] = $prepared_regions;
		}

		if ( key_exists( 'outlook', $data ) && empty( $data['outlook']['disabled'] ) ) {
			$data['outlook']['redirect_uri'] = \WPMailSMTP\Pro\Providers\Outlook\Auth::get_plugin_auth_url();
		}

		if ( key_exists( 'zoho', $data ) && empty( $data['zoho']['disabled'] ) ) {
			$data['zoho']['redirect_uri']   = \WPMailSMTP\Pro\Providers\Zoho\Auth::get_plugin_auth_url();
			$data['zoho']['domain_options'] = wp_mail_smtp()->get_providers()->get_options( 'zoho' )->get_zoho_domains();
		}

		return $data;
	}

	/**
	 * A filter hook to check if license key exists.
	 *
	 * @since 2.6.0
	 *
	 * @return bool
	 */
	public function does_license_key_exist() {

		$license = Options::init()->get( 'license', 'key' );

		return ! empty( $license );
	}

	/**
	 * AJAX callback for getting the current Amazon SES Identities in a JS friendly format.
	 *
	 * @since 2.6.0
	 */
	public function get_amazon_ses_identities() {

		check_ajax_referer( 'wpms-admin-nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error();
		}

		$options      = new Options();
		$ses_settings = isset( $_POST['value'] ) ? wp_slash( json_decode( wp_unslash( $_POST['value'] ), true ) ) : []; // phpcs:ignore

		if ( empty( $ses_settings ) ) {
			wp_send_json_error();
		}

		// Update Amazon SES settings with current settings to retrieve the SES Identities for.
		$options->set( [ 'amazonses' => $ses_settings ], false, false );

		$table = new \WPMailSMTP\Pro\Providers\AmazonSES\IdentitiesTable();
		$table->prepare_items();

		$error = Debug::get_last();

		if ( ! $table->has_items() && ! empty( $error ) ) {
			Debug::clear();

			wp_send_json_error( $error );
		}

		wp_send_json_success(
			[
				'columns' => $table->get_columns_for_js(),
				'data'    => $table->get_items_for_js(),
			]
		);
	}

	/**
	 * AJAX callback for the Amazon SES identity registration processing.
	 *
	 * @since 2.6.0
	 */
	public function amazon_ses_identity_registration() {

		check_ajax_referer( 'wpms-admin-nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error();
		}

		$type  = isset( $_POST['type'] ) ? sanitize_key( wp_unslash( $_POST['type'] ) ) : '';
		$value = isset( $_POST['value'] ) ? sanitize_text_field( wp_unslash( $_POST['value'] ) ) : '';

		if ( $type === 'email' && ! is_email( $value ) ) {
			wp_send_json_error( esc_html__( 'Please provide a valid email address.', 'wp-mail-smtp-pro' ) );
		} elseif ( $type === 'domain' && empty( $value ) ) {
			wp_send_json_error( esc_html__( 'Please provide a domain.', 'wp-mail-smtp-pro' ) );
		}

		$ses = new \WPMailSMTP\Pro\Providers\AmazonSES\Auth();

		// Verify domain for easier conditional checking below.
		$domain_txt = ( $type === 'domain' ) ? $ses->do_verify_domain( $value ) : '';

		if ( $type === 'email' && $ses->do_verify_email( $value ) === true ) {
			wp_send_json_success(
				[
					'type'  => $type,
					'value' => esc_html( $value ),
				]
			);
		} elseif ( $type === 'domain' && ! empty( $domain_txt ) ) {
			wp_send_json_success(
				[
					'type'       => $type,
					'value'      => esc_html( $value ),
					'domain_txt' => $domain_txt,
				]
			);
		} else {
			$error = Debug::get_last();
			Debug::clear();

			wp_send_json_error(
				esc_html( $error )
			);
		}
	}

	/**
	 * Prepare the oAuth URL redirect for the PRO oAuth mailers.
	 *
	 * @since 2.6.0
	 *
	 * @param array  $data   The default oAuth data.
	 * @param string $mailer The mailer to prepare the redirect URL for.
	 *
	 * @return array
	 *
	 * @throws \Exception If auth classes fail to initialize.
	 */
	public function prepare_oauth_url_redirect( $data, $mailer ) {

		$auth = null;

		switch ( $mailer ) {
			case 'outlook':
				$auth = new \WPMailSMTP\Pro\Providers\Outlook\Auth();
				break;

			case 'zoho':
				$auth = new \WPMailSMTP\Pro\Providers\Zoho\Auth();
				break;
		}

		if ( ! empty( $auth ) && $auth->is_clients_saved() && $auth->is_auth_required() ) {
			$data['oauth_url'] = $auth->get_auth_url();
		}

		return $data;
	}

	/**
	 * AJAX callback for verifying the license key.
	 *
	 * @since 2.6.0
	 */
	public function verify_license_key() {

		check_ajax_referer( 'wpms-admin-nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( esc_html__( 'You don\'t have the permission to perform this action.', 'wp-mail-smtp-pro' ) );
		}

		$license_key = ! empty( $_POST['license_key'] ) ? sanitize_key( $_POST['license_key'] ) : '';

		if ( empty( $license_key ) ) {
			wp_send_json_error( esc_html__( 'Please enter a valid license key!', 'wp-mail-smtp-pro' ) );
		}

		$license_object = $this->get_license();

		// Let the License class handle the rest via AJAX.
		if ( method_exists( $license_object, 'verify_key' ) ) {
			$license_object->verify_key( $license_key, true );
		}

		wp_send_json_error( esc_html__( 'License functionality missing!', 'wp-mail-smtp-pro' ) );
	}

	/**
	 * Add any Pro AS tasks that need to be temporary canceled (reset) for PHP 8 compatibility in v2.6 release.
	 *
	 * @since 2.6.0
	 *
	 * @param array $tasks The default tasks that will be canceled.
	 *
	 * @return array
	 */
	public function maybe_cancel_recurring_as_tasks_for_v26( $tasks ) {

		// Get the Logs retention period setting.
		$retention_period = Options::init()->get( 'logs', 'log_retention_period' );

		if ( ! empty( $retention_period ) ) {
			$tasks[] = '\WPMailSMTP\Pro\Tasks\EmailLogCleanupTask';
		}

		return $tasks;
	}
}
