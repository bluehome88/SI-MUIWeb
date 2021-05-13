<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$contact_info = $atts[ 'contact_info_picker' ];
?>
<?php if ( $contact_info[ 'contact_info_style' ] == 'contact_info-1' ): ?>
	<div class = "ts-contact-info box-border <?php echo esc_attr($atts['class']); ?>">
		<?php if ( !empty( $contact_info[ 'contact_info-1' ][ 'icon' ] ) ): ?>
			<span class="ts-contact-icon pull-left">
				<i class="<?php echo esc_attr( $contact_info[ 'contact_info-1' ][ 'icon' ] ); ?>"></i>
			</span>
		<?php endif; ?>
		<div class = "ts-contact-content">
			<?php if ( !empty( $atts[ 'title' ] ) ): ?>
				<h3 class="ts-contact-title"><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'content' ] ) ): ?>
				<p><?php echo esc_html( $atts[ 'content' ] ); ?></p>
			<?php endif; ?>
		</div><!-- Contact content end -->
	</div><!--/ End Contact info 1-->

<?php elseif ( $contact_info[ 'contact_info_style' ] == 'contact_info-2' ): ?>
	<div class = "ts-feature-classic <?php echo esc_attr($atts['class']); ?>">
		<div class="ts-feature-info icon-left">
			<?php if ( !empty( $contact_info[ 'contact_info-2' ][ 'icon' ] ) ): ?>
				<span class="feature-icon">
					<i class="<?php echo esc_attr( $contact_info[ 'contact_info-2' ][ 'icon' ] ); ?>"></i>
				</span>
			<?php endif; ?>
			<div class = "feature-content">
				<?php if ( !empty( $atts[ 'title' ] ) ): ?>
					<h3 class="ts-feature-title"><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
				<?php endif; ?>

				<?php if ( !empty( $atts[ 'content' ] ) ): ?>
					<p><?php echo wp_kses_post( $atts[ 'content' ] ); ?></p>
				<?php endif; ?>
			</div><!-- feature content end -->
		</div><!-- Feature info end -->
	</div><!--/ End featurebox icon 2 -->




	<?php endif;