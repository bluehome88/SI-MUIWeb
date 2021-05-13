<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

use \WP_Query;

require_once( PLUGIN_DIR . 'lib/helpers/settings-builder.php' );

class Ajax {

	private $analytics;

	public $prefix = 'kscf';

	const NONCE = 'candy_faq_nonce';
	const NONCE_KEY = 'candy_faq_ajax_nonce';

	public function __construct($deps) {

		$this->setup_dependencies( $deps );

		$this->register();
	}

	/**
	 * Sets up dependencies
	 * @param $deps
	 */
	private function setup_dependencies($deps) {
		if (isset($deps['analytics'])) {
			$this->analytics = $deps['analytics'];
		}
	}

	/**
	 * Registers actions handlers
	 */
	public function register() {

		// save settings
		add_action( 'wp_ajax_' . $this->prefix . '_save_settings', array( $this, 'save_settings' ) );

		// reset settings
		add_action( 'wp_ajax_' . $this->prefix . '_reset_settings', array( $this, 'reset_settings' ) );

		// resets stats
		add_action( 'wp_ajax_' . $this->prefix . '_reset_stats', array( $this, 'reset_stats' ) );

		// save sorting
		add_action( 'wp_ajax_' . $this->prefix . '_save_sorting', array( $this, 'save_sorting' ) );

		// analytics
		add_action( 'wp_ajax_' . $this->prefix . '_get_month_analytics', array( $this, 'get_month_analytics' ) );
		add_action( 'wp_ajax_' . $this->prefix . '_get_week_analytics', array( $this, 'get_week_analytics' ) );

		// view tracking
		add_action( 'wp_ajax_' . $this->prefix . '_answer_view', array( $this, 'track_answer_view' ) );
		add_action( 'wp_ajax_nopriv_' . $this->prefix . '_answer_view', array( $this, 'track_answer_view' ) );

		// like
		add_action( 'wp_ajax_' . $this->prefix . '_article_like', array( $this, 'track_like' ) );
		add_action( 'wp_ajax_nopriv_' . $this->prefix . '_article_like', array( $this, 'track_like' ) );

		// dislike
		add_action( 'wp_ajax_' . $this->prefix . '_article_dislike', array( $this, 'track_dislike' ) );
		add_action( 'wp_ajax_nopriv_' . $this->prefix . '_article_dislike', array( $this, 'track_dislike' ) );

		// feedback
		add_action( 'wp_ajax_' . $this->prefix . '_article_feedback', array( $this, 'save_feedback' ) );
		add_action( 'wp_ajax_nopriv_' . $this->prefix . '_article_feedback', array( $this, 'save_feedback' ) );
		add_action( 'wp_ajax_' . $this->prefix . '_remove_feedback', array( $this, 'remove_feedback' ) );

		// get shortcodes options HTML
		add_action( 'wp_ajax_' . $this->prefix . '_get_shortcode_options', array( $this, 'get_shortcode_options' ) );

		// get preset options HTML
		add_action( 'wp_ajax_' . $this->prefix . '_get_preset_options', array( $this, 'get_preset_options' ) );

	}

	public static function get_nonce() {
		return self::NONCE;
	}

	public static function get_nonce_key() {
		return self::NONCE_KEY;
	}

	protected function send_security_error() {
		echo json_encode( array(
			'status' => 1,
			'errors' => array(
				'global' => array(
					array(
						'code' => 4,
						'error_message' => __( 'Security or timeout error. Sorry, you cannot currently perform this action. Try to refresh the page or login.', 'candy-faq' )
					)
				)
			)
		) );

		wp_die();
	}

	/**
	 * Checks user and checks if he is admin
	 */
	protected function check_admin_user() {
		if ( ! current_user_can( 'administrator' ) ) {
			$this->send_security_error();
		}

		$this->check_user();
	}

	/**
	 * Checks if user is really user
	 */
	protected function check_user() {
		if ( ! check_ajax_referer( self::get_nonce(), 'nonce_value', false ) ) {
			$this->send_security_error();
		}
	}

	/**
	 *
	 * @param $post_id
	 * @param $key
	 */
	protected function update_count_meta( $post_id, $key ) {
		$now = time();
		$begin_of_day = strtotime( "midnight", $now );

		$current_count_meta_raw = get_post_meta( $post_id, $key, true );
		$current_count_meta = array();

		if ( $current_count_meta_raw ) {
			$current_count_meta = json_decode( $current_count_meta_raw, true );
		}

		if ( ! array_key_exists( $begin_of_day, $current_count_meta ) ) {
			$current_count_meta[ $begin_of_day ] = 0;
		}

		$current_day_count                   = (int) $current_count_meta[ $begin_of_day ];
		$current_count_meta[ $begin_of_day ] = ++ $current_day_count;

		update_post_meta( $post_id, $key, json_encode( $current_count_meta ) );
	}

