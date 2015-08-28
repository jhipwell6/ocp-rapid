<?php
/*
* Template Name: Services (Default)
*/
get_header();
if(have_posts()) the_post();
?>

	<?php get_template_part('parts/loop', 'title'); ?>

	<?php 
		$feed = get_field('post_feed');
		if($feed['limit'] !== 0) :
	?>
	<!--=== News Block ===-->
    <div class="container content-sm">
        <div class="text-center margin-bottom-50">
			<?php the_conditional_field('service_title', '<h2 class="title-v2 title-center">', '</h2>'); ?>
			<?php the_conditional_field('service_intro', '<p class="space-lg-hor">', '</p>'); ?>
        </div>

		<?php
			$post_type = $feed['post_type'];
			$limit = $feed['limit'];
			$orderby = $feed['order_by'];
			$order = $feed['order'];
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
			$loop = new WP_Query(array('post_type'=>$post_type,'posts_per_page'=>$limit,'orderby'=>$orderby,'order'=>$order));
			if($loop->have_posts()) :
		?>
        <div class="row news-v2">
			<?php while($loop->have_posts()) : $loop->the_post(); ?>
            <div class="col-md-4 sm-margin-bottom-30">
                <div class="news-v2-badge">
					<?php the_post_thumbnail('feed-thumbs', array('class'=>'img-responsive')); ?>
                    <p>
                        <span><?php the_time('d'); ?></span>
                        <small><?php the_time('M'); ?></small>
                    </p>
                </div>
                <div class="news-v2-desc bg-color-light">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <small>By <?php the_author(); ?> | <a class="color-inherit" href="<?php comments_link(); ?>"><?php comments_number(); ?></a> | In <?php ocp_post_tax($post->ID, $cat); ?></small>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
			<?php endwhile; wp_reset_query(); ?>
        </div>
		<?php endif; ?>
    </div>
    <!--=== End News Block ===-->
	<?php endif; ?>

	<?php 
		$testimonails = get_field('testimonial');
		if(count($testimonails) > 0) :
			foreach($testimonials as $post) : setup_postdata($post);
	?>
    <!--=== Parallax Quote ===-->
    <div class="parallax-quote parallaxBg" style="background-position: 50% 20px;">
        <div class="container">
            <div class="parallax-quote-in">
                <?php the_content(); ?>
                <small>- <?php the_title(); ?> -</small>
            </div>
        </div>
    </div>
    <!--=== End Parallax Quote ===-->
	<?php endforeach; wp_reset_postdata(); endif; ?>

	<?php if(have_rows('spotlight')) : ?>
    <!--=== Colorful Service Blocks ===-->
    <div class="container-fluid">
        <div class="row no-gutter equal-height-columns margin-bottom-10">
			<?php while(have_rows('spotlight')) : the_row(); ?>
            <div class="<?php echo get_col_x(get_field('spotlight'), 'sm'); ?>">
                <div class="service-block service-block-purple no-margin-bottom content equal-height-column">
                    <i class="icon-custom icon-md rounded icon-color-light fa <?php the_sub_field('icon'); ?>"></i>
                    <h2 class="heading-md font-light"><?php the_sub_field('title'); ?></h2>
                    <p class="no-margin-bottom font-light"><?php the_sub_field('text'); ?></p>
                </div>
            </div>
			<?php endwhile; ?>
        </div>        
    </div>
    <!--=== End Colorful Service Blocks ===-->
	<?php endif; ?>

	<?php if(have_rows('services')) : ?>
    <!--=== Service Blocks ===-->
    <div class="container content-sm">
        <div class="text-center margin-bottom-50">
			<?php the_conditional_field('services_title', '<h2 class="title-v2 title-center">', '</h2>'); ?>
			<?php the_conditional_field('services_intro', '<p class="space-lg-hor">', '</p>'); ?>
        </div>

        <!-- Service Blocks -->
        <div class="row service-box-v1 margin-bottom-40">
			<?php while(have_rows('services')) : the_row(); ?>
            <div class="<?php echo get_col_x(get_field('services'), 'sm'); ?> md-margin-bottom-40">
                <div class="service-block service-block-default no-margin-bottom">
                    <i class="icon-lg rounded-x fa <?php the_sub_field('icon'); ?>"></i>
                    <h2 class="heading-sm"><?php the_sub_field('title'); ?></h2>
					<?php 
						$text = get_sub_field('text');
						$text = str_replace('<ul', '<ul class="list-unstyled"', $text);
					?>
                    <?php echo $text; ?>                      
                </div>
            </div>
			<?php endwhile; ?>
        </div>
        <!-- End Service Blocks -->
    </div>
    <!--=== End Service Blocks ===-->
	<?php endif; ?>

	<?php if(have_rows('statistics')) : ?>
    <!--=== Parallax Counter ===-->
    <div class="parallax-counter-v2 parallaxBg1" style="background-position: 50% 90px;">
        <div class="container">
            <ul class="row list-row">
				<?php while(have_rows('statistics')) : the_row(); ?>
                <li class="<?php echo get_col_x(get_field('statistics'), 'md'); ?> col-sm-6 md-margin-bottom-30">
                    <div class="counters rounded">
                        <span class="counter"><?php the_sub_field('number'); ?></span>   
                        <h4 class="text-transform-normal"><?php the_sub_field('title'); ?></h4>
                    </div>    
                </li>
				<?php endwhile; ?>
            </ul>            
        </div>
    </div>
    <!--=== End Parallax Counter ===-->
	<?php endif; ?>

	<?php 
		$callout_text = get_field('callout_text');
		if($callout_text) :
			$callout_btn = get_field('callout_button');
	?>
    <!--=== Call To Action ===-->
    <div class="call-action-v1 bg-color-red">
        <div class="container">
            <div class="call-action-v1-box">
                <div class="call-action-v1-in">
                    <p class="color-light"><?php echo $callout_text; ?></p>
                </div>
				<?php if(have_rows('callout_button')) :  while(have_rows('callout_button')) : the_row(); ?>
                <div class="call-action-v1-in inner-btn page-scroll">
                    <a href="<?php the_sub_field('link'); ?>" class="btn-u btn-brd btn-brd-hover btn-u-light btn-u-block"><?php the_sub_field('label'); ?></a>
                </div>
				<?php endwhile; endif; ?>
            </div>
        </div>
    </div>
    <!--=== End Call To Action ===-->
	<?php endif; ?>

<?php get_footer(); ?>