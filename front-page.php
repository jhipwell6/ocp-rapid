<?php
get_header();
if(have_posts()) the_post();

	get_template_part('parts/page/page', 'widgets');
	
get_footer();	
?>