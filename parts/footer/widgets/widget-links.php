				<?php
					$footer_version = get_field('footer', 'option');
					$list_class = $footer_version == 'v6' ? 'list-unstyled footer-link-list' : 'list-unstyled link-list';
					$icons = $footer_version == 'v6' ? '' : '<i class="fa fa-angle-right"></i>';
				?>
				<?php ocp_footer_heading(get_sub_field('title')); ?>
				<?php if(have_rows('links')) : ?>
				<ul class="<?php echo $list_class; ?>">
					<?php while(have_rows('links')) : the_row(); ?>
					<li><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a><?php echo $icons; ?></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>