<?php
/*
 * link_target()
 * params = $url (string)
 * return '' || target="_blank"
 */
function link_target($url) {
	$extension = pathinfo($url, PATHINFO_EXTENSION);
	$is_doc = array('doc','docx','pdf','ppt','pptx','xls','xlsx','zip');
	$host = home_url();
	if(in_array($extension, $is_doc) || strpos($url, $host) === false) {
		$target = ' target="_blank"';
	} else {
		$target = '';
	}
	return $target;
}

/*
 * trim_excerpt()
 * return ''
 */
function trim_excerpt($text) {
	return rtrim($text,'[&hellip;]');
}
add_filter('get_the_excerpt', 'trim_excerpt');

/*
 * the_post_thumbnail_url()
 * echo url
 */
function the_post_thumbnail_url() {
	global $post;
	$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	$url = $image[0];
	
	echo $url;
}

/*
 * the_post_type()
 * echo post type
 */
function the_post_type() {
	global $post;
	$post_type = get_post_type();
	
	echo ucfirst($post_type);
}

/*
 * time_ago()
 * return time
 */
function time_ago($time) {
	$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	$lengths = array("60","60","24","7","4.35","12","10");

	$now = time();
	$difference = $now - $time;
	$tense = "ago";

	for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		$difference /= $lengths[$j];
	}

	$difference = round($difference);

	if($difference != 1) {
		$periods[$j].= "s";
	}

	return "$difference $periods[$j] $tense";
}

/*
 * get_col_x()
 * params = $arr (array), $size (string)
 * return col-size-#
 */
function get_col_x($arr, $size) {
	$sz = $size == '' ? 'sm' : $size;
	$col = '';
	$count = count($arr);
	switch($count) {
		case 1:
			$col = 'col-'.$sz.'-12';
			break;
		case 2:
			$col = 'col-'.$sz.'-6';
			break;
		case 3:
			$col = 'col-'.$sz.'-4';
			break;
		case 4:
			$col = 'col-'.$sz.'-3';
			break;
		case 5:
			$col = 'col-'.$sz.'-3';
			break;
		case 6:
			$col = 'col-'.$sz.'-4';
			break;
		case 7:
		case 8:
			$col = 'col-'.$sz.'-2';
			break;
		case 9:
			$col = 'col-'.$sz.'-4';
			break;
		case 10:
		case 11:
		case 12:
			$col = 'col-'.$sz.'-2';
			break;
		default:
			$col = 'col-'.$sz.'-2';
			break;
	}
	return $col;
}

/*
 * ocp_url_type()
 * params = $url (string)
 * return 'youtube' || 'vimeo' || 'file'
 */
function ocp_url_type($url) {
    if (strpos($url, 'youtube') > 0 || strpos($url, 'youtu') > 0) {
        return 'youtube';
    } elseif (strpos($url, 'vimeo') > 0) {
        return 'vimeo';
    } else {
		return 'file';
    }
}

/*
 * ocp_video_id()
 * params = $url (string)
 * return id
 */
function ocp_video_id($url) {
	$type = ocp_url_type($url);
	if($type == 'file') {
		return false;
	} elseif($type == 'youtube') {
		
		if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $values)) {
			$id = $values[1];
		} elseif(preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $values)) {
			$id = $values[1];
		} elseif(preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $values)) {
			$id = $values[1];
		} elseif(preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $values)) {
			$id = $values[1];
		} else if(preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $url, $values)) {
			$id = $values[1];
		}
		return $id;
		
	} else {
		if (preg_match("/https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $url, $values)) {
			$id = $values[3];
		}
		return $id;
	}
}

/*
 * PORTFOLIO HELPERS
 */

/*
 * portfolio_query()
 * return query args
 */
function portfolio_query() {
	$args = array('post_type' => 'portfolio');
	if(is_page_template('page-templates/portfolio.php')) {
		$args['posts_per_page'] = -1;
	}
	if(is_single() && get_post_type() == 'portfolio') {
		$template = get_field('portfolio_item_template', 'option');
		$count = $template == 'default' ? 4 : 8;
		$args['posts_per_page'] = $count;
	}
	
	return $args;
}

/*
 * portfolio_filter_list()
 * echo $list
 */
