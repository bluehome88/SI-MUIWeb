<?php
/**
 * page.php
 *
 * The template for displaying all pages.
 */
?>

<?php get_header(); 

get_template_part( 'template-parts/header/content', 'page-banner' );
?>
<div class="main-content blog-wrap"  role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<!-- Article header -->
						<header class="entry-header"> <?php
							if ( has_post_thumbnail() && !post_password_required() ) :
								?>
								<figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
							<?php endif; ?>

							<h1 id="MainHeader252"><?php the_title(); ?></h1>
						</header> <!-- end entry-header -->

						<!-- Article content -->
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div> <!-- end entry-content -->

						<!-- Article footer -->
						<footer class="entry-footer">
							<?php
							if ( is_user_logged_in() ) {
								echo '<p>';
								edit_post_link( esc_html__( 'Edit', 'bizipress' ), '<span class="meta-edit">', '</span>' );
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