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
<?php 
	if( isset($_GET['debug']) )
	{
		$ip = $_GET['debug'];
// 181.118.37.24
// 52.151.208.127
// 20.49.104.19
// 		$userInfo = geoip_detect2_get_info_from_ip($_SERVER['HTTP_X_CLIENT_IP'], [ 'en' ], [ 'skipCache' => TRUE ]) ; 
		$userInfo = user_ip_and_location() ; 
		
		echo "<pre>";
		print_r( $userInfo );
		exit;
	}
?>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<meta name="description" content="Across the Caribbean, more people are placing their trust in Massy United Insurance for the protection of the things that are most important to them – their homes, businesses and their hard-earned belongings.">



	<link rel="stylesheet preload" href="https://www.massyunitedinsurance.com/wp-content/plugins/js_composer-July/assets/lib/bower/font-awesome/fonts/fontawesome-webfont.woff?v=4.7.0" as="font" type="font/woff" crossorigin="">
	<link rel="stylesheet preload" href="https://www.massyunitedinsurance.com/wp-content/themes/bizipress/assets/fonts/iconfont/iconfont.ttf?2p4rfb" as="font" type="font/ttf" crossorigin="">

	<link rel="fetch" href="https://www.massyunitedinsurance.com/wp-content/plugins/accordion-slider/public/assets/js/jquery.accordionSlider.min.js" as="script">
	<link rel="fetch" href="https://www.massyunitedinsurance.com/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?rev=5.4.8.1" as="script" crossorigin="">


	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-1.12.4.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/cookies.js"></script>

	<?php wp_head(); ?>

	<script>
		<?php $ui = 'barbados'; ?>
		var country = getCookie('country'); 

		if (!country) { 
			<?php
				$user_country = user_ip_and_location();
				$user_country = $user_country->countryCode;
			// $userInfo = geoip_detect2_get_info_from_ip($_SERVER['HTTP_X_CLIENT_IP'], [ 'en' ], [ 'skipCache' => TRUE ]) ; 
			echo "console.log(\"'".$user_country."'\");";
			
			if ($user_country == 'TT') {
				$ui = "trinidadandtobago";
				echo 'setCookie("country", "trinidadandtobago", 1); window.location = "/"';
			} else if ($user_country == 'AI') {
				$ui = "anguilla";
				echo 'setCookie("country", "anguilla", 1); window.location = "/"';
			} else if ($user_country == 'AG') {
				$ui = "antiguaandbarbuda";
				echo 'setCookie("country", "antiguaandbarbuda", 1); window.location = "/"';
			} else if ($user_country == 'ABW') {
				echo 'window.location = "https://www.massyunited.com/"';
			} else if ($user_country == 'BS') {
				$ui = "bahamas";
				echo 'setCookie("country", "bahamas", 1); window.location = "/"';
			} else if ($user_country == 'BB') {
				$ui = "barbados";
				echo 'setCookie("country", "barbados", 1); window.location = "/"';
			} else if ($user_country == 'BZ') {
				$ui = "belize";
				echo 'setCookie("country", "belize", 1); window.location = "/"';
			} else if ($user_country == 'VG') {
				$ui = "britishvirginislands";
				echo 'setCookie("country", "britishvirginislands", 1); window.location = "/"';
			} else if ($user_country == 'KY') {
				$ui = "caymanislands";
				echo 'setCookie("country", "caymanislands", 1); window.location = "/"';
			} else if ($user_country == 'CW') {
				echo 'window.location = "https://www.massyunited.com/"';
			} else if ($user_country == 'DM') {
				$ui = "dominica";
				echo 'setCookie("country", "dominica", 1); window.location = "/"';
			} else if ($user_country == 'GD') {
				$ui = "grenada";
				echo 'setCookie("country", "grenada", 1); window.location = "/"';
			} else if ($user_country == 'GU') {
				$ui = "guyana";
				echo 'setCookie("country", "guyana", 1); window.location = "/"';
			} else if ($user_country == 'JM') {
				$ui = "jamaica";
				echo 'setCookie("country", "jamaica", 1); window.location = "/"';
			} else if ($user_country == 'MS') {
				$ui = "montserrat";
				echo 'setCookie("country", "montserrat", 1); window.location = "/"';
			} else if ($user_country == 'KN') {
				$ui = "stkittsandnevis";
				echo 'setCookie("country", "stkittsandnevis", 1); window.location = "/"';
			} else if ($user_country == 'LC') {
				$ui = "stlucia";
				echo 'setCookie("country", "stlucia", 1); window.location = "/"';
			} else if ($user_country == 'VC') {
				$ui = "stvincentandthegrenadines";
				echo 'setCookie("country", "stvincentandthegrenadines", 1); window.location = "/"';
			} else if ($user_country == 'TC') {
				$ui = "turksandcaicos";
				echo 'setCookie("country", "turksandcaicos", 1); window.location = "/"';
			} else {
				$ui = "barbados"; 
 				echo 'setCookie("country", "barbados", 1); window.location = "/"';
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
		console.log( country );
		if (access_country != null && access_country.indexOf(country) === -1 ) location = '/';
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