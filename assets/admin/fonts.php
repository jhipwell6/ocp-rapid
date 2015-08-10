<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);
	
	$css = '';
	$result = ocp_google_fonts_curl();
	$fonts = json_decode($result);
	
	foreach($fonts->items as $font) {
		$css .= "@import url('http://fonts.googleapis.com/css?family={$font->family}');\n";
	}
	
	header('Content-type: text/css');
	header('Cache-control: must-revalidate');
	
	echo $css;
	
?>