<?php
/*
* Template Name: About (v1)
*/
get_header();
if(have_posts()) the_post();
?>
	<?php get_template_part('parts/loop', 'title'); ?>

    <!--=== Container Part ===-->
    <div class="container content-sm">
        <div class="headline-center margin-bottom-60">
			<?php the_conditional_field('main_title', '<h2>', '</h2>'); ?>
            <?php the_conditional_field('main_intro', '<p>', '</p>'); ?>
        </div>

        <div class="row">
			<div class="col-sm-6">
                <img src="<?php the_image('main_image', 'url'); ?>" alt="<?php the_image('main_image', 'alt'); ?>" class="img-responsive" />
            </div>
            <div class="col-sm-6 md-margin-bottom-50">
				<?php the_field('main_content'); ?>
            </div>
        </div><!--/end row-->
    </div>
    <!--=== End Container Part ===-->
	
	<?php 
		$blocks = get_field('services');
		if($blocks) :
	?>
    <!--=== Service Block v5 ===-->
    <div class="service-block-v5">
        <div class="container">
            <div class="row equal-height-columns">
				<?php foreach($blocks as $service) : ?>
                <div class="<?php echo get_col_x($blocks, 'md'); ?> service-inner equal-height-column">
					<i class="icon-custom icon-md rounded-x icon-bg-u fa <?php echo $service['icon']; ?>"></i>
                    <span><?php echo $service['title']; ?></span>
                    <p><?php echo $service['text']; ?></p>
                </div>
				<?php endforeach; ?>
            </div><!--/end row-->
        </div><!--/end container-->
    </div>
    <!--=== End Service Block v5 ===-->
	<?php endif; ?>

    <!--=== Container Part ===-->
    <div class="container content-sm">
        <div class="headline-center margin-bottom-60">
			<?php the_conditional_field('video_title', '<h2>', '</h2>'); ?>
            <?php the_conditional_field('video_intro', '<p>', '</p>'); ?>
        </div>

		<?php if(have_rows('videos')) : ?>
        <div class="owl-video">
			<?php while(have_rows('videos')) : the_row(); ?>
            <div class="item">
                <a class="fbox-modal fancybox.iframe" href="<?php the_video('video_link', 'embed', true); ?>">
                    <img class="img-responsive" width="800" src="<?php the_video('video_link', 'image', true); ?>" alt="">
                    <img class="video-play" src="<?php bloginfo('template_url'); ?>/assets/img/icons/video-play.png" alt="">
                </a>
            </div>
			<?php endwhile; ?>
        </div><!--/end owl video-->
		<?php endif; ?>
    </div>
    <!--=== End Container Part ===-->

    <!--=== Container Part ===-->
	<div class="bg-color-light">
		<div class="container content-sm">
			<div class="headline-center margin-bottom-60">
				<?php the_conditional_field('secondary_title', '<h2>', '</h2>'); ?>
				<?php the_conditional_field('secondary_intro', '<p>', '</p>'); ?>
			</div>

			<div class="row">
				<div class="col-sm-6 md-margin-bottom-50">
					<?php the_field('secondary_content'); ?>
				</div>
				<div class="col-sm-6">
					<img src="<?php the_image('secondary_image', 'url'); ?>" alt="<?php the_image('secondary_image', 'alt'); ?>" class="img-responsive" />
				</div> 
			</div><!--/end row-->
		</div>
	</div>
    <!--=== End Container Part ===-->
	
	<?php 
		$team = get_field('team_members');
		if($team) :
	?>
    <!--=== Team v4 ===-->
    <div class="container content-sm">
        <div class="headline-center margin-bottom-60">
            <?php the_conditional_field('team_title', '<h2>', '</h2>'); ?>
            <?php the_conditional_field('team_intro', '<p>', '</p>'); ?>              
        </div>

        <div class="row team-v4">
			<?php foreach($team as $post) : setup_postdata($post); ?>
            <div class="<?php echo get_col_x($team, 'md'); ?> md-margin-bottom-50">
                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                <span><?php the_title(); ?></span>
				<small><?php the_field('position'); ?></small>
                <?php the_conditional_field('blurb', '<p>', '</p>'); ?>
                <?php if(have_rows('social_links')) : ?>
				<ul class="list-inline team-social-v4">
					<?php while(have_rows('social_links')) : the_row(); ?>
					<li><a href="<?php the_sub_field('url'); ?>" target="_blank"><i class="rounded-x fa <?php the_sub_field('medium'); ?>"></i></a></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
            </div>
			<?php endforeach; wp_reset_postdata(); ?>
        </div><!--/end row-->
    </div>
    <!--=== End Team v4 ===-->
	<?php endif; ?>
	
	<?php 
		$testimonials = get_field('testimonials');
		if($testimonials) :
			$i = 0;
			$total = count($testimonials);
	?>
    <!--=== Testimonials v4 ===-->
    <div class="bg-color-light">
        <div class="container content-sm">
            <div class="headline-center margin-bottom-60">
                <?php the_conditional_field('testimonials_title', '<h2>', '</h2>'); ?>
                <?php the_conditional_field('testimonials_intro', '<p>', '</p>'); ?>
            </div>

            <?php foreach($testimonials as $post) : setup_postdata($post); ?>
			<?php if($i==0 || $i%2 == 0) { ?><div class="row"><?php } ?>
                <div class="col-sm-6">
                    <!-- Testimonials v4 -->
                    <div class="testimonials-v4 md-margin-bottom-50">
                        <div class="testimonials-v4-in">
                            <?php the_content(); ?>
                        </div>
                        <?php the_post_thumbnail('full', array('class' => 'rounded-x')); ?>
                        <span class="testimonials-author">
                            <?php the_title(); ?>
							<?php the_conditional_field('position', '<br><em>', '</em>'); ?>
                        </span>
                    </div>
                    <!-- End Testimonials v4 -->
                </div>
            <?php if($i%2 == 1 || $i == $total - 1) { ?></div><!--/end row--><?php } ?>
			<?php $i++; endforeach; wp_reset_postdata(); ?>
        </div><!--/end container-->
    </div>
    <!--=== End Testimonials v4 ===-->
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