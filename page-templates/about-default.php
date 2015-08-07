<?php
/*
* Template Name: About (Default)
*/
get_header();
if(have_posts()) the_post();
?>

	<?php get_template_part('parts/loop', 'title'); ?>

	<?php 
		$intro = get_field('text_intro');
		if($intro) :
	?>
    <!--=== Title v1 ===-->
    <div class="container content-sm">
        <div class="title-v1 no-margin-bottom">
			<?php echo $intro; ?>               
        </div>
    </div>
    <!--=== End Title v1 ===-->
	<?php endif; ?>

	<?php 
		$blocks = get_field('services');
		if($blocks) :
	?>
    <!--=== Service Block v4 ===-->
    <div class="service-block-v4">
        <div class="container content-sm">
            <div class="row">
				<?php foreach($blocks as $service) : ?>
                <div class="<?php echo get_col_x($blocks, 'md'); ?> service-desc md-margin-bottom-50">
                    <i class="fa <?php echo $service['icon']; ?>"></i>
                    <h3><?php echo $service['title']; ?></h3>
                    <p class="no-margin-bottom"><?php echo $service['text']; ?></p>
                </div>
				<?php endforeach; ?>
            </div><!--/end row-->
        </div><!--/end container-->
    </div>
    <!--=== End Service Block v4 ===-->
	<?php endif; ?>
	
    <!--=== Container Part ===-->
    <div class="container content-sm">
        <div class="headline-center margin-bottom-60">
			<?php the_conditional_field('main_title', '<h2>', '</h2>'); ?>
            <?php the_conditional_field('main_intro', '<p>', '</p>'); ?>
        </div>

        <div class="row">
            <div class="col-sm-6 md-margin-bottom-50">
				<?php the_field('main_content'); ?>
            </div>
            <div class="col-sm-6">
                <img src="<?php the_image('main_image', 'url'); ?>" alt="<?php the_image('main_image', 'alt'); ?>" class="img-responsive" />
            </div> 
        </div><!--/end row-->
    </div>
    <!--=== End Container Part ===-->

	<?php if(have_rows('stats')) : ?>
    <!--=== Parallax Counter v4 ===-->
    <div class="parallax-counter-v4 parallaxBg" style="<?php the_background('stats_background'); ?>">
        <div class="container content-sm">
            <div class="row">
				<?php while(have_rows('stats')) : the_row(); ?>
                <div class="<?php echo get_col_x(get_field('stats'), 'sm'); ?> md-margin-bottom-50">
                    <i class="fa <?php the_sub_field('icon'); ?>"></i>
                    <span class="counter"><?php the_sub_field('stat'); ?></span>
                    <h4><?php the_sub_field('caption'); ?></h4>
                </div>
				<?php endwhile; ?>
            </div><!--/end row-->
        </div><!--/end container-->
    </div>
    <!--=== End Parallax Counter v4 ===-->
	<?php endif; ?>

	<?php 
		$team = get_field('team_members');
		if($team) :
	?>
    <!--=== Team v3 ===-->
    <div class="container content-sm">
        <div class="headline-center margin-bottom-60">
            <?php the_conditional_field('team_title', '<h2>', '</h2>'); ?>
            <?php the_conditional_field('team_intro', '<p>', '</p>'); ?>             
        </div>

        <div class="row team-v3">
			<?php foreach($team as $post) : setup_postdata($post); ?>
            <div class="<?php echo get_col_x($team, 'md'); ?> md-margin-bottom-50">
                <div class="team-img">
					<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                    <div class="team-hover">
                        <span><?php the_title(); ?></span>
                        <small><?php the_field('position'); ?></small>
                        <?php the_conditional_field('blurb', '<p>', '</p>'); ?>
						<?php if(have_rows('social_links')) : ?>
                        <ul class="list-inline team-social-v3">
							<?php while(have_rows('social_links')) : the_row(); ?>
                            <li><a href="<?php the_sub_field('url'); ?>" target="_blank"><i class="rounded-x fa <?php the_sub_field('medium'); ?>"></i></a></li>
							<?php endwhile; ?>
                        </ul>
						<?php endif; ?>
                    </div>
                </div>
            </div>
			<?php endforeach; wp_reset_postdata(); ?>
        </div><!--/end row-->
    </div>
    <!--=== End Team v3 ===-->
	<?php endif; ?>

	<?php 
		$testimonials = get_field('testimonials');
		if($testimonials) :
			$i = 0;
			$total = count($testimonials);
	?>
    <!--=== Testimonials v6 ===-->
    <div class="bg-color-light">
        <div class="container content-sm">
            <div class="headline-center margin-bottom-60">
                <?php the_conditional_field('testimonials_title', '<h2>', '</h2>'); ?>
                <?php the_conditional_field('testimonials_intro', '<p>', '</p>'); ?>
            </div>

            <!-- Testimonials Wrap -->
            <div class="testimonials-v6 testimonials-wrap">
				<?php foreach($testimonials as $post) : setup_postdata($post); ?>
                <?php if($i==0 || $i%2 == 0) { ?><div class="row margin-bottom-50"><?php } ?>
                    <div class="col-md-6 md-margin-bottom-50">
                        <div class="testimonials-info rounded-bottom">
							<?php the_post_thumbnail('full', array('class' => 'rounded-x')); ?>
                            <div class="testimonials-desc">
                                <?php the_content(); ?>
                                <strong><?php the_title(); ?></strong>
								<?php the_conditional_field('position', '<span>', '</span>'); ?>
                            </div>
                        </div>
                    </div>
                <?php if($i%2 == 1 || $i == $total - 1) { ?></div><!--/end row--><?php } ?>
				<?php $i++; endforeach; wp_reset_postdata(); ?>
            </div>
            <!-- End Testimonials Wrap -->
        </div><!--/end container-->
    </div>
    <!--=== End Testimonials v6 ===-->
	<?php endif; ?>

	<?php 
		$images = get_field('clients');
		if($images) :
	?>
    <!--=== Owl Clients v1 ===-->
    <div class="container content-sm">
        <div class="owl-clients-v1">
			<?php foreach($images as $image) : ?>
            <div class="item">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
            <?php endforeach; ?>
        </div>
    </div>    
    <!--=== End Owl Clients v1 ===-->
	<?php endif; ?>

<?php get_footer(); ?>