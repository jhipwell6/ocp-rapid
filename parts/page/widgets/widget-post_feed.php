	<?php 
		// get feed type (default, slider, isotope)
		$type = get_sub_field('type');
		$post_type = get_sub_field('post_type');
		$limit = get_sub_field('limit');
		$orderby = get_sub_field('order_by');
		$order = get_sub_field('order');
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
		
		// build query
		$loop = new WP_Query(array('post_type'=>$post_type,'posts_per_page'=>$limit,'orderby'=>$orderby,'order'=>$order));
		
		// type = carousel
		if($type == 'default') :
	?>
	<!-- Post Feed -->
	<div class="container content">
		<?php the_conditional_field('feed_title', '<div class="headline"><h2>', '</h2></div>', true); ?>
		<?php if($loop->have_posts()) : ?>
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
		<?php endif; ?>
	</div>
	<!-- End Post Feed -->
	<?php 
		// type = boxed
		; elseif($type == 'slider') :
	?>
	<!-- Recent Works -->
	<div class="container content>
		<?php if($loop->have_posts()) : ?>
		<div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
			<div class="headline"><?php the_conditional_field('feed_title', '<h2 class="pull-left">', '</h2>', true); ?>
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
							<?php the_post_thumbnail('feed-thumbs', array('class' => 'img-responsive full-width')); ?>
						</em>
						<span>
							<strong><?php the_title(); ?></strong>
							<i><?php echo _post_taxonomies_without_link($post->ID, $cat); ?></i>
						</span>
					</a>    
				</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<!-- End Recent Works -->
	<?php 
		// type = isotope
		; else :
	?>
	<!-- Portfolio Sorting Blocks -->
	<div class="container content">
		<?php if($loop->have_posts()) : ?>
        <div class="sorting-block">
            <ul class="sorting-nav sorting-nav-v1 text-center">
                <?php ocp_filter_list($cat); ?>
            </ul>

            <ul class="row sorting-grid">
				<?php while($loop->have_posts()) : $loop->the_post(); ?>
                <li class="col-md-3 col-sm-6 col-xs-12 mix <?php echo ocp_filter_class($post->ID, $cat); ?>">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('feed-thumbs', array('class' => 'img-responsive full-width')); ?>
                        <div class="sorting-cover">
                            <span><?php the_title(); ?></span>
                            <p><?php echo ocp_post_tax_no_link($post->ID, $cat); ?></p>
                        </div>
                    </a>
                </li>
                <?php endwhile; wp_reset_query(); ?>
            </ul>
        
            <div class="clearfix"></div>
        </div>
		<?php endif; ?>
        <!-- End Portfolio Sorting Blocks -->
    </div><!--/container--> 
	<?php endif; ?>