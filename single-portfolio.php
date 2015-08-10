<?php
get_header();
if(have_posts()) the_post();

		get_template_part('parts/loop', 'title');

		$template = get_field('portfolio_item_template', 'option');
		get_template_part('parts/portfolio/portfolio', $template);

get_footer();
?>