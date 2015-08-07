<?php
function ocp_template_scripts() {	
	// widget specific
	if(have_rows('page_widgets')) { 
		while(have_rows('page_widgets')) { the_row();
			$type = get_sub_field('type');
			// has slider
			if(get_row_layout() == 'slider' && have_rows('slides')) {
				if($type == 'carousel' || $type == 'full') :
					wp_enqueue_style( 'rev-settings', get_template_directory_uri().'/assets/plugins/revolution-slider/rs-plugin/css/settings.css', array(), '' );
					wp_enqueue_script( 'rev-tools', get_template_directory_uri().'/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js', array(), '', true );
					wp_enqueue_script( 'rev-jquery', get_template_directory_uri().'/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js', array(), '', true );
					wp_enqueue_script( 'rev-custom', get_template_directory_uri().'/assets/js/plugins/revolution-slider.js', array(), '', true );
				endif;
				if($type == 'panorama') :
					wp_enqueue_style( 'parallax-slider', get_template_directory_uri().'/assets/plugins/parallax-slider/css/parallax-slider.css', array(), '' );
					wp_enqueue_script( 'modernizer', get_template_directory_uri().'/assets/plugins/parallax-slider/js/modernizr.js', array(), '', true );
					wp_enqueue_script( 'cs-slider', get_template_directory_uri().'/assets/plugins/parallax-slider/js/jquery.cslider.js', array(), '', true );
					wp_enqueue_script( 'parallax-custom', get_template_directory_uri().'/assets/js/plugins/parallax-slider.js', array(), '', true );
				endif;
			}
			if(get_row_layout() == 'post_feed' && $type == 'slider') {
				wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css', array(), '' );
				wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js', array(), '', true );
				wp_enqueue_script( 'owl-init', get_template_directory_uri().'/assets/js/plugins/owl-recent-works.js', array(), '', true );
			}
			if(get_row_layout() == 'post_feed' && $type == 'isotope') {
				wp_enqueue_style( 'portfolio-v2', get_template_directory_uri().'/assets/css/pages/portfolio-v2.css', array(), '' );
				wp_enqueue_script( 'mixitup', get_template_directory_uri().'/assets/plugins/jquery.mixitup.min.js', array(), '', true );
				wp_enqueue_script( 'page-portfolio', get_template_directory_uri().'/assets/js/pages/page_portfolio.js', array(), '', true );
			}
		}
	}
	
	// template specific
	if(is_front_page()) {
		wp_enqueue_style( 'fancybox-pack', get_template_directory_uri().'/assets/plugins/fancybox/source/jquery.fancybox.css', array(), '' );
		wp_enqueue_script( 'fancybox-pack-js', get_template_directory_uri().'/assets/plugins/fancybox/source/jquery.fancybox.pack.js', array(), '', true );
		wp_enqueue_script( 'fancybox-custom-js', get_template_directory_uri().'/assets/js/plugins/fancy-box.js', array(), '', true );
	}
	
	if(is_home() || is_archive()) {
		$style = get_field('style', get_option('page_for_posts'));
		if($style == 'timeline') {
			wp_enqueue_style( 'timeline1', get_template_directory_uri().'/assets/css/pages/shortcode_timeline1.css', array(), '' );
		} elseif($style == 'masonry') {
			wp_enqueue_style( 'blog-masonry', get_template_directory_uri().'/assets/css/pages/blog_masonry_3col.css', array(), '' );
			wp_enqueue_script( 'masonry-init', get_template_directory_uri().'/assets/plugins/masonry/jquery.masonry.min.js', array(), '', true );
			wp_enqueue_script( 'blog-masonry', get_template_directory_uri().'/assets/js/pages/blog-masonry.js', array(), '', true );
		}
	}
	
	if(is_404()){
		wp_enqueue_style( '404', get_template_directory_uri().'/assets/css/pages/page_404_error.css', array(), '' );
	}
	
	if(is_search()) {
		wp_enqueue_style( 'search', get_template_directory_uri().'/assets/css/pages/page_search_inner.css', array(), '' );
	}
	
	// home default
	if(is_page_template( 'page-templates/home-default.php' )) {
		wp_enqueue_style( 'parallax-slider', get_template_directory_uri().'/assets/plugins/parallax-slider/css/parallax-slider.css', array(), '' );
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css', array(), '' );
		
		wp_enqueue_script( 'modernizer', get_template_directory_uri().'/assets/plugins/parallax-slider/js/modernizr.js', array(), '', true );
		wp_enqueue_script( 'cs-slider', get_template_directory_uri().'/assets/plugins/parallax-slider/js/jquery.cslider.js', array(), '', true );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js', array(), '', true );
		wp_enqueue_script( 'owl-init', get_template_directory_uri().'/assets/js/plugins/owl-carousel.js', array(), '', true );
		wp_enqueue_script( 'parallax-custom', get_template_directory_uri().'/assets/js/plugins/parallax-slider.js', array(), '', true );
	}
	// about default
	if(is_page_template( 'page-templates/about-default.php' )) {
		wp_enqueue_style( 'parallax-slider', get_template_directory_uri().'/assets/plugins/parallax-slider/css/parallax-slider.css', array(), '' );
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css', array(), '' );
		wp_enqueue_script( 'jquery-appear', get_template_directory_uri().'/assets/plugins/jquery-appear.js', array(), '', true );
		wp_enqueue_script( 'waypoints', get_template_directory_uri().'/assets/plugins/counter/waypoints.min.js', array(), '', true );
		wp_enqueue_script( 'counterup', get_template_directory_uri().'/assets/plugins/counter/jquery.counterup.min.js', array(), '', true );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js', array(), '', true );
		wp_enqueue_script( 'owl-init', get_template_directory_uri().'/assets/js/plugins/owl-carousel.js', array(), '', true );
	}
	
	if(is_page_template( 'page-templates/about-v1.php' )) {
		wp_enqueue_style( 'fancy-css', get_template_directory_uri().'/assets/plugins/fancybox/source/jquery.fancybox.css', array(), '' );
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css', array(), '' );
		wp_enqueue_script( 'jquery-appear', get_template_directory_uri().'/assets/plugins/jquery-appear.js', array(), '', true );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js', array(), '', true );
		wp_enqueue_script( 'owl-init', get_template_directory_uri().'/assets/js/plugins/owl-carousel.js', array(), '', true );
		wp_enqueue_script( 'fancy-pack', get_template_directory_uri().'/assets/plugins/fancybox/source/jquery.fancybox.pack.js', array(), '', true );
		wp_enqueue_script( 'fancy-box', get_template_directory_uri().'/assets/js/plugins/fancy-box.js', array(), '', true );
	}
	
	if(is_page_template( 'page-templates/about-v2.php' )) {
		
	}
	
	if(is_page_template( 'page-templates/about-v3.php' )) {
		
	}
	// portfolio
	if(is_page_template( 'page-templates/portfolio.php' )) {
		wp_enqueue_style( 'cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css', array(), '' );
		wp_enqueue_style( 'custom-cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css', array(), '' );
		wp_enqueue_script( 'cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js', array(), '', true );
		
		$style = get_field('style');
		$style = $style == 'fluid' ? '-ns' : '';
		$columns = get_field('columns');
		$handle = 'cube-portfolio-'.$columns.$style;
		wp_enqueue_script( 'custom-cubeportfolio', get_template_directory_uri().'/assets/js/plugins/cube-portfolio/'.$handle.'.js', array(), '', true );
	}
	
	if(is_single() && get_post_type() == 'portfolio') {
		$template = get_field('portfolio_item_template', 'option');
		if($template == 'default') {
			wp_enqueue_style( 'cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css', array(), '' );
			wp_enqueue_style( 'custom-cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css', array(), '' );
			wp_enqueue_script( 'cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js', array(), '', true );
			wp_enqueue_script( 'custom-cubeportfolio', get_template_directory_uri().'/assets/js/plugins/cube-portfolio/cube-portfolio-4.js', array(), '', true );
		} else {
			wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css', array(), '' );
			wp_enqueue_style( 'portfolio-v1', get_template_directory_uri().'/assets/css/pages/portfolio-v1.css', array(), '' );
			wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js', array(), '', true );
			wp_enqueue_script( 'owl-init', get_template_directory_uri().'/assets/js/plugins/owl-recent-works.js', array(), '', true );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'ocp_template_scripts', 50 );