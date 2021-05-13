<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

/**
 * Dashboard page controller
 * Class DashboardPage
 */

namespace KSCF;

class DashboardPage {

	private $analytics;

	const SCREEN_BASE = 'kscf_faq_page_faq-analytics';

	public function __construct($deps) {

		$this->setup_dependencies( $deps );

		add_action( 'admin_menu', array( $this, 'add_submenu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_assets' ) );
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
	 * Adds dashboard submenu page
	 */
	public function add_submenu() {
		add_submenu_page(
			'edit.php?post_type=' . FAQ_CPT,
			__( 'Dashboard', 'candy-faq' ),
			__( 'Dashboard', 'candy-faq' ),
			'manage_options',
			'faq-analytics',
			array( $this, 'submenu_html' )
		);
	}

	/**
	 * Gets dashboard page html
	 */
	public function submenu_html() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.', 'candy-faq' ) );
		}

		?>
		<div class="mkb-admin-page-header">
			<span class="mkb-header-logo mkb-header-item" data-version="v<?php echo esc_attr(PLUGIN_VERSION); ?>">
				<img class="logo-img" src="<?php echo esc_attr( IMG_URL . 'logo.png' ); ?>" title="logo"/>
			</span>
			<span class="mkb-header-title mkb-header-item"><?php _e( 'Dashboard', 'candy-faq' ); ?></span>
		</div>

