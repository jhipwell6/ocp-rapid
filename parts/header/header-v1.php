    <!--=== Header v1 ===-->    
    <div class="header-v1">
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
				</div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header v1 ===-->