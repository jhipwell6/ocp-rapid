<?php
get_header();
if(have_posts()) the_post();

	get_template_part('parts/loop', 'title');
	
	get_template_part('parts/page/page', 'widgets');
	
?>

	<div class="container content">
	
		<?php the_content(); ?>
		
	</div>
	
<?php get_footer();	?>