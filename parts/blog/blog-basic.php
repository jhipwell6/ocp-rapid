<?php
	global $wp_query;
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$layout = get_field('layout', get_option('page_for_posts'));
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
	
	if($layout == 'default') :
?>
	<!--=== Content Part ===-->
    <div class="container content">
		<?php if(have_posts()) : ?>
    	<div class="row blog-page">    
            <?php if($sidebar !== 'none') : ?>
			<div class="col-md-9<?php echo $main_align; ?>">
			<?php ; else : ?>
			<div class="col-md-12">
			<?php endif; ?>
				<?php while(have_posts()) : the_post(); ?>
                <!--Blog Post-->
                <div class="row blog blog-medium margin-bottom-40">
					<?php if(has_post_thumbnail()) : ?>
                    <div class="col-md-5">
						<?php the_post_thumbnail('feed-thumbs', array('class' => 'img-responsive full-width')); ?>
                    </div>    
                    <div class="col-md-7">
					<?php ; else : ?>
					<div class="col-sm-12">
					<?php endif; ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?></li>
                            <li><i class="fa fa-comments"></i> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
                            <li><i class="fa fa-tags"></i> <?php echo ocp_post_tax($post->ID, 'category'); ?></li>
                        </ul>
						<?php the_excerpt(); ?>
                        <p><a class="btn-u btn-u-sm" href="<?php the_permalink(); ?>">Read More <i class="fa fa-angle-double-right margin-left-5"></i></a></p>
                    </div>    
                </div>
                <!--End Blog Post-->        

                <hr class="margin-bottom-40">
				<?php endwhile; ?>
                
                <!--Pagination-->
                <div class="text-center">
                    <?php 
						$big = 999999999;
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
							'next_text' => '&raquo;',
							'prev_text' => '&laquo;',
							'type' => 'list',
						) );
					?>
                </div>
                <!--End Pagination-->
				<?php wp_reset_query(); ?>
				
            </div>
            <!-- End Left Sidebar -->
			
			<?php
				if($sidebar !== 'none') {
					get_sidebar('basic');
				}
			?>
            
        </div><!--/row-->
		<?php ; else : ?>
		<p>Sorry, no posts found.</p>
		<?php endif; ?>
    </div><!--/container-->		
    <!--=== End Content Part ===-->
	<?php ; else : ?>
	<!--=== Content Part ===-->
    <div class="container content">
		<?php if(have_posts()) : ?>
    	<div class="row blog-page">    
            <!-- Left Sidebar -->
        	<?php if($sidebar !== 'none') : ?>
			<div class="col-md-9<?php echo $main_align; ?>">
			<?php ; else : ?>
			<div class="col-md-12">
			<?php endif; ?>
				<?php while(have_posts()) : the_post(); ?>
                <!--Blog Post-->        
            	<div class="blog margin-bottom-40">
					<?php if($sidebar == 'none' && has_post_thumbnail()) : ?>
					<div class="blog-img">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>
                    </div>
					<?php endif; ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="blog-post-tags">
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?></li>
                            <li><i class="fa fa-pencil"></i> <?php the_author_link(); ?></li>
                            <li><i class="fa fa-comments"></i> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></li>
                        </ul>
                        <ul class="list-unstyled list-inline blog-tags">
                            <li>
                                <i class="fa fa-tags"></i> 
                                <?php echo ocp_post_tax($post->ID, 'category'); ?>
                            </li>
                        </ul>                                                
                    </div>
                    <?php if($sidebar !== 'none' && has_post_thumbnail()) : ?>
					<div class="blog-img">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive full-width')); ?>
                    </div>
					<?php endif; ?>
                    <?php the_excerpt(); ?>
                    <p><a class="btn-u btn-u-small" href="<?php the_permalink(); ?>"><i class="fa fa-plus-sign"></i> Read More</a></p>
                </div>
                <!--End Blog Post-->
				<?php endwhile; ?>       
                
                <!--Pagination-->
                <div class="text-center">
                    <ul class="pagination">
                        <?php 
						$big = 999999999;
						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
							'next_text' => '&raquo;',
							'prev_text' => '&laquo;',
							'type' => 'list',
						) );
					?>
                    </ul>                                                            
                </div>
                <!--End Pagination-->
				<?php wp_reset_query(); ?>
            </div>
            <!-- End Left Sidebar -->

            <?php
				if($sidebar !== 'none') {
					get_sidebar('basic');
				}
			?>
			
        </div><!--/row-->
		<?php ; else : ?>
		<p>Sorry, no posts found.</p>
		<?php endif; ?>
    </div><!--/container-->		
    <!--=== End Content Part ===-->
	<?php endif; ?>