    <!--=== Footer v2 ===-->
    <div id="footer-v2" class="footer-v2">
        <div class="footer">
            <div class="container">
                <div class="row">
					<?php get_template_part('parts/footer/footer', 'widgets'); ?>
                </div>
            </div> 
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <p class="text-center"><?php the_date('Y'); ?> &copy; <?php echo bloginfo('name'); ?>. All Rights Reserved.</p>
            </div> 
        </div><!--/copyright--> 
    </div>
    <!--=== End Footer v2 ===-->