<?php get_header(); ?>
<!--=== Content Part ===-->
    <div class="container content">		
        <!--Error Block-->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="error-v1">
                    <span class="error-v1-title">404</span>
                    <span>That’s an error!</span>
                    <p>The requested URL was not found on this server. That\’s all we know.</p>
                    <a class="btn-u btn-bordered" href="<?php echo home_url(); ?>">Back Home</a>
                </div>
            </div>
        </div>
        <!--End Error Block-->
    </div>	
    <!--=== End Content Part ===-->
<?php get_footer(); ?>