    <!--=== Header v2 ===-->
    <div class="header-v2 header-sticky">
        <div class="container container-space">
            <!-- Topbar v2 -->
            <div class="topbar-v2">
                <div class="row">
                    <div class="col-sm-8">
                        <ul class="list-inline top-v2-contacts">
                            <li>Email: <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></li>
                            <li>Call Us: <?php the_field('phone', 'option'); ?></li>    
                        </ul>
                    </div>
					<?php 
						if(have_rows('top_links', 'option')) :
							$i = 0;
							$total = count(get_field('top_links', 'option'));
					?>
                    <div class="col-sm-4">
                        <div class="topbar-buttons pull-right">
							<?php
								while(have_rows('top_links', 'option')) : the_row();
									$icon = get_sub_field('icon') ? '<i class="fa '.get_sub_field('icon').'"></i> ' : '';
									$label = get_sub_field('label') ? get_sub_field('label') : '';
									$margin = $i < $total ? 'margin-right-5' : '';
							?>
                            <a href="<?php the_sub_field('link'); ?>" class="btn-u btn-brd btn-brd-hover btn-u-light <?php echo $margin; ?>"><?php echo $icon; ?><?php echo $label; ?></a>
							<?php $i++; endwhile; ?>
                        </div>
                    </div>
					<?php endif; ?>
                </div>        
            </div>
            <!-- End Topbar v2 -->
        </div>
    
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container container-space">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand brand-style" href="<?php echo home_url(); ?>">
                        <img id="logo-header" src="<?php the_field('site_logo', 'option'); ?>" width="85" height="32" alt="Logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
					<?php
						wp_nav_menu(array( 
							'menu' => 'Primary',
							'container' => false,
							'items_wrap' => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
							'walker' => new wp_bootstrap_navwalker()));
					?>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header v2 ===-->