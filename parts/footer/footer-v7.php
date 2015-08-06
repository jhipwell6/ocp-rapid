    <!--=== Footer v7 ===-->
    <section id="footer-v7" class="contacts-section">
        <div class="container content-lg">
            <div class="row contacts-in">
                <?php get_template_part('parts/footer/footer', 'widgets'); ?>
            </div>            
        </div>

        <div class="copyright-section">
            <p><?php the_date('Y'); ?> &copy; <?php echo bloginfo('name'); ?>. All Rights Reserved. </p>
			<?php if(have_rows('social_links', 'option')) : ?>
            <ul class="social-icons">
                <?php
					while(have_rows('social_links', 'option')) : the_row();
						$title = ucwords(str_replace('-', ' ', substr(get_sub_field('medium'), 3)));
				?>
				<li><a href="<?php the_sub_field('url'); ?>" target="_blank" data-original-title="<?php echo $title; ?>" class="rounded-x"><i class="fa <?php the_sub_field('medium'); ?>"></i></a></li>
				<?php endwhile; ?>
            </ul>
			<?php endif; ?>
            <a href="#top"><i class="fa fa-angle-double-up back-to-top"></i></a>
        </div>
    </section>
    <!--=== End Footer v7 ===-->