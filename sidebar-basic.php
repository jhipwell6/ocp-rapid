			<?php
				$layout = get_field('layout', get_option('page_for_posts'));
				$sidebar = get_field('sidebar', get_option('page_for_posts'));
				switch($sidebar) {
					case 'left':
						$side_align = ' col-md-pull-9';
						break;
					case 'right':
						$side_align = '';
						break;
				}
			?>
			<!-- Right Sidebar -->
        	<div class="col-md-3<?php echo $side_align; if($layout == 'large') { echo ' magazine-page'; } ?>">
			
				<?php dynamic_sidebar('sidebar-1'); ?>

            </div>
            <!-- End Right Sidebar -->