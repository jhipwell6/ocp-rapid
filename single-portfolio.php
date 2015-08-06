<?php get_header(); ?>

	<?php
		$template = get_field('portfolio_item_template', 'option');
		get_template_part('parts/portfolio/portfolio', $template);
	?>

<?php get_footer(); ?>