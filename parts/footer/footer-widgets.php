<?php
// check if the flexible content field has rows of data
if( have_rows('footer_widgets', 'option') ):

 	// loop through the rows of data
    while ( have_rows('footer_widgets', 'option') ) : the_row(); ?>
	
		<div class="<?php echo get_col_x( get_field('footer_widgets', 'option'), 'md' ); ?> md-margin-bottom-40">

			<?php // check current row layout
			get_template_part( 'parts/footer/widgets/widget', get_row_layout() ); ?>
		
		</div>

    <?php endwhile;

else :

    // no layouts found

endif;