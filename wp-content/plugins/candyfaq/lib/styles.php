<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

class DynamicStyles {

	private $info;

	/**
	 * Constructor
	 * @param $deps
	 */
	public function __construct($deps) {
		$this->setup_dependencies( $deps );
	}

	/**
	 * Sets up dependencies
	 * @param $deps
	 */
	private function setup_dependencies($deps) {
		if (isset($deps['info'])) {
			$this->info = $deps['info'];
		}
	}

	/**
	 * Returns minified inline css
	 * @return mixed
	 */
	public function get_css () {
		ob_start();
		$this->print_css();
		return $this->css_compress(ob_get_clean());
	}

	/**
	 * Returns minified custom css
	 * @return mixed
	 */
	public function get_custom_css () {
		return $this->css_compress(Options::option('custom_css'));
	}

	/**
	 * Outputs all inline styles
	 */
	public function print_css() {

		if (!Options::option( 'use_system_font' )): ?>
			.kscf-faq {
				font-family: '<?php echo esc_attr(Options::option( 'style_font' )); ?>';
			}

			.kscf-faq ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
				font-family: '<?php echo esc_attr(Options::option( 'style_font' )); ?>';
			}

			.kscf-faq .kb-search ::-moz-placeholder { /* Firefox 19+ */
				font-family: '<?php echo esc_attr(Options::option( 'style_font' )); ?>';
			}

			.kscf-faq .kb-search :-ms-input-placeholder { /* IE 10+ */
				font-family: '<?php echo esc_attr(Options::option( 'style_font' )); ?>';
			}

			.kscf-faq .kb-search :-moz-placeholder { /* Firefox 18- */
				font-family: '<?php echo esc_attr(Options::option( 'style_font' )); ?>';
			}

		<?php endif; ?>

		.kscf-faq .kscf-faq-answer__content {
			font-size: <?php echo esc_attr(SettingsBuilder::css_size_to_string(Options::option( 'content_font_size' ))); ?>;
			line-height: <?php echo esc_attr(SettingsBuilder::css_size_to_string(Options::option( 'content_line_height' ))); ?>;
		}

		.kscf-faq .kscf-faq-question__title {
			font-size: <?php echo esc_attr(SettingsBuilder::css_size_to_string(Options::option( 'question_font_size' ))); ?>;
		}

		.kscf-faq .kscf-faq-category__title {
			font-size: <?php echo esc_attr(SettingsBuilder::css_size_to_string(Options::option( 'category_font_size' ))); ?>;
		}

		.kscf-faq .kscf-faq-toggle-all .kscf-faq-toggle-all__link {
			font-size: <?php echo esc_attr(SettingsBuilder::css_size_to_string(Options::option( 'toggle_all_font_size' ))); ?>;
		}

