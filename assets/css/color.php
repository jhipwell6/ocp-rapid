<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);

	$color = new Color_Converter();
	
	$primary_color = get_field('color_primary', 'option');
	$darker_color = $color->hexColorMod($primary_color, -0.1);
	$lighter_color = $color->hexColorMod($primary_color, 0.1);
	
	class Color_Converter
	{
		// usage: $this->hexColorMod("#aa00ff", -0.2); // darker by 20%
		// returns: #8700cc
		public function hexColorMod($hex, $diff) {
			$rgbhex = str_split(trim($hex, '# '), 2);
			$rgbdec = array_map("hexdec", $rgbhex);
			$hsv = $this->RGB_TO_HSV($rgbdec[0], $rgbdec[1], $rgbdec[2]);
			$hsv['V'] = $hsv['V'] + $diff;
			$rgbdark = $this->HSV_TO_RGB($hsv['H'], $hsv['S'], $hsv['V']);
			$output = array_map("dechex", $rgbdark);
			$output = array_map(array($this,"zeropad2"), $output); // gotta zero-pad single-digit hex
			return '#'.implode($output);
		}
		public function zeropad2($num)
		{
			$limit = 2;
			return (strlen($num) >= $limit) ? $num : $this->zeropad2("0" . $num);
		}
		public function RGB_TO_HSV ($R, $G, $B)  // RGB Values:Number 0-255 
		{                                 // HSV Results:Number 0-1 
		   $HSL = array(); 
		   $var_R = ($R / 255); 
		   $var_G = ($G / 255); 
		   $var_B = ($B / 255); 
		   $var_Min = min($var_R, $var_G, $var_B); 
		   $var_Max = max($var_R, $var_G, $var_B); 
		   $del_Max = $var_Max - $var_Min; 
		   $V = $var_Max; 
		   if ($del_Max == 0) 
		   { 
			  $H = 0; 
			  $S = 0; 
		   } 
		   else 
		   { 
			  $S = $del_Max / $var_Max; 
			  $del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max; 
			  $del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max; 
			  $del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max; 
			  if      ($var_R == $var_Max) $H = $del_B - $del_G; 
			  else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B; 
			  else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R; 
			  if ($H<0) $H++; 
			  if ($H>1) $H--; 
		   } 
		   $HSL['H'] = $H; 
		   $HSL['S'] = $S; 
		   $HSL['V'] = $V; 
		   return $HSL; 
		} 
		function HSV_TO_RGB ($H, $S, $V)  // HSV Values:Number 0-1 
		{                                 // RGB Results:Number 0-255 
			$RGB = array(); 
			if($S == 0) 
			{ 
				$R = $G = $B = $V * 255; 
			} 
			else 
			{ 
				$var_H = $H * 6; 
				$var_i = floor( $var_H ); 
				$var_1 = $V * ( 1 - $S ); 
				$var_2 = $V * ( 1 - $S * ( $var_H - $var_i ) ); 
				$var_3 = $V * ( 1 - $S * (1 - ( $var_H - $var_i ) ) ); 
				if       ($var_i == 0) { $var_R = $V     ; $var_G = $var_3  ; $var_B = $var_1 ; } 
				else if  ($var_i == 1) { $var_R = $var_2 ; $var_G = $V      ; $var_B = $var_1 ; } 
				else if  ($var_i == 2) { $var_R = $var_1 ; $var_G = $V      ; $var_B = $var_3 ; } 
				else if  ($var_i == 3) { $var_R = $var_1 ; $var_G = $var_2  ; $var_B = $V     ; } 
				else if  ($var_i == 4) { $var_R = $var_3 ; $var_G = $var_1  ; $var_B = $V     ; } 
				else                   { $var_R = $V     ; $var_G = $var_1  ; $var_B = $var_2 ; } 
				$R = $var_R * 255; 
				$G = $var_G * 255; 
				$B = $var_B * 255; 
			} 
			$RGB['R'] = $R; 
			$RGB['G'] = $G; 
			$RGB['B'] = $B; 
			return $RGB; 
		} 
	}
	
	header('Content-type: text/css');
	header('Cache-control: must-revalidate');
	
?>
/* 
* Primary Color: <?php echo $primary_color; ?>; 
* Darker Color: <?php echo $darker_color; ?>;
* Lighter Color: <?php echo $lighter_color; ?>;
* rgba(24, 186, 155, 1);
*/

a {
  color: <?php echo $primary_color; ?>;
}
a:focus, 
a:hover, 
a:active {
	color: <?php echo $primary_color; ?>;
}
.color-green {
	color: <?php echo $primary_color; ?>;
}
a.read-more:hover { 
	color:<?php echo $primary_color; ?>; 
}
.linked:hover {
	color:<?php echo $primary_color; ?>;
}

/* Headers Default
------------------------------------*/
.header .navbar-nav > .active > a {
  color: <?php echo $primary_color; ?>;
}
.header .navbar-nav > .active > a {
  border-color: <?php echo $primary_color; ?>;
}
.header .dropdown-menu {
	border-top: solid 2px <?php echo $primary_color; ?>;
}
.header .navbar-nav > li:hover > a {
  color: <?php echo $darker_color; ?>;
}
.header .nav > li > .search:hover {
  border-bottom-color: <?php echo $darker_color; ?>;
  color: <?php echo $darker_color; ?>;
}
.header .navbar-nav > li > a:hover,
.header .navbar-nav > .active > a {
  border-bottom-color: <?php echo $primary_color; ?>;
}
.header .navbar-toggle {
  border-color: <?php echo $darker_color; ?>;
}
.header .navbar-toggle,
.header .navbar-toggle:hover,
.header .navbar-toggle:focus {
  background:  <?php echo $primary_color; ?>;
}
.header .navbar-toggle:hover {
  background:  <?php echo $darker_color; ?> !important;
}
.header .navbar-nav > .open > a,
.header .navbar-nav > .open > a:hover,
.header .navbar-nav > .open > a:focus {
  color: <?php echo $primary_color; ?>;
}

