<?php
	global $wp_query;
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$layout = get_field('layout', get_option('page_for_posts'));
	$sidebar = get_field('sidebar', get_option('page_for_posts'));
	
	// news outer class
	// news inner class
	switch($sidebar) {
		case 'none':
			$news_outer = '';
			$news_inner = 'news-v3';
			break;
		default:
			$news_outer = ' news-v3';
			$news_inner = 'news-v3-in-sm no-padding';
			break;
	}
	
	switch($sidebar) {
		case 'left':
			$main_align = ' col-md-push-3';
			$side_align = ' col-md-pull-9';
			break;
		case 'right':
			$main_align = '';
			$side_align = '';
			break;
	}
	
	if($layout == 'default') :
?>
	<!--=== Blog Posts ===-->
    <div class="container content-md">
		<?php if(have_posts()) : ?>
		<div class="row">
			<?php if($sidebar !== 'none') : ?>
			<div class="col-md-9<?php echo $main_align; ?>">
			<?php ; else : ?>
			<div class="col-md-12">
			<?php endif; ?>
				<?php while(have_posts()) : the_post(); ?>
				<!-- News v3 -->
				<div class="row margin-bottom-20">
					<?php if(has_post_thumbnail()) : ?>
					<div class="col-sm-5 sm-margin-bottom-20">
						<?php the_post_thumbnail('feed-thumbs', array('class' => 'img-responsive full-width')); ?>
					</div>
					<div class="col-sm-7<?php echo $news_outer; ?>">
					<?php ; else : ?>
					<div class="col-sm-12<?php echo $news_outer; ?>">
					<?php endif; ?>
						<div class="<?php echo $news_inner; ?>">
							<ul class="list-inline posted-info">
								<li>By <?php the_author_link(); ?></li>
								<li>In <?php echo ocp_post_tax($post->ID, 'category'); ?></li>
								<li>Posted <?php the_time('F j, Y'); ?></li>
							</ul>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
							<ul class="post-shares">
								<li>
									<a href="<?php comments_link(); ?>">
										<i class="rounded-x icon-speech"></i>
										<?php $comments_number = get_comments_number(); ?>
										<?php if($comments_number > 0) { echo '<span>' . $comments_number . '</span>'; } ?>
									</a>
								</li>
								<li class="social-share"><a href="#"><i class="rounded-x icon-share"></i></a></li>
								<li class="social-icon hidden bg-facebook"><a href="#" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="rounded-x fa fa-facebook"></i></a></li>
								<li class="social-icon hidden bg-twitter"><a href="#" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="rounded-x fa fa-twitter"></i></a></li>
								<li class="social-icon hidden bg-pinterest"><a href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="rounded-x fa fa-pinterest"></i></a></li>
								<li class="social-icon hidden bg-google-plus"><a href="#" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="rounded-x fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div><!--/end row-->
				<!-- End News v3 -->

				<div class="clearfix margin-bottom-20"><hr></div>
				<?php endwhile; ?>

				<!-- Pager v3 -->
				<ul class="pager pager-v3 pager-md no-margin-bottom">
					<li class="previous"><?php previous_posts_link( '&larr; Newer' ); ?></li>
					<li class="page-amount"><?php echo $paged . ' of ' . $wp_query->max_num_pages; ?></li>
					<li class="next"><?php next_posts_link( 'Older &rarr;', 0 ); ?></li>
				</ul>
				<!-- End Pager v3 -->
				<?php wp_reset_query(); ?>
			</div>
			
			<?php
				if($sidebar !== 'none') {
					get_sidebar();
				}
			?>
			
		</div>
		<?php ; else : ?>
		<p>Sorry, no posts found.</p>
		<?php endif; ?>
    </div><!--/end container-->
    <!--=== End Blog Posts ===-->
	<?php ; else : ?>
	<!--=== Blog Posts ===-->
    <div class="bg-color-light">
        <div class="container content-sm">
			<?php if(have_posts()) : ?>
            <div class="row">            
				<?php if($sidebar !== 'none') : ?>
				<div class="col-md-9<?php echo $main_align; ?>">
				<?php ; else : ?>
				<div class="col-md-12">
				<?php endif; ?>
					<?php while(have_posts()) : the_post(); ?>
                    <!-- Blog Posts -->
                    <div class="news-v3 margin-bottom-60">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>
                        <div class="news-v3-in">
                            <ul class="list-inline posted-info">
								<li>By <?php the_author_link(); ?></li>
								<li>In <?php echo ocp_post_tax($post->ID, 'category'); ?></li>
								<li>Posted <?php the_time('F j, Y'); ?></li>
							</ul>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
                            <ul class="post-shares">
								<li>
									<a href="<?php comments_link(); ?>">
										<i class="rounded-x icon-speech"></i>
										<?php $comments_number = get_comments_number(); ?>
										<?php if($comments_number > 0) { echo '<span>' . $comments_number . '</span>'; } ?>
									</a>
								</li>
								<li class="social-share"><a href="#"><i class="rounded-x icon-share"></i></a></li>
								<li class="social-icon hidden bg-facebook"><a href="#" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="rounded-x fa fa-facebook"></i></a></li>
								<li class="social-icon hidden bg-twitter"><a href="#" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="rounded-x fa fa-twitter"></i></a></li>
								<li class="social-icon hidden bg-pinterest"><a href="javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="rounded-x fa fa-pinterest"></i></a></li>
								<li class="social-icon hidden bg-google-plus"><a href="#" data-url="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>"><i class="rounded-x fa fa-google-plus"></i></a></li>
							</ul>
                        </div>                
                    </div>
                    <!-- End Blog Posts -->
					<?php endwhile; ?>

					 <!-- Pager v2 -->     
					<ul class="pager pager-v2 pager-md no-margin">
						<li class="previous"><?php previous_posts_link( '&larr; Newer' ); ?></li>
						<li class="page-amount"><?php echo $paged . ' of ' . $wp_query->max_num_pages; ?></li>
						<li class="next"><?php next_posts_link( 'Older &rarr;', 0 ); ?></li>
					</ul>
                    <!-- End Pager v2 -->                    
                </div>
                <!-- End Blog All Posts -->

				<?php
					if($sidebar !== 'none') {
						get_sidebar();
					}
				?>
               
            </div>
			<?php ; else : ?>
			<p>Sorry, no posts found.</p>
			<?php endif; ?>
        </div>
    </div>
    <!--=== End Blog Posts ===-->
	<?php endif; ?>