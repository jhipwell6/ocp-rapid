    <!--=== Footer v5 ===-->
    <div id="footer-v5" class="footer-v5">        
        <div class="footer">
            <div class="container">
                <div class="row">
                    <?php get_template_part('parts/footer/footer', 'widgets'); ?>
                </div>
            </div><!--/container -->
        </div>

        <div class="copyright">
            <div class="container">
                <ul class="list-inline terms-menu">
                    <li class="silver"><?php the_date('Y'); ?> &copy; <?php echo bloginfo('name'); ?>. All Rights Reserved. </li>
					<?php ocp_footer_menu('Footer', '<li>', '</li>', ''); ?>
                </ul>
            </div>
        </div>
    </div>
    <!--=== End Footer v5 ===-->