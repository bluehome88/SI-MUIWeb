<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$skills = $atts[ 'skills' ];
?>

<?php foreach ( $skills as $skill ): ?>

	<div class="ts-progress-bar">
		 <?php if ($skill['title']) { ?>
            <h4><?php echo wp_kses_post($skill['title']); ?></h4>
        <?php } ?>

        <div class="progress">
            <?php if ($skill['percentage']) { ?>
                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_html($skill['percentage']); ?>" aria-valuemin="0" aria-valuemax="100" ><span class="progress-value"><?php echo esc_html( $skill[ 'percentage' ] ); ?>%</span></div>
                <?php } ?>
        </div>
	</div>
<?php endforeach; ?>
