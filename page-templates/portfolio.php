<?php
/*
* Template Name: Portfolio
*/
get_header();
if(have_posts()) the_post();
	$limit = get_field('limit');
	$layout = get_field('layout');
	$style = get_field('style');
	$text = get_field('text');
	$columns = get_field('columns');
	
	// cube class
	switch($layout) {
		case 'boxed':
			$cube_class = ' container margin-bottom-60';
			break;
		case 'full':
			$cube_class = ' margin-bottom-20';
			break;
	}
	
	// caption class
	// link class
	switch($text) {
		case 'in':
			$caption_class = '';
			$link_class = '';
			break;
		case 'out':
			$caption_class = ' margin-bottom-20';
			$link_class = ' no-bottom-space';
			break;
	}
	
	// thumbnail params
	switch($columns) {
		case 2:
			$params = array(949, 600, 'bfi_thumb' => true);
			break;
		case 3:
			$params = array(633, 400, 'bfi_thumb' => true);
			break;
		case 4:
			$params = array(474, 300, 'bfi_thumb' => true);
			break;
	}
?>

	<?php get_template_part('parts/loop', 'title'); ?>
	<!--=== Cube-Portfdlio ===-->
    <div class="cube-portfolio<?php echo $cube_class; ?>">
        <div class="content-xs">
            <div id="filters-container" class="cbp-l-filters-text content-xs">
                <?php portfolio_filter_list(); ?>
            </div><!--/end Filters Container-->
        </div>

        <div id="grid-container" class="cbp-l-grid-agency">
			<?php 
				$args = portfolio_query();
				$loop = new WP_Query($args);
				if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();
			?>
            <div class="cbp-item <?php portfolio_filter_class(); ?>">
                <div class="cbp-caption<?php echo $caption_class; ?>">
                    <div class="cbp-caption-defaultWrap">
						<?php the_post_thumbnail($params, array('class' => 'img-responsive')); ?>
                    </div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <ul class="link-captions<?php echo $link_class; ?>">
                                    <li><a href="<?php the_permalink(); ?>"><i class="rounded-x fa fa-link"></i></a></li>
                                    <li><a href="<?php the_post_thumbnail_url(); ?>" class="cbp-lightbox" data-title="<?php the_title(); ?>"><i class="rounded-x fa fa-search"></i></a></li>
                                </ul>
								<?php if($text == 'in') : ?>
                                <div class="cbp-l-grid-agency-title"><?php the_title(); ?></div>
                                <div class="cbp-l-grid-agency-desc"><?php portfolio_filter_class($post->ID, 'name', ' / '); ?></div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
				<?php if($text == 'out') : ?>
				<div class="cbp-title-dark">
                    <div class="cbp-l-grid-agency-title"><?php the_title(); ?></div>
                    <div class="cbp-l-grid-agency-desc"><?php portfolio_filter_class($post->ID, 'name', ' / '); ?></div>
                </div>
				<?php endif; ?>
            </div>
			<?php endwhile; wp_reset_query(); endif; ?>
        </div><!--/end Grid Container-->
    </div>    
    <!--=== End Cube-Portfdlio ===-->
<?php get_footer(); ?>