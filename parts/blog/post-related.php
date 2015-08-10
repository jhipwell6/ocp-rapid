					<?php 
						$args = array('post_type' => 'post', 'posts_per_page' => 2, 'post__not_in' => array($post->ID));
						$related = new WP_Query($args);
						if($related->have_posts()) :
							$i = 0;
					?>
					<!-- News v2 -->
					<div class="row news-v2 margin-bottom-50">
						<?php
							while($related->have_posts()) : $related->the_post();
								$margin = $i == 0 ? ' sm-margin-bottom-30' : '';
						?>
						<div class="col-sm-6<?php echo $margin; ?>">
							<div class="news-v2-badge">
								<?php the_post_thumbnail('feed-thumbs', array('class' => 'img-responsive full-width')); ?>
								<p>
									<span><?php the_time('j'); ?></span>
									<small><?php the_time('M'); ?></small>
								</p>
							</div>
							<div class="news-v2-desc">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<small>By <?php the_author_link(); ?> | In <?php echo ocp_post_tax($post->ID, 'category'); ?></small>
								<?php the_excerpt(); ?>
							</div>
						</div>
						<?php $i++; endwhile; wp_reset_query(); ?>
					</div>
					<!-- End News v2 -->
					<?php endif; ?>