		.kscf-faq {
			background: <?php echo esc_attr(Options::option( 'faq_bg' )); ?>;
		}

.kscf-faq-question {
	margin-bottom: <?php echo esc_attr(SettingsBuilder::css_size_to_string(Options::option( 'faq_items_spacing' ))); ?>;
}

.kscf-faq-question__title {
	background: <?php echo esc_attr(Options::option( 'faq_question_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'faq_question_color' )); ?>;

		<?php if (Options::option( 'faq_items_sep' )): ?>
			border-bottom: 1px solid <?php echo esc_attr(Options::option( 'faq_items_sep_color' )); ?>;
		<?php endif; ?>
}

.kscf-faq-question__title:hover {
	background: <?php echo esc_attr(Options::option( 'faq_question_bg_hover' )); ?>;
}

.kscf-faq-answer {
	background: <?php echo esc_attr(Options::option( 'faq_answer_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'faq_answer_color' )); ?>;
}

.kscf-faq__no-results {
	background: <?php echo esc_attr(Options::option( 'faq_no_results_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'faq_no_results_color' )); ?>;
}

.kscf-faq .kscf-faq-category__title {
	color: <?php echo esc_attr(Options::option( 'faq_category_color' )); ?>;
}

.kscf-faq-category__count {
	background: <?php echo esc_attr(Options::option( 'faq_count_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'faq_count_color' )); ?>;
}

.kscf-faq__controls {
	margin-top: <?php esc_attr_e(SettingsBuilder::css_size_to_string(Options::option('faq_controls_margin_top'))); ?>;
	margin-bottom: <?php esc_attr_e(SettingsBuilder::css_size_to_string(Options::option('faq_controls_margin_bottom'))); ?>;
	margin-left: <?php esc_attr_e(SettingsBuilder::css_size_to_string(Options::option('faq_controls_margin_left'))); ?>;
	margin-right: <?php esc_attr_e(SettingsBuilder::css_size_to_string(Options::option('faq_controls_margin_right'))); ?>;
}

.kscf-faq-filter .kscf-faq-filter__input {
	background: <?php echo esc_attr(Options::option( 'faq_filter_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'faq_filter_color' )); ?>;
}

.kscf-faq-toggle-all .kscf-faq-toggle-all__link,
.kscf-faq-toggle-all .kscf-faq-toggle-all__link:hover,
.kscf-faq-toggle-all .kscf-faq-toggle-all__link:active,
.kscf-faq-toggle-all .kscf-faq-toggle-all__link:focus,
.kscf-faq-toggle-all .kscf-faq-toggle-all__link:visited {
	background: <?php echo esc_attr(Options::option( 'faq_toggle_all_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'faq_toggle_all_color' )); ?>;
}

.kscf-faq-toggle-all .kscf-faq-toggle-all__link:hover {
	background: <?php echo esc_attr(Options::option( 'faq_toggle_all_bg_hover' )); ?>;
}

<?php
	$faq_category_margin_top = Options::option( 'faq_category_margin_top' );
	$faq_category_margin_bottom = Options::option( 'faq_category_margin_bottom' );
	$faq_category_margin_left = Options::option( 'faq_category_margin_left' );
?>

.kscf-faq-category__title {
	margin-top: <?php echo esc_attr(SettingsBuilder::css_size_to_string($faq_category_margin_top)); ?>;
	margin-bottom: <?php echo esc_attr(SettingsBuilder::css_size_to_string($faq_category_margin_bottom)); ?>;
	margin-left: <?php echo esc_attr(SettingsBuilder::css_size_to_string($faq_category_margin_left)); ?>;
}

		<?php
		/**
		 * Rating and feedback
		 */
		?>

.kscf-rating-message {
	border-color: <?php echo esc_attr(Options::option( 'rating_message_border_color' )); ?>;
	background: <?php echo esc_attr(Options::option( 'rating_message_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'rating_message_color' )); ?>;
}

.kscf-rating-btn.kscf-like,
.kscf-rating-btn.kscf-like:focus,
.kscf-rating-btn.kscf-like:active,
.kscf-rating-btn.kscf-like:visited,
.kscf-rating-btn.kscf-like:hover,
.kscf-rating-btn.kscf-like i {
	<?php if(in_array(Options::option('rating_buttons_style'), array('circle', 'rnd', 'sq'))): ?>
		background-color: <?php echo esc_attr(Options::option( 'like_color' )); ?>;
		color: <?php echo esc_attr(Options::option( 'like_inverse_color' )); ?>;
	<?php else: ?>
		color: <?php echo esc_attr(Options::option( 'like_color' )); ?>;
	<?php endif; ?>
}

.kscf-rating-shadow-solid .kscf-rating-btn.kscf-like {
    box-shadow: 1px 2px 0px <?php echo esc_attr(Options::option( 'rating_likes_shadow_color' )); ?>;
}

.kscf-rating-shadow-blurred .kscf-rating-btn.kscf-like {
	box-shadow: 1px 2px 5px <?php echo esc_attr(Options::option( 'rating_likes_shadow_color' )); ?>;
}

.kscf-rating-shadow-solid:not(.kscf-voted) .kscf-rating-btn.kscf-like:hover,
.kscf-rating-shadow-solid.kscf-voted .kscf-rating-btn.kscf-like,
.kscf-rating-shadow-blurred:not(.kscf-voted) .kscf-rating-btn.kscf-like:hover,
.kscf-rating-shadow-blurred.kscf-voted .kscf-rating-btn.kscf-like{
	margin-top: 1px;
	box-shadow: 1px 1px 0px <?php echo esc_attr(Options::option( 'rating_likes_shadow_color' )); ?>;
}

.kscf-rating-btn.kscf-dislike,
.kscf-rating-btn.kscf-dislike:focus,
.kscf-rating-btn.kscf-dislike:active,
.kscf-rating-btn.kscf-dislike:visited,
.kscf-rating-btn.kscf-dislike:hover,
.kscf-rating-btn.kscf-dislike i {
	<?php if (in_array(Options::option('rating_buttons_style'), array('circle', 'rnd', 'sq'))): ?>
		background-color: <?php echo esc_attr(Options::option( 'dislike_color' )); ?>;
		color: <?php echo esc_attr(Options::option( 'dislike_inverse_color' )); ?>;
	<?php else: ?>
		color: <?php echo esc_attr(Options::option( 'dislike_color' )); ?>;
	<?php endif; ?>
}

.kscf-rating-shadow-solid .kscf-rating-btn.kscf-dislike {
	box-shadow: 1px 2px 0px <?php echo esc_attr(Options::option( 'rating_dislikes_shadow_color' )); ?>;
}

.kscf-rating-shadow-blurred .kscf-rating-btn.kscf-dislike {
	box-shadow: 1px 2px 5px <?php echo esc_attr(Options::option( 'rating_dislikes_shadow_color' )); ?>;
}

.kscf-rating-shadow-solid:not(.kscf-voted) .kscf-rating-btn.kscf-dislike:hover,
.kscf-rating-shadow-solid.kscf-voted .kscf-rating-btn.kscf-dislike,
.kscf-rating-shadow-blurred:not(.kscf-voted) .kscf-rating-btn.kscf-dislike:hover,
.kscf-rating-shadow-blurred.kscf-voted .kscf-rating-btn.kscf-dislike {
	margin-top: 1px;
	box-shadow: 1px 1px 0px <?php echo esc_attr(Options::option( 'rating_dislikes_shadow_color' )); ?>;
}

.kscf-rating-total {
	color: <?php echo esc_attr(Options::option( 'rating_total_color' )); ?>;
}

		<?php
		/**
		 * Feedback
		 */
		?>

.kscf-feedback-sent-message {
	border-color: <?php echo esc_attr(Options::option( 'feedback_message_border_color' )); ?>;
	background: <?php echo esc_attr(Options::option( 'feedback_message_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'feedback_message_color' )); ?>;
}

.kscf-feedback-form .kscf-feedback-form__submit a {
	background: <?php echo esc_attr(Options::option( 'feedback_submit_bg' )); ?>;
	color: <?php echo esc_attr(Options::option( 'feedback_submit_color' )); ?>;
}

<?php

	}

	/**
	 * CSS minifier
	 * @param $minify
	 * @return mixed
	 */
	private function css_compress( $minify ) {
		/* remove tabs, newlines, and multiple spaces etc. */
		$minify = str_replace( array("\r\n", "\r", "\n", "\t"), '', $minify );
		$minify = str_replace( array("  ", "   ", "    "), ' ', $minify );

		return $minify;
	}
}
