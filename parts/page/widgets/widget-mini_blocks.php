	<?php 
		// get block type (default, boxed, stacked)
		$type = get_sub_field('type');
		
		// type = carousel
		if($type == 'default') :
	?>
	<div class="container content">
    	<!-- Service Blocks -->
    	<div class="row margin-bottom-30">
			<?php 
				$blocks = get_sub_field('blocks');
				if(have_rows('blocks')) : while(have_rows('blocks')) : the_row();
					$link = get_sub_field('link');
					$b_s = $link ? '<a href="'.$link.'" class="service">' : '<div class="service">';
					$b_e = $link ? '</a>' : '</div>';
			?>
        	<div class="<?php echo get_col_x($blocks, 'md'); ?>">
        		<?php echo $b_s; ?>
                    <i class="fa <?php the_sub_field('icon'); ?> service-icon"></i>
        			<div class="desc">
						<?php the_conditional_field('title', '<h4>', '</h4>', true); ?>
						<?php the_conditional_field('text', '<p>', '</p>', true); ?>
        			</div>
        		<?php echo $b_e; ?>
        	</div>
			<?php endwhile; endif; ?>
    	</div>
		<!-- End Service Blocks -->
	</div>
	<!-- End Content Part -->
	<?php 
		// type = boxed
		; elseif($type == 'boxed') :
	?>
	<!--=== Content Part ===-->
    <div class="container content">
        <!-- Service Blocks -->
        <div class="margin-bottom-20"></div>
        <div class="row margin-bottom-40">
			<?php 
				$blocks = get_sub_field('blocks');
				if(have_rows('blocks')) : while(have_rows('blocks')) : the_row();
					$link = get_sub_field('link');
					$b_s = $link ? '<a href="'.$link.'" class="service-block service-block-default">' : '<div class="service-block service-block-default">';
					$b_e = $link ? '</a>' : '</div>';
			?>
            <div class="<?php echo get_col_x($blocks, 'md'); ?>">
                <?php echo $b_s; ?>
                    <i class="icon-custom rounded-x icon-bg-dark fa <?php the_sub_field('icon'); ?>"></i>
					<?php the_conditional_field('title', '<h2 class="heading-md">', '</h2>', true); ?>
                    <?php the_conditional_field('text', '<p>', '</p>', true); ?>
                <?php echo $b_e; ?>
            </div>
			<?php endwhile; endif; ?>
        </div>
        <!-- End Service Blokcs -->
	</div>
	<!-- End Content Part -->
	<?php 
		// type = stacked
		; else :
	?>
	<!--=== Content Part ===-->
    <div class="container content">
        <div class="margin-bottom-10"></div>
        <!-- Service Blocks -->
        <div class="row content-boxes-v2 margin-bottom-30">
			<?php 
				$blocks = get_sub_field('blocks');
				if(have_rows('blocks')) : while(have_rows('blocks')) : the_row();
					$link = get_sub_field('link');
					$b_s = $link ? '<a class="link-bg-icon" href="'.$link.'">' : '<div class="link-bg-icon">';
					$b_e = $link ? '</a>' : '</div>';
			?>
            <div class="<?php echo get_col_x($blocks, 'md'); ?> md-margin-bottom-30">                
                <h2 class="heading-sm">
                    <?php echo $b_s; ?>
                        <i class="icon-custom icon-sm rounded-x icon-bg-dark fa <?php the_sub_field('icon'); ?>"></i>
                        <?php the_conditional_field('title', '<span>', '</span>', true); ?>
                   <?php echo $b_e; ?>
                </h2>
				<?php the_conditional_field('text', '<p class="text-justify">', '</p>', true); ?>
            </div>
			<?php endwhile; endif; ?>
        </div>
	</div>
	<!-- End Content Part -->
	<?php endif; ?>