function portfolio_filter_list() {
	$terms = get_terms('portfolio_cat');
	$list = array('<div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All </div>');
	if($terms) {
		foreach($terms as $term) {
			$list[] = '<div data-filter=".'.$term->slug.'" class="cbp-filter-item"> '.$term->name.' </div>';
		}
	}
	echo join(' |', $list);
}

/*
 * portfolio_filter_class()
 * params = $taxonomy (string)
 * return $class
 */
function portfolio_filter_class($post_id = null, $output = 'slug', $sep = ' ') {
	if($post_id == null) {
		global $post;
		$post_id = $post->ID;
	}
	$terms = get_the_terms($post_id, 'portfolio_cat');
	$class = array();
	if($terms) {
		foreach($terms as $term) {
			$class[] = $term->$output;
		}
	}
	echo join($sep, $class);
}


/*
 * ACF FIELD HELPERS
 * dependency = advanced-custom-fields-pro
 */
 
/*
 * ocp_title()
 * echo $title
 */
function ocp_title($title = null) {
	if($title == null) {
		$title = get_the_title();
		if(is_home()) {
			$blog_page = get_option('page_for_posts');
			$title = get_the_title($blog_page);
		}
		if(is_archive()) {
			$title = single_month_title('', false);
		}
		if(is_category()) {
			$title = single_cat_title('', false);
		}
		if(is_tag()) {
			$title = single_tag_title('', false);
		}
		if(is_taxonomy()) {
			$title = single_term_title('', false);
		}
	} 
	echo $title;
}

/*
 * ocp_filter_list()
 * params = $taxonomy (string)
 * echo $list
 */
function ocp_filter_list($taxonomy) {
	$terms = get_terms($taxonomy);
	$list = '<li class="filter" data-filter="all">All</li>';
	if($terms) {
		foreach($terms as $term) {
			$list .= '<li class="filter" data-filter="category_'.$term->term_id.'">'.$term->name.'</li>';
		}
	}
	echo $list;
}

/*
 * ocp_filter_class()
 * params = $taxonomy (string)
 * return $class
 */
function ocp_filter_class($post_id, $taxonomy) {
	$terms = get_the_terms($post_id, $taxonomy);
	$class = array();
	if($terms) {
		foreach($terms as $term) {
			$class[] = 'category_'.$term->term_id;
		}
	}
	echo join(' ', $class);
}
 
/*
 * the_conditional_field()
 * params = $name (string), $before (string), $after (string), $sub (bool)
 * echo $before . $value . $after
 */
function the_conditional_field($name, $before, $after, $sub = false) {
	$value = $sub !== false ? get_sub_field($name) : get_field($name);
	if($value)
		echo $before . $value . $after;
}

/*
 * the_image()
 * params = $name (string), $format (string), $sub (bool)
 * echo $value[$format]
 */
function the_image($name = '', $format = 'url', $sub = false) {
	$value = $sub !== false ? get_sub_field($name) : get_field($name);
	if($value) {
		echo $value[$format];
	}
}

/*
 * the_video()
 * params = $name (string), $format (string), $sub (bool)
 * echo embed || image || url || id
 */
function the_video($name = '', $format = 'id', $sub = false) {
	$url = $sub !== false ? get_sub_field($name) : get_field($name);
	$type = ocp_url_type($url);
	$id = ocp_video_id($url);
	if($format == 'embed') {
		$embed = $type == 'vimeo' ? 'http://player.vimeo.com/video/'.$id : 'http://www.youtube.com/embed/'.$id.'?rel=0&amp;showinfo=0';
		echo $embed;
	} elseif($format == 'image') {
		switch($type) {
			case 'youtube':
				$image = 'http://img.youtube.com/vi/'.$id.'/mqdefault.jpg';
				break;
			case 'vimeo':
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));  
				$image = $hash[0]['thumbnail_large'];
				break;
		}
		echo $image;
	} elseif($format == 'url') {
		echo $url;
	} else {
		echo $id;
	}
}

/*
 * the_background()
 * params = $name (string), $option (bool)
 * echo color || image
 */
function the_background($name, $option = false) {
	$repeater = $option == false ? get_field($name) : get_field($name, 'option');
	$row = $repeater[0];
	if($row['color'] !== '') {
		$value = $row['color'];
		$style = 'background:none;background-color:'.$value.';';
	}
	if($row['image'] !== '') {
		$value = $row['image'];
		$style = 'background-image:url('.$value.');';
	}
	echo $style;
}

