<?php 

/* display favicon */
function ocp_display_favicon() {
	$favicon = get_field('favicon', 'option');
	if($favicon) {
		echo '<link type="image/x-icon" rel="shortcut icon" href="'.$favicon.'" />';
	} else {
		echo '<link type="image/x-icon" rel="shortcut icon" href="'.get_template_directory_uri().'/favicon.ico" />';
	}
}

/* load google font */
function ocp_google_font() {
	$site_font = get_field('site_font', 'option');
	if($site_font) {
		$font = json_decode($site_font);
		$family = urlencode($font->family);
		echo '<link href="http://fonts.googleapis.com/css?family='.$family.'" rel="stylesheet" type="text/css">';
	}
}
add_action('wp_head', 'ocp_google_font');

/* layout type */
function ocp_layout_type($classes) {
	$layout = get_field('layout', 'option');
	if($layout == 'boxed') {
		$classes[] = 'boxed-layout';
		$classes[] = 'container';
	}
		
	return $classes;
}
add_filter('body_class', 'ocp_layout_type');

/* body background */
function ocp_body_bg() {
	$layout = get_field('layout', 'option');
	if($layout !== 'boxed') 
		return;
		
	ob_start();
		the_background('body_background', true);
		$style = ob_get_contents();
	ob_end_clean();
	
	echo ' style="'.$style.'"';
}

/* enqueue header and footer stylesheets */
function ocp_display_options(){
	$header_version = get_field('header', 'option');
	// handle multiple v6 options
	$v6_alt = array('v7','v8','v9','v10','v11','v12','v13','v14','v15');
	if(in_array($header_version, $v6_alt))
		$header_version = 'v6';
	
	$footer_version = get_field('footer', 'option');
	wp_enqueue_style( 'header', get_template_directory_uri().'/assets/css/headers/header-'.$header_version.'.css', array(), '');
	wp_enqueue_style( 'footer', get_template_directory_uri().'/assets/css/footers/footer-'.$footer_version.'.css', array(), '');
}
add_action( 'wp_enqueue_scripts', 'ocp_display_options' );

/* output header file part */
function ocp_display_header() {
	$header_version = get_field('header', 'option');
	// handle multiple v6 options
	$v6_alt = array('v7','v8','v9','v10','v11','v12','v13','v14','v15');
	if(in_array($header_version, $v6_alt))
		$header_version = 'v6';
	
	get_template_part('parts/header/header', $header_version);
}
add_action('ocp_header', 'ocp_display_header');

function ocp_header_class() {
	$header_version = get_field('header', 'option');
	if($header_version == 'v6') {
		$header_class = '';
	} elseif($header_version == 'v7') {
		$header_class = 'header-dark-transparent';
	} elseif($header_version == 'v8') {
		$header_class = 'header-white-transparent';
	} elseif($header_version == 'v9') {
		$header_class = 'header-border-bottom';
	} elseif($header_version == 'v10') {
		$header_class = 'header-classic-dark';
	} elseif($header_version == 'v11') {
		$header_class = 'header-classic-white';
	} elseif($header_version == 'v12') {
		$header_class = 'header-dark-dropdown';
	} elseif($header_version == 'v13') {
		$header_class = 'header-dark-scroll';
	} elseif($header_version == 'v14') {
		$header_class = 'header-dark-search';
	} else if($header_version == 'v15') {
		$header_class = 'header-dark-res-nav';
	} 
	echo $header_class;
}

function ocp_body_header_class($classes) {
	$header_version = get_field('header', 'option');
	
	if($header_version == 'v10' || $header_version == 'v11')
		$classes[] = 'header-fixed-space';
	
	// handle multiple v6 options
	$v6_alt = array('v7','v8','v9','v10','v11','v12','v13','v14','v15');
	if(in_array($header_version, $v6_alt))
		$header_version = 'v6';
	
	if($header_version == 'v2' || $header_version == 'v6')
		$classes[] = 'header-fixed';
	
	return $classes;
}
add_filter('body_class', 'ocp_body_header_class');

/* output footer file part */
function ocp_display_footer() {
	$footer_version = get_field('footer', 'option');
	get_template_part('parts/footer/footer', $footer_version);
}
add_action('ocp_footer', 'ocp_display_footer');

/* output footer heading class */
function ocp_footer_heading($title) {
	$footer_version = get_field('footer', 'option');
	$before_title = '';
	$after_title = '';
	switch($footer_version) {
		case 'default':
		case 'v1':
			$before_title = '<div class="headline"><h2>';
			$after_title = '</h2></div>';
			break;
		case 'v2':
			$before_title = '<div class="headline"><h2 class="heading-sm">';
			$after_title = '</h2></div>';
			break;
		case 'v3':
			$before_title = '<div class="thumb-headline"><h2>';
			$after_title = '</h2></div>';
			break;
		case 'v4':
			$before_title = '<h2 class="thumb-headline">';
			$after_title = '</h2>';
			break;
		case 'v5':
		case 'v6':
			$before_title = '<div class="heading-footer"><h2>';
			$after_title = '</h2></div>';
			break;
		case 'v7':
			$before_title = '';
			$after_title = '';
			break;
	}
	echo $before_title . $title . $after_title;
}

/* output footer menu */
function ocp_footer_menu($menu = 'Footer', $before_link = '', $after_link = '', $sep = '') {
	$items = wp_get_nav_menu_items($menu);
	if($items) {
		$i = 0;
		$total = count($items);
		foreach($items as $item) {
			if($i == $total - 1) $sep = '';
			echo $before_link . '<a href="'.$item->url.'">'.$item->title.'</a>' . $after_link . $sep;
		$i++; }
	}
}