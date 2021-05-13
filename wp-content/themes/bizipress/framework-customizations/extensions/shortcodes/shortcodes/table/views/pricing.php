<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
$class_width = 'fw-col-md-' . ceil( 12 / count( $atts[ 'table' ][ 'cols' ] ) );
?>

<?php foreach ( $atts[ 'table' ][ 'cols' ] as $col_key => $col ): ?>
	<?php
	$colx = $col[ 'name' ];
	if ( $colx == 'highlight-col' ) {
		$colm = 'featured';
	} else {
		$colm = $colx;
	}
	?>
<div class="<?php echo esc_attr($class_width) . ' ' . esc_attr($col[ 'name' ]); ?> ">
	<div class="plan text-center <?php echo esc_attr($colm); ?> wow fadeInUp" data-wow-delay=".5s">
			<?php foreach ( $atts[ 'table' ][ 'rows' ] as $row_key => $row ): ?>
				<?php if ( $row[ 'name' ] === 'heading-row' ): ?>
					<?php $heading	 = esc_html( $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'heading' ] ); ?>
					<?php $sub_heading = esc_html( $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'sub_heading' ] ); ?>

					<h2 class="plan-name"><?php echo (empty( $heading ) && $col[ 'name' ] === 'desc-col') ? '&nbps;' : $heading; ?><small><?php echo (empty( $sub_heading ) && $col[ 'name' ] === 'desc-col') ? '&nbps;' : $sub_heading; ?></small></h2>

				<?php elseif ( $row[ 'name' ] == 'switch-row' ) : ?>
					<?php $button_text = esc_html( $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'button_text' ] ); ?>
					<div class="offer-action">
						<button class="btn btn-lg show-appointment-modal" data-service=""><?php echo (empty( $button_text ) && $col[ 'name' ] === 'desc-col') ? '&nbps;' : $button_text; ?></button>
					</div>

				<?php elseif ( $row[ 'name' ] == 'button-row' ) : ?>
					<?php $button = fw_ext( 'shortcodes' )->get_shortcode( 'button' ); ?>

					<?php if ( false === empty( $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'button' ] ) and false === empty( $button ) ) : ?>
						<?php echo bizipress_return($button->render( $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'button' ] )); ?>
					<?php else : ?>
						<span>&nbsp;</span>
					<?php endif; ?>

				<?php elseif ( $row[ 'name' ] == 'pricing-row' ) : ?>
					<?php $currency	 = esc_html( $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'currency' ] ); ?>
					<?php $amount		 = esc_html( $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'amount' ] ); ?>

					<h3 class="plan-price"><sup class="currency">
						<?php echo (empty( $currency ) && $col[ 'name' ] === 'desc-col') ? '&nbps;' : $currency; ?></sup>
						<strong><?php echo (empty( $amount ) && $col[ 'name' ] === 'desc-col') ? '&nbps;' : $amount; ?></strong>
						<sub><?php echo esc_html( $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'description' ] ); ?></sub>
					</h3>

				<?php elseif ( $row[ 'name' ] === 'default-row' ) : ?>
					<ul class="list-unstyled">
						<?php $value = $atts[ 'table' ][ 'content' ][ $row_key ][ $col_key ][ 'textarea' ]; ?>
						<li><?php echo wp_kses_post( $value ) ?></li>
					</ul>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endforeach; ?>
