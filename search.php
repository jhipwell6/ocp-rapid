<?php
get_header();

$template = get_field('search_template', 'option');
?>

	<!--=== Breadcrumbs ===-->
    <div class="breadcrumbs breadcrumbs-dark">
        <div class="container">
            <h1 class="pull-left">Search Results</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Page</a></li>
                <li class="active">Search results</li>
            </ul>
        </div>
    </div>
    <!--=== End Breadcrumbs ===-->
    
    <!--=== Search Block Version 2 ===-->
    <form class="search-block-v2">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h2>Search again</h2>
                <div class="input-group">
                    <input type="text" class="form-control" name="s" placeholder="Search words with regular expressions ...">
                    <span class="input-group-btn">
                        <button class="btn-u" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </div><!--/container-->
    </form>  
    <!--=== End Search Block Version 2 ===-->

    <!--=== Search Results ===-->
    <div class="container s-results margin-bottom-50">
        <div class="row">
			<?php if($template == 'sidebar') : ?>
            <div class="col-md-2 hidden-xs related-search">
                <div class="row">
                    <div class="col-md-12 col-sm-4">
                        <h3>Related searches</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Web design company</a></li>     
                            <li><a href="#">Web design tutorials</a></li>   
                            <li><a href="#">Self designing</a></li>   
                        </ul>
                        <hr>
                    </div>    

                    <div class="col-md-12 col-sm-4">    
                        <h3>Tutorials</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Basic Concepts</a></li>     
                            <li><a href="#">‎Building your first web page</a></li>   
                            <li><a href="#">‎Advanced HTML</a></li>   
                        </ul>
                        <hr>
                    </div>    

                    <div class="col-md-12 col-sm-4">
                        <h3>Trending topics</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Bootstrap</a></li>     
                            <li><a href="#">Wrapbootstrap</a></li>     
                            <li><a href="#">Codrops</a></li>     
                        </ul>
                        <hr>
                    </div>    

                    <div class="col-md-12 col-sm-4">                        
                        <h3>Search history</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Web design articles</a></li>   
                            <li><a href="#">Tutorials for web design</a></li>     
                        </ul>
                        <a class="see-all" href="#">See all</a>
                        <hr>
                    </div>    
                        
                    <div class="col-md-12 col-sm-4">
                        <h3>Related pictures</h3>
                        <ul class="list-unstyled blog-photos margin-bottom-30">
                            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sliders/elastislide/5.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sliders/elastislide/6.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sliders/elastislide/8.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sliders/elastislide/10.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sliders/elastislide/11.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sliders/elastislide/1.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sliders/elastislide/2.jpg" alt="" class="hover-effect"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/sliders/elastislide/7.jpg" alt="" class="hover-effect"></a></li>
                        </ul>
                    </div>
                </div>        
            </div><!--/col-md-2-->

            <div class="col-md-10">
			<?php ; else : ?>
			<div class="col-md-12">
			<?php endif; ?>
			<?php global $wp_query; if(have_posts()) : ?>
                <span class="results-number"><?php echo $wp_query->found_posts; ?> results</span>
                <!-- Begin Inner Results -->
				<?php while(have_posts()) : the_post(); ?>
                <!-- Begin Inner Results -->
                <div class="inner-results">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php the_post_type(); ?></h3>
                    <ul class="list-inline up-ul">
                        <li><?php the_permalink(); ?></li>
                    </ul>
                    <div class="overflow-h">
						<?php if(has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive', 'width' => 85)); ?>
						<?php endif; ?>
                        <div class="overflow-a">
							<?php the_excerpt(); /* replace with search_excerpt(); */ ?>
                            <ul class="list-inline down-ul">
                                <li><?php echo time_ago(get_the_time('U')); ?> - By <?php the_author(); ?></li>
                            </ul>
                        </div>       
                    </div>    
                </div>
                <!-- Begin Inner Results -->

                <hr>
				<?php endwhile; ?>

                <div class="margin-bottom-30"></div>

                <div class="text-left">
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
				<?php ; else : ?>
				<p>Sorry, no results found.</p>
				<?php endif; ?>
            </div><!--/col-md-->
        </div>        
    </div><!--/container-->     
    <!--=== End Search Results ===-->

<?php get_footer(); ?>