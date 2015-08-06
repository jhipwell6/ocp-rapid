				<?php
					$footer_version = get_field('footer', 'option');
					$address = get_sub_field('address');
					$phone = get_sub_field('phone');
					$fax = get_sub_field('fax');
					$email = get_sub_field('email');
					$website = get_sub_field('website');
				?>
				<?php ocp_footer_heading(get_sub_field('title')); ?>
				<?php if($footer_version == 'default' || $footer_version == 'v1' || $footer_version == 'v3') : ?>
				<address class="md-margin-bottom-40">
					<?php 
						if($address) echo $address . ' <br />';
						if($phone) echo 'Phone: ' . $phone . ' <br />';
						if($fax) echo 'Fax: ' . $fax . ' <br />';
						if($email) echo 'Email: <a href="mailto:' . $email . '">' . $email . '</a> <br />';
						if($website) echo 'Website: <a href="' . $website . '">' . $website . '</a> <br />';
					?>
				</address>
				<?php endif; ?>
				
				<?php if($footer_version == 'default' && have_rows('social_links', 'option')) : ?>
				<div class="headline"><h2>Stay Connected</h2></div> 
				<ul class="social-icons">
					<?php while(have_rows('social_links', 'option')) : the_row(); ?>
					<li><a href="<?php the_sub_field('link'); ?>" target="_blank"><i class="fa <?php the_sub_field('medium'); ?>"></i></a></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
				
				<?php if($footer_version == 'v2' || $footer_version == 'v5') : ?>
				<address class="md-margin-bottom-40">
					<?php 
						if($address) echo '<i class="fa fa-home"></i>' . $address . ' <br />';
						if($phone) echo '<i class="fa fa-phone"></i>Phone: ' . $phone . ' <br />';
						if($fax) echo '<i class="fa fa-fax"></i>Fax: ' . $fax . ' <br />';
						if($email) echo '<i class="fa fa-envelope"></i>Email: <a href="mailto:' . $email . '">' . $email . '</a> <br />';
						if($website) echo '<i class="fa fa-globe"></i><a href="' . $website . '">' . $website . '</a> <br />';
					?> 
				</address>
				<?php if(have_rows('social_links', 'option')) : ?>
				<ul class="social-icons">
					<?php while(have_rows('social_links', 'option')) : the_row(); ?>
					<li><a href="<?php the_sub_field('link'); ?>" target="_blank" class="rounded-x"><i class="fa <?php the_sub_field('medium'); ?>"></i></a></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
				<?php endif; ?>
				
				<?php if($footer_version == 'v4') : ?>
				<ul class="list-unstyled address-list margin-bottom-20">
					<?php 
						if($address) echo '<i class="fa fa-angle-right"></i>' . $address . ' <br />';
						if($phone) echo '<i class="fa fa-angle-right"></i>Phone: ' . $phone . ' <br />';
						if($fax) echo '<i class="fa fa-angle-right"></i>Fax: ' . $fax . ' <br />';
						if($email) echo '<i class="fa fa-angle-right"></i>Email: <a href="mailto:' . $email . '">' . $email . '</a> <br />';
						if($website) echo '<i class="fa fa-angle-right"></i><a href="' . $website . '">' . $website . '</a> <br />';
					?>
				</ul>
				<?php if(have_rows('social_links', 'option')) : ?>
				<ul class="list-inline shop-social">
					<?php while(have_rows('social_links', 'option')) : the_row(); ?>
					<li><a href="<?php the_sub_field('link'); ?>" target="_blank"><i class="fa rounded-1x <?php the_sub_field('medium'); ?>"></i></a></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>
				<?php endif; ?>
				
				<?php if($footer_version == 'v6') : ?>
				<ul class="list-unstyled contacts">
					<?php if($address) { ?>
					<li>
						<i class="radius-3x fa fa-map-marker"></i>
						<?php echo $address; ?>
					</li>
					<?php } ?>
					<?php if($phone || $fax) { ?>
					<li>
						<i class="radius-3x fa fa-phone"></i>
						<?php echo $phone; ?><?php if($phone && $fax) echo '<br>'; ?>
						<?php echo $fax; ?>
					</li>
					<?php } ?>
					<?php if($email || $website) { ?>
					<li>
						<i class="radius-3x fa fa-globe"></i>
						<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>                           
						<a href="<?php echo $website; ?>"><?php echo $website; ?></a>
					</li>
					<?php } ?>
				</ul>
				<?php endif; ?>
				
				<?php if($footer_version == 'v7') : ?>
				<ul class="list-unstyled">
					<?php 
						if($address) echo '<li><i class="fa fa-home"></i>' . $address . '</li>';
						if($phone) echo '<li><i class="fa fa-phone"></i>Phone: ' . $phone . '</li>';
						if($fax) echo '<li><i class="fa fa-fax"></i>Fax: ' . $fax . '</li>';
						if($email) echo '<li><i class="fa fa-envelope"></i>Email: <a href="mailto:' . $email . '">' . $email . '</a></li>';
						if($website) echo '<li><i class="fa fa-globe"></i><a href="' . $website . '">' . $website . '</a></li>';
					?>
				</ul>
				<?php endif; ?>