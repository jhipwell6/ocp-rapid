<?php
/* updated */
//define( 'ACF_LITE', true );
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'general-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'general-options',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'general-options',
	));
	
}

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );

require_once( 'assets/inc/BFI_Thumb.php' );
require_once( 'assets/inc/options/display.php' );
require_once( 'assets/inc/options/scripts.php' );
require_once( 'assets/inc/options/helpers.php' );
require_once( 'assets/inc/options/fonts.php' );
require_once( 'assets/inc/acf-icon-field.php' );
require_once( 'assets/inc/wp_bootstrap_navwalker.php' );

if ( ! function_exists( '_base_setup' ) ):
function _base_setup() {
	add_filter('show_admin_bar', '__return_false');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
        'primary' => __( 'Primary Menu', '_base' ),
        'footer' => __( 'Footer Menu', '_base' )
	) );
	add_image_size( 'feed-thumbs', 331, 209, true );
}
endif; // _base_setup
add_action( 'after_setup_theme', '_base_setup' );

/*** Widget Areas ***/
function _base_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', '_base' ),
        'id' => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div><!-- /.widget -->",
        'before_title' => '<div class="headline-v2 bg-color-light"><h2>',
        'after_title' => '</h2></div>',
    ) );
}
add_action( 'widgets_init', '_base_widgets_init' );

function ocp_add_editor_styles() {
    add_editor_style( 'ocp-button-style.css' );
    add_editor_style( 'assets/css/color.css' );
}
add_action( 'admin_init', 'ocp_add_editor_styles' );

/*** Enqueue scripts and styles ***/
function _base_scripts() {

    // global styles
	wp_enqueue_style( 'font-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin', array(), '' );
    wp_enqueue_style( 'bootstrap-min', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '' );
    wp_enqueue_style( 'global-style', get_template_directory_uri().'/assets/css/style.css', array(), '' );
    wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/plugins/animate.css', array(), '' );
    wp_enqueue_style( 'line-icons', get_template_directory_uri().'/assets/plugins/line-icons/line-icons.css', array(), '' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/plugins/font-awesome/css/font-awesome.min.css', array(), '' );
    wp_enqueue_style( 'custom-style', get_template_directory_uri().'/assets/css/custom.css', array(), '' );
	wp_enqueue_style( 'custom-colors', get_template_directory_uri().'/assets/css/color.css', array(), '' );
    
    // global scripts
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/plugins/bootstrap/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'top', get_template_directory_uri().'/assets/plugins/back-to-top.js', array(), '', true );
	wp_enqueue_script( 'smooth-scroll', get_template_directory_uri().'/assets/plugins/smoothScroll.js', array(), '', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri().'/assets/plugins/jquery.parallax.js', array(), '', true );
	wp_enqueue_script( 'custom', get_template_directory_uri().'/assets/js/custom.js', array(), '', true );        
	wp_enqueue_script( 'app', get_template_directory_uri().'/assets/js/app.js', array(), '', true );
    
}
add_action( 'wp_enqueue_scripts', '_base_scripts' );

function ocp_essential_scripts() {
	$scripts = "App.init();\n";
	if(have_rows('page_widgets')) { 
		while(have_rows('page_widgets')) { the_row();
			$type = get_sub_field('type');
			if(get_row_layout() == 'slider' && have_rows('slides')) { // has slider
				if($type == 'carousel')
					$scripts .= "RevolutionSlider.initRSfullWidth();\n";
				if($type == 'full')
					$scripts .= "RevolutionSlider.initRSfullScreenOffset();\n";
				if($type == 'panorama')
					$scripts .= "ParallaxSlider.initParallaxSlider();\n";
			}
			if(get_row_layout() == 'post_feed' && $type == 'slider') {
				$scripts .= "OwlRecentWorks.initOwlRecentWorksV2();\n";
			}
			if(get_row_layout() == 'post_feed' && $type == 'isotope') {
				$scripts .= "PortfolioPage.init();\n";
			}
		}
	}
	if(is_home()) {
		$scripts .= "FancyBox.initFancybox();\n";
	}
	if(is_page_template('page-templates/home-default.php')) {
		$scripts .= "App.initCounter();\n
					OwlCarousel.initOwlCarousel();\n
					ParallaxSlider.initParallaxSlider();\n";
	}
	if(is_page_template('page-templates/about-default.php')) {
		$scripts .= "App.initCounter();\n
					App.initParallaxBg();\n
					OwlCarousel.initOwlCarousel();\n";
	}
	if(is_page_template('page-templates/about-v1.php')) {
		$scripts .= "FancyBox.initFancybox();\n
					OwlCarousel.initOwlCarousel();\n";
	}
	if(is_single() && get_post_type() == 'portfolio') {
		$template = get_field('portfolio_item_template', 'option');
		if($template !== 'default') {
			$scripts .= "OwlRecentWorks.initOwlRecentWorksV1();\n";
		}
	}
?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			<?php echo $scripts; ?>
		});
	</script>
	<?php
}
add_action('wp_footer', 'ocp_essential_scripts');

function remove_src_version( $src ) {
	if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_src_version', 9999 );
add_filter( 'script_loader_src', 'remove_src_version', 9999 );

/*** IE8 Support ***/
function ie8_support(){
?>
<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/respond.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/plugins/placeholder-IE-fixes.js"></script>
    <![endif]-->
<?php
}

function _post_taxonomies($postID, $taxonomy, $location = ''){
    $terms = get_the_terms( $postID, $taxonomy );
    $t = array();
    foreach ( $terms as $term ) {
        $t[] = "<a href=\"". get_term_link($term->slug, $taxonomy) ."\">" . $term->name . "</a>";
    }
    return join( ", ", $t );
}
function _post_taxonomies_without_link($postID, $taxonomy, $location = ''){
    $terms = get_the_terms( $postID, $taxonomy );
    $t = array();
    foreach ( $terms as $term ) {
        $t[] = $term->name;
    }
    return join( ", ", $t );
}

function ocp_acf_checked_list( $value, $post_id, $field ) {
	if(!is_admin()) {
		$value = str_replace('<i class="fa fa-check">', '<i class="fa fa-check">&nbsp;', $value);
	}

	return $value;
}
add_filter('acf/format_value/type=wysiwyg', 'ocp_acf_checked_list', 10, 3);