	/**
	 * Track answer view
	 */
	public function track_answer_view() {
		$this->check_user();

		$item_id = (int) $_POST['id'];
		$item    = get_post( $item_id );

		if ( $item === null ) {
			wp_die();
		}

		$current_views = (int) get_post_meta( $item_id, VIEW_FIELD, true );
		update_post_meta( $item_id, VIEW_FIELD, ++ $current_views );

		$this->update_count_meta( $item_id, VIEW_META_FIELD );

		$status = 0;

		echo json_encode( array(
			'status' => $status
		) );

		wp_die();
	}

	/**
	 * Like handler
	 */
	public function track_like() {
		$this->check_user();

		$item_id = (int) $_POST['id'];
		$item = get_post( $item_id );

		if ( $item === null ) {
			wp_die();
		}

		$current_views = (int) get_post_meta( $item_id, LIKE_FIELD, true );
		update_post_meta( $item_id, LIKE_FIELD, ++ $current_views );

		$this->update_count_meta( $item_id, LIKE_META_FIELD );

		$status = 0;

		echo json_encode( array(
			'status' => $status
		) );

		wp_die();
	}

	/**
	 * Dislike handler
	 */
	public function track_dislike() {
		$this->check_user();

		$item_id = (int) $_POST['id'];
		$item = get_post( $item_id );

		if ( $item === null ) {
			wp_die();
		}

		$current_views = (int) get_post_meta( $item_id, DISLIKE_FIELD, true );
		update_post_meta( $item_id, DISLIKE_FIELD, ++ $current_views );

		$this->update_count_meta( $item_id, DISLIKE_META_FIELD );

		$status = 0;

		echo json_encode( array(
			'status' => $status
		) );

		wp_die();
	}

	/**
	 * Saves plugin settings
	 */
	public function save_settings() {
		$this->check_admin_user();

		$settings = $_POST['settings'];

		if ( ! $settings || empty( $settings ) ) {
			wp_die();
		}

		Options::save( $settings );

		$status = 0;

		echo json_encode( array(
			'status' => $status
		) );

		wp_die();
	}

	/**
	 * Saves posts sorting
	 */
	public function save_sorting() {
		$this->check_admin_user();

		$sorting = $_POST['sorting'];
		$tax = $_POST['taxonomy'];

		if ( ! $sorting || empty( $sorting ) || !$tax ) {
			wp_die();
		}

		foreach($sorting as $term_id => $posts):
			foreach($posts as $index => $id):
				wp_update_post( array(
					'ID' => (int) $id,
					'menu_order' => (int)$index,
				));
			endforeach;
		endforeach;

		$status = 0;

		echo json_encode( array(
			'status' => $status,
			'sorting' => $sorting,
			'tax' => $tax
		) );

		wp_die();
	}

	/**
	 * Resets plugin settings
	 */
	public function reset_settings() {
		$this->check_admin_user();

		Options::reset();

		$status = 0;

		echo json_encode( array(
			'status' => $status
		) );

		wp_die();
	}

	/**
	 * Gets month analytics
	 */
	public function get_month_analytics() {
		$this->check_admin_user();

		$status = 0;

		echo json_encode( array(
			'status' => $status,
			'graphDates' => $this->analytics->get_recent_month_dates(),
			'graphViews' => $this->analytics->get_recent_month_views(),
			'graphLikes' => $this->analytics->get_recent_month_likes(),
			'graphDislikes' => $this->analytics->get_recent_month_dislikes(),
		) );

		wp_die();
	}

	/**
	 * Gets week analytics
	 */
	public function get_week_analytics() {
		$this->check_admin_user();

		$status = 0;

		echo json_encode( array(
			'status' => $status,
			'graphDates' => $this->analytics->get_recent_week_dates(),
			'graphViews' => $this->analytics->get_recent_week_views(),
			'graphLikes' => $this->analytics->get_recent_week_likes(),
			'graphDislikes' => $this->analytics->get_recent_week_dislikes(),
		) );

		wp_die();
	}

	/**
	 * Save feedback
	 */
	public function save_feedback() {
		$this->check_user();

		$item_id = (int) $_POST['id'];
		$feedback_count = wp_count_posts( FEEDBACK_CPT )->publish;

		$feedback_post = array(
			'post_title' => wp_strip_all_tags(
				__( 'Item feedback' .
				    ( $feedback_count > 0 ?
					    ' #' . ( $feedback_count + 1 ) :
					    '' ), 'candy-faq' ) ),
			'post_content' => wp_strip_all_tags( $_POST['content'] ),
			'post_status' => 'publish',
			'post_type' => FEEDBACK_CPT
		);
		$feedback_post_id = wp_insert_post( $feedback_post );

		// older WP versions
		add_post_meta($feedback_post_id, 'feedback_article_id', $item_id);

		$status = 0;

		echo json_encode( array(
			'status' => $status
		) );

		wp_die();
	}

	/**
	 * Removes feedback entry
	 */
	public function remove_feedback() {
		$this->check_admin_user();

		$status = 0;

		if ( isset( $_POST['feedback_id'] ) ) {
			wp_trash_post( (int) $_POST['feedback_id'] );
		}

		echo json_encode( array(
			'status' => $status
		) );

		wp_die();
	}

