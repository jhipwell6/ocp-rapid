<?php
function ocp_template_scripts() {	

	wp_register_style( 'blog-masonry', get_template_directory_uri().'/assets/css/pages/blog_masonry_3col.css', array(), '' );
	wp_register_style( 'blog-basic', get_template_directory_uri().'/assets/css/pages/blog.css', array(), '' );
	wp_register_style( 'blog-magazine', get_template_directory_uri().'/assets/css/pages/blog_magazine.css', array(), '' );
	wp_register_script( 'masonry-init', get_template_directory_uri().'/assets/plugins/masonry/jquery.masonry.min.js', array(), '', true );
	wp_register_script( 'blog-masonry', get_template_directory_uri().'/assets/js/pages/blog-masonry.js', array(), '', true );
	wp_register_style( 'rev-settings', get_template_directory_uri().'/assets/plugins/revolution-slider/rs-plugin/css/settings.css', array(), '' );
	wp_register_script( 'rev-tools', get_template_directory_uri().'/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js', array(), '', true );
	wp_register_script( 'rev-jquery', get_template_directory_uri().'/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js', array(), '', true );
	wp_register_script( 'rev-custom', get_template_directory_uri().'/assets/js/plugins/revolution-slider.js', array(), '', true );
	wp_register_style( 'parallax-slider', get_template_directory_uri().'/assets/plugins/parallax-slider/css/parallax-slider.css', array(), '' );
	wp_register_script( 'modernizer', get_template_directory_uri().'/assets/plugins/parallax-slider/js/modernizr.js', array(), '', true );
	wp_register_script( 'cs-slider', get_template_directory_uri().'/assets/plugins/parallax-slider/js/jquery.cslider.js', array(), '', true );
	wp_register_script( 'parallax-custom', get_template_directory_uri().'/assets/js/plugins/parallax-slider.js', array(), '', true );
	wp_register_style( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css', array(), '' );
	wp_register_script( 'owl-carousel', get_template_directory_uri().'/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js', array(), '', true );
	wp_register_script( 'owl-works-init', get_template_directory_uri().'/assets/js/plugins/owl-recent-works.js', array(), '', true );
	wp_register_script( 'owl-init', get_template_directory_uri().'/assets/js/plugins/owl-carousel.js', array(), '', true );
	wp_register_style( 'portfolio-v1', get_template_directory_uri().'/assets/css/pages/portfolio-v1.css', array(), '' );
	wp_register_style( 'portfolio-v2', get_template_directory_uri().'/assets/css/pages/portfolio-v2.css', array(), '' );
	wp_register_script( 'mixitup', get_template_directory_uri().'/assets/plugins/jquery.mixitup.min.js', array(), '', true );
	wp_register_script( 'page-portfolio', get_template_directory_uri().'/assets/js/pages/page_portfolio.js', array(), '', true );
	wp_register_style( 'timeline1', get_template_directory_uri().'/assets/css/pages/shortcode_timeline1.css', array(), '' );
	wp_register_style( 'fancybox-pack', get_template_directory_uri().'/assets/plugins/fancybox/source/jquery.fancybox.css', array(), '' );
	wp_register_script( 'fancybox-pack', get_template_directory_uri().'/assets/plugins/fancybox/source/jquery.fancybox.pack.js', array(), '', true );
	wp_register_script( 'fancybox-custom', get_template_directory_uri().'/assets/js/plugins/fancy-box.js', array(), '', true );
	wp_register_style( '404', get_template_directory_uri().'/assets/css/pages/page_404_error.css', array(), '' );
	wp_register_style( 'search', get_template_directory_uri().'/assets/css/pages/page_search_inner.css', array(), '' );
	wp_register_script( 'cs-slider', get_template_directory_uri().'/assets/plugins/parallax-slider/js/jquery.cslider.js', array(), '', true );
	wp_register_script( 'jquery-appear', get_template_directory_uri().'/assets/plugins/jquery-appear.js', array(), '', true );
	wp_register_script( 'waypoints', get_template_directory_uri().'/assets/plugins/counter/waypoints.min.js', array(), '', true );
	wp_register_script( 'counterup', get_template_directory_uri().'/assets/plugins/counter/jquery.counterup.min.js', array(), '', true );
	wp_register_style( 'cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css', array(), '' );
	wp_register_style( 'custom-cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css', array(), '' );
	wp_register_script( 'cubeportfolio', get_template_directory_uri().'/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js', array(), '', true );
	wp_register_style( 'sky-forms', get_template_directory_uri().'/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css', array(), '' );
	wp_register_style( 'custom-sky-forms', get_template_directory_uri().'/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css', array(), '' );
	wp_register_style( 'contact-page', get_template_directory_uri().'/assets/css/pages/page_contact.css', array(), '' );
	wp_register_script( 'contact-page', get_template_directory_uri() . '/assets/js/pages/page_contacts.js', array(), '', true );
	wp_register_script( 'map-init', 'http://maps.google.com/maps/api/js?sensor=true', array(), '', true );
	wp_register_script( 'map-custom', get_template_directory_uri() . '/assets/plugins/gmap/gmap.js', array(), '', true );

	// widget specific
	if(have_rows('page_widgets')) { 
		while(have_rows('page_widgets')) { the_row();
			$type = get_sub_field('type');
			// has slider
			if(get_row_layout() == 'slider' && have_rows('slides')) {
				if($type == 'carousel' || $type == 'full') :
					wp_enqueue_style( 'rev-settings' );
					wp_enqueue_script( 'rev-tools' );
					wp_enqueue_script( 'rev-jquery' );
					wp_enqueue_script( 'rev-custom' );
				endif;
				if($type == 'panorama') :
					wp_enqueue_style( 'parallax-slider' );
					wp_enqueue_script( 'modernizer' );
					wp_enqueue_script( 'cs-slider' );
					wp_enqueue_script( 'parallax-custom' );
				endif;
			}
			if(get_row_layout() == 'post_feed' && $type == 'slider') {
				wp_enqueue_style( 'owl-carousel' );
				wp_enqueue_script( 'owl-carousel' );
				wp_enqueue_script( 'owl-works-init' );
			}
			if(get_row_layout() == 'post_feed' && $type == 'isotope') {
				wp_enqueue_style( 'portfolio-v2' );
				wp_enqueue_script( 'mixitup' );
				wp_enqueue_script( 'page-portfolio' );
			}
		}
	}
	
	// template specific	
	if(is_home() || is_archive()) {
		$style = get_field('style', get_option('page_for_posts'));
		$layout = get_field('layout', get_option('page_for_posts'));
		if($style == 'timeline') {
			wp_enqueue_style( 'timeline1' );
		} elseif($style == 'masonry') {
			wp_enqueue_style( 'blog-masonry' );
			wp_enqueue_script( 'masonry-init' );
			wp_enqueue_script( 'blog-masonry' );
		} elseif($style == 'basic') {
			wp_enqueue_style( 'blog-basic' );
			if($layout == 'large')
				wp_enqueue_style( 'blog-magazine' );
		}
		wp_enqueue_style( 'fancybox-pack' );
		wp_enqueue_script( 'fancybox-pack' );
		wp_enqueue_script( 'fancybox-custom' );
	}
	
	if(is_single()) {
		wp_enqueue_style( 'sky-forms' );
		wp_enqueue_style( 'custom-sky-forms' );
		if(comments_open())
			wp_enqueue_script( 'comment-reply' );
	}
	
	if(is_404()){
		wp_enqueue_style( '404' );
	}
	
	if(is_search()) {
		wp_enqueue_style( 'search' );
	}
	
	// home default
	if(is_page_template( 'page-templates/home-default.php' )) {
		wp_enqueue_style( 'parallax-slider' );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_script( 'modernizer' );
		wp_enqueue_script( 'cs-slider' );
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_script( 'owl-init' );
		wp_enqueue_script( 'parallax-custom' );
	}
	// about default
	if(is_page_template( 'page-templates/about-default.php' )) {
		wp_enqueue_style( 'parallax-slider' );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_script( 'jquery-appear' );
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_script( 'owl-init' );
	}
	
	if(is_page_template( 'page-templates/about-v1.php' )) {
		wp_enqueue_style( 'fancy-pack' );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_script( 'jquery-appear' );
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_script( 'owl-init' );
		wp_enqueue_script( 'fancybox-pack' );
		wp_enqueue_script( 'fancybox-custom' );
	}
	
	if(is_page_template( 'page-templates/about-v2.php' )) {
		
	}
	
	if(is_page_template( 'page-templates/about-v3.php' )) {
		
	}
	// portfolio
	if(is_page_template( 'page-templates/portfolio.php' )) {
		wp_enqueue_style( 'cubeportfolio' );
		wp_enqueue_style( 'custom-cubeportfolio' );
		wp_enqueue_script( 'cubeportfolio' );
		
		$style = get_field('style');
		$style = $style == 'fluid' ? '-ns' : '';
		$columns = get_field('columns');
		$handle = 'cube-portfolio-'.$columns.$style;
		wp_enqueue_script( 'custom-cubeportfolio', get_template_directory_uri().'/assets/js/plugins/cube-portfolio/'.$handle.'.js', array(), '', true );
	}
	
	if(is_single() && get_post_type() == 'portfolio') {
		$template = get_field('portfolio_item_template', 'option');
		if($template == 'default') {
			wp_enqueue_style( 'cubeportfolio' );
			wp_enqueue_style( 'custom-cubeportfolio' );
			wp_enqueue_script( 'cubeportfolio' );
			wp_enqueue_script( 'custom-cubeportfolio', get_template_directory_uri().'/assets/js/plugins/cube-portfolio/cube-portfolio-4.js', array(), '', true );
		} else {
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'portfolio-v1' );
			wp_enqueue_script( 'owl-carousel' );
			wp_enqueue_script( 'owl-works-init' );
		}
	}
	
	if(is_page_template( 'page-templates/contact-default.php' ) ||
	is_page_template( 'page-templates/contact-v1.php' ) ||
	is_page_template( 'page-templates/contact-v2.php' ) ||
	is_page_template( 'page-templates/contact-v3.php' )) {
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'contact-page' );
		wp_enqueue_script( 'map-init' );
		wp_enqueue_script( 'map-custom' );
		wp_enqueue_script( 'contact-page' );
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_script( 'owl-init' );
	}
}
add_action( 'wp_enqueue_scripts', 'ocp_template_scripts', 50 );