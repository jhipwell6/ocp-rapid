    <!--=== Content Part ===-->
    <div class="container content"> 	
    	<div class="row portfolio-item margin-bottom-50"> 
            <!-- Content Info -->
			<?php 
				$images = get_field('images');
				if($images) :
			?>
            <div class="col-md-6 md-margin-bottom-40">
			<?php ; else : ?>
			<div class="col-md-12 md-margin-bottom-40">
			<?php endif; ?>
                <h2>Project Information</h2>
                <?php the_content(); ?>
				<?php the_conditional_field('link', '<a href="', '" class="btn-u btn-u-large">VISIT THE PROJECT</a>'); ?>
            </div>
            <!-- End Content Info -->        

			<?php if($images) : ?>
            <!-- Carousel -->
            <div class="col-md-6">
                <div class="carousel slide carousel-v1" id="myCarousel">
                    <div class="carousel-inner">
						<?php 
							$i = 0;
							foreach($images as $image) :
								$active = $i == 0 ? ' active' : '';
						?>
                        <div class="item<?php echo $active; ?>">
                            <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>">
                            <div class="carousel-caption">
                                <p><?php echo $image['title']; ?></p>
                            </div>
                        </div>
						<?php $i++; endforeach; ?>
                    </div>
                    
                    <div class="carousel-arrow">
                        <a data-slide="prev" href="#myCarousel" class="left carousel-control">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a data-slide="next" href="#myCarousel" class="right carousel-control">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Carousel -->
			<?php endif; ?>
        </div><!--/row-->

        <?php the_conditional_field('quote', '<div class="tag-box tag-box-v2"><p>', '</p></div>'); ?>

        <div class="margin-bottom-20 clearfix"></div>

        <?php 
			$args = portfolio_query();
			$loop = new WP_Query($args);
			if($loop->have_posts()) :
				$params = array(474, 300, 'bfi_thumb' => true);
		?>
        <!-- Recent Works -->
        <div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
            <div class="headline"><h2 class="pull-left">Recent Works</h2>
                <div class="owl-navigation">
                    <div class="customNavigation">
                        <a class="owl-btn prev-v2"><i class="fa fa-angle-left"></i></a>
                        <a class="owl-btn next-v2"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div><!--/navigation-->
            </div>

            <div class="owl-recent-works-v1">
				<?php while($loop->have_posts()) : $loop->the_post(); ?>
                <div class="item">
                    <a href="<?php the_permalink(); ?>">
                        <em class="overflow-hidden">
                            <?php the_post_thumbnail($params, array('class' => 'img-responsive')); ?>
                        </em>    
                        <span>
                            <strong><?php the_title(); ?></strong>
                            <i><?php portfolio_filter_class($post->ID, 'name', ' / '); ?></i>
                        </span>
                    </a>    
                </div>
				<?php endwhile; wp_reset_query(); ?>
            </div>
        </div>    
        <!-- End Recent Works -->
		<?php endif; ?>
    </div><!--/container-->	 	
    <!--=== End Content Part ===-->