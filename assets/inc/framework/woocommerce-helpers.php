<?php

// remove default title
function ocp_woo_remove_title() {
    return false;
}
add_filter('woocommerce_show_page_title', 'ocp_woo_remove_title');

// remove default breadcrumb
function ocp_woo_remove_crumbs() {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}
add_action('init', 'ocp_woo_remove_crumbs');

//remove default wrapper
function ocp_woo_remove_wrapper() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
}
add_action('init', 'ocp_woo_remove_wrapper');

//add custom wrapper
function ocp_woo_wrapper_start() {
	ob_start();
		get_template_part('parts/loop', 'title');
	$wrapper = ob_get_contents();
	ob_end_clean();
    $wrapper .= '<div class="container content">';
    
    echo $wrapper;
}
add_action('woocommerce_before_main_content', 'ocp_woo_wrapper_start', 10);

function ocp_woo_wrapper_end() {
    $wrapper =      '</div>';
    
    echo $wrapper;
}
add_action('woocommerce_after_main_content', 'ocp_woo_wrapper_end', 10);

//remove default sidebar
function ocp_woo_remove_sidebar() {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
add_action('init', 'ocp_woo_remove_sidebar');

//add the_content to product summary
function ocp_woo_add_content_to_summary() {
	echo wpautop(get_the_content());
}
add_action('woocommerce_single_product_summary', 'ocp_woo_add_content_to_summary', 15);

//remove after product summary
function ocp_woo_remove_after_single_product_summary() {
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
}
add_action('init', 'ocp_woo_remove_after_single_product_summary');