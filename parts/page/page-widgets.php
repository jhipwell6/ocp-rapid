<?php
// check if the flexible content field has rows of data
if( have_rows('page_widgets') ):

 	// loop through the rows of data
    while ( have_rows('page_widgets') ) : the_row(); ?>

		<?php // check current row layout
		get_template_part( 'parts/page/widgets/widget', get_row_layout() ); ?>

    <?php endwhile;

else :

    // no layouts found

endif;