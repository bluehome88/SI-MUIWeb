<?php
/**
 * 404.php
 *
 * The template for displaying 404 pages (Not Found).
 */
?>

<?php get_header(); ?>
<div class="blog" role="main">
    <?php get_template_part('template-parts/header/content', 'blog-header-2')?>
    <div class="main-content blog-wrap error-page">
        <div class="container">
            <div class="row">
                <div class="error-page text-center">
					<div class="error-code">
						<strong><?php esc_html_e('404', 'bizipress') ?></strong>
					</div>
					<div class="error-message">
						<h3><?php esc_html_e('Oops... Page Not Found!', 'bizipress') ?></h3>
					</div>
					<div class="error-body">
						<?php esc_html_e('Try using the button below to go to main page of the site', 'bizipress') ?>
						 <br>
						 <a href="<?php echo esc_url(home_url()) ?>" class="btn btn-primary solid blank"><i class="fa fa-arrow-circle-left">&nbsp;</i> <?php esc_html_e('Go to Home', 'bizipress') ?></a>
					</div>
				</div>
                <div class="col-md-5 col-md-offset-1 error-search">
                    <?php get_template_part('template-parts/content', 'none'); ?>
                </div>
            </div> 
        </div> 
    </div> <!-- end main-content -->
    <?php get_footer(); ?>