	/**
	 * Resets stats on user request
	 */
	public function reset_stats() {
		$this->check_admin_user();

		$status = 0;

		$config = $_POST['resetConfig'];

		$query_args = array(
			'post_type' => FAQ_CPT,
			'posts_per_page' => - 1
		);

		$items_loop = new WP_Query( $query_args );

		if ( $items_loop->have_posts() ) :
			while ( $items_loop->have_posts() ) : $items_loop->the_post();
				$id = get_the_ID();

				if (isset($config['dislikes']) && $config['dislikes'] === "true") {
					// reset dislikes
					delete_post_meta($id, DISLIKE_FIELD);
					delete_post_meta($id, DISLIKE_META_FIELD);
				}

				if (isset($config['likes']) && $config['likes'] === "true") {
					// reset likes
					delete_post_meta($id, LIKE_FIELD);
					delete_post_meta($id, LIKE_META_FIELD);
				}

				if (isset($config['views']) && $config['views'] === "true") {
					// reset views
					delete_post_meta($id, VIEW_FIELD);
					delete_post_meta($id, VIEW_META_FIELD);
				}
			endwhile;
		endif;
		wp_reset_postdata();

		echo json_encode( array(
			'status' => $status,
			'config' => $config
		) );

		wp_die();
	}

	/**
	 * Gets options html for shortcode
	 */
	public function get_shortcode_options() {
		$status = 0;

		$shortcode = isset($_POST['shortcode']) ? $_POST['shortcode'] : '';
		$values = isset($_POST['values']) ? $_POST['values'] : array();

		global $candy_faq;

		$options = $candy_faq->shortcodes->get_options_for($shortcode);

		ob_start();
		$settings_helper = new SettingsBuilder();
		?><div class="mkb-shortcode-options">
			<?php
			if (!empty($options)):
				foreach ( $options as $option ):
					$settings_helper->render_option(
						$option["type"],
						isset($values[$option['id']]) ? $values[$option['id']] : $option["default"],
						$option
					);
				endforeach;
			else:
				?><div class="mkb-shortcode-no-options"><?php
				_e( 'This shortcode has no options', 'candy-faq' );
				?></div><?php
			endif;
		?></div>
		<?php
		$html = ob_get_clean();

		echo json_encode( array(
			'status' => $status,
			'count' => sizeof($options),
			'html' => $html
		) );

		wp_die();
	}

	/**
	 * Gets preset options
	 */
	public function get_preset_options() {
		$status = 0;

		$preset_id = $_REQUEST['field'];
		$preset_selected = $_REQUEST['preset'];

		$presets = $this->get_presets();

		$options = Options::get_options_by_id();
		$preset_config = $presets[$preset_selected];

		$preset_config = array_map(function($key, $item) use($options) {
			return array(
				'id' => $key,
				'type' => $options[$key]['type'],
				'value' => $item
			);
		}, array_keys($preset_config), $preset_config);

		echo json_encode( array(
			'status' => $status,
			'values' => $preset_config
		) );

		wp_die();
	}

