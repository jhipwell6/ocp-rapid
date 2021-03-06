<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);
	
	$font = json_decode(get_field('site_font', 'option'));
	
	header('Content-type: text/css');
	header('Cache-control: must-revalidate');
?>
/*   
 * Template Name: Rapid - Responsive Bootstrap Template
 * Description: Business, Corporate, Portfolio, E-commerce, Blog and One Page Template.
*/

h1, h2, h3, h4, h5, h6,
.title-v1 h1,.title-v1 h2,
.portfolio-box-v1 .portfolio-box-v1-in,
.portfolio-box-v2 .portfolio-box-v2-in,
.parallax-quote-in p,
.parallax-counter-v2 .counters h4,
.parallax-counter-v2 .counters span,
.interactive-slider-v2 p,
.blog-post-quote p,
.revolution-ch1,
.revolution-mch-1 h6,
.revolution-ch2,
.revolution-mch-1 p,
.re-title-v1,
.re-title-v2,
.re-text-v1,
.re-text-v2,
.testimonials-v3,
.purchase span,
.grid-boxes-quote p,
.grid-boxes-quote p a,
.grid-boxes-quote span,
#defaultCountdown span.countdown-amount,
.invoice-total-info li,
.sky-form.submited .message,
.header-v6 .search-open .form-control,
.navbar-default .navbar-nav > li a{font-family:'<?php echo $font->family; ?>', <?php echo $font->category; ?> !important;}