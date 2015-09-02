<?php

if(!is_page_template()) :
	get_header();

	if(have_posts()) the_post();

		get_template_part('parts/page/page', 'widgets');
		
	get_footer();

else :

	locate_template(get_page_template_slug( get_option('page_on_front') ), true);
	
endif;
?>