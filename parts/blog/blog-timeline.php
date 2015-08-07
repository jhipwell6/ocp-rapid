    <!--=== Content Part ===-->
    <div class="container content">
		<?php if(have_posts()) : ?>
        <ul class="timeline-v1">
			<?php
				$i = 0;
				while(have_posts()) : the_post();
					$inverted = $i%2 == 1 ? ' class="timeline-inverted"' : '';
			?>
            <li<?php echo $inverted; ?>>
                <div class="timeline-badge primary"><i class="fa fa-dot-circle-o"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
						<?php the_post_thumbnail(array(524, 331, 'bfi_thumb' => true), array('class' => 'img-responsive')); ?>
                    </div>
                    <div class="timeline-body text-justify">
                        <h2 class="font-light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                        <a class="btn-u btn-u-sm" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                    <div class="timeline-footer">
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></li>
                            <li><i class="fa fa-comments-o"></i> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
                        </ul>
                    </div>
                </div>
            </li>
			<?php $i++; endwhile; ?>
            <li class="clearfix" style="float: none;"></li>
        </ul>
		<?php ; else : ?>
		<p>Sorry, no posts found.</p>
		<?php endif; ?>
    </div><!--/container-->		
    <!-- End Content Part -->