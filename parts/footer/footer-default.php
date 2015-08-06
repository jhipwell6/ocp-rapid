    <!--=== Footer ===-->
    <div id="footer-default" class="footer-default">
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
                    <div class="col-md-6">                     
                        <p>
                            <?php the_date('Y'); ?> &copy; <?php echo bloginfo('name'); ?>. All Rights Reserved. 
							<?php ocp_footer_menu('Footer', '', '', ' | '); ?>
                        </p>
                    </div>
                    <div class="col-md-6">  
                        <a href="<?php echo home_url(); ?>">
                            <img class="pull-right" id="logo-footer" src="<?php the_field('footer_logo', 'option'); ?>" alt="<?php echo bloginfo('name'); ?>">
                        </a>
                    </div>
                </div>
            </div> 
        </div><!--/copyright--> 
    </div>
    <!--=== End Footer ===-->