/* Design for max-width: 991px */
@media (max-width: 991px) {
	.header .navbar-nav > .active > a,
	.header .navbar-nav > .active > a:hover,
	.header .navbar-nav > .active > a:focus	{
	  background:  <?php echo $primary_color; ?>;
	  color: #fff !important;
	}
	.header .navbar-nav > .active > a {
	  border-color: #eee;
	}
	.header .nav > li > .search:hover {
	  background:  <?php echo $primary_color; ?>;
	}
	.header.header-dark .navbar-nav .dropdown > a:hover {
	  color: <?php echo $primary_color; ?>
	}
	.header.header-dark .navbar-nav > li > a:hover,
	.header.header-dark .navbar-nav > .active > a {
	  color: <?php echo $primary_color; ?> !important;
	}
}

/* Headers v1
------------------------------------*/
.header-v1 .navbar-default .navbar-nav > .active > a,
.header-v1 .navbar-default .navbar-nav > li > a:hover,
.header-v1 .navbar-default .navbar-nav > li > a:focus {
  color: <?php echo $primary_color; ?>;
}
.header-v1 .dropdown-menu {
  border-color: <?php echo $primary_color; ?>
}
.header-v1 .navbar-default .navbar-nav > li:hover > a {
  color: <?php echo $primary_color; ?>;
}
.header-v1 .navbar .nav > li > .search:hover {
  color: <?php echo $primary_color; ?>;
}
.header-v1 .navbar .nav > li > .search:hover {
  color: <?php echo $primary_color; ?>;
}
.header-v1 .navbar-default .navbar-toggle {
  border-color: <?php echo $darker_color; ?>;
}
.header-v1 .navbar-toggle,
.header-v1 .navbar-default .navbar-toggle:hover,
.header-v1 .navbar-default .navbar-toggle:focus {
  background:  <?php echo $primary_color; ?>;
}
.header-v1 .navbar-toggle:hover {
  background:  <?php echo $darker_color; ?> !important;
}
.header-v1 .topbar-v1 .top-v1-data li a:hover i {
  color: <?php echo $primary_color; ?>;
}

/* Design for max-width: 991px */
@media (max-width: 991px) {
	.header-v1 .navbar-default .navbar-nav > li:hover > a {
  	border-color:  #eee;
	}
	.header-v1 .navbar-default .navbar-nav > .active > a,
	.header-v1 .navbar-default .navbar-nav > .active > a:hover,
	.header-v1 .navbar-default .navbar-nav > .active > a:focus {
	  background-color: <?php echo $primary_color; ?>;
	}
	.header-v1 .navbar-default .navbar-nav > .active > a {
	  border-color: #eee;
	}
	.header-v1 .navbar .nav > li > .search:hover {
	  background-color: <?php echo $primary_color; ?>;
	}
}

/* Headers v2
------------------------------------*/
.header-v2 .dropdown-menu {
  border-color: <?php echo $primary_color; ?>;
}
.header-v2 .navbar-default .navbar-toggle {
  border-color: <?php echo $darker_color; ?>;
}
.header-v2 .navbar-toggle,
.header-v2 .navbar-default .navbar-toggle:hover,
.header-v2 .navbar-default .navbar-toggle:focus {
  background:  <?php echo $primary_color; ?>;
}
.header-v2 .navbar-toggle:hover {
  background:  <?php echo $darker_color; ?> !important;
}

/* Design for max-width: 991px */
@media (max-width: 991px) {
	.header-v2 .navbar-default .navbar-nav > .active > a,
	.header-v2 .navbar-default .navbar-nav > .active > a:hover,
	.header-v2 .navbar-default .navbar-nav > .active > a:focus {
	  background:  <?php echo $primary_color; ?>;
	  color: #fff !important;
	}
	.header-v2 .navbar-default .navbar-nav > li > a:hover {
   	color: <?php echo $primary_color; ?>;
	}
}	

/* Headers v3
------------------------------------*/
.header-v3 .navbar-default .navbar-nav > .active > a {
  color: <?php echo $primary_color; ?>;
}
.header-v3 .navbar-default .navbar-nav > li:hover > a {
  color: <?php echo $darker_color; ?>;
}
.header-v3 .dropdown-menu {
  border-color: <?php echo $primary_color; ?>;
}
.header-v3 .navbar-default .navbar-toggle {
  border-color: <?php echo $darker_color; ?>;
}
.header-v3 .navbar-toggle,
.header-v3 .navbar-default .navbar-toggle:hover,
.header-v3 .navbar-default .navbar-toggle:focus {
  background:  <?php echo $primary_color; ?>;
}
.header-v3 .navbar-toggle:hover {
  background:  <?php echo $darker_color; ?> !important;
}
.header-v3 .navbar .nav > li > .search:hover {
  background: inherit;
  color: <?php echo $primary_color; ?>;
}

/* Design for max-width: 991px */
@media (max-width: 991px) {

	.header-v3 .navbar-default .navbar-nav > .active > a,
	.header-v3 .navbar-default .navbar-nav > .active > a:hover,
	.header-v3 .navbar-default .navbar-nav > .active > a:focus {
	  background:  <?php echo $primary_color; ?>;
	  color: #fff !important;
	}
	.header-v3 .navbar-default .navbar-nav > .active > a {
	  border-color: #eee;
	}
	.header-v3 .navbar .nav > li > .search:hover {
	  background:  <?php echo $primary_color; ?>;
	}
}	

/* Headers v4
------------------------------------*/
.header-v4 .navbar-default .navbar-nav > li > a:hover, 
.header-v4 .navbar-default .navbar-nav > .active > a {
  border-color: <?php echo $primary_color; ?>;
}
.header-v4 .navbar-default .navbar-nav > .active > a {
  color: <?php echo $primary_color; ?>;
}
.header-v4 .navbar-default .navbar-nav > li:hover > a {
  border-color:  <?php echo $primary_color; ?>;
  color: <?php echo $darker_color; ?>;
}
.header-v4 .navbar .nav > li > .search:hover {
  color: <?php echo $primary_color; ?>;
}
.header-v4 .navbar-default .navbar-nav > .open > a,
.header-v4 .navbar-default .navbar-nav > .open > a:hover,
.header-v4 .navbar-default .navbar-nav > .open > a:focus {
  color: <?php echo $primary_color; ?>;
}

/* Design for max-width: 991px */
@media (max-width: 991px) {
	.header-v4 .navbar-default .navbar-nav > li:hover > a {
  border-color:  #eee;
	}
	.header-v4 .navbar-default .navbar-nav > .active > a,
	.header-v4 .navbar-default .navbar-nav > .active > a:hover,
	.header-v4 .navbar-default .navbar-nav > .active > a:focus {
	  color: <?php echo $primary_color; ?> !important;
	}
	.header-v4 .navbar-default .navbar-nav > .active > a {
	  border-color: #eee;
	}
	.header-v4 .navbar .nav > li > .search:hover {
	  background:  <?php echo $primary_color; ?>;
	}
}

