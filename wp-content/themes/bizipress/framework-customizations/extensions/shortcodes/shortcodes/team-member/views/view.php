<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$teamsettings	 = $atts[ 'team_style_settings' ];
$teamstyle		 = $teamsettings[ 'team_style' ];
?>


<?php if ( $teamstyle == 'team-1' ) : ?>
	<div class="ts-team-wrapper">
		<div class="team-img-wrapper">
			<?php if ( !empty( $atts[ 'image' ] ) ): ?>
				<img src="<?php echo esc_url( $atts[ 'image' ][ 'url' ] ); ?>" alt="<?php echo esc_html( $atts[ 'title' ] ); ?>">
			<?php endif; ?>
		</div><!--Image end -->
		<div class="ts-team-content">
			<?php if ( !empty( $atts[ 'title' ] ) ): ?>
				<h3 class="team-name"><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'position' ] ) ): ?>
				<p class="team-designation"><?php echo esc_html( $atts[ 'position' ] ); ?></p>
			<?php endif; ?>
		</div><!-- Team content end -->
		<div class="team-social-icons">
			<?php foreach ( $atts[ 'socials' ] as $social ) : ?>
				<?php if ( !empty( $social ) ): ?>
					<a href="<?php echo esc_url( $social[ 'link' ] ); ?>" target="_blank"><i class="<?php echo esc_attr( $social[ 'icon' ] ); ?>"></i></a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>

<?php elseif ( $teamstyle == 'team-2' ): ?>
	<div class="team team-list">
		<div class="team-img">
			<?php if ( !empty( $atts[ 'image' ] ) ): ?>
				<img src="<?php echo esc_url( $atts[ 'image' ][ 'url' ] ); ?>" alt="<?php echo esc_html( $atts[ 'title' ] ); ?>">
			<?php endif; ?>
			<span class="img-top"></span>
			<span class="img-bottom"></span>
		</div>
		<div class="team-content">
			<?php if ( !empty( $atts[ 'title' ] ) ): ?>
				<h3><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'position' ] ) ): ?>
				<p class="team-designation"><?php echo esc_html( $atts[ 'position' ] ); ?></p>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'message' ] ) ): ?>
				<p class="desc"><?php echo esc_html( $atts[ 'message' ] ); ?></p>
			<?php endif; ?>

			<div class="team-social">
				<?php foreach ( $atts[ 'socials' ] as $social ) : ?>
					<?php if ( !empty( $social ) ): ?>
				<a href="<?php echo esc_url( $social[ 'link' ] ); ?>" target="_blank"><i class="<?php echo esc_attr( $social[ 'icon' ] ); ?>"></i></a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

<?php elseif ( $teamstyle == 'team-3' ) : ?>
	<div class="team team-list-border">
		<div class="team-img">
			<?php if ( !empty( $atts[ 'image' ] ) ): ?>
				<img src="<?php echo esc_url( $atts[ 'image' ][ 'url' ] ); ?>" alt="<?php echo esc_html( $atts[ 'title' ] ); ?>">
			<?php endif; ?>
			<span class="img-top"></span>
			<span class="img-bottom"></span>
		</div>
		<div class="team-content">
			<?php if ( !empty( $atts[ 'title' ] ) ): ?>
				<h3><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'position' ] ) ): ?>
				<p class="team-designation"><?php echo esc_html( $atts[ 'position' ] ); ?></p>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'message' ] ) ): ?>
				<p class="desc"><?php echo esc_html( $atts[ 'message' ] ); ?></p>
			<?php endif; ?>

			<div class="team-social">
				<?php foreach ( $atts[ 'socials' ] as $social ) : ?>
					<?php if ( !empty( $social ) ): ?>
				<a href="<?php echo esc_url( $social[ 'link' ] ); ?>" target="_blank"><i class="<?php echo esc_attr( $social[ 'icon' ] ); ?>"></i></a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>