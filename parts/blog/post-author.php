					<!-- Blog Post Author -->
					<div class="blog-author margin-bottom-30 clearfix">
						<?php echo get_avatar( get_the_author_meta('ID'), 80 ); ?>
						<div class="blog-author-desc">
							<div class="overflow-h">
								<h4><?php the_author_link(); ?></h4>
							</div>
							<p><?php the_author_meta('user_description'); ?></p>
						</div>
					</div>
					<!-- End Blog Post Author -->