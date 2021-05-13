<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
	/**
	 * @var array $atts
	 */
}

?>

<div class="list-style-column <?php echo esc_attr( $atts[ 'class' ] ); ?>">
	<div class="col-md-6">
		<h3 class="list-column-title"><?php echo esc_html( $atts[ 'left_title' ] ) ?></h3>
		<div class="fw-list">
			<ul>
				<?php foreach ( (array) $atts[ 'left_list_items' ] as $list_item ) : ?>
					<li class="clearfix">
						<?php echo esc_html( $list_item ) ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="col-md-6">
		<h3 class="list-style-column "><?php echo esc_html( $atts[ 'right_title' ] ) ?></h3>
		<div class="fw-list">
			<ul>
				<?php foreach ( (array) $atts[ 'right_list_items' ] as $list_item ) : ?>
					<li class="clearfix">
						<?php echo esc_html( $list_item ) ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>




