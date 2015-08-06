    <!--=== Header v3 ===-->    
    <div class="header-v3">
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img id="logo-header" src="<?php the_field('site_logo', 'option'); ?>" alt="Logo">
                    </a>
                </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
                    <div class="container">
						<?php 
							$search = '<li>
										<i class="search fa fa-search search-btn"></i>
										<form action="'.home_url().'" method="get" class="search-open">
											<div class="input-group animated fadeInDown">
												<input type="text" class="form-control" name="s" placeholder="Search">
												<span class="input-group-btn">
													<button class="btn-u" type="submit">Go</button>
												</span>
											</div>
										</form>    
									</li>';
							wp_nav_menu(array( 
								'menu' => 'Primary',
								'container' => false,
								'items_wrap' => '<ul id="%1$s" class="nav navbar-nav">%3$s'.$search.'</ul>',
								'walker' => new wp_bootstrap_navwalker()));
						?>
                    </div><!--/end container-->
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header v3 ===-->