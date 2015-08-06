    <!--=== Header ===-->    
    <div class="header">
        <div class="container">
            <!-- Logo -->
            <a class="logo" href="<?php echo home_url(); ?>">
                <img src="<?php the_field('site_logo', 'option'); ?>" alt="Logo" />
            </a>
            <!-- End Logo -->
            
			<?php 
				if(have_rows('top_links', 'option')) :
					$i = 0;
					$total = count(get_field('top_links', 'option'));
			?>
            <!-- Topbar -->
            <div class="topbar">
                <ul class="loginbar pull-right">
					<?php
						while(have_rows('top_links', 'option')) : the_row();
							$icon = get_sub_field('icon') ? '<i class="fa '.get_sub_field('icon').'"></i> ' : '';
							$label = get_sub_field('label') ? get_sub_field('label') : '';
					?>
                    <li><a href="<?php the_sub_field('link'); ?>"><?php echo $icon; ?><?php echo $label; ?></a></li>
                    <?php if($i < $total - 1) { ?><li class="topbar-devider"></li><?php } ?>
					<?php $i++; endwhile; ?>
                </ul>
            </div>
            <!-- End Topbar -->
			<?php endif; ?>

            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->

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
    <!--=== End Header ===-->