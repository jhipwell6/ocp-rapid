    <?php 
		// get slider type (carousel, panorama, full)
		$type = get_sub_field('type');
		
		// type = carousel
		if($type == 'carousel' || $type == 'full') :
	?>
	<!--=== Slider ===-->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
				<?php if(have_rows('slides')) : while(have_rows('slides')) : the_row(); ?>
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
				<?php endwhile; endif; ?>
            </ul>
            <div class="tp-bannertimer tp-bottom"></div>            
        </div>
    </div>
    <!--=== End Slider ===-->
	<?php
		// type = panorama
		; else :
	?>
	<!--=== Slider ===-->
    <div class="slider-inner">
        <div id="da-slider" class="da-slider" style="background-image:url('<?php the_image('background_image', 'url', true); ?>')">
			<?php if(have_rows('slides')) : while(have_rows('slides')) : the_row(); ?>
            <div class="da-slide">
                <?php the_sub_field('caption'); ?>
                <div class="da-img"><img class="img-responsive" src="<?php the_image('image', 'url', true); ?>" alt=""></div>
            </div>
			<?php endwhile; endif; ?>
            <div class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>        
            </div>
        </div>
    </div><!--/slider-->
    <!--=== End Slider ===-->
	<?php endif; ?>