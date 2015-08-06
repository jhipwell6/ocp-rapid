				<?php
					$thumbs = get_sub_field('show_thumbnails');
					$tax_query = get_sub_field('category') ? array(array('taxonomy'=>'category','field'=>'id','terms'=> get_sub_field('category'))) : '';
					$posts = get_posts(array(
						'post_type'=>'post',
						'posts_per_page'=>'3',
						'orderby'=>'date',
						'order'=>'desc',
						'tax_query'=>$tax_query
						));
					if($posts) :
						$i = 0;
						$total = count($posts);
				?>
				<div class="posts">
					<?php ocp_footer_heading(get_sub_field('title')); ?>
					<?php foreach($posts as $post) : setup_postdata($post); ?>
					<?php if($thumbs == true) { ?>
					<dl class="dl-horizontal">
						<?php if(has_post_thumbnail()) { ?><dt><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></dt><?php } ?>
						<dd>
							<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p> 
						</dd>
					</dl>
					<?php } else { ?>
					<?php if($i == 0) { ?><ul class="list-unstyled latest-list"><?php } ?>
						<li>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<small><?php the_time('F j, Y'); ?></small>
						</li>
					<?php if($i == $total - 1) { ?></ul><?php } ?>
					<?php } ?>
					<?php $i++; endforeach; wp_reset_postdata(); ?>
				</div>
				<?php endif; ?>
	