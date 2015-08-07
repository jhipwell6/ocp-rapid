<?php get_header(); ?>
    <!--=== Blog Posts ===-->
    <div class="container content-md">
        <div class="row">
            <!-- Blog All Posts -->
            <div class="col-md-9">
                <!-- News v3 -->
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <div class="row margin-bottom-20">
					<?php if(has_post_thumbnail()) : ?>
                    <div class="col-sm-5 sm-margin-bottom-20">
						<?php the_post_thumbnail('feed-thumbs', array('class' => 'img-responsive')); ?>
                    </div>
                    <div class="col-sm-7 news-v3">
					<?php ; else : ?>
					<div class="col-sm-12 news-v3">
					<?php endif; ?>
                        <div class="news-v3-in-sm no-padding">
                            <ul class="list-inline posted-info">
                                <li>By <?php the_author(); ?></li>
                                <li>In <?php echo _post_taxonomies($post->ID, 'category'); ?></li>
                                <li>Posted <?php the_time('F d, Y'); ?></li>
                            </ul>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php echo '<p>'.wp_trim_words($post->post_content, 40, '&hellip;').'</p>'; ?>
                        </div>
                    </div>
                </div><!--/end row-->
                <!-- End News v3 -->

                <div class="clearfix margin-bottom-20"><hr></div>
				<?php endwhile; endif; ?>

                <!-- Pager v3 -->
                <ul class="pager pager-v3 pager-sm no-margin-bottom">
                    <li class="previous"><?php previous_posts_link('&larr; Newer'); ?></li>
                    <!--<li class="page-amount">1 of 7</li>-->
                    <li class="next"><a href="#"><?php next_posts_link( 'Older Entries &rarr;', 0 ); ?></a></li>
                </ul>
                <!-- End Pager v3 -->
            </div>
            <!-- End Blog All Posts -->

            <!-- Blog Sidebar -->
			<?php get_sidebar(); ?>
			<!-- End Blog Sidebar -->            
        </div>
    </div>            
    <!--=== End Blog Posts ===-->
<?php get_footer(); ?>