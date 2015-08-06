    <!--=== Header v6 ===-->
    <div class="header-v6 <?php ocp_header_class(); ?> header-sticky">
        <!-- Navbar -->
        <div class="navbar mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="menu-container">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Navbar Brand -->
                    <div class="navbar-brand">
                        <a href="<?php echo home_url(); ?>">
                            <img class="default-logo" src="<?php the_field('site_logo', 'option'); ?>" alt="Logo">
                            <img class="shrink-logo" src="<?php the_field('site_logo', 'option'); ?>" alt="Logo">
                        </a>
                    </div>
                    <!-- End Navbar Brand -->

                    <!-- Header Inner Right -->
                    <div class="header-inner-right">
                        <ul class="menu-icons-list">
                            <li class="menu-icons shopping-cart">
                                <i class="menu-icons-style radius-x fa fa-shopping-cart"></i>
                                <span class="badge">0</span>
                                <div class="shopping-cart-open">
                                    <span class="shc-title">No products in the Cart</span>
                                    <button type="button" class="btn-u"><i class="fa fa-shopping-cart"></i> Cart</button>
                                    <span class="shc-total">Total: <strong>$0.00</strong></span>
                                </div>
                            </li>
                            <li class="menu-icons">
                                <i class="menu-icons-style search search-close search-btn fa fa-search"></i>
                                <form class="search-open">
                                    <input type="text" class="animated fadeIn form-control" name="s" placeholder="Start searching ...">
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- End Header Inner Right -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <div class="menu-container">
						<?php
							wp_nav_menu(array( 
								'menu' => 'Primary',
								'container' => false,
								'items_wrap' => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
								'walker' => new wp_bootstrap_navwalker()));
						?>
					</div>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header v6 ===-->
	<?php if(get_field('header_banner', 'option')) : ?>
	<!-- Interactive Slider -->
    <div class="interactive-slider-v2" style="background-image:url(<?php the_field('header_banner', 'option'); ?>);">
        <div class="container">
			<?php 
				$title = get_field('header_banner_title', 'option');
				if($title && is_home()) :
					$heading = explode('<br />', $title);
			?>
            <?php if($heading[0]) { ?><h1><?php echo $heading[0]; ?></h1><?php } ?>
            <?php if($heading[1]) { ?><p><?php echo $heading[1]; ?></h1></p><?php } ?>
			<?php endif; ?>
        </div>
    </div>
    <!-- End Interactive Slider -->
	<?php endif; ?>