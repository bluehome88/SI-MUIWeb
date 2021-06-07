<?php

/**
 * Template Name: Home pages
 *
 * The template for displaying all pages.
 */



get_header();
?>
<script>
	const redirectCountry = getCookie('country'); 
	// switch (redirectCountry) {
	// 	case "anguilla":
	// 		if (window.location.pathname !== '/')
	// 			location = window.location.protocol + "//" + window.location.hostname
	// 		break
	// 	default:
	// 		if (redirectCountry && !(window.location.pathname == '/' + redirectCountry || window.location.pathname == '/' + redirectCountry + '/'))
	// 			location = window.location.protocol + "//" + window.location.hostname + '/' + redirectCountry
	// 		break
	// }
</script>
<?php
get_template_part('template-parts/header/content', 'page-header');

$country = $_COOKIE['country'];
$product_data = get_field( "product_".$country );
if( $product_data == "" )
	$product_data = get_field( "product_default" );

?>
<div class=" blog-wrap" role="main">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- Article header -->
						<header class="entry-header"> <?php
														if (has_post_thumbnail() && !post_password_required()) :
														?>
								<figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
							<?php endif; ?>
						</header> <!-- end entry-header -->

						<!-- Article content -->
						<div class="entry-content">

							<?php the_content();   ?>
							<?php echo $product_data; ?>
							<?php wp_link_pages(); ?>
						</div> <!-- end entry-content -->

						<!-- Article footer -->
						<footer class="entry-footer">
							<?php
							if (is_user_logged_in()) {
								echo '<p>';
								edit_post_link(esc_html__('Edit', 'bizipress'), '<span class="meta-edit">', '</span>');
								echo '</p>';
							}
							?>
						</footer> <!-- end entry-footer -->
					</article>

					<?php comments_template(); ?>
				<?php endwhile; ?>
			</div> <!-- end main-content -->

		</div>
	</div>
</div>
<?php get_footer(); ?>