	public static function get_presets() {
		return array(
			/**
			 * Default blue
			 */
			'theme1' => array(
				'faq_bg' => 'rgba(255,255,255,0)',
				'faq_filter_bg' => 'rgba(255,255,255,0)',
				'faq_filter_color' => '#333333',
				'question_font_size' => '{"unit":"em","size":"1.5"}',
				'category_font_size' => '{"unit":"em","size":"1.3"}',
				'toggle_all_font_size' => '{"unit":"em","size":"1.3"}',
				'faq_items_spacing' => '{"unit":"em","size":"0.3"}',
				'faq_items_sep' => '',
				'faq_items_sep_color' => '#888888',
				'faq_items_rounded' => '',
				'faq_shadow' => '',
				'faq_question_shadow' => '',
				'faq_items_height' => 'min',
				'faq_controls_margin_top' => '{"unit":"em","size":"1.2"}',
				'faq_controls_margin_bottom' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_left' => '{"unit":"em","size":"0"}',
				'faq_controls_margin_right' => '{"unit":"em","size":"0"}',
				'show_faq_toggle_all_icon' => '1',
				'faq_toggle_all_icon' => 'fa-plus-circle',
				'faq_toggle_all_icon_open' => 'fa-minus-circle',
				'faq_toggle_all_bg' => '#4bb7e5',
				'faq_toggle_all_bg_hover' => '#64bee5',
				'faq_toggle_all_color' => '#ffffff',
				'show_faq_question_icon' => '1',
				'faq_question_icon' => 'fa-plus-circle',
				'faq_question_icon_open_action' => 'change',
				'faq_question_open_icon' => 'fa-minus-circle',
				'faq_question_bg' => '#4bb7e5',
				'faq_question_bg_hover' => '#64bee5',
				'faq_question_color' => '#ffffff',
				'faq_answer_bg' => '#ffffff',
				'faq_answer_color' => '#333333',
				'faq_answer_shadow' => '',
				'faq_category_margin_top' => '{"unit":"em","size":"1"}',
				'faq_category_margin_bottom' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_left' => '{"unit":"em","size":"0"}',
				'faq_category_color' => '#000000',
				'faq_count_bg' => '#4bb7e5',
				'faq_count_color' => '#ffffff',
				'faq_filter_theme' => 'round',
				'show_faq_filter_icon' => '1',
				'faq_filter_icon' => 'fa-filter',
				'faq_filter_clear_icon' => 'fa-times-circle',
				'faq_no_results_bg' => '#f7f7f7',
				'faq_no_results_color' => '#333',
				'rating_buttons_style' => 'rnd_trans',
				'rating_shadow' => 'none',
				'like_icon' => 'fa-smile-o',
				'like_color' => '#4bb651',
				'rating_likes_shadow_color' => '#888888',
				'like_inverse_color' => '#fff',
				'dislike_icon' => 'fa-frown-o',
				'dislike_color' => '#c85c5e',
				'rating_dislikes_shadow_color' => '#888888',
				'dislike_inverse_color' => '#fff',
				'rating_message_bg' => '#f7f7f7',
				'rating_message_color' => '#888888',
				'rating_message_border_color' => '#eeeeee',
				'rating_total_color' => '#858585',
				'feedback_submit_bg' => '#4bb7e5',
				'feedback_submit_color' => '#ffffff',
				'feedback_message_bg' => '#f7f7f7',
				'feedback_message_color' => '#888888',
				'feedback_message_border_color' => '#eeeeee',
			),
			/**
			 * Modern Boxed
			 */
			'theme2' => array(
				'faq_bg' => '#ffffff',
				'faq_filter_bg' => '#ffffff',
				'faq_filter_color' => '#333333',
				'question_font_size' => '{"unit":"em","size":"1.1"}',
				'category_font_size' => '{"unit":"em","size":"1.3"}',
				'toggle_all_font_size' => '{"unit":"em","size":"1.3"}',
				'faq_items_spacing' => '{"unit":"em","size":"0"}',
				'faq_items_sep' => '1',
				'faq_items_sep_color' => '#e0e0e0',
				'faq_items_rounded' => '',
				'faq_shadow' => '1',
				'faq_question_shadow' => '',
				'faq_items_height' => 'high',
				'faq_controls_margin_top' => '{"unit":"em","size":"1.2"}',
				'faq_controls_margin_bottom' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_left' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_right' => '{"unit":"em","size":"1"}',
				'show_faq_toggle_all_icon' => '1',
				'faq_toggle_all_icon' => 'fa-caret-right',
				'faq_toggle_all_icon_open' => 'fa-caret-down',
				'faq_toggle_all_bg' => '#ffffff',
				'faq_toggle_all_bg_hover' => '#ffffff',
				'faq_toggle_all_color' => '#565758',
				'show_faq_question_icon' => '1',
				'faq_question_icon' => 'fa-caret-right',
				'faq_question_icon_open_action' => 'change',
				'faq_question_open_icon' => 'fa-caret-down',
				'faq_question_bg' => '#ffffff',
				'faq_question_bg_hover' => '#ffffff',
				'faq_question_color' => '#4e5156',
				'faq_answer_bg' => '#f7f7f7',
				'faq_answer_color' => '#4e5156',
				'faq_answer_shadow' => '',
				'faq_category_margin_top' => '{"unit":"em","size":"1"}',
				'faq_category_margin_bottom' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_left' => '{"unit":"em","size":"0.7"}',
				'faq_category_color' => '#000000',
				'faq_count_bg' => '#ffffff',
				'faq_count_color' => '#b2b6be',
				'faq_filter_theme' => 'invisible',
				'show_faq_filter_icon' => '1',
				'faq_filter_icon' => 'fa-filter',
				'faq_filter_clear_icon' => 'fa-times-circle',
				'faq_no_results_bg' => '#f7f7f7',
				'faq_no_results_color' => '#333',
				'rating_buttons_style' => 'rnd',
				'rating_shadow' => 'none',
				'like_icon' => 'fa-smile-o',
				'like_color' => '#4bb651',
				'rating_likes_shadow_color' => '#888888',
				'like_inverse_color' => '#ffffff',
				'dislike_icon' => 'fa-frown-o',
				'dislike_color' => '#c85c5e',
				'rating_dislikes_shadow_color' => '#888888',
				'dislike_inverse_color' => '#ffffff',
				'rating_message_bg' => '#f7f7f7',
				'rating_message_color' => '#888',
				'rating_message_border_color' => '#eee',
				'rating_total_color' => '#858585',
				'feedback_submit_bg' => '#4bb7e5',
				'feedback_submit_color' => '#ffffff',
				'feedback_message_bg' => '#f7f7f7',
				'feedback_message_color' => '#888',
				'feedback_message_border_color' => '#eee',
			),
			/**
			 * Minimal Light
			 */
			'theme3' => array(
				'faq_bg' => '#ffffff',
				'faq_filter_bg' => '#ffffff',
				'faq_filter_color' => '#333333',
				'question_font_size' => '{"unit":"em","size":"1.3"}',
				'category_font_size' => '{"unit":"em","size":"1.1"}',
				'toggle_all_font_size' => '{"unit":"em","size":"1.3"}',
				'faq_items_spacing' => '{"unit":"em","size":"0.3"}',
				'faq_items_sep' => '',
				'faq_items_sep_color' => '#888888',
				'faq_items_rounded' => '',
				'faq_shadow' => '',
				'faq_question_shadow' => '',
				'faq_items_height' => 'min',
				'faq_controls_margin_top' => '{"unit":"em","size":"1.2"}',
				'faq_controls_margin_bottom' => '{"unit":"em","size":"2"}',
				'faq_controls_margin_left' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_right' => '{"unit":"em","size":"1"}',
				'show_faq_toggle_all_icon' => '1',
				'faq_toggle_all_icon' => 'fa-angle-right',
				'faq_toggle_all_icon_open' => 'fa-angle-down',
				'faq_toggle_all_bg' => '#ffffff',
				'faq_toggle_all_bg_hover' => '#ffffff',
				'faq_toggle_all_color' => '#333333',
				'show_faq_question_icon' => '1',
				'faq_question_icon' => 'fa-angle-right',
				'faq_question_icon_open_action' => 'rotate',
				'faq_question_open_icon' => 'fa-minus-circle',
				'faq_question_bg' => '#ffffff',
				'faq_question_bg_hover' => '#f7f7f7',
				'faq_question_color' => '#606979',
				'faq_answer_bg' => '#ffffff',
				'faq_answer_color' => '#606979',
				'faq_answer_shadow' => '',
				'faq_category_margin_top' => '{"unit":"em","size":"1"}',
				'faq_category_margin_bottom' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_left' => '{"unit":"em","size":"0.7"}',
				'faq_category_color' => '#000000',
				'faq_count_bg' => '#e0e0e0',
				'faq_count_color' => '#000000',
				'faq_filter_theme' => 'invisible',
				'show_faq_filter_icon' => '1',
				'faq_filter_icon' => 'fa-filter',
				'faq_filter_clear_icon' => 'fa-times-circle',
				'faq_no_results_bg' => '#f7f7f7',
				'faq_no_results_color' => '#333',
				'rating_buttons_style' => 'sq_trans',
				'rating_shadow' => 'blurred',
				'like_icon' => 'fa-heart',
				'like_color' => '#53c651',
				'rating_likes_shadow_color' => '#439e3f',
				'like_inverse_color' => '#fff',
				'dislike_icon' => 'fa-meh-o',
				'dislike_color' => '#f8372d',
				'rating_dislikes_shadow_color' => '#c43023',
				'dislike_inverse_color' => '#fff',
				'rating_message_bg' => '#f7f7f7',
				'rating_message_color' => '#888',
				'rating_message_border_color' => '#eee',
				'rating_total_color' => '#858585',
				'feedback_submit_bg' => '#4bb7e5',
				'feedback_submit_color' => '#ffffff',
				'feedback_message_bg' => '#f7f7f7',
				'feedback_message_color' => '#888',
				'feedback_message_border_color' => '#eee',
			),
			/**
			 * Dark Boxed
			 */
			'theme4' => array(
				'faq_bg' => '#2f3d47',
				'faq_filter_bg' => '#f7f7f7',
				'faq_filter_color' => '#4c6b7c',
				'question_font_size' => '{"unit":"em","size":"1.3"}',
				'category_font_size' => '{"unit":"em","size":"1.3"}',
				'toggle_all_font_size' => '{"unit":"em","size":"1.3"}',
				'faq_items_spacing' => '{"unit":"em","size":"0"}',
				'faq_items_sep' => '1',
				'faq_items_sep_color' => '#4c6b7c',
				'faq_items_rounded' => '',
				'faq_shadow' => '1',
				'faq_question_shadow' => '',
				'faq_items_height' => 'high',
				'faq_controls_margin_top' => '{"unit":"em","size":"3"}',
				'faq_controls_margin_bottom' => '{"unit":"em","size":"2"}',
				'faq_controls_margin_left' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_right' => '{"unit":"em","size":"1"}',
				'show_faq_toggle_all_icon' => '1',
				'faq_toggle_all_icon' => 'fa-angle-right',
				'faq_toggle_all_icon_open' => 'fa-angle-down',
				'faq_toggle_all_bg' => '#485c69',
				'faq_toggle_all_bg_hover' => '#4a657a',
				'faq_toggle_all_color' => '#ffffff',
				'show_faq_question_icon' => '1',
				'faq_question_icon' => 'fa-question-circle',
				'faq_question_icon_open_action' => 'change',
				'faq_question_open_icon' => 'fa-check-circle',
				'faq_question_bg' => '#485c69',
				'faq_question_bg_hover' => '#4a657a',
				'faq_question_color' => '#ffffff',
				'faq_answer_bg' => '#2f3d47',
				'faq_answer_color' => '#c4cfc6',
				'faq_answer_shadow' => '',
				'faq_category_margin_top' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_bottom' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_left' => '{"unit":"em","size":"0.7"}',
				'faq_category_color' => '#ffffff',
				'faq_count_bg' => '#4a657a',
				'faq_count_color' => '#ffffff',
				'faq_filter_theme' => 'round',
				'show_faq_filter_icon' => '1',
				'faq_filter_icon' => 'fa-filter',
				'faq_filter_clear_icon' => 'fa-times-circle',
				'faq_no_results_bg' => '#f7f7f7',
				'faq_no_results_color' => '#333',
				'rating_buttons_style' => 'circle',
				'rating_shadow' => 'none',
				'like_icon' => 'fa-heart',
				'like_color' => '#53c651',
				'rating_likes_shadow_color' => '#439e3f',
				'like_inverse_color' => '#fff',
				'dislike_icon' => 'fa-meh-o',
				'dislike_color' => '#dd4b39',
				'rating_dislikes_shadow_color' => '#ba3730',
				'dislike_inverse_color' => '#fff',
				'rating_message_bg' => '#485c69',
				'rating_message_color' => '#c4cfc6',
				'rating_message_border_color' => '#485c69',
				'rating_total_color' => '#e0e0e0',
				'feedback_submit_bg' => '#53c651',
				'feedback_submit_color' => '#ffffff',
				'feedback_message_bg' => '#485c69',
				'feedback_message_color' => '#c4cfc6',
				'feedback_message_border_color' => '#485c69',
			),
			/**
			 * Vibrant Orange
			 */
			'theme5' => array(
				'faq_bg' => '#ffffff',
				'faq_filter_bg' => '#f7f7f7',
				'faq_filter_color' => '#43403e',
				'question_font_size' => '{"unit":"em","size":"1.3"}',
				'category_font_size' => '{"unit":"em","size":"1.3"}',
				'toggle_all_font_size' => '{"unit":"em","size":"1.3"}',
				'faq_items_spacing' => '{"unit":"em","size":"0"}',
				'faq_items_sep' => '1',
				'faq_items_sep_color' => '#d1784f',
				'faq_items_rounded' => '',
				'faq_shadow' => '1',
				'faq_question_shadow' => '',
				'faq_items_height' => 'medium',
				'faq_controls_margin_top' => '{"unit":"em","size":"2"}',
				'faq_controls_margin_bottom' => '{"unit":"em","size":"2"}',
				'faq_controls_margin_left' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_right' => '{"unit":"em","size":"1"}',
				'show_faq_toggle_all_icon' => '1',
				'faq_toggle_all_icon' => 'fa-plus',
				'faq_toggle_all_icon_open' => 'fa-minus',
				'faq_toggle_all_bg' => '#f68d5d',
				'faq_toggle_all_bg_hover' => '#f68d5d',
				'faq_toggle_all_color' => '#ffffff',
				'show_faq_question_icon' => '1',
				'faq_question_icon' => 'fa-plus',
				'faq_question_icon_open_action' => 'change',
				'faq_question_open_icon' => 'fa-minus',
				'faq_question_bg' => '#f68d5d',
				'faq_question_bg_hover' => '#f68d5d',
				'faq_question_color' => '#ffffff',
				'faq_answer_bg' => '#f7f7f7',
				'faq_answer_color' => '#43403e',
				'faq_answer_shadow' => '1',
				'faq_category_margin_top' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_bottom' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_left' => '{"unit":"em","size":"0.7"}',
				'faq_category_color' => '#43403e',
				'faq_count_bg' => '#f68d5d',
				'faq_count_color' => '#ffffff',
				'faq_filter_theme' => 'round',
				'show_faq_filter_icon' => '1',
				'faq_filter_icon' => 'fa-filter',
				'faq_filter_clear_icon' => 'fa-times-circle',
				'faq_no_results_bg' => '#f7f7f7',
				'faq_no_results_color' => '#333',
				'rating_buttons_style' => 'sq',
				'rating_shadow' => 'blurred',
				'like_icon' => 'fa-heart',
				'like_color' => '#afe350',
				'rating_likes_shadow_color' => '#91bc42',
				'like_inverse_color' => '#fff',
				'dislike_icon' => 'fa-meh-o',
				'dislike_color' => '#f87171',
				'rating_dislikes_shadow_color' => '#c95c5c',
				'dislike_inverse_color' => '#fff',
				'rating_message_bg' => '#e8e8e8',
				'rating_message_color' => '#43403e',
				'rating_message_border_color' => '#f0f0f0',
				'rating_total_color' => '#808080',
				'feedback_submit_bg' => '#53c7eb',
				'feedback_submit_color' => '#ffffff',
				'feedback_message_bg' => '#e8e8e8',
				'feedback_message_color' => '#43403e',
				'feedback_message_border_color' => '#f0f0f0',
			),
			/**
			 * Rounded Blue
			 */
			'theme6' => array(
				'faq_bg' => 'rgba(255,255,255,0)',
				'faq_filter_bg' => '#ffffff',
				'faq_filter_color' => '#333333',
				'question_font_size' => '{"unit":"em","size":"1.3"}',
				'category_font_size' => '{"unit":"em","size":"1.3"}',
				'toggle_all_font_size' => '{"unit":"em","size":"1.3"}',
				'faq_items_spacing' => '{"unit":"em","size":"0.6"}',
				'faq_items_sep' => '',
				'faq_items_sep_color' => '#888888',
				'faq_items_rounded' => '1',
				'faq_shadow' => '',
				'faq_question_shadow' => '1',
				'faq_items_height' => 'medium',
				'faq_controls_margin_top' => '{"unit":"em","size":"1.2"}',
				'faq_controls_margin_bottom' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_left' => '{"unit":"em","size":"0"}',
				'faq_controls_margin_right' => '{"unit":"em","size":"0"}',
				'show_faq_toggle_all_icon' => '1',
				'faq_toggle_all_icon' => 'fa-plus-circle',
				'faq_toggle_all_icon_open' => 'fa-minus-circle',
				'faq_toggle_all_bg' => '#f1a322',
				'faq_toggle_all_bg_hover' => '#f2af43',
				'faq_toggle_all_color' => '#ffffff',
				'show_faq_question_icon' => '1',
				'faq_question_icon' => 'fa-plus-circle',
				'faq_question_icon_open_action' => 'change',
				'faq_question_open_icon' => 'fa-minus-circle',
				'faq_question_bg' => '#196a9f',
				'faq_question_bg_hover' => '#1b77b5',
				'faq_question_color' => '#ffffff',
				'faq_answer_bg' => '#f7f8f9',
				'faq_answer_color' => '#333333',
				'faq_answer_shadow' => '',
				'faq_category_margin_top' => '{"unit":"em","size":"2"}',
				'faq_category_margin_bottom' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_left' => '{"unit":"em","size":"0.7"}',
				'faq_category_color' => '#000000',
				'faq_count_bg' => '#196a9f',
				'faq_count_color' => '#ffffff',
				'faq_filter_theme' => 'invisible',
				'show_faq_filter_icon' => '1',
				'faq_filter_icon' => 'fa-filter',
				'faq_filter_clear_icon' => 'fa-times-circle',
				'faq_no_results_bg' => '#f7f7f7',
				'faq_no_results_color' => '#333',
				'rating_buttons_style' => 'circle',
				'rating_shadow' => 'blurred',
				'like_icon' => 'fa-smile-o',
				'like_color' => '#3597d3',
				'rating_likes_shadow_color' => '#2a77a8',
				'like_inverse_color' => '#ffffff',
				'dislike_icon' => 'fa-frown-o',
				'dislike_color' => '#ff6363',
				'rating_dislikes_shadow_color' => '#d35252',
				'dislike_inverse_color' => '#ffffff',
				'rating_message_bg' => '#f7f7f7',
				'rating_message_color' => '#888',
				'rating_message_border_color' => '#eee',
				'rating_total_color' => '#858585',
				'feedback_submit_bg' => '#f1a322',
				'feedback_submit_color' => '#ffffff',
				'feedback_message_bg' => '#f7f7f7',
				'feedback_message_color' => '#888',
				'feedback_message_border_color' => '#eee',
			),
			/**
			 * Corporate Light
			 */
			'theme7' => array(
				'faq_bg' => 'rgba(255,255,255,0)',
				'faq_filter_bg' => 'rgba(255,255,255,0)',
				'faq_filter_color' => '#333333',
				'question_font_size' => '{"unit":"em","size":"1.3"}',
				'category_font_size' => '{"unit":"em","size":"1.3"}',
				'toggle_all_font_size' => '{"unit":"em","size":"1.3"}',
				'faq_items_spacing' => '{"unit":"em","size":"0.6"}',
				'faq_items_sep' => '',
				'faq_items_sep_color' => '#888888',
				'faq_items_rounded' => '',
				'faq_shadow' => '',
				'faq_question_shadow' => '',
				'faq_items_height' => 'medium',
				'faq_controls_margin_top' => '{"unit":"em","size":"1.2"}',
				'faq_controls_margin_bottom' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_left' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_right' => '{"unit":"em","size":"1"}',
				'show_faq_toggle_all_icon' => '',
				'faq_toggle_all_icon' => 'fa-plus-circle',
				'faq_toggle_all_icon_open' => 'fa-minus-circle',
				'faq_toggle_all_bg' => '#ffffff',
				'faq_toggle_all_bg_hover' => '#ffffff',
				'faq_toggle_all_color' => '#333333',
				'show_faq_question_icon' => '',
				'faq_question_icon' => 'fa-plus-circle',
				'faq_question_icon_open_action' => 'change',
				'faq_question_open_icon' => 'fa-minus-circle',
				'faq_question_bg' => '#dfe0e2',
				'faq_question_bg_hover' => '#d4d4d6',
				'faq_question_color' => '#000000',
				'faq_answer_bg' => '#f7f8f9',
				'faq_answer_color' => '#333333',
				'faq_answer_shadow' => '',
				'faq_category_margin_top' => '{"unit":"em","size":"2"}',
				'faq_category_margin_bottom' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_left' => '{"unit":"em","size":"0.7"}',
				'faq_category_color' => '#656769',
				'faq_count_bg' => '#ffffff',
				'faq_count_color' => '#333333',
				'faq_filter_theme' => 'invisible',
				'show_faq_filter_icon' => '1',
				'faq_filter_icon' => 'fa-search',
				'faq_filter_clear_icon' => 'fa-times-circle',
				'faq_no_results_bg' => '#f7f7f7',
				'faq_no_results_color' => '#333',
				'rating_buttons_style' => 'sq',
				'rating_shadow' => 'blurred',
				'like_icon' => 'fa-thumbs-o-up',
				'like_color' => '#ffffff',
				'rating_likes_shadow_color' => '#a5a7a9',
				'like_inverse_color' => '#333333',
				'dislike_icon' => 'fa-thumbs-o-down',
				'dislike_color' => '#ffffff',
				'rating_dislikes_shadow_color' => '#a5a7a9',
				'dislike_inverse_color' => '#333333',
				'rating_message_bg' => '#f7f7f7',
				'rating_message_color' => '#888',
				'rating_message_border_color' => '#eee',
				'rating_total_color' => '#858585',
				'feedback_submit_bg' => '#144878',
				'feedback_submit_color' => '#ffffff',
				'feedback_message_bg' => '#f7f7f7',
				'feedback_message_color' => '#888',
				'feedback_message_border_color' => '#eee',
			),
			/**
			 * Vibrant Blue
			 */
			'theme8' => array(
				'faq_bg' => '#fff',
				'faq_filter_bg' => '#fff',
				'faq_filter_color' => '#333333',
				'question_font_size' => '{"unit":"em","size":"1.3"}',
				'category_font_size' => '{"unit":"em","size":"1.3"}',
				'toggle_all_font_size' => '{"unit":"em","size":"1.3"}',
				'faq_items_spacing' => '{"unit":"em","size":"0"}',
				'faq_items_sep' => '1',
				'faq_items_sep_color' => '#dddddd',
				'faq_items_rounded' => '',
				'faq_shadow' => '1',
				'faq_question_shadow' => '',
				'faq_items_height' => 'high',
				'faq_controls_margin_top' => '{"unit":"em","size":"3"}',
				'faq_controls_margin_bottom' => '{"unit":"em","size":"2"}',
				'faq_controls_margin_left' => '{"unit":"em","size":"1"}',
				'faq_controls_margin_right' => '{"unit":"em","size":"1"}',
				'show_faq_toggle_all_icon' => '',
				'faq_toggle_all_icon' => 'fa-plus-circle',
				'faq_toggle_all_icon_open' => 'fa-minus-circle',
				'faq_toggle_all_bg' => '#0794c7',
				'faq_toggle_all_bg_hover' => '#087ca7',
				'faq_toggle_all_color' => '#ffffff',
				'show_faq_question_icon' => '1',
				'faq_question_icon' => 'fa-folder',
				'faq_question_icon_open_action' => 'change',
				'faq_question_open_icon' => 'fa-folder-open',
				'faq_question_bg' => '#ffffff',
				'faq_question_bg_hover' => '#f8f8f8',
				'faq_question_color' => '#505657',
				'faq_answer_bg' => '#0794c7',
				'faq_answer_color' => '#f8f8f8',
				'faq_answer_shadow' => '1',
				'faq_category_margin_top' => '{"unit":"em","size":"1"}',
				'faq_category_margin_bottom' => '{"unit":"em","size":"0.3"}',
				'faq_category_margin_left' => '{"unit":"em","size":"0.7"}',
				'faq_category_color' => '#000000',
				'faq_count_bg' => '#087ca7',
				'faq_count_color' => '#ffffff',
				'faq_filter_theme' => 'round',
				'show_faq_filter_icon' => '1',
				'faq_filter_icon' => 'fa-filter',
				'faq_filter_clear_icon' => 'fa-times-circle',
				'faq_no_results_bg' => '#f7f7f7',
				'faq_no_results_color' => '#333',
				'rating_buttons_style' => 'sq',
				'rating_shadow' => 'solid',
				'like_icon' => 'fa-thumbs-o-up',
				'like_color' => '#00be6d',
				'rating_likes_shadow_color' => '#009152',
				'like_inverse_color' => '#ffffff',
				'dislike_icon' => 'fa-thumbs-o-down',
				'dislike_color' => '#db3d3d',
				'rating_dislikes_shadow_color' => '#b53232',
				'dislike_inverse_color' => '#ffffff',
				'rating_message_bg' => '#087ca7',
				'rating_message_color' => '#ffffff',
				'rating_message_border_color' => '#087ca7',
				'rating_total_color' => '#e8e8e8',
				'feedback_submit_bg' => '#00be6d',
				'feedback_submit_color' => '#ffffff',
				'feedback_message_bg' => '#087ca7',
				'feedback_message_color' => '#ffffff',
				'feedback_message_border_color' => '#087ca7',
			)
		);
	}
}
