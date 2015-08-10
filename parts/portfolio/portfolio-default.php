    <!--=== Container Part ===-->
    <div class="container">
        <div class="content">
			<?php 
				$images = get_field('images');
				if($images) :
			?>
            <!-- Magazine Slider -->
            <div class="carousel slide carousel-v2 margin-bottom-40" id="portfolio-carousel">
                <ol class="carousel-indicators">
					<?php 
						$i = 0;
						foreach($images as $image) :
							$active = $i == 0 ? ' active' : '';
					?>
                    <li class="rounded-x<?php echo $active; ?>" data-target="#portfolio-carousel" data-slide-to="<?php echo $i; ?>"></li>
					<?php $i++; endforeach; ?>
                </ol>
                
                <div class="carousel-inner">
					<?php 
						$i = 0;
						foreach($images as $image) :
							$active = $i == 0 ? ' active' : '';
					?>
                    <div class="item<?php echo $active; ?>">
                        <img class="full-width img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
					<?php $i++; endforeach; ?>
                </div>
                
                <a class="left carousel-control rounded-x" href="#portfolio-carousel" role="button" data-slide="prev">
                    <i class="fa fa-angle-left arrow-prev"></i>
                </a>
                <a class="right carousel-control rounded-x" href="#portfolio-carousel" role="button" data-slide="next">
                    <i class="fa fa-angle-right arrow-next"></i>
                </a>
            </div>
            <!-- End Magazine Slider -->
			<?php endif; ?>

            <div class="row margin-bottom-60">
                <div class="col-sm-8">
                    <div class="headline"><h2>Product Description</h2></div>
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-4">
                    <div class="headline"><h2>Product Details</h2></div>
                    <ul class="list-unstyled project-details">
						<?php the_conditional_field('client', '<li><strong>Client:</strong> ', '</li>'); ?>
						<?php the_conditional_field('date', '<li><strong>Date:</strong> ', '</li>'); ?>
						<?php if(ocp_post_tax($post->ID, 'portfolio_cat') !== '') { echo '<li><strong>Categories:</strong> ' . ocp_post_tax($post->ID, 'portfolio_cat') . '</li>'; } ?>
						<?php the_conditional_field('link', '<li><strong>Website:</strong> <a href="', '" target="_blank">'); the_conditional_field('link', '', '</a></li>'); ?>
                    </ul>
                </div>
            </div>        
            
			<?php 
				$args = portfolio_query();
				$loop = new WP_Query($args);
				if($loop->have_posts()) :
					$params = array(474, 300, 'bfi_thumb' => true);
			?>
            <div class="cube-portfolio">
                <div id="grid-container" class="cbp-l-grid-agency">
					<?php while($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="cbp-item">
                        <div class="cbp-caption margin-bottom-20">
                            <div class="cbp-caption-defaultWrap">
                                <?php the_post_thumbnail($params, array('class' => 'img-responsive')); ?>
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignCenter">
                                    <div class="cbp-l-caption-body">
                                        <ul class="link-captions no-bottom-space">
                                            <li><a href="<?php the_permalink(); ?>"><i class="rounded-x fa fa-link"></i></a></li>
											<li><a href="<?php the_post_thumbnail_url(); ?>" class="cbp-lightbox" data-title="<?php the_title(); ?>"><i class="rounded-x fa fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cbp-title-dark">
							<div class="cbp-l-grid-agency-title"><?php the_title(); ?></div>
							<div class="cbp-l-grid-agency-desc"><?php portfolio_filter_class($post->ID, 'name', ' / '); ?></div>
						</div>
                    </div>
					<?php endwhile; wp_reset_query(); ?>
                </div>
            </div>
			<?php endif; ?>
        </div>
    </div>    
    <!--=== End Container Part ===-->