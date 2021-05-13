<?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$funfact_style_settings	 = $atts[ 'funfact_style_settings' ];
$funfact_style			 = $funfact_style_settings[ 'funfact_style' ];

?>

<?php
if ( $funfact_style == 'funfact-1' ):
	$show_in_row = $funfact_style_settings[ 'funfact-1' ][ 'show-in-row' ];

	foreach ( (array) $funfact_style_settings[ 'funfact-1' ][ 'funfact-loop' ] as $funfact ) {
	
	?>
		<div class="col-md-<?php  echo esc_attr(12/$show_in_row) ?> facts-wrapper">
			<div class="facts">
				<?php if ( !empty( $funfact[ 'icon' ] ) ): ?>
					<span class="facts-icon"><i class="<?php echo esc_attr( $funfact[ 'icon' ] ); ?>"></i></span>
				<?php endif; ?>

				<?php if ( !empty( $funfact[ 'number' ] ) ): ?>
					<div class="facts-num">
						<h3 class="funfact">
							<span class="counterUp"><?php echo esc_html( $funfact[ 'number' ] ); ?></span>
						</h3>
					</div>
				<?php endif; ?>
				<?php if ( !empty( $funfact[ 'title' ] ) ): ?>
					<p><?php echo esc_html( $funfact[ 'title' ] ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	<?php }

elseif ( $funfact_style == 'funfact-3' ):
	$show_in_row = $funfact_style_settings[ 'funfact-3' ][ 'show-in-row' ];

	foreach ( (array) $funfact_style_settings[ 'funfact-3' ][ 'funfact-loop' ] as $funfact ) {
	
	?>
		<div class="col-md-<?php  echo esc_attr(12/$show_in_row) ?> ts-facts-col">
			<div class="facts">
				<?php if ( !empty( $funfact[ 'icon' ] ) ): ?>
					<span class="facts-icon"><i class="<?php echo esc_attr( $funfact[ 'icon' ] ); ?>"></i></span>
				<?php endif; ?>

				<?php if ( !empty( $funfact[ 'number' ] ) ): ?>
					<div class="facts-num">
						<h3 class="funfact">
							<span class="counterUp"><?php echo esc_html( $funfact[ 'number' ] ); ?></span>
						</h3>
					</div>
				<?php endif; ?>
				<?php if ( !empty( $funfact[ 'title' ] ) ): ?>
					<p><?php echo esc_html( $funfact[ 'title' ] ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	<?php }

elseif ( $funfact_style == 'funfact-2' ):
	$funfact_2 = $funfact_style_settings['funfact-2'];
	?>
	<div class="fact-box">
		<div class="text-center">
			<?php if ( !empty( $funfact_2[ 'icon' ] ) ): ?>
				<i class="<?php echo esc_attr( $funfact_2[ 'icon' ] ); ?>"></i>
			<?php endif; ?>

			<?php if ( !empty( $funfact_2[ 'number' ] ) ): ?>
				<h3 class="facts-num">
					<span class="counterUp"><?php echo esc_html( $funfact_2[ 'number' ] ); ?></span>
				</h3>
			<?php endif; ?>

			<?php if ( !empty( $funfact_2[ 'title' ] ) ): ?>
				<p><?php echo esc_html( $funfact_2[ 'title' ] ); ?></p>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>