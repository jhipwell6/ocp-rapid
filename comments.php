					<?php global $post; if ( have_comments() ) : ?>
					<div id="comments">
						<hr>

						<h2 class="margin-bottom-20">Comments</h2>
						
						<ol id="commentlist" class="list-unstyled">
							<?php wp_list_comments( 'type=comment&callback=ocp_rapid_comment' ); ?>
						</ol>
						
					</div>
					<?php endif; ?>
					<?php if ( comments_open() ) : ?>
					<div id="respond">
						<hr>

						<h2 class="margin-bottom-20"><?php comment_form_title(); ?></h2>
						<!-- Form -->
						<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="sky-form comment-style">
							<?php
								if ( is_user_logged_in() ) :
									global $current_user;
									get_currentuserinfo();
							?>
							<p>Logged in as <?php echo $current_user->display_name; ?>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
							<fieldset>
							<?php ; else : ?>
							<fieldset>
								<div class="row sky-space-30">
									<div class="col-md-6">
										<div>
											<input type="text" name="author" id="author" placeholder="Name" class="form-control">
										</div>
									</div>                
									<div class="col-md-6">
										<div>
											<input type="email" name="email" id="email" placeholder="Email" class="form-control">
										</div>
									</div>                
								</div>
							<?php endif; ?>
								
								<div class="sky-space-30">
									<div>
										<textarea rows="8" name="comment" id="comment" placeholder="Write comment here ..." class="form-control"></textarea>
									</div>
								</div>
								
								<?php comment_id_fields(); ?> 
								<p><button type="submit" class="btn-u">Submit</button></p>
								
								<?php do_action('comment_form', $post->ID); ?>
							</fieldset>
						</form>
						<!-- End Form -->
					</div>
					<?php endif; ?>