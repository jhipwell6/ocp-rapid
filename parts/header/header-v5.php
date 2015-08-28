    <!--=== Header v5 ===-->   
    <div class="header-v5">
        <!-- Topbar v3 -->
        <div class="topbar-v3">
            <form class="search-open">
                <div class="container">
                    <input type="text" class="form-control" name="s" placeholder="Search">
                    <div class="search-close"><i class="icon-close"></i></div>
                </div>
            </form>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 pull-right">
                        <ul class="list-inline right-topbar pull-right">
							<?php 
								if(have_rows('top_links', 'option')) :
									$i = 0;
									$total = count(get_field('top_links', 'option'));
									while(have_rows('top_links', 'option')) : the_row();
										$icon = get_sub_field('icon') ? '<i class="fa '.get_sub_field('icon').'"></i> ' : '';
										$label = get_sub_field('label') ? get_sub_field('label') : '';
							?>
                            <li><a href="<?php the_sub_field('link'); ?>"><?php echo $icon; ?><?php echo $label; ?></a></li>
							<?php $i++; endwhile; endif; ?>
							<li><i class="search fa fa-search search-button"></i></li>
                        </ul>
                    </div>
                </div>
            </div><!--/container-->
        </div>
        <!-- End Topbar v3 -->

        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img id="logo-header" src="<?php the_field('site_logo', 'option'); ?>" alt="Logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
                    <!-- Badge -->
                    <ul class="list-inline shop-badge badge-lists badge-icons pull-right">
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart"></i></a>
                            <span class="badge badge-sea rounded-x">3</span>
                            <ul class="list-unstyled badge-open" data-mcs-theme="minimal-dark">
                                <li class="subtotal">
                                    <div class="overflow-h margin-bottom-10">
                                        <p>NO PRODUCTS IN THE CART</p>
                                        <hr class="hr-xs">
                                    </div>
                                    <div class="row">    
                                        <div class="col-xs-6">
                                            <a href="shop-ui-inner.html" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">View Cart</a>
                                        </div>
                                        <div class="col-xs-6 text-right padding-top-5">
                                            <strong>TOTAL: $0.00</strong>
                                        </div>
                                    </div>        
                                </li>    
                            </ul>
                        </li>
                    </ul>
                    <!-- End Badge -->
					<?php endif; ?>

					<?php
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
    <!--=== End Header v5 ===-->