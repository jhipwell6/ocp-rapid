<?php
	// page title / breadcrumbs
	$page_title = get_field('page_title_breadcrumbs', 'option');
	$title = get_the_title();
	if(is_home() || (is_single() && get_post_type() == 'post')) {
		$blog_page = get_option('page_for_posts');
		$title = get_the_title($blog_page);
	}
	if(class_exists( 'WooCommerce' )) {
		if(is_shop()) {
			$shop_page = get_option('woocommerce_shop_page_id'); 
			$title = get_the_title($shop_page);
		}
	}
	if($page_title == 'default') :
?>
	<!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left"><?php echo $title; ?></h1>
			<?php 
				if ( function_exists( 'yoast_breadcrumb' ) ) { 
					echo '<div class="pull-right breadcrumb">';
					yoast_breadcrumb();
					echo '</div>';
				}
			?>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
<?php ; elseif($page_title == 'image') : ?>
	<!--=== Breadcrumbs v3 ===-->
	<div class="breadcrumbs-v3 img-v3 text-center" style="background-image:url(<?php the_field('banner_image'); ?>);">
        <div class="container">
            <h1><?php ocp_title(get_field('banner_title')); ?></h1>
			<?php the_conditional_field('banner_sub_title', '<p>', '</p>'); ?>
        </div>
    </div>
    <!--=== End Breadcrumbs v3 ===-->
<?php ; else : ?>
	<!--=== Breadcrumbs ===-->
	<div class="breadcrumbs breadcrumbs-<?php echo $page_title; ?>">
        <div class="container">
            <h1 class="pull-left"><?php echo $title; ?></h1>
            <?php 
				if ( function_exists( 'yoast_breadcrumb' ) ) { 
					echo '<div class="pull-right breadcrumb">';
					yoast_breadcrumb();
					echo '</div>';
				}
			?>
        </div>
    </div>
	<!--=== End Breadcrumbs ===-->
<?php endif;  ?>
	
	