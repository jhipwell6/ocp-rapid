<?php
/*
* Template Name: Contact (v3)
*/
get_header();
if(have_posts()) the_post();
?>

	<?php get_template_part('parts/loop', 'title'); ?>

    <!--=== Content Part ===-->
    <div class="container content">		
    	<div class="row margin-bottom-60">
    		<div class="col-md-6 col-sm-6">
                <!-- Google Map -->
				<div id="map" class="height-450" data-lat="<?php the_map('map', 'lat'); ?>" data-lng="<?php the_map('map', 'lng'); ?>">
				</div><!---/map-->
				<!-- End Google Map -->
            </div><!--/col-md-9-->
            
    		<div class="col-md-6 col-sm-6">	
				<!-- Get In Touch -->
                <?php the_field('statement'); ?>
				
				<hr>
			
            	<!-- Contacts -->
				<h3>Contact Details</h3>
                <ul class="list-unstyled who">
					<?php the_conditional_field('address', '<li><i class="fa fa-home"></i>', '</li>'); ?>
					<?php the_conditional_field('email', '<li><i class="fa fa-envelope"></i>', '</li>'); ?>
					<?php the_conditional_field('phone', '<li><i class="fa fa-phone"></i>', '</li>'); ?>
					<?php the_conditional_field('website', '<li><i class="fa fa-globe"></i>', '</li>'); ?>
                </ul>
				
				<hr>

            	<!-- Business Hours -->
                <h3>Business Hours</h3>
                <ul class="list-unstyled">
                	<?php the_hours('business_hours'); ?>
                </ul>

            </div><!--/col-md-3-->
        </div><!--/row-->
		
		<?php 
			$images = get_field('clients');
			if($images) :
		?>
		<!--=== Owl Clients v1 ===-->
		<?php the_conditional_field('clients_title', '<div class="headline"><h2>', '</h2></div>'); ?>
		<div class="owl-clients-v1">
			<?php foreach($images as $image) : ?>
			<div class="item">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			</div>
			<?php endforeach; ?>
		</div> 
		<!--=== End Owl Clients v1 ===-->
		<?php endif; ?>
	</div><!--/container-->

<?php get_footer(); ?>