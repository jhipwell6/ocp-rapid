<?php
/*
* Template Name: Home (Default)
*/
get_header();
if(have_posts()) the_post();
?>
	<?php if(have_rows('slides')) : ?>
	<!--=== Slider ===-->
    <div class="slider-inner">
        <div id="da-slider" class="da-slider" style="background-image:url('<?php the_image('slider_background_image', 'url', false); ?>')">
			<?php while(have_rows('slides')) : the_row(); ?>
            <div class="da-slide">
                <?php the_sub_field('caption'); ?>
                <div class="da-img"><img class="img-responsive" src="<?php the_image('image', 'url', true); ?>" alt=""></div>
            </div>
			<?php endwhile; ?>
            <div class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>        
            </div>
        </div>
    </div><!--/slider-->
    <!--=== End Slider ===-->
	<?php endif; ?>

	<?php 
		$callout_text = get_field('callout_text');
		if($callout_text) :
	?>
    <!--=== Purchase Block ===-->
    <div class="purchase">
        <div class="container">
            <div class="row">
                <div class="col-md-9 animated fadeInLeft">
					<?php the_conditional_field('callout_title', '<span>', '</span>', false); ?>
					<?php the_conditional_field('callout_text', '<p>', '</p>', false); ?>
                </div>            
                <div class="col-md-3 btn-buy animated fadeInRight">
					<?php if(have_rows('callout_button')) : while(have_rows('callout_button')) : the_row(); ?>
                    <a href="<?php the_sub_field('link'); ?>" class="btn-u btn-u-lg"><?php the_conditional_field('icon', '<i class="fa ', '"></i> ', true); ?><?php the_sub_field('label'); ?></a>
					<?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div><!--/row-->
    <!-- End Purchase Block -->
	<?php endif; ?>

    <!--=== Content Part ===-->
    <div class="container content-sm">
		<?php 
			$blocks = get_field('services');
			if($blocks) :
		?>
    	<!-- Service Blocks -->
    	<div class="row margin-bottom-30">
			<?php foreach($blocks as $service) : ?>
        	<div class="<?php echo get_col_x($blocks, 'md'); ?>">
        		<div class="service">
                    <i class="fa <?php echo $service['icon']; ?> service-icon"></i>
        			<div class="desc">
        				<h4><?php echo $service['title']; ?></h4>
                        <p><?php echo $service['text']; ?></p>
        			</div>
        		</div>
        	</div>
			<?php endforeach; ?>		    
    	</div>
    	<!-- End Service Blokcs -->
		<?php endif; ?>
		
		<?php
			$post_type = get_field('feed_post_type');
			$limit = get_field('feed_limit');
			$orderby = get_field('feed_order_by');
			$order = get_field('feed_order');
			switch($post_type) {
				case 'post':
					$cat = 'category';
					break;
				case 'portfolio':
					$cat = 'portfolio_cat';
					break;
				case 'product':
					$cat = 'product_cat';
					break;
			}
			if($limit != 0) :
			$loop = new WP_Query(array('post_type'=>$post_type,'posts_per_page'=>$limit,'orderby'=>$orderby,'order'=>$order));
			if($loop->have_posts()) :
		?>
		<!-- Post Feed -->
		<div class="container content-sm">
			<?php the_conditional_field('feed_title', '<div class="headline"><h2>', '</h2></div>', false); ?>
			<div class="row margin-bottom-20">
				<?php while($loop->have_posts()) : $loop->the_post(); ?>
				<div class="col-md-3 col-sm-6">
					<div class="thumbnails thumbnail-style thumbnail-kenburn">
						<div class="thumbnail-img">
							<div class="overflow-hidden">
								<?php the_post_thumbnail('feed-thumbs', array('class' => 'img-responsive')); ?>
							</div>
							<a class="btn-more hover-effect" href="<?php the_permalink(); ?>">read more +</a>					
						</div>
						<div class="caption">
							<h3><a class="hover-effect" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php echo '<p>' . wp_trim_words($post->post_content, 20, '&hellip;') . '</p>'; ?>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
		<!-- End Post Feed -->
		<?php endif; ?>
		<?php endif; ?>

    	<!-- Info Blocks -->
    	<div class="row margin-bottom-30">
			<?php 
				$content = get_field('content');
				if($content) :
			?>
        	<!-- Welcome Block -->
    		<div class="col-md-8 md-margin-bottom-40">
    			<?php the_conditional_field('content_title', '<div class="headline"><h2>' ,'</h2></div>'); ?>
                <?php the_field('content'); ?>
            </div><!--/col-md-8-->
			<?php endif; ?>

			<?php 
				$images = get_field('gallery');
				if($images) :
					$i = 0;
			?>
            <!-- Latest Shots -->
            <div class="col-md-4">
				<?php the_conditional_field('gallery_title', '<div class="headline"><h2>' ,'</h2></div>'); ?>
    			<div id="myCarousel" class="carousel slide carousel-v1">
                    <div class="carousel-inner">
						<?php foreach($images as $image) : ?>
                        <div class="item<?php if($i==0) { ?> active<?php } ?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							<?php if($image['title']) : ?>
                            <div class="carousel-caption">
								<p><?php echo $image['title']; ?></p>
                            </div>
							<?php endif; ?>
                        </div>
						<?php $i++; endforeach; ?>
                    </div>
                    
                    <div class="carousel-arrow">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
    			</div>
            </div><!--/col-md-4-->
			<?php endif; ?>
    	</div>	
    	<!-- End Info Blokcs -->

        <?php 
			$images = get_field('clients');
			if($images) :
		?>
		<!--=== Owl Clients v1 ===-->
		<?php the_conditional_field('clients_title', '<div class="headline"><h2>' ,'</h2></div>'); ?>
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
    <!-- End Content Part -->
	
<?php get_footer(); ?>