		<div id="mkb-dashboard">
			<div class="mkb-dashboard__tabs">
				<ul class="mkb-dashboard__tabs-list">
					<li><a href="#dashboard_general"
					       class="fn-dashboard-tab-link mkb-dashboard__tabs-list-item mkb-dashboard__tabs-list-item--active"
					       title="<?php esc_attr_e('Overview', 'candy-faq'); ?>">
							<?php _e( 'Overview', 'candy-faq' ); ?>
						</a>
					</li>
					<li><a href="#dashboard_feedback" class="fn-dashboard-tab-link mkb-dashboard__tabs-list-item"
					       title="<?php esc_attr_e('Feedback', 'candy-faq'); ?>">
							<?php _e( 'Feedback', 'candy-faq' ); ?>
						</a>
					</li>
					<li><a href="#dashboard_reset" class="fn-dashboard-tab-link mkb-dashboard__tabs-list-item"
					       title="<?php esc_attr_e('Reset', 'candy-faq'); ?>">
							<?php _e( 'Reset', 'candy-faq' ); ?>
						</a>
					</li>
				</ul>
			</div>
			<div class="mkb-dashboard__content">
				<div id="dashboard_general" class="mkb-dashboard-page mkb-dashboard-page--active">
					<?php self::render_counters(); ?>
					<?php self::render_graph(); ?>
					<?php self::render_lists(); ?>
				</div>
				<div id="dashboard_feedback" class="mkb-dashboard-page">
					<?php self::render_feedback(); ?>
				</div>
				<div id="dashboard_reset" class="mkb-dashboard-page">
					<?php self::render_reset(); ?>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Dashboard overview counters
	 */
	protected function render_counters() {
		?>
		<div class="mkb-dashboard__counters mkb-dashboard__counters-4col">

			<!-- Questions -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Questions', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<span class="counter-icon"><i class="fa fa-question"></i></span>
						<span id="mkb_total_articles_count"
						      class="mkb-value-epic fn-mkb-counter"
						      data-target="<?php echo esc_attr( $this->analytics->get_articles_count() ); ?>">0
						</span>
					</div>
				</div>
			</div>

			<!-- Categories -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Categories', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<span class="counter-icon"><i class="fa fa-folder"></i></span>
						<span id="mkb_total_categories_count"
						      class="mkb-value-epic fn-mkb-counter"
						      data-target="<?php echo esc_attr( $this->analytics->get_topics_count() ); ?>">0
						</span>
					</div>
				</div>
			</div>

			<!-- Views -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Views', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<span class="counter-icon" style="color: #0073aa;"><i class="fa fa-eye"></i></span>
						<span id="mkb_total_views_count"
						      class="mkb-value-epic fn-mkb-counter"
						      data-target="<?php echo esc_attr( $this->analytics->get_views_count() ); ?>">0
						</span>
					</div>
				</div>
			</div>

			<!-- Likes -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Likes', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<span class="counter-icon" style="color: #4BB651;"><i class="fa fa-smile-o"></i></span>
						<span style="color: #4BB651;"
						      id="mkb_total_likes_count"
						      class="mkb-value-epic fn-mkb-counter"
						      data-target="<?php echo esc_attr( $this->analytics->get_likes_count() ); ?>">0
						</span>
					</div>
				</div>
			</div>

			<!-- Dislikes -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Dislikes', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<span class="counter-icon" style="color: #C85C5E;"><i class="fa fa-frown-o"></i></span>
						<span style="color: #C85C5E;"
						      id="mkb_total_dislikes_count"
						      class="mkb-value-epic fn-mkb-counter"
						      data-target="<?php echo esc_attr( $this->analytics->get_dislikes_count() ); ?>">0
						</span>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Dashboard overview graph
	 */
	private function render_graph() {
		?>
		<!-- Graph -->
		<div class="mkb-dashboard-widget mkb-dashboard-widget--fullwidth">
			<div class="mkb-dashboard-widget__inner">
				<div class="mkb-dashboard-widget__header">
					<div class="mkb-dashboard-widget__title">
						<h3><?php _e( 'Analytics', 'candy-faq' ); ?></h3>
					</div>
					<div>
						<label for="mkb-analytics-period"><?php _e( 'Select period', 'candy-faq' ); ?> </label>
						<select id="mkb-analytics-period">
							<option value="week"
							        selected="selected"><?php _e( 'Last 7 days', 'candy-faq' ); ?></option>
							<option value="month"><?php _e( 'Last 30 days', 'candy-faq' ); ?></option>
						</select>
						<br/>
						<br/>
					</div>
				</div>
				<div class="mkb-dashboard-widget__content">
					<div class="mkb-chart-holder">
						<canvas id="mkb-analytics-canvas"></canvas>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Dashboard recent entries lists
	 */
	private function render_lists() {
		?>
		<div class="mkb-dashboard__lists">
			<!-- Recent -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Recent questions', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<ul>
							<?php
							$recent = $this->analytics->get_recent_articles();

							if ( ! empty( $recent ) ):
								foreach ( $recent as $article ):
									?>
									<li>
										<a target="_blank" class="mkb-unstyled-link"
										   href="<?php echo esc_attr( $article["link"] ); ?>">
											<?php echo esc_html( $article["title"] ); ?>
										</a>
										<span class="mkb-value"><?php echo esc_html( $article["date"] ); ?></span>
									</li>
								<?php
								endforeach;
							else:
								?>
								<p class="mkb-no-entries"><?php _e( 'You have no questions yet', 'candy-faq' ); ?></p>
							<?php
							endif;
							?>
						</ul>
					</div>
				</div>
			</div>

			<!-- Top views -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Most viewed', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<ul>
							<?php
							$top_viewed = $this->analytics->get_most_viewed_articles();

							if ( ! empty( $top_viewed ) ):
								foreach ( $top_viewed as $article ):
									?>
									<li>
										<a target="_blank" class="mkb-unstyled-link"
										   href="<?php echo esc_attr( $article["link"] ); ?>">
											<?php echo esc_html( $article["title"] ); ?>
										</a>
										<span class="mkb-value"><?php echo esc_html( $article["views"] ); ?></span>
									</li>
								<?php
								endforeach;
							else:
								?>
								<p class="mkb-no-entries"><?php _e( 'You have no views yet', 'candy-faq' ); ?></p>
							<?php
							endif;
							?>
						</ul>
					</div>
				</div>
			</div>

			<!-- Top likes -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Most liked', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<ul>
							<?php
							$top_liked = $this->analytics->get_most_liked_articles();

							if ( ! empty( $top_liked ) ):
								foreach ( $top_liked as $article ):
									?>
									<li>
										<a target="_blank" class="mkb-unstyled-link"
										   href="<?php echo esc_attr( $article["link"] ); ?>">
											<?php echo esc_html( $article["title"] ); ?>
										</a>
										<span class="mkb-value"><?php echo esc_html( $article["likes"] ); ?></span>
									</li>
								<?php
								endforeach;
							else:
								?>
								<p class="mkb-no-entries"><?php _e( 'You have no likes yet', 'candy-faq' ); ?></p>
							<?php
							endif;
							?>
						</ul>
					</div>
				</div>
			</div>

			<!-- Top dislikes -->
			<div class="mkb-dashboard-widget">
				<div class="mkb-dashboard-widget__inner">
					<div class="mkb-dashboard-widget__header">
						<div class="mkb-dashboard-widget__title">
							<h3><?php _e( 'Most disliked', 'candy-faq' ); ?></h3>
						</div>
					</div>
					<div class="mkb-dashboard-widget__content">
						<ul>
							<?php
							$top_disliked = $this->analytics->get_most_disliked_articles();

							if ( ! empty( $top_disliked ) ):
								foreach ( $top_disliked as $article ):
									?>
									<li>
										<a target="_blank" class="mkb-unstyled-link"
										   href="<?php echo esc_attr( $article["link"] ); ?>">
											<?php echo esc_html( $article["title"] ); ?>
										</a>
										<span class="mkb-value"><?php echo esc_html( $article["dislikes"] ); ?></span>
									</li>
								<?php
								endforeach;
							else:
								?>
								<p class="mkb-no-entries"><?php _e( 'You have no dislikes yet', 'candy-faq' ); ?></p>
							<?php
							endif;
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Renders submitted feedback
	 */
	private function render_feedback() {
		$feedback = $this->analytics->get_feedback();
		?>
		<div class="mkb-dashboard__feedback"><?php
			if ( sizeof( $feedback ) ): ?>
				<table class="mkb-dashboard__feedback-table" cellspacing="0" cellpadding="0">
					<tr>
						<th><i class="fa fa-close"></i></th>
						<th><?php _e( 'Message', 'candy-faq' ); ?></th>
						<th><?php _e( 'For article', 'candy-faq' ); ?></th>
						<th><?php _e( 'Date', 'candy-faq' ); ?></th>
					</tr>
					<?php
					foreach ( $feedback as $item ):
						?>
						<tr class="mkb-dashboard__feedback-item-row">
							<td>
								<a href="#"
								   data-id="<?php echo esc_attr( $item["feedback_id"] ); ?>"
								   class="fn-remove-feedback mkb-dashboard__feedback-remove-item-link"
								   title="<?php esc_attr_e( 'Remove this entry?', 'candy-faq' ); ?>">
									<i class="fa fa-close"></i>
								</a>
							</td>
							<td class="mkb-dashboard__feedback-item-content">
								<?php echo esc_html( $item["content"] ); ?>
							</td>
							<td>
								<a href="<?php echo esc_url(get_permalink($item["article_id"])); ?>">
									<?php echo get_the_title( $item["article_id"] ); ?>
								</a>
							</td>
							<td>
								<?php echo esc_html( $item["date"] ); ?>
							</td>
						</tr>
					<?php
					endforeach; ?>
				</table>
			<?php
			else:
				?><p class="mkb-no-entries">
				<?php _e( 'No feedback was submitted for your content yet', 'candy-faq' ); ?>
				</p><?php
			endif;
			?></div>
	<?php
	}

	/**
	 * Renders reset
	 */
	private function render_reset() {
		$options = array(
			array(
				'id' => 'views',
				'type' => 'checkbox',
				'label' => __( 'Reset views?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'likes',
				'type' => 'checkbox',
				'label' => __( 'Reset likes?', 'candy-faq' ),
				'default' => false
			),
			array(
				'id' => 'dislikes',
				'type' => 'checkbox',
				'label' => __( 'Reset dislikes?', 'candy-faq' ),
				'default' => false
			),
		);
		$settings_helper = new SettingsBuilder(array("no_tabs" => true));

		?>
		<div class="mkb-dashboard__reset mkb-clearfix">
			<h2><?php _e( 'Select data to reset', 'candy-faq' ); ?></h2>

			<div class="mkb-settings-content fn-mkb-dashboard-reset-form">
				<form action="" novalidate>
					<?php
					foreach ($options as $option):
						$settings_helper->render_option(
							$option["type"],
							$option["default"],
							$option
						);
					endforeach;
					?>
					<a href="#" class="mkb-action-button mkb-action-danger fn-mkb-reset-stats-btn"
					   title="<?php esc_attr_e('Reset data', 'candy-faq'); ?>"><?php echo __('Reset data', 'candy-faq'); ?></a>
				</form>
			</div>
		</div>
	<?php
	}

	/**
	 * Loads admin assets
	 */
	public function load_assets() {

		$screen = get_current_screen();

		if ( $screen->base !== self::SCREEN_BASE ) {
			return;
		}

		// toastr
		wp_enqueue_style( CSS_PREFIX . 'admin-toastr', PLUGIN_URL . 'assets/css/vendor/toastr/toastr.min.css', false, '2.1.3' );
		wp_enqueue_script( JS_PREFIX . 'admin-toastr', PLUGIN_URL . 'assets/js/vendor/toastr/toastr.min.js', array(), '2.1.3', true );

		wp_enqueue_script( JS_PREFIX . 'admin-dashboard-chart', PLUGIN_URL . 'assets/js/vendor/chart.bundle.min.js', array(), null, true );
		wp_enqueue_script( JS_PREFIX . 'admin-dashboard-counter', PLUGIN_URL . 'assets/js/vendor/count-up.min.js', array(), null, true );
		wp_enqueue_script( JS_PREFIX . 'admin-dashboard', PLUGIN_URL . 'assets/js/admin/dashboard.js', array(
			'jquery',
			JS_PREFIX . 'admin-ui',
			JS_PREFIX . 'admin-toastr',
			JS_PREFIX . 'admin-dashboard-chart'
		), null, true );

		wp_localize_script( JS_PREFIX . 'admin-dashboard', PLUGIN_VAR . '_Dashboard', array(
				'graphDates' => $this->analytics->get_recent_week_dates(),
				'graphViews' => $this->analytics->get_recent_week_views(),
				'graphLikes' => $this->analytics->get_recent_week_likes(),
				'graphDislikes' => $this->analytics->get_recent_week_dislikes(),
			)
		);
	}
}