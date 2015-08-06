    <!--=== Footer v4 ===-->
    <div id="footer-v4" class="footer-v4">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <?php get_template_part('parts/footer/footer', 'widgets'); ?>
                </div>
            </div><!--/end continer-->
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
                        <ul class="list-inline sponsors-icons pull-right">
                            <li><i class="fa fa-cc-paypal"></i></li>
                            <li><i class="fa fa-cc-visa"></i></li>
                            <li><i class="fa fa-cc-mastercard"></i></li>
                            <li><i class="fa fa-cc-discover"></i></li>
                        </ul>
                    </div>
                </div>
            </div> 
        </div><!--/copyright--> 
    </div>
    <!--=== End Footer v4 ===-->