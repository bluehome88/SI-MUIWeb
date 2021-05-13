<?php
/**
 * header.php
 *
 * The header for the theme.
 */

 
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php wp_head(); ?>
    </head>
    <body <?php body_class( fw_akg( 'use_boxlayout', bizipress_get_option( 'boxlayout' ) ) === 'yes' ? 'box-width' : '' ); ?>>

		<div class="body-inner">
			<?php get_template_part( 'template-parts/navigation/content', 'nav' ); ?>


