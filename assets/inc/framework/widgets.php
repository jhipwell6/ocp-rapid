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
			$output = '<ul class="social-icons social-icons-color">';
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