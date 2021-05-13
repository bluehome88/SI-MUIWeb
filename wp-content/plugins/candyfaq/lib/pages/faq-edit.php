<?php
/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */

namespace KSCF;

class FAQEditScreen {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array($this, 'add_meta_boxes') );
	}

	/**
	 * Register article meta box(es).
	 */
	public function add_meta_boxes() {

		// feedback meta box
		add_meta_box(
			'kscf-faq-meta-feedback-id',
			__( 'Answer feedback', 'candy-faq' ),
			array($this, 'feedback_html'),
			FAQ_CPT,
			'normal',
			'high'
		);
	}

	/**
	 * Answer feedback list
	 * @param $post
	 */
	public function feedback_html( $post ) {
		$feedback_args = array(
			'posts_per_page'   => - 1,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'DATE',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => 'feedback_article_id',
			'meta_value'       => get_the_ID(),
			'post_type'        => FEEDBACK_CPT,
			'post_mime_type'   => '',
			'post_parent'      => '',
			'author'           => '',
			'author_name'      => '',
			'post_status'      => 'publish'
		);

		$feedback = get_posts( $feedback_args );

		if ( sizeof( $feedback ) ):
			foreach ( $feedback as $item ):
				?>
				<div class="mkb-article-feedback-item">
					<div class="mkb-article-feedback-item-inner">
						<a href="#"
						   data-id="<?php echo esc_attr( $item->ID ); ?>"
						   class="fn-remove-feedback mkb-article-feedback-item-remove"
						   title="<?php esc_attr_e( 'Remove this entry?', 'candy-faq' ); ?>">
							<i class="fa fa-close"></i>
						</a>
						<h4><?php echo esc_html( __('Submitted:', 'candy-faq' ) ); ?> <?php echo esc_html( $item->post_date ); ?></h4>

						<p><?php echo esc_html( $item->post_content ); ?></p>
					</div>
				</div>
			<?php
			endforeach;
		else:
			?>
			<p><?php echo esc_html( __( 'No feedback was submitted for this question', 'candy-faq' ) ); ?></p>
		<?php
		endif;
	}

}
