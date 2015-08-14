<?php
// Adds Blog Social Widget
class OCP_Blog_Social_Widget extends WP_Widget {

	//Register widget with WordPress
	function __construct() {
		parent::__construct(
			'ocp_blog_social_widget',
			__('OCP Blog - Social', 'ocp_rapid'),
			array( 'description' => __( 'Social media icons', 'ocp_rapid' ) )
		);
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( !empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
	
		if(have_rows('social_links', 'widget_' . $args['widget_id'])) {
			$output = '<ul class="social-icons social-icons-color margin-bottom-30">';
			while(have_rows('social_links', 'widget_' . $args['widget_id'])) { the_row();
				$icon = get_sub_field('icon');
				$link = get_sub_field('link');
				$class = 'social_' . $icon;
				$output .= '<li><a class="'.$class.'" data-original-title="Feed" href="'.$link.'" target="_blank"><i class="fa '.$icon.'"></i></a></li>';
			}
			$output .= '</ul>';
			
			echo $output;
		}
	
		echo $args['after_widget'];
	}

	// Back-end widget form
	public function form( $instance ) {
		if ( isset($instance['title']) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Social Media', 'ocp_rapid' );
		}		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	// Sanitize widget form values as they are saved
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}
function ocp_add_blog_social_widget() {
	register_widget( 'OCP_Blog_Social_Widget' );
}
add_action( 'widgets_init', 'ocp_add_blog_social_widget' );


// Adds Blog Posts Widget
class OCP_Blog_Posts_Widget extends WP_Widget {

	//Register widget with WordPress
	function __construct() {
		parent::__construct(
			'ocp_blog_posts_widget',
			__('OCP Blog - Posts', 'ocp_rapid'),
			array( 'description' => __( 'Recent posts', 'ocp_rapid' ) )
		);
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( !empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		
		$style = get_field('style', get_option('page_for_posts'));
		$limit = get_field('limit', 'widget_' . $args['widget_id']);
		$cats = get_field('categories', 'widget_' . $args['widget_id']);
		$loop_args = array('post_type'=>'post','posts_per_page'=>$limit);
		if($cats) {
			$loop_args['cat'] = $cats;
		}
		
		$posts = get_posts($loop_args);
		
		if($posts) {
			if($style == 'basic') {
				$output = '<div class="posts margin-bottom-40">';
				foreach($posts as $post) { setup_postdata($post);
					$output .= '<dl class="dl-horizontal">
									<dt><a href="'.get_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID, 'feed-thumbs').'</a></dt>
									<dd>
										<p><a href="'.get_permalink().'">'.get_the_title($post->ID).'</a></p> 
									</dd>
								</dl>';
				} 
				$output .= '</div>';
				wp_reset_postdata();
			} else {
				$output = '<ul class="list-unstyled blog-trending margin-bottom-50">';
				foreach($posts as $post) { setup_postdata($post);
					$output .= '<li>
									<h3><a href="'.get_permalink($post->ID).'">'.get_the_title($post->ID).'</a></h3>
									<small>'.get_the_time('j M, Y', $post->ID).' / '.ocp_post_tax($post->ID, 'category').'</small>
								</li>';
				}
				$output .= '</ul>';
				wp_reset_postdata();
			}
			
			echo $output;
		}
	
		echo $args['after_widget'];
	}

	// Back-end widget form
	public function form( $instance ) {
		if ( isset($instance['title']) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Recent Posts', 'ocp_rapid' );
		}		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	// Sanitize widget form values as they are saved
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}
function ocp_add_blog_posts_widget() {
	register_widget( 'OCP_Blog_Posts_Widget' );
}
add_action( 'widgets_init', 'ocp_add_blog_posts_widget' );


// Adds Blog Tabs Widget
class OCP_Blog_Tabs_Widget extends WP_Widget {

	//Register widget with WordPress
	function __construct() {
		parent::__construct(
			'ocp_blog_tabs_widget',
			__('OCP Blog - Tabs', 'ocp_rapid'),
			array( 'description' => __( 'Tabbable content', 'ocp_rapid' ) )
		);
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( !empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		
		if(have_rows('tabs', 'widget_' . $args['widget_id'])) {
			$i = 0;
			$output = 	'<div class="tab-v2 margin-bottom-40">';
			$output .= 		'<ul class="nav nav-tabs">';
			while(have_rows('tabs', 'widget_' . $args['widget_id'])) { the_row();
				$active = $i == 0 ? ' class="active"' : '';
				$output .= 		'<li'.$active.'><a data-toggle="tab" href="#'.sanitize_title(get_sub_field('title')).'">'.get_sub_field('title').'</a></li>';     
			$i++; }
			$i = 0;
			$output .= 		'</ul>';
			$output .= 		'<div class="tab-content">';
			while(have_rows('tabs', 'widget_' . $args['widget_id'])) { the_row();
				$active = $i == 0 ? ' active' : '';
				$output .= 		'<div id="'.sanitize_title(get_sub_field('title')).'" class="tab-pane'.$active.'">';
				$output .= 			get_sub_field('content');
				$output .= 		'</div>';
			$i++; }
			$output .= 		'</div>';
			$output .= 	'</div>';
			
			echo $output;
		}
	
		echo $args['after_widget'];
	}

	// Back-end widget form
	public function form( $instance ) {
		if ( isset($instance['title']) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Tabs', 'ocp_rapid' );
		}		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	// Sanitize widget form values as they are saved
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}
function ocp_add_blog_tabs_widget() {
	register_widget( 'OCP_Blog_Tabs_Widget' );
}
add_action( 'widgets_init', 'ocp_add_blog_tabs_widget' );


// Adds Blog Gallery Widget
class OCP_Blog_Gallery_Widget extends WP_Widget {

	//Register widget with WordPress
	function __construct() {
		parent::__construct(
			'ocp_blog_gallery_widget',
			__('OCP Blog - Gallery', 'ocp_rapid'),
			array( 'description' => __( 'Image gallery', 'ocp_rapid' ) )
		);
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( !empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		
		$style = get_field('style', get_option('page_for_posts'));
		$images = get_field('images', 'widget_' . $args['widget_id']);
		if($images) {
			if($style == 'basic') {
				$output = '<ul class="list-unstyled blog-photos margin-bottom-30">';
				foreach($images as $image) {
					$output .= '<li><a href="'.$image['url'].'" rel="gallery" class="fancybox"><img class="hover-effect" alt="'.$image['alt'].'" src="'.$image['url'].'"></a></li>';
				}
				$output .= '</ul>';
			} else {
				$output = '<ul class="list-inline blog-photostream margin-bottom-50">';
				foreach($images as $image) {
					$output .= '<li><a href="'.$image['url'].'" rel="gallery" class="fancybox img-hover-v2"><span><img class="img-responsive" alt="'.$image['alt'].'" src="'.$image['url'].'"></span></a></li>';
				}
				$output .= '</ul>';
			}
			
			echo $output;
		}
	
		echo $args['after_widget'];
	}

	// Back-end widget form
	public function form( $instance ) {
		if ( isset($instance['title']) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Gallery', 'ocp_rapid' );
		}		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	// Sanitize widget form values as they are saved
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}
function ocp_add_blog_gallery_widget() {
	register_widget( 'OCP_Blog_Gallery_Widget' );
}
add_action( 'widgets_init', 'ocp_add_blog_gallery_widget' );


// Adds Blog Tags Widget
class OCP_Blog_Tags_Widget extends WP_Widget {

	//Register widget with WordPress
	function __construct() {
		parent::__construct(
			'ocp_blog_tags_widget',
			__('OCP Blog - Tags', 'ocp_rapid'),
			array( 'description' => __( 'Tags list', 'ocp_rapid' ) )
		);
	}

	// Front-end display of widget
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( !empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
	
		$tags = get_tags();
		if($tags) {
			$output = '<ul class="list-inline tags-v2 margin-bottom-50">';
			foreach($tags as $tag) {
				$output .= '<li><a href="'.get_tag_link( $tag->term_id ).'">'.$tag->name.'</a></li>';
			}
			$output .= '</ul>';
			
			echo $output;
		}
	
		echo $args['after_widget'];
	}

	// Back-end widget form
	public function form( $instance ) {
		if ( isset($instance['title']) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Tags', 'ocp_rapid' );
		}		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	// Sanitize widget form values as they are saved
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

}
function ocp_add_blog_tags_widget() {
	register_widget( 'OCP_Blog_Tags_Widget' );
}
add_action( 'widgets_init', 'ocp_add_blog_tags_widget' );