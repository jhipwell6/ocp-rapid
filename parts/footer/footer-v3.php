    <!--=== Footer v3 ===-->
    <div id="footer-v3" class="footer-v3">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <?php get_template_part('parts/footer/footer', 'widgets'); ?>                       
                </div>
            </div> 
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <!-- Terms Info-->
                    <div class="col-md-6">
                        <p>
                            <?php the_date('Y'); ?> &copy; <?php echo bloginfo('name'); ?>. All Rights Reserved. 
                            <?php ocp_footer_menu('Footer', '', '', ' | '); ?>
                        </p>
                    </div>
                    <!-- End Terms Info-->

					<?php if(have_rows('social_links', 'option')) : ?>
                    <!-- Social Links -->
                    <div class="col-md-6">  
                        <ul class="social-icons pull-right">
							<?php
								while(have_rows('social_links', 'option')) : the_row();
									$title = ucwords(str_replace('-', ' ', substr(get_sub_field('medium'), 3)));
							?>
                            <li><a href="<?php the_sub_field('url'); ?>" target="_blank" data-original-title="<?php echo $title; ?>" class="rounded-x"><i class="fa <?php the_sub_field('medium'); ?>"></i></a></li>
							<?php endwhile; ?>
                        </ul>
                    </div>
                    <!-- End Social Links -->
					<?php endif; ?>
                </div>
            </div> 
        </div><!--/copyright--> 
    </div>
    <!--=== End Footer v3 ===-->