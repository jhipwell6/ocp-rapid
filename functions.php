<?php
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
require_once( 'assets/inc/framework/display.php' );
require_once( 'assets/inc/framework/scripts.php' );
require_once( 'assets/inc/framework/helpers.php' );
require_once( 'assets/inc/framework/widgets.php' );
require_once( 'assets/inc/framework/fonts.php' );
require_once( 'assets/inc/acf-icon-field.php' );
require_once( 'assets/inc/wp_bootstrap_navwalker.php' );

if ( ! function_exists( '_base_setup' ) ):
function _base_setup() {
	/*add_filter('show_admin_bar', '__return_false');*/
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
	$style = get_field('style', get_option('page_for_posts'));
	if($style == 'basic') {
		$before_title = '<div class="headline headline-md"><h2>';
		$after_title = '</h2></div>';
	} else {
		$before_title = '<div class="headline-v2 bg-color-light"><h2>';
		$after_title = '</h2></div>';
	}
	
    register_sidebar( array(
        'name' => __( 'Sidebar', '_base' ),
        'id' => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div><!-- /.widget -->',
        'before_title' => $before_title,
        'after_title' => $after_title
    ) );
}
add_action( 'widgets_init', '_base_widgets_init' );

function ocp_add_editor_styles() {
    add_editor_style( 'ocp-button-style.css' );
    add_editor_style( 'assets/css/color.css' );
}
add_action( 'admin_init', 'ocp_add_editor_styles' );

/*** Enqueue scripts and styles ***/
function ocp_base_scripts() {

    // global styles
	wp_enqueue_style( 'font-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin', array(), '' );
    wp_enqueue_style( 'bootstrap-min', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '' );
    wp_enqueue_style( 'global-style', get_template_directory_uri().'/assets/css/style.css', array(), '' );
    wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/plugins/animate.css', array(), '' );
    wp_enqueue_style( 'line-icons', get_template_directory_uri().'/assets/plugins/line-icons/line-icons.css', array(), '' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/plugins/font-awesome/css/font-awesome.min.css', array(), '' );
    wp_enqueue_style( 'custom-style', get_template_directory_uri().'/assets/css/custom.css', array(), '' );
    
    // global scripts
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/plugins/bootstrap/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'top', get_template_directory_uri().'/assets/plugins/back-to-top.js', array(), '', true );
	wp_enqueue_script( 'smooth-scroll', get_template_directory_uri().'/assets/plugins/smoothScroll.js', array(), '', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri().'/assets/plugins/jquery.parallax.js', array(), '', true );
	wp_enqueue_script( 'custom-scripts', get_template_directory_uri().'/assets/js/custom.js', array(), '', true );        
	wp_enqueue_script( 'app', get_template_directory_uri().'/assets/js/app.js', array(), '', true );
    
}
add_action( 'wp_enqueue_scripts', 'ocp_base_scripts' );

function ocp_base_color_style() {
	wp_enqueue_style( 'custom-colors', get_template_directory_uri().'/assets/css/color.php', array(), '' );
	wp_enqueue_style( 'custom-fonts', get_template_directory_uri().'/assets/css/fonts.php', array(), '' );
}
add_action( 'wp_enqueue_scripts', 'ocp_base_color_style', 99 );

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
	if(is_page_template('page-templates/contact-default.php') ||
	is_page_template( 'page-templates/contact-v1.php' ) ||
	is_page_template( 'page-templates/contact-v2.php' ) ||
	is_page_template( 'page-templates/contact-v3.php' )) {
		$scripts .= "OwlCarousel.initOwlCarousel();\n
					ContactPage.initMap();\n
					OwlCarousel.initOwlCarousel();\n";

	}
	
	if(is_page_template('page-templates/services-default.php')) {
		$scripts .= "App.initCounter();\n
					App.initParallaxBg();\n";
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

add_filter( 'comments_open', 'ocp_comments_open', 10, 2 );
function ocp_comments_open( $open, $post_id ) {
	$post = get_post( $post_id );
	return true;
}



function ocp_rapid_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	
	$reply = $depth > 1 ? ' blog-comments-reply' : '';
	
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? 'blog-comments margin-bottom-30' . $reply : 'blog-comments margin-bottom-30 parent'  . $reply ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body row">
	<?php endif; ?>
	
	<div class="col-sm-2 sm-margin-bottom-40">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	</div>
	
	<div class="col-sm-10">
		<div class="comments-itself">
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
				<br />
			<?php endif; ?>
			<h4>
				<?php comment_author(); ?>
				<span><?php echo time_ago(get_comment_time('U')); ?> / <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
			</h4>
			<?php comment_text(); ?>
		</div>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}



function ocp_post_tax($post_id, $taxonomy){
    $terms = get_the_terms( $post_id, $taxonomy );
    $t = array();
	if($terms) {
		foreach ( $terms as $term ) {
			$t[] = "<a href=\"". get_term_link($term->slug, $taxonomy) ."\">" . $term->name . "</a>";
		}
	}
    return join( ", ", $t );
}
function ocp_post_tax_no_link($post_id, $taxonomy){
    $terms = get_the_terms( $post_id, $taxonomy );
    $t = array();
	if($terms) {
		foreach ( $terms as $term ) {
			$t[] = $term->name;
		}
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

if( function_exists('acf_add_local_field_group') && get_field('page_title_breadcrumbs', 'option') == 'image' ) :
acf_add_local_field_group(array (
	'key' => 'group_55c43fcde014a',
	'title' => 'Page Title',
	'fields' => array (
		array (
			'key' => 'field_55c440378d26f',
			'label' => 'Banner Image',
			'name' => 'banner_image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_55c440528d270',
			'label' => 'Banner Title',
			'name' => 'banner_title',
			'type' => 'text',
			'instructions' => 'overrides page title',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_55c4406c8d271',
			'label' => 'Banner Sub Title',
			'name' => 'banner_sub_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolio',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;