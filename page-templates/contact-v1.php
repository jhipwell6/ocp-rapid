<?php
/*
* Template Name: Contact (v1)
*/
get_header();
if(have_posts()) the_post();
?>

	<?php get_template_part('parts/loop', 'title'); ?>

    <!--=== Content Part ===-->
    <div class="container content">		
    	<div class="row margin-bottom-30">
    		<div class="col-md-9 mb-margin-bottom-30">
                <!-- Google Map -->
				<div id="map" class="map map-box map-box-space margin-bottom-40" data-lat="<?php the_map('map', 'lat'); ?>" data-lng="<?php the_map('map', 'lng'); ?>">
				</div><!---/map-->
				<!-- End Google Map -->
                <?php the_content(); ?>
            </div><!--/col-md-9-->
            
    		<div class="col-md-3">
            	<!-- Contacts -->
				<div class="headline"><h2>Contact Details</h2></div>
                <ul class="list-unstyled who margin-bottom-30">
					<?php the_conditional_field('address', '<li><i class="fa fa-home"></i>', '</li>'); ?>
					<?php the_conditional_field('email', '<li><i class="fa fa-envelope"></i>', '</li>'); ?>
					<?php the_conditional_field('phone', '<li><i class="fa fa-phone"></i>', '</li>'); ?>
					<?php the_conditional_field('website', '<li><i class="fa fa-globe"></i>', '</li>'); ?>
                </ul>

            	<!-- Business Hours -->
                <div class="headline"><h2>Business Hours</h2></div>
                <ul class="list-unstyled margin-bottom-30">
                	<?php the_hours('business_hours'); ?>
                </ul>

            	<!-- Why we are? -->
                <div class="headline"><h2>Why we are?</h2></div>
                <?php the_field('statement'); ?>
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