<?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );

if ( isset( $data[ 'slides' ] ) ):
	?>
	<div id="box-slide" class="owl-carousel owl-theme page-slider mrt-110">
		<?php
		foreach ( $data[ 'slides' ] as $slide ):
			?>
			<div class="item"  style="background-image:url(<?php echo esc_url( $slide[ 'src' ] ); ?>)">
				<div class="container">
					<div class="box-slider-content">
						<div class="box-slider-text animated">
							<?php if ( !empty( $slide[ 'title' ] ) ) : ?>
								<h2 class="box-slide-title"><?php echo esc_html( $slide[ 'title' ] ); ?></h2>
								<?php
							endif;
							if ( !empty( $slide['extra'][ 'slider_subtitle' ] ) ) :
								?>
								<h3 class="box-slide-sub-title"><?php echo esc_html( $slide['extra'][ 'slider_subtitle' ] ); ?></h3>
								<?php
							endif;

							if ( !empty( $slide['extra'][ 'slider_desc' ] ) ) :
								?>
								<p class="box-slide-description">
									<?php echo esc_html( $slide['extra'][ 'slider_desc' ] ); ?>
									</p>
								<?php
							endif;
							?>
							<p class="animated3">
								<?php
								
								foreach ( $slide[ 'extra' ][ 'button_settings' ] as $btn ):
									
									?>
									<a target="<?php echo esc_html( $btn[ 'target' ] ); ?>" href="<?php echo esc_url( $btn[ 'link' ] ); ?>" class="slider <?php bizipress_theme_button_class( $btn[ 'style' ] ); ?>"> <?php echo wp_kses_post( $btn[ 'label' ] ); ?></a>
								<?php endforeach; ?>

							</p>

						</div>
					</div>
				</div>

			</div>

			<?php
		endforeach;
		?>
	</div>

<?php endif; ?>
