<?php

/*
*  ACF Hidden Field Class
*
*  All the logic for this field type
*
*  @class 		acf_hidden_icon
*  @extends		acf_field
*  @package		ACF
*  @subpackage	Fields
*/

if( ! class_exists('acf_hidden_icon') ) :

class acf_hidden_icon extends acf_field {
	
	
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function __construct() {
		
		// vars
		$this->name = 'icon';
		$this->label = __("Icon",'acf');
		$this->defaults = array(
			'default_value'	=> '',
			'maxlength'		=> '',
			'placeholder'	=> '',
			'prepend'		=> '',
			'append'		=> '',
			'icon_set'		=> '',
			'readonly'		=> 0,
			'disabled'		=> 0,
		);
		
		
		// do not delete!
    	parent::__construct();
	}
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function render_field( $field ) {
		
		// vars
		$o = array( 'type', 'id', 'class', 'name', 'value', 'placeholder', 'icon_set' );
		$s = array( 'readonly', 'disabled' );
		$e = '';
		
		
		// maxlength
		if( $field['maxlength'] !== "" ) {
		
			$o[] = 'maxlength';
			
		}
		
		
		// prepend
		if( $field['prepend'] !== "" ) {
		
			$field['class'] .= ' acf-is-prepended';
			$e .= '<div class="acf-input-prepend">' . $field['prepend'] . '</div>';
			
		}
		
		
		// append
		if( $field['append'] !== "" ) {
		
			$field['class'] .= ' acf-is-appended';
			$e .= '<div class="acf-input-append">' . $field['append'] . '</div>';
			
		}
		
		$field['class'] .= ' ocp-icon-set';
		
		// populate atts
		$atts = array();
		foreach( $o as $k ) {
		
			$atts[ $k ] = $field[ $k ];	
			
		}
		
		
		// special atts
		foreach( $s as $k ) {
		
			if( $field[ $k ] ) {
			
				$atts[ $k ] = $k;
				
			}
			
		}
		
		$atts['type'] = 'hidden';		
		
		// render
		$e .= '<div class="acf-input-wrap">';
		$e .= '<i class="fa fa-fw '.$atts['value'].'"></i>';
		$e .= '<a href="#TB_inline?height=550&inlineId=icon-select" class="thickbox button button-small choose-icon" onclick="jQuery(this).addClass(\'insert-icon\');getIconSet(jQuery(this));" data-set="'.$atts['icon_set'].'">Choose Icon</a>';
		$e .= '<input ' . acf_esc_attr( $atts ) . ' />';
		$e .= '</div>';
		
		
		// return
		echo $e;
	}
	
	
	/*
	*  render_field_settings()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like bellow) to save extra data to the $field
	*
	*  @param	$field	- an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function render_field_settings( $field ) {
		
		// default_value
		acf_render_field_setting( $field, array(
			'label'			=> __('Default Value','acf'),
			'instructions'	=> __('Appears when creating a new post','acf'),
			'type'			=> 'text',
			'name'			=> 'default_value',
		));
		
		// icon set
		acf_render_field_setting( $field, array(
			'label'			=> __('Icon Set','acf'),
			'instructions'	=> __('Filters icon chooses by set','acf'),
			'type'			=> 'select',
			'choices'		=> array('All', 'Web Application', 'Transportation', 'Gender', 'File Type', 'Spinner', 'Form Control', 'Payment', 'Chart', 'Currency', 'Text Editor', 'Directional', 'Video Player', 'Brand', 'Medical'),
			'name'			=> 'icon_set'
		));
		
	}
	
}

new acf_hidden_icon();


function ocp_acf_admin_enqueue_scripts() {
	add_thickbox();
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/plugins/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'ocp-admin-css', get_template_directory_uri() . '/assets/admin/ocp-admin.css' );
	wp_enqueue_script( 'icon-js', get_template_directory_uri() . '/assets/admin/icon.js' );
}
add_action('acf/input/admin_enqueue_scripts', 'ocp_acf_admin_enqueue_scripts');


endif;

?>
