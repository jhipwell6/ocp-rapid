    <!--=== Header v4 ===-->    
    <div class="header-v4">
        <!-- Topbar -->
        <div class="topbar-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline top-v1-contacts">
                            <li>
                                <i class="fa fa-envelope"></i> <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> <?php the_field('phone', 'option'); ?>
                            </li>
                        </ul>
                    </div>

                    <?php 
						if(have_rows('top_links', 'option')) :
							$i = 0;
							$total = count(get_field('top_links', 'option'));
					?>
                    <div class="col-md-6">
                        <ul class="list-inline top-v1-data">
							<?php
								while(have_rows('top_links', 'option')) : the_row();
									$icon = get_sub_field('icon') ? '<i class="fa '.get_sub_field('icon').'"></i> ' : '';
									$label = get_sub_field('label') ? get_sub_field('label') : '';
							?>
							<li><a href="<?php the_sub_field('link'); ?>"><?php echo $icon; ?><?php echo $label; ?></a></li>
							<?php $i++; endwhile; ?>
                        </ul>
                    </div>
					<?php endif; ?>
                </div>        
            </div>
        </div>
        <!-- End Topbar -->
    
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                                <img id="logo-header" src="<?php the_field('site_logo', 'option'); ?>" alt="Logo">
                            </a>
                        </div>
                        <div class="col-md-10">
                            <?php the_field('ad_code', 'option'); ?>
                        </div>
                    </div>    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="full-width-menu">Menu Bar</span>
                        <span class="icon-toggle">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>    
                    </button>
                </div>
            </div>    

            <div class="clearfix"></div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <div class="container">
					<?php
						wp_nav_menu(array( 
							'menu' => 'Primary',
							'container' => false,
							'items_wrap' => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
							'walker' => new wp_bootstrap_navwalker()));
					?>
                    <!-- Search Block -->
                    <ul class="nav navbar-nav navbar-border-bottom navbar-right">
                        <li class="no-border">
                            <i class="search fa fa-search search-btn"></i>
                            <form class="search-open">
                                <div class="input-group animated fadeInDown">
                                    <input type="text" class="form-control" name="s" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn-u" type="submit">Go</button>
                                    </span>
                                </div>
                            </form>    
                        </li>
                    </ul>
                    <!-- End Search Block -->
                </div><!--/end container-->
            </div><!--/navbar-collapse-->
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header v4 ===-->    