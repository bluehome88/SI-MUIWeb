<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
	/**
	 * @var array $atts
	 */
}
?>

<div class="list-style-classic <?php echo esc_attr( $atts[ 'class' ] ); ?>">
	<h3 class="classic-title"><?php echo esc_html( $atts[ 'title' ] ) ?></h3>
	<ul>
		<?php foreach ( (array) $atts[ 'list_items' ] as $list_item ) : ?>
			<li class="clearfix">
				<div class="case-info-label"><?php echo esc_html( $list_item[ 'name' ] ) ?></div>
				<div class="case-info-content"><?php echo esc_html( $list_item[ 'details' ] ) ?></div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>




