<?php get_header(); ?>
    
	<?php get_template_part('parts/loop', 'title'); ?>
	
	<?php 
		$template = get_field('style', get_option('page_for_posts'));
		get_template_part('parts/blog/blog', $template);
	?>
	
<?php get_footer(); ?>