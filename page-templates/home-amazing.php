<?php
/*
* Template Name: Home (Amazing Content)
*/
get_header();
if(have_posts()) the_post();
?>
	
	<?php
		if(!is_front_page()) {
			get_template_part('parts/loop', 'title');
		}
	?>

	<?php if(have_rows('slides')) : ?>
	<!--=== Slider ===-->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
				<?php while(have_rows('slides')) : the_row(); ?>
                <!-- SLIDE -->
                <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000">
                    <!-- MAIN IMAGE -->
                    <img src="<?php the_image('image', 'url', true); ?>" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                    <div class="tp-caption revolution-ch1 sft start"
                        data-x="center"
                        data-hoffset="0"
                        data-y="100"
                        data-speed="1500"
                        data-start="500"
                        data-easing="Back.easeInOut"
                        data-endeasing="Power1.easeIn"                        
                        data-endspeed="300">
                        <?php the_sub_field('caption'); ?>
                    </div>
					
                </li>
                <!-- END SLIDE -->
				<?php endwhile; ?>
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>            
        </div>
    </div>
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

	<?php if(have_rows('blocks')) : ?>
    <!--=== Content Part ===-->
    <div class="one-page">
		<?php
			$i = 0;
			while(have_rows('blocks')) : the_row(); 
				$align_content = $i%2 == 1 ? 'col-md-6' : 'col-md-6 col-md-push-6';
				$align_image = $i%2 == 1 ? 'col-md-6' : 'col-md-6 col-md-pull-6';
				$text_color = get_brightness(get_sub_field('background_color')) > 170 ? 'text-dark' : 'text-light';
		?>
        <div class="one-page-inner one-default <?php echo $text_color; ?>" style="background-color:<?php the_sub_field('background_color'); ?>;">
            <div class="container content">
                <div class="row">
                    <div class="<?php echo $align_content; ?>">
                        <?php the_sub_field('content'); ?>
                    </div>
                    <div class="<?php echo $align_image; ?>">
                        <img src="<?php the_image('image', 'url', true); ?>" class="img-responsive margin-bottom-10" alt="<?php the_image('image', 'alt', true); ?>">
                    </div>
                </div>
            </div>
        </div>
		<?php $i++; endwhile; ?>
    </div><!--/one-page-->
    <!-- End Content Part -->
	<?php endif; ?>
	
<?php get_footer(); ?>