/* Headers v5
------------------------------------*/
.header-v5 .navbar-default .navbar-nav > li > a:hover,
.header-v5 .navbar-default .navbar-nav > .active > a {
  border-top: 2px solid <?php echo $primary_color; ?>;
}
.header-v5 .navbar-default .navbar-nav > .active > a {
  color: <?php echo $primary_color; ?>;
}
.header-v5 .navbar-default .navbar-nav > li:hover > a {
  color: <?php echo $primary_color; ?>;
}
.header-v5 .navbar-default .navbar-nav > .open > a,
.header-v5 .navbar-default .navbar-nav > .open > a:hover,
.header-v5 .navbar-default .navbar-nav > .open > a:focus {
  color: <?php echo $primary_color; ?>;
}
.header-v5 .dropdown-menu li > a:hover {
  background:  <?php echo $primary_color; ?>;
}
.header-v5 .dropdown-menu .active > a,
.header-v5 .dropdown-menu li > a:hover {
  background:  <?php echo $primary_color; ?>;
}
.header-v5 .dropdown-menu {
  border-color: <?php echo $primary_color; ?>;
}
.header-v5 .dropdown-menu li.dropdown-submenu:hover > a {
  background:  <?php echo $primary_color; ?>;
}
.header-v5 .dropdown-menu .style-list li > a:hover {
  background: none;
}
.header-v5 .style-list li a:hover {
  color: <?php echo $primary_color; ?>;
}

/* Shopping cart
------------------------------------*/
.header-v5 .shop-badge.badge-icons i {
  color: <?php echo $primary_color; ?>;
}
.header-v5 .shop-badge span.badge-sea {
  background:  <?php echo $primary_color; ?>;
}
.header-v5 .badge-open {
  border-top: 2px solid <?php echo $primary_color; ?>;
  box-shadow: 0 5px 5px 0 rgba(24, 186, 155, 0.075);
}

/* Header v6
------------------------------------*/
/* Search */
.header-v6 .shopping-cart .shopping-cart-open {
	border-top-color: <?php echo $primary_color; ?> !important;
}
.header-v6 li.menu-icons span.badge {
	background: <?php echo $primary_color; ?>;
}
/* Dropdown Menu */
.header-v6 .dropdown-menu {
	border-top-color: <?php echo $primary_color; ?>;
}

/* Media Queries */
@media (max-width: 991px) {
	/* Navbar Nav */
	.header-v6 .navbar-nav > .active > a,
	.header-v6 .navbar-nav > .active > a:hover,
	.header-v6 .navbar-nav > .active > a:focus {
		color: <?php echo $primary_color; ?> !important;
	}
	.header-v6 .nav .open > a,
	.header-v6 .nav .open > a:hover,
	.header-v6 .nav .open > a:focus {
	  border-color: #eee;
	}
	.header-v6 .navbar-nav > li > a:hover,
	.header-v6 .navbar-nav .open .dropdown-menu > li > a:hover,
	.header-v6 .navbar-nav .open .dropdown-menu > li > a:focus,
	.header-v6 .navbar-nav .open .dropdown-menu > .active > a,
	.header-v6 .navbar-nav .open .dropdown-menu > .active > a:hover,
	.header-v6 .navbar-nav .open .dropdown-menu > .active > a:focus {
		color: <?php echo $primary_color; ?> !important;
	}
	.header-v6 .mega-menu .equal-height-list li a:hover {
		color: <?php echo $primary_color; ?> !important;
	}

	/* Classic Dark */
	.header-v6 .mega-menu .equal-height-list li a:hover {
		color: <?php echo $primary_color; ?>;
	}

	/* Dark Responsive Navbar */
	.header-v6.header-dark-res-nav .navbar-nav > li a:hover,
	.header-v6.header-dark-res-nav .navbar-nav .open .dropdown-menu > li > a:hover {
		color: <?php echo $primary_color; ?>;
	}
	.header-v6.header-dark-res-nav .nav .open > a,
	.header-v6.header-dark-res-nav .nav .open > a:hover,
	.header-v6.header-dark-res-nav .nav .open > a:focus {
	  border-color: #555;
	}
}

@media (min-width: 992px) {
	/* Default Style */
	.header-fixed .header-v6.header-fixed-shrink .navbar-nav .active > a,
	.header-fixed .header-v6.header-fixed-shrink .navbar-nav li > a:hover {
		color: <?php echo $primary_color; ?> !important;
	}
	.header-v6 .dropdown-menu .active > a,
	.header-v6 .dropdown-menu li > a:hover,
	.header-fixed .header-v6.header-fixed-shrink .dropdown-menu .active > a,
	.header-fixed .header-v6.header-fixed-shrink .dropdown-menu li > a:hover {
		color: <?php echo $primary_color; ?> !important;
	}
	.header-fixed .header-v6.header-fixed-shrink .navbar-nav .active > a,
	.header-fixed .header-v6.header-fixed-shrink .navbar-nav li > a:hover {
		color: <?php echo $primary_color; ?>;
	}

	/* Classic White */
	.header-fixed .header-v6.header-classic-white .navbar-nav .active > a,
	.header-fixed .header-v6.header-classic-white .navbar-nav li > a:hover {
		color: <?php echo $primary_color; ?>;
	}

	/* Classic Dark */
	.header-v6.header-classic-dark .navbar-nav .active > a,
	.header-v6.header-classic-dark .navbar-nav li > a:hover,
	.header-fixed .header-v6.header-classic-dark.header-fixed-shrink .navbar-nav .active > a,
	.header-fixed .header-v6.header-classic-dark.header-fixed-shrink .navbar-nav li > a:hover {
		color: <?php echo $primary_color; ?>;
	}
	.header-v6.header-classic-dark .dropdown-menu .active > a,
	.header-v6.header-classic-dark .dropdown-menu li > a:hover {
		color: <?php echo $primary_color; ?> !important;
	}

	/* Dark Dropdown */
	.header-v6.header-dark-dropdown .dropdown-menu .active > a,
	.header-v6.header-dark-dropdown .dropdown-menu li > a:hover {
		color: <?php echo $primary_color; ?>;
	}

	/* Dark Scroll */
	.header-fixed .header-v6.header-dark-scroll.header-fixed-shrink .navbar-nav .active > a,
	.header-fixed .header-v6.header-dark-scroll.header-fixed-shrink .navbar-nav li > a:hover {
		color: <?php echo $primary_color; ?>;
	}
}

/* Header v7
------------------------------------*/
.header-v7 .navbar-default .navbar-nav > li > a:hover,
.header-v7 .navbar-default .navbar-nav > li.active > a {
	color: <?php echo $primary_color; ?> !important;
}
.header-v7 .dropdown-menu .active > a,
.header-v7 .dropdown-menu li > a:focus,
.header-v7 .dropdown-menu li > a:hover {
	color: <?php echo $primary_color; ?> !important;
}
.header-v7 .navbar-default .navbar-nav > li > a:hover,
.header-v7 .navbar-default .navbar-nav > li > a:focus,
.header-v7 .navbar-default .navbar-nav > .active > a,
.header-v7 .navbar-default .navbar-nav > .active > a:hover,
.header-v7 .navbar-default .navbar-nav > .active > a:focus {
	color: <?php echo $primary_color; ?>;
}
.header-socials li a:hover {
  color: <?php echo $primary_color; ?>;
}

/* Sliders
------------------------------------*/
/* Main Parallax Sldier */
.da-slide h2 i {
	background-color: rgba(24, 186, 155, 0.8);
}

/* Sequence Parallax Sldier */
.sequence-inner {
  background: -webkit-gradient(linear, 0 0, 0 bottom, from(#fff), to(<?php echo $lighter_color; ?>));
  background: -webkit-linear-gradient(#fff, <?php echo $lighter_color; ?>);
  background: -moz-linear-gradient(#fff, <?php echo $lighter_color; ?>);
  background: -ms-linear-gradient(#fff, <?php echo $lighter_color; ?>);
  background: -o-linear-gradient(#fff, <?php echo $lighter_color; ?>);
  background: linear-gradient(#fff, <?php echo $lighter_color; ?>)
}
#sequence-theme h2 {
	background: rgba(24, 186, 155, 0.8);
}
#sequence-theme .info p {
	background: rgba(24, 186, 155, 0.8);
}

/* Buttons
------------------------------------*/
.btn-u {
	background: <?php echo $primary_color; ?>;
}
.btn-u:hover, 
.btn-u:focus, 
.btn-u:active, 
.btn-u.active, 
.open .dropdown-toggle.btn-u {
	background: <?php echo $darker_color; ?>;
	color: #fff;
}

/* Buttons Color */
.btn-u-split.dropdown-toggle {
   border-left: solid 1px <?php echo $darker_color; ?>;
}

/* Bordered Buttons */
.btn-u.btn-brd {
  border-color: <?php echo $primary_color; ?>;
}
.btn-u.btn-brd:hover {
  color: <?php echo $darker_color; ?>;
  border-color: <?php echo $darker_color; ?>;
}
.btn-u.btn-brd.btn-brd-hover:hover {
  background: <?php echo $darker_color; ?>;   
}

/* Service
------------------------------------*/
.service .service-icon {
	color:<?php echo $primary_color; ?>;	
}

/* Service Blocks */
.service-alternative .service:hover { 
	background:<?php echo $primary_color; ?>;
} 

/* Thumbnail (Recent Work)
------------------------------------*/
.thumbnail-style h3 a:hover {
	color:<?php echo $primary_color; ?>;
}
.thumbnail-style a.btn-more {
	background:<?php echo $primary_color; ?>;
}
.thumbnail-style a.btn-more:hover {
	box-shadow:0 0 0 2px <?php echo $darker_color; ?>;
}

/* Typography
------------------------------------*/
/* Heading */
.headline h2, 
.headline h3, 
.headline h4 {
	border-bottom:2px solid <?php echo $primary_color; ?>;
}

/* Blockquote */
blockquote:hover {
	border-left-color:<?php echo $primary_color; ?>; 
}
.hero {
	border-left-color: <?php echo $primary_color; ?>;
}
blockquote.hero.hero-default {
  background: <?php echo $primary_color; ?>;
}
blockquote.hero.hero-default:hover {
  background: <?php echo $darker_color; ?>;
}

/* Carousel
------------------------------------*/
.carousel-arrow a.carousel-control:hover {
	color: <?php echo $primary_color; ?>;
}

/* Footer
------------------------------------*/
.footer a,
.copyright a,
.footer a:hover,
.copyright a:hover {
	color: <?php echo $primary_color; ?>;
}

/* Footer Blog */
.footer .dl-horizontal a:hover {
	color:<?php echo $primary_color; ?> !important;
}

/* Blog Posts
------------------------------------*/
.posts .dl-horizontal a:hover { 
	color:<?php echo $primary_color; ?>; 
}
.posts .dl-horizontal:hover dt img,
.posts .dl-horizontal:hover dd a { 
	color: <?php echo $primary_color; ?>;
	border-color: <?php echo $primary_color; ?> !important;
}

/* Post Comment */
.post-comment h3, 
.blog-item .media h3,
.blog-item .media h4.media-heading span a {
	color: <?php echo $primary_color; ?>;
}

/* Tabs
------------------------------------*/
/* Tabs v1 */
.tab-v1 .nav-tabs { 
	border-bottom: solid 2px <?php echo $primary_color; ?>; 	
}
.tab-v1 .nav-tabs > .active > a, 
.tab-v1 .nav-tabs > .active > a:hover, 
.tab-v1 .nav-tabs > .active > a:focus { 
	background: <?php echo $primary_color; ?>; 
}
.tab-v1 .nav-tabs > li > a:hover { 
	background: <?php echo $primary_color; ?>; 
}

/* Tabs v2 */
.tab-v2 .nav-tabs li.active a {
	border-top: solid 2px <?php echo $primary_color; ?>;
}

/* Tabs v3 */
.tab-v3 .nav-pills li a:hover,
.tab-v3 .nav-pills li.active a {
	background: <?php echo $primary_color; ?>;
	border: solid 1px <?php echo $darker_color; ?>;
}

/* Accardion
------------------------------------*/
.acc-home a.active,
.acc-home a.accordion-toggle:hover { 
	color:<?php echo $primary_color; ?>; 
}
.acc-home .collapse.in { 
	border-bottom:solid 1px <?php echo $primary_color; ?>; 
}

/* Testimonials
------------------------------------*/
.testimonials .testimonial-info {
	color: <?php echo $primary_color; ?>;
}
.testimonials .carousel-arrow i:hover {
	background: <?php echo $primary_color; ?>;
}

/* Info Blocks
------------------------------------*/
.info-blocks:hover i.icon-info-blocks {
	color: <?php echo $primary_color; ?>;
}

/* Breadcrumb
------------------------------------*/
.breadcrumb li.active,
.breadcrumb li a:hover,
.breadcrumb a:hover,
.breadcrumb .breadcrumb_last {
	color:<?php echo $primary_color; ?>;
}

/* About Page
------------------------------------*/
.team .thumbnail-style:hover h3 a {
	color:<?php echo $primary_color; ?> !important;
}

/* Social Icons */
.team ul.team-socail li i:hover {
	background: <?php echo $primary_color; ?>;
}

/* Right Sidebar
------------------------------------*/
/* Right Sidebar */
.who li i,
.who li:hover i, 
.who li:hover a { 
	color:<?php echo $primary_color; ?>; 
}

/* Privacy Page
------------------------------------*/
.privacy a:hover {
	color:<?php echo $primary_color; ?>; 
}

/* Portfolio Page
------------------------------------*/
/* Portfolio v1 */
.view a.info:hover {
	background: <?php echo $primary_color; ?>;
}

/* Portfolio v2 */
.sorting-block .sorting-nav li.active {
	color: <?php echo $primary_color; ?>;
	border-bottom: solid 1px <?php echo $primary_color; ?>;
}
.sorting-block .sorting-grid li a:hover span.sorting-cover,
.sorting-block .sorting-grid li a:hover .sorting-cover {
	background: <?php echo $primary_color; ?>;
}

/* Blog Page
------------------------------------*/
.blog h3 {
	color:<?php echo $primary_color; ?>;
}
.blog li a:hover {
	color:<?php echo $primary_color; ?>;
}

/* Blog Tags */
ul.blog-tags a:hover {
	background: <?php echo $primary_color; ?>;
}
.blog-post-tags ul.blog-tags a:hover {
  background:  <?php echo $primary_color; ?>;
}

/* Blog Photos */
.blog-photos li img:hover {
	box-shadow: 0 0 0 2px <?php echo $primary_color; ?>;
}

/* Blog Latest Tweets */
.blog-twitter .blog-twitter-inner:hover {
	border-color: <?php echo $primary_color; ?>;
	border-top-color: <?php echo $primary_color; ?>;	
}
.blog-twitter .blog-twitter-inner:hover:after {
	border-top-color: <?php echo $primary_color; ?>;	
}
.blog-twitter .blog-twitter-inner a {
	color: <?php echo $primary_color; ?>;
}

/* Blog Item Page
------------------------------------*/
.blog-item h4.media-heading span a {
	color:<?php echo $primary_color; ?>;
}

/* Coming Soon Page
------------------------------------*/
.coming-soon-border {
	border-top: solid 3px <?php echo $primary_color; ?>;
}

/* Search Page
------------------------------------*/
.booking-blocks p a {
	color: <?php echo $primary_color; ?>;
}

/* FAQ page
------------------------------------*/
.faq-page .new-title {
	color: <?php echo $primary_color; ?>;
}

/* Icons Page
------------------------------------*/
.icon-page li:hover { 
	color: <?php echo $primary_color; ?>;
}

/* Glyphicons */
.glyphicons-demo a:hover {
	color: <?php echo $primary_color; ?>;
	text-decoration: none;
}

/* Social Icons
------------------------------------*/
.social-icons-v1 i:hover {
  color: #fff;
  background: <?php echo $primary_color; ?>;
}

/* Magazine Page
------------------------------------*/
/* Magazine News */
.magazine-news .by-author strong {
	color: <?php echo $primary_color; ?>;
}

.magazine-news a.read-more {
	color: <?php echo $primary_color; ?>;
}

/* Magazine Mini News */
.magazine-mini-news .post-author strong {
	color: <?php echo $primary_color; ?>;
}
.news-read-more i {
	background: <?php echo $primary_color; ?>;
}

/* Sidebar Features */
.magazine-sb-categories ul i,
.magazine-page h3 a:hover {
	color: <?php echo $primary_color; ?>;
}

/* Page Features
------------------------------------*/
/* Tag Boxes v1 */
.tag-box-v1 {
	border-top: solid 2px <?php echo $primary_color; ?>;
}

/* Tag Boxes v2 */
.tag-box-v2 {
	border-left: solid 2px <?php echo $primary_color; ?>;
}

/* Tag Boxes v7 */
.tag-box-v7 {
	border-bottom: solid 2px <?php echo $primary_color; ?>;
}

/* Font Awesome Icon Page Style */
.fa-icons li:hover { 
  color: <?php echo $primary_color; ?>;
}
.fa-icons li:hover i {
  background: <?php echo $primary_color; ?>; 
}

/* GLYPHICONS Icons Page Style */
.bs-glyphicons li:hover {
  color: <?php echo $primary_color; ?>;
}

/* Navigation
------------------------------------*/
/* Pagination */
.pagination > .active > a, 
.pagination > .active > span, 
.pagination > .active > a:hover, 
.pagination > .active > span:hover, 
.pagination > .active > a:focus, 
.pagination > .active > span:focus,
.page-numbers > .active > a, 
.page-numbers > .active > span, 
.page-numbers > .active > a:hover, 
.page-numbers > .active > span:hover, 
.page-numbers > .active > a:focus, 
.page-numbers > .active > span:focus {
  background-color: <?php echo $primary_color; ?>;
  border-color: <?php echo $primary_color; ?>;
}
.pagination li a:hover,
.page-numbers li a:hover {
  background: <?php echo $darker_color; ?>;
  border-color: <?php echo $darker_color; ?>;   
}

/* Pager */
.pager li > a:hover, 
.pager li > a:focus {
  background: <?php echo $darker_color; ?>;
  border-color: <?php echo $darker_color; ?>;   
}
.pager.pager-v2 li > a:hover, 
.pager.pager-v2 li > a:focus,
.pager.pager-v3 li > a:hover, 
.pager.pager-v3 li > a:focus {
  color: #fff;
  background: <?php echo $primary_color; ?>;
}

/* Registration and Login Page v2
------------------------------------*/
.reg-block {
	border-top: solid 2px <?php echo $primary_color; ?>;
}

/*Image Hover
------------------------------------*/
/* Image-hover */
#effect-2 figure .img-hover {
	background: <?php echo $primary_color; ?>;
}

/* Blog Large Page
------------------------------------*/
.blog h2 a:hover {
	color: <?php echo $primary_color; ?>;
}

/* Timeline v1 Page
------------------------------------*/
.timeline-v1 > li > .timeline-badge i:hover {
	color: <?php echo $primary_color; ?>;
}
.timeline-v1 .timeline-footer .likes:hover i {
	color: <?php echo $primary_color; ?>;
}

/* Timeline v2 Page
------------------------------------*/
/* The icons */
.timeline-v2 > li .cbp_tmicon {
	background: <?php echo $primary_color; ?>;
}

/* Progress Bar
------------------------------------*/
.progress-bar-u {
  background: <?php echo $primary_color; ?>;
}

/* Job Inner Page
------------------------------------*/
.job-description .save-job a:hover,
.block-description .save-job a:hover {
	color: <?php echo $primary_color; ?>;
}

.job-description .p-chart .overflow-h li i,
.job-description .p-chart .overflow-h li a,
.block-description .p-chart .overflow-h li i,
.block-description .p-chart .overflow-h li a {
	color: <?php echo $primary_color; ?>;
}

/* Colorful-ul */
.job-description .colorful-ul li a {
	color: <?php echo $primary_color; ?>;
}

/* Search Inner Page
------------------------------------*/
.s-results .related-search a:hover {
	color: <?php echo $primary_color; ?>;
}
.s-results .inner-results h3 a:hover {
	color: <?php echo $primary_color; ?>;
}
.s-results .up-ul li a:hover {
	color: <?php echo $primary_color; ?>;
}
.s-results .down-ul li a {
	color: <?php echo $primary_color; ?>;
}

/* Funny Boxes
------------------------------------*/
.funny-boxes p a {
  color: <?php echo $primary_color; ?>;
}
.funny-boxes .funny-boxes-img li i {
  color: <?php echo $primary_color; ?>;
}
.funny-boxes-colored p, .funny-boxes-colored h2 a, .funny-boxes-colored .funny-boxes-img li, .funny-boxes-colored .funny-boxes-img li i {
  color: #fff;
}

/* Sidebar Sub Navigation
------------------------------------*/
.sidebar-nav-v1 ul li:hover a,
.sidebar-nav-v1 ul li.active a {
  color: <?php echo $primary_color; ?>;
}

/* Blockquote
------------------------------------*/
blockquote.bq-green {
  border-color: <?php echo $primary_color; ?>;
}
blockquote:hover,
blockquote.text-right:hover {
  border-color: <?php echo $primary_color; ?>;
}
.quote-v1 p::before {
  color: <?php echo $primary_color; ?>;
}

/* Green Left Bordered Funny Box */
.funny-boxes-left-green {
  border-left: solid 2px <?php echo $primary_color; ?>;
}
.funny-boxes-left-green:hover {
  border-left-color: <?php echo $primary_color; ?>;
}

/* Testimonials Default
------------------------------------*/
/* Testimonials */
.testimonials .carousel-arrow i:hover {
  background: <?php echo $primary_color; ?>;
}

/* Testimonials Default */
.testimonials-bg-default .item p {
  background: <?php echo $primary_color; ?>;
}
.testimonials.testimonials-bg-default .item p:after,
.testimonials.testimonials-bg-default .item p:after {
  border-top-color: <?php echo $primary_color; ?>;
}
.testimonials-bg-default .carousel-arrow i {
  background: <?php echo $primary_color; ?>;
}
.testimonials.testimonials-bg-default .carousel-arrow i:hover {
  background: <?php echo $darker_color; ?>;
}

/* Promo Page
------------------------------------*/
/* Promo Box */
.promo-box:hover strong, 
.promo-box:hover strong a {
	color: <?php echo $primary_color; ?>;
}

/* Typography
------------------------------------*/
.dropcap {
	color: <?php echo $primary_color; ?>;
}

.dropcap-bg {
	color: #fff;
	background: <?php echo $primary_color; ?>;
}

/* Breadcrumbs
------------------------------------*/ 
span.label-u,
span.badge-u {
  background: <?php echo $primary_color; ?>;
}

/* Icons
------------------------------------*/
/* Icon Link*/
.link-icon:hover i {
  color: <?php echo $primary_color; ?>;
  border: solid 1px <?php echo $primary_color; ?>;
}

.link-bg-icon:hover i {
  color: <?php echo $primary_color; ?>;
  background: <?php echo $primary_color; ?> !important;
  border-color: <?php echo $primary_color; ?>;
}

/* Icons Backgroun Color
------------------------------------*/ 
i.icon-color-u {
  color: <?php echo $primary_color; ?>;
  border: solid 1px <?php echo $primary_color; ?>;
}
i.icon-bg-u {
  background: <?php echo $primary_color; ?>;
}

/* Line Icon Page
------------------------------------*/
.line-icon-page .item:hover {
	color: <?php echo $primary_color; ?>;
}

/* Colored Content Boxes
------------------------------------*/
.service-block-u {
  background: <?php echo $primary_color; ?>;
}

/* Panels (Portlets)
------------------------------------*/
.panel-u {
	border-color: <?php echo $primary_color; ?>;
}
.panel-u > .panel-heading {
   background: <?php echo $primary_color; ?>;
}

/* Owl Carousel
------------------------------------*/
.owl-btn:hover {
  background: <?php echo $primary_color; ?>;
}

/* Counter
------------------------------------*/
.counters span.counter-icon i {
	background: <?php echo $primary_color; ?>;
}
.counters span.counter-icon i:after {
	border-top: 7px solid <?php echo $primary_color; ?>;
}

/* SKy-Forms
------------------------------------*/
/* Buttons */
.sky-form .button {
	background: <?php echo $primary_color; ?>;
}

/* Rating */
.sky-form .rating input:checked ~ label {
	color: <?php echo $primary_color; ?>;
}

/* Message */
.sky-form .message {
	color: <?php echo $primary_color; ?>;
}
.sky-form .message i {
	border-color: <?php echo $primary_color; ?>;
}

/* Profile
------------------------------------*/
.profile .profile-post:hover span.profile-post-numb {
	color: <?php echo $primary_color; ?>;
}
.profile .date-formats {
	background: <?php echo $primary_color; ?>;
}
.profile .name-location span i,
.profile .name-location span a:hover {
	color: <?php echo $primary_color; ?>;
}
.share-list li i {
	color: <?php echo $primary_color; ?>;
}
.profile .comment-list-v2 li:hover i,
.profile .comment-list li:hover i {
	color: <?php echo $primary_color; ?>;
}
.profile .profile-post.color-one {
	border-color: <?php echo $primary_color; ?>;
}
.profile .img-post-list li a:hover i {
	color: <?php echo $primary_color; ?>;
}

/* Pricing Page
------------------------------------*/
/* Pricing Head */
.pricing:hover h4 {
	color:<?php echo $primary_color; ?>;
}
.pricing-head h3 {
	background:<?php echo $primary_color; ?>;
	text-shadow: 0 1px 0 <?php echo $darker_color; ?>;	
}
.pricing-head h4 {
	color:#999;
	background:#fcfcfc;
	border-bottom:solid 1px <?php echo $lighter_color; ?>;
}
	
/* Pricing Content */
.pricing-content li {
	border-bottom:solid 1px <?php echo $lighter_color; ?>;
}
.pricing-content li i,
.pricing-rounded .pricing-content li i,
.pricing-zoom .pricing-content li i {
	color:<?php echo $primary_color; ?>;
}

/* Pricing Extra */
.sticker-left {
	background: <?php echo $primary_color; ?>;
}

/* Pricing Footer */
.pricing-footer a:hover,
.pricing-footer button:hover {
	background:<?php echo $darker_color; ?>;
}

/* Pricing Active */
.price-active h4 {
	color:<?php echo $primary_color; ?>;
}
.no-space-pricing .price-active .pricing-head h4,
.no-space-pricing .pricing:hover .pricing-head h4 {
	color:<?php echo $primary_color; ?>;
}

/* Mega Pricing Tables 
------------------------------------*/
.pricing-mega-v1 .pricing-head h3,
.pricing-mega-v2 .pricing-head h3,
.pricing-mega-v3 .pricing-head h3 {
	text-shadow: 0 1px 0 <?php echo $darker_color; ?>;
}

/* Pricing Table Mega v1 Version
------------------------------------*/
.pricing-mega-v1 .pricing:hover h4 i {
	color:<?php echo $primary_color; ?>;
}
.pricing-mega-v1 .pricing-content li i {
	color: <?php echo $primary_color; ?>; 
}

/* Pricing Table Colored Background Version
------------------------------------*/
.pricing-bg-colored .pricing:hover {	
	background: <?php echo $primary_color; ?>;
}
.pricing-bg-colored .pricing-head i {
	color:<?php echo $primary_color; ?>;
}
.pricing-bg-colored .pricing-footer .btn-u {
	border: 1px solid #fff;
}
.pricing-bg-colored .pricing-head p {
  border-bottom: 1px solid <?php echo $lighter_color; ?>;
}

/* Pricing Table Mega v2 
------------------------------------*/
.pricing-mega-v2 .block:hover .bg-color {
	background: <?php echo $primary_color; ?>;
}
.pricing-mega-v2 .block:hover h3,
.pricing-mega-v2 .block:hover h4, 
.pricing-mega-v2 .block:hover li, 
.pricing-mega-v2 .block:hover li i,
.pricing-mega-v2 .block:hover h4 i {
	background: <?php echo $primary_color; ?>;
}

/* Pricing Table Mega v3 
------------------------------------*/
.pricing-mega-v1 .btn-group .dropdown-menu,
.pricing-mega-v3 .btn-group .dropdown-menu {
	background: <?php echo $primary_color; ?> !important;
}

.pricing-mega-v1 .btn-group .dropdown-menu li a:hover,
.pricing-mega-v3 .btn-group .dropdown-menu li a:hover {
	background: <?php echo $darker_color; ?>;
}

/* Grid Block v2 
------------------------------------*/
.grid-block-v2 li:hover .grid-block-v2-info {
  border-color: <?php echo $primary_color; ?>;
}

/* Testimonials v3 Title 
------------------------------------*/
.testimonials-v3 .testimonials-v3-title p {
  color: <?php echo $primary_color; ?>;
}

.testimonials-v3 .owl-buttons .owl-prev:hover,
.testimonials-v3 .owl-buttons .owl-next:hover {
  background:  <?php echo $primary_color; ?>;
}

/* Content Boxes v4 
------------------------------------*/
.content-boxes-v4 i {
  color: <?php echo $primary_color; ?>;
}

/* Thumbnails v1 
------------------------------------*/
.thumbnails-v1 .read-more {
  color: <?php echo $primary_color; ?>;
}

/* Thumbnails v6 
------------------------------------*/
.testimonials-v6 .testimonials-info:hover {
  border-color: <?php echo $primary_color; ?>;
}

/* Team v1 
------------------------------------*/
.team-v1 li:hover > p:before {
  background:  <?php echo $primary_color; ?>;
}

/* Team v4
------------------------------------*/
.team-v4 .team-social-v4 a:hover {
  color: <?php echo $primary_color; ?>;
}

/* Team v5 & v6 & v7
------------------------------------*/
.team-v5 small,
.team-v6 small,
.team-v7 .team-v7-position {
  color: <?php echo $primary_color; ?>;
}

/* Headliner Center
------------------------------------*/
.headline-center h2:after {
  background:  <?php echo $primary_color; ?>;
}

/* Headliner Left
------------------------------------*/
.headline-left .headline-brd:after {
  background:  <?php echo $primary_color; ?>;
}

/* Portfolio Box
------------------------------------*/
.portfolio-box .portfolio-box-in i {
  background:  <?php echo $primary_color; ?>;
}

/* Flat Background Block v1
------------------------------------*/
.flat-bg-block-v1 .checked-list i {
  color: <?php echo $primary_color; ?>;
}

/* Owl Carousel v5
------------------------------------*/
.owl-carousel-v5 .owl-controls .owl-page.active span,
.owl-carousel-v5 .owl-controls.clickable .owl-page:hover span {
  background:  <?php echo $primary_color; ?>;
}

/* Content Boxes v5
------------------------------------*/
.content-boxes-v5:hover i {
  background:  <?php echo $primary_color; ?>;
}

/* Block Grid v1
------------------------------------*/
.block-grid-v1:hover {
  border-color: <?php echo $primary_color; ?>;
}

/* Block Grid v2
------------------------------------*/
.block-grid-v2 li:hover .block-grid-v2-info {
  border-color: <?php echo $primary_color; ?>;
}

/* Content Boxes v6
------------------------------------*/
.content-boxes-v6:hover i:after {
  border-color: <?php echo $primary_color; ?>;
}
.content-boxes-v6:hover i {
  background:  <?php echo $primary_color; ?>;
}

/* Portfolio Box-v2
------------------------------------*/
.portfolio-box-v2 .portfolio-box-v2-in i {
  background: rgba(24, 186, 155, 0.8);
}
.portfolio-box-v2 .portfolio-box-v2-in i:hover {
  background:  <?php echo $primary_color; ?>;
}

/* Service Block v1
------------------------------------*/
.service-block-v1 i {
  background:  <?php echo $primary_color; ?>;
}

/* Service Block v4
------------------------------------*/
.service-block-v4 .service-desc i {
  color: <?php echo $primary_color; ?>;
}

/* Service Block v7
------------------------------------*/
.service-block-v7 i {
  background: <?php echo $primary_color; ?>;
}

/* Service Block v8
------------------------------------*/
.service-block-v8 .service-block-desc h3::after {
  background: <?php echo $primary_color; ?>;
}

/* Testimonials bs
------------------------------------*/
.testimonials-bs .carousel-control-v2 i:hover {
  border-color: <?php echo $primary_color; ?>;
  color: <?php echo $primary_color; ?>;
}

/* Fusion Portfolio
------------------------------------*/
.fusion-portfolio #filters-container .cbp-filter-item-active {
  background:  <?php echo $primary_color; ?>;
  border-color: <?php echo $primary_color; ?>;
}

 .fusion-portfolio #filters-container .cbp-filter-item:hover {
  color: <?php echo $primary_color; ?>;
}

.blog_masonry_3col h3 a:hover {
  color: <?php echo $primary_color; ?>;
}

/* Cube Portfolio
------------------------------------*/
.cube-portfolio .cbp-l-filters-text .cbp-filter-item.cbp-filter-item-active, .cube-portfolio .cbp-l-filters-text .cbp-filter-item:hover {
  color: <?php echo $primary_color; ?>;
}
.cube-portfolio .link-captions li i:hover {
	color: #fff;
	background: <?php echo $primary_color; ?>;    
}
.cube-portfolio .cbp-caption-activeWrap.default-transparent-hover {
  background: rgba(24, 186, 155, .9) !important;
}

/* Recent Works
------------------------------------*/
.owl-work-v1 .item a:hover span {
  border-bottom-color: <?php echo $primary_color; ?>;
}

/* Footer Default
------------------------------------*/
.footer-default .footer .dl-horizontal a:hover {
  color: <?php echo $primary_color; ?> !important;
}
.footer-default .footer a {
    color: <?php echo $primary_color; ?>;
}
.footer-default .footer a:hover {
  color: <?php echo $darker_color; ?>;
}
.footer-default .copyright a {
  color: <?php echo $primary_color; ?>;
}
.footer-default .copyright a:hover {
  color: <?php echo $darker_color; ?>;
}

/* Footer v4
------------------------------------*/
.footer-v4 .copyright a {
  color: <?php echo $primary_color; ?>;
}

/* Title v1
------------------------------------*/
.title-v1 h1:after, .title-v1 h2:after {
  background-color: <?php echo $primary_color; ?>;
}

/* Copyright Section
------------------------------------*/
.copyright-section i.back-to-top:hover {
  color: <?php echo $primary_color; ?>;
}

/* Top Control
------------------------------------*/
#topcontrol:hover {
  background-color: <?php echo $primary_color; ?>;
}

/* News Info
------------------------------------*/
.news-v1 .news-v1-info li a:hover {
  color: <?php echo $primary_color; ?>;
}
.news-v1 h3 a:hover {
    color: <?php echo $primary_color; ?>;
}
.news-v2 .news-v2-desc h3 a:hover {
    color: <?php echo $primary_color; ?> !important;
}
.news-v3 .post-shares li span {
  background: <?php echo $primary_color; ?>;
}
.news-v3 .posted-info li a:hover {
  color: <?php echo $primary_color; ?> !important;
}
.news-v3 h2 a:hover {
  color: <?php echo $primary_color; ?> !important;
}

/* Blog Trending
------------------------------------*/
.blog-trending small a:hover {
  color: <?php echo $primary_color; ?>;
}

/* Blog Masonry
------------------------------------*/
.blog_masonry_3col ul.grid-boxes-news li a:hover {
	color: <?php echo $primary_color; ?>;
}

/* List v1
------------------------------------*/
.lists-v1 i {
  background: <?php echo $primary_color; ?>;
}

/* List v2
------------------------------------*/
.lists-v2 i {
  color: <?php echo $primary_color; ?>;
}

/* Process v1
------------------------------------*/
.process-v1 .process-in > li i {
  background: <?php echo $primary_color; ?>;
}

/* Featured Blog
------------------------------------*/
.featured-blog h2::after {
  background: <?php echo $primary_color; ?>;
}
.featured-blog .featured-img i:hover {
  color: #fff;
  background: <?php echo $primary_color; ?>;
}

.rgba-default {
  background-color: rgba(24, 186, 155, 1);
}

/* Blog Latest Posts
------------------------------------*/
.blog-latest-posts h3 a:hover {
	color: <?php echo $primary_color; ?> !important;
}

/* Blog Trending
------------------------------------*/
.blog-trending h3 a:hover {
	color: <?php echo $primary_color; ?> !important;
}

/* Pricing
------------------------------------*/
.pricing-table-v6 .service-block-u,
.pricing-table-v7.service-block-u,
.pricing-table-v8.service-block-u,
.pricing-table-v1 .pricing-v1-green .btn-u {
	background-color: <?php echo $primary_color; ?> !important;
}
.pricing-table-v7.service-block-u .pricing-body i,
.pricing-table-v8.service-block-u .pricing-body i {
	color: <?php echo $primary_color; ?>
}
.pricing-bg-colored .pricing-content li i {
	color: <?php echo $primary_color; ?>
}

