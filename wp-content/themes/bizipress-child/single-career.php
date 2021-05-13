<?php
/**
 * single.php
 *
 * The template for displaying single posts.
 */
$display_settings = array();
if ( defined( 'FW' ) ) {
	$display_settings = fw_get_db_settings_option( 'blog_display_settings' );
}

get_header();

get_template_part( 'template-parts/header/content', 'blog-header' )
?>

<div id="main-container" class="main-container blog" role="main">
  <div class="sections">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
		
		
		<?php 

		while ( have_posts() ) : the_post(); 
		
			if(is_single(549)) 	the_content();
				
				else {
			?>
		
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content post-single' ); ?>>
        
          <div class="clearfix"> 
            
            <!-- Article header -->
            <header class="entry-header clearfix">
              <h2 class="entry-title text-center blue252">
                <?php the_title(); ?>
              </h2>
            </header>
            <!-- header end --> 
            
            <!-- Article content -->
            <div class="entry-content careersSinglePage252">
			
			 <?php if (the_field('about_massy_united_insurance')){
										echo '<div class="careerItem252">';
										echo (the_field("about_massy_united_insurance"));
										echo '</div>';
										} 
								?>
								
              <?php if (get_field('key_responsibilities')){
										echo '<div class="careerItem252"><strong class="careerTitle">Key Responsibilities: </strong><br>';
										echo (get_field("key_responsibilities"));
										echo '</div>';
										} 
								?>
              <?php if (get_field('qualifications_&_experience')){
										echo '<div class="careerItem252"><strong class="careerTitle">Qualifications and Specific Competencies: </strong><br>';
										echo (get_field("qualifications_&_experience"));
										echo '</div>';
										} 
								?>
              <?php if (get_field('competencies')){
										echo '<div class="careerItem252"><strong class="careerTitle">Competencies: </strong><br>';
										echo (get_field("competencies"));
										echo '</div>';
										} 
								?>
              <?php if (get_field('rewards_&_benefits')){
										echo '<div class="careerItem252"><strong class="careerTitle">Rewards & Benefits: </strong><br>';
										echo (get_field("rewards_&_benefits"));
										echo '</div>';
										} 
								?>
              
              <?php if (get_field('location')){
										echo '<div class="careerItem252"><strong class="careerTitle">Location: </strong><br>';
										echo (get_field("location"));
										echo '</div>';
										} 
								?>
              <div class="text-center"> <a target="_self" href="apply/" class="btn btn-primary"> Apply Now</a> </div>
            </div>
          </div>
          <!-- end entry-content -->
          
          </div>
          <!-- end post-body --> 
          
        </article>
        <?php } //else 
			endwhile;
		?>
      </div>
      <!-- end main-content --> 
      
    </div>
  </div>
</div>
</div>
<!-- end main-content -->
<?php get_footer(); ?>
