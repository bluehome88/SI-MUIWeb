<?php

/**
 * header.php
 *
 * The header for the theme.
 */ 
?>
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<meta name="description" content="Across the Caribbean, more people are placing their trust in Massy United Insurance for the protection of the things that are most important to them – their homes, businesses and their hard-earned belongings.">

	<link rel="stylesheet preload" href="https://muiweb.azurewebsites.net/wp-content/plugins/js_composer-July/assets/lib/bower/font-awesome/fonts/fontawesome-webfont.woff?v=4.7.0" as="font" type="font/woff" crossorigin="">
	<link rel="stylesheet preload" href="https://muiweb.azurewebsites.net/wp-content/themes/bizipress/assets/fonts/iconfont/iconfont.ttf?2p4rfb" as="font" type="font/ttf" crossorigin="">

	<link rel="fetch" href="https://muiweb.azurewebsites.net/wp-content/plugins/accordion-slider/public/assets/js/jquery.accordionSlider.min.js" as="script">
	<link rel="fetch" href="https://muiweb.azurewebsites.net/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?rev=5.4.8.1" as="script" crossorigin="">


	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-1.12.4.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/cookies.js"></script>
	
	<?php wp_head(); ?>  
	<script>
		<?php $ui = 'barbados'; ?>
		var country = getCookie('country'); 

		if (!country) { 
			<?php
			$userInfo = geoip_detect2_get_info_from_ip($_SERVER['HTTP_X_CLIENT_IP'], [ 0 => 'en' ], [ 'skipCache' => TRUE ]) ; 
			if ($userInfo->country->isoCode == 'TT') {
				$ui = "trinidadandtobago";
				echo 'setCookie("country", "trinidadandtobago", 1); window.location = "/trinidadandtobago/"';
			} else if ($userInfo->country->isoCode == 'AI') {
				$ui = "anguilla";
				echo 'setCookie("country", "anguilla", 1); window.location = "/"';
			} else if ($userInfo->country->isoCode == 'AG') {
				$ui = "antiguaandbarbuda";
				echo 'setCookie("country", "antiguaandbarbuda", 1); window.location = "/antiguaandbarbuda/"';
			} else if ($userInfo->country->isoCode == 'ABW') {
				echo 'window.location = "https://www.massyunited.com/"';
			} else if ($userInfo->country->isoCode == 'BS') {
				$ui = "bahamas";
				echo 'setCookie("country", "bahamas", 1); window.location = "/bahamas/"';
			} else if ($userInfo->country->isoCode == 'BB') {
				$ui = "barbados";
				echo 'setCookie("country", "barbados", 1); window.location = "/barbados/"';
			} else if ($userInfo->country->isoCode == 'BZ') {
				$ui = "belize";
				echo 'setCookie("country", "belize", 1); window.location = "/belize/"';
			} else if ($userInfo->country->isoCode == 'VG') {
				$ui = "britishvirginislands";
				echo 'setCookie("country", "britishvirginislands", 1); window.location = "/britishvirginislands/"';
			} else if ($userInfo->country->isoCode == 'KY') {
				$ui = "caymanislands";
				echo 'setCookie("country", "caymanislands", 1); window.location = "/caymanislands/"';
			} else if ($userInfo->country->isoCode == 'CW') {
				echo 'window.location = "https://www.massyunited.com/"';
			} else if ($userInfo->country->isoCode == 'DM') {
				$ui = "dominica";
				echo 'setCookie("country", "dominica", 1); window.location = "/dominica/"';
			} else if ($userInfo->country->isoCode == 'GD') {
				$ui = "grenada";
				echo 'setCookie("country", "grenada", 1); window.location = "/grenada/"';
			} else if ($userInfo->country->isoCode == 'GU') {
				$ui = "guyana";
				echo 'setCookie("country", "guyana", 1); window.location = "/guyana/"';
			} else if ($userInfo->country->isoCode == 'JM') {
				$ui = "jamaica";
				echo 'setCookie("country", "jamaica", 1); window.location = "/jamaica/"';
			} else if ($userInfo->country->isoCode == 'MS') {
				$ui = "montserrat";
				echo 'setCookie("country", "montserrat", 1); window.location = "/montserrat/"';
			} else if ($userInfo->country->isoCode == 'KN') {
				$ui = "stkittsandnevis";
				echo 'setCookie("country", "stkittsandnevis", 1); window.location = "/stkittsandnevis/"';
			} else if ($userInfo->country->isoCode == 'LC') {
				$ui = "stlucia";
				echo 'setCookie("country", "stlucia", 1); window.location = "/stlucia/"';
			} else if ($userInfo->country->isoCode == 'VC') {
				$ui = "stvincentandthegrenadines";
				echo 'setCookie("country", "stvincentandthegrenadines", 1); window.location = "/stvincentandthegrenadines/"';
			} else if ($userInfo->country->isoCode == 'TC') {
				$ui = "turksandcaicos";
				echo 'setCookie("country", "turksandcaicos", 1); window.location = "/turksandcaicos/"';
			} else {
				$ui = "barbados"; 
				echo 'setCookie("country", "barbados", 1); window.location = "/barbados/"';
			}
			?>
		}
	</script>


	<script> 
		var access_country = null;
		if (!country) country = getCookie('country') || '<?php echo $ui; ?>';
		<?php
		if (have_posts()) : while (have_posts()) : the_post();
				if (get_field('access_country')) : ?>
					access_country = '<?php the_field('access_country');  ?>';
		<?php endif;
			endwhile;
		endif;
		?> 

		// Redirect to home pagev when access wrong 
		if (access_country && access_country !== country) location = '/' + country || '';
	</script>

	<script>
		$(function() {
			if ($("#date_of_purchase_1038").length) {
				$("#date_of_purchase_1038").datepicker();
			}

			if ($("#warrent_expiration_1038").length) {
				$("#warrent_expiration_1038").datepicker();
			}

			if ($("#warrent_expiration_1038").length) {
				$("#insurance_renewal_1038").datepicker();
			}
		});

		jQuery(document).on('click', '.wpcf7-submit', function(e) {
			if (jQuery('img', jQuery(this).closest('div')).css('visibility') === 'visible') {
				e.preventDefault();
				return false;
			}
		});
	</script>


</head>

<body <?php body_class(fw_akg('use_boxlayout', bizipress_get_option('boxlayout')) === 'yes' ? 'box-width' : ''); ?>>

	<div class="body-inner">
		<?php get_template_part('template-parts/navigation/content', 'nav'); ?>