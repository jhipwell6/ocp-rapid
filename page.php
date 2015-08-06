<?php
get_header();
if(have_posts())
?>
<div class="section">
	<div class="container">
        <?php while(have_posts()) : the_post(); ?>
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>