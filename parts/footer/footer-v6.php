    <!--=== Footer v6 ===-->
    <div id="footer-v6" class="footer-v6">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <?php get_template_part('parts/footer/footer', 'widgets'); ?>
                </div>
            </div><!--/container -->
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 sm-margon-bottom-10">
                        <ul class="list-inline terms-menu">
                            <li class="silver"><?php the_date('Y'); ?> &copy; <?php echo bloginfo('name'); ?>. All Rights Reserved. </li>
                            <?php ocp_footer_menu('Footer', '<li>', '</li>', ''); ?>
                        </ul>
                    </div>
					<?php if(have_rows('social_links', 'option')) : ?>
                    <div class="col-md-4">
                        <ul class="list-inline dark-social pull-right space-bottom-0">
                            <?php
								while(have_rows('social_links', 'option')) : the_row();
									$title = ucwords(str_replace('-', ' ', substr(get_sub_field('medium'), 3)));
							?>
                            <li>
                                <a href="<?php the_sub_field('url'); ?>" target="_blank" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $title; ?>">
                                    <i class="fa <?php the_sub_field('medium'); ?>"></i>
                                </a>
                            </li>
							<?php endwhile; ?>
                        </ul>       
                    </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!--=== End Footer v6 ===-->