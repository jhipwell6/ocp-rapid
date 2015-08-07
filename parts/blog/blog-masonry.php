	<!--=== Content Part ===-->
    <div class="blog_masonry_3col">
		<?php if(have_posts()) : ?>
        <div class="container content grid-boxes">
			<?php while(have_posts()) : the_post(); ?>
            <div class="grid-boxes-in">
				<?php the_post_thumbnail(array(360, '', 'bfi_thumb' => true), array('class' => 'img-responsive')); ?>
                <div class="grid-boxes-caption">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <ul class="list-inline grid-boxes-news">
                        <li><span>By</span> <?php the_author_posts_link(); ?></li>
                        <li>|</li>
                        <li><i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></li>
                        <li>|</li>
                        <li><a href="<?php comments_link(); ?>"><i class="fa fa-comments-o"></i> <?php comments_number( '0', '1', '%' ); ?></a></li>
                    </ul>                    
                    <?php the_excerpt(); ?>
                </div>
            </div>
			<?php endwhile; ?>
        </div><!--/container-->
		<?php ; else : ?>
		<p>Sorry, no posts found.</p>
		<?php endif; ?>
    </div>
    <!--=== End Content Part ===-->