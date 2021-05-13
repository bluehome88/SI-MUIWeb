<?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );
?>

<div class="wow fadeInLeft">
    <div id="client-carousel" class="col-sm-12 owl-carousel owl-theme text-center client-carousel">
		<?php foreach ( $atts[ 'partners' ] as $partner ): ?>
			<?php if ( $partner ): ?>
				<?php if ( !empty( $partner[ 'image' ] ) ): ?>
					<figure class="item <?php echo esc_attr( $partner[ 'border' ] ); ?> client_logo">
						<a target="<?php echo esc_html( $partner[ 'target' ] ); ?>" href="<?php echo esc_url( $partner[ 'link' ] ); ?>"><img src="<?php echo esc_url( $partner[ 'image' ][ 'url' ] ); ?>" alt="<?php echo esc_html( $partner[ 'title' ] ); ?>"></a>
					</figure>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
    </div><!-- Owl carousel end -->
</div><!-- Content row end -->




