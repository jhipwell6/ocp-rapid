<?php 

/***
* Google Font API integration
***/

function ocp_google_fonts_curl() {
	$server_key = 'AIzaSyC2BgFJGuEOFG2aXOIuBr0ADX-oVIAyxjM';

	$url = "https://www.googleapis.com/webfonts/v1/webfonts?key=$server_key&sort=alpha&fields=items(category%2Cfamily%2Cfiles)";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_REFERER, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$result = curl_exec($ch);
	curl_close($ch);
	
	return $result;
}

function ocp_acf_load_font_field_choices($field) {
	$result = ocp_google_fonts_curl();
	$fonts = json_decode($result);
	$field['choices'] = array();
	
	foreach($fonts->items as $font) {
		$arr = array('family'=>$font->family, 'category'=>$font->category);
		$value = json_encode($arr);
		$label = $font->family;
		
		$field['choices'][ $value ] = $label;
	}
	
	return $field;
}
add_filter('acf/load_field/name=site_font', 'ocp_acf_load_font_field_choices');

function ocp_acf_load_font_scripts() {
	$screen = get_current_screen();
	if($screen->id == 'toplevel_page_general-options') {
		wp_enqueue_style( 'ocp-admin-fonts', get_template_directory_uri().'/assets/admin/fonts.css', array(), '' );
		wp_enqueue_script( 'ocp-admin-fonts', get_template_directory_uri().'/assets/admin/fonts.js', array(), '', true );
	}
}
add_action('acf/input/admin_enqueue_scripts', 'ocp_acf_load_font_scripts');
