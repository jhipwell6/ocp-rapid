<?php
get_header();
if(have_posts()) the_post();

$sidebar = get_field('sidebar', get_option('page_for_posts'));
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
?>

	<?php get_template_part('parts/loop', 'title'); ?>
	
	<!--=== Blog Posts ===-->
    <div class="bg-color-light">
        <div class="container content-sm">
            <div class="row">
                <!-- Blog All Posts -->
				<?php if($sidebar !== 'none') : ?>
				<div class="col-md-9<?php echo $main_align; ?>">
				<?php ; else : ?>
				<div class="col-md-12">
				<?php endif; ?>
                    <!-- News v3 -->
                    <div class="news-v3 margin-bottom-30">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>
                        <div class="news-v3-in">
                            <ul class="list-inline posted-info">
								<li>By <?php the_author_link(); ?></li>
								<li>In <?php echo ocp_post_tax($post->ID, 'category'); ?></li>
								<li>Posted <?php the_time('F j, Y'); ?></li>
							</ul>
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                            <ul class="post-shares post-shares-lg">
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
                    <!-- End News v3 -->

                    <?php get_template_part('parts/blog/post', 'author'); ?>

                    <?php get_template_part('parts/blog/post', 'related'); ?>

                    <?php comments_template(); ?>
					
                </div>
                <!-- End Blog All Posts -->

                <?php
					if($sidebar !== 'none') {
						get_sidebar();
					}
				?> 
				
            </div>
        </div><!--/end container-->
    </div>
    <!--=== End Blog Posts ===-->
<?php get_footer(); ?>