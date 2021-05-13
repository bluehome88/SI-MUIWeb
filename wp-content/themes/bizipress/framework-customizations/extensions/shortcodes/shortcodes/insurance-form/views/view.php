<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$id		 = uniqid( 'tab-cont-' );



//fw_print( bsizipress_select_contact_form() );
?>
<div class="insurance-tab">
	<ul class="nav nav-tabs">
		<?php
		$ctn3	 = 1;
		foreach ( $atts[ 'tabs' ] as $tab ) :
			?>
			<li class="<?php echo ($ctn3 == 1) ? 'active' : ''; ?>"><a href="#<?php echo esc_attr( $id ) . '-' . $ctn3; ?>" data-toggle="tab">
			<span>
				<i class="<?php echo  esc_attr( $tab[ 'icon' ] ) ; ?>"></i>
			</span> 
			<?php echo bizipress_theme_translate( esc_attr( $tab[ 'title' ] ) ); ?></a></li>
			<?php
			$ctn3++;
		endforeach;
		?>
	</ul>
	<div class="tab-content">
		<?php
		$cnts33 = 1;
		foreach ( $atts[ 'tabs' ] as $tab ) :
			?>
			<div class="tab-pane <?php echo ($cnts33 == 1) ? 'active' : ''; ?>" id="<?php echo esc_attr( $id ) . '-' . $cnts33; ?>">
				<?php if ( !empty( $tab[ 'quoteform' ] ) ): ?>
					<p><?php echo bizipress_theme_translate( esc_textarea( do_shortcode('[contact-form-7 id="'.$tab['quoteform'].'"]' ) ) ); ?></p>
				<?php endif; ?>
			</div>
			<?php
			$cnts33++;
		endforeach;
		?>
	</div>
</div><!-